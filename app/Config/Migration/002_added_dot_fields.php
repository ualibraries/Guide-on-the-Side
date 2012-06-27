<?php
if(!class_exists('AppMigration')) {
  if (file_exists(APP . 'AppMigration.php')) {
    include APP . 'AppMigration.php';
  } 
}

class M4db9fcc4348449dca1d756749ab05d96 extends AppMigration {

/**
 * Migration description
 *
 * @var string
 * @access public
 */
	var $description = '';

/**
 * Actions to be performed
 *
 * @var array $migration
 * @access public
 */
	var $migration = array(
		'up' => array(
			'create_table' => array(
				'audiences' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
					'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 2048, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM'),
				),
				'audiences_tutorials' => array(
					'audience_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
					'tutorial_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
					'indexes' => array(
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM'),
				),
				'keywords' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
					'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 2048, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM'),
				),
				'keywords_tutorials' => array(
					'keyword_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
					'tutorial_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
					'indexes' => array(
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM'),
				),
				'learning_goals' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
					'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 2048, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM'),
				),
				'learning_goals_tutorials' => array(
					'learning_goal_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
					'tutorial_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
					'indexes' => array(
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM'),
				),
				'resource_types' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
					'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 2048, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM'),
				),
				'resource_types_tutorials' => array(
					'resource_type_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
					'tutorial_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
					'indexes' => array(
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM'),
				),
				'subjects' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
					'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 2048, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM'),
				),
				'subjects_tutorials' => array(
					'subject_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
					'tutorial_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
					'indexes' => array(
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM'),
				),
			),
      'rename_field' => array(
        'tutorials' => array(
          'description' => 'introduction',
        ),
      ),
			'create_field' => array(
				'tutorials' => array(
					'description' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'dot_creation_timestamp' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
					'dot_last_revision_timestamp' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
					'dot_ada_version' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
					'licensing' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 40, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'dot_url' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 2048, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'dot_source_path' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 2048, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
				),
			),
      
		),
		'down' => array(
			'drop_table' => array(
				'audiences', 'audiences_tutorials', 'keywords', 'keywords_tutorials', 'learning_goals', 'learning_goals_tutorials', 'resource_types', 'resource_types_tutorials', 'subjects', 'subjects_tutorials'
			),
			'drop_field' => array(
				'tutorials' => array('description', 'dot_creation_timestamp', 'dot_last_revision_timestamp', 'dot_ada_version', 'licensing', 'dot_url', 'dot_source_path',),
			),
      'rename_field' => array(
        'tutorials' => array(
          'introduction' => 'description',
        ),
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
	function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	function after($direction) {
    if ($direction === 'up') {
      $this->Audience = $this->generateModel('Audience');
      $audiences = array(
        array(
          'id' => 1,
          'name' => 'Early Career Undergraduate',
        ),
        array(
          'id' => 2,
          'name' => 'Mid-Career Undergraduate',
        ),
        array(
          'id' => 3,
          'name' => 'Graduate Students',
        ),
        array(
          'id' => 4,
          'name' => 'Distance Learners',
        ),
        array(
          'id' => 5,
          'name' => 'Faculty',
        ),
      );
      $this->output('insert_data', 'audiences (' . implode(', ', Set::extract('{n}.name', $audiences)) . ')');
      $this->Audience->saveAll($audiences);

      $this->LearningGoal = $this->generateModel('LearningGoal');
      $learning_goals = array(
        array(
          'id' => 1,
          'name' => 'Developing a Research Strategy',
        ),
        array(
          'id' => 2,
          'name' => 'Selecting Finding Tools',
        ),
        array(
          'id' => 3,
          'name' => 'Searching',
        ),
        array(
          'id' => 4,
          'name' => 'Using Finding Tool Features',
        ),
        array(
          'id' => 5,
          'name' => 'Retrieving Sources',
        ),        
        array(
          'id' => 6,
          'name' => 'Evaluating Sources',
        ),
        array(
          'id' => 7,
          'name' => 'Documenting Sources',
        ),
        array(
          'id' => 8,
          'name' => 'Understanding Economic, Legal, and Social Issues',
        ),
      );
      $this->output('insert_data', 'learning goals (' . implode(', ', Set::extract('{n}.name', $learning_goals)) . ')');
      $this->LearningGoal->saveAll($learning_goals);

      $this->ResourceType = $this->generateModel('ResourceType');
      $resource_types = array(
        array(
          'id' => 1,
          'name' => 'Assessment',
        ),
        array(
          'id' => 2,
          'name' => 'Database Tutorial',
        ),
        array(
          'id' => 3,
          'name' => 'Demonstration',
        ),
        array(
          'id' => 4,
          'name' => 'Exercise',
        ),
        array(
          'id' => 5,
          'name' => 'Guide',
        ),
        array(
          'id' => 6,
          'name' => 'In-Class Activity',
        ),
        array(
          'id' => 7,
          'name' => 'Lecture',
        ),
        array(
          'id' => 8,
          'name' => 'Simulation',
        ),
        array(
          'id' => 9,
          'name' => 'Scenario',
        ),
      );
      $this->output('insert_data', 'resource types');
      $this->ResourceType->saveAll($resource_types);

      // TODO: should subjects be inserted here?
      //   Presumably we'd want to sync this with the DOD, and this is rather UA-specific
      $this->Subject = $this->generateModel('Subject');
      $subjects = array(
        array('id' => 1, 'name' => 'Books in Print'),
        array('id' => 2, 'name' => 'Botany'),
        array('id' => 3, 'name' => 'Business'),
        array('id' => 4, 'name' => 'Chemistry'),
        array('id' => 5, 'name' => 'Classics'),
        array('id' => 6, 'name' => 'Climatology/Meteorology'),
        array('id' => 7, 'name' => 'Communication'),
        array('id' => 8, 'name' => 'Computers/MIS'),
        array('id' => 9, 'name' => 'Criminal Justice'),
        array('id' => 10, 'name' => 'Current Events'),
        array('id' => 11, 'name' => 'Dance'),
        array('id' => 12, 'name' => 'Data Sets'),
        array('id' => 13, 'name' => 'Dissertations'),
        array('id' => 14, 'name' => 'Drama/Theater Arts'),
        array('id' => 15, 'name' => 'Economics'),
        array('id' => 16, 'name' => 'Education'),
        array('id' => 17, 'name' => 'Electronic Journals'),
        array('id' => 18, 'name' => 'Electronics'),
        array('id' => 19, 'name' => 'Engineering'),
        array('id' => 20, 'name' => 'English Literature'),
        array('id' => 21, 'name' => 'Film/Media Arts'),
        array('id' => 22, 'name' => 'Food'),
        array('id' => 23, 'name' => 'French Studies'),
        array('id' => 24, 'name' => 'Gay, Lesbian, Bisexual, Transgender Studies'),
        array('id' => 25, 'name' => 'Gender Studies'),
        array('id' => 26, 'name' => 'General Indexes to All Subjects'),
        array('id' => 27, 'name' => 'Geography'),
        array('id' => 28, 'name' => 'Geology'),
        array('id' => 29, 'name' => 'German Studies'),
        array('id' => 30, 'name' => 'Government'),
        array('id' => 31, 'name' => 'Health Sciences'),
        array('id' => 32, 'name' => 'History'),
        array('id' => 33, 'name' => 'Humanities'),
        array('id' => 34, 'name' => 'Journalism'),
        array('id' => 35, 'name' => 'Landscape Architecture'),
        array('id' => 36, 'name' => 'Languages'),
        array('id' => 37, 'name' => 'Latin American Studies'),
        array('id' => 38, 'name' => 'Law'),
        array('id' => 39, 'name' => 'Library Science'),
        array('id' => 40, 'name' => 'Life Sciences'),
        array('id' => 41, 'name' => 'Linguistics'),
        array('id' => 42, 'name' => 'Literature'),
        array('id' => 43, 'name' => 'Mathematics'),
        array('id' => 44, 'name' => 'Media Arts/Film'),
        array('id' => 45, 'name' => 'Medicine'),
        array('id' => 46, 'name' => 'Meteorology/Climatology'),
        array('id' => 47, 'name' => 'Mexican American Studies'),
        array('id' => 48, 'name' => 'Middle Eastern Studies'),
        array('id' => 49, 'name' => 'MIS'),
        array('id' => 50, 'name' => 'Multidisciplinary Indexes'),
        array('id' => 51, 'name' => 'Music'),
        array('id' => 52, 'name' => 'News/Newspapers'),
        array('id' => 53, 'name' => 'Nutrition'),
        array('id' => 54, 'name' => 'Patents'),
        array('id' => 55, 'name' => 'Philosophy'),
        array('id' => 56, 'name' => 'Photography'),
        array('id' => 57, 'name' => 'Physics'),
        array('id' => 58, 'name' => 'Planning (Urban Design, etc.)'),
        array('id' => 59, 'name' => 'Plants'),
        array('id' => 60, 'name' => 'Politics'),
        array('id' => 61, 'name' => 'Psychology'),
        array('id' => 62, 'name' => 'Public Policy'),
        array('id' => 63, 'name' => 'Religion'),
        array('id' => 64, 'name' => 'Russian and Slavic Studies'),
        array('id' => 65, 'name' => 'Science (General)'),
        array('id' => 66, 'name' => 'Social Sciences (General)'),
        array('id' => 67, 'name' => 'Sociology'),
        array('id' => 68, 'name' => 'Spanish and Portuguese'),
        array('id' => 69, 'name' => 'Spatial Data'),
        array('id' => 70, 'name' => 'Standards'),
        array('id' => 71, 'name' => 'Technical Reports'),
        array('id' => 72, 'name' => 'Theater Arts/Drama'),
        array('id' => 73, 'name' => 'Trademarks'),
        array('id' => 74, 'name' => 'Transportation'),
        array('id' => 75, 'name' => 'Water'),
        array('id' => 76, 'name' => "Women's Studies"),
        array('id' => 77, 'name' => 'Zoology'),
      );
      $this->output('insert_data', 'subjects');
      $this->Subject->saveAll($subjects);

      if (isset($this->callback)) { // currently this just outputs a line break to the CLI
        $this->callback->afterMigration($this->callback, $direction);
      }
    }
		return true;
	}
}
?>