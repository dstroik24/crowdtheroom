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
		office TEXT NOT NULL,
		fname TEXT NOT NULL,
		lname TEXT NOT NULL,
		dob DATE NOT NULL,
		age INT NOT NULL,
		email TEXT NOT NULL,
		street_address TEXT NOT NULL,
		city TEXT NOT NULL,
		state CHAR(2) NOT NULL,
		zip TEXT NOT NULL,
		county TEXT NOT NULL,
		yrsAtCurRes TEXT NOT NULL,
		isRegVote INT(1) NOT NULL,
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

// Used on the application/basic form page, redirects to next steps page
function add_ctr_user(){
	global $wpdb;
	
	//get info from form
	$office = $_POST['office'];
	$district = $_POST['district'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$street_number = $_POST['street_number'];
	$street_words = $_POST['street_address'];
	$street_address = $street_number ." ". $street_words;
	$state = $_POST['state'];
	$city = $_POST['city'];
	$zip = $_POST['zip'];
	$county = $_POST['county'];
	$yrsAtCurRes = $_POST['yrsAtCurRes'];
	$yrsTexRes = $_POST['yrsTexRes'];
	$dob = $_POST['dob'];
	$isCitizen = $_POST['isCitizen'];
	$yrsCitizen = $_POST['yrsCitizen'];
	$isFelon = $_POST['isFelon'];
	$isMentalIncap = $_POST['isMentalIncap'];

	// Initialize new stuff
	$lati = null;
	$longi = null;
	$isTxRes = null;
	$yrsTxRes = null;
	$isPracLaw = null;
	$yrsPracLaw = null;
	$usRepDist = null;
	$txRepDist = null;
	$aisdDist = null;

	/* No longer needed due to autocomplete
	// Use google api to standardize address
	$address_standard = geocode("{$street_address} {$city} {$state} {$zip}");
	if ($address_standard){
		$full_address = $address_standard['full_address'];
		$street_address = $address_standard['street_address'];
		$state = $address_standard['state'];
		$city = $address_standard['city'];
		$zip = $address_standard['zip'];
		$county = $address_standard['county'];
		$lati = $address_standard['latitude'];
		$longi = $address_standard['longitude'];
	}
	*/


	// Generate new unique user id
	$id = new_user_id();

	// Calculate fields from given info
	// Age
	date_default_timezone_set('America/Chicago');
	$today = new dateTime('now');;
	$dob_new = date_create($dob);
	$age = date_diff($dob_new, $today);
	// Texas resident
	if ($state == "TX"){
		$isTxRes = 1;
		//$yrsTxRes = $yrsAtCurRes;
	}
	// Office and district
	$distOffices = array("us_rep", "tx_rep", "aisd");
	if (in_array($office, $distOffices)){
		$full_office = $office ."_". $district;
	}else{
		$full_office = $office;
	}
	
	// Reformat some data for the python script
	$dob_format = date_format($dob_new, "m/d/Y");
	$county_fixed = preg_replace("#\s#", "-", $county);
	
	echo "checking voter registration";

	// $voterStatus contains an array with some more info, the second entry is the status 0 or 1
	$voterStatus = run_python3("/var/www/html/wp-content/plugins/crowdtheroom/check_voter_reg.py {$fname} {$lname} {$county_fixed} {$dob_format} {$zip}");
	$isRegVote = $voterStatus[1];

	//add info to database
	$table = $wpdb->prefix.'ctr_users';
	$data = array('user_id' => $id,
				  'office' => $full_office,
				  'fname' => $fname, 
				  'lname' => $lname,
				  'street_address' => $street_address,
				  'city' => $city,
				  'state' => $state,
				  'zip' => $zip,
				  'county' => $county,
				  'yrsAtCurRes' => $yrsAtCurRes,
				  'isTxRes' => $isTxRes,
				  'yrsTxRes' => $yrsTxRes,
				  'dob' => $dob,
				  'age' => $age->y,
				  'isRegVote' => $isRegVote,
				  'isCitizen' => $isCitizen,
				  'yrsCitizen' => $yrsCitizen,
				  'isFelon' => $isFelon,
				  'isMentalIncap' => $isMentalIncap);
	$wpdb->insert($table,$data);

	// Looking to make sure input data is good, echos a table
	arr_as_table($data);
	
	// Takes user to next page after filling out form
	wp_redirect( "http://104.248.4.174/results/?id={$id}");

}

function test_vote(){
	$fname = "Daniel";
	$lname = "Stroik";
	$county = "Travis County";
	$dob_format = "02/10/1997";
	$zip = "78705";

	$county_fixed = preg_replace("#\s#", "-", $county);
	echo $county_fixed;
	$out = run_python3("/var/www/html/wp-content/plugins/crowdtheroom/check_voter_reg.py {$fname} {$lname} {$county_fixed} {$dob_format} {$zip}");
	print_r($out);
}
add_shortcode('test-vote', 'test_vote');

// Runs script with python3
function run_python3($script_name){
	$command = "python3 {$script_name}";
	echo $command;
	exec($command, $out);
	return $out;
}

// Function to get new user id
function new_user_id() {
	global $wpdb;
	$table_name = $wpdb->prefix . 'ctr_users';
	$latestid = $wpdb->get_var("SELECT user_id from $table_name order by user_id DESC limit 1;");
	$newid = $latestid + 1; 
	return $newid;
 }

// Standardizes address using google API, returns 
function geocode($address){
 
	// url encode the address
	$url_address = urlencode($address);
     
    // google map geocode api url
    $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$url_address}&key=AIzaSyAqn3-tuxrnf_fQlyd4S3qmJWj4zvh1q10";
 
    // get the json response
    $resp_json = file_get_contents($url);
     
    // decode the json
    $resp = json_decode($resp_json, true);
 
    // response status will be 'OK', if able to geocode given address 
    if($resp['status']=='OK'){
 
        // get the important data
        $lati = isset($resp['results'][0]['geometry']['location']['lat']) ? $resp['results'][0]['geometry']['location']['lat'] : "";
        $longi = isset($resp['results'][0]['geometry']['location']['lng']) ? $resp['results'][0]['geometry']['location']['lng'] : "";
        $formatted_address = isset($resp['results'][0]['formatted_address']) ? $resp['results'][0]['formatted_address'] : "";
		$street = "{$resp['results'][0]['address_components'][0]['long_name']} {$resp['results'][0]['address_components'][1]['long_name']}";
		$city = $resp['results'][0]['address_components'][3]['long_name'];
		$state = $resp['results'][0]['address_components'][5]['short_name'];
		$zip = $resp['results'][0]['address_components'][7]['long_name'];
		$county = $resp['results'][0]['address_components'][4]['long_name'];

		//foreach ($resp['results'][0]['address_components'] as $field){
		//}
		
		// verify if data is complete
        if($lati && $longi && $formatted_address){
         
            // put the data in the array
            $data_arr = array(
						'full_address' => $formatted_address,
						'street_address' => $street,
						'city' => $city,
						'state' => $state,
						'zip' => $zip,
						'county' => $county,
						'latitude' => $lati, 
						'longitude' => $longi);
             
            return $data_arr;
             
        }else{
            return false;
        }
         
    }
 
    else{
        echo "<strong>ERROR: {$resp['status']}</strong>";
        return false;
	}
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
add_shortcode('basic-form-validation', 'basic_form_with_validation');
add_shortcode('next-steps', 'next_steps_page');
add_action('admin_post_basic_info', 'add_ctr_user');
add_action('admin_post_nopriv_basic_info', 'add_ctr_user');


