# How to make this for Yourself 📖

- Must install PHP version (FOR WINDOWS) & (FOR MAC) Both
- Tutorial - https://www.youtube.com/watch?v=mVBe75aGBHQ
- PHP version used -> ( 8.1.9 )


- Must install xampp or  MAMP 
- Tutorial - https://www.youtube.com/watch?v=at19OmH2Bg4
- MySQL version used -> ( 8.0.29 )

-------*---------*---------*---------*---------*---------
## Live Site -> http://certify.rf.gd


Step -1   Download zip file 

Step -2   Unzip it & Rename folder from "Certify-main" to "certify"

Step -3   Put certify folder inside 

          /Applications/MAMP/htdocs/   folder  (FOR MAC & MAMP)
          /Applications/xampp/htdocs/  folder  (FOR MAC & xampp)
          C:/xampp/htdocs/             folder  (FOR WINDOWS & xampp)

Step -4   Set below snippet inside /Applications/MAMP/htdocs/certify/env.php. file (FOR MAC & having MAMP)
          
            <?php
                $env_server = "localhost";
                $env_username = "root";
                $env_password = "root";
                $env_database = "certify";
                $env_port = "8889";
            ?>

Step -4   Set below snippet inside htdocs/certify/env.php. file (FOR WINDOWS & XAMPP) ||  (FOR MAC & XAMPP)

            <?php
                 $env_server = "localhost:3306";
                 $env_username = "root";
                 $env_password = "";
                 $env_database = "certify";
                 $env_port = "3306";
            ?>

Step -5   Create ".htaccess" file inside htdocs/certify/ and Paste below code snippet.(FOR MAC & having MAMP)

                RewriteEngine On
                RewriteCond %{REQUEST_FILENAME} !-d
                RewriteCond %{REQUEST_FILENAME}\.php -f
                RewriteRule ^(.*)$ $1.php [NC,L]


                RewriteEngine On

                RewriteCond $1 !^(index\.php)
                RewriteCond %{REQUEST_FILENAME} !-f
                RewriteCond %{REQUEST_FILENAME} !-d
                RewriteRule ^(.*)$ index.php?/$1 [L]

                
Step -6   Change the file content inside certify/htdocs/siteName.php

          1) FOR MAC & MAMP
                <?php
                    $siteName = "http://localhost:8888/certify/";
                ?>
                
          2) FOR xampp
                <?php
                    $siteName = "http://localhost/certify/";
                ?>
                
Step -7   Start Apache & MySQL server in XAMPP Panel or MAMP Panel

Step -8   To Setup the database, open 

          localhost:8888/phpmyadmin    (FOR MAMP)
          localhost/phpmyadmin         (FOR XAMPP)

Step -9   Create New Database 

Step -10   Database name  "certify"

Step -11   Import Database from "htdocs/tiny/certify.sql" directory . 

           certify.sql (db file)

Step -12   Run in browser 

          localhost:8888/certify/     (FOR MAMP)
          localhost/certify/          (FOR XAMPP)

! IMPORTANT -> users table must contain one row i.e admin id & password

          1) uniqueNo = "shorty"
          2) email = "shorty@gmail.com"
          3) password = "62b5fe5724b08db455672377fb31e95b"
          
-> While Hosing

          1) Change env.php credentials
          2) Change siteName.php 
          3) Upload files & dB.
          
-> Hosted on Infinity Free with Gmail : apoorv.shorty@gmail.com
