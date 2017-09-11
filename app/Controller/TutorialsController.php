<?php
App::uses('Sanitize', 'Utility');

App::uses('AppController', 'Controller');

App::uses('CakeEmail', 'Network/Email');

class TutorialsController extends AppController {

	var $paginate =
	array(
		'undeleted',
		'limit' => 10,
		'order' => 'title ASC',
		'recursive' => -1,
		'contain' => array('TutorialType'),
	);

//  public $presetVars = array(
//    array('field' => 'search_term', 'type' => 'value'),
////    array('field' => 'LearningGoal', 'type' => 'checkbox', 'model' => 'Tutorial'),
////    array('field' => 'ResourceType', 'type' => 'checkbox', 'model' => 'Tutorial'),
//    array('field' => 'Keyword', 'type' => 'value', 'model' => 'Tutorial'),
//  );

	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('view', 'view_tutorial_only', 'public_index', 'view_step_by_step_only',
			'view_certificate', 'provide_feedback', 'view_single_page', 'view_information', 'search');
		$this->helpers[] = 'QuickhelpTinyMce';
		$this->helpers[] = 'Text';
		$this->helpers[] = 'Time';
		$tutorialTypes = $this->Tutorial->TutorialType->find('list');
		foreach ($tutorialTypes as $id => $tutorialType) {
			define('TUTORIAL_TYPE_' . strtoupper(str_replace('-', '', $tutorialType)), $id);
		}
	}

	function import() {
		if ($this->Auth->user() && $this->Session->read('Role.name') == 'admin') {
			$this->Tutorial->importCSV(APP . 'Lib/FinalDOTfinal.csv');
			debug($this->Tutorial->getImportErrors()); exit();
		}
	}

	function public_index() {
		$this->paginate = array(
			'published',
			'limit' => 20,
			'order' => 'title ASC',
			'recursive' => -1,
			'conditions' => array(
			'in_index' => true
			)
		);

		$this->set('tutorials', $this->paginate());

		$this->set('learningGoals', $this->Tutorial->LearningGoal->find('list'));
		$this->set('resourceTypes', $this->Tutorial->ResourceType->find('list'));
		$this->layout = 'institution';
	}

	function index() {
		if ($this->Session->read('Role.name') == 'admin') {
			$options = array(
				'limit' => 10,
				'order' => 'Revision.id DESC',
			);
			$this->Tutorial->Revision->recursive = 0;
			$revisions = $this->Tutorial->Revision->find('all', $options);
			$this->set(compact('revisions'));
		}
		$this->set('tutorials', $this->paginate());
	}

    function view_single_page($id = null) {
	  $this->response->header('Content-Security-Policy', 'child-src \'self\'; script-src \'self\' \'unsafe-inline\' http://ajax.googleapis.com');
		$tutorial = $this->getTutorial($id);
		if (!$this->Auth->user() && !$tutorial['Tutorial']['published']) {
			$this->Session->setFlash(__('Invalid tutorial'));
			$this->redirect(array('action' => 'index'));
			return;
		}

		// always use the user_url (slug) when viewing
		if (!empty($tutorial['Tutorial']['user_url']) && !isset($this->params['slug'])) {
			$this->redirect(array('action' =>'view_single_page', $id)); // the routing system will convert this to the slug URL
		}

		$this->set('chapters', $this->Tutorial->getChapters($tutorial['Tutorial']['id']));
		$this->set('steps', $this->Tutorial->getStepsWithContent($tutorial['Tutorial']['id'], null, true));
			$this->set('tutorial', $tutorial);
		$has_quiz = !empty($tutorial['FinalQuiz']['id']);
		$this->set('quiz_steps', $this->Tutorial->FinalQuiz->getStepsWithContent($tutorial['FinalQuiz']['id']));
		$quiz_index = 0;
		if ($has_quiz) {
			$quiz_index = count($this->Tutorial->getStepsWithContent($id));
		}
		$link_toc = $tutorial['Tutorial']['link_toc'];
		$title = $tutorial['Tutorial']['title'];
		$site_url = $tutorial['Tutorial']['url'];
		$site_title = $tutorial['Tutorial']['url_title'] ? $tutorial['Tutorial']['url_title'] : $site_url;
		if (isset($this->params['popup'])) {
			$popup = $this->params['popup'];
		}
		$this->set(compact('title', 'link_toc', 'quiz_index', 'has_quiz', 'site_url', 'site_title', 'popup'));
		$this->set('title_for_layout' , $title . " " . __('Single-Page View'));

		$this->layout = 'public';
	}

	protected function getTutorial($id = null, $revision_id = null) {
		// if the user is admin and is requesting a revision, retrieve it and inject it into the model.
		if ($revision_id && $this->Auth->user() && $this->Session->read('Role.name') == 'admin') {
			$options = array(
			'recursive' => 1,
			'conditions' => array(
				'Revision.id' => $revision_id,
				'tutorial_id' => $id
			)
			);
			$revision = $this->Tutorial->Revision->find('first', $options);
			if ($revision) {
			$revision_content = unserialize($revision['Revision']['content']);
			$this->Tutorial->records[0] = $revision_content['Tutorial'];
			// The Array datasource is in the CakephpDatasources plugin from CakeDC.
			//   We can bypass the database and use an instance variable instead.
			//   That's some serious awesomesauce. See database.php.
			$this->Tutorial->useDbConfig = 'array';
			$this->Tutorial->FinalQuiz->records[0] = $revision_content['FinalQuiz'];
			$this->Tutorial->FinalQuiz->useDbConfig = 'array';
			$tutorial = $this->Tutorial->find('first',
				array(
				'contain' => array('FinalQuiz', 'Tag', 'Audience', 'TutorialType', 'LearningGoal',
					'ResourceType', 'Subject'),
				'conditions' => array('Tutorial.id' => $id),
				'limit' => 1
				)
			);
			}
		} else {
			$tutorial = $this->Tutorial->find('undeleted',
				array(
					'contain' => array('FinalQuiz', 'Tag', 'Audience', 'TutorialType', 'LearningGoal',
					'ResourceType', 'Subject'),
					'conditions' => array('Tutorial.id' => $id),
					'limit' => 1
				)
			);
			if (!empty($tutorial)) {
				$tutorial = $tutorial[0];
			}
		}
		return $tutorial;
	}

	function view_information($id = null, $revision_id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid tutorial'));
			$this->redirect(array('action' => 'index'));
			return;
		}

		$tutorial = $this->getTutorial($id, $revision_id);

		if (!$tutorial) {
			$this->redirect('/');
		}

		if (!$this->Auth->user() && !$tutorial['Tutorial']['published']) {
			$this->Session->setFlash(__('Invalid tutorial'));
			$this->redirect(array('action' => 'index'));
			return;
		}

		//$this->Tutorial->contain('FinalQuiz', 'Tag', 'Audience', 'TutorialType', 'LearningGoal', 'ResourceType', 'Subject');
		$this->set(compact('tutorial'));
		$this->layout = 'institution';
	}

	function luceneIndex() {
		$tutorials = $this->Tutorial->find('public',
			array(
				'contain' => array('Tag', 'LearningGoal', 'ResourceType'),
			)
		);

		$this->Tutorial->SearchIndex->deleteAll(array('id' => 3));

		foreach ($tutorials as $tutorial) {

			$saveData = array('SearchIndex' => array(
				'document' => array(
					array(
						'key' => 'tutorial_id',
						'value' => $tutorial['Tutorial']['id'],
						'type' => 'Keyword'
					),
					array(
						'key' => 'title',
						'value' => $tutorial['Tutorial']['title'],
						'type' => 'Text'
					),
					array(
						'key' => 'description',
						'value' => $tutorial['Tutorial']['description'],
						'type' => 'Text'
					),
					array(
						'key' => 'tags',
						'value' => $tutorial['Tutorial']['tags'],
						'type' => 'Text'
					),
					array(
						'key' => 'learning_goal',
						'value' => join(' ', Set::extract('/id', $tutorial['LearningGoal'])),
						'type' => 'Text'
					),
					array(
						'key' => 'resource_type',
						'value' => join(' ', Set::extract('/id', $tutorial['ResourceType'])),
						'type' => 'Text'
					),
					array(
						'key' => 'keyword',
						'value' => join(' ', Set::extract('/id', $tutorial['Tag'])),
						'type' => 'Text'
					),
				)
			));
			//debug(Set::extract('/name', $tutorial['LearningGoal']));
			$this->Tutorial->SearchIndex->save($saveData);
		}
		//debug($this->Tutorial->SearchIndex);
		//debug(Zend_Search_Lucene_Search_QueryParser::setDefaultOperator(Zend_Search_Lucene_Search_QueryParser::B_AND));
		//debug($this->Tutorial->SearchIndex->find('all', array(
		//      'conditions' => array(
		//        'query' => 'interactivity mapping',
		//      ),
		//      'highlight' => true,
		//)));
		//debug(Zend_Search_Lucene::setDefaultSearchField('description'));
		//debug(Zend_Search_Lucene::getDefaultSearchField());

		exit();
	}

	function search() {
		if (!empty($this->data['Tutorial'])) { // convert POST to Cake named params (it's prettier than GET)
			$this->redirect(array_merge($this->params['named'], $this->data['Tutorial']));
		}

		// default to boolean AND searching
		Zend_Search_Lucene_Search_QueryParser::setDefaultOperator(Zend_Search_Lucene_Search_QueryParser::B_AND);

		$query = '';
		// Are there any parameters besides page?
		$named_params = array_diff_key($this->params['named'], array('page' => ''));
		if (!empty($named_params)) {
			// sanitize with exceptions for Zend Lucene query language. (Do the exceptions introduce a vulnerability?
			//   Can Zend Lucene validate a query ahead of time?)
			if (isset($this->params['named']['term'])) {
				//        $query = Sanitize::paranoid($this->params['named']['term'],
				//          array(' ', '"', "'", ':', '?', '*', '~', '[', ']', '_', '-', '{', '}', '.', '^', '+', '-', '(',
				//            ')', '&', '|', '!'));
				$query = $this->params['named']['term'];
				if (!empty($query)) {
					// Intercept invalid queries
					try {
						Zend_Search_Lucene_Search_QueryParser::dontSuppressQueryParsingExceptions();

						$parsed_query = Zend_Search_Lucene_Search_QueryParser::parse($query);
					} catch (Zend_Search_Lucene_Exception $e) {
						// Why can't I catch Zend_Search_Lucene_Search_QueryParserException?
						$this->Session->setFlash(__('We\'re not sure what you mean. Are your search terms correct?'));
						$this->redirect(array('action' => 'search', 'term' => Sanitize::paranoid($query, array(" "))));
					}
				}
			} else {
				$parsed_query = new Zend_Search_Lucene_Search_Query_Boolean();
			}
			try {
				if (isset($this->params['named']['learning_goal'])) {
					$learning_goals = explode('|', $this->params['named']['learning_goal']);
					foreach ($learning_goals as $learning_goal) {
						if (is_numeric($learning_goal)) {
							$learning_goal_term = new Zend_Search_Lucene_Index_Term($learning_goal, 'learning_goal');
							$learning_goal_query = new Zend_Search_Lucene_Search_Query_Term($learning_goal_term);
							$parsed_query->addSubquery($learning_goal_query, true);
						}
					}
				}
				if (isset($this->params['named']['resource_type'])) {
					$resource_types = explode('|', $this->params['named']['resource_type']);
					foreach ($resource_types as $resource_type) {
						if (is_numeric($resource_type)) {
							$resource_type_term = new Zend_Search_Lucene_Index_Term($resource_type, 'resource_type');
							$resource_type_query = new Zend_Search_Lucene_Search_Query_Term($resource_type_term);
							$parsed_query->addSubquery($resource_type_query, true);
						}
					}
				}
				if (isset($this->params['named']['keyword'])) {
					$keywords = explode('|', $this->params['named']['keyword']);
					foreach ($keywords as $keyword) {
						if (preg_match('/[A-Za-z0-9\-]+/', $keyword)) { // valid UUID?
							$keyword_term = new Zend_Search_Lucene_Index_Term($keyword, 'keyword');
							$keyword_query = new Zend_Search_Lucene_Search_Query_Term($keyword_term);
							$parsed_query->addSubquery($keyword_query, true);
						}
					}
				}

			} catch (Zend_Search_Lucene_Exception $e) {
				// Why can't I catch Zend_Search_Lucene_Search_QueryParserException?
				$this->Session->setFlash(__('We\'re not sure what you mean. Are your search terms correct?'));
				$this->redirect(array('action' => 'search', 'query' => $query));
			}

			$this->paginate['SearchIndex'] = array(
				//'published',
				'limit' => 10,
				//'order' => 'Tutorial.title ASC',
				//'conditions' => array(
				//'in_index' => true
				//),
				'conditions' => array(
					'query' => $parsed_query
				),
				'highlight' => true,
			);

			$this->set('tutorials', $this->paginate($this->Tutorial->SearchIndex));
		} else {
			$this->paginate = array(
			'published',
			'limit' => 10,
			'order' => 'Tutorial.title ASC',
			'conditions' => array(
				'in_index' => true
			),
			'contain' => array('Tag'),
			);
			$this->set('tutorials', $this->paginate($this->Tutorial));
		}

		$this->layout = 'institution';

		$results_context = array(
			'model' => '',
			'key' => '',
			'id' => 0,
			'name' => '',
		);

		$this->set(compact('results_context'));

		$this->set('learningGoals', $this->Tutorial->LearningGoal->find('list'));
		$this->set('resourceTypes', $this->Tutorial->ResourceType->find('list'));

	}

	function search_simple() {
		if (!empty($this->data['Tutorial'])) { // convert POST to Cake named params (it's prettier than GET)
			$this->redirect(array_merge($this->params['named'], $this->data['Tutorial']));
		}
		$this->paginate = array(
			'published',
			'limit' => 20,
			'order' => 'Tutorial.title ASC',
			'conditions' => array(
			'in_index' => true
			),
			'contain' => array('LearningGoal', 'ResourceType', 'Tag'),
		);
		$user_search = array_intersect_key($this->params['named'], $this->Tutorial->allowedSearches);
		if (!empty($user_search)) {
			$hits = $this->Tutorial->search($user_search);
			if (!empty($hits)) {
			$this->paginate['conditions'][] = 'id IN (' . join(',', $hits) . ')';
			} else {
			$this->paginate['conditions']['id'] = 0; // how 'bout you just prevent the query entirely?
			}
		}

		$this->layout = 'institution';

		// This was used for printing the context, but no longer. It's still used for highlighting.
		$params = array_keys($this->params['named']);
		$results_context = array();
		if (!empty($params)) {
			$model = Inflector::camelize($params[0]);
			if ($model == 'Keyword') {
			$model = 'Tag';
			}
			if (isset($this->Tutorial->$model)) {
			$name = $this->Tutorial->$model->read('name', $this->params['named'][$params[0]]);
			$name = $name[$model]['name'];
			} else {
			$name = Sanitize::paranoid($this->params['named'][$params[0]], array(' '));
			}
			$results_context[$params[0]] = array(
			'model' => $params[0],
			'key' => strtolower(Inflector::singularize(Inflector::humanize(Inflector::tableize($params[0])))),
			'id' => Sanitize::paranoid($this->params['named'][$params[0]], array(' ')),
			'name' => $name,
			);
		} else {
			$results_context = array(
			'model' => '',
			'key' => '',
			'id' => 0,
			'name' => '',
			);
		}

		$this->set(compact('results_context'));

		$this->set('learningGoals', $this->Tutorial->LearningGoal->find('list'));
		$this->set('resourceTypes', $this->Tutorial->ResourceType->find('list'));
		$this->set('tutorials', $this->paginate());
	}

	function view($id = null, $revision_id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid tutorial'));
			$this->redirect(array('action' => 'index'));
			return;
		}
		$tutorial = $this->getTutorial($id, $revision_id);


		if (!$tutorial) {
			$this->redirect('/');
		}

		if ($tutorial['Tutorial']['tutorial_type_id'] == TUTORIAL_TYPE_EXTERNAL) {
			if (!empty($tutorial['Tutorial']['external_identifier'])) {
				$this->redirect($tutorial['Tutorial']['external_identifier']);
			} else {
				$this->redirect('/');
			}
		}

		// always use the user_url (slug) when viewing
		if (!empty($tutorial['Tutorial']['user_url']) && !isset($this->params['slug'])) {
			$this->redirect(array($id)); // the routing system will convert this to the slug URL
		}

		if (!$this->Auth->user() && !$tutorial['Tutorial']['published']) {
			$this->Session->setFlash(__('Invalid tutorial'));
			$this->redirect(array('action' => 'index'));
			return;
		}
		$id = $tutorial['Tutorial']['id'];
		$site_url = $tutorial['Tutorial']['url'];
		$title = $tutorial['Tutorial']['title'];
		$meta_description = strip_tags($tutorial['Tutorial']['description']);

		$chapters = $this->Tutorial->getChapters($tutorial['Tutorial']['id']);
		$has_quiz = !empty($tutorial['FinalQuiz']['id']);
		$quiz_index = 0;
		if ($has_quiz) {
			$quiz_index = count($this->Tutorial->getStepsWithContent($id));
		}
		$link_toc = $tutorial['Tutorial']['link_toc'];
		$title_for_layout = $title;
		$navbar = true;
		$popup = $tutorial['Tutorial']['popup'];
		if ($popup) {
			$this->layout = 'popup';
		} else {
			$this->layout = 'public';
		}

		// just to make sure the id exists in the database
		if (!empty($this->request->params['requested'])) {
			return compact('id', 'site_url', 'title', 'revision_id', 'chapters', 'has_quiz', 'link_toc', 'quiz_index',
			'meta_description', 'title_for_layout', 'popup');
		} else {
			$this->set(compact('id', 'site_url', 'title', 'revision_id', 'chapters', 'has_quiz', 'link_toc', 'quiz_index',
			'meta_description', 'title_for_layout', 'navbar', 'popup'));
		}

	}

/**
 * View the step-by-step mode by itself to support popup view.
 *
 * @param integer $id
 */
	function view_step_by_step_only($id = null) {
		$this->layout = 'public';
		$tutorial_data = $this->requestAction(array('action' => 'view', $id));
		$tutorial_data['navbar'] = false;
		$this->set($tutorial_data);
	}

	// TODO: DRY this action up (see view)
	function view_tutorial_only($id = null, $revision_id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid tutorial'));
			$this->redirect(array('action' => 'index'));
			return;
		}

		$tutorial = $this->getTutorial($id, $revision_id);

		if (!isset($tutorial['Tutorial']) || (!$this->Auth->user() && !$tutorial['Tutorial']['published'])) {
			$this->Session->setFlash(__('Invalid tutorial'));
			$this->redirect(array('action' => 'index'));
			return;
		}

		$this->set('chapters', $this->Tutorial->getChapters($tutorial['Tutorial']['id']));
		$this->set('steps', $this->Tutorial->getStepsWithContent($tutorial['Tutorial']['id']));
			$this->set('tutorial', $tutorial);
		$this->set('has_quiz', !empty($tutorial['FinalQuiz']['id']));
		$this->set('quiz_steps', $this->Tutorial->FinalQuiz->getStepsWithContent($tutorial['FinalQuiz']['id']));
		// This means that GA is not intended to be displayed ever on this page.
		$this->set('noGoogleAnalytics', true);
		$this->set('title_for_layout', $tutorial['Tutorial']['title']);
		$this->layout = 'public';
		//Configure::write('debug', 0);
		//Switch the datasources back (might be unnecessary).
		//$this->Tutorial->useDbConfig = 'default';
		//$this->Tutorial->FinalQuiz->useDbConfig = 'default';
	}

	public function add() {
		if (!empty($this->data)) {
			$this->data = array_merge($this->data, array('Revision' => array('message' => 'created')));
			$this->Tutorial->user_id = $this->Session->read('Auth.User.id');
			$this->Tutorial->create();
			if ($this->Tutorial->save($this->data)) {
				$this->Session->setFlash(__('The tutorial has been saved'));
				if ($this->data['Tutorial']['tutorial_type_id'] == TUTORIAL_TYPE_SIDEBYSIDE) {
					$this->redirect(array('action' => 'edit_content', $this->Tutorial->id));
				} elseif ($this->data['Tutorial']['tutorial_type_id'] == TUTORIAL_TYPE_EXTERNAL) {
					$this->redirect(array('action' => 'edit_external', $this->Tutorial->id));
				}
			} else {
				$this->Session->setFlash(__('The tutorial could not be saved.'));
			}
		}
		// See http://cakephp.lighthouseapp.com/projects/42648-cakephp/tickets/1688-form-helper-does-not-properly-auto-detect-options-for-multi-word-habtm-models
		$this->set('learningGoals', $this->Tutorial->LearningGoal->find('list'));
		$this->set('audiences', $this->Tutorial->Audience->find('list'));
		$this->set('subjects', $this->Tutorial->Subject->find('list'));
		$this->set('resourceTypes', $this->Tutorial->ResourceType->find('list'));
		$this->set('title_length', $this->Tutorial->validate['title']['checkTitleLength']['rule']['sidebyside']);
	}

	function add_external() {
		$this->add();
		$this->set('title_length', $this->Tutorial->validate['title']['checkTitleLength']['rule']['external']);
	}

	function edit_external($id) {
		$this->edit($id);
	}

	function edit($id) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid tutorial'));
			$this->redirect(array('action' => 'index'));
		}

		if (!empty($this->data)) {
			$this->Tutorial->user_id = $this->Session->read('Auth.User.id');

			// if you're not an admin and the user_url's been changed, change it back unless it started out empty.
			//   Broken links and whatnot.
			$tutorial = $this->Tutorial->findById($id);
			if (!($this->Session->read('Role.name') == 'admin')) {
				if (empty($tutorial['Tutorial']['user_url'])) {
					;
				} elseif (!($this->data['Tutorial']['user_url'] == $tutorial['Tutorial']['user_url'])) {
					$this->data['Tutorial']['user_url'] = $tutorial['Tutorial']['user_url'];
				}
			}

			if ($this->Tutorial->saveAll($this->data)) {
				$this->Tutorial->read();
				$this->Session->setFlash(__('The tutorial has been saved'));
				if ($this->Tutorial->data['Tutorial']['tutorial_type_id'] == TUTORIAL_TYPE_SIDEBYSIDE) {
					$this->redirect(array('action' => 'edit_content', $id));
				} elseif ($this->Tutorial->data['Tutorial']['tutorial_type_id'] == TUTORIAL_TYPE_EXTERNAL) {
					$this->redirect(array('action' => 'edit_external', $id));
				}
			} else {
					$this->Session->setFlash(__('The tutorial could not be saved. Please try again.'));
			}
		}

		$this->Tutorial->recursive = 1; // get quiz
		$this->data = $this->Tutorial->findById($id);
		if (!$this->data) {
			$this->Session->setFlash(__('That tutorial doesn\'t exist.'));
			$this->redirect(array('action' => 'index'));
		}

		$has_quiz = false;
		if (!empty($this->data['FinalQuiz']['id'])) {
			$has_quiz = true;
		}
		$this->set(compact('has_quiz'));
		$this->set('user_url', $this->data['Tutorial']['user_url']);

		if ($this->data['Tutorial']['tutorial_type_id'] == TUTORIAL_TYPE_SIDEBYSIDE) {
			$length = $this->Tutorial->validate['title']['checkTitleLength']['rule']['sidebyside'];
		} else {
			$length = $this->Tutorial->validate['title']['checkTitleLength']['rule']['external'];
		}
		$this->set('title_length', $length);

		// See http://cakephp.lighthouseapp.com/projects/42648-cakephp/tickets/1688-form-helper-does-not-properly-auto-detect-options-for-multi-word-habtm-models
		$this->set('learningGoals', $this->Tutorial->LearningGoal->find('list'));
		$this->set('audiences', $this->Tutorial->Audience->find('list'));
		$this->set('subjects', $this->Tutorial->Subject->find('list'));
		$this->set('resourceTypes', $this->Tutorial->ResourceType->find('list'));
	}

	function edit_content($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid tutorial'));
			$this->redirect(array('action' => 'index'));
		}

		if (!empty($this->request->data)) {
			if (Configure::read('require_revision_message') && empty($this->data['Revision']['message'])) {
				if ($this->RequestHandler->isAjax()) {
					$error = array(
						'message' => 'A log message is required. Your tutorial has not been saved.',
						'success' => false
					);
					echo json_encode($error);
					exit();
				} else {
					$this->Session->setFlash(__('A log message is required. Your tutorial has not been saved.'));
					$tutorial = $this->Tutorial->findById($id);
					$this->set('tutorial_id', $tutorial['Tutorial']['id']);
					$this->set('published', $tutorial['Tutorial']['published']);
				}
			} else {
				$this->Tutorial->user_id = $this->Session->read('Auth.User.id');
				if ($this->Tutorial->save($this->request->data)) {
					if ($this->RequestHandler->isAjax()) {
						$error = array(
							'message' => __('The tutorial has been saved.'),
							'success' => true
						);
						echo json_encode($error);
						exit();
					} else {
						$this->Session->setFlash(__('The tutorial has been saved.'));
						$this->redirect(array('action' => 'edit_content', $id));
					}
				} else {
					if ($this->RequestHandler->isAjax()) {
						$error = array(
							'message' => __('The tutorial could not be saved. Please try again.'),
							'success' => false
						);
						echo json_encode($error);
						exit();
					} else {
						$this->Session->setFlash(__('The tutorial could not be saved. Please try again.'));
					}
				}
			}
		}

		$options = array(
			'recursive' => 0,
			'contains' => array('FinalQuiz'),
			'conditions' => array('Tutorial.id' => $id),
			'deleted' => 0
		);
		$this->data = $this->Tutorial->find('first', $options);
		$this->set('tutorial_title', $this->data['Tutorial']['title']);
		$this->set('title_for_layout', 'Edit ' . $this->data['Tutorial']['title']);
		$this->set('tutorial_id', $this->data['Tutorial']['id']);
		$this->set('published', $this->data['Tutorial']['published'] ? 1 : 0);

		$this->set('has_quiz', !empty($this->data['FinalQuiz']['id']));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for tutorial'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Tutorial->user_id = $this->Session->read('Auth.User.id');
		if ($this->Tutorial->delete($id)) {
			$this->Session->setFlash(__('Tutorial deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Tutorial was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	function restore_revision($id = null, $revision_id = null) {
		if (!$id || !$revision_id) {
			$this->Session->setFlash(__('Invalid id for tutorial'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Session->read('Role.name') != 'admin') {
			$this->redirect(array('action'=>'index'));
		}

		$current_tutorial = $this->Tutorial->findById($id);
		$user_url = $current_tutorial['Tutorial']['user_url'];
		$current_tutorial['Tutorial']['user_url'] = '';
		$this->Tutorial->save($current_tutorial);

		$revision = $this->Tutorial->Revision->findById($revision_id);
		$tutorial = unserialize($revision['Revision']['content']);
		unset($tutorial['Tutorial']['modified']);
		unset($tutorial['FinalQuiz']['modified']);
		$tutorial['Tutorial']['user_url'] = $user_url; // don't change the URL on restore
		$tutorial['Tutorial']['deleted'] = false;
		$tutorial['FinalQuiz']['no_revision'] = true;
		// TODO: preserve user_url
		$this->Tutorial->log_message = __('Restored from revision %d', $revision_id);
		$this->Tutorial->user_id = $this->Session->read('Auth.User.id');
		if ($this->Tutorial->saveAll($tutorial)) {
			$this->Session->setFlash(__('Revision restored'));
			$this->redirect(array('action'=>'index'));
		} else {
			$current_tutorial['Tutorial']['user_url'] = $user_url;
			$this->Tutorial->save($current_tutorial);
			$this->Session->setFlash(__('Revision was not restored'));
				$this->redirect(array('action'=>'index'));
		}
	}

	function publish($id = null) {
		if ($id) {
			if ($this->Tutorial->publish($id)) {
				if ($this->RequestHandler->isAjax()) {
					$this->layout = 'ajax';
					echo __('Published');
					exit();
				} else {
					$this->Session->setFlash(__('Tutorial published!'));
					$this->redirect(array('action' => 'edit_content', $id));
				}
			}
		} else {
			$this->Session->setFlash(__('Invalid id for tutorial'));
			$this->redirect(array('action' => 'index'));
		}
	}

	function unpublish($id = null) {
		if ($id) {
			if ($this->Tutorial->unpublish($id)) {
				if ($this->RequestHandler->isAjax()) {
					$this->layout = 'ajax';
					echo "Unpublished";
					exit();
				} else {
					$this->Session->setFlash(__('Tutorial unpublished!'));
					$this->redirect(array('action' => 'edit_content', $id));
				}
			}
		} else {
			$this->Session->setFlash(__('Invalid id for tutorial'));
			$this->redirect(array('action' => 'index'));
		}
	}

	function view_heading_image($type = 'chapter', $text = '') {
		$this->layout = 'image';

		$text = QH_urldecode($text);

		if ($type == 'chapter') {
			$string = ucfirst($type);
			if (!empty($text)) {
				$string .= ': ' . $text;
			}
		} elseif ($type == 'step') {
			$string = __('Page break');
			if (!empty($text)) {
				$string .= ': ' . $text;
			}
		} else {
			$string = __('Image creation error!');
		}

		$string = wordwrap(strip_tags($string), $this->number_of_characters, '\n', true);

		$text = explode('\n', $string);

		$number_of_lines = count($text);

		$box_height = $this->padding + ($this->line_height * $number_of_lines);
		$box_width = $this->padding * 2 + $this->number_of_characters * $this->character_width;

		$image = imagecreatetruecolor($box_width, $box_height);
		if ($type == 'chapter') {
			$background = imagecolorallocate($image, 97, 105, 117);
		} else {
			$background = imagecolorallocate($image, 135, 163, 214);
		}

		imagefill($image, 0, 0, $background);
		$white = imagecolorallocate($image, 255, 255, 255);

		$y = $this->padding + $this->character_height;
		foreach ($text as $line) {
			imagettftext($image, $this->font_size, 0, $this->padding, $y, $white, APP . 'Lib/unifont_5.1.20080907.ttf', $line);
			$y += $this->line_height;
		}

		header("Content-type: image/png");
		imagepng($image);
		imagedestroy($image);
		$this->autoRender = false;
	}

	function view_definition_image($link_text, $definition = '') {
		$this->layout = 'image';

		// see common.js and Steppable behavior
		$string = QH_urldecode($link_text);

		$string = wordwrap(strip_tags($string), $this->number_of_characters, '\n', true);

		$text = explode('\n', $string);

		$number_of_lines = count($text);

		$box_height = $this->padding + ($this->line_height * $number_of_lines);

		if (mb_strlen($string, 'UTF-8') < $this->number_of_characters) {
			$box_width = $this->padding * 2 + ($this->character_width * mb_strlen($string, 'UTF-8'));
		} else {
			$box_width = $this->padding * 2 + $this->number_of_characters * $this->character_width;
		}

		$image = imagecreatetruecolor($box_width, $box_height);
		$background = imagecolorallocate($image, 128, 194, 120);

		imagefill($image, 0, 0, $background);
		$white = imagecolorallocate($image, 255, 255, 255);

		$y = $this->padding + $this->character_height;
		foreach ($text as $line) {
			imagettftext($image, $this->font_size, 0, $this->padding, $y, $white, APP . 'Lib/unifont_5.1.20080907.ttf', $line);
			$y += $this->line_height;
		}

		header("Content-type: image/png");
		imagepng($image);
		imagedestroy($image);
		$this->autoRender = false;
	}

	function view_text_box_image($type = 'one-line', $prompt = '', $placeholder = '') {
		$this->layout = 'image';

		$text = QH_urldecode($prompt);

		if ($type == 'one-line' || $type == 'multi-line') {
			$string = ucfirst($type);
			if (!empty($text)) {
				$string .= ' ' . __('free response') . ': ' . $text;
			}
		} else {
			$string = __('Image creation error!');
		}

		$string = wordwrap(strip_tags($string), $this->number_of_characters, '\n', true);

		$text = explode('\n', $string);

		$number_of_lines = count($text);

		$box_height = $this->padding + ($this->line_height * $number_of_lines);
		$box_width = $this->padding * 2 + $this->number_of_characters * $this->character_width;

		$image = imagecreatetruecolor($box_width, $box_height);

		$black = imagecolorallocate($image, 0, 0, 0);
		$white = imagecolorallocate($image, 255, 255, 255);

		imagefill($image, 0, 0, $white);
		imagerectangle($image, 0, 0, $box_width - 1, $box_height - 1, $black);

		$y = $this->padding + $this->character_height;
		foreach ($text as $line) {
			imagettftext($image, $this->font_size, 0, $this->padding, $y, $black, APP . 'Lib/unifont_5.1.20080907.ttf', $line);
			$y += $this->line_height;
		}

		header("Content-type: image/png");
		imagepng($image);
		imagedestroy($image);
		$this->autoRender = false;
	}

	function provide_feedback($id = null, $mode = null) {
		$this->set('noGoogleAnalytics', true);
		if (!$id || !is_numeric($id))  {
			return false;
		} else {
			$this->Tutorial->recursive = -1;
			$tutorial = $this->Tutorial->read(null, $id);

			$action = 'view';
			if ('single_page' === $mode) {
				$action .= '_'.$mode;
			}

			if (!empty($this->data)) {
				$email_success = true;
				$body = __('From') . ': ' . htmlentities($this->data['Tutorial']['from_name']) .
					"<br>" . __('Email') . ": " . htmlentities($this->data['Tutorial']['from_email']) .
					"<br><br>" .
					htmlentities($this->data['Tutorial']['comment']);
				$tutorialUrl = Router::url(array('action' => $action, $id), true);
				$body .= "<p>" . __('This feedback was sent from %s', $tutorialUrl) . "</p>";

				$message = new CakeEmail('default');
				$message->subject(__('Feedback for %s tutorial', $tutorial['Tutorial']['title']));
				$message->emailFormat('html');

				$to_array = explode(',', Configure::read('user_config.email.send_all_feedback_to'));
				$to_array[] = $tutorial['Tutorial']['contact_email'];

				foreach ($to_array as $to) {
						$message->addBcc(trim($to));
				}

				try {
						// haddress ("Honeypot address") is the honeypot field.
						// If it's filled out, pretend to send, but don't really.
						if (empty($this->data['Tutorial']['haddress'])) {
								$message->send($body);
						}
						echo "success";
						exit();
				} catch (Exception $e) {
						echo $e->getMessage();
						exit();
				}

			} else {
				$this->layout = 'public';
				$this->set(compact('tutorial', 'mode'));
			}
		}
	}

	function view_certificate() {
		if (empty($this->request->data)) {
			return __('This certificate cannot be generated.');
		} else {
			$is_tutorial = false;
			$is_quiz = false;
			$this->set('tutorial_grades', array());
			$this->set('quiz_grades', array());

			if (array_key_exists('tutorial_id', $this->request->data) && is_numeric($this->request->data['tutorial_id'])) {
				$tutorial = $this->Tutorial->read(null, $this->request->data['tutorial_id']);
				if ($tutorial['Tutorial']['certificate']) {
						$is_tutorial = true;
						$subject = $tutorial['Tutorial']['title'];
						if (!isset($this->request->data['questions'])) {
							$this->request->data['questions'] = array();
						}
						$this->set('tutorial_grades', $this->Tutorial->grade($this->request->data['tutorial_id'],
								$this->request->data['questions']));
				}
			}

			if (!isset($this->request->data['free-response'])) {
				$this->request->data['free-response'] = array();
			}
			$this->set('free_responses', $this->request->data['free-response']);

			if (array_key_exists('quiz_id', $this->request->data) && is_numeric($this->request->data['quiz_id'])) {
				$final_quiz = $this->Tutorial->FinalQuiz->read(null, $this->request->data['quiz_id']);
				if ($final_quiz['FinalQuiz']['certificate']) {
						$is_quiz = true;
						$subject = $final_quiz['Tutorial']['title'];
						if (!isset($this->request->data['questions'])) {
							$this->request->data['questions'] = array();
						}
						$this->set('quiz_grades', $this->Tutorial->FinalQuiz->grade($this->request->data['quiz_id'], $this->request->data['questions']));
				}
			}

			// parse supplied email fields

			if ($is_tutorial || $is_quiz) {
				$to_string = '';
				if (!empty($tutorial['Tutorial']['certificate_email'])) {
					$to_string .= $tutorial['Tutorial']['certificate_email'];
				}
				if (!empty($this->request->data['certificate_email'])) {
					if (!empty($to_string)) {
						$to_string .= ',';
					}
					$to_string .= $this->request->data['certificate_email'];
				}

				$this->set('date', date('F j, Y'));
				$this->set('time', date('g:ia'));
				$this->set('name', Sanitize::paranoid($this->request->data['certificate_name'], array(' ')));
				$this->set('title', $subject);

				$message = new CakeEmail('default');
				$message->subject(__('Certificate of Completion for %s', $subject));
				$message->template('certificate_of_completion');
				$message->emailFormat('html');
				$message->viewVars($this->viewVars);

				$to_array = explode(',', $to_string);
				foreach ($to_array as $key => $to) {
					if ($to == 'Emailaddresses' || empty($to)) {
						unset($to_array[$key]);
						continue;
					}
					$message->addBcc(trim($to));
				}

				try {
						$message->send();
						$email_success = true;
				} catch (Exception $e) {
						$email_success = $e->getMessage();
				}

				$this->viewPath = 'Emails/html';
				$this->layout = 'Emails/html/default';
				$this->set('dialog', true);

				if (empty($to_array)) {
						$this->Session->setFlash(__('This certificate could not be emailed because no email addresses were supplied.'));
				} else {
						if (true === $email_success) {
							$this->Session->setFlash(__('The following message was sent.'));
						} else {
							$this->Session->setFlash(__('The following message could <strong>not</strong> be sent.'));
						}
				}

				return $this->render('certificate_of_completion');
			} else {
				return __('This certificate cannot be generated.');
			}
		}
	}
}
