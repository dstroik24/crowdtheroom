<table border="1">
<tr>
 <th>user_fname</th>
 <th>user_lname</th>
</tr>
  <?php
    global $wpdb;
    $result = $wpdb->get_results ( "SELECT * FROM wp_ctr_users" );
    foreach ( $result as $print )   {
    ?>
    <tr>
    <td><?php echo $print->user_fname;?></td>
    </tr>
        <?php }
  ?>