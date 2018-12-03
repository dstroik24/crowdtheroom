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
		full_address TEXT NOT NULL,
		street_address TEXT NOT NULL,
		city TEXT NOT NULL,
		state CHAR(2) NOT NULL,
		zip TEXT NOT NULL,
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

function basic_form_with_validation(){
	?>
	<form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
	
		<label for="fname">First Name:</label>
		<input type="text" name="fname" id="fname" required pattern="[^a-zA-Z\s]"/>

		<label for="lname">Last Name:</label>
		<input type="text" name="lname" id="lname" value="" />
		
		<h2>Where do you currently live?</h2>

		<label for="street_address">Street Address:</label>
		<input type="text" name="street_address" id="street_address" value="" />

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
function basic_form(){
	?>
	<form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">

		<label for="office">What Office would you like to run for?</label>
		<select name='office'>
			<option value="na">Select an Office</option>
			<option value="us_rep_d10">US REP - District 10</option>
			<option value="us_rep_d17">US REP - District 17</option>
			<option value="us_rep_d21">US REP - District 21</option>
			<option value="us_rep_d25">US REP - District 25</option>
			<option value="us_rep_d35">US REP - District 35</option>
			<option value="tx_rep_d46">Texas State Representative, District 46</option>
			<option value="tx_rep_d47">Texas State Representative, District 47</option>
			<option value="tx_rep_d48">Texas State Representative, District 48</option>
			<option value="tx_rep_d49">Texas State Representative, District 49</option>
			<option value="tx_rep_d50">Texas State Representative, District 50</option>
			<option value="tx_rep_d51">Texas State Representative, District 51</option>
			<option value="travis_DA">Travis County District Attorney</option>
			<option value="aisd_d1">AISD Trustee District 1</option>
			<option value="aisd_d2">AISD Trustee District 2</option>
			<option value="aisd_d3">AISD Trustee District 3</option>
			<option value="aisd_d4">AISD Trustee District 4</option>
			<option value="aisd_d5">AISD Trustee District 5</option>
			<option value="aisd_d6">AISD Trustee District 6</option>
			<option value="aisd_d7">AISD Trustee District 7</option>
			<option value="aisd_large">AISD Trustee At Large</option>
		</select>

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
			<option value=""></option>
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
	$office = $_POST['office'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$street_address = $_POST['street_address'];
	$state = $_POST['state'];
	$city = $_POST['city'];
	$zip = $_POST['zip'];
	$yrsAtCurRes = $_POST['yrsAtCurRes'];
	$dob = $_POST['dob'];
	$isCitizen = $_POST['isCitizen'];
	$yrsCitizen = $_POST['yrsCitizen'];
	$isFelon = $_POST['isFelon'];
	$isMentalIncap = $_POST['isMentalIncap'];


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



	// Generate new unique user id
	$id = new_user_id();

	// Calculate fields from given info
	date_default_timezone_set('America/Chicago');
	$today = new dateTime('now');;
	$dob_new = date_create($dob);
	$age = date_diff($dob_new, $today);
	
	// $voterStatus contains an array with some more info, the second entry is the status 0 or 1
	$voterStatus = run_python3("/var/www/html/wp-content/plugins/crowdtheroom/check_voter_reg.py {$fname} {$lname} {$county} {$dob} {$zip}");
	$isRegVote = $voterStatus[1];

	//add info to database
	$table = $wpdb->prefix.'ctr_users';
	$data = array('user_id' => $id,
				  'office' => $office,
				  'fname' => $fname, 
				  'lname' => $lname,
				  'full_address' => $full_address,
				  'street_address' => $street_address,
				  'city' => $city,
				  'state' => $state,
				  'zip' => $zip,
				  'yrsAtCurRes' => $yrsAtCurRes,
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
	
	$us_reps = array("us_rep_d10", "us_rep_d17", "us_rep_d21", "us_rep_d25", "us_rep_d35");
	$tx_reps = array("tx_rep_d46", "tx_rep_d47", "tx_rep_d48", "tx_rep_d49", "tx_rep_d50", "tx_rep_d51");
	$trav_da = array("travis_DA");
	$aisd_reps = array("aisd_d1", "aisd_d2", "aisd_d3", "aisd_d4", "aisd_d5", "aisd_d6", "aisd_d7", "aisd_large");
	/*
	if (in_array($office, $us_reps)) {
		echo "go To us reps page";
		wp_redirect("http://104.248.4.174/us-representative/");
	}
	if (in_array($office, $tx_reps)) {
		echo "go To tx reps page";
		wp_redirect("http://104.248.4.174/texas-state-representative/");
	}
	if (in_array($office, $trav_da)) {
		echo "go To DA page";
		wp_redirect("http://104.248.4.174/district-attorney/");
	}
	if (in_array($office, $aisd_reps)) {
		echo "go To aisd page";
		wp_redirect("http://104.248.4.174/aisd-trustee/");
	}
	if ($office == "na"){
		wp_redirect( "http://104.248.4.174/success-page/?id={$id}");
	}
	*/
	
	// Takes user to next page after filling out form
	//wp_redirect( "http://104.248.4.174/success-page/?id={$id}");

}

function test_vote(){
	$out = run_python3("/var/www/html/wp-content/plugins/crowdtheroom/check_voter_reg.py");
	print_r($out);
}
add_shortcode('test-vote', 'test_vote');

// Runs script with python3
function run_python3($script_name){
	$command = "python3 {$script_name}";
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



