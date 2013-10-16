alter table tutorials add column url_title varchar(1024) DEFAULT NULL;
alter table answers add column response_heading varchar(1024) DEFAULT NULL;
insert into schema_migrations (class, type, created) values
  ('AddTitleForStartingLocation','app', NOW()),
  ('AddResponseHeadingColumn','app', NOW());
