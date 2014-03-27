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
   location. Alternatively, if you have 1.0-beta2 and command line access to Git, 
   you can run git pull --tags and then git checkout <tag_name> to get the latest code.
   You may want to do this in a copy of the application as it may stop working until you 
   run any database migrations.
7. As in README.md, change permissions of app/tmp in the new version to make it and
   all sub-folders writable by the web server. Example command (for Unix-like systems): 

        chmod -R 777 app/tmp

8. Read any release notes (RELEASE.md) to determine if you need to run database migrations,
   or to find out if your themes need to change.
   If you're not sure whether you need to run database migrations and you have command-line
   access, run the following command from the app folder to determine whether database upgrades are required.
   This will compare the current version to the latest version.

        ../lib/Cake/Console/cake Migrations.migration status

9. Copy your config.yml, themes, and user-uploaded images into the new version.
10. Run database migrations if necessary. If you don't have command-line access, 
    there are SQL migrations available in app/Config/Migrations/sql. Note: the old version may stop working at this point.
    If you do have command-line access, run the following command from the app folder. The cake command-line tool will
    then apply all new database migrations.

        ../lib/Cake/Console/cake Migrations.migration run all

    For more information on the Cake Migrations tool, see https://github.com/CakeDC/migrations
11. Modify your themes if necessary.
12. Test to make sure everything still works in the new version.
13. Archive the old version and move the new version to take its place.
