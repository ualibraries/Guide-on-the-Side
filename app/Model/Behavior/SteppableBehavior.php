<?php
/* This behavior contains all the code needed to parse HTML images out of model content.
 * It's named steppable after one of the kinds of thing it will parse, but it handles
 * defnition boxes, headings, and questions as well. It's a behavior because FinalQuiz needs it too.
 */
//App::import('Sanitize');

class SteppableBehavior extends ModelBehavior {

  var $general_question_pattern = '/\<img[^>]*class\="question"[^>]*src\="questions\/view_image\/(\d+)"[^>]*\/\>/';

  public function beforeSave(&$Model) {
    // Sanitize the content on save. This does not sanitize definitions (done in getStepsWithContent()), questions
    //   (done in question/answer models), or headings (done in _generateDefinition(Print)HTML)
    // A bit scattered, I know. Sorry about that.
    // TODO: Look into Cake's Sanitization stuff for this purpose.
    if (isset($Model->data[$Model->alias]['content'])) {
      $Model->data[$Model->alias]['content'] =
        strip_tags($Model->data[$Model->alias]['content'], allowed_tags('strip_tags'));
    }
//    $Model->data = Sanitize::clean($Model->data, array('encode' => false));
    return true;
  }

  /* This function only gets the chapter headings (table of contents). */
  public function getChapters(&$Model, $id = null) {
    if (is_numeric($id)) {
      $tutorial = $Model->find('first', array('conditions' => array('id' => $id)));

      if (!empty($tutorial[$Model->alias]['content'])) {
        $steps = $this->getStepsWithContent($Model, $id);
        $chapters = array();
        $previous_chapter = '';
        foreach ($steps as $index => $step) {
          if ($step['chapter'] != $previous_chapter) {
            $chapters[$index] = $step['chapter'];
          }
          $previous_chapter = $step['chapter'];
        }
        return $chapters;
      }
    }
  }

  /* This function gets the steps and their content. */
  // Weird to have HTML mentioned in a model? Maybe, but there's data embedded in the Tutorial content field.
  //   It's encoded as <img> tags, for use with TinyMCE.
  public function getStepsWithContent(&$Model, $id = null, $display_definition_boxes = false) {
    if (is_numeric($id)) {
      $tutorial = $Model->find('first', array('conditions' => array($Model->alias . '.id' => $id)));
      if (!empty($tutorial[$Model->alias]['content'])) {
        $chapter_heading = '';
        $step_heading = '';
        $steps = array(); // put all the data in here
        $chapter_pattern = '/<img[^>]*class="heading"[^>]*src="tutorials\/view_heading_image\/(chapter\/[^\"]+)"[^>]*\/>/';
        $chapters_and_headings = preg_split($chapter_pattern, $tutorial[$Model->alias]['content'],
          null, PREG_SPLIT_DELIM_CAPTURE);
//        debug($chapters_and_headings);
        // $chapters_and_headings is a flat array of headings and their content. Which comes first can't be assumed.
        foreach ($chapters_and_headings as $chapter_key => $chapter_or_heading) {
          $stripped_chapter_or_heading = strip_tags($chapter_or_heading, '<img>');
          $chapter_without_spaces = preg_replace('/\s+|\&nbsp\;/', '', $stripped_chapter_or_heading);
          if (empty($chapter_without_spaces)) {
            unset($chapters_and_headings[$chapter_key]);
            continue;
          }

          if (substr($chapter_or_heading, 0, 8) == 'chapter/') {
            $chapter_heading = strip_tags(QH_urldecode(substr($chapter_or_heading, 8)));
            $step_heading = '';
          } else { // it's not a chapter heading, it's content
            $chapter_content = $chapter_or_heading;
            $step_pattern = '/\<img[^>]*class\="heading"[^>]*src\="tutorials\/view_heading_image\/(step\/[^"]*)"[^>]*\/\>/';
            $steps_and_headings = preg_split($step_pattern, $chapter_content, null, PREG_SPLIT_DELIM_CAPTURE);
            $step_num_within_chapter = 0;
            $total_steps_in_chapter = count(array_filter($steps_and_headings, array($this, '_isStep')));
            foreach ($steps_and_headings as $step_key => $step_or_heading) {
              $stripped_step_or_heading = strip_tags($step_or_heading, '<img>');
              $step_without_spaces = preg_replace('/(\s|\&nbsp\;)+/', '', $stripped_step_or_heading);
              if (empty($step_without_spaces)) {
                unset($steps_and_headings[$step_key]);
                continue;
              }

              if (!$this->_isStep($step_or_heading)) {
                if (strlen($step_or_heading) > 5) {
                  $step_heading = strip_tags(QH_urldecode(substr($step_or_heading, 5)));
                } else {
                  $step_heading = '';
                }
              } else { // it's not a step heading, it's content
                $step_content = $step_or_heading;
                
                // invalid HTML caused by splitting the HTML into steps can break QuickHelp, 
                //   esp. in IE8. Using Tidy is highly recommended to prevent this, 
                //   but we don't want to prevent people from trying to use it if they're brave.
                if (extension_loaded('tidy')) {
                  $tidy_config = array(
                    'show-body-only' => true,
                    'preserve-entities' => true,
                    'output-xhtml' => true,
                    'wrap' => 0,
                  );

                  $tidy = new tidy();
                  $tidy->parseString($step_content, $tidy_config);
                  $tidy->cleanRepair();
                  $step_content = $tidy;
                }
                $step_content = $this->_parseQuestions($step_content);
                $step_content = $this->_parseDefinitions($step_content, $display_definition_boxes);
                $step_content = $this->_parseTextBoxes($step_content);
                $step_content = $this->_parseImages($step_content);
                
                $step_num_within_chapter++;
                
                $steps[] = array(
                  'chapter' => $chapter_heading, 
                  'step' => $step_heading, 
                  'content' => $step_content,
                  'step_num_within_chapter' => $step_num_within_chapter,
                  'total_steps_in_chapter' => $total_steps_in_chapter,
                );
              }
            }
          }
        }
        return $steps;
      }
    }
  }

  protected function _isStep($step_or_heading) {
    if (substr($step_or_heading, 0, 5) == 'step/') {
      return false; // it's a step heading (page break)
    }
    return true;
  }
  
  protected function _parseQuestions($step_content) {
    // preg_replace_callback() is dumb. I wanted to use it here, but it wasn't working out.
    //   Oh, and I'm pretty sure create_function() is evil.

    // This condition will fail on FALSE *or* 0, and that's correct.
    if (preg_match_all($this->general_question_pattern, $step_content, $matches)) {
      foreach ($matches[0] as $key => $match) {
        $question_id = $matches[1][$key];
        $this->Question = ClassRegistry::init('Question');
        $question = $this->Question->findById($question_id);
        $question_html = "<div class='question'>{$question['Question']['question']}</div><div class='answers'>";
        foreach ($question['Answer'] as $radio_value => $answer) {
          $question_html .= "<input class='answer-radio' type='radio' name='questions[$question_id]' value='$radio_value' " .
            " id='questions[$question_id]-$radio_value' /> ";
          $question_html .= "<label class='answer-text' for='questions[$question_id]-$radio_value'>{$answer['answer']}</label>";
        }
        $question_html .= "</div>";
        $question_html = $this->_parseImages($question_html);
        $question_pattern = '/\<img[^>]*class\="question"[^>]*src\="questions\/view_image\/' . $question_id . '"[^>]*\/\>/';
        $step_content = preg_replace($question_pattern, $question_html, $step_content);
      }
    }
    return $step_content;
  }

  public function grade(&$Model, $id = null, $answers = array()) {
    $grades = array();
    if ($id && is_numeric($id)) {
      $Model->Question = ClassRegistry::init('Question');
      $all_questions = $Model->getQuestionIds($id);
      $grades['total'] = count($all_questions);
      $grades['score'] = 0;
      // this assumes that the index of $question['Answer'] matches the answer order. Should be valid based on the
      //   hasMany between Question and Answer
      foreach($all_questions as $order => $question_id) {
        $question = $Model->Question->read(null, $question_id);
        $grades[$order]['question'] = $question['Question']['question'];
        $grades[$order]['correct_answer'] = $question['Answer'][$question['Question']['correct_answer']]['answer'];
        if (array_key_exists($question_id, $answers)) {
          $grades[$order]['user_answer'] = $question['Answer'][$answers[$question_id]]['answer'];
          $grades[$order]['response'] = $question['Answer'][$answers[$question_id]]['response'];
          $grades[$order]['user_correct'] = ($answers[$question_id] === $question['Question']['correct_answer']);
        } else {
          $grades[$order]['user_answer'] = "no answer given";
          $grades[$order]['response'] = "";
          $grades[$order]['user_correct'] = false;
        }
        
        if ($grades[$order]['user_correct']) {
          $grades['score']++;
        }
      }
      unset($Model->Question);
    } else {
      $grades = array();
    }

    return $grades;
  }
  
  public function getQuestionIds(&$Model, $id = null) {
    if ($id && is_numeric($id)) {
      $conditions = array(
        'id' => $id
      );
      $content = $Model->field('content', $conditions);
      $question_ids = array();
      preg_match_all($this->general_question_pattern, $content, $question_ids);
      return $question_ids[1];
    }
    return array();
  }

  protected function _parseImages($step_content) {
    $image_pattern = '/(\<img[^>]*src\=")(uploads\/images\/[^\"]*"[^>]*\>)/';
    // The following is the only way I could figure out to get the webroot from the model.
    //   It assumes this is being called from index.php.
    $replacement_pattern = '$1' . Router::url('/') . '$2';
    $step_content = preg_replace($image_pattern, $replacement_pattern, $step_content, -1, $count);
//    debug($step_content);
//    debug($count);
    return $step_content;
  }

  // An anonymous function would be cooler, but I'm on PHP 5.2. And create_function() is evil!
  protected function _generateDefinitionHTML($matches) {
    $uuid = $this->uuid();
    $link_text = strip_tags(QH_urldecode($matches[1]), allowed_tags('strip_tags'));
    $matches[2] = $this->_parseImages(QH_urldecode($matches[2]));
    $definition_text = strip_tags($matches[2], allowed_tags('strip_tags'));
    return "<a href='#" . QH_urlencode($definition_text) . "' id='definition-link-$uuid' class='definition-link'>" .
        "$link_text</a>";
  }

  protected function _generateDefinitionPrintHTML($matches) {
    $uuid = $this->uuid();
    $link_text = strip_tags($matches[1], allowed_tags('strip_tags'));
    $matches[2] = $this->_parseImages(QH_urldecode($matches[2]));
    $definition_text = strip_tags($matches[2], allowed_tags('strip_tags'));
    return "<a href='#' id='definition-link-$uuid' class='definition-link'>$link_text</a>" .
      "<div id='definition-body-$uuid' class='definition-body'>$definition_text</div>";
  }

  // Something is messing with the .siblings jQuery function. We need to be able to more directly target
  //   definition boxes, so let's add a UUID.
  protected function _parseDefinitions($step_content, $display_definition_boxes = false) {
    $definition_pattern = '/\<img[^>]*class\="definition"[^>]*src\="tutorials\/view_definition_image\/([^\/]+)\/([^"]+)"[^>]*>/';
    if ($display_definition_boxes) {
      $step_content = preg_replace_callback($definition_pattern, array($this, '_generateDefinitionPrintHTML'), 
          $step_content);
    } else {
      $step_content = preg_replace_callback($definition_pattern, array($this, '_generateDefinitionHTML'), 
          $step_content);
    }
    
    return $step_content;
  }

  protected function _parseTextBoxes($step_content) {
    $text_box_pattern = '/\<img[^>]*class\="text-box"[^>]*src\="tutorials\/view_text_box_image\/([^\/]+)\/([^\/]+)\/?([^"]+)?"[^>]*>/';
    $step_content = preg_replace_callback($text_box_pattern, array($this, '_generateTextBoxHTML'), $step_content);
    return $step_content;
  }
  
  protected function _generateTextBoxHTML($matches) {
    $uuid = $this->uuid();
    $type = htmlentities($matches[1], ENT_QUOTES, 'UTF-8');
    $matches[2] = QH_urldecode(strip_tags($matches[2], allowed_tags('strip_tags')));
    $matches[3] = QH_urldecode(strip_tags($matches[3], allowed_tags('strip_tags')));
    $prompt = htmlentities($matches[2], ENT_QUOTES, 'UTF-8');
    $placeholder = htmlentities($matches[3], ENT_QUOTES, 'UTF-8');
    $name = "free-response[$uuid][$prompt]";
    if ('one-line' == $type) {
        return "<label for='$name'>$prompt<br /><input placeholder='$placeholder' class='text-box' name='$name' /></label>";
    } elseif ('multi-line' == $type) {
        return "<label for='$name'>$prompt<br /><textarea placeholder='$placeholder' " . 
            "class='text-box' name='$name'></textarea></label>";
    }
  }  
  
  // http://www.php.net/manual/en/function.uniqid.php#94959
  // UUID version 4
  protected function uuid() {
    return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',

      // 32 bits for "time_low"
      mt_rand(0, 0xffff), mt_rand(0, 0xffff),

      // 16 bits for "time_mid"
      mt_rand(0, 0xffff),

      // 16 bits for "time_hi_and_version",
      // four most significant bits holds version number 4
      mt_rand(0, 0x0fff) | 0x4000,

      // 16 bits, 8 bits for "clk_seq_hi_res",
      // 8 bits for "clk_seq_low",
      // two most significant bits holds zero and one for variant DCE1.1
      mt_rand(0, 0x3fff) | 0x8000,

      // 48 bits for "node"
      mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    );
  }

}