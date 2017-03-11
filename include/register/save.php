<?php
    include('../../admin/config.php');
    
    include('../../module/module.php');
    
    
    include(DIR_SYSTEM . 'library/cache.php');
    $cache = new cache();
    
    
    if($_POST['config_name'] == '' || $_POST['config_email'] == ''){
        header("location:../../register.php?result=required");
    }
    else{
        runSQL("INSERT INTO " . DB_PREFIX . "store SET name = '" . mysql_escape_string($_POST['config_name']) . "', `url` = '" . mysql_escape_string($_POST['config_url']) . "', store_status_id = 2");
        $store_id = mysql_insert_id();

        //settings
        $data = array();
        $data['config_name'] = $_POST['config_name'];
        $data['config_url'] = $_POST['config_url'];
        $data['config_title'] = $_POST['config_title'];
        $data['config_owner'] = $_POST['config_owner'];
        $data['config_address'] = $_POST['config_address'];
        $data['config_email'] = $_POST['config_email'];
        $data['config_fax'] = $_POST['config_fax'];
        $data['config_telephone'] = $_POST['config_telephone'];
        foreach($data as $key => $value){
            if($value != ""){
                runSQL("INSERT INTO " . DB_PREFIX . "setting SET store_id = " . $store_id . ", `group` = 'config', `key` = '" . $key . "', `value` = '" . $value . "'");
            }
        }

        $cache->delete('store');

        header("location:../../register.php?result=success");
    }
?>