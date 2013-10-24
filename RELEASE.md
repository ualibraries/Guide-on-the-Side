Release notes
=================

1.0-beta3 (2013-10-23)
-------------------------------------------------------------------------------
* Feature: Introduced an accessible "single-page view" that is intended for screen readers and mouse-less users. This fixes issue #30.
  * There's a control at the top of the step-by-step view and the single-page view to switch between the views.
  * Definition boxes stay open in this view.
  * Answer response dialogs and the print/email dialog work as expected.
  * There's now a button to check answers in both step-by-step and single-page view.
* Feature: The table of contents has been de-emphasized and is now behind an icon.
* Feature: Tutorial URLs are no longer validated. This temporarily fixes issue #34.
* Feature: Tutorial creators can now add headings for answer response dialogs. This fixes issue #7.
* Bug: The table of contents now works when the tutorial is undocked. This fixes issue #31.
* Technical: The CakePHP Migrations plugin was upgraded for improved PHP 5.4 compatibility. This fixes issue #29.
* Technical: Dependence on jQuery Tools has been reduced by migrating tooltips to jQuery UI.
* Technical: jQuery CDN is now used with a local fallback. This fixes issue #32.
* Technical: GotS can now run over HTTPS. This fixes issue #32. Thanks @LunkRat!
* Documentation: Improved install documentation thanks to @michaeldoran. This fixes issue #4. Again.

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
