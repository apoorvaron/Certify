# How to make this for Yourself 📖

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
              
Step -4   Create a folder "verify" inside htdocs/certify/ 

Step -5   Set below snippet inside /Applications/MAMP/htdocs/certify/env.php. file (FOR MAC & having MAMP)
          
            <?php
                $env_server = "localhost";
                $env_username = "root";
                $env_password = "root";
                $env_database = "certify";
                $env_port = "8889";
            ?>

Step -5   Set below snippet inside htdocs/certify/env.php. file (FOR WINDOWS & XAMPP) ||  (FOR MAC & XAMPP)

            <?php
                 $env_server = "localhost:3306";
                 $env_username = "root";
                 $env_password = "";
                 $env_database = "certify";
                 $env_port = "3306";
            ?>

Step -6   Create ".htaccess" file inside htdocs/certify/ and Paste below code snippet.(FOR MAC & having MAMP)

                RewriteEngine On
                RewriteCond %{REQUEST_FILENAME} !-d
                RewriteCond %{REQUEST_FILENAME}\.php -f
                RewriteRule ^(.*)$ $1.php [NC,L]


                RewriteEngine On

                RewriteCond $1 !^(index\.php)
                RewriteCond %{REQUEST_FILENAME} !-f
                RewriteCond %{REQUEST_FILENAME} !-d
                RewriteRule ^(.*)$ index.php?/$1 [L]

                
Step -7   Change the file content inside certify/htdocs/siteName.php

          1) FOR MAC & MAMP
                <?php
                    $siteName = "http://localhost:8888/certify/";
                ?>
                
          2) FOR xampp
                <?php
                    $siteName = "http://localhost/certify/";
                ?>
                
Step -8   Start Apache & MySQL server in XAMPP Panel or MAMP Panel

Step -9   To Setup the database, open 

          localhost:8888/phpmyadmin    (FOR MAMP)
          localhost/phpmyadmin         (FOR XAMPP)

Step -10   Create New Database 

Step -11   Database name  "certify"

Step -12   Import Database from "htdocs/tiny/certify.sql" directory . 

           certify.sql (db file)

Step -13   Run in browser 

          localhost:8888/certify/     (FOR MAMP)
          localhost/certify/          (FOR XAMPP)

! IMPORTANT -> users table must contain one row

          1) email = "certify@gmail.com"
          2) password = "42f98fd895f6f48f084aac8f4d8c9c6c"

-> admin id & password

          1) email = "certify@gmail.com"
          2) password = "certify@gmail.com"

-> While Hosing

          1) Change env.php credentials
          2) Change siteName.php 
          3) Upload files & dB.
          
-> Hosted on Infinity Free with Gmail : apoorv.shorty@gmail.com
