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

    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <style>
    html, body {
        margin:0;
        padding:0;
    }
    h1 { 
        font-family: Lato; 
        font-size: 23px; 
        font-style: normal; 
        font-variant: normal; 
        font-weight: 700; 
        line-height: 23px; 
    } 
    h3 { 
        font-family: Lato; 
        font-size: 17px; 
        font-style: normal; 
        font-variant: normal; 
        font-weight: 700; 
        line-height: 23px; 
    }
    body { 
        background-color: #779FFF;
        color: white;
        font-family: Lato; 
        font-size: 14px; 
        font-style: normal; 
        font-variant: normal; 
        font-weight: 400; 
        line-height: 23px; 
    }  
    p { 
        font-family: Lato; 
        font-size: 14px; 
        font-style: normal; 
        font-variant: normal; 
        font-weight: 400; 
        line-height: 23px; 
    } 
    blockquote { 
        font-family: Lato; 
        font-size: 17px; 
        font-style: normal; 
        font-variant: normal; 
        font-weight: 400; 
        line-height: 23px; 
    } 
    
    pre { 
        font-family: Lato; 
        font-size: 11px; 
        font-style: normal; 
        font-variant: normal; 
        font-weight: 400; 
        line-height: 23px; 
    }

    ::placeholder { 
        color: #D6DBDF;
        opacity: 1; 
    }
    .form-style-4{
        width: 70%;
        margin: 0 auto;
        font-size: 16px;
        background: #779FFF;
        padding: 30px 30px 15px 30px;
    }

    .form-style-4 input[type=submit],
    .form-style-4 input[type=button],
    .form-style-4 input[type=text],
    .form-style-4 input[type=email],
    .form-style-4 textarea,
    .form-style-4 label,
    .form-style-4 select,
    [type="date"]
    {
        font-family: Lato;
        font-size: 16px;
        color: #000000;
        margin-bottom: 30px;

    }
    .form-style-4 label {
        font-size: 24px;
        display:inline;
        color: #ffffff;
        margin-bottom: 7px;
        margin-right: 20px;
    }
    
    .form-style-4 label > span{
        display: inline-block;
        float: left;
        width: 150px;
    }

    .form-style-4 input[type=text],
    .form-style-4 input[type=email],
    [type="date"] 
    {
        -moz-border-radius: 3px;
        border-radius: 3px;
        background: white;
        border: none;
        height: 30px;
        width: 275px;
        outline: none;
        padding: 3px 3px 3px 8px;
    }
    .form-style-4 textarea{
        padding: 0px 0px 0px 0px;
        background: transparent;
        outline: none;
        border: none;
        border-bottom: 1px dashed #ffffff;
        width: 275px;
        overflow: hidden;
        resize:none;
        height:20px;
    }

    .form-style-4 textarea:focus, 
    .form-style-4 input[type=text]:focus,
    .form-style-4 input[type=email]:focus,
    .form-style-4 input[type=email] :focus
    {
        border-bottom: 1px dashed #ffffff;
    }

    .form-style-4 input[type=submit],
    .form-style-4 input[type=button]{
        background: #083FC5;
        height: 70px;
        width: 170px;
        font-size: 40px;
        border: none;
        padding: 8px 10px 8px 10px;
        border-radius: 5px;
        color: #ffffff;
        text-align: center;

    }
    .form-style-4 input[type=submit]:hover,
    .form-style-4 input[type=button]:hover{
        background: #83CAFF;
    }

    .centerSubmit{
        text-align: center;
    }
    .intro{
        text-align: center;
        color: #ffffff;;
    }
    hr{
        border-color: #ffffff;
        background-color: #ffffff: 
    }
    .header{
        width: 100%;
        padding-top: 20px;
        padding-bottom: 10px;
        background: #ffffff;
        color: #779FFF;
        font-size: 30px;
        overflow: auto;
    }
    .header [id="left_head"]{
        text-align: left;
        padding-left: 15px;
        float: left;
        display: inline-block;
        position: relative;
    }
    .header [id="right_head"]{
        text-align: right;
        padding-right: 15px;
        display: inline-block;
        float: right;
        position: relative;
     }
     .header [id="left_head"]:hover{
        color:blue;
        cursor: pointer;
    }
    .clickable:hover{
        cursor: pointer;
        text-decoration: underline;
    }
    </style>
        <title>MAGA</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

  </head>

  <body>
    <div class="header">
            <p id="right_head">Already running with us? Click <span class="clickable" style="color:blue;">here</span> to sign in.</p>
            <h1 id="left_head" onclick="location.href='http://crowdtheroom.org/';">crowdtheroom</h1>
    </div>

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
    <p>RESOURCE</p>d

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
</html>