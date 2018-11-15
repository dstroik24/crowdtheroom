<?php
/*
Plugin Name: Crowd The Room Input
Description: Handles all the forms and php for our CTR site
Author: Daniel Stroik
License: GPL 2+
Version: 1.0
*/

// This creates the data table when the plugin is turned on
register_activation_hook( __FILE__, 'ctr_users_create_db' );

function ctr_users_create_db() {
	global $wpdb;

	$charset_collate = $wpdb->get_charset_collate();

	//Create table to store all user data
	$table_name = $wpdb->prefix . 'ctr_users';
    
    $sql = "CREATE TABLE " . $table_name . " (
		user_id INT NOT NULL,
		user_fname TEXT NOT NULL,
		user_lname TEXT NOT NULL,
		user_bday DATE NOT NULL,
		user_age INT NOT NULL,
		user_email TEXT NOT NULL,
		user_street TEXT NOT NULL,
		user_city TEXT NOT NULL,
		user_state CHAR(2) NOT NULL,
		user_zip TEXT NOT NULL,
		user_yrsAtCurRes TEXT NOT NULL,
		user_regVote INT(1) NOT NULL,
		user_isCitizen INT(1) NOT NULL,
		user_yrsCitizen INT NOT NULL,
		user_isTxRes INT(1) NOT NULL,
		user_yrsTxRes INT NOT NULL,
		user_isPracLaw INT(1) NOT NULL,
		user_usRepDist INT NOT NULL,
		user_txRepDist INT NOT NULL,
		user_aisdDist INT NOT NULL
	) ". $charset_collate .";";
    
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}


function basic_form(){
	?>
	<form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
            
		<label for="fname">First Name:</label>
		<input type="text" name="fname" id="fname" value="" />

		<label for="lname">Last Name:</label>
		<input type="text" name="lname" id="lname" value="" />

		<label for="address">Street Address</label>
		<input type="text" name="address" id="address" value="" />

		<label for="state">State:</label>
		<select>
			<option value="AL">Alabama</option>
			<option value="AK">Alaska</option>
			<option value="AZ">Arizona</option>
			<option value="AR">Arkansas</option>
			<option value="CA">California</option>
			<option value="CO">Colorado</option>
			<option value="CT">Connecticut</option>
			<option value="DE">Delaware</option>
			<option value="DC">District Of Columbia</option>
			<option value="FL">Florida</option>
			<option value="GA">Georgia</option>
			<option value="HI">Hawaii</option>
			<option value="ID">Idaho</option>
			<option value="IL">Illinois</option>
			<option value="IN">Indiana</option>
			<option value="IA">Iowa</option>
			<option value="KS">Kansas</option>
			<option value="KY">Kentucky</option>
			<option value="LA">Louisiana</option>
			<option value="ME">Maine</option>
			<option value="MD">Maryland</option>
			<option value="MA">Massachusetts</option>
			<option value="MI">Michigan</option>
			<option value="MN">Minnesota</option>
			<option value="MS">Mississippi</option>
			<option value="MO">Missouri</option>
			<option value="MT">Montana</option>
			<option value="NE">Nebraska</option>
			<option value="NV">Nevada</option>
			<option value="NH">New Hampshire</option>
			<option value="NJ">New Jersey</option>
			<option value="NM">New Mexico</option>
			<option value="NY">New York</option>
			<option value="NC">North Carolina</option>
			<option value="ND">North Dakota</option>
			<option value="OH">Ohio</option>
			<option value="OK">Oklahoma</option>
			<option value="OR">Oregon</option>
			<option value="PA">Pennsylvania</option>
			<option value="RI">Rhode Island</option>
			<option value="SC">South Carolina</option>
			<option value="SD">South Dakota</option>
			<option value="TN">Tennessee</option>
			<option value="TX">Texas</option>
			<option value="UT">Utah</option>
			<option value="VT">Vermont</option>
			<option value="VA">Virginia</option>
			<option value="WA">Washington</option>
			<option value="WV">West Virginia</option>
			<option value="WI">Wisconsin</option>
			<option value="WY">Wyoming</option>
		</select>

		<br>
		<label for="zip">Zip Code:</label>
		<input type="text" name="zip" id="zip" value="" />

		<input type="hidden" name="action" value="basic_info">
		<input type="submit" name="submit_form" value="submit" />
    </form>
	<?php
	$_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
}


add_shortcode('basic-form', 'basic_form');


function add_ctr_user(){
	global $wpdb;
	
	//get info from form
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$address = $_POST['address'];
	$zip = $_POST['zip'];


	//add info to database
	$lastid = $wpdb->insert_id;
	$newid = $lastid + 1;
	$table = $wpdb->prefix.'ctr_users';
	$data = array('user_id' => $newid,
				  'user_fname' => $fname, 
				  'user_lname' => $lname,
				  'user_street' => $address,
				  'user_zip' => $zip);
	$wpdb->insert($table,$data);

	
	foreach($data as $result) {
		echo $result, '<br>';
	}
	echo $wpdb->last_query, '<br>';
	echo $wpdb->last_error;
	

	$pagename = 'success page';
	//wp_redirect('http://104.248.4.174/success-page/');
	$user_ID = get_current_user_id();
	echo $user_ID;
	
	$table_name = $wpdb->prefix . 'ctr_users';
    $sql = "SELECT * FROM" . $table_name;
	$result = $wpdb->get_results($sql);
	foreach($data as $result) {
		echo $result, '<br>';
	}


	/*
	//run python shit
	$command = escapeshellcmd('./test');
	$output = shell_exec($command);
	echo $output;
	*/
}

function get_ctr_users(){
	global $wpdb;
	$table_name = $wpdb->prefix . 'ctr_users';
    $sql = "SELECT * FROM" . $table_name;
	$result = $wpdb->get_results($sql);
	foreach($data as $result) {
		echo $result, '<br>';
	}
}


add_action('admin_post_basic_info', 'add_ctr_user');
add_action('admin_post_nopriv_basic_info', 'add_ctr_user');



