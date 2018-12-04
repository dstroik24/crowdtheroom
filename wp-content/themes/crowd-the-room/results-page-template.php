<?php
/*
 Template Name: results-page-template
 */

function get_user_info(){
	global $wpdb;
    $user_id = $_GET['id'];
	echo "User ID {$user_id} <br>";
	$table_name = $wpdb->prefix . 'ctr_users';
    $sql = "SELECT * FROM " . $table_name . " WHERE user_id={$user_id}";
	$result = $wpdb->get_row($sql, ARRAY_A);
    arr_as_table($result);
    return $result;
}

$info_arr = get_user_info();

/* HI CONNOR
 This loop populates all the varibles you'll need for the eligibility logic.
 They are called:
    user_id 
    office
    fname
    lname
    dob
    age
    email
    street_address
    city 
    state
    zip
    county
    yrsAtCurRes
    isRegVote
    isCitizen
    yrsCitizen 
    isTxRes
    yrsTxRes
    isPracLaw
    yrsPracLaw
    usRepDist
    txRepDist
    aisdDist     
    isFelon
    isMentalIncap
*/

foreach($info_arr as $field => $value){
    ${$field} = $value;
}

?>
<!DOCTYPE html>

<html>

  <head>


    <style>
    body {
    background-color:   #91A8d0;
    font-family: "Courier New", Courier, monospace;
    color: white;
    }
    .no-js #loader { display: none;  }
    .js #loader { display: block; position: absolute; left: 100px; top: 0; }
    .se-pre-con {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
	    background: url(images/loader-64x/Preloader_2.gif) center no-repeat #fff;
    }
    </style>
        <title>MAGA</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
    <script>
    //paste this code under the head tag or in a separate js file.
        // Wait for window load
        $(window).load(function() {
            // Animate loader off screen
            $(".se-pre-con").fadeOut("slow");;
        });
    </script>
  </head>

  <body>


    <h2 id="fullName">Name HERE</h2>
    <ul>
      <div id="registeredYN"><i class="fas fa-bong"></i> Registered to vote</div>
      <div id="distNum"><i class="fas fa-bong"></i> Citizen</div>
      <div id="yearsResident"><i class="fas fa-bong"></i> Resident for at least 7 years</div>
    </ul>
    <div id="readyOrNot">You're ready to run in 2020! Here's what's next:</div>
    <div id="notReadyList">
      <div id="whyOrWhyNotAge"></div>
      <div id="whyOrWhyNotCitizen"></div>
      <div id="whyOrWhyNotTx"></div>
      <div id="whyOrWhyNotCit7"></div>
    </div>


    <ol>
      <div id="fillGovForm">You need to fill out form XXX</div>
      <div id="gatherSigs">You need to gather XX signatures on this form endorsing your candidacy:</div>
      <div id="fillPartyForm">You need to fill out form XXX and send it to the Democratic Party of Texas.</div>
    </ol>

    <hr>

    <div>Well, our job here is done. You're on your own. Take a look at the resources below to learn more.</div>

    <p>RESOURCE</p>
    <p>RESOURCE</p>
    <p>RESOURCE</p>
    <p>RESOURCE</p>

    <script>
        // Position requirements
    // Age
    let usRepAge = 25;
    let txRepAge = 21;
    let aisdAge = 18;
    let daAge = 18;


    // Variables
    var office = "<?= $info_arr['office'] ?>";
    var fname = "<?= $info_arr['fname'] ?>";
    var lname = "<?= $info_arr['lname'] ?>";
    var fullName = fname + " " + lname;
    var full_address = "<?= $info_arr['full_address'] ?>";
    var state = "<?= $info_arr['state'] ?>";
    var city = "<?= $info_arr['city'] ?>";
    var zip = "<?= $info_arr['zip'] ?>";
    var yrsAtCurRes = "<?= $info_arr['yrsAtCurRes'] ?>";
    var dob = "<?= $info_arr['dob'] ?>";
    var age = "<?= $info_arr['age'] ?>";
    var isTxRes = "<?= $info_arr['isTxRes'] ?>";
    var isCitizen = "<?= $info_arr['isCitizen'] ?>";
    var yrsCitizen = "<?= $info_arr['yrsCitizen'] ?>";
    var isFelon = "<?= $info_arr['isFelon'] ?>";
    var isMentalIncap = "<?= $info_arr['isMentalIncap'] ?>";

    document.write(fname);


    // Define position cetegory
    function whatPosCateg(office) {
    if (office == "us_rep_d10" || office == "us_rep_d17" || office == "us_rep_d21" || office == "us_rep_d25" || office == "us_rep_d35") {
        posCateg = "usRep";
    } else if (office == "tx_rep_d46" || office == "tx_rep_d47" || office == "tx_rep_d48" || office == "tx_rep_d49" || office == "tx_rep_d50" || office == "tx_rep_d51") {
        posCateg = "txRep";
    } else if (office == "travis_DA") {
        posCateg = "travisDA";
    } else if (office == "aisd_d1" || office == "aisd_d2" || office == "aisd_d3" || office == "aisd_d4" || office == "aisd_d5" || office == "aisd_d6" || office == "aisd_d7" || office == "aisd_large") {
        posCateg = "aisdBoard";
    }

    }

    //Determine if user is old enough
    function oldEnough() {
    if ((posCateg == "usRep") && (age < 25)) {
        isOldEnough = 0;
    } else if ((posCateg == "txRep") && (age < 21)) {
        isOldEnough = 0;
    } else if ((posCateg == "travisDA" || posCateg == "aisdBoard") && (age < 18)) {
        isOldEnough = 0;
    } else {
        isOldEnough = 1;
    }
    }

    // Print if user is eligible or not
    function readyOrNotFunc() {
    if (isOldEnough == 0) {
        document.getElementById("readyOrNot").innerHTML = "<h4>Sorry, you're ineligible for the following reasons:</h4>";
    } else if (isCitizen == 0) {
        document.getElementById("readyOrNot").innerHTML = "<h4>Sorry, you're ineligible for the following reasons:</h4>";
    } else if (isTxRes == 0) {
        document.getElementById("readyOrNot").innerHTML = "<h4>Sorry, you're ineligible for the following reasons:</h4>";
    } else if (yrsCitizen < 7) {
        document.getElementById("readyOrNot").innerHTML = "<h4>Sorry, you're ineligible for the following reasons:</h4>";
    } else {
        document.getElementById("readyOrNot").innerHTML = "<h4>You're ready to rock for 2020! Here's what's next:</h4>";
    }
    }

    // Print, if necessary, why user is not eligible
    function whyOrWhyNotFunc() {
    if (isOldEnough == 0) {
        document.getElementById("whyOrWhyNotAge").innerHTML = "<li>You're not old enough.</li>";
    }
    if (isCitizen == 0) {
        document.getElementById("whyOrWhyNotCitizen").innerHTML = "<li>Being a U.S. citizen is a requirement for most elected seats.</li>";
    }
    if (isTxRes == 0) {
        document.getElementById("whyOrWhyNotTx").innerHTML = "<li>Being a Texas resident is a requirement to run for this position</li>";
    }
    if (yrsCitizen < 7) {
        document.getElementById("whyOrWhyNot").innerHTML = "<li>It's a requirement to be a U.S. Citizen for at least seven years to run for this position.</li>";
    }
    }

    // Fill in key info
    document.getElementById("fullName").innerHTML = fullName;


    whatPosCateg(office);
    oldEnough();
    readyOrNotFunc();
    whyOrWhyNotFunc();
    </script>
  </body>
  
  <div class="se-pre-con"></div>

</html>