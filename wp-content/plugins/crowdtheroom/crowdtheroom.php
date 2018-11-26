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
		fname TEXT NOT NULL,
		lname TEXT NOT NULL,
		dob DATE NOT NULL,
		age INT NOT NULL,
		email TEXT NOT NULL,
		street TEXT NOT NULL,
		city TEXT NOT NULL,
		state CHAR(2) NOT NULL,
		zip TEXT NOT NULL,
		yrsAtCurRes TEXT NOT NULL,
		regVote INT(1) NOT NULL,
		isCitizen INT(1) NOT NULL,
		yrsCitizen INT NOT NULL,
		isTxRes INT(1) NOT NULL,
		yrsTxRes INT NOT NULL,
		isPracLaw INT(1) NOT NULL,
		yrsPracLaw INT NOT NULL,
		usRepDist INT NOT NULL,
		txRepDist INT NOT NULL,
		aisdDist INT NOT NULL,
		isFelon INT(1) NOT NULL,
		isMentalIncap INT(1) NOT NULL
	) ". $charset_collate .";";
    
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

register_deactivation_hook( __FILE__, 'delete_ctr_database'); 

function delete_ctr_database(){
	global $wpdb;
	$table_name = $wpdb->prefix . 'ctr_users';
	$sql = "DROP TABLE IF EXISTS $table_name";
	$wpdb->query($sql);
}


function basic_form(){
	?>
	<form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
	
		<label for="fname">First Name:</label>
		<input type="text" name="fname" id="fname" value="" />

		<label for="lname">Last Name:</label>
		<input type="text" name="lname" id="lname" value="" />
		
		<h2>Where do you currently live?</h2>

		<label for="address">Street Address:</label>
		<input type="text" name="address" id="address" value="" />

		<label for="city">City:</label>
		<input type="text" name="city" id="city" value="" />

		<label for="state">State:</label>
		<select name='state'>
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

		<label for="yrsAtCurRes">How many years have you lived at this address?</label>
		<input type="text" name="yrsAtCurRes" id="yrsAtCurRes" value="" />

		<label for="dob">Date of Birth:</label>
		<input type="date" id="dob" name="dob" value=""/>
		
		<label for="isCitizen">Are you a US citizen?</label>
		<input type="radio" name="isCitizen" value=1>Yes</input>
		<input type="radio" name="isCitizen" value=0>No</input>

		<label for="yrsCitizen">How many years have you been a citizen?</label>
		<input type="text" name="yrsCitizen" id="yrsCitizen" value="" />


		<h2>Fields for School Board (I think?)</h2>

		<label for="isFelon">Have you even been convicted of a felony?</label>
		<input type="radio" name="isFelon" value=1>Yes</input>
		<input type="radio" name="isFelon" value=0>No</input>

		<label for="isMentalIncap">Have you even been deemed totally mentally incapacitated or partially mentally incapacitated without the right to vote by a court of law?</label>
		<input type="radio" name="isMentalIncap" value=1>Yes</input>
		<input type="radio" name="isMentalIncap" value=0>No</input>

		<br>
		<input type="hidden" name="action" value="basic_info">
		<input type="submit" name="submit_form" value="submit" />
    </form>
	<?php
	$_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
}

// Used on the application/basic form page, redirects to next steps page
function add_ctr_user(){
	global $wpdb;
	
	//get info from form
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$address = $_POST['address'];
	$state = $_POST['state'];
	$city = $_POST['city'];
	$zip = $_POST['zip'];
	$yrsAtCurRes = $_POST['yrsAtCurRes'];
	$dob = $_POST['dob'];
	$isCitizen = $_POST['isCitizen'];
	$yrsCitizen = $_POST['yrsCitizen'];
	$isFelon = $_POST['isFelon'];
	$isMentalIncap = $_POST['isMentalIncap'];

	// Generate new unique user id
	$id = new_user_id();

	// Calculate fields from given info
	date_default_timezone_set('America/Chicago');
	$today = date_create(time());
	$dob_new = date_create($dob)
	echo "Today", $today, gettype($today), "<br>";
	echo "DOB", $dob, gettype($dob), "<br>";

	$age = date_diff($dob_new, $today);
	echo $age->y, "<br>";
	echo $age->m, "<br>";
	echo $age->d, "<br>";

	//add info to database
	$table = $wpdb->prefix.'ctr_users';
	$data = array('user_id' => $id,
				  'fname' => $fname, 
				  'lname' => $lname,
				  'street' => $address,
				  'city' => $city,
				  'state' => $state,
				  'zip' => $zip,
				  'yrsAtCurRes' => $yrsAtCurRes,
				  'dob' => $dob,
				  'isCitizen' => $isCitizen,
				  'yrsCitizen' => $yrsCitizen,
				  'isFelon' => $isFelon,
				  'isMentalIncap' => $isMentalIncap);
	$wpdb->insert($table,$data);

	// Looking to make sure input data is good
	arr_as_table($data);
	
	
	// Takes user to next page after filling out form
	//wp_redirect( "http://104.248.4.174/success-page/?id={$id}");
}

// Function to get new user id
function new_user_id() {
	global $wpdb;
	$table_name = $wpdb->prefix . 'ctr_users';
	$latestid = $wpdb->get_var("SELECT user_id from $table_name order by user_id DESC limit 1;");
	$newid = $latestid + 1; 
	return $newid;
 }

 // Run a python script with name $script_name
 function run_python($script_name){
	$command = 'ls';
	exec($command, $out, $status);
 }

function next_steps_page(){
	global $wpdb;
	$user_id = $_GET['id'];
	echo "User ID {$user_id} <br>";
	$table_name = $wpdb->prefix . 'ctr_users';
    $sql = "SELECT * FROM " . $table_name . " WHERE user_id={$user_id}";
	$result = $wpdb->get_row($sql, ARRAY_A);
	arr_as_table($result);
	
}

// Nice function to print out elements of an assocaitive array as a table
function arr_as_table($array, $col1="Key", $col2="Value"){
	echo "<table>";
	echo "<tr><th>{$col1}</th> <th>{$col2}</th><tr>";
	foreach ($array as $key => $value){
		echo "<tr>";
		echo "<td>{$key}</td>";
		echo "<td>{$value}</td>";
		echo "</tr>";
	}
	echo "</table>";
}

// Returns first name of all users on data base, not in use
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

add_shortcode('basic-form', 'basic_form');
add_shortcode('next-steps', 'next_steps_page');
add_action('admin_post_basic_info', 'add_ctr_user');
add_action('admin_post_nopriv_basic_info', 'add_ctr_user');



