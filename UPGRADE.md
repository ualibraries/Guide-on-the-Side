UPGRADING
-------------------------------------------------------------------------------
1. Back up your Guide on the Side database and application folder!
2. No really -- back up!
3. Schedule downtime with your customers.
4. If you've modified the Guide on the Side source code (anything inside the 
   "app" folder), all bets are off on upgrading. You're better off contacting 
   us or submitting patches to make the application more flexible! 
5. Back up your config.yml file, themes, and user-uploaded images (app/webroot/uploads).
6. Download the latest version of Guide on the Side and unzip it into a new 
   location. Alternatively, if you have a previous release checked out (1.0-beta2, 1.0-beta3, etc) and command line   access to Git, you can run git pull --tags and then git checkout <tag_name> to get the latest code.  You may want to do this in a copy of the application as it may stop working until you run any database migrations.
7. If you used git pull --tags and git checkout <tag_name> to update, you'll need to upgrade your version of CakePHP.  Download CakePHP version 2.6.3 (https://github.com/cakephp/cakephp/releases/2.6.3), extract it, and replace the lib/ folder in your Guide on the Side installation with the lib/ folder from the new version of CakePHP.  Example commands (for Unix-like systems):

         rm -rf <guide_on_the_side_directory>/lib
         mv <unzipped_cakephp_folder>/lib <guide_on_the_side_directory>/
8. As in README.md, change permissions of app/tmp in the new version to make it and
   all sub-folders writable by the web server. Example command (for Unix-like systems): 

        chmod -R 777 app/tmp
        
9. Move your configuration settings, themes, and user-uploaded images into the new version.

10. Change permissions of app/webroot/uploads to make it and all sub-folders writable by the web server. Example command (for Unix-like systems):

         chmod -R 777 app/webroot/uploads


11. Read any release notes (RELEASE.md) to determine if you need to run database migrations,
   or to find out if your themes need to change.
   If you're not sure whether you need to run database migrations and you have command-line
   access, run the following command from the app folder to determine whether database upgrades are required.
   This will compare the current version to the latest version.

        ../lib/Cake/Console/cake Migrations.migration status
        
12. Run database migrations if necessary. If you don't have command-line access, 
    there are SQL migrations available in app/Config/Migrations/sql. Note: the old version may stop working at this point.
    If you do have command-line access, run the following command from the app folder. The cake command-line tool will
    then apply all new database migrations.

        ../lib/Cake/Console/cake Migrations.migration run all

    For more information on the Cake Migrations tool, see https://github.com/CakeDC/migrations
13. Modify your themes if necessary.
14. Test to make sure everything still works in the new version.
15. Archive the old version and move the new version to take its place.
16. Delete the cache files in app/tmp/cache/models, app/tmp/cache/persistent, and app/tmp/cache/views.  Example command (for Unix-like systems):
```
rm -rf app/tmp/cache/models/*
rm -rf app/tmp/cache/persistent/*
rm -rf app/tmp/cache/views/*
```
