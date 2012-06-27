<?php
class FinalQuizzesController extends AppController {

  function beforeFilter() {
    parent::beforeFilter();
    $this->helpers[] = 'QuickhelpTinyMce';
  }

	function index() {
		$this->FinalQuiz->recursive = 0;
		$this->set('finalQuizzes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid final quiz'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('finalQuiz', $this->FinalQuiz->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->FinalQuiz->create();
			if ($this->FinalQuiz->save($this->data)) {
				$this->Session->setFlash(__('The quiz has been saved'));
				$this->redirect(array('controller' => 'tutorials', 'action' => 'edit_content',
            $this->data['FinalQuiz']['tutorial_id']));
			} else {
				$this->Session->setFlash(__('The final quiz could not be saved. Please try again.'));
			}
		}
		$tutorials = $this->FinalQuiz->Tutorial->find('list');
		$this->set(compact('tutorials'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid final quiz'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->FinalQuiz->save($this->data)) {
				$this->Session->setFlash(__('The final quiz has been saved'));
				$this->redirect(array('controller' => 'tutorials', 'action' => 'edit_content',
            $this->data['FinalQuiz']['tutorial_id']));
      } else {
				$this->Session->setFlash(__('The final quiz could not be saved. Please try again.'));
        debug($this->FinalQuiz->validationErrors);
			}
		}
		if (empty($this->data)) {
			$this->data = $this->FinalQuiz->read(null, $id);
		}
		$tutorials = $this->FinalQuiz->Tutorial->find('list');
		$this->set(compact('tutorials'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for final quiz'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->FinalQuiz->delete($id)) {
			$this->Session->setFlash(__('Final quiz deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Final quiz was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
?>