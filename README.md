# mushroom-cultivation
A customised personal database site for mushroom cultivators to keep a log of grain, spawns, harvests and petri dishes. 

Easy to install, easy to customise, requires no previous knowledge of coding.

## INSTALL INSTRUCTIONS:

- Download all files as .zip from Github by clicking "Code" and then "Download Zip" and unzip/extract folder
- Edit config.php and config_tables.php to add your database information and company name
- Upload all files to home directory of your website via FTP server (public_html or htdocs folder)
- Login to phpmyadmin (MYSQL admin) usually located in cPanel and click "Import"
- Browse for fresh_portal.sql and import
- Go to your website and login (https://yourwebsite.com/login.php) (Default login below)
- Click Reset Password and change the default password
- Click "Spores" on the left of the page
- Add spores that you will be cultivating and descriptions
- Click Admin on the top right of the page
- Scroll over "Admin Home" and click "Location Center"
- Add or edit location
- Start using the site as required

#### DEFAULT LOGIN:
- User = admin
- Password = password

#### COMMON ISSUE:
Sometimes the website won't automatically redirect from the index page. If this is the case, please open the index.php and add your full website link in before "login.php" for example: https://mywebsite.com/login.php


Disclaimer: Please use this responsibly and for research purposes only. Feel free to edit or customise and send me a version. There are some features that are still being worked on like non-admin users only being able to see a particular type of mushroom. For every database table there is a file in "tables" folder and a corresponding file in "mte" folder. 
