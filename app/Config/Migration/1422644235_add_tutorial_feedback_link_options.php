<?php
class AddTutorialFeedbackLinkOptions extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 * @access public
 */
	public $description = '';

/**
 * Actions to be performed
 *
 * @var array $migration
 * @access public
 */
	public $migration = array(
		'up' => array(
			'create_field' => array(
				'tutorials' => array(
					'custom_feedback_link_text' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8', 'after' => 'popup'),
					'show_feedback_link' => array('type' => 'boolean', 'null' => false, 'default' => '1', 'after' => 'custom_feedback_link_text'),
				),
			),
		),
		'down' => array(
			'drop_field' => array(
				'tutorials' => array('custom_feedback_link_text', 'show_feedback_link',),
			),
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function after($direction) {
		return true;
	}
}
