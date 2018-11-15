<?php
  global $wpdb;
  function get_ctr_users(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'ctr_users';
    $sql = "SELECT * FROM " . $table_name;
    echo $sql;
    $result = $wpdb->get_results($sql);
    foreach($result as $print) {
      echo $print->user_fname, '<br>';
    }
  }  
  
  get_ctr_users();
?>