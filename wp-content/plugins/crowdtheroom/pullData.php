
<?php
  global $wpdb;
  $result = $wpdb->get_results ( "SELECT * FROM wordpress.wp_ctr_users" );
  echo "testing";
  foreach ( $result as $print )   {
    ?>
    <p>Result 1 $print</p>
    <?php
  }
?>