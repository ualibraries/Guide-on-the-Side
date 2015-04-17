<?php

class GotsShell extends AppShell {
	public $uses = array("Tutorial", "Question", "Answer", "FinalQuiz");

	public function add_demo_tutorials() {
		$this->out('Inserting sample tutorial questions...');
		$Question = array(
				'question' => '<p>What are the names of the Greek mathematicians that described a pinhole camera?</p>',
				'correct_answer' => 1,
		);
		$this->Question->create();
		$wiki_question_1 = $this->Question->save(compact("Question"));
		$Question = array(
				'question' => '<p>What is a good use for <em>Wikipedia</em>?</p>',
				'correct_answer' => 1,
		);
		$this->Question->create();
		$wiki_question_2 = $this->Question->save(compact("Question"));
		
		$Question = array(
				'question' => '<p>Look at the links on the right. Does Google Scholar default to a date sort or a relevance sort?</p>',
				'correct_answer' => 0
		);
		$this->Question->create();
		$gs_question_1 = $this->Question->save(compact("Question"));

		$Question = array(
				'question' => '<p>Does Google Scholar allow users to sort by date?</p><p>&nbsp;</p>',
				'correct_answer' => 0
		);
		$this->Question->create();
		$gs_question_2 = $this->Question->save(compact("Question"));

		$this->out('Inserting sample tutorial answers...');
		$answers = array(
			array(
				'Answer' => array(
					'answer' => 'Thelma and Louise',
					'response' => 'This is not correct. Please go back and read the first sentence under Precursor technologies.',
					'order' => 0,
					'question_id' => $wiki_question_1['Question']['id']
				)
			),
			array(
				'Answer' => array(
					'answer' => 'Aristotle and Euclid',
					'response' => 'Good work! This is the correct answer.',
					'order' => 1,
					'question_id' => $wiki_question_1['Question']['id']
				)
			),
			array(
				'Answer' => array(
					'answer' => 'Fred and Barney',
					'response' => 'This is not correct. Please go back and read the first sentence under Precursor technologies.',
					'order' => 2,
					'question_id' => $wiki_question_1['Question']['id']
				)
			),
			array(
				'Answer' => array(
					'answer' => 'To keep up with celebrity gossip',
					'response' => '',
					'order' => 0,
					'question_id' => $wiki_question_2['Question']['id']
				)
			),
			array(
				'Answer' => array(
					'answer' => 'To gather background information on an unfamiliar topic',
					'response' => '',
					'order' => 1,
					'question_id' => $wiki_question_2['Question']['id']
				)
			),
			array(
				'Answer' => array(
					'answer' => 'To learn about cameras',
					'response' => '',
					'order' => 2,
					'question_id' => $wiki_question_2['Question']['id']
				)
			),
			array(
				'Answer' => array(
					'answer' => 'Relevance',
					'response' => 'This is the correct answer',
					'order' => 0,
					'question_id' => $gs_question_1['Question']['id']
				)
			),
			array(
				'Answer' => array(
					'answer' => 'Date',
					'response' => 'This in not correct, please go back and look again.',
					'order' => 1,
					'question_id' => $gs_question_1['Question']['id']
				)
			),
			array(
				'Answer' => array(
					'answer' => 'Yes',
					'response' => '',
					'order' => 0,
					'question_id' => $gs_question_2['Question']['id']
				)
			),
			array(

				'Answer' => array(
					'answer' => 'No',
					'response' => '',
					'order' => 1,
					'question_id' => $gs_question_2['Question']['id']
				)
			)
		);
		$this->Answer->saveAll($answers);
			
			// create a sample tutorial
			$content = <<<EOT
<p>In this tutorial, you will learn how to find resources using <em>Wikipedia</em>.
<em>Wikipedia </em>is a free online encyclopedia with access to over 4,000,000 articles.</p>
<p>Use the arrows below to navigate through the tutorial</p>
<p><img class="heading" src="tutorials/view_heading_image/chapter/About%20Wikipedia" alt="" /></p>
<p>Anyone can contribute to a <em>Wikipedia</em> article, so you need to use critical thinking skills when selecting articles. However, it can be a great place to gather background information on a topic that may be unfamiliar to you.</p>
<p><img class="heading" src="tutorials/view_heading_image/chapter/Search%20Wikipedia" alt="" /></p>
<p>You search Wikipedia by using <img class="definition" src="tutorials/view_definition_image/keywords/%3Cp%3EKeywords%20are%20important%20words%20or%20phrases%20that%20describe%20your%20research%20topic%20and%20will%20help%20you%20find%20relevant%20articles.%3C%5B%7C%5Bp%3E" alt="" />.</p>
<p>Search for&nbsp;<strong>photography</strong>.&nbsp;</p>
<p><img class="heading" src="tutorials/view_heading_image/step/" alt="" /></p>
<p>You are now at the <em>Wikipedia</em> page for <strong>Photography</strong></p>
<p>Locate the <strong>Contents</strong> section on the left side of the page. This is the table of contents for the <em>Wikipedia</em> article.</p>
<p>Select: <strong>2 History and evolution</strong></p>
<p><img class="question" src="questions/view_image/{$wiki_question_1['Question']['id']}" alt="" /></p>
<p><img class="heading" src="tutorials/view_heading_image/chapter/Thinking%20critically%20in%20Wikipedia" alt="" /></p>
<p>One way to determine the validity of what you\'ve found is to check the <em>Wikipedia</em> citations. Use the superscript number to access information about the source.</p>
<p><img src="uploads/images/superscript_link.png" alt="example superscript link" width="300" height="139" /></p>
<p><img class="heading" src="tutorials/view_heading_image/step/" alt="" />Scroll to the <strong>Camera development</strong> section of the page and take a look at the different cameras.</p>
<p><img class="text-box" src="tutorials/view_text_box_image/multi-line/Which%20of%20these%20cameras%20would%20be%20the%20most%20fun%20to%20use%7C%24%7C/I%7C%7D%7Cd%20most%20like%20to%20use%20the..." alt="" /></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
EOT;
			$Tutorial = array(
				'user_url' => 'wikipedia-demo',
				'title' => 'Wikipedia - demo',
				'url'   => 'http://www.wikipedia.org/',
				'description' => '<p>In this tutorial, you will learn how to find resources using <em>Wikipedia</em>. <em>Wikipedia </em>is a free online encyclopedia with access to over 4,000,000 articles.</p>',
				'content' => $content,
				'contact_name' => 'Librarian',
				'contact_email' => 'librarian@example.com',
				'contact_phone' => '555-555-5555',
				'created' => '2013-10-24 12:06:23',
				'modified' => '2013-10-30 14:51:03',
				'published' => 1,
				'deleted' => 0,
				'in_index' => 1,
				'link_toc' => 1,
			);
			$this->out("Inserting Wikipedia demo...");
			$this->Tutorial->create();
			$wiki_tutorial = $this->Tutorial->save(compact("Tutorial"));


			$FinalQuiz = array(
				'content' => '<p>Take this final quiz.<img class="question" src="questions/view_image/' . $wiki_question_2['Question']['id'] . '" alt="" /></p>',
				'certificate' => true,
				'certificate_email_self' => true,
				'certificate_grades' => true,
				'tutorial_id' => $wiki_tutorial['Tutorial']['id'],
				'created' => '2013-10-30 14:22:42',
				'modified' => '2013-10-30 14:49:14',
			);
			$this->out("Inserting Wikipedia demo quiz...");
			$this->FinalQuiz->save(compact("FinalQuiz"));

			//Insert additional demo tutorial to show new features
			// create a sample tutorial
			$content = <<<EOT
<p>In this tutorial, you will learn how to find resources using Google Scholar. Google Scholar provides a simple way to search scholarly literature.</p>
<p>&nbsp;</p>
<p><img class="heading" src="tutorials/view_heading_image/chapter/About%20Google%20Scholar" alt="" /></p>
<p>Google Scholar allows you to:</p>
<ul>
<li>Search a wide range of scholarly literature</li>
</ul>
<ul>
<li>Explore related works, citations, authors, and publications</li>
</ul>
<ul>
<li>Locate the complete document through your library or on the web</li>
</ul>
<ul>
<li>Keep up with recent developments in any area of research</li>
</ul>
<p><img class="heading" src="tutorials/view_heading_image/chapter/Search%20Google%20Scholar" alt="" /></p>
<p>You search Google Scholar by using <img class="definition" src="tutorials/view_definition_image/keywords/%3Cp%3EKeywords%20are%20important%20words%20or%20phrases%20that%20describe%20your%20research%20topic%20and%20will%20help%20you%20find%20relevant%20articles.%3C%5B%7C%5Bp%3E" alt="" /></p>
<p>Your Turn:</p>
<ul>
<li>Enter sitcoms and ethics and click the search button<a class="gots_thumbnail_link" href="uploads/images/googlebutton.jpg"><img src="uploads/thumbnails/googlebutton.jpg" alt="google button" width="300" height="59" /></a></li>
</ul>
<p>&nbsp;<img class="heading" src="tutorials/view_heading_image/chapter/Manage%20Search%20Results" alt="" /></p>
<p>You will notice you retrieved a large number of articles.</p>
<p>Locate the date range box on the right side of the page</p>
<p><a class="gots_thumbnail_link" href="uploads/images/dates.jpg"><img src="uploads/thumbnails/dates.jpg" alt="google date ranges" width="120" height="127" /></a></p>
<p>Your Turn:</p>
<ul>
<li>Select Since 2015</li>
</ul>
<p><img class="question" src="questions/view_image/{$gs_question_1['Question']['id']}" alt="" /></p>
<p>&nbsp;</p> 
EOT;
			$Tutorial = array(
				'user_url' => 'google-scholar---popup-demo',
				'title' => 'Google Scholar - Popup Demo',
				'url' => 'http://scholar.google.com/',
				'content' => $content,
				'certificate' => 1,
				'certificate_email' => '123@abc.com',
				'certificate_email_self' => 1,
				'contact_name' => 'Leslir',
				'contact_email' => 'sultl@u.library.arizona.edu',
				'contact_phone' => '',
				'published' => 1,
				'created' => '2015-04-09 13:12:50',
				'modified' => '2015-04-16 15:11:36',
				'deleted' => 0,
				'in_index' =>1 ,
				'link_toc' => 0,
				'description' => '<p>This shows how popup mode works using Google Scholar</p>',
				'dot_creation_timestamp' => NULL,
				'dot_last_revision_timestamp' => NULL,
				'licensing' => NULL,
				'dot_source_path' => NULL,
				'tutorial_type_id' => 1,
				'external_identifier' => NULL,
				'author' => NULL,
				'format' => NULL,
				'updater' => NULL,
				'update_priority' => NULL,
				'update_notes' => NULL,
				'accessible_version_url' => NULL,
				'accessible_version_format' => NULL,
				'for_credit' => 0,
				'url_title' => 'Google Scholar',
				'popup' => true,
				'custom_feedback_link_text' => '',
				'show_feedback_link' => 1,
				'show_chapter_progress' => 1
			);

			$this->out("Inserting Google Scholar demo...");
			$this->Tutorial->create();
			$gs_tutorial = $this->Tutorial->save($Tutorial);

			$FinalQuiz = array(
				'id' => 2,
				'title' => NULL,
				'content' => '<p><img class="question" src="questions/view_image/'.$gs_question_2['Question']['id'].'" alt="" /></p>',
				'certificate' => 1,
				'certificate_email' => NULL,
				'certificate_email_self' => 1,
				'certificate_grades' => 1,
				'tutorial_id' => $gs_tutorial['Tutorial']['id'],
				'created' => '2015-04-10 15:51:50',
				'modified' => '2015-04-16 15:10:17'
			);
			$this->out("Inserting Google Scholar demo quiz...");
			$this->FinalQuiz->saveAll(compact("FinalQuiz"));
	
	}
}
