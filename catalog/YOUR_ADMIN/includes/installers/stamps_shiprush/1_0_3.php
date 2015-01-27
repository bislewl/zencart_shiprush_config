<?php

//Encrypt Token for USPS compliance
$db->Execute("UPDATE ".TABLE_CONFIGURATION." SET use_function='zen_cfg_password_display' WHERE configuration_key='STAMPS_SHIPRUSH_ACCESS_TOKEN'");
