<?php

class UsersController extends AppController {

  var $paginate =
    array(
        'limit' => 10,
        'order' => 'username ASC',
        'recursive' => 0,
    );

    function beforeFilter() {
        parent::beforeFilter();
        $user = $this->Auth->user();
        if (!in_array($this->action, $this->Auth->allowedActions)) { // if the action is not public
            if (($this->action == 'edit') && ($user['id'] == $this->passedArgs[0]) && 
                (!$this->Auth->user('noLoginForm'))) {
                ; // fall through to allow user to change password
            } elseif (!$user || !($this->Session->read('Role.name') == 'admin')) {
                // if they're not logged in or not admin
                $this->redirect(array('controller' => 'tutorials'));
                return;
            }
        }
    }

	function index() {
		$this->set('users', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid user'));
			$this->Session->setFlash(__('Invalid user'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function add() {
        $hasLoginForm = !$this->Auth->user('noLoginForm');

		if (!empty($this->data)) {
      $this->data['User']['keep_password'] = false;
      if (!$hasLoginForm) {
        $this->data['User']['password'] = sha1(date('Y-m-d H:i:s') . mt_rand());
        $this->data['User']['password'] .= strtoupper($this->data['User']['password']);
        // because the User model validates on this
        $this->data['User']['password_confirmation'] = $this->data['User']['password']; 
      }
      $this->User->create();
      if ($this->User->save($this->data)) {
        $this->Session->setFlash(__('The user has been saved'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The user could not be saved. Please try again.'), 'default',
            array('class' => 'page-error message'));
      }
    }
		
		$roles = $this->User->Role->find('list');
		$this->set(compact('roles', 'hasLoginForm'));
	}

	function edit($id = null) {
        $hasLoginForm = !$this->Auth->user('noLoginForm');
        $user_is_self = ($this->Auth->user('id') == $id);
        $this->User->id = $id;
  
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid user'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
          $this->request->data['User']['keep_password'] = false;
          if (!$hasLoginForm) { // Assuming that the only time we have a password field is when we have a form
            $this->request->data['User']['keep_password'] = true;
          } else {
            // if empty, don't change password
            if (empty($this->request->data['User']['password']) && empty($this->request->data['User']['password_confirmation'])) {
              $this->request->data['User']['keep_password'] = true;
            }      
          }
          if ($user_is_self) { // don't allow user to change own username or role
            $user = $this->User->findById($id);
            if (isset($this->request->data['User']['username'])) {
              $this->Session->setFlash("Don't change yourself. I like you the way you are.");
              $this->request->data['User']['username'] = $user['User']['username'];
            }
            if (isset($this->request->data['User']['role_id'])) {
              $this->Session->setFlash("Don't change yourself. I like you the way you are.");
              $this->request->data['User']['role_id'] = $user['User']['role_id'];
            }
          }
        if ($this->User->save($this->data)) {
	  	  $this->Session->setFlash(__('The user has been saved'));
		    $this->redirect(array('action' => 'index'));
			} else {
  		  $this->Session->setFlash(__('The user could not be saved. Please try again.'));
			}
 		}
		if (empty($this->request->data)) {
			$this->request->data = $this->User->read(null, $id);
		}
        if (!$hasLoginForm && $user_is_self) {
          $this->Session->setFlash("Don't change yourself. I like you the way you are.");
          $this->redirect(array('action' => 'index'));
        }
		$roles = $this->User->Role->find('list');
		$this->set(compact('roles', 'hasLoginForm', 'user_is_self'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for user'));
			$this->redirect(array('action'=>'index'));
		}
    if ($this->Auth->user('id') == $id) {
      $this->Session->setFlash(__("Don't delete yourself!"));
		  $this->redirect(array('action' => 'index'));
    } else {
      if ($this->User->delete($id)) {
        $this->Session->setFlash(__('User deleted'));
        $this->redirect(array('action'=>'index'));
      }
    }
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
?>