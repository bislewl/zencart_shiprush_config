<?php

function true_false_to_int($value){
    if($value == 'true'){
        return 1;
    }
    else{
        return 0;
    }
}

define("ZENCART_ADMIN_DIRECTORY",STAMPS_SHIPRUSH_ADMIN_DIR); 
define("ZENCART_RETRIEVE_ORDER_STATUS_1_PENDING",true_false_to_int(STAMPS_SHIPRUSH_GET_PENDING));
define("ZENCART_RETRIEVE_ORDER_STATUS_2_PROCESSING",true_false_to_int(STAMPS_SHIPRUSH_GET_PROCESSING));
define("ZENCART_RETRIEVE_ORDER_STATUS_3_DELIVERED",true_false_to_int(STAMPS_SHIPRUSH_GET_DELIVERED));
define("ZENCART_RETRIEVE_ORDER_STATUS_4_UPDATE",true_false_to_int(STAMPS_SHIPRUSH_GET_UPDATE));
define("ZENCART_RETRIEVE_ORDER_STATUS_5_CANCELLED",true_false_to_int(STAMPS_SHIPRUSH_GET_CANCELLED));
define("ZENCART_CANCELLED_ORDER_STATUS_ID", (int)STAMPS_SHIPRUSH_CANCELLED_STATUS_ID);
define("ZENCART_SHIPPED_STATUS_SET_TO_STATUS_3_DELIVERED",true_false_to_int(STAMPS_SHIPRUSH_SET_DELIVERED));
define("SHIPPING_ACCESS_TOKEN",STAMPS_SHIPRUSH_ACCESS_TOKEN);