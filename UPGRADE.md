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
   location. 
7. As in INSTALL.md, change permissions of app/tmp in the new version to make it and 
   all sub-folders writable by the web server. Example command (for Unix-like systems): 

    chmod -R 777 app/tmp

8. Read any release notes (RELEASE.md) to determine if you need to run database migrations,
   or to find out if your themes need to change.
9. Copy your config.yml, themes, and user-uploaded images into the new version.
10. Run database migrations if necessary. Note: the old version may stop working at this point.
11. Modify your themes if necessary.
12. Test to make sure everything still works in the new version.
13. Archive the old version and move the new version to take its place.