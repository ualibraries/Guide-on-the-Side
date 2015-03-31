
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `answer` text NOT NULL,
  `response` text,
  `order` int(11) DEFAULT NULL,
  `question_id` int(11) NOT NULL,
  `response_heading` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `answers` WRITE;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
INSERT INTO `answers` VALUES (1,'Thelma and Louise','This is not correct. Please go back and read the first sentence under Precursor technologies.',0,1,NULL),(2,'Aristotle and Euclid','Good work! This is the correct answer.',1,1,NULL),(3,'Fred and Barney','This is not correct. Please go back and read the first sentence under Precursor technologies.',2,1,NULL),(4,'To keep up with celebrity gossip','',0,2,NULL),(5,'To gather background information on an unfamiliar topic','',1,2,NULL),(6,'To learn about cameras','',2,2,NULL);
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `audiences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(2048) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `audiences` WRITE;
/*!40000 ALTER TABLE `audiences` DISABLE KEYS */;
INSERT INTO `audiences` VALUES (1,'Early Career Undergraduate'),(2,'Mid-Career Undergraduate'),(3,'Graduate Students'),(4,'Distance Learners'),(5,'Faculty');
/*!40000 ALTER TABLE `audiences` ENABLE KEYS */;
UNLOCK TABLES;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `audiences_tutorials` (
  `audience_id` int(11) NOT NULL,
  `tutorial_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `audiences_tutorials` WRITE;
/*!40000 ALTER TABLE `audiences_tutorials` DISABLE KEYS */;
/*!40000 ALTER TABLE `audiences_tutorials` ENABLE KEYS */;
UNLOCK TABLES;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `final_quizzes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(1024) DEFAULT NULL,
  `content` text,
  `certificate` tinyint(1) DEFAULT '1',
  `certificate_email` varchar(255) DEFAULT NULL,
  `certificate_email_self` tinyint(1) DEFAULT '1',
  `certificate_grades` tinyint(1) DEFAULT '1',
  `tutorial_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `final_quizzes` WRITE;
/*!40000 ALTER TABLE `final_quizzes` DISABLE KEYS */;
INSERT INTO `final_quizzes` VALUES (1,NULL,'<p>Take this final quiz.<img class=\"question\" src=\"questions/view_image/2\" alt=\"\" /></p>',1,NULL,1,1,1,'2013-10-30 14:22:42','2013-10-30 14:49:14');
/*!40000 ALTER TABLE `final_quizzes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `learning_goals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(2048) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `learning_goals` WRITE;
/*!40000 ALTER TABLE `learning_goals` DISABLE KEYS */;
INSERT INTO `learning_goals` VALUES (1,'Developing a Research Strategy'),(2,'Selecting Finding Tools'),(3,'Searching'),(4,'Using Finding Tool Features'),(5,'Retrieving Sources'),(6,'Evaluating Sources'),(7,'Documenting Sources'),(8,'Understanding Economic, Legal, and Social Issues');
/*!40000 ALTER TABLE `learning_goals` ENABLE KEYS */;
UNLOCK TABLES;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `learning_goals_tutorials` (
  `learning_goal_id` int(11) NOT NULL,
  `tutorial_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `learning_goals_tutorials` WRITE;
/*!40000 ALTER TABLE `learning_goals_tutorials` DISABLE KEYS */;
/*!40000 ALTER TABLE `learning_goals_tutorials` ENABLE KEYS */;
UNLOCK TABLES;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(1024) NOT NULL,
  `correct_answer` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,'<p>What are the names of the Greek mathematicians that described a pinhole camera?</p>',1),(2,'<p>What is a good use for <em>Wikipedia</em>?</p>',1);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resource_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(2048) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `resource_types` WRITE;
/*!40000 ALTER TABLE `resource_types` DISABLE KEYS */;
INSERT INTO `resource_types` VALUES (1,'Assessment'),(2,'Database Tutorial'),(3,'Demonstration'),(4,'Exercise'),(5,'Guide'),(6,'In-Class Activity'),(7,'Lecture'),(8,'Simulation'),(9,'Scenario');
/*!40000 ALTER TABLE `resource_types` ENABLE KEYS */;
UNLOCK TABLES;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resource_types_tutorials` (
  `resource_type_id` int(11) NOT NULL,
  `tutorial_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `resource_types_tutorials` WRITE;
/*!40000 ALTER TABLE `resource_types_tutorials` DISABLE KEYS */;
/*!40000 ALTER TABLE `resource_types_tutorials` ENABLE KEYS */;
UNLOCK TABLES;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `revisions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tutorial_id` int(11) NOT NULL,
  `content` text,
  `user_id` int(11) NOT NULL,
  `operation` varchar(40) NOT NULL,
  `timestamp` datetime DEFAULT NULL,
  `log_message` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `revisions` WRITE;
/*!40000 ALTER TABLE `revisions` DISABLE KEYS */;
/*!40000 ALTER TABLE `revisions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'creator'),(2,'admin');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schema_migrations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `schema_migrations` WRITE;
/*!40000 ALTER TABLE `schema_migrations` DISABLE KEYS */;
INSERT INTO `schema_migrations` VALUES (1,'InitMigrations','Migrations','2015-03-31 11:06:14'),(2,'ConvertVersionToClassNames','Migrations','2015-03-31 11:06:14'),(3,'IncreaseClassNameLength','Migrations','2015-03-31 11:06:14'),(4,'M49ac311a54844a9d87o822502jedc423','Tags','2015-03-31 11:06:14'),(5,'M4c0d42bcd12c4db099c105f40e8f3d6d','Tags','2015-03-31 11:06:15'),(6,'M8d01880f01c11e0be500800200c9a66','Tags','2015-03-31 11:06:15'),(7,'M4db71ff537bc4ee397642a369ab05d96','app','2015-03-31 11:06:24'),(8,'M4db9fcc4348449dca1d756749ab05d96','app','2015-03-31 11:06:25'),(9,'M4dc06554e16c485ba235279a9ab05d96','app','2015-03-31 11:06:25'),(10,'M4dc07e32c360433493032b1a9ab05d96','app','2015-03-31 11:06:26'),(11,'M4dc4641c2c4c472fb06a0df79ab05d96','app','2015-03-31 11:06:26'),(12,'M4dd563a0aeb04a66969139aa9ab05d96','app','2015-03-31 11:06:26'),(13,'M4de9564c6f104137b35e11d39ab05d96','app','2015-03-31 11:06:27'),(14,'RemoveIntroductionField','app','2015-03-31 11:06:27'),(15,'MigrateEmailAddresses','app','2015-03-31 11:06:27'),(16,'AddTitleForStartingLocation','app','2015-03-31 11:06:27'),(17,'AddResponseHeadingColumn','app','2015-03-31 11:06:27'),(18,'AddPopupField','app','2015-03-31 11:06:27'),(19,'AddShowChapterProgressToTutorials','app','2015-03-31 11:06:27'),(20,'AddTutorialFeedbackLinkOptions','app','2015-03-31 11:06:28'),(21,'AddNonNullDefaultsToTutorials','app','2015-03-31 11:06:28'),(22,'AddDefaultValueUsersDeletedColumn','app','2015-03-31 11:06:28'),(23,'MakeTutorialsAndRevisionsColumnsNullable','app','2015-03-31 11:06:28');
/*!40000 ALTER TABLE `schema_migrations` ENABLE KEYS */;
UNLOCK TABLES;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(2048) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` VALUES (1,'Books in Print'),(2,'Botany'),(3,'Business'),(4,'Chemistry'),(5,'Classics'),(6,'Climatology/Meteorology'),(7,'Communication'),(8,'Computers/MIS'),(9,'Criminal Justice'),(10,'Current Events'),(11,'Dance'),(12,'Data Sets'),(13,'Dissertations'),(14,'Drama/Theater Arts'),(15,'Economics'),(16,'Education'),(17,'Electronic Journals'),(18,'Electronics'),(19,'Engineering'),(20,'English Literature'),(21,'Film/Media Arts'),(22,'Food'),(23,'French Studies'),(24,'Gay, Lesbian, Bisexual, Transgender Studies'),(25,'Gender Studies'),(26,'General Indexes to All Subjects'),(27,'Geography'),(28,'Geology'),(29,'German Studies'),(30,'Government'),(31,'Health Sciences'),(32,'History'),(33,'Humanities'),(34,'Journalism'),(35,'Landscape Architecture'),(36,'Languages'),(37,'Latin American Studies'),(38,'Law'),(39,'Library Science'),(40,'Life Sciences'),(41,'Linguistics'),(42,'Literature'),(43,'Mathematics'),(44,'Media Arts/Film'),(45,'Medicine'),(46,'Meteorology/Climatology'),(47,'Mexican American Studies'),(48,'Middle Eastern Studies'),(49,'MIS'),(50,'Multidisciplinary Indexes'),(51,'Music'),(52,'News/Newspapers'),(53,'Nutrition'),(54,'Patents'),(55,'Philosophy'),(56,'Photography'),(57,'Physics'),(58,'Planning (Urban Design, etc.)'),(59,'Plants'),(60,'Politics'),(61,'Psychology'),(62,'Public Policy'),(63,'Religion'),(64,'Russian and Slavic Studies'),(65,'Science (General)'),(66,'Social Sciences (General)'),(67,'Sociology'),(68,'Spanish and Portuguese'),(69,'Spatial Data'),(70,'Standards'),(71,'Technical Reports'),(72,'Theater Arts/Drama'),(73,'Trademarks'),(74,'Transportation'),(75,'Water'),(76,'Women\'s Studies'),(77,'Zoology');
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subjects_tutorials` (
  `subject_id` int(11) NOT NULL,
  `tutorial_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `subjects_tutorials` WRITE;
/*!40000 ALTER TABLE `subjects_tutorials` DISABLE KEYS */;
/*!40000 ALTER TABLE `subjects_tutorials` ENABLE KEYS */;
UNLOCK TABLES;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `system` WRITE;
/*!40000 ALTER TABLE `system` DISABLE KEYS */;
/*!40000 ALTER TABLE `system` ENABLE KEYS */;
UNLOCK TABLES;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tagged` (
  `id` varchar(36) NOT NULL,
  `foreign_key` varchar(36) NOT NULL,
  `tag_id` varchar(36) NOT NULL,
  `model` varchar(255) NOT NULL,
  `language` varchar(6) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `times_tagged` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE_TAGGING` (`model`,`foreign_key`,`tag_id`,`language`),
  KEY `INDEX_TAGGED` (`model`),
  KEY `INDEX_LANGUAGE` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `tagged` WRITE;
/*!40000 ALTER TABLE `tagged` DISABLE KEYS */;
/*!40000 ALTER TABLE `tagged` ENABLE KEYS */;
UNLOCK TABLES;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` varchar(36) NOT NULL,
  `identifier` varchar(30) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `keyname` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `occurrence` int(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE_TAG` (`identifier`,`keyname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tutorial_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(2048) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `tutorial_types` WRITE;
/*!40000 ALTER TABLE `tutorial_types` DISABLE KEYS */;
INSERT INTO `tutorial_types` VALUES (1,'side-by-side'),(2,'external'),(3,'uploaded'),(4,'document');
/*!40000 ALTER TABLE `tutorial_types` ENABLE KEYS */;
UNLOCK TABLES;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tutorials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_url` varchar(255) DEFAULT NULL,
  `title` varchar(1024) NOT NULL,
  `url` varchar(1024) DEFAULT '',
  `content` text,
  `certificate` tinyint(1) NOT NULL DEFAULT '1',
  `certificate_email` varchar(255) DEFAULT NULL,
  `certificate_email_self` tinyint(1) NOT NULL DEFAULT '1',
  `contact_name` varchar(255) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `contact_phone` varchar(255) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `in_index` tinyint(1) NOT NULL DEFAULT '1',
  `link_toc` tinyint(1) NOT NULL DEFAULT '1',
  `description` text,
  `dot_creation_timestamp` datetime DEFAULT NULL,
  `dot_last_revision_timestamp` datetime DEFAULT NULL,
  `licensing` varchar(40) DEFAULT NULL,
  `dot_source_path` varchar(2048) DEFAULT NULL,
  `tutorial_type_id` int(11) NOT NULL DEFAULT '1',
  `external_identifier` text,
  `author` varchar(1024) DEFAULT NULL,
  `format` varchar(1024) DEFAULT NULL,
  `updater` varchar(1024) DEFAULT NULL,
  `update_priority` varchar(255) DEFAULT NULL,
  `update_notes` text,
  `accessible_version_url` varchar(1024) DEFAULT NULL,
  `accessible_version_format` varchar(255) DEFAULT NULL,
  `for_credit` tinyint(1) NOT NULL DEFAULT '0',
  `url_title` varchar(1024) DEFAULT NULL,
  `popup` tinyint(1) NOT NULL DEFAULT '0',
  `custom_feedback_link_text` varchar(255) DEFAULT NULL,
  `show_feedback_link` tinyint(1) NOT NULL DEFAULT '1',
  `show_chapter_progress` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `tutorials` WRITE;
/*!40000 ALTER TABLE `tutorials` DISABLE KEYS */;
INSERT INTO `tutorials` VALUES (1,'wikipedia-demo','Wikipedia - demo','http://www.wikipedia.org/','<p>In this tutorial, you will learn how to find resources using <em>Wikipedia</em>.\n<em>Wikipedia </em>is a free online encyclopedia with access to over 4,000,000 articles.</p>\n<p>Use the arrows below to navigate through the tutorial</p>\n<p><img class=\"heading\" src=\"tutorials/view_heading_image/chapter/About%20Wikipedia\" alt=\"\" /></p>\n<p>Anyone can contribute to a <em>Wikipedia</em> article, so you need to use critical thinking skills when selecting articles. However, it can be a great place to gather background information on a topic that may be unfamiliar to you.</p>\n<p><img class=\"heading\" src=\"tutorials/view_heading_image/chapter/Search%20Wikipedia\" alt=\"\" /></p>\n<p>You search Wikipedia by using <img class=\"definition\" src=\"tutorials/view_definition_image/keywords/%3Cp%3EKeywords%20are%20important%20words%20or%20phrases%20that%20describe%20your%20research%20topic%20and%20will%20help%20you%20find%20relevant%20articles.%3C%5B%7C%5Bp%3E\" alt=\"\" />.</p>\n<p>Search for&nbsp;<strong>photography</strong>.&nbsp;</p>\n<p><img class=\"heading\" src=\"tutorials/view_heading_image/step/\" alt=\"\" /></p>\n<p>You are now at the <em>Wikipedia</em> page for <strong>Photography</strong></p>\n<p>Locate the <strong>Contents</strong> section on the left side of the page. This is the table of contents for the <em>Wikipedia</em> article.</p>\n<p>Select: <strong>2 History and evolution</strong></p>\n<p><img class=\"question\" src=\"questions/view_image/1\" alt=\"\" /></p>\n<p><img class=\"heading\" src=\"tutorials/view_heading_image/chapter/Thinking%20critically%20in%20Wikipedia\" alt=\"\" /></p>\n<p>One way to determine the validity of what you\'ve found is to check the <em>Wikipedia</em> citations. Use the superscript number to access information about the source.</p>\n<p><img src=\"uploads/images/superscript_link.png\" alt=\"example superscript link\" width=\"300\" height=\"139\" /></p>\n<p><img class=\"heading\" src=\"tutorials/view_heading_image/step/\" alt=\"\" />Scroll to the <strong>Camera development</strong> section of the page and take a look at the different cameras.</p>\n<p><img class=\"text-box\" src=\"tutorials/view_text_box_image/multi-line/Which%20of%20these%20cameras%20would%20be%20the%20most%20fun%20to%20use%7C%24%7C/I%7C%7D%7Cd%20most%20like%20to%20use%20the...\" alt=\"\" /></p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>',1,NULL,1,'Librarian','librarian@example.com','555-555-5555',1,'2013-10-24 12:06:23','2013-10-30 14:51:03',0,1,1,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00','','',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,0,NULL,1,1);
/*!40000 ALTER TABLE `tutorials` ENABLE KEYS */;
UNLOCK TABLES;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(1024) NOT NULL COMMENT 'user name (sometimes)',
  `role_id` int(11) NOT NULL,
  `password` varchar(1024) DEFAULT NULL COMMENT 'password',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin',2,'0a40a3b02b694c447c30ac561f98ac096092d23f',0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

