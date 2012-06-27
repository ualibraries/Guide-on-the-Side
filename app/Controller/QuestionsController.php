<?php
class QuestionsController extends AppController {

  function beforeFilter() {
    $this->Auth->allow('get_immediate_feedback');
    $this->helpers[] = 'QuickhelpTinyMce';
  }

  function view_image($id = null) {
    if (is_numeric($id)) {
      $question = $this->Question->findById($id);

      $line_count = 0;

      // array of lines
      $question_text = array();

      // Other kinds of newlines causing problems.
      $question['Question']['question'] = str_replace(array("\r", "\r\n", "\n"), '\n', $question['Question']['question']);
      $question_wrapped = wordwrap(strip_tags(QH_urldecode($question['Question']['question'])),
        $this->number_of_characters, '\n', true);

      $question_text = array_merge($question_text, explode('\n', $question_wrapped));
      $line_count += count($question_text);

      $answers = Set::combine($question['Answer'], '{n}.order', '{n}.answer');

      $answer_text = array();
      foreach ($answers as $answer) {
        $answer_wrapped = wordwrap(strip_tags($answer), $this->number_of_characters - 4, '\n', true);
        $line_array = explode('\n', $answer_wrapped);
        $answer_text[] = $line_array;
        $line_count += count($line_array);
      }

      $box_height = $this->padding * 2 + ($this->line_height * $line_count);
      $box_width = $this->padding * 2 + $this->number_of_characters * $this->character_width;

      $image = imagecreatetruecolor($box_width, $box_height);
      $background = imagecolorallocate($image, 255, 255, 255);
      imagefill($image, 0, 0, $background);

      $black = imagecolorallocate($image, 0, 0, 0);
      imagerectangle($image, 0, 0, $box_width - 1, $box_height - 1, $black);

      $y = $this->padding + $this->character_height;
      foreach ($question_text as $line) {
        imagettftext($image, $this->font_size, 0, $this->padding, $y, $black, APP . 'Lib/unifont_5.1.20080907.ttf', 
          html_entity_decode($line));
            // h_e_d for preventing &nbsp; in the image... sometimes. Not clear on that, but
            //   this fixed #206.
        $y += $this->line_height;
      }

      foreach ($answer_text as $order => $answer) {
        if ($order == $question['Question']['correct_answer']) {
          imagefilledellipse($image, $this->character_width * 3, $y - $this->character_height / 2, 8, 8, $black);
        } else {
          imageellipse($image, $this->character_width * 3, $y - $this->character_height / 2, 8, 8, $black);
        }
        foreach ($answer as $answer_line) {
          $answer_line = '    ' . $answer_line;
          imagettftext($image, $this->font_size, 0, $this->padding, $y, $black, 
            APP . 'Lib/unifont_5.1.20080907.ttf', $answer_line);
          $y += $this->line_height;
        }
      }

      $this->layout = 'image';
      header("Content-type: image/png");
      imagepng($image);
      imagedestroy($image);
      $this->autoRender = false;
    }
  }

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid question'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('question', $this->Question->read(null, $id));
	}

  function get_immediate_feedback($tutorial_id = null) {
    if (!$tutorial_id || !is_numeric($tutorial_id)) {
      $correct = false;
      $response = "Response could not be retrieved.";
    } else {
      if (isset($this->request->data['questions']) && !empty($this->request->data['questions'])) {
        $question_id = array_keys($this->request->data['questions']);
        // There should only ever be one question at a time, hence the [0].
        $question_id = $question_id[0];
        $options = array(
          'conditions' => array(
            'id' => $question_id,
          )
        );
        // TODO: Why can't I get Containable to work?
        //   I'd prefer to limit the query than get all the answers.
        $this->Question->recursive = 1;
        $question = $this->Question->find('first', $options);
        $user_answer = $this->request->data['questions'][$question_id];
        $response = $question['Answer'][$user_answer]['response'];
        $correct = ($user_answer == $question['Question']['correct_answer']);
        if (empty($response)) {
          if ($correct) {
            $response = 'That is correct!';
          } else {
            $response = 'That is not correct.';
          }
        }
      } else {
        $correct = false;
        $response = "Response could not be retrieved.";
      }
    }
    echo json_encode(compact('correct', 'response'));
    exit();
  }

  // this is the submit function for edit too.
	function add() {
		if (!empty($this->data)) {
      unset($this->Question->Answer->validate['question_id']); // the cookbook told me to.
			if ($this->Question->saveAll($this->data)) {
				echo json_encode($this->Question->id);
        exit();
			} else {
        $errors = array();
        foreach ($this->Question->validationErrors as $field => $error) {
          if (!is_array($error)) {
            $key = Inflector::humanize($field);
            $errors[$key] = $error;
          } else {
            $model = $error;
            $error = '';
            foreach ($model as $record) {
              foreach ($record as $field => $error) {
                $key = Inflector::humanize($field);
                $errors[$key] = $error;
              }
            }
          }
        }

        echo json_encode($errors);

				exit();
			}
		}
    $this->layout = 'tinymce_dialog';
    $this->set('title_for_layout', 'Question');
	}

	function edit($id = null) {
    // add handles the submit

    $this->layout = 'tinymce_dialog';
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid question'));
			$this->redirect(array('action' => 'index'));
		}
		if (empty($this->data)) {
      // get data for TinyMCE dialog
			$this->data = $this->Question->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for question'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Question->delete($id)) {
			$this->Session->setFlash(__('Question deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Question was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
?>