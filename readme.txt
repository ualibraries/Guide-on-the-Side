
PLATFORM SUPPORT / DEPENDENCIES
-------------------------------------------------------------------------------
Guide on the Side has been tested on the following platforms:
1. Ubuntu Linux 11.10, MySQL 5.1, Apache 2.2, PHP 5.3
2. Red Hat Enterprise Linux 5.6, MySQL 5.0, Apache 2.2, PHP 5.2/5.3

PHP must have the following loaded or compiled in:
1. GD support (--with-gd). This is supplied by the php5-gd package in Ubuntu.
2. FreeType (--with-freetype-dir). This is also supplied by the php5-gd 
package in Ubuntu.
3. Tidy (--with-tidy) (optional, but highly recommended). This is supplied by 
the php5-tidy package in Ubuntu.

Other requirements:
1. PHP short tags must be turned off (short_open_tag = Off in php.ini). This 
feature can cause problems with TinyMCE (the included WYSIWYG editor).
2. PHP must have the ability to run on the command line during installation 
and upgrading.
3. CentOS 5.8 apparently bundles an ancient version of PCRE which prevents the
CakePHP command-line interface from functioning. If the Cake CLI won't run, 
please upgrade PCRE. Note: CakePHP 2.1.4 may work around this problem.  

INSTALLATION
-------------------------------------------------------------------------------
1. Download Guide on the Side and unzip it into the appropriate folder on your 
   web server. You should now have a folder called "guide_on_the_side".
2. Create a MySQL database to hold your tutorials. You may call it whatever
   you like, but "guide_on_the_side" is probably a good choice. Remember the 
   name you chose, as well as the MySQL username and password.
3. Copy config.sample.yml to config.yml.
4. Modify the database information (at least) in config.yml so that it 
     matches what you created in step 2.
5. Install the database schema by running the following commands from the 
   guide_on_the_side/app folder:
     a. ../lib/Cake/Console/cake Migrations.migration --plugin Tags all
     b. ../lib/Cake/Console/cake Migrations.migration all
6. Change permissions of app/tmp to make it and all sub-folders writable by 
   the web server. Example command (for Unix-like systems): 
   chmod -R 777 app/tmp.
7. Change permissions of app/webroot/uploads to make it and all sub-folders writable by 
   the web server. Example command (for Unix-like systems): 
   chmod -R 777 app/webroot/uploads.
8. If all went as planned, the public interface should now be available at 
   http://<server>/guide_on_the_side/ (assuming the folder you unzipped to 
   in step 1 was in your server web root.)
9. You may log in at http://<server>/guide_on_the_side/login to begin creating
   tutorials. The default username / password is admin / GuideOnTheSideAdmin#1.
   You should change this immediately and, ideally, add some non-admin 
   accounts!

CUSTOMIZATION
-------------------------------------------------------------------------------
Guide on the Side is an open-source application and, obviously, you have full
permission to change it however you want.

But you shouldn't.

Or, at least, you shouldn't without realizing what you're getting into. If you
change the application simply because you want to add institutional branding, say, or
you just don't like the colors, there is a better way -- better for you, that 
is.

It can be extremely difficult for a customized (also called "forked") 
open-source product to take advantage of updates to the original application. 
And it's entirely likely that you'll want to take advantage of any future 
updates to Guide on the Side. There are very good reasons for customization / 
forking, of course, but if you don't already know what those are, please read 
on for a way that you can have control over the presentation of Guide on the 
Side without losing the advantage of receiving upgraded functionality in the 
future.

Because Guide on the Side is built using the CakePHP framework, it includes 
some basic theming ability. At this time, it is possible to change any 
part of the interface using this theming functionality included with this 
framework. In other words, using themes you can change how the 
application *looks*, but not *what it does*.

The short version: you can create a new folder inside of 
guide_on_the_side/themes/Themed, and then in config.yml enter the name of this 
new folder as the value for the theme parameter (e.g., "theme: UAL"). Any file 
that you find inside of app/View or app/webroot can now be overridden by 
placing an identically named file inside your new theme. For example, if 
you'd like to override the main public index of Guide on the Side, copy 
app/View/Tutorials/public_index.ctp into 
themes/Themed/<your_theme>/Tutorials/public_index.ctp and then modify as you 
wish. 

For more information, see the Themes portion of the CakePHP book:
http://book.cakephp.org/2.0/en/views/themes.html

UPGRADING
-------------------------------------------------------------------------------
1. Back up your database!
2. No really -- back up your database!
3. If you've modified the Guide on the Side source code (anything inside the 
   "app" folder), all bets are off on upgrading. You're better off contacting 
   us or submitting patches to make the application more flexible! 
4. Back up your config.yml file and any themes.
5. Download the latest version of Guide on the Side and unzip it into a new 
   location. 
6. Read any release notes to determine if you need to run database migrations,
   or to find out if your themes need to change.
7. Delete the app and lib folders from the old version.
8. Copy the new app and lib folders into place.
9. Test to make sure everything still works.

CREDITS
-------------------------------------------------------------------------------
Close, print, dock/undock icons:
 - Authored by Mark James - http://famfamfam.com/lab/icons/silk/
 - Used under CC BY 3.0 license - http://creativecommons.org/licenses/by/3.0/

Copyright (C) 2011-2012 The Arizona Board of Regents on Behalf of the 
University of Arizona. Developed by Leslie Sult, Justin Spargur, 
Gregory Hagedon, and Ginger Bidwell at the University of Arizona Libraries.