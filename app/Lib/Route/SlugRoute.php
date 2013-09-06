<?php
App::uses('ClassRegistry', 'Utility');
// See http://mark-story.com/posts/view/using-custom-route-classes-in-cakephp

class SlugRoute extends CakeRoute {
  function parse($url) {
    $params = parent::parse($url);

    if (empty($params)) {
        return false;
    }
    
    $this->Tutorial = ClassRegistry::init('Tutorial');

    $tutorial = $this->Tutorial->find('first', array(
        'conditions' => array('Tutorial.user_url' => $params['slug']),
        'recursive' => -1
    ));

    if (!empty($tutorial)) {
      $params['pass'][] = $tutorial['Tutorial']['id'];
      return $params;
    } else {
      return false;
    }
    return false;
  }

  function match($params) {
    if (empty($params) || !isset($params[0])
      || ($params['controller'] != 'tutorials') || (($params['action'] != 'view') && ($params['action'] != 'view_single_page'))) {
        return false;
    }

    // don't rewrite the url for revisions
    if (isset($params[1])) {
      return false;
    }
    
    $this->Tutorial = ClassRegistry::init('Tutorial');
    
    $tutorial = $this->Tutorial->find('first', array(
        'conditions' => array('Tutorial.id' => $params[0]),
        'recursive' => -1
    ));

    if (!empty($tutorial) && !empty($tutorial['Tutorial']['user_url'])) {
      if ('view' === $params['action']) {
        return 'tutorial/' . $tutorial['Tutorial']['user_url'];
      }
      if ('view_single_page' === $params['action']) {
        return 'tutorial/'.$tutorial['Tutorial']['user_url'].'/single-page';
      }

    } else {
      return false;
    }
  }
}