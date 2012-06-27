<?php
class SystemController extends AppController {

  var $uses = array();

  function beforeFilter() {
    $this->Auth->allow('install');
  }

  public function install() {
//    $install_complete = $this->System->find('first', array('conditions' => array('name' => 'install_complete')));
    // TODO: finish installer
    $install_complete = '0';
    if ($install_complete != '1') {
      App::import('Lib', 'Migrations.MigrationVersion');

      $migration = new MigrationVersion();
      $output = $this->_runLatest($migration, 'app');

      uses('folder');
      $plugins_dir = new Folder(APP.'plugins');
      $plugins = $plugins_dir->read(true, true);

      $plugins = $plugins[0]; // only the directories
      foreach($plugins as $plugin) {
        $output = $this->_runLatest($migration, $plugin);
      }

      $this->set(compact('output'));

      unset($migration);
    } else {
      $this->redirect('/login');
    }
  }

  protected function _runLatest(&$migration, $type) {
    $available_migrations = $migration->getMapping($type);
    if (!empty($available_migrations)) {
      end($available_migrations);
      $latest = key($available_migrations);
      return $migration->run(array('direction' => 'up', 'version' => $latest, 'type' => $type));
    }
  }
}