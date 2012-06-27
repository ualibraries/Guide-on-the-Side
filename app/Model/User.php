<?php
class User extends AppModel {

  var $validate = array(
    'username' => array(
      'notempty',
      'unique' => array('rule' => 'isUnique', 'message' => 'That username has been taken.'),
      'alphaNumeric' => array('rule' => 'alphaNumeric', 'message' => 'Usernames can only have letters and numbers.'),
    ),
    'password' => array(
      'notempty' => array('rule' => 'notempty', 'message' => 'Password may not be empty.', 'last' => true),
      'match' => array('rule' => 'comparePasswords', 'message' => 'Passwords do not match.', 'last' => true),
      'complex' => array('rule' => 'enforceComplexity', 'last' => true,
        'message' => 'Password must have at least one uppercase letter, one lowercase letter, and one number.'),
      'length' => array('rule' => array('minLength', 10), 'last' => true,
        'message' => 'Password must be at least 10 characters long.'),
    )
  );

	var $belongsTo = array('Role');

  function comparePasswords($check) {
    $keys = array_keys($check);
    $field_name = $keys[0];
    return $check[$field_name] == $this->data['User'][$field_name . '_confirmation'];
  }

  function enforceComplexity($check) {
    $passes = true;
    $keys = array_keys($check);
    $field_name = $keys[0];
    if (!preg_match('/[A-Z]/', $check[$field_name])) {
      $passes = false;
    } elseif (!preg_match('/[a-z]/', $check[$field_name])) {
      $passes = false;
    } elseif (!preg_match('/[0-9]/', $check[$field_name])) {
      $passes = false;
    }
    return $passes;
  }

  function beforeValidate() {
    if ($this->data['User']['keep_password']) {
      // don't validate and don't let the password be set
      unset($this->validate['password']);
      unset($this->data['User']['password']);
    }
  }

  function beforeSave() {
    if (!$this->data['User']['keep_password']) {
      $this->data['User']['password'] = sha1(Configure::read('Security.salt') . $this->data['User']['password']);
    }
    return parent::beforeSave();
  }

  public $_findMethods = array('undeleted' => true);

  public function beforeFind($queryData = array()) {
    // TODO: Have a way of restoring users? This makes that basically impossible.
    $queryData['conditions']['User.deleted'] = false;
    return $queryData;
  }

  public function delete($id = null) {
    if (is_numeric($id)) {
      $user = $this->findById($id);
      if (!$user['User']['deleted']) {
        $user['User']['deleted'] = true;
        $this->data['User']['keep_password'] = false;
        if ($this->save($user, false)) {
          return true;
        }
      }
    }
  }

}
?>