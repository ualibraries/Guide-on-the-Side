Release notes
=================

1.0-beta4 (2015-04-22)
-------------------------------------------------------------------------------
* The version of CakePHP bundled with the pre-built package has been updated to version 2.6.3.
* There ARE database schema changes in this version.  You'll need to run migrations to upgrade an existing installation.  If you don't have command line access to PHP, you can use app/Config/Migration/sql/upgrade_1.0-beta3_to_1.0-beta4.sql to make the appropriate schema changes.
* There are changes for config.sample.yml in this version. Back up your existing config.yml file, copy the new config.sample.yml to config.yml, and then manually migrate your configuration settings.
* Feature: The chapter progress text (e.g. “Step x of y”) can be hidden. Fixes issue #93.
* Feature: Popup mode.  Tutorials can be opened in popup windows instead of iframes.  Fixes issue #50.
* Feature: Magnify images.  Users can click on images in tutorials to view a larger version of them.  Note: this only applies to images uploaded in Guide on the Side version 1.0-beta4.  Images uploaded in previous versions of Guide on the Side must be re-uploaded to use this feature.  Fixes issue #75.
* Feature: New styles, including improved placement of forward and back arrows for tutorials.  Fixes issue #91.
* Feature: SMTP support has been added.
* Feature: Piwik support has been added.  Thanks, @a-sassmannshausen!
* Feature: Added configuration option to disable Lucene.  Thanks, @jaronkk!
* Feature: CAS support has been added.  Thanks, @jaronkk !
* Bug: The feedback form now has spam protection.  Fixes issue #113.
* Bug: Empty alert box no longer appears when you attempt to save an empty question.  Fixes issue #110.
* Bug: Unpublished tutorials are no longer still indexed.  Fixes issue #109.
* Bug: Tutorials are no longer indexed multiple times or not at all.
* Bug: Creators can now delete quizzes.  Fixes issues #91 and #20.
* Bug: Describe database migration procedure in UPGRADE.md.  Fixes issue #70.
* Bug: Links set to open in the right frame are no longer broken in popup mode.  Fixes issue #61.
* Bug: Tutorial creators can now add question answers and responses in IE, Chrome.  Fixes issue #35.
* Technical: Reworked database default values to make more sense.  Fixes issue #25.



1.0-beta3 (2013-11-08)
-------------------------------------------------------------------------------
* The version of CakePHP bundled with GotS has been upgraded.
* There ARE database schema changes in this version. You'll need to run migrations.
* Feature: Introduced an accessible "single-page view" that is intended for screen readers and mouse-less users. This fixes issue #30.
  * There's a control at the top of the step-by-step view and the single-page view to switch between the views.
  * Definition boxes stay open in this view.
  * Answer response dialogs and the print/email dialog work as expected.
  * There's now a button to check answers in both step-by-step and single-page view.
  * This may require a theme change.
* Feature: The table of contents has been de-emphasized and is now behind an icon. This may require a theme change.
* Feature: Tutorial URLs are no longer validated. This temporarily fixes issue #34.
* Feature: Tutorial creators can now add headings for answer response dialogs. This fixes issue #7.
* Bug: The table of contents now works when the tutorial is undocked. This fixes issue #31.
* Technical: The CakePHP Migrations plugin was upgraded for improved PHP 5.4 compatibility. This fixes issue #29.
* Technical: Dependence on jQuery Tools has been reduced by migrating tooltips to jQuery UI.
* Technical: jQuery CDN is now used with a local fallback. This fixes issue #32.
* Technical: GotS can now run over HTTPS. This fixes issue #32. Thanks @LunkRat!
* Documentation: Improved install documentation thanks to @michaeldoran. This fixes issue #4. Again.
* The sample tutorial has been replaced. Only those doing a fresh install will get it.

1.0-beta2 (2013-01-23)
-------------------------------------------------------------------------------
* The version of CakePHP bundled with GotS (but not in GitHub) has been upgraded to address a security issue.
* There are NO database schema changes in this version.
* There are NO theme changes required by this version.
* Bug: Uploaded images now work when GotS is installed into the root of a domain. This fixes issue #12.
* Feature: Text boxes can now be added to tutorials and quizzes. This fixes issue #11.
* Bug: WYSIWYG buttons now work when using a theme. This fixes issue #15.
* Bug: Shibboleth support is now working. This fixes issue #10.
* Bug: Additional dependencies have been documented. This fixes issue #4.
* Bug: Validation was removed for phone numbers. This fixes issue #9.
