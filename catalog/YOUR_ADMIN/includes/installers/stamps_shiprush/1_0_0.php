<?php
// use $configuration_group_id where needed

// For Admin Pages

$zc150 = (PROJECT_VERSION_MAJOR > 1 || (PROJECT_VERSION_MAJOR == 1 && substr(PROJECT_VERSION_MINOR, 0, 3) >= 5));
if ($zc150) { // continue Zen Cart 1.5.0
    $admin_page = 'configShipRush';
  // delete configuration menu
  $db->Execute("DELETE FROM ".TABLE_ADMIN_PAGES." WHERE page_key = '".$admin_page."' LIMIT 1;");
  // add configuration menu
  if (!zen_page_key_exists($admin_page)) {
    if ((int)$configuration_group_id > 0) {
      zen_register_admin_page($admin_page,
                              'BOX_STAMPS_SHIPRUSH_CONFIG', 
                              'FILENAME_CONFIGURATION',
                              'gID=' . $configuration_group_id, 
                              'configuration', 
                              'Y',
                              $configuration_group_id);
        
      $messageStack->add('Enabled Stamps Configuration Configuration Menu.', 'success');
    }
  }
}

function shiprush_random_string($length) {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
}


$raw_admin_dir = DIR_WS_ADMIN;
$admin_dir = str_replace("/", "", $raw_admin_dir);
//Added ability to remove left/right columns and header/footer
$db->Execute("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES
('Stamps Access Token', 'STAMPS_SHIPRUSH_ACCESS_TOKEN', '".shiprush_random_string(31)."', 'To Create a new random SHIPPING_ACCESS_TOKEN  <br/>Please take these steps: <br/><ol><li> Go to http://www.pctools.com/guides/password/     (you can use another random password generator if you like)</li><li>Check ALL the boxes EXCEPT the punctuation box</li><li>Set the LENGTH to 31</li></ol>', " . $configuration_group_id . ", 12, NOW(), NOW(), NULL, NULL),
('Admin Directory', 'STAMPS_SHIPRUSH_ADMIN_DIR', '".$admin_dir."', 'Your Admin directory, this shoudl automatically populate unless you change your admin directory after install', " . $configuration_group_id . ", 13, NOW(), NOW(), NULL, NULL),
('Retrieve Pending Status', 'STAMPS_SHIPRUSH_GET_PENDING', 'true', 'Retrieve Order Status 1 ussually called pending', " . $configuration_group_id . ", 14, NOW(), NOW(), NULL, 'zen_cfg_select_option(array(\'true\', \'false\'),'),
('Retrieve Processing Status', 'STAMPS_SHIPRUSH_GET_PROCESSING', 'true', 'Retrieve Order Status 2 ussually called processing', " . $configuration_group_id . ", 15, NOW(), NOW(), NULL, 'zen_cfg_select_option(array(\'true\', \'false\'),'),
('Retrieve Delivered Status', 'STAMPS_SHIPRUSH_GET_DELIVERED', 'false', 'Retrieve Order Status 3 ussually called delivered', " . $configuration_group_id . ", 16, NOW(), NOW(), NULL, 'zen_cfg_select_option(array(\'true\', \'false\'),'),
('Retrieve Update Status', 'STAMPS_SHIPRUSH_GET_UPDATE', 'false', 'Retrieve Order Status 4 ussually called update', " . $configuration_group_id . ", 17, NOW(), NOW(), NULL, 'zen_cfg_select_option(array(\'true\', \'false\'),'),
('Retrieve Cancelled Status', 'STAMPS_SHIPRUSH_GET_CANCELLED', 'false', 'Retrieve Order Status 5 ussually called cancelled', " . $configuration_group_id . ", 18, NOW(), NOW(), NULL, 'zen_cfg_select_option(array(\'true\', \'false\'),'),
('Set Shipped to Status Delivered', 'STAMPS_SHIPRUSH_SET_DELIVERED', 'true', 'Set order to status 3 ussually called delivered when shipped', " . $configuration_group_id . ", 19, NOW(), NOW(), NULL, 'zen_cfg_select_option(array(\'true\', \'false\'),'),
('Only Allow Stamps to get UnShipped Orders Only', 'STAMPS_SHIPRUSH_GET_UNSHIPPED', 'true', 'Allow Stamps to get the unshipped orders only', " . $configuration_group_id . ", 19, NOW(), NOW(), NULL, 'zen_cfg_select_option(array(\'true\', \'false\'),'),
('Cancelled Order Status ID', 'STAMPS_SHIPRUSH_CANCELLED_STATUS_ID', '5', 'Cancelled Shipping Status', " . $configuration_group_id . ", 20, NOW(), NOW(), 'zen_get_order_status_name', 'zen_cfg_pull_down_order_statuses(');" );

/* If your checking for a field
 * global $sniffer;
 * if (!$sniffer->field_exists(TABLE_SOMETHING, 'column'))  $db->Execute("ALTER TABLE " . TABLE_SOMETHING . "ADD column varchar(32) NOT NULL DEFAULT 'both';");
 */