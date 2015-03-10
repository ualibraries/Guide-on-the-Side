ALTER TABLE `revisions` MODIFY `content` text; 

ALTER TABLE `tutorials` MODIFY `content` text; 
ALTER TABLE `tutorials` MODIFY `published` tinyint(1) NOT NULL DEFAULT '0'; 
ALTER TABLE `tutorials` MODIFY `deleted` tinyint(1) NOT NULL DEFAULT '0'; 
ALTER TABLE `tutorials` MODIFY `dot_creation_timestamp` datetime DEFAULT NULL;
ALTER TABLE `tutorials` MODIFY `dot_last_revision_timestamp` datetime DEFAULT NULL;
ALTER TABLE `tutorials` MODIFY `licensing` varchar(40) DEFAULT NULL;
ALTER TABLE `tutorials` MODIFY `dot_source_path` varchar(2048);
ALTER TABLE `tutorials` MODIFY `for_credit` tinyint(1) NOT NULL DEFAULT '0';

ALTER TABLE `tutorials` ADD `popup` tinyint(1) NOT NULL DEFAULT '0';
ALTER TABLE `tutorials` ADD `custom_feedback_link_text` varchar(255) DEFAULT NULL;
ALTER TABLE `tutorials` ADD `show_feedback_link` tinyint(1) NOT NULL DEFAULT '1';
ALTER TABLE `tutorials` ADD `show_chapter_progress` tinyint(1) NOT NULL DEFAULT '1';

ALTER TABLE `users` MODIFY `password` varchar(1024) NOT NULL COMMENT 'password';
ALTER TABLE `users` MODIFY `deleted` tinyint(1) NOT NULL DEFAULT '0';
