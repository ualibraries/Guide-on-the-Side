<?php
/* Tag Fixture generated on: 2011-10-04 15:11:21 : 1317762681 */
class TagFixture extends CakeTestFixture {
	var $name = 'Tag';

	var $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'identifier' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 30, 'key' => 'index', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'keyname' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'weight' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 2),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'UNIQUE_TAG' => array('column' => array('identifier', 'keyname'), 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => '4e0e3805-3d9c-4a7d-9f9a-6eab968777eb',
			'identifier' => NULL,
			'name' => 'database searching, Handbook of North American Indians',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-a7e8-4e5b-90f8-6eab968777eb',
			'identifier' => NULL,
			'name' => 'database searching',
			'keyname' => 'databasesearching',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-7558-4235-86cb-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Handbook of North American Indians',
			'keyname' => 'handbookofnorthamericanindians',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-d8bc-43a9-b707-6eab968777eb',
			'identifier' => NULL,
			'name' => 'database searching, Handbook of North American Indians, subject sub- headings , human relations area files, sociological abstracts, social science citation index, anthropological citations',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-84cc-4262-944a-6eab968777eb',
			'identifier' => NULL,
			'name' => 'subject sub- headings',
			'keyname' => 'subjectsubheadings',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-3dec-4528-9836-6eab968777eb',
			'identifier' => NULL,
			'name' => 'human relations area files',
			'keyname' => 'humanrelationsareafiles',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-ec80-429c-a289-6eab968777eb',
			'identifier' => NULL,
			'name' => 'sociological abstracts',
			'keyname' => 'sociologicalabstracts',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-4dfc-42a5-899e-6eab968777eb',
			'identifier' => NULL,
			'name' => 'social science citation index',
			'keyname' => 'socialsciencecitationindex',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-e2c8-4de2-993b-6eab968777eb',
			'identifier' => NULL,
			'name' => 'anthropological citations',
			'keyname' => 'anthropologicalcitations',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-61fc-4ec5-b7d1-6eab968777eb',
			'identifier' => NULL,
			'name' => 'General Education Committee,Association of College and Research libraries,ACRL , ALA, subject librarians, designing learning activities,avoiding plagiarism|| faculty',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-e95c-4678-abf0-6eab968777eb',
			'identifier' => NULL,
			'name' => 'General Education Committee',
			'keyname' => 'generaleducationcommittee',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-833c-4d1b-b4f6-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Association of College and Research libraries',
			'keyname' => 'associationofcollegeandresearchlibraries',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-b380-43ef-86ec-6eab968777eb',
			'identifier' => NULL,
			'name' => 'ACRL',
			'keyname' => 'acrl',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-3780-4577-ba77-6eab968777eb',
			'identifier' => NULL,
			'name' => 'ALA',
			'keyname' => 'ala',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-b090-4cdb-b78e-6eab968777eb',
			'identifier' => NULL,
			'name' => 'subject librarians',
			'keyname' => 'subjectlibrarians',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-293c-434f-a046-6eab968777eb',
			'identifier' => NULL,
			'name' => 'designing learning activities',
			'keyname' => 'designinglearningactivities',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-3f54-472f-9fb7-6eab968777eb',
			'identifier' => NULL,
			'name' => 'avoiding plagiarism|| faculty',
			'keyname' => 'avoidingplagiarismfaculty',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-39a4-44fd-b643-6eab968777eb',
			'identifier' => NULL,
			'name' => 'source reliability, authoritative sources, fundamental skill, evaluation , source assessment, identifying research questions, content analysis',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-acd8-4aff-8c33-6eab968777eb',
			'identifier' => NULL,
			'name' => 'source reliability',
			'keyname' => 'sourcereliability',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-7214-4cfa-8e10-6eab968777eb',
			'identifier' => NULL,
			'name' => 'authoritative sources',
			'keyname' => 'authoritativesources',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-0a64-4589-9b9c-6eab968777eb',
			'identifier' => NULL,
			'name' => 'fundamental skill',
			'keyname' => 'fundamentalskill',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-b510-4ca6-b181-6eab968777eb',
			'identifier' => NULL,
			'name' => 'evaluation',
			'keyname' => 'evaluation',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-249c-4ea3-967d-6eab968777eb',
			'identifier' => NULL,
			'name' => 'source assessment',
			'keyname' => 'sourceassessment',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-d90c-4bf4-9340-6eab968777eb',
			'identifier' => NULL,
			'name' => 'identifying research questions',
			'keyname' => 'identifyingresearchquestions',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-760c-4d12-995a-6eab968777eb',
			'identifier' => NULL,
			'name' => 'content analysis',
			'keyname' => 'contentanalysis',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-1e28-4adf-bbc2-6eab968777eb',
			'identifier' => NULL,
			'name' => 'course guides,library resource organizer, tutorials, research guides,subject guides,LRO',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-8db4-4bbf-8b46-6eab968777eb',
			'identifier' => NULL,
			'name' => 'course guides',
			'keyname' => 'courseguides',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-fed0-4fd1-a18b-6eab968777eb',
			'identifier' => NULL,
			'name' => 'library resource organizer',
			'keyname' => 'libraryresourceorganizer',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-ae90-410b-a9a1-6eab968777eb',
			'identifier' => NULL,
			'name' => 'tutorials',
			'keyname' => 'tutorials',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-5bf8-4d52-82f3-6eab968777eb',
			'identifier' => NULL,
			'name' => 'research guides',
			'keyname' => 'researchguides',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-fc18-44dc-8311-6eab968777eb',
			'identifier' => NULL,
			'name' => 'subject guides',
			'keyname' => 'subjectguides',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-5a10-46b4-9170-6eab968777eb',
			'identifier' => NULL,
			'name' => 'LRO',
			'keyname' => 'lro',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-12f8-4dc0-9d1d-6eab968777eb',
			'identifier' => NULL,
			'name' => 'newspapers, book reviews , media, periodicals, American History , Canadian History',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-c508-4c16-b59d-6eab968777eb',
			'identifier' => NULL,
			'name' => 'newspapers',
			'keyname' => 'newspapers',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-991c-4033-9b34-6eab968777eb',
			'identifier' => NULL,
			'name' => 'book reviews',
			'keyname' => 'bookreviews',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-f64c-4a63-aebd-6eab968777eb',
			'identifier' => NULL,
			'name' => 'media',
			'keyname' => 'media',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-a288-40bf-9956-6eab968777eb',
			'identifier' => NULL,
			'name' => 'periodicals',
			'keyname' => 'periodicals',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-4c08-4ffe-bfaa-6eab968777eb',
			'identifier' => NULL,
			'name' => 'American History',
			'keyname' => 'americanhistory',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-f394-44a0-8e50-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Canadian History',
			'keyname' => 'canadianhistory',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-6704-4260-b65b-6eab968777eb',
			'identifier' => NULL,
			'name' => 'primary research,evaluating sources,scholarly research',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-ab74-4393-a202-6eab968777eb',
			'identifier' => NULL,
			'name' => 'primary research',
			'keyname' => 'primaryresearch',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-1c90-460d-bddf-6eab968777eb',
			'identifier' => NULL,
			'name' => 'evaluating sources',
			'keyname' => 'evaluatingsources',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-d808-47c6-9137-6eab968777eb',
			'identifier' => NULL,
			'name' => 'scholarly research',
			'keyname' => 'scholarlyresearch',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-89a4-43dd-a678-6eab968777eb',
			'identifier' => NULL,
			'name' => 'UA Code of Academic Integrity, citing sources, documenting resources, faculty,paraphrasing, research process, research log, detecting plagiarism, Writing Program Administrators, avoiding plagiarism strategy',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-b4f0-4a2d-8dfd-6eab968777eb',
			'identifier' => NULL,
			'name' => 'UA Code of Academic Integrity',
			'keyname' => 'uacodeofacademicintegrity',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-2288-4644-9948-6eab968777eb',
			'identifier' => NULL,
			'name' => 'citing sources',
			'keyname' => 'citingsources',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-d11c-4de7-9993-6eab968777eb',
			'identifier' => NULL,
			'name' => 'documenting resources',
			'keyname' => 'documentingresources',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-a724-496e-9b55-6eab968777eb',
			'identifier' => NULL,
			'name' => 'faculty',
			'keyname' => 'faculty',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-64f4-4f07-91c4-6eab968777eb',
			'identifier' => NULL,
			'name' => 'paraphrasing',
			'keyname' => 'paraphrasing',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-dde0-4e6e-9051-6eab968777eb',
			'identifier' => NULL,
			'name' => 'research process',
			'keyname' => 'researchprocess',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-62a8-42af-8bc4-6eab968777eb',
			'identifier' => NULL,
			'name' => 'research log',
			'keyname' => 'researchlog',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-ef40-48bc-880f-6eab968777eb',
			'identifier' => NULL,
			'name' => 'detecting plagiarism',
			'keyname' => 'detectingplagiarism',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-6d64-470f-bc8e-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Writing Program Administrators',
			'keyname' => 'writingprogramadministrators',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3805-9254-46c7-99a3-6eab968777eb',
			'identifier' => NULL,
			'name' => 'avoiding plagiarism strategy',
			'keyname' => 'avoidingplagiarismstrategy',
			'weight' => 0,
			'created' => '2011-07-01 15:11:33',
			'modified' => '2011-07-01 15:11:33'
		),
		array(
			'id' => '4e0e3806-0c7c-43be-a9a0-6eab968777eb',
			'identifier' => NULL,
			'name' => 'interlibrary loan , contacting librarians , reference , ask a librarian , study carrels, presentation practice rooms , express documents center , RefWorks , bibliographic management software, online resources, subject guides , tutorials , library catalog ',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-27a0-444e-a5c7-6eab968777eb',
			'identifier' => NULL,
			'name' => 'interlibrary loan',
			'keyname' => 'interlibraryloan',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-bb40-4ee3-8773-6eab968777eb',
			'identifier' => NULL,
			'name' => 'contacting librarians',
			'keyname' => 'contactinglibrarians',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-3770-49c5-bbfc-6eab968777eb',
			'identifier' => NULL,
			'name' => 'reference',
			'keyname' => 'reference',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-47ac-43d1-9e6e-6eab968777eb',
			'identifier' => NULL,
			'name' => 'ask a librarian',
			'keyname' => 'askalibrarian',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-0644-4e6a-a9b1-6eab968777eb',
			'identifier' => NULL,
			'name' => 'study carrels',
			'keyname' => 'studycarrels',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-b154-43cf-a82e-6eab968777eb',
			'identifier' => NULL,
			'name' => 'presentation practice rooms',
			'keyname' => 'presentationpracticerooms',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-4cc4-4963-8b6d-6eab968777eb',
			'identifier' => NULL,
			'name' => 'express documents center',
			'keyname' => 'expressdocumentscenter',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-966c-4354-8989-6eab968777eb',
			'identifier' => NULL,
			'name' => 'RefWorks',
			'keyname' => 'refworks',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-42a8-4fea-902e-6eab968777eb',
			'identifier' => NULL,
			'name' => 'bibliographic management software',
			'keyname' => 'bibliographicmanagementsoftware',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-f9d4-4c30-8995-6eab968777eb',
			'identifier' => NULL,
			'name' => 'online resources',
			'keyname' => 'onlineresources',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-a73c-46d7-b203-6eab968777eb',
			'identifier' => NULL,
			'name' => 'library catalog',
			'keyname' => 'librarycatalog',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-f148-48ea-8087-6eab968777eb',
			'identifier' => NULL,
			'name' => 'OPAC',
			'keyname' => 'opac',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-6064-4a3e-b849-6eab968777eb',
			'identifier' => NULL,
			'name' => 'writing assignments, research paper, essay, fundamental skill ,documenting sources, citing online resources',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-ab14-4004-a05a-6eab968777eb',
			'identifier' => NULL,
			'name' => 'writing assignments',
			'keyname' => 'writingassignments',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-3b0c-4d95-b42f-6eab968777eb',
			'identifier' => NULL,
			'name' => 'research paper',
			'keyname' => 'researchpaper',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-eeb4-4b79-8932-6eab968777eb',
			'identifier' => NULL,
			'name' => 'essay',
			'keyname' => 'essay',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-818c-49d3-8206-6eab968777eb',
			'identifier' => NULL,
			'name' => 'documenting sources',
			'keyname' => 'documentingsources',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-0cd4-4a90-86d7-6eab968777eb',
			'identifier' => NULL,
			'name' => 'citing online resources',
			'keyname' => 'citingonlineresources',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-9bac-410b-b8b2-6eab968777eb',
			'identifier' => NULL,
			'name' => 'identifying sources ,newspaper, oral histories ,memoirs, documents, monograph , periodicals',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-28a0-4590-9b08-6eab968777eb',
			'identifier' => NULL,
			'name' => 'identifying sources',
			'keyname' => 'identifyingsources',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-d02c-4c35-8412-6eab968777eb',
			'identifier' => NULL,
			'name' => 'newspaper',
			'keyname' => 'newspaper',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-90b8-4c87-a866-6eab968777eb',
			'identifier' => NULL,
			'name' => 'oral histories',
			'keyname' => 'oralhistories',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-f6e4-43e2-bc0c-6eab968777eb',
			'identifier' => NULL,
			'name' => 'memoirs',
			'keyname' => 'memoirs',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-c83c-4b42-9544-6eab968777eb',
			'identifier' => NULL,
			'name' => 'documents',
			'keyname' => 'documents',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-8800-4079-8fd5-6eab968777eb',
			'identifier' => NULL,
			'name' => 'monograph',
			'keyname' => 'monograph',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-09ec-443b-b0cb-6eab968777eb',
			'identifier' => NULL,
			'name' => 'identifying sources ,newspaper ,oral histories ,memoirs ,documents, raw material, periodicals',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-8c70-4286-ac91-6eab968777eb',
			'identifier' => NULL,
			'name' => 'raw material',
			'keyname' => 'rawmaterial',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-75b4-4386-aa42-6eab968777eb',
			'identifier' => NULL,
			'name' => 'autobiographies ,maps ,primary sources , topography ,library catalog record ,QuickHelp , side by side, OPAC',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-d3f8-4b12-932f-6eab968777eb',
			'identifier' => NULL,
			'name' => 'autobiographies',
			'keyname' => 'autobiographies',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-8bec-4afb-8c34-6eab968777eb',
			'identifier' => NULL,
			'name' => 'maps',
			'keyname' => 'maps',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-19b0-466c-84d1-6eab968777eb',
			'identifier' => NULL,
			'name' => 'primary sources',
			'keyname' => 'primarysources',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-35a4-493d-8797-6eab968777eb',
			'identifier' => NULL,
			'name' => 'topography',
			'keyname' => 'topography',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-bb98-445d-a880-6eab968777eb',
			'identifier' => NULL,
			'name' => 'library catalog record',
			'keyname' => 'librarycatalogrecord',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-6bbc-4fe0-85b5-6eab968777eb',
			'identifier' => NULL,
			'name' => 'QuickHelp',
			'keyname' => 'quickhelp',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-38c8-448d-8d79-6eab968777eb',
			'identifier' => NULL,
			'name' => 'side by side',
			'keyname' => 'sidebyside',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-bc48-4f5c-bf7c-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Library catalog, Finding research articles ,literature ,sample essays, example assignments, my hideous progeny , Academic Search Complete , ASC, literature resource center , EBSCO',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-b680-49b3-933f-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Finding research articles',
			'keyname' => 'findingresearcharticles',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-7e78-4ea8-a14c-6eab968777eb',
			'identifier' => NULL,
			'name' => 'literature',
			'keyname' => 'literature',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-2730-408a-88a0-6eab968777eb',
			'identifier' => NULL,
			'name' => 'sample essays',
			'keyname' => 'sampleessays',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-7718-4b53-b5fe-6eab968777eb',
			'identifier' => NULL,
			'name' => 'example assignments',
			'keyname' => 'exampleassignments',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-25ac-47e0-beca-6eab968777eb',
			'identifier' => NULL,
			'name' => 'my hideous progeny',
			'keyname' => 'myhideousprogeny',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-cba8-43ed-a0bc-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Academic Search Complete',
			'keyname' => 'academicsearchcomplete',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-6e84-460f-8e72-6eab968777eb',
			'identifier' => NULL,
			'name' => 'ASC',
			'keyname' => 'asc',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-d2bc-46a3-b9bb-6eab968777eb',
			'identifier' => NULL,
			'name' => 'literature resource center',
			'keyname' => 'literatureresourcecenter',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-8ab0-4ca5-864f-6eab968777eb',
			'identifier' => NULL,
			'name' => 'EBSCO',
			'keyname' => 'ebsco',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-de50-47c6-9f18-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Earth Sciences , structure science , diffraction methods , symmetry data tables',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-594c-4194-9bd2-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Earth Sciences',
			'keyname' => 'earthsciences',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-0074-460b-87e3-6eab968777eb',
			'identifier' => NULL,
			'name' => 'structure science',
			'keyname' => 'structurescience',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-9928-4969-a55c-6eab968777eb',
			'identifier' => NULL,
			'name' => 'diffraction methods',
			'keyname' => 'diffractionmethods',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-d970-4a6a-b0fb-6eab968777eb',
			'identifier' => NULL,
			'name' => 'symmetry data tables',
			'keyname' => 'symmetrydatatables',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-a064-4efa-95fd-6eab968777eb',
			'identifier' => NULL,
			'name' => 'self assessment ,quizzes,printable, primary and secondary sources ,evaluating research articles',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-9e20-4150-a8ae-6eab968777eb',
			'identifier' => NULL,
			'name' => 'self assessment',
			'keyname' => 'selfassessment',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-85bc-4883-b48f-6eab968777eb',
			'identifier' => NULL,
			'name' => 'quizzes',
			'keyname' => 'quizzes',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-fd18-4dbd-b11b-6eab968777eb',
			'identifier' => NULL,
			'name' => 'printable',
			'keyname' => 'printable',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-d7d0-47e7-8dd7-6eab968777eb',
			'identifier' => NULL,
			'name' => 'primary and secondary sources',
			'keyname' => 'primaryandsecondarysources',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-6c9c-4bef-b2f7-6eab968777eb',
			'identifier' => NULL,
			'name' => 'evaluating research articles',
			'keyname' => 'evaluatingresearcharticles',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-0c60-4711-9f16-6eab968777eb',
			'identifier' => NULL,
			'name' => 'writing assignments , research paper, essay, fundamental skill , documenting sources , citing borrowed ideas , academic integrity , plagiarism examples',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-c960-44e8-9174-6eab968777eb',
			'identifier' => NULL,
			'name' => 'citing borrowed ideas',
			'keyname' => 'citingborrowedideas',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-6ef8-43a5-862d-6eab968777eb',
			'identifier' => NULL,
			'name' => 'academic integrity',
			'keyname' => 'academicintegrity',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-f488-4056-8e84-6eab968777eb',
			'identifier' => NULL,
			'name' => 'plagiarism examples',
			'keyname' => 'plagiarismexamples',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-3110-4b65-ac4d-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Express Documents Center, EDC , document delivery, library research support',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-5a8c-4189-9d89-6eab968777eb',
			'identifier' => NULL,
			'name' => 'EDC',
			'keyname' => 'edc',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-98e0-4c67-a48d-6eab968777eb',
			'identifier' => NULL,
			'name' => 'document delivery',
			'keyname' => 'documentdelivery',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-2708-405d-9daf-6eab968777eb',
			'identifier' => NULL,
			'name' => 'library research support',
			'keyname' => 'libraryresearchsupport',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-cff4-49a3-9aaa-6eab968777eb',
			'identifier' => NULL,
			'name' => 'journalism, database searching,periodicals , tip sheet',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-922c-4db6-bf4e-6eab968777eb',
			'identifier' => NULL,
			'name' => 'journalism',
			'keyname' => 'journalism',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-3c10-4b0b-a357-6eab968777eb',
			'identifier' => NULL,
			'name' => 'tip sheet',
			'keyname' => 'tipsheet',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3806-2a8c-4cf7-92c8-6eab968777eb',
			'identifier' => NULL,
			'name' => 'copyright statute,campus policy, Office of Copyright Management & Scholarly Communication ,legal materials ,fair use of media materials ,online video ,copyright clearing center ,coalition for networked information ,American Libraries Association, Section ',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:34',
			'modified' => '2011-07-01 15:11:34'
		),
		array(
			'id' => '4e0e3807-e034-44ca-b4ff-6eab968777eb',
			'identifier' => NULL,
			'name' => 'copyright statute',
			'keyname' => 'copyrightstatute',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-3ce8-49af-922e-6eab968777eb',
			'identifier' => NULL,
			'name' => 'campus policy',
			'keyname' => 'campuspolicy',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-0e1c-491c-945d-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Office of Copyright Management & Scholarly Communication',
			'keyname' => 'officeofcopyrightmanagementscholarlycommunication',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-e424-4c55-bca5-6eab968777eb',
			'identifier' => NULL,
			'name' => 'legal materials',
			'keyname' => 'legalmaterials',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-a190-4e2f-acb7-6eab968777eb',
			'identifier' => NULL,
			'name' => 'fair use of media materials',
			'keyname' => 'fairuseofmediamaterials',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-2cfc-4e84-9a3d-6eab968777eb',
			'identifier' => NULL,
			'name' => 'online video',
			'keyname' => 'onlinevideo',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-5b4c-4460-a7b7-6eab968777eb',
			'identifier' => NULL,
			'name' => 'copyright clearing center',
			'keyname' => 'copyrightclearingcenter',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-e9d8-4a58-b5be-6eab968777eb',
			'identifier' => NULL,
			'name' => 'coalition for networked information',
			'keyname' => 'coalitionfornetworkedinformation',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-6d10-4a52-b019-6eab968777eb',
			'identifier' => NULL,
			'name' => 'American Libraries Association',
			'keyname' => 'americanlibrariesassociation',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-fcc8-45eb-93aa-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Section 107',
			'keyname' => 'section107',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-3b1c-41bc-b398-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Fair Use',
			'keyname' => 'fairuse',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-6d58-4507-89ba-6eab968777eb',
			'identifier' => NULL,
			'name' => 'contemporary issues, charts, maps, bibliography, factual Information, choosing a topic, English composition',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-cc58-4b82-884a-6eab968777eb',
			'identifier' => NULL,
			'name' => 'contemporary issues',
			'keyname' => 'contemporaryissues',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-97d4-41e8-bf9d-6eab968777eb',
			'identifier' => NULL,
			'name' => 'charts',
			'keyname' => 'charts',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-43ac-4f78-b263-6eab968777eb',
			'identifier' => NULL,
			'name' => 'bibliography',
			'keyname' => 'bibliography',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-b8b0-474a-8078-6eab968777eb',
			'identifier' => NULL,
			'name' => 'factual Information',
			'keyname' => 'factualinformation',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-6b2c-4552-a863-6eab968777eb',
			'identifier' => NULL,
			'name' => 'choosing a topic',
			'keyname' => 'choosingatopic',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-1c7c-4f78-9b70-6eab968777eb',
			'identifier' => NULL,
			'name' => 'English composition',
			'keyname' => 'englishcomposition',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-6a00-4af2-8397-6eab968777eb',
			'identifier' => NULL,
			'name' => 'periodical, legal research , search strategy , government documents , court decisions, journalism, law ,QuickHelp,side by side||activity',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-3c08-4c09-9d83-6eab968777eb',
			'identifier' => NULL,
			'name' => 'periodical',
			'keyname' => 'periodical',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-f078-42d3-83fc-6eab968777eb',
			'identifier' => NULL,
			'name' => 'legal research',
			'keyname' => 'legalresearch',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-91c4-4fe2-bd62-6eab968777eb',
			'identifier' => NULL,
			'name' => 'search strategy',
			'keyname' => 'searchstrategy',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-4760-4af0-a267-6eab968777eb',
			'identifier' => NULL,
			'name' => 'government documents',
			'keyname' => 'governmentdocuments',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-8d20-4a89-9713-6eab968777eb',
			'identifier' => NULL,
			'name' => 'court decisions',
			'keyname' => 'courtdecisions',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-1b48-420c-b5c4-6eab968777eb',
			'identifier' => NULL,
			'name' => 'law',
			'keyname' => 'law',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-9fac-45b6-b24d-6eab968777eb',
			'identifier' => NULL,
			'name' => 'side by side||activity',
			'keyname' => 'sidebysideactivity',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-fb50-4d70-bf59-6eab968777eb',
			'identifier' => NULL,
			'name' => 'search techniques, internet research, fundamental Skill evaluate search results',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-b3e8-4892-8f3e-6eab968777eb',
			'identifier' => NULL,
			'name' => 'search techniques',
			'keyname' => 'searchtechniques',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-4890-4440-a1ea-6eab968777eb',
			'identifier' => NULL,
			'name' => 'internet research',
			'keyname' => 'internetresearch',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-2668-428e-bb82-6eab968777eb',
			'identifier' => NULL,
			'name' => 'fundamental Skill evaluate search results',
			'keyname' => 'fundamentalskillevaluatesearchresults',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-f0a4-4cc2-9eec-6eab968777eb',
			'identifier' => NULL,
			'name' => 'biography resources, film , research skills, teaching, faculty, Frankenstein and Mary Shelly, Indivisible: Stories of American Community , documentaries, Langston Hughes , The Harlem Renaissance, American Indian Resources, storytelling, myth, metafiction,',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-544c-4d80-b15a-6eab968777eb',
			'identifier' => NULL,
			'name' => 'biography resources',
			'keyname' => 'biographyresources',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-dcd8-4c9a-87f5-6eab968777eb',
			'identifier' => NULL,
			'name' => 'film',
			'keyname' => 'film',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-9724-4d92-bf88-6eab968777eb',
			'identifier' => NULL,
			'name' => 'research skills',
			'keyname' => 'researchskills',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-4fe0-42ef-9054-6eab968777eb',
			'identifier' => NULL,
			'name' => 'teaching',
			'keyname' => 'teaching',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-af68-47a6-80b8-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Frankenstein and Mary Shelly',
			'keyname' => 'frankensteinandmaryshelly',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-69b4-4420-b6ca-6eab968777eb',
			'identifier' => 'Indivisible',
			'name' => 'Stories of American Community',
			'keyname' => 'storiesofamericancommunity',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-1780-4462-905d-6eab968777eb',
			'identifier' => NULL,
			'name' => 'documentaries',
			'keyname' => 'documentaries',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-b7a0-4ec1-aac0-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Langston Hughes',
			'keyname' => 'langstonhughes',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-1278-4919-b218-6eab968777eb',
			'identifier' => NULL,
			'name' => 'The Harlem Renaissance',
			'keyname' => 'theharlemrenaissance',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-eb3c-4ea0-a372-6eab968777eb',
			'identifier' => NULL,
			'name' => 'American Indian Resources',
			'keyname' => 'americanindianresources',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-a8a8-4c5d-8905-6eab968777eb',
			'identifier' => NULL,
			'name' => 'storytelling',
			'keyname' => 'storytelling',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-4544-400a-bd5c-6eab968777eb',
			'identifier' => NULL,
			'name' => 'myth',
			'keyname' => 'myth',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-7cf4-44dd-a408-6eab968777eb',
			'identifier' => NULL,
			'name' => 'metafiction',
			'keyname' => 'metafiction',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-10f8-4638-9c32-6eab968777eb',
			'identifier' => NULL,
			'name' => 'U.S.-Mexican Borderlands',
			'keyname' => 'usmexicanborderlands',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-9f84-486f-8c0c-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Vietnam War',
			'keyname' => 'vietnamwar',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-2ce4-4672-9a43-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Women\'s and Family Issues',
			'keyname' => 'womensandfamilyissues',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-8408-4c6f-a435-6eab968777eb',
			'identifier' => NULL,
			'name' => 'QuickHelp , side by side , Gale Imprint Primary Source Microform , eighteenth century , 1800\'s',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-1a0c-46fd-86cb-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Gale Imprint Primary Source Microform',
			'keyname' => 'galeimprintprimarysourcemicroform',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-bfa4-441b-bc0b-6eab968777eb',
			'identifier' => NULL,
			'name' => 'eighteenth century',
			'keyname' => 'eighteenthcentury',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-f880-4020-aeb8-6eab968777eb',
			'identifier' => NULL,
			'name' => '1800\'s',
			'keyname' => '1800s',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-9b38-4f69-b90a-6eab968777eb',
			'identifier' => NULL,
			'name' => 'interlibrary loan, ProQuest , UMI Dissertation Express',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-997c-450d-b0c6-6eab968777eb',
			'identifier' => NULL,
			'name' => 'ProQuest',
			'keyname' => 'proquest',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-4a04-474b-958f-6eab968777eb',
			'identifier' => NULL,
			'name' => 'UMI Dissertation Express',
			'keyname' => 'umidissertationexpress',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-b688-4925-a91c-6eab968777eb',
			'identifier' => NULL,
			'name' => 'OPAC,catalog searching,finding journal articles,accessing electronic resources, LexisNexis Academic Universe,database searching,QuickHelp, side by side,activity',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-140c-4407-b2ee-6eab968777eb',
			'identifier' => NULL,
			'name' => 'catalog searching',
			'keyname' => 'catalogsearching',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-f504-480d-8ef6-6eab968777eb',
			'identifier' => NULL,
			'name' => 'finding journal articles',
			'keyname' => 'findingjournalarticles',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-9bc8-441c-8117-6eab968777eb',
			'identifier' => NULL,
			'name' => 'accessing electronic resources',
			'keyname' => 'accessingelectronicresources',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-392c-4ef6-8894-6eab968777eb',
			'identifier' => NULL,
			'name' => 'LexisNexis Academic Universe',
			'keyname' => 'lexisnexisacademicuniverse',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-cd94-4126-8906-6eab968777eb',
			'identifier' => NULL,
			'name' => 'activity',
			'keyname' => 'activity',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-e898-4884-81bb-6eab968777eb',
			'identifier' => NULL,
			'name' => 'citation chaining, evaluating citations, references ,research strategy ,related research ,articles',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-e974-477d-b658-6eab968777eb',
			'identifier' => NULL,
			'name' => 'citation chaining',
			'keyname' => 'citationchaining',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-b680-4367-9e12-6eab968777eb',
			'identifier' => NULL,
			'name' => 'evaluating citations',
			'keyname' => 'evaluatingcitations',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-7450-4fba-9c34-6eab968777eb',
			'identifier' => NULL,
			'name' => 'references',
			'keyname' => 'references',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-32e8-4a21-8bf2-6eab968777eb',
			'identifier' => NULL,
			'name' => 'research strategy',
			'keyname' => 'researchstrategy',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-e118-4f26-ae16-6eab968777eb',
			'identifier' => NULL,
			'name' => 'related research',
			'keyname' => 'relatedresearch',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-86b0-4023-ab95-6eab968777eb',
			'identifier' => NULL,
			'name' => 'articles',
			'keyname' => 'articles',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-0240-452c-9f77-6eab968777eb',
			'identifier' => NULL,
			'name' => 'QuickHelp, side by side , newspapers , database research , case law , federal courts , state courts , landmark cases',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-6668-4859-86e7-6eab968777eb',
			'identifier' => NULL,
			'name' => 'database research',
			'keyname' => 'databaseresearch',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-1f24-4ea4-9fb4-6eab968777eb',
			'identifier' => NULL,
			'name' => 'case law',
			'keyname' => 'caselaw',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-c264-4ec5-bbbb-6eab968777eb',
			'identifier' => NULL,
			'name' => 'federal courts',
			'keyname' => 'federalcourts',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-5280-4fa1-83f4-6eab968777eb',
			'identifier' => NULL,
			'name' => 'state courts',
			'keyname' => 'statecourts',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-e814-4458-b9ab-6eab968777eb',
			'identifier' => NULL,
			'name' => 'landmark cases',
			'keyname' => 'landmarkcases',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3807-8c54-4127-9ec7-6eab968777eb',
			'identifier' => NULL,
			'name' => 'fundamental skill, evaluation , source assessment, identifying research questions, content analysis, activity',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:35',
			'modified' => '2011-07-01 15:11:35'
		),
		array(
			'id' => '4e0e3808-a9cc-4735-b9aa-6eab968777eb',
			'identifier' => NULL,
			'name' => 'writing venter , choosing a topic, selecting research topics, locating library materials ,finding scholarly articles, full text, fundamental skill ,model assignment',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-ff00-4be7-be04-6eab968777eb',
			'identifier' => NULL,
			'name' => 'writing venter',
			'keyname' => 'writingventer',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-e890-4c34-b55c-6eab968777eb',
			'identifier' => NULL,
			'name' => 'selecting research topics',
			'keyname' => 'selectingresearchtopics',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-84c8-4feb-ad60-6eab968777eb',
			'identifier' => NULL,
			'name' => 'locating library materials',
			'keyname' => 'locatinglibrarymaterials',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-3488-422a-9675-6eab968777eb',
			'identifier' => NULL,
			'name' => 'finding scholarly articles',
			'keyname' => 'findingscholarlyarticles',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-be64-4bdd-926f-6eab968777eb',
			'identifier' => NULL,
			'name' => 'full text',
			'keyname' => 'fulltext',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-4c28-49d1-83e9-6eab968777eb',
			'identifier' => NULL,
			'name' => 'model assignment',
			'keyname' => 'modelassignment',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-96f4-4263-b43a-6eab968777eb',
			'identifier' => NULL,
			'name' => 'dissertations ,theses ,RefWorks ,study carrels ,UA Code of Conduct ,Code of Academic Integrity',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-f018-488e-97ab-6eab968777eb',
			'identifier' => NULL,
			'name' => 'dissertations',
			'keyname' => 'dissertations',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-9de4-47b4-9415-6eab968777eb',
			'identifier' => NULL,
			'name' => 'theses',
			'keyname' => 'theses',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-35d0-488a-8c85-6eab968777eb',
			'identifier' => NULL,
			'name' => 'UA Code of Conduct',
			'keyname' => 'uacodeofconduct',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-c970-4257-bfa0-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Code of Academic Integrity',
			'keyname' => 'codeofacademicintegrity',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-d5e4-4d40-825e-6eab968777eb',
			'identifier' => NULL,
			'name' => 'call number location guide , periodicals , newspapers',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-6258-4f06-8a33-6eab968777eb',
			'identifier' => NULL,
			'name' => 'call number location guide',
			'keyname' => 'callnumberlocationguide',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-b644-4aa2-9705-6eab968777eb',
			'identifier' => NULL,
			'name' => 'beginning research ,academic integrity, catalog basics',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-57ac-47a8-b320-6eab968777eb',
			'identifier' => NULL,
			'name' => 'beginning research',
			'keyname' => 'beginningresearch',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-012c-44e7-a1f8-6eab968777eb',
			'identifier' => NULL,
			'name' => 'catalog basics',
			'keyname' => 'catalogbasics',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-3d58-41ae-bb42-6eab968777eb',
			'identifier' => NULL,
			'name' => 'archives , OPAC , rare books,bibliographic records , QuickHelp , side by side',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-dc18-4adc-ab31-6eab968777eb',
			'identifier' => NULL,
			'name' => 'archives',
			'keyname' => 'archives',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-8660-4c4b-865d-6eab968777eb',
			'identifier' => NULL,
			'name' => 'rare books',
			'keyname' => 'rarebooks',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-15b4-4604-91c6-6eab968777eb',
			'identifier' => NULL,
			'name' => 'bibliographic records',
			'keyname' => 'bibliographicrecords',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-48fc-4ad9-931f-6eab968777eb',
			'identifier' => NULL,
			'name' => 'articles ,journals,research tips,selecting sources,fundamental skill, English composition',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-0a90-4895-8970-6eab968777eb',
			'identifier' => NULL,
			'name' => 'journals',
			'keyname' => 'journals',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-e28c-406d-a9ea-6eab968777eb',
			'identifier' => NULL,
			'name' => 'research tips',
			'keyname' => 'researchtips',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-7820-48d2-9fc4-6eab968777eb',
			'identifier' => NULL,
			'name' => 'selecting sources',
			'keyname' => 'selectingsources',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-3034-4d50-9695-6eab968777eb',
			'identifier' => NULL,
			'name' => 'plagiarism , copyright , fair use ,QuickHelp , side by side , graphics , pictures , QuickHelp , side by side, images , citing sources',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-bf70-4edb-ae16-6eab968777eb',
			'identifier' => NULL,
			'name' => 'plagiarism',
			'keyname' => 'plagiarism',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-895c-4b3f-af35-6eab968777eb',
			'identifier' => NULL,
			'name' => 'copyright',
			'keyname' => 'copyright',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-1fb8-42cc-ae9e-6eab968777eb',
			'identifier' => NULL,
			'name' => 'graphics',
			'keyname' => 'graphics',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-a610-49c6-be3a-6eab968777eb',
			'identifier' => NULL,
			'name' => 'pictures',
			'keyname' => 'pictures',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-6c78-4051-b115-6eab968777eb',
			'identifier' => NULL,
			'name' => 'images',
			'keyname' => 'images',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-c19c-4f09-a741-6eab968777eb',
			'identifier' => NULL,
			'name' => 'OPAC,EDC,interlibrary loan,ILL',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-6a54-4023-8895-6eab968777eb',
			'identifier' => NULL,
			'name' => 'ILL',
			'keyname' => 'ill',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-a414-487d-abcf-6eab968777eb',
			'identifier' => NULL,
			'name' => 'model assignment ,fundamental skill ,database research ,finding articles ,English composition , worksheet, model assignment',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-5c48-45f8-982b-6eab968777eb',
			'identifier' => NULL,
			'name' => 'finding articles',
			'keyname' => 'findingarticles',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-3958-497f-aabf-6eab968777eb',
			'identifier' => NULL,
			'name' => 'worksheet',
			'keyname' => 'worksheet',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-ac84-40c7-82d1-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Japanese encyclopedias,Japanese language dictionaries ,Japanese Studies,Nihon Kokougo Daijiten,Rekishi Chimei Taikei, Japanese history,Japanese geography,cultural studies,Sh�kan ,ekonomisuto ,T�y� Bunko ,Jits�',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-2670-4314-b46a-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Japanese encyclopedias',
			'keyname' => 'japaneseencyclopedias',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-c94c-442c-b902-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Japanese language dictionaries',
			'keyname' => 'japaneselanguagedictionaries',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-5d50-4f4f-90ff-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Japanese Studies',
			'keyname' => 'japanesestudies',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-ddcc-4476-8408-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Nihon Kokougo Daijiten',
			'keyname' => 'nihonkokougodaijiten',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-7a04-4a30-ab47-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Rekishi Chimei Taikei',
			'keyname' => 'rekishichimeitaikei',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-4328-4006-8a9b-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Japanese history',
			'keyname' => 'japanesehistory',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-06d4-401d-b226-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Japanese geography',
			'keyname' => 'japanesegeography',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-b11c-449f-af86-6eab968777eb',
			'identifier' => NULL,
			'name' => 'cultural studies',
			'keyname' => 'culturalstudies',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-6e88-4e4c-bb09-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Sh�kan',
			'keyname' => 'sh�kan',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-2eb0-43bd-a7a2-6eab968777eb',
			'identifier' => NULL,
			'name' => 'ekonomisuto',
			'keyname' => 'ekonomisuto',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-d5d8-4f36-945c-6eab968777eb',
			'identifier' => NULL,
			'name' => 'T�y� Bunko',
			'keyname' => 't�y�bunko',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-7fbc-414f-887e-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Jits�',
			'keyname' => 'jits�',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-db74-4200-98a5-6eab968777eb',
			'identifier' => NULL,
			'name' => 'online searching , accessing articles , searching journals',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-699c-463c-93f1-6eab968777eb',
			'identifier' => NULL,
			'name' => 'online searching',
			'keyname' => 'onlinesearching',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-4af8-4206-b65c-6eab968777eb',
			'identifier' => NULL,
			'name' => 'accessing articles',
			'keyname' => 'accessingarticles',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3808-08c8-46f5-9f8a-6eab968777eb',
			'identifier' => NULL,
			'name' => 'searching journals',
			'keyname' => 'searchingjournals',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3809-6c10-47af-a1a3-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Shakespeare Quarterly, poetry ,playwrights , theater ,creative writing',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:36',
			'modified' => '2011-07-01 15:11:36'
		),
		array(
			'id' => '4e0e3809-1650-4aaf-9a8f-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Shakespeare Quarterly',
			'keyname' => 'shakespearequarterly',
			'weight' => 0,
			'created' => '2011-07-01 15:11:37',
			'modified' => '2011-07-01 15:11:37'
		),
		array(
			'id' => '4e0e3809-d164-46a7-9e30-6eab968777eb',
			'identifier' => NULL,
			'name' => 'poetry',
			'keyname' => 'poetry',
			'weight' => 0,
			'created' => '2011-07-01 15:11:37',
			'modified' => '2011-07-01 15:11:37'
		),
		array(
			'id' => '4e0e3809-7c10-4d8d-bf74-6eab968777eb',
			'identifier' => NULL,
			'name' => 'playwrights',
			'keyname' => 'playwrights',
			'weight' => 0,
			'created' => '2011-07-01 15:11:37',
			'modified' => '2011-07-01 15:11:37'
		),
		array(
			'id' => '4e0e3809-0c2c-4caf-b86d-6eab968777eb',
			'identifier' => NULL,
			'name' => 'theater',
			'keyname' => 'theater',
			'weight' => 0,
			'created' => '2011-07-01 15:11:37',
			'modified' => '2011-07-01 15:11:37'
		),
		array(
			'id' => '4e0e3809-b8cc-4cbe-8e6a-6eab968777eb',
			'identifier' => NULL,
			'name' => 'creative writing',
			'keyname' => 'creativewriting',
			'weight' => 0,
			'created' => '2011-07-01 15:11:37',
			'modified' => '2011-07-01 15:11:37'
		),
		array(
			'id' => '4e0e3809-806c-4eb4-bb8e-6eab968777eb',
			'identifier' => NULL,
			'name' => 'peer-reviewed, popular sources ,sensational sources, analyzing sources, news articles, periodicals',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:37',
			'modified' => '2011-07-01 15:11:37'
		),
		array(
			'id' => '4e0e3809-47b8-4f70-b7b4-6eab968777eb',
			'identifier' => NULL,
			'name' => 'peer-reviewed',
			'keyname' => 'peerreviewed',
			'weight' => 0,
			'created' => '2011-07-01 15:11:37',
			'modified' => '2011-07-01 15:11:37'
		),
		array(
			'id' => '4e0e3809-fbc4-42e2-9289-6eab968777eb',
			'identifier' => NULL,
			'name' => 'popular sources',
			'keyname' => 'popularsources',
			'weight' => 0,
			'created' => '2011-07-01 15:11:37',
			'modified' => '2011-07-01 15:11:37'
		),
		array(
			'id' => '4e0e3809-95a4-474e-9b48-6eab968777eb',
			'identifier' => NULL,
			'name' => 'sensational sources',
			'keyname' => 'sensationalsources',
			'weight' => 0,
			'created' => '2011-07-01 15:11:37',
			'modified' => '2011-07-01 15:11:37'
		),
		array(
			'id' => '4e0e3809-4a78-4789-8362-6eab968777eb',
			'identifier' => NULL,
			'name' => 'analyzing sources',
			'keyname' => 'analyzingsources',
			'weight' => 0,
			'created' => '2011-07-01 15:11:37',
			'modified' => '2011-07-01 15:11:37'
		),
		array(
			'id' => '4e0e3809-cedc-4af0-a094-6eab968777eb',
			'identifier' => NULL,
			'name' => 'news articles',
			'keyname' => 'newsarticles',
			'weight' => 0,
			'created' => '2011-07-01 15:11:37',
			'modified' => '2011-07-01 15:11:37'
		),
		array(
			'id' => '4e0e3809-a8b0-427d-9291-6eab968777eb',
			'identifier' => NULL,
			'name' => 'section 107 ,fair use, copyright law ,Office of Copyright Management and Scholarly Communication , faculty',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:37',
			'modified' => '2011-07-01 15:11:37'
		),
		array(
			'id' => '4e0e3809-bba8-4103-9b13-6eab968777eb',
			'identifier' => NULL,
			'name' => 'copyright law',
			'keyname' => 'copyrightlaw',
			'weight' => 0,
			'created' => '2011-07-01 15:11:37',
			'modified' => '2011-07-01 15:11:37'
		),
		array(
			'id' => '4e0e3809-74c8-48a1-aff5-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Office of Copyright Management and Scholarly Communication',
			'keyname' => 'officeofcopyrightmanagementandscholarlycommunication',
			'weight' => 0,
			'created' => '2011-07-01 15:11:37',
			'modified' => '2011-07-01 15:11:37'
		),
		array(
			'id' => '4e0e3809-b69c-4230-a07b-6eab968777eb',
			'identifier' => NULL,
			'name' => 'fundamental skill ,full text searching',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:37',
			'modified' => '2011-07-01 15:11:37'
		),
		array(
			'id' => '4e0e3809-3be4-49af-82ea-6eab968777eb',
			'identifier' => NULL,
			'name' => 'full text searching',
			'keyname' => 'fulltextsearching',
			'weight' => 0,
			'created' => '2011-07-01 15:11:37',
			'modified' => '2011-07-01 15:11:37'
		),
		array(
			'id' => '4e0e3809-9f60-4b4b-938c-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Boolean logic , command line searches, database searching',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:37',
			'modified' => '2011-07-01 15:11:37'
		),
		array(
			'id' => '4e0e3809-7e64-4673-8645-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Boolean logic',
			'keyname' => 'booleanlogic',
			'weight' => 0,
			'created' => '2011-07-01 15:11:37',
			'modified' => '2011-07-01 15:11:37'
		),
		array(
			'id' => '4e0e3809-4ef4-4f4f-b89b-6eab968777eb',
			'identifier' => NULL,
			'name' => 'command line searches',
			'keyname' => 'commandlinesearches',
			'weight' => 0,
			'created' => '2011-07-01 15:11:37',
			'modified' => '2011-07-01 15:11:37'
		),
		array(
			'id' => '4e0e3809-f830-43dd-8671-6eab968777eb',
			'identifier' => NULL,
			'name' => 'English composition,research paper, topics ,position papers ,writing assignments',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:37',
			'modified' => '2011-07-01 15:11:37'
		),
		array(
			'id' => '4e0e3809-ffe8-4d63-b57e-6eab968777eb',
			'identifier' => NULL,
			'name' => 'topics',
			'keyname' => 'topics',
			'weight' => 0,
			'created' => '2011-07-01 15:11:37',
			'modified' => '2011-07-01 15:11:37'
		),
		array(
			'id' => '4e0e3809-e39c-407f-a24d-6eab968777eb',
			'identifier' => NULL,
			'name' => 'position papers',
			'keyname' => 'positionpapers',
			'weight' => 0,
			'created' => '2011-07-01 15:11:37',
			'modified' => '2011-07-01 15:11:37'
		),
		array(
			'id' => '4e0e3809-1ba8-4660-8a7a-6eab968777eb',
			'identifier' => NULL,
			'name' => 'writing assignments , research paper, essay, fundamental skill , documenting sources , citing',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:37',
			'modified' => '2011-07-01 15:11:37'
		),
		array(
			'id' => '4e0e3809-b1bc-4508-a54a-6eab968777eb',
			'identifier' => NULL,
			'name' => 'citing',
			'keyname' => 'citing',
			'weight' => 0,
			'created' => '2011-07-01 15:11:37',
			'modified' => '2011-07-01 15:11:37'
		),
		array(
			'id' => '4e0e3809-3470-4b97-bc05-6eab968777eb',
			'identifier' => NULL,
			'name' => 'newspapers ,periodicals,QuickHelp , side by side',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:37',
			'modified' => '2011-07-01 15:11:37'
		),
		array(
			'id' => '4e0e3809-caec-4f15-9abf-6eab968777eb',
			'identifier' => NULL,
			'name' => 'QuickHelp ,Pollard and Redgrave\'s Short Title Catalogue,Wing\'s Short-Title Catalogue Thomason Tracts ,Early English Tract Supplement , side by side',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:37',
			'modified' => '2011-07-01 15:11:37'
		),
		array(
			'id' => '4e0e3809-f138-4025-98a0-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Pollard and Redgrave\'s Short Title Catalogue',
			'keyname' => 'pollardandredgravesshorttitlecatalogue',
			'weight' => 0,
			'created' => '2011-07-01 15:11:37',
			'modified' => '2011-07-01 15:11:37'
		),
		array(
			'id' => '4e0e3809-b674-495c-95f6-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Wing\'s Short-Title Catalogue Thomason Tracts',
			'keyname' => 'wingsshorttitlecataloguethomasontracts',
			'weight' => 0,
			'created' => '2011-07-01 15:11:37',
			'modified' => '2011-07-01 15:11:37'
		),
		array(
			'id' => '4e0e3809-6f94-4d7e-b373-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Early English Tract Supplement',
			'keyname' => 'earlyenglishtractsupplement',
			'weight' => 0,
			'created' => '2011-07-01 15:11:37',
			'modified' => '2011-07-01 15:11:37'
		),
		array(
			'id' => '4e0e3809-9834-4b1c-940a-6eab968777eb',
			'identifier' => NULL,
			'name' => 'source reliability, authoritative sources, objectivity, currency, coverage, internet research , fundamental skill, evaluation , source assessment,website quality||internet research , online resources',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:37',
			'modified' => '2011-07-01 15:11:37'
		),
		array(
			'id' => '4e0e3809-78e4-45be-bee7-6eab968777eb',
			'identifier' => NULL,
			'name' => 'objectivity',
			'keyname' => 'objectivity',
			'weight' => 0,
			'created' => '2011-07-01 15:11:37',
			'modified' => '2011-07-01 15:11:37'
		),
		array(
			'id' => '4e0e3809-32cc-4d57-9955-6eab968777eb',
			'identifier' => NULL,
			'name' => 'currency',
			'keyname' => 'currency',
			'weight' => 0,
			'created' => '2011-07-01 15:11:37',
			'modified' => '2011-07-01 15:11:37'
		),
		array(
			'id' => '4e0e3809-c66c-40cc-83b5-6eab968777eb',
			'identifier' => NULL,
			'name' => 'coverage',
			'keyname' => 'coverage',
			'weight' => 0,
			'created' => '2011-07-01 15:11:37',
			'modified' => '2011-07-01 15:11:37'
		),
		array(
			'id' => '4e0e3809-57b4-4b64-94b1-6eab968777eb',
			'identifier' => NULL,
			'name' => 'website quality||internet research',
			'keyname' => 'websitequalityinternetresearch',
			'weight' => 0,
			'created' => '2011-07-01 15:11:37',
			'modified' => '2011-07-01 15:11:37'
		),
		array(
			'id' => '4e0e3809-7488-407e-ab0e-6eab968777eb',
			'identifier' => NULL,
			'name' => 'fundamental skill , research strategy , paper topic research',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:37',
			'modified' => '2011-07-01 15:11:37'
		),
		array(
			'id' => '4e0e3809-7ba4-4835-81f0-6eab968777eb',
			'identifier' => NULL,
			'name' => 'paper topic research',
			'keyname' => 'papertopicresearch',
			'weight' => 0,
			'created' => '2011-07-01 15:11:37',
			'modified' => '2011-07-01 15:11:37'
		),
		array(
			'id' => '4e0e3809-7e00-4441-9a19-6eab968777eb',
			'identifier' => NULL,
			'name' => 'fundamental skill ,writing assignment, essay, research paper',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:37',
			'modified' => '2011-07-01 15:11:37'
		),
		array(
			'id' => '4e0e3809-af04-4841-8232-6eab968777eb',
			'identifier' => NULL,
			'name' => 'writing assignment',
			'keyname' => 'writingassignment',
			'weight' => 0,
			'created' => '2011-07-01 15:11:37',
			'modified' => '2011-07-01 15:11:37'
		),
		array(
			'id' => '4e0e3809-8410-4d4f-920a-6eab968777eb',
			'identifier' => NULL,
			'name' => 'laboratory research ,protocols',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:37',
			'modified' => '2011-07-01 15:11:37'
		),
		array(
			'id' => '4e0e380a-d330-4e07-9797-6eab968777eb',
			'identifier' => NULL,
			'name' => 'laboratory research',
			'keyname' => 'laboratoryresearch',
			'weight' => 0,
			'created' => '2011-07-01 15:11:37',
			'modified' => '2011-07-01 15:11:37'
		),
		array(
			'id' => '4e0e380a-7288-4773-9601-6eab968777eb',
			'identifier' => NULL,
			'name' => 'protocols',
			'keyname' => 'protocols',
			'weight' => 0,
			'created' => '2011-07-01 15:11:37',
			'modified' => '2011-07-01 15:11:37'
		),
		array(
			'id' => '4e0e380a-c37c-45c8-bbe3-6eab968777eb',
			'identifier' => NULL,
			'name' => 'CRS Reports, congressional record documents,congressional committee reports ,Hearings, legislative histories, committee prints,published hearings,unpublished hearings, serials, senate documents, executive reports ,treaty documents ,microfiche, special col',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-b368-48ba-8754-6eab968777eb',
			'identifier' => NULL,
			'name' => 'CRS Reports',
			'keyname' => 'crsreports',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-651c-4915-8810-6eab968777eb',
			'identifier' => NULL,
			'name' => 'congressional record documents',
			'keyname' => 'congressionalrecorddocuments',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-0d0c-4dda-a0b5-6eab968777eb',
			'identifier' => NULL,
			'name' => 'congressional committee reports',
			'keyname' => 'congressionalcommitteereports',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-d5cc-4c47-9e61-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Hearings',
			'keyname' => 'hearings',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-7b00-4cd4-96f7-6eab968777eb',
			'identifier' => NULL,
			'name' => 'legislative histories',
			'keyname' => 'legislativehistories',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-1544-48b6-81d4-6eab968777eb',
			'identifier' => NULL,
			'name' => 'committee prints',
			'keyname' => 'committeeprints',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-a04c-4721-9e95-6eab968777eb',
			'identifier' => NULL,
			'name' => 'published hearings',
			'keyname' => 'publishedhearings',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-212c-4efa-ab1a-6eab968777eb',
			'identifier' => NULL,
			'name' => 'unpublished hearings',
			'keyname' => 'unpublishedhearings',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-b080-43a6-9086-6eab968777eb',
			'identifier' => NULL,
			'name' => 'serials',
			'keyname' => 'serials',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-3930-4ab6-b226-6eab968777eb',
			'identifier' => NULL,
			'name' => 'senate documents',
			'keyname' => 'senatedocuments',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-bfec-4323-99f2-6eab968777eb',
			'identifier' => NULL,
			'name' => 'executive reports',
			'keyname' => 'executivereports',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-50d0-4860-8635-6eab968777eb',
			'identifier' => NULL,
			'name' => 'treaty documents',
			'keyname' => 'treatydocuments',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-21c4-4426-a137-6eab968777eb',
			'identifier' => NULL,
			'name' => 'microfiche',
			'keyname' => 'microfiche',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-dae4-41cc-a62c-6eab968777eb',
			'identifier' => NULL,
			'name' => 'special collections',
			'keyname' => 'specialcollections',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-f494-4bf1-9744-6eab968777eb',
			'identifier' => NULL,
			'name' => 'cite , MLA ,APA ,Chicago ,Turabian ,Citing , documenting sources , references',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-38a0-4374-9e26-6eab968777eb',
			'identifier' => NULL,
			'name' => 'cite',
			'keyname' => 'cite',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-11c8-4751-a3a0-6eab968777eb',
			'identifier' => NULL,
			'name' => 'MLA',
			'keyname' => 'mla',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-c958-4e92-806c-6eab968777eb',
			'identifier' => NULL,
			'name' => 'APA',
			'keyname' => 'apa',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-a474-42ce-95f9-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Chicago',
			'keyname' => 'chicago',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-662c-4ec6-a694-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Turabian',
			'keyname' => 'turabian',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-0be4-4666-ae1c-6eab968777eb',
			'identifier' => NULL,
			'name' => 'QuickHelp , side by side , limiting search results , WCL , ILL',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-7474-4d38-8848-6eab968777eb',
			'identifier' => NULL,
			'name' => 'limiting search results',
			'keyname' => 'limitingsearchresults',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-2434-47a7-a1dc-6eab968777eb',
			'identifier' => NULL,
			'name' => 'WCL',
			'keyname' => 'wcl',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-7654-40e5-b9bc-6eab968777eb',
			'identifier' => NULL,
			'name' => 'model assignment, class exercise ,group assignment, accessing databases ,electronic full text ,English composition, writing assignments,research papers, fundamental skill,journal articles',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-ac2c-4157-87c5-6eab968777eb',
			'identifier' => NULL,
			'name' => 'class exercise',
			'keyname' => 'classexercise',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-893c-436b-874e-6eab968777eb',
			'identifier' => NULL,
			'name' => 'group assignment',
			'keyname' => 'groupassignment',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-9590-462a-ab47-6eab968777eb',
			'identifier' => NULL,
			'name' => 'accessing databases',
			'keyname' => 'accessingdatabases',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-354c-4257-95c1-6eab968777eb',
			'identifier' => NULL,
			'name' => 'electronic full text',
			'keyname' => 'electronicfulltext',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-c248-4dbf-b4ca-6eab968777eb',
			'identifier' => NULL,
			'name' => 'research papers',
			'keyname' => 'researchpapers',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-5db8-4659-bfb4-6eab968777eb',
			'identifier' => NULL,
			'name' => 'journal articles',
			'keyname' => 'journalarticles',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-b364-4232-9c1d-6eab968777eb',
			'identifier' => NULL,
			'name' => 'database research ,fundamental skill ,model assignment',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-dc5c-4c15-b287-6eab968777eb',
			'identifier' => NULL,
			'name' => 'juvenile,young adult, limit search, refine search results, analyze , evaluate results, book records,OPAC,QuickHelp,side by side',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-5724-433b-906f-6eab968777eb',
			'identifier' => NULL,
			'name' => 'juvenile',
			'keyname' => 'juvenile',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-19a4-4601-8251-6eab968777eb',
			'identifier' => NULL,
			'name' => 'young adult',
			'keyname' => 'youngadult',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-a7cc-4469-9bfc-6eab968777eb',
			'identifier' => NULL,
			'name' => 'limit search',
			'keyname' => 'limitsearch',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-384c-43f0-a65d-6eab968777eb',
			'identifier' => NULL,
			'name' => 'refine search results',
			'keyname' => 'refinesearchresults',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-6318-4668-b974-6eab968777eb',
			'identifier' => NULL,
			'name' => 'analyze',
			'keyname' => 'analyze',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-fbcc-4c13-99f0-6eab968777eb',
			'identifier' => NULL,
			'name' => 'evaluate results',
			'keyname' => 'evaluateresults',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-8f6c-4009-9be6-6eab968777eb',
			'identifier' => NULL,
			'name' => 'book records',
			'keyname' => 'bookrecords',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-ef80-4bdc-b495-6eab968777eb',
			'identifier' => NULL,
			'name' => 'images, graphics , pictures , periodical, regional sources, historical , newspapers, primary source , research, Atlanta Constitution,Chicago Tribune, Los Angeles Times, New York Times ,The Washington Post , QuickHelp, documenting sources, side by side',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-0368-4230-bf22-6eab968777eb',
			'identifier' => NULL,
			'name' => 'regional sources',
			'keyname' => 'regionalsources',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-d970-4f0b-9ad3-6eab968777eb',
			'identifier' => NULL,
			'name' => 'historical',
			'keyname' => 'historical',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-8c50-44e8-98d0-6eab968777eb',
			'identifier' => NULL,
			'name' => 'primary source',
			'keyname' => 'primarysource',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-4890-46b3-9e16-6eab968777eb',
			'identifier' => NULL,
			'name' => 'research',
			'keyname' => 'research',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-f918-4821-a017-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Atlanta Constitution',
			'keyname' => 'atlantaconstitution',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-a594-4843-864c-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Chicago Tribune',
			'keyname' => 'chicagotribune',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-7b9c-4949-9077-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Los Angeles Times',
			'keyname' => 'losangelestimes',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-3c8c-4fd7-8932-6eab968777eb',
			'identifier' => NULL,
			'name' => 'New York Times',
			'keyname' => 'newyorktimes',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-f098-4f0a-99b9-6eab968777eb',
			'identifier' => NULL,
			'name' => 'The Washington Post',
			'keyname' => 'thewashingtonpost',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-57a4-4e85-bea1-6eab968777eb',
			'identifier' => NULL,
			'name' => 'citing government documents, documenting sources,APA ,APSA, ASA, AIP,ASM, AMA, AMS ,Legal Citation, Chicago Style ,Turabian, IEEE Standards Manual,ASC,AAA,ACE',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-9aa0-4dc6-874e-6eab968777eb',
			'identifier' => NULL,
			'name' => 'citing government documents',
			'keyname' => 'citinggovernmentdocuments',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-55b4-41f8-958d-6eab968777eb',
			'identifier' => NULL,
			'name' => 'APSA',
			'keyname' => 'apsa',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-e8f0-4f8e-9aa2-6eab968777eb',
			'identifier' => NULL,
			'name' => 'ASA',
			'keyname' => 'asa',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-79d4-4e57-b63a-6eab968777eb',
			'identifier' => NULL,
			'name' => 'AIP',
			'keyname' => 'aip',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-0734-4f79-96e2-6eab968777eb',
			'identifier' => NULL,
			'name' => 'ASM',
			'keyname' => 'asm',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-a04c-431a-af4f-6eab968777eb',
			'identifier' => NULL,
			'name' => 'AMA',
			'keyname' => 'ama',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-2a8c-47ef-93a1-6eab968777eb',
			'identifier' => NULL,
			'name' => 'AMS',
			'keyname' => 'ams',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-a8b0-4ee5-b775-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Legal Citation',
			'keyname' => 'legalcitation',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-2800-41b4-aca1-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Chicago Style',
			'keyname' => 'chicagostyle',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-b04c-4aa0-a052-6eab968777eb',
			'identifier' => NULL,
			'name' => 'IEEE Standards Manual',
			'keyname' => 'ieeestandardsmanual',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-664c-4dcf-b14d-6eab968777eb',
			'identifier' => NULL,
			'name' => 'AAA',
			'keyname' => 'aaa',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-147c-4a42-b054-6eab968777eb',
			'identifier' => NULL,
			'name' => 'ACE',
			'keyname' => 'ace',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-5174-43cd-a13e-6eab968777eb',
			'identifier' => NULL,
			'name' => 'controlled vocabulary , QuickHelp , side by side , National Center for Biotechnology , NCIB , U.S. National Library of Medicine, NLM , National Institutes of Health, NIH , Medline, molecular biology , medical literature, biomedical research',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-877c-40e3-a6a9-6eab968777eb',
			'identifier' => NULL,
			'name' => 'controlled vocabulary',
			'keyname' => 'controlledvocabulary',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-3cb4-4c6f-9c8d-6eab968777eb',
			'identifier' => NULL,
			'name' => 'National Center for Biotechnology',
			'keyname' => 'nationalcenterforbiotechnology',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-45c4-459e-bdd6-6eab968777eb',
			'identifier' => NULL,
			'name' => 'NCIB',
			'keyname' => 'ncib',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-fa98-4a23-807d-6eab968777eb',
			'identifier' => NULL,
			'name' => 'U.S. National Library of Medicine',
			'keyname' => 'usnationallibraryofmedicine',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-9090-4bd4-9295-6eab968777eb',
			'identifier' => NULL,
			'name' => 'NLM',
			'keyname' => 'nlm',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-1eb8-4170-94fd-6eab968777eb',
			'identifier' => NULL,
			'name' => 'National Institutes of Health',
			'keyname' => 'nationalinstitutesofhealth',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-bbb8-4ac4-8f8d-6eab968777eb',
			'identifier' => NULL,
			'name' => 'NIH',
			'keyname' => 'nih',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-4918-4609-85a6-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Medline',
			'keyname' => 'medline',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-d998-4be8-b94f-6eab968777eb',
			'identifier' => NULL,
			'name' => 'molecular biology',
			'keyname' => 'molecularbiology',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-f078-466d-ae30-6eab968777eb',
			'identifier' => NULL,
			'name' => 'medical literature',
			'keyname' => 'medicalliterature',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380a-8544-4954-8acb-6eab968777eb',
			'identifier' => NULL,
			'name' => 'biomedical research',
			'keyname' => 'biomedicalresearch',
			'weight' => 0,
			'created' => '2011-07-01 15:11:38',
			'modified' => '2011-07-01 15:11:38'
		),
		array(
			'id' => '4e0e380b-35e0-4dc8-8b6f-6eab968777eb',
			'identifier' => NULL,
			'name' => 'fundamental skill ,model assignment , search logic , activity',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:39',
			'modified' => '2011-07-01 15:11:39'
		),
		array(
			'id' => '4e0e380b-a8b0-4d5c-8d25-6eab968777eb',
			'identifier' => NULL,
			'name' => 'search logic',
			'keyname' => 'searchlogic',
			'weight' => 0,
			'created' => '2011-07-01 15:11:39',
			'modified' => '2011-07-01 15:11:39'
		),
		array(
			'id' => '4e0e380b-5628-4780-9839-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Research Lab',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:39',
			'modified' => '2011-07-01 15:11:39'
		),
		array(
			'id' => '4e0e380b-dcc8-49fd-b173-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Research Lab',
			'keyname' => 'researchlab',
			'weight' => 0,
			'created' => '2011-07-01 15:11:39',
			'modified' => '2011-07-01 15:11:39'
		),
		array(
			'id' => '4e0e380b-3fe8-4aa2-8b6d-6eab968777eb',
			'identifier' => NULL,
			'name' => 'citing ,MLA ,APA , Chicago ,Turabian ,RefWorks, fundamental skill , references',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:39',
			'modified' => '2011-07-01 15:11:39'
		),
		array(
			'id' => '4e0e380b-6e88-4999-b5dd-6eab968777eb',
			'identifier' => NULL,
			'name' => 'UA Library Catalog, OPAC, media ,audio visual, AV Materials, VHS, streaming video, movies, limit search,refine search results, foreign language films',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:39',
			'modified' => '2011-07-01 15:11:39'
		),
		array(
			'id' => '4e0e380b-25d0-4e54-8f41-6eab968777eb',
			'identifier' => NULL,
			'name' => 'UA Library Catalog',
			'keyname' => 'ualibrarycatalog',
			'weight' => 0,
			'created' => '2011-07-01 15:11:39',
			'modified' => '2011-07-01 15:11:39'
		),
		array(
			'id' => '4e0e380b-db08-47c8-9c59-6eab968777eb',
			'identifier' => NULL,
			'name' => 'audio visual',
			'keyname' => 'audiovisual',
			'weight' => 0,
			'created' => '2011-07-01 15:11:39',
			'modified' => '2011-07-01 15:11:39'
		),
		array(
			'id' => '4e0e380b-79fc-4098-b159-6eab968777eb',
			'identifier' => NULL,
			'name' => 'AV Materials',
			'keyname' => 'avmaterials',
			'weight' => 0,
			'created' => '2011-07-01 15:11:39',
			'modified' => '2011-07-01 15:11:39'
		),
		array(
			'id' => '4e0e380b-35d8-492f-9656-6eab968777eb',
			'identifier' => NULL,
			'name' => 'VHS',
			'keyname' => 'vhs',
			'weight' => 0,
			'created' => '2011-07-01 15:11:39',
			'modified' => '2011-07-01 15:11:39'
		),
		array(
			'id' => '4e0e380b-daa8-4b70-8161-6eab968777eb',
			'identifier' => NULL,
			'name' => 'streaming video',
			'keyname' => 'streamingvideo',
			'weight' => 0,
			'created' => '2011-07-01 15:11:39',
			'modified' => '2011-07-01 15:11:39'
		),
		array(
			'id' => '4e0e380b-686c-432c-8e49-6eab968777eb',
			'identifier' => NULL,
			'name' => 'movies',
			'keyname' => 'movies',
			'weight' => 0,
			'created' => '2011-07-01 15:11:39',
			'modified' => '2011-07-01 15:11:39'
		),
		array(
			'id' => '4e0e380b-0120-4353-adf5-6eab968777eb',
			'identifier' => NULL,
			'name' => 'foreign language films',
			'keyname' => 'foreignlanguagefilms',
			'weight' => 0,
			'created' => '2011-07-01 15:11:39',
			'modified' => '2011-07-01 15:11:39'
		),
		array(
			'id' => '4e0e380b-2020-4ab2-b304-6eab968777eb',
			'identifier' => NULL,
			'name' => 'model assignment ,Hamlet ,Shakespeare',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:39',
			'modified' => '2011-07-01 15:11:39'
		),
		array(
			'id' => '4e0e380b-b4c8-411f-8433-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Hamlet',
			'keyname' => 'hamlet',
			'weight' => 0,
			'created' => '2011-07-01 15:11:39',
			'modified' => '2011-07-01 15:11:39'
		),
		array(
			'id' => '4e0e380b-7a04-4cc6-9021-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Shakespeare',
			'keyname' => 'shakespeare',
			'weight' => 0,
			'created' => '2011-07-01 15:11:39',
			'modified' => '2011-07-01 15:11:39'
		),
		array(
			'id' => '4e0e380b-fbac-4555-be7a-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Reference Service, Library Location ,Information Commons , side by side ,QuickHelp',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:39',
			'modified' => '2011-07-01 15:11:39'
		),
		array(
			'id' => '4e0e380b-f48c-4be2-9bd4-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Reference Service',
			'keyname' => 'referenceservice',
			'weight' => 0,
			'created' => '2011-07-01 15:11:39',
			'modified' => '2011-07-01 15:11:39'
		),
		array(
			'id' => '4e0e380b-ba90-48ca-9f14-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Library Location',
			'keyname' => 'librarylocation',
			'weight' => 0,
			'created' => '2011-07-01 15:11:39',
			'modified' => '2011-07-01 15:11:39'
		),
		array(
			'id' => '4e0e380b-70f4-4f58-8b16-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Information Commons',
			'keyname' => 'informationcommons',
			'weight' => 0,
			'created' => '2011-07-01 15:11:39',
			'modified' => '2011-07-01 15:11:39'
		),
		array(
			'id' => '4e0e380b-03a4-442c-b83e-6eab968777eb',
			'identifier' => NULL,
			'name' => 'periodicals ,newspapers,journalism',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:39',
			'modified' => '2011-07-01 15:11:39'
		),
		array(
			'id' => '4e0e380b-aa18-4d1a-999c-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Academic Search Complete , ASC , evaluating primary sources, QuickHelp , side by side',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:39',
			'modified' => '2011-07-01 15:11:39'
		),
		array(
			'id' => '4e0e380b-bcb8-4903-81c9-6eab968777eb',
			'identifier' => NULL,
			'name' => 'evaluating primary sources',
			'keyname' => 'evaluatingprimarysources',
			'weight' => 0,
			'created' => '2011-07-01 15:11:39',
			'modified' => '2011-07-01 15:11:39'
		),
		array(
			'id' => '4e0e380b-3e2c-438d-ba8a-6eab968777eb',
			'identifier' => NULL,
			'name' => 'fundamental skill,writing assignment, research paper , essay, finding sources , model assignment',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:39',
			'modified' => '2011-07-01 15:11:39'
		),
		array(
			'id' => '4e0e380b-c5f0-4433-b32f-6eab968777eb',
			'identifier' => NULL,
			'name' => 'finding sources',
			'keyname' => 'findingsources',
			'weight' => 0,
			'created' => '2011-07-01 15:11:39',
			'modified' => '2011-07-01 15:11:39'
		),
		array(
			'id' => '4e0e380b-f4a8-4519-976a-6eab968777eb',
			'identifier' => NULL,
			'name' => 'source assessment,determine website quality||online searching , fundamental skill research lab, online resources,internet research',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:39',
			'modified' => '2011-07-01 15:11:39'
		),
		array(
			'id' => '4e0e380b-b02c-4197-94f6-6eab968777eb',
			'identifier' => NULL,
			'name' => 'determine website quality||online searching',
			'keyname' => 'determinewebsitequalityonlinesearching',
			'weight' => 0,
			'created' => '2011-07-01 15:11:39',
			'modified' => '2011-07-01 15:11:39'
		),
		array(
			'id' => '4e0e380b-5880-400b-a989-6eab968777eb',
			'identifier' => NULL,
			'name' => 'fundamental skill research lab',
			'keyname' => 'fundamentalskillresearchlab',
			'weight' => 0,
			'created' => '2011-07-01 15:11:39',
			'modified' => '2011-07-01 15:11:39'
		),
		array(
			'id' => '4e0e380b-3fd0-4f69-bb2d-6eab968777eb',
			'identifier' => NULL,
			'name' => 'newspapers , QuickHelp , side by side , activities , database research',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:39',
			'modified' => '2011-07-01 15:11:39'
		),
		array(
			'id' => '4e0e380b-2fd0-4821-aa3b-6eab968777eb',
			'identifier' => NULL,
			'name' => 'activities',
			'keyname' => 'activities',
			'weight' => 0,
			'created' => '2011-07-01 15:11:39',
			'modified' => '2011-07-01 15:11:39'
		),
		array(
			'id' => '4e0e380c-9714-43d6-89ad-6eab968777eb',
			'identifier' => NULL,
			'name' => 'sample essay ,assignment requirements, English composition ,controversial issues, paper topic, analytical skills ,research skills ,research lab',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-e4b0-48db-b100-6eab968777eb',
			'identifier' => NULL,
			'name' => 'sample essay',
			'keyname' => 'sampleessay',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-c9f4-48d5-b0c5-6eab968777eb',
			'identifier' => NULL,
			'name' => 'assignment requirements',
			'keyname' => 'assignmentrequirements',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-508c-4081-86e9-6eab968777eb',
			'identifier' => NULL,
			'name' => 'controversial issues',
			'keyname' => 'controversialissues',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-25cc-498a-b871-6eab968777eb',
			'identifier' => NULL,
			'name' => 'paper topic',
			'keyname' => 'papertopic',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-0534-40f2-af1f-6eab968777eb',
			'identifier' => NULL,
			'name' => 'analytical skills',
			'keyname' => 'analyticalskills',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-83b8-49be-a694-6eab968777eb',
			'identifier' => NULL,
			'name' => 'market research reports , market forecasts , industry analysis , consumer goods , demographics , heavy Industry , financial trends , NAICS code',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-8298-4e2e-a6a0-6eab968777eb',
			'identifier' => NULL,
			'name' => 'market research reports',
			'keyname' => 'marketresearchreports',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-20a0-42f3-b42c-6eab968777eb',
			'identifier' => NULL,
			'name' => 'market forecasts',
			'keyname' => 'marketforecasts',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-e898-46e1-ab21-6eab968777eb',
			'identifier' => NULL,
			'name' => 'industry analysis',
			'keyname' => 'industryanalysis',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-c3b4-4ed3-a04c-6eab968777eb',
			'identifier' => NULL,
			'name' => 'consumer goods',
			'keyname' => 'consumergoods',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-1270-4a5e-9fc7-6eab968777eb',
			'identifier' => NULL,
			'name' => 'demographics',
			'keyname' => 'demographics',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-db94-4e3e-9d14-6eab968777eb',
			'identifier' => NULL,
			'name' => 'heavy Industry',
			'keyname' => 'heavyindustry',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-7a24-4712-b239-6eab968777eb',
			'identifier' => NULL,
			'name' => 'financial trends',
			'keyname' => 'financialtrends',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-29e4-45d5-b19b-6eab968777eb',
			'identifier' => NULL,
			'name' => 'NAICS code',
			'keyname' => 'naicscode',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-aab4-4265-836c-6eab968777eb',
			'identifier' => NULL,
			'name' => 'fundamental skill ,locating library resources ,OPAC',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-8f68-4ee2-bd9f-6eab968777eb',
			'identifier' => NULL,
			'name' => 'locating library resources',
			'keyname' => 'locatinglibraryresources',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-2920-4c63-9fff-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Boolean operators, search logic , truncation , database , selecting keywords , constructing effective searches, evaluating and revising search results , concept mapping,fundamental skill',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-dcf8-4c2f-8855-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Boolean operators',
			'keyname' => 'booleanoperators',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-b364-4845-853e-6eab968777eb',
			'identifier' => NULL,
			'name' => 'truncation',
			'keyname' => 'truncation',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-6ce8-45f3-a520-6eab968777eb',
			'identifier' => NULL,
			'name' => 'database',
			'keyname' => 'database',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-dcd8-4322-914d-6eab968777eb',
			'identifier' => NULL,
			'name' => 'selecting keywords',
			'keyname' => 'selectingkeywords',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-a1b0-485a-828f-6eab968777eb',
			'identifier' => NULL,
			'name' => 'constructing effective searches',
			'keyname' => 'constructingeffectivesearches',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-53c8-46d3-b66b-6eab968777eb',
			'identifier' => NULL,
			'name' => 'evaluating and revising search results',
			'keyname' => 'evaluatingandrevisingsearchresults',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-ff3c-4bbd-bbc0-6eab968777eb',
			'identifier' => NULL,
			'name' => 'concept mapping',
			'keyname' => 'conceptmapping',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-fa0c-4cee-82aa-6eab968777eb',
			'identifier' => NULL,
			'name' => 'research paper ,writing essays, assignments ,fundamental skill',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-d5cc-489d-a76f-6eab968777eb',
			'identifier' => NULL,
			'name' => 'writing essays',
			'keyname' => 'writingessays',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-bd68-4487-8a20-6eab968777eb',
			'identifier' => NULL,
			'name' => 'assignments',
			'keyname' => 'assignments',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-76a4-4e3a-b480-6eab968777eb',
			'identifier' => NULL,
			'name' => 'current journals and newspapers, Research West,reference,juvenile collection, kids books , Special Collections,self checkout,holds,info desk,information commons',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-52a4-4637-81b4-6eab968777eb',
			'identifier' => NULL,
			'name' => 'current journals and newspapers',
			'keyname' => 'currentjournalsandnewspapers',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-3e28-4ce7-a0d2-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Research West',
			'keyname' => 'researchwest',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-2308-4ada-a67a-6eab968777eb',
			'identifier' => NULL,
			'name' => 'juvenile collection',
			'keyname' => 'juvenilecollection',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-ea38-4015-adad-6eab968777eb',
			'identifier' => NULL,
			'name' => 'kids books',
			'keyname' => 'kidsbooks',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-9d18-42bb-97d5-6eab968777eb',
			'identifier' => NULL,
			'name' => 'self checkout',
			'keyname' => 'selfcheckout',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-55d4-449f-ae49-6eab968777eb',
			'identifier' => NULL,
			'name' => 'holds',
			'keyname' => 'holds',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-0274-4176-81ac-6eab968777eb',
			'identifier' => NULL,
			'name' => 'info desk',
			'keyname' => 'infodesk',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-89c0-4022-a120-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Middle East, Muslim World, Asia, Africa, Nation of Islam, Arab minorities, ethnic studies',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-0070-44f9-bb8c-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Middle East',
			'keyname' => 'middleeast',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-ab80-4a2f-be74-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Muslim World',
			'keyname' => 'muslimworld',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-3ad4-4b11-bfa7-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Asia',
			'keyname' => 'asia',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-c190-4ac2-b8a0-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Africa',
			'keyname' => 'africa',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-315c-46fc-b376-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Nation of Islam',
			'keyname' => 'nationofislam',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-35e0-41b7-b33d-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Arab minorities',
			'keyname' => 'arabminorities',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-0864-4b70-a728-6eab968777eb',
			'identifier' => NULL,
			'name' => 'ethnic studies',
			'keyname' => 'ethnicstudies',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-8ba8-4834-9cc5-6eab968777eb',
			'identifier' => NULL,
			'name' => 'English composition , QuickHelp , side by side , database research',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-8d7c-451c-b93f-6eab968777eb',
			'identifier' => NULL,
			'name' => 'research skills , faculty , upper-level undergraduates , juniors,seniors , writing assignments,research papers, ILL, interlibrary loan, librarian support, citation chaining , documenting sources citation, academic listservs',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-14d4-49e1-9f0c-6eab968777eb',
			'identifier' => NULL,
			'name' => 'upper-level undergraduates',
			'keyname' => 'upperlevelundergraduates',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-c790-4512-8193-6eab968777eb',
			'identifier' => NULL,
			'name' => 'juniors',
			'keyname' => 'juniors',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-b9b8-4837-8b17-6eab968777eb',
			'identifier' => NULL,
			'name' => 'seniors',
			'keyname' => 'seniors',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-9d08-463c-9625-6eab968777eb',
			'identifier' => NULL,
			'name' => 'librarian support',
			'keyname' => 'librariansupport',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-6884-4bfc-b662-6eab968777eb',
			'identifier' => NULL,
			'name' => 'documenting sources citation',
			'keyname' => 'documentingsourcescitation',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380c-5408-4724-bc66-6eab968777eb',
			'identifier' => NULL,
			'name' => 'academic listservs',
			'keyname' => 'academiclistservs',
			'weight' => 0,
			'created' => '2011-07-01 15:11:40',
			'modified' => '2011-07-01 15:11:40'
		),
		array(
			'id' => '4e0e380d-2ed4-447c-85b9-6eab968777eb',
			'identifier' => NULL,
			'name' => 'market research reports , market forecasts , industry analysis , consumer goods , demographics , marketing , business case studies , SWOT analysis, Datamonitor , CountryWatch , Business Monitor , country reports ,',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:41',
			'modified' => '2011-07-01 15:11:41'
		),
		array(
			'id' => '4e0e380d-e614-4f1e-8c4e-6eab968777eb',
			'identifier' => NULL,
			'name' => 'marketing',
			'keyname' => 'marketing',
			'weight' => 0,
			'created' => '2011-07-01 15:11:41',
			'modified' => '2011-07-01 15:11:41'
		),
		array(
			'id' => '4e0e380d-cfa4-42fc-a3fb-6eab968777eb',
			'identifier' => NULL,
			'name' => 'business case studies',
			'keyname' => 'businesscasestudies',
			'weight' => 0,
			'created' => '2011-07-01 15:11:41',
			'modified' => '2011-07-01 15:11:41'
		),
		array(
			'id' => '4e0e380d-a7a0-40a6-bec7-6eab968777eb',
			'identifier' => NULL,
			'name' => 'SWOT analysis',
			'keyname' => 'swotanalysis',
			'weight' => 0,
			'created' => '2011-07-01 15:11:41',
			'modified' => '2011-07-01 15:11:41'
		),
		array(
			'id' => '4e0e380d-75d8-4bac-9fbc-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Datamonitor',
			'keyname' => 'datamonitor',
			'weight' => 0,
			'created' => '2011-07-01 15:11:41',
			'modified' => '2011-07-01 15:11:41'
		),
		array(
			'id' => '4e0e380d-3470-46af-b3c6-6eab968777eb',
			'identifier' => NULL,
			'name' => 'CountryWatch',
			'keyname' => 'countrywatch',
			'weight' => 0,
			'created' => '2011-07-01 15:11:41',
			'modified' => '2011-07-01 15:11:41'
		),
		array(
			'id' => '4e0e380d-ead4-4409-b4e2-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Business Monitor',
			'keyname' => 'businessmonitor',
			'weight' => 0,
			'created' => '2011-07-01 15:11:41',
			'modified' => '2011-07-01 15:11:41'
		),
		array(
			'id' => '4e0e380d-ab60-4b06-a8d0-6eab968777eb',
			'identifier' => NULL,
			'name' => 'country reports',
			'keyname' => 'countryreports',
			'weight' => 0,
			'created' => '2011-07-01 15:11:41',
			'modified' => '2011-07-01 15:11:41'
		),
		array(
			'id' => '4e0e380d-6ea0-4e75-baf0-6eab968777eb',
			'identifier' => NULL,
			'name' => 'open web ,hidden web,websites, evaluation checklist, source comparison',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:41',
			'modified' => '2011-07-01 15:11:41'
		),
		array(
			'id' => '4e0e380d-0ca8-47ad-84f4-6eab968777eb',
			'identifier' => NULL,
			'name' => 'open web',
			'keyname' => 'openweb',
			'weight' => 0,
			'created' => '2011-07-01 15:11:41',
			'modified' => '2011-07-01 15:11:41'
		),
		array(
			'id' => '4e0e380d-c884-4c5d-9f65-6eab968777eb',
			'identifier' => NULL,
			'name' => 'hidden web',
			'keyname' => 'hiddenweb',
			'weight' => 0,
			'created' => '2011-07-01 15:11:41',
			'modified' => '2011-07-01 15:11:41'
		),
		array(
			'id' => '4e0e380d-56ac-4b92-b67f-6eab968777eb',
			'identifier' => NULL,
			'name' => 'websites',
			'keyname' => 'websites',
			'weight' => 0,
			'created' => '2011-07-01 15:11:41',
			'modified' => '2011-07-01 15:11:41'
		),
		array(
			'id' => '4e0e380d-edd0-4994-b703-6eab968777eb',
			'identifier' => NULL,
			'name' => 'evaluation checklist',
			'keyname' => 'evaluationchecklist',
			'weight' => 0,
			'created' => '2011-07-01 15:11:41',
			'modified' => '2011-07-01 15:11:41'
		),
		array(
			'id' => '4e0e380d-923c-4b88-b3d6-6eab968777eb',
			'identifier' => NULL,
			'name' => 'source comparison',
			'keyname' => 'sourcecomparison',
			'weight' => 0,
			'created' => '2011-07-01 15:11:41',
			'modified' => '2011-07-01 15:11:41'
		),
		array(
			'id' => '4e0e380d-248c-481b-8497-6eab968777eb',
			'identifier' => NULL,
			'name' => 'research lab, English composition, citing sources, quoting , paraphrasing, writing assignment, research paper, essay, fundamental skill',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:41',
			'modified' => '2011-07-01 15:11:41'
		),
		array(
			'id' => '4e0e380d-11bc-4227-8e17-6eab968777eb',
			'identifier' => NULL,
			'name' => 'quoting',
			'keyname' => 'quoting',
			'weight' => 0,
			'created' => '2011-07-01 15:11:41',
			'modified' => '2011-07-01 15:11:41'
		),
		array(
			'id' => '4e0e380d-a000-4272-84e2-6eab968777eb',
			'identifier' => NULL,
			'name' => 'LOC, finding books, locating materials , stacks',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:41',
			'modified' => '2011-07-01 15:11:41'
		),
		array(
			'id' => '4e0e380d-642c-44ba-9ece-6eab968777eb',
			'identifier' => NULL,
			'name' => 'LOC',
			'keyname' => 'loc',
			'weight' => 0,
			'created' => '2011-07-01 15:11:41',
			'modified' => '2011-07-01 15:11:41'
		),
		array(
			'id' => '4e0e380d-4f4c-418f-964e-6eab968777eb',
			'identifier' => NULL,
			'name' => 'finding books',
			'keyname' => 'findingbooks',
			'weight' => 0,
			'created' => '2011-07-01 15:11:41',
			'modified' => '2011-07-01 15:11:41'
		),
		array(
			'id' => '4e0e380d-0cb8-45c1-8fa6-6eab968777eb',
			'identifier' => NULL,
			'name' => 'locating materials',
			'keyname' => 'locatingmaterials',
			'weight' => 0,
			'created' => '2011-07-01 15:11:41',
			'modified' => '2011-07-01 15:11:41'
		),
		array(
			'id' => '4e0e380d-e3ec-4d72-857f-6eab968777eb',
			'identifier' => NULL,
			'name' => 'stacks',
			'keyname' => 'stacks',
			'weight' => 0,
			'created' => '2011-07-01 15:11:41',
			'modified' => '2011-07-01 15:11:41'
		),
		array(
			'id' => '4e0e380d-2ba4-4069-8fb4-6eab968777eb',
			'identifier' => NULL,
			'name' => 'ISI ,Science,Social Sciences ,Index, Arts & Humanities ,Database, evaluating citations',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:41',
			'modified' => '2011-07-01 15:11:41'
		),
		array(
			'id' => '4e0e380d-0098-4a24-8047-6eab968777eb',
			'identifier' => NULL,
			'name' => 'ISI',
			'keyname' => 'isi',
			'weight' => 0,
			'created' => '2011-07-01 15:11:41',
			'modified' => '2011-07-01 15:11:41'
		),
		array(
			'id' => '4e0e380d-f5e0-4cb4-bd62-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Science',
			'keyname' => 'science',
			'weight' => 0,
			'created' => '2011-07-01 15:11:41',
			'modified' => '2011-07-01 15:11:41'
		),
		array(
			'id' => '4e0e380d-db24-434b-94fe-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Social Sciences',
			'keyname' => 'socialsciences',
			'weight' => 0,
			'created' => '2011-07-01 15:11:41',
			'modified' => '2011-07-01 15:11:41'
		),
		array(
			'id' => '4e0e380d-b898-4075-8d33-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Index',
			'keyname' => 'index',
			'weight' => 0,
			'created' => '2011-07-01 15:11:41',
			'modified' => '2011-07-01 15:11:41'
		),
		array(
			'id' => '4e0e380d-8bc0-4e3c-9b4e-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Arts & Humanities',
			'keyname' => 'artshumanities',
			'weight' => 0,
			'created' => '2011-07-01 15:11:41',
			'modified' => '2011-07-01 15:11:41'
		),
		array(
			'id' => '4e0e380d-8498-464e-b68d-6eab968777eb',
			'identifier' => NULL,
			'name' => 'QuickHelp, side by side , retrieving full text articles , RefWorks , bibliographic management software , find related articles , ISI ,Science,Social Sciences ,Index, Arts & Humanities ,Database, evaluating citations',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:41',
			'modified' => '2011-07-01 15:11:41'
		),
		array(
			'id' => '4e0e380d-2be8-4c0e-8d2a-6eab968777eb',
			'identifier' => NULL,
			'name' => 'retrieving full text articles',
			'keyname' => 'retrievingfulltextarticles',
			'weight' => 0,
			'created' => '2011-07-01 15:11:41',
			'modified' => '2011-07-01 15:11:41'
		),
		array(
			'id' => '4e0e380d-48a4-4e79-9f17-6eab968777eb',
			'identifier' => NULL,
			'name' => 'find related articles',
			'keyname' => 'findrelatedarticles',
			'weight' => 0,
			'created' => '2011-07-01 15:11:41',
			'modified' => '2011-07-01 15:11:41'
		),
		array(
			'id' => '4e0e380d-4e30-40b1-918d-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Boolean operators, refining search results, effective search techniques',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:41',
			'modified' => '2011-07-01 15:11:41'
		),
		array(
			'id' => '4e0e380d-3ddc-4302-b7f7-6eab968777eb',
			'identifier' => NULL,
			'name' => 'refining search results',
			'keyname' => 'refiningsearchresults',
			'weight' => 0,
			'created' => '2011-07-01 15:11:41',
			'modified' => '2011-07-01 15:11:41'
		),
		array(
			'id' => '4e0e380d-e4a0-44e2-a63c-6eab968777eb',
			'identifier' => NULL,
			'name' => 'effective search techniques',
			'keyname' => 'effectivesearchtechniques',
			'weight' => 0,
			'created' => '2011-07-01 15:11:41',
			'modified' => '2011-07-01 15:11:41'
		),
		array(
			'id' => '4e0e380d-7d4c-4032-aa43-6eab968777eb',
			'identifier' => NULL,
			'name' => 'English composition , evaluating search results , database research , popular and scholarly sources , scholarly journals',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:41',
			'modified' => '2011-07-01 15:11:41'
		),
		array(
			'id' => '4e0e380d-f1dc-4892-bdb9-6eab968777eb',
			'identifier' => NULL,
			'name' => 'evaluating search results',
			'keyname' => 'evaluatingsearchresults',
			'weight' => 0,
			'created' => '2011-07-01 15:11:41',
			'modified' => '2011-07-01 15:11:41'
		),
		array(
			'id' => '4e0e380d-af48-440f-8bdd-6eab968777eb',
			'identifier' => NULL,
			'name' => 'popular and scholarly sources',
			'keyname' => 'popularandscholarlysources',
			'weight' => 0,
			'created' => '2011-07-01 15:11:41',
			'modified' => '2011-07-01 15:11:41'
		),
		array(
			'id' => '4e0e380d-4a54-4558-b57f-6eab968777eb',
			'identifier' => NULL,
			'name' => 'scholarly journals',
			'keyname' => 'scholarlyjournals',
			'weight' => 0,
			'created' => '2011-07-01 15:11:41',
			'modified' => '2011-07-01 15:11:41'
		),
		array(
			'id' => '4e0e380d-4570-4264-910a-6eab968777eb',
			'identifier' => NULL,
			'name' => 'articles ,journals,research tips,selecting sources,fundamental skill, research lab, English composition',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:41',
			'modified' => '2011-07-01 15:11:41'
		),
		array(
			'id' => '4e0e380d-2bb0-42a4-a369-6eab968777eb',
			'identifier' => NULL,
			'name' => 'English composition , paper topics , QuickHelp , side by side',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:41',
			'modified' => '2011-07-01 15:11:41'
		),
		array(
			'id' => '4e0e380d-7ef0-46bc-b546-6eab968777eb',
			'identifier' => NULL,
			'name' => 'paper topics',
			'keyname' => 'papertopics',
			'weight' => 0,
			'created' => '2011-07-01 15:11:41',
			'modified' => '2011-07-01 15:11:41'
		),
		array(
			'id' => '4e0e380e-4a30-4b26-a0cc-6eab968777eb',
			'identifier' => NULL,
			'name' => 'research lab ,English composition ,newspapers, event coverage ,online resources, evaluating resource content,Periodicals',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:42',
			'modified' => '2011-07-01 15:11:42'
		),
		array(
			'id' => '4e0e380e-0200-4d98-80f5-6eab968777eb',
			'identifier' => NULL,
			'name' => 'event coverage',
			'keyname' => 'eventcoverage',
			'weight' => 0,
			'created' => '2011-07-01 15:11:42',
			'modified' => '2011-07-01 15:11:42'
		),
		array(
			'id' => '4e0e380e-a284-4ec0-9a0d-6eab968777eb',
			'identifier' => NULL,
			'name' => 'evaluating resource content',
			'keyname' => 'evaluatingresourcecontent',
			'weight' => 0,
			'created' => '2011-07-01 15:11:42',
			'modified' => '2011-07-01 15:11:42'
		),
		array(
			'id' => '4e0e380e-87d0-4b14-ba81-6eab968777eb',
			'identifier' => NULL,
			'name' => 'classical studies ,scholarly articles',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:42',
			'modified' => '2011-07-01 15:11:42'
		),
		array(
			'id' => '4e0e380e-9f78-4b73-9e44-6eab968777eb',
			'identifier' => NULL,
			'name' => 'classical studies',
			'keyname' => 'classicalstudies',
			'weight' => 0,
			'created' => '2011-07-01 15:11:42',
			'modified' => '2011-07-01 15:11:42'
		),
		array(
			'id' => '4e0e380e-7f44-4887-910b-6eab968777eb',
			'identifier' => NULL,
			'name' => 'scholarly articles',
			'keyname' => 'scholarlyarticles',
			'weight' => 0,
			'created' => '2011-07-01 15:11:42',
			'modified' => '2011-07-01 15:11:42'
		),
		array(
			'id' => '4e0e380e-57b4-41f9-89f3-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Boolean logic ,operators , evaluating search results',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:42',
			'modified' => '2011-07-01 15:11:42'
		),
		array(
			'id' => '4e0e380e-e038-4bea-85df-6eab968777eb',
			'identifier' => NULL,
			'name' => 'operators',
			'keyname' => 'operators',
			'weight' => 0,
			'created' => '2011-07-01 15:11:42',
			'modified' => '2011-07-01 15:11:42'
		),
		array(
			'id' => '4e0e380e-d0c8-4eef-b6f8-6eab968777eb',
			'identifier' => NULL,
			'name' => 'plagiarism , citing sources, UA Student Code of Conduct ,fundamental Skill',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:42',
			'modified' => '2011-07-01 15:11:42'
		),
		array(
			'id' => '4e0e380e-c8cc-419f-8cc7-6eab968777eb',
			'identifier' => NULL,
			'name' => 'UA Student Code of Conduct',
			'keyname' => 'uastudentcodeofconduct',
			'weight' => 0,
			'created' => '2011-07-01 15:11:42',
			'modified' => '2011-07-01 15:11:42'
		),
		array(
			'id' => '4e0e380e-582c-464b-821a-6eab968777eb',
			'identifier' => NULL,
			'name' => 'citing sources ,American Language Association, documenting sources, formatting, style guide',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:42',
			'modified' => '2011-07-01 15:11:42'
		),
		array(
			'id' => '4e0e380e-547c-4f4b-9d8b-6eab968777eb',
			'identifier' => NULL,
			'name' => 'American Language Association',
			'keyname' => 'americanlanguageassociation',
			'weight' => 0,
			'created' => '2011-07-01 15:11:42',
			'modified' => '2011-07-01 15:11:42'
		),
		array(
			'id' => '4e0e380e-188c-485c-bbee-6eab968777eb',
			'identifier' => NULL,
			'name' => 'formatting',
			'keyname' => 'formatting',
			'weight' => 0,
			'created' => '2011-07-01 15:11:42',
			'modified' => '2011-07-01 15:11:42'
		),
		array(
			'id' => '4e0e380e-e91c-4fe8-8480-6eab968777eb',
			'identifier' => NULL,
			'name' => 'style guide',
			'keyname' => 'styleguide',
			'weight' => 0,
			'created' => '2011-07-01 15:11:42',
			'modified' => '2011-07-01 15:11:42'
		),
		array(
			'id' => '4e0e380e-835c-408a-8629-6eab968777eb',
			'identifier' => NULL,
			'name' => 'writing assignments, research paper, ,essay, fundamental skill ,documenting sources, citing',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:42',
			'modified' => '2011-07-01 15:11:42'
		),
		array(
			'id' => '4e0e380e-7aa0-4a57-bce9-6eab968777eb',
			'identifier' => NULL,
			'name' => 'QuickHelp, side by side , National Center for Biotechnology , NCIB , U.S. National Library of Medicine, NLM , National Institutes of Health, NIH , Medline, molecular biology , medical literature, biomedical research',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:42',
			'modified' => '2011-07-01 15:11:42'
		),
		array(
			'id' => '4e0e380e-b0b0-430a-91dd-6eab968777eb',
			'identifier' => NULL,
			'name' => 'citing sources, American Psychological Association , style guide',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:42',
			'modified' => '2011-07-01 15:11:42'
		),
		array(
			'id' => '4e0e380e-c2fc-4844-8f4c-6eab968777eb',
			'identifier' => NULL,
			'name' => 'American Psychological Association',
			'keyname' => 'americanpsychologicalassociation',
			'weight' => 0,
			'created' => '2011-07-01 15:11:42',
			'modified' => '2011-07-01 15:11:42'
		),
		array(
			'id' => '4e0e380e-29ec-436a-b02a-6eab968777eb',
			'identifier' => NULL,
			'name' => 'demographic ,lifestyle product ,media ,research ,advertising ,marketing',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:42',
			'modified' => '2011-07-01 15:11:42'
		),
		array(
			'id' => '4e0e380e-5f18-49da-958b-6eab968777eb',
			'identifier' => NULL,
			'name' => 'demographic',
			'keyname' => 'demographic',
			'weight' => 0,
			'created' => '2011-07-01 15:11:42',
			'modified' => '2011-07-01 15:11:42'
		),
		array(
			'id' => '4e0e380e-2904-495a-8b2b-6eab968777eb',
			'identifier' => NULL,
			'name' => 'lifestyle product',
			'keyname' => 'lifestyleproduct',
			'weight' => 0,
			'created' => '2011-07-01 15:11:42',
			'modified' => '2011-07-01 15:11:42'
		),
		array(
			'id' => '4e0e380e-e4e0-4d2a-9a55-6eab968777eb',
			'identifier' => NULL,
			'name' => 'advertising',
			'keyname' => 'advertising',
			'weight' => 0,
			'created' => '2011-07-01 15:11:42',
			'modified' => '2011-07-01 15:11:42'
		),
		array(
			'id' => '4e0e380e-fa08-4dbd-bbc3-6eab968777eb',
			'identifier' => NULL,
			'name' => 'fundamental skill ,Research Lab, English composition, choosing topics ,research paper, writing assignment ,essay',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:42',
			'modified' => '2011-07-01 15:11:42'
		),
		array(
			'id' => '4e0e380e-54bc-41bd-9d2a-6eab968777eb',
			'identifier' => NULL,
			'name' => 'choosing topics',
			'keyname' => 'choosingtopics',
			'weight' => 0,
			'created' => '2011-07-01 15:11:42',
			'modified' => '2011-07-01 15:11:42'
		),
		array(
			'id' => '4e0e380e-f5ec-43e9-b91e-6eab968777eb',
			'identifier' => NULL,
			'name' => 'fundamental skill ,writing assignment ,Research Paper Requirements ,writing essays ,research lab, English composition',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:42',
			'modified' => '2011-07-01 15:11:42'
		),
		array(
			'id' => '4e0e380e-3524-458c-b25f-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Research Paper Requirements',
			'keyname' => 'researchpaperrequirements',
			'weight' => 0,
			'created' => '2011-07-01 15:11:42',
			'modified' => '2011-07-01 15:11:42'
		),
		array(
			'id' => '4e0e380e-f3e0-4b8d-b1dc-6eab968777eb',
			'identifier' => NULL,
			'name' => 'fundamental skill ,writing assignment, research paper requirements, finding sources, model assignment',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:42',
			'modified' => '2011-07-01 15:11:42'
		),
		array(
			'id' => '4e0e380f-ab48-4ab4-81ab-6eab968777eb',
			'identifier' => NULL,
			'name' => 'pro con ,CQ Researcher ,research lab, fundamental skill',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:43',
			'modified' => '2011-07-01 15:11:43'
		),
		array(
			'id' => '4e0e380f-63a0-40d8-90fa-6eab968777eb',
			'identifier' => NULL,
			'name' => 'pro con',
			'keyname' => 'procon',
			'weight' => 0,
			'created' => '2011-07-01 15:11:43',
			'modified' => '2011-07-01 15:11:43'
		),
		array(
			'id' => '4e0e380f-47b8-4794-bf35-6eab968777eb',
			'identifier' => NULL,
			'name' => 'CQ Researcher',
			'keyname' => 'cqresearcher',
			'weight' => 0,
			'created' => '2011-07-01 15:11:43',
			'modified' => '2011-07-01 15:11:43'
		),
		array(
			'id' => '4e0e380f-338c-46bc-a3a7-6eab968777eb',
			'identifier' => NULL,
			'name' => 'research lab ,English composition,writing assignments,research paper , essay requirements,fundamental skill',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:43',
			'modified' => '2011-07-01 15:11:43'
		),
		array(
			'id' => '4e0e380f-5600-40d0-8e1b-6eab968777eb',
			'identifier' => NULL,
			'name' => 'essay requirements',
			'keyname' => 'essayrequirements',
			'weight' => 0,
			'created' => '2011-07-01 15:11:43',
			'modified' => '2011-07-01 15:11:43'
		),
		array(
			'id' => '4e0e380f-6524-4942-8d3d-6eab968777eb',
			'identifier' => NULL,
			'name' => 'QuickHelp,side by side, keyword searching, choosing research topics,modifying search parameters, search skills',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:43',
			'modified' => '2011-07-01 15:11:43'
		),
		array(
			'id' => '4e0e380f-0058-4e1a-96aa-6eab968777eb',
			'identifier' => NULL,
			'name' => 'keyword searching',
			'keyname' => 'keywordsearching',
			'weight' => 0,
			'created' => '2011-07-01 15:11:43',
			'modified' => '2011-07-01 15:11:43'
		),
		array(
			'id' => '4e0e380f-b784-402f-b695-6eab968777eb',
			'identifier' => NULL,
			'name' => 'choosing research topics',
			'keyname' => 'choosingresearchtopics',
			'weight' => 0,
			'created' => '2011-07-01 15:11:43',
			'modified' => '2011-07-01 15:11:43'
		),
		array(
			'id' => '4e0e380f-5de4-4d67-a78a-6eab968777eb',
			'identifier' => NULL,
			'name' => 'modifying search parameters',
			'keyname' => 'modifyingsearchparameters',
			'weight' => 0,
			'created' => '2011-07-01 15:11:43',
			'modified' => '2011-07-01 15:11:43'
		),
		array(
			'id' => '4e0e380f-f954-4cad-84c4-6eab968777eb',
			'identifier' => NULL,
			'name' => 'search skills',
			'keyname' => 'searchskills',
			'weight' => 0,
			'created' => '2011-07-01 15:11:43',
			'modified' => '2011-07-01 15:11:43'
		),
		array(
			'id' => '4e0e380f-4ba8-4899-a46a-6eab968777eb',
			'identifier' => NULL,
			'name' => 'OPAC,keyword searching, Boolean operators , QuickHelp , side by side , activities',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:43',
			'modified' => '2011-07-01 15:11:43'
		),
		array(
			'id' => '4e0e380f-7418-49a8-80e8-6eab968777eb',
			'identifier' => NULL,
			'name' => 'citing sources ,RefWorks, fundamental skill , references , EndNote Web , Zotero , EasyBib , Landmark\'s Citation Machine',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:43',
			'modified' => '2011-07-01 15:11:43'
		),
		array(
			'id' => '4e0e380f-dfd8-4e4a-a7b8-6eab968777eb',
			'identifier' => NULL,
			'name' => 'EndNote Web',
			'keyname' => 'endnoteweb',
			'weight' => 0,
			'created' => '2011-07-01 15:11:43',
			'modified' => '2011-07-01 15:11:43'
		),
		array(
			'id' => '4e0e380f-e0d8-4bbb-8adf-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Zotero',
			'keyname' => 'zotero',
			'weight' => 0,
			'created' => '2011-07-01 15:11:43',
			'modified' => '2011-07-01 15:11:43'
		),
		array(
			'id' => '4e0e380f-d170-421a-9f97-6eab968777eb',
			'identifier' => NULL,
			'name' => 'EasyBib',
			'keyname' => 'easybib',
			'weight' => 0,
			'created' => '2011-07-01 15:11:43',
			'modified' => '2011-07-01 15:11:43'
		),
		array(
			'id' => '4e0e380f-ac8c-44df-87d0-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Landmark\'s Citation Machine',
			'keyname' => 'landmarkscitationmachine',
			'weight' => 0,
			'created' => '2011-07-01 15:11:43',
			'modified' => '2011-07-01 15:11:43'
		),
		array(
			'id' => '4e0e380f-dd98-4997-8055-6eab968777eb',
			'identifier' => NULL,
			'name' => 'general citation, MLA,APA, Chicago Style, writing assignments, research paper, essay, fundamental skill , documenting sources, citing, copyright',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:43',
			'modified' => '2011-07-01 15:11:43'
		),
		array(
			'id' => '4e0e380f-2670-49b5-bbb3-6eab968777eb',
			'identifier' => NULL,
			'name' => 'general citation',
			'keyname' => 'generalcitation',
			'weight' => 0,
			'created' => '2011-07-01 15:11:43',
			'modified' => '2011-07-01 15:11:43'
		),
		array(
			'id' => '4e0e380f-cb9c-40f0-932c-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Harper\'s Weekly,newspapers,1800\'s,19th century,images , periodicals , graphics , pictures',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:43',
			'modified' => '2011-07-01 15:11:43'
		),
		array(
			'id' => '4e0e380f-48f0-48c2-8d88-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Harper\'s Weekly',
			'keyname' => 'harpersweekly',
			'weight' => 0,
			'created' => '2011-07-01 15:11:43',
			'modified' => '2011-07-01 15:11:43'
		),
		array(
			'id' => '4e0e380f-2c40-4688-96ac-6eab968777eb',
			'identifier' => NULL,
			'name' => '19th century',
			'keyname' => '19thcentury',
			'weight' => 0,
			'created' => '2011-07-01 15:11:43',
			'modified' => '2011-07-01 15:11:43'
		),
		array(
			'id' => '4e0e380f-1bbc-40d2-98f9-6eab968777eb',
			'identifier' => NULL,
			'name' => 'maps,GIS, topographical, limit search, refine search results ,mining',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:43',
			'modified' => '2011-07-01 15:11:43'
		),
		array(
			'id' => '4e0e380f-335c-426c-aa28-6eab968777eb',
			'identifier' => NULL,
			'name' => 'GIS',
			'keyname' => 'gis',
			'weight' => 0,
			'created' => '2011-07-01 15:11:43',
			'modified' => '2011-07-01 15:11:43'
		),
		array(
			'id' => '4e0e380f-0f40-47fc-95cc-6eab968777eb',
			'identifier' => NULL,
			'name' => 'topographical',
			'keyname' => 'topographical',
			'weight' => 0,
			'created' => '2011-07-01 15:11:43',
			'modified' => '2011-07-01 15:11:43'
		),
		array(
			'id' => '4e0e380f-e4e4-4c02-9896-6eab968777eb',
			'identifier' => NULL,
			'name' => 'mining',
			'keyname' => 'mining',
			'weight' => 0,
			'created' => '2011-07-01 15:11:43',
			'modified' => '2011-07-01 15:11:43'
		),
		array(
			'id' => '4e0e3810-72f4-4659-9bf7-6eab968777eb',
			'identifier' => NULL,
			'name' => 'trade publications , business magazines , periodicals , newspapers , industry analysis , NAICS code, target market, market research reports , market forecasts , industry analysis , consumer goods , demographics , heavy industry , financial trends',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:43',
			'modified' => '2011-07-01 15:11:43'
		),
		array(
			'id' => '4e0e3810-ca5c-436a-8f58-6eab968777eb',
			'identifier' => NULL,
			'name' => 'trade publications',
			'keyname' => 'tradepublications',
			'weight' => 0,
			'created' => '2011-07-01 15:11:44',
			'modified' => '2011-07-01 15:11:44'
		),
		array(
			'id' => '4e0e3810-8638-4317-9535-6eab968777eb',
			'identifier' => NULL,
			'name' => 'business magazines',
			'keyname' => 'businessmagazines',
			'weight' => 0,
			'created' => '2011-07-01 15:11:44',
			'modified' => '2011-07-01 15:11:44'
		),
		array(
			'id' => '4e0e3810-6988-466b-8be7-6eab968777eb',
			'identifier' => NULL,
			'name' => 'target market',
			'keyname' => 'targetmarket',
			'weight' => 0,
			'created' => '2011-07-01 15:11:44',
			'modified' => '2011-07-01 15:11:44'
		),
		array(
			'id' => '4e0e3810-f4d4-45b1-97c3-6eab968777eb',
			'identifier' => NULL,
			'name' => 'consumer behavior,marketing,QuickHelp , side by side , activity',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:44',
			'modified' => '2011-07-01 15:11:44'
		),
		array(
			'id' => '4e0e3810-c0e4-4fff-8d40-6eab968777eb',
			'identifier' => NULL,
			'name' => 'consumer behavior',
			'keyname' => 'consumerbehavior',
			'weight' => 0,
			'created' => '2011-07-01 15:11:44',
			'modified' => '2011-07-01 15:11:44'
		),
		array(
			'id' => '4e0e3810-a024-41f4-a79c-6eab968777eb',
			'identifier' => NULL,
			'name' => 'QuickHelp , side by side, images , pictures , graphics , Library of Congress Subject Headings,LCSH , Huntington Archive of Asian Art,Carnegie Arts of the United States, Illustrated Bartsch,Magnum Photos, Museum of Modern Art Architecture and Design Collec',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:44',
			'modified' => '2011-07-01 15:11:44'
		),
		array(
			'id' => '4e0e3810-2ed0-477a-a86b-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Library of Congress Subject Headings',
			'keyname' => 'libraryofcongresssubjectheadings',
			'weight' => 0,
			'created' => '2011-07-01 15:11:44',
			'modified' => '2011-07-01 15:11:44'
		),
		array(
			'id' => '4e0e3810-0d0c-441c-a1a7-6eab968777eb',
			'identifier' => NULL,
			'name' => 'LCSH',
			'keyname' => 'lcsh',
			'weight' => 0,
			'created' => '2011-07-01 15:11:44',
			'modified' => '2011-07-01 15:11:44'
		),
		array(
			'id' => '4e0e3810-acc8-4eb6-8046-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Huntington Archive of Asian Art',
			'keyname' => 'huntingtonarchiveofasianart',
			'weight' => 0,
			'created' => '2011-07-01 15:11:44',
			'modified' => '2011-07-01 15:11:44'
		),
		array(
			'id' => '4e0e3810-619c-4294-9cae-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Carnegie Arts of the United States',
			'keyname' => 'carnegieartsoftheunitedstates',
			'weight' => 0,
			'created' => '2011-07-01 15:11:44',
			'modified' => '2011-07-01 15:11:44'
		),
		array(
			'id' => '4e0e3810-160c-481e-bd8f-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Illustrated Bartsch',
			'keyname' => 'illustratedbartsch',
			'weight' => 0,
			'created' => '2011-07-01 15:11:44',
			'modified' => '2011-07-01 15:11:44'
		),
		array(
			'id' => '4e0e3810-d5d0-494a-bca8-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Magnum Photos',
			'keyname' => 'magnumphotos',
			'weight' => 0,
			'created' => '2011-07-01 15:11:44',
			'modified' => '2011-07-01 15:11:44'
		),
		array(
			'id' => '4e0e3810-8784-42b7-864e-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Museum of Modern Art Architecture and Design Collection',
			'keyname' => 'museumofmodernartarchitectureanddesigncollection',
			'weight' => 0,
			'created' => '2011-07-01 15:11:44',
			'modified' => '2011-07-01 15:11:44'
		),
		array(
			'id' => '4e0e3810-b700-48ea-9934-6eab968777eb',
			'identifier' => NULL,
			'name' => 'Architecture',
			'keyname' => 'architecture',
			'weight' => 0,
			'created' => '2011-07-01 15:11:44',
			'modified' => '2011-07-01 15:11:44'
		),
		array(
			'id' => '4e0e3810-5658-4420-9ca5-6eab968777eb',
			'identifier' => NULL,
			'name' => 'photography',
			'keyname' => 'photography',
			'weight' => 0,
			'created' => '2011-07-01 15:11:44',
			'modified' => '2011-07-01 15:11:44'
		),
		array(
			'id' => '4e0e3810-f100-47c9-bf2d-6eab968777eb',
			'identifier' => NULL,
			'name' => 'fine arts',
			'keyname' => 'finearts',
			'weight' => 0,
			'created' => '2011-07-01 15:11:44',
			'modified' => '2011-07-01 15:11:44'
		),
		array(
			'id' => '4e0e3810-8888-4cf1-b462-6eab968777eb',
			'identifier' => NULL,
			'name' => 'paintings',
			'keyname' => 'paintings',
			'weight' => 0,
			'created' => '2011-07-01 15:11:44',
			'modified' => '2011-07-01 15:11:44'
		),
		array(
			'id' => '4e0e3810-71f4-476e-9b83-6eab968777eb',
			'identifier' => NULL,
			'name' => 'North American Industry Classification System , U.S. Census Bureau, industry analysis , NAICS code, target market, market research reports , market forecasts , finance',
			'keyname' => '',
			'weight' => 0,
			'created' => '2011-07-01 15:11:44',
			'modified' => '2011-07-01 15:11:44'
		),
		array(
			'id' => '4e0e3810-38f8-4714-a095-6eab968777eb',
			'identifier' => NULL,
			'name' => 'North American Industry Classification System',
			'keyname' => 'northamericanindustryclassificationsystem',
			'weight' => 0,
			'created' => '2011-07-01 15:11:44',
			'modified' => '2011-07-01 15:11:44'
		),
		array(
			'id' => '4e0e3810-f470-4816-9faa-6eab968777eb',
			'identifier' => NULL,
			'name' => 'U.S. Census Bureau',
			'keyname' => 'uscensusbureau',
			'weight' => 0,
			'created' => '2011-07-01 15:11:44',
			'modified' => '2011-07-01 15:11:44'
		),
		array(
			'id' => '4e0e3810-d8ec-4e03-9c40-6eab968777eb',
			'identifier' => NULL,
			'name' => 'finance',
			'keyname' => 'finance',
			'weight' => 0,
			'created' => '2011-07-01 15:11:44',
			'modified' => '2011-07-01 15:11:44'
		),
	);
}
