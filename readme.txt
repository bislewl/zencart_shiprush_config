ZENCART STAMPS.com SHIPRUSH CONFIGURATION.
V1.0.2

By using this you agree to the license.txt included

Your are responsible for any issues, that arise from this module this is given away at no cost.

You will need to have a subscription to Stamps.com

** BACKUP YOUR FILES AND DATABASE BEFORE INSTALLING **

Installation Instructions
============
1.) Install Stamps from http://www.stamps.com/download/
2.) Copy these file from the stamps.com into your catalog/store directory
        - ShippingZClasses.php
        - ShippingZMessages.php
        - ShippingZZencart.php
3.) Copy the files include in this zip, to your store renaming YOUR_ADMIN to your admin directory
4.) Modify the ShippingZZencart.php, 
        CUT:    // Check for zencart include files
                if(Check_Include_File('includes/application_top.php'))
                require('includes/application_top.php');
        PASTE above:
                //Check for ShippingZ integration files
                if(Check_Include_File("ShippingZSettings.php"))
                include("ShippingZSettings.php");
                if(Check_Include_File("ShippingZClasses.php"))
                include("ShippingZClasses.php");
                if(Check_Include_File("ShippingZMessages.php"))
                include("ShippingZMessages.php");

5.) Load the admin, the module will self install on first pageload
6.) Configure the settings in your zencart admin with the setting in on your PC for the stamps program
7.) Test your Settings

Un-Installation instructions
=============
1.) Remove Files from Installation Instructions Steps 1 & 2
2.) Run the uninstall.sql included in the zip

