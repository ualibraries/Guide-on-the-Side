<?php

App::import('Helper', 'TinyMCE.TinyMCE');

// Overriding the helper allows us to include TinyMCE plugins from outside the TinyMCE directory
//   and specify the configuration for all controllers.
class QuickhelpTinymceHelper extends TinyMCEHelper {

public function beforeRender() {

    $common_configs = array(
      'mode' => 'textareas',
      'theme' => 'advanced',
      'plugins' => 'paste,template,inlinepopups,-phpimage,xhtmlxtras',
      'gecko_spellcheck' => 'true',
      'theme_advanced_statusbar_location' => 'bottom',
      'theme_advanced_resizing' => 'true',
      'theme_advanced_buttons1' => 'bold,italic,separator,undo,redo,separator,link,unlink,' .
        'separator,bullist,indent,outdent,separator,phpimage,separator,pastetext,selectall',
      'theme_advanced_buttons2' => '',
      'theme_advanced_buttons3' => '',
      'theme_advanced_resizing_max_width' => 520,
      'theme_advanced_resizing_max_height' => 900,
      'content_css' => "http://fonts.googleapis.com/css?family=PT+Sans|Crimson Text," .
        "{$this->webroot}css/tinymce_content.css",
      'document_base_url' => $this->webroot,
      'theme_advanced_link_targets' => "Site (right) frame=site-frame",
      'keep_styles' => false,
      'convert_urls' => false,
      'theme_advanced_resizing_use_cookie' => true,
      'paste_remove_styles' => true,
      'paste_remove_spans' => true,
      'paste_text_sticky' => true,
    );

    $tutorial_configs = array(
      'plugins' => $common_configs['plugins'] . ',-quickhelp,',
      'editor_selector' => 'mceQuickHelp',
      'theme_advanced_buttons2' => $common_configs['theme_advanced_buttons2'] .
        ',qhBtnHeading,qhBtnQuestion,qhBtnDefinition,qhBtnTextBox',
    );

    $simple_configs = array(
      'editor_selector' => 'mceQuickHelpSimple',
    );

    $this->configs = array(
      // includes the quickhelp plugin
      'QuickHelp' => array_merge($common_configs, $tutorial_configs),

      // for the description box and all tinymce dialog boxes
      'QuickHelp_simple' => array_merge($common_configs, $simple_configs),
    );

    parent::beforeRender();
    $this->Html->script('tinymce_plugins/phpimage/editor_plugin', false);
    $this->Html->script('tinymce_plugins/quickhelp/editor_plugin', false);
  }
}