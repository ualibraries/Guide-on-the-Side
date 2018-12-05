Guide on the Side
=================

About
-------------------------------------------------------------------------------

Guide on the Side is a freely available tool created by the University of
Arizona Libraries that allows librarians to quickly and easily create online,
interactive tutorials that are based on the principles of authentic and active
learning. An example can be viewed here:
http://www.library.arizona.edu/applications/quickHelp/tutorial/searching-the-ua-library-catalog.

Please join the discussion of Guide on the Side on our
[Google Group](https://groups.google.com/forum/?fromgroups#!forum/gots-discuss)!

More information can be found on the [Guide on the Side website](https://ualibraries.github.io/Guide-on-the-Side/about.html).

Platform support / dependencies
-------------------------------------------------------------------------------
Guide on the Side has been tested on the following platforms:

* Ubuntu Linux 14.04, MySQL 5.5, Apache 2.4, PHP 5.5
* Ubuntu Linux 12.04, MySQL 5.5, Apache 2.2, PHP 5.3
* Ubuntu Linux 11.10, MySQL 5.1, Apache 2.2, PHP 5.3
* Red Hat Enterprise Linux 6.3, MySQL 5.1, Apache 2.2, PHP 5.3
* Red Hat Enterprise Linux 5.6, MySQL 5.0, Apache 2.2, PHP 5.5
* Linux Mint 17.1 Rebecca, MySQL 5.5, Apache 2.4, PHP 5.5

PHP must have the following loaded or compiled in:

* GD support (--with-gd). This is supplied by the php5-gd package in Ubuntu
  and Red Hat Linux.
* FreeType (--with-freetype-dir). This is also supplied by the php5-gd
  package in Ubuntu and Red Hat Linux.
* Tidy (--with-tidy). This is supplied by
  the php5-tidy package in Ubuntu and Red Hat Linux.
* mbstring (--enable-mbstring). This is supplied
  by the php-mbstring package in Red Hat Linux.
* JSON support. Some Linux distributions removed JSON support from their
  PHP 5.5 packages. This is supplied by the php5-json package in Ubuntu.

Other requirements:

* Guide on the Side supports two methods for sending email: you can either
  change the configuration settings to use an external SMTP server or send
  emails directly from the application server hosting your Guide on the Side
  installation.  If you're running a UNIX-like operating system and wish to send
  emails directly from the application server, you will need a Mail Transport
  Agent (MTA) like Postfix or Sendmail.  If you're running a Windows server, you
  may be able to use SMTP to send emails directly from the application server by
  reconfiguring PHP:
  http://php.net/manual/en/mail.configuration.php.
* date.timezone must be properly set in php.ini.
* PHP should have the ability to run on the command line during installation
  and upgrading. This is used to install the database schema. If you don't
  have access to PHP at the command line, you can try using the SQL migration at
  app/Config/Migration/sql/install.sql.  

Apache configuration
--------------------
* In order for the Guide on the Side .htaccess file rewrite directives
  to work, the Apache mod_rewrite module must be enabled and
  AllowOverride must be set to "FileInfo" in Apache's VirtualHost
  configuration. Additionally, in order for Guide on the Side to disable PHP
  short tags, AllowOverride must be set to "Options". If Shibboleth is enabled,
  AllowOverride must have the additional value "AuthConfig". So the whole
  directive would look like:

  ```
   AllowOverride FileInfo Options AuthConfig
  ```
  Be sure to restart Apache after making changes.

Installation procedure (if you're using the pre-built package)
-------------------------------------------------------------------------------
1. Download Guide on the Side and unzip it into the appropriate folder on your
   web server. You should now have a folder called "guide_on_the_side".
2. Create a MySQL database to hold your tutorials. You may call it whatever
   you like, but "guide_on_the_side" is probably a good choice. Remember the
   name you chose, as well as the MySQL username and password. Example:
   ```sql
    mysql> CREATE DATABASE guide_on_the_side;

    mysql> GRANT ALL ON guide_on_the_side.*
             TO gots_user@localhost IDENTIFIED BY 'my_password';
   ```
3. Copy config.sample.yml to config.yml.
4. Open config.yml in a text editor.  Change the `database` settings to match
   your credentials from step 2, for example:

   ```yaml
     database:
      datasource: Database/Mysql
      host: localhost
      login: gots_user
      password: my_password
      database: guide_on_the_side
    ```
5. Configure your email settings in config.yml.  Guide on the Side supports two
   options for sending email: using an external SMTP server or sending email
   directly from the application server hosting your Guide on the Side
   installation.

   Using an external SMTP server is recommended in most cases.  To configure
   Guide on the Side to use an external SMTP server, edit your config.yml
   like so:

    ```yaml
      email:
        # smtp (recommended) or php
        transport: smtp
        send_from: no-reply@example.com
        send_all_feedback_to: admin@example.com
        log: false

      # only if you chose smtp above
      smtp:
        host: smtpgate.email.example.com
        port: 587
        username:
        password:
        timeout: 30
        # none, ssl, or tls
        encryption: tls
    ```

    Contact your SMTP server administrator for the correct host, ports,
    credentials, and other information.  Note that some SMTP servers do not
    require login credentials, so it's possible that you may need to leave the
    `username` and `password` fields blank.

    If you're not using an external SMTP server, set `transport` to `php` and leave the `smtp` section blank.

6. Configure your analytics settings (optional).  Guide on the Side supports Universal Analytics, Classic Google Analytics, and Piwik.  To enable analytics for your Guide on the Side installation, go to the respective section of config.yml for your analytics service (`universal_analytics` for Universal Analytics, `google_analytics` for Classic Google Analytics, or `piwik_analytics` for Piwik), set the `enabled` property to `true` and supply the appropriate information and credentials.  If you are unsure if you're using Classic Google Analytics or Universal Analytics, please refer to: https://support.google.com/analytics/answer/4457764?hl=en

7. Install the database schema and sample content by running the following commands from the guide_on_the_side/app folder:
    ```
      ../lib/Cake/Console/cake Migrations.migration run all --plugin Tags

      ../lib/Cake/Console/cake Migrations.migration run all

      ../lib/Cake/Console/cake gots add_demo_tutorials
    ```
   Alternatively, there is an SQL schema available in app/Config/Migration/sql/install.sql.

8. Change permissions of app/tmp to make it and all sub-folders writable by
   the web server. Example command (for Unix-like systems):
   ```
    chmod -R 777 app/tmp
   ```
   You're encouraged to make the permissions more restrictive than this example.

9. Change permissions of app/webroot/uploads to make it and all sub-folders writable by
   the web server. Example command (for Unix-like systems):
   ```
     chmod -R 777 app/webroot/uploads
    ```
   You're encouraged to make the permissions more restrictive than this example.
   
   Note for Red Hat Enterprise Linux/CentOS Users
   ----------------------------------------------
   To ensure that Apache has the proper permissions, you may need to also run:
   ```
   chcon -t httpd_sys_rw_content_t app/tmp -R
   chcon -t httpd_sys_rw_content_t app/webroot/uploads -R
   ```
   These commands configure SELinux to allow the Apache user access to `app/tmp` and `app/webroot/uploads`.

10. If all went as planned, the public interface should now be available at
   http://your.domain/guide_on_the_side/ (assuming the folder you unzipped to
   in step 1 was in your server web root.)
11. You may log in at http://your.domain/guide_on_the_side/login to begin creating
   tutorials. The default username / password is:

    admin / GuideOnTheSideAdmin#1

   You should change this immediately and, ideally, add some non-admin
   accounts!

Installation procedure (if you want to clone from GitHub)
-------------------------------------------------------------------------------
If you'd prefer to get Guide on the Side by cloning directly from GitHub, there
are a couple extra steps. Note that the pre-built package from
code.library.arizona.edu does come as a git clone, so you can still upgrade by
pulling from GitHub if you install that way.

1. Clone Guide on the Side from GitHub into the appropriate folder on your web
   server. Example command:
    ```
     git clone https://github.com/ualibraries/Guide-on-the-Side.git guide_on_the_side
    ```
2. Check out the latest tag. To see a list of tags, run git tag. Example
   command:
    ```
     git checkout 1.0-beta4
    ```
3. CakePHP is not included in our GitHub repository, so download it and place
   the lib folder into your Guide on the Side root. CakePHP 2.6.x is known to
   work. For PHP 7.2, you need to download CakePHP 2.9 and above. Example command:
    ```
     mv <unzipped_cakephp_folder>/lib guide_on_the_side/
    ```

4. Now follow the pre-built package instructions starting at step 2.

User Feedback
-------------
At the end of each tutorial, Guide on the Side gives users the ability to give feedback by displaying a link that reads "What did you think of this tutorial?".  When clicked, the link will open a modal popup that will allow the user to send feedback to the tutorial's creator.  The text of this link can be changed and the link itself can be suppressed entirely by editing the `feeback_link` section of config.yml, e.g.
```yaml
feedback_link:
  enabled: true
  default_text: "My custom feedback text"
```

External Authentication Services (CAS, Shibboleth)
--------------------------------------------------
By default, Guide on the Side uses a local authentication system, but it can be easily configured to use CAS or Shibboleth instead.

To use an external authentication service, open config.yml in a text editor and find the `authentication` section.  Change `method` to the appropriate value for your authentication service and add the correct configuration options to the corresponding section.  For example, to enable Shibboleth, you'd want to do something like this:

```yaml
authentication:
  # local, shibboleth, or cas
  method: shibboleth

# only fill these out if you selected shibboleth above
shibboleth:
  login_url:  https://example.com/Shibboleth.sso/Login
  logout_url: https://example.com/Shibboleth.sso/Logout
  login_link_text: Log in via Shibboleth
  username_field: Shib-uid
```

Support and Debugging
---------------------
If you run into problems, check out the Guide on the Side discussion at:

    https://groups.google.com/forum/#!forum/gots-discuss

and the issues list at:

    https://github.com/ualibraries/Guide-on-the-Side/issues

If you get errors *after* installation, in addition to checking the Apache error
log also look at the messages in the Guide on the Side error log:

    ./guide_on_the_side/app/tmp/logs/error.log

Customization
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
app/View/Tutorials/search.ctp into
themes/Themed/[your_theme]/Tutorials/search.ctp and then modify as you
wish. (See app/Config/routes.php for a list of non-obvious routes.)

For more information, see the Themes portion of the CakePHP book:
http://book.cakephp.org/2.0/en/views/themes.html

Credits
-------------------------------------------------------------------------------
Close, print, dock/undock icons:
 - Authored by Mark James - http://famfamfam.com/lab/icons/silk/
 - Used under CC BY 3.0 license - http://creativecommons.org/licenses/by/3.0/

Copyright (C) 2011-2015 The Arizona Board of Regents on Behalf of the
University of Arizona. Developed by Leslie Sult, Justin Spargur,
Mike Hagedon, Ginger Bidwell, Gabriel Luethje, and Will Simpson at the
University of Arizona Libraries.
