<?php
/*
 Template Name: results-page-template
 */

function get_user_info(){
	global $wpdb;
    $user_id = $_GET['id'];
	$table_name = $wpdb->prefix . 'ctr_users';
    $sql = "SELECT * FROM " . $table_name . " WHERE user_id={$user_id}";
	$result = $wpdb->get_row($sql, ARRAY_A);
    //arr_as_table($result);
    return $result;
}

$info_arr = get_user_info();

/* HI CONNOR
 This loop populates all the varibles you'll need for the eligibility logic.
 They are called:
    user_id 
    office
    party
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
get_header();
?>
<!DOCTYPE html>

<html>

  <head>
    <title>MAGA</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <style>
    a:link{
        color: #fffff;
    }
    a:link:hover{
        color: blue;
    }
    a:visited{
        color: #fffff;
    }
    #everything{
        margin: 40px;
    }
    #readyOrNot,
    #fullName{
        font-size: 35px;
    }
    h4 {
        font-size: 35px;
    }
    </style>
  </head>

  <body>
    <div id="everything">
    <h2 id="fullName">Name HERE</h2>
    <div id="readyOrNot">You're ready to run in 2020! Here's what's next:</div>
    <div id="quals"></div>
    <div id="butt" style="display: none;"><h3>But why not?</h3></div>
    <div id="whyOrWhyNotAge"></div>
    <div id="whyOrWhyNotCitizen"></div>
    <div id="whyOrWhyNotTx"></div>
    <div id="whyOrWhyNot"></div>
    <div id="notice" style="display: none;"></div>

    <br>
    <div id="whatNext" style="display: none;"><h4>Here's what's next:</h4></div>
    
    <div id="dem_txRep" style="display:none;">
        <h2>Appoint a campaign treasurer</h2>
            <ol type="a">
		        <li>Texas state law requires all candidates to file a campaign treasurer appointment with the appropriate filing authority. <b>You are required to have a campaign treasurer appointment on file with your filing authority even if you do not plan to raise or spend any money.</b></li>
		        <li>Fill out <a href="https://www.ethics.state.tx.us/e-forms/e_cta.pdf">this form</a> and send it form to the TEC electronically at <b>treasappoint@ethics.state.tx.us</b> or fax it to <b>(512) 463-8808</b> or mail it to: <b><br>Texas Ethics Commission<br>P.O. Box 12070 <br>Austin, TX 78711-2070</b></li>
		        <li>For more information regarding the rules and regulations of a campaign treasurer, click <b><a href="https://www.ethics.state.tx.us/forms/CTA_ins.html">here</a></b>.</li>
	        </ol>
        <h2>Apply</h2>
	        <ol type="a">
		        <li>You'll need to fill out <a href="https://www.sos.state.tx.us/elections/forms/pol-sub/2-2f.pdf"><b>this application</b></a> and send it to your party's address:<br>
			        <b>Texas Democratic Party<br>
			        Gilberto Hinojosa, Chair<br>
			        1106 Lavaca Street, #100<br>
			        Austin, Texas 78701<br>
			        </b></li>

		        <li>In addition to your application, you'll need to either attach a fee of $750, or <a href="https://www.sos.state.tx.us/elections/forms/pol-sub/2-3f.pdf">a petition</a> totalling 500 signatures.
		        <br> <em>NOTE: For your payment, you may include a check made out to your political party and attach it to your application. For the petition, make sure you receive valid signatures that include either the date of birth or VUID of the signatories. Attach the petition sheets to your application. It is recommended that you receive <b>three times</b> the required amount of signatures on your petition to retain your required amount during the certification process.</em></li></ol>
    </div>


    <div id="repub_txRep" style="display:none;">
    <h2>Appoint a campaign treasurer</h2>
    <ol type="a">
            <li>Texas state law requires all candidates to file a campaign treasurer appointment with the appropriate filing authority. <b>You are required to have a campaign treasurer appointment on file with your filing authority even if you do not plan to raise or spend any money.</b></li>
            <li>Fill out <a href="https://www.ethics.state.tx.us/e-forms/e_cta.pdf">this form</a> and send it form to the TEC electronically at <b>treasappoint@ethics.state.tx.us</b> or fax it to <b>(512) 463-8808</b> or mail it to: <b><br>Texas Ethics Commission<br>P.O. Box 12070 <br>Austin, TX 78711-2070</b></li>
            <li>For more information regarding the rules and regulations of a campaign treasurer, click <b><a href="https://www.ethics.state.tx.us/forms/CTA_ins.html">here</a></b>.</li>
        </ol>
    <h2>Apply</h2>
        <ol type="a">
            <li>You'll need to fill out <a href="https://www.sos.state.tx.us/elections/forms/pol-sub/2-2f.pdf"><b>this application</b></a> and send it to your party's address:<br>
                <b>Texas GOP<br>
                James Dickey, Chair<br>
                211 E. 7th Street, Suite 915<br>
                Austin, Texas 78701<br>
                <br><b></li>
            <li>In addition to your application, you'll need to either attach a fee of $750, or <a href="https://www.sos.state.tx.us/elections/forms/pol-sub/2-3f.pdf">a petition</a> totalling 500 signatures.
            <br> <em>NOTE: For your payment, you may include a check made out to your political party and attach it to your application. For the petition, make sure you receive valid signatures that include either the date of birth or VUID of the signatories. Attach the petition sheets to your application. It is recommended that you receive <b>three times</b> the required amount of signatures on your petition to retain your required amount during the certification process.</em></li></ol>
    </div>
    <div id="ind_txRep" style="display:none;">
        <h3>Texas Rep Independent</h3>
    </div>
    <div id="dem_usRep" style="display:none;">
        <h3>US Rep Democrat</h3>
    </div>
    <div id="rep_usRep" style="display:none;">
        <h3>US Rep Republican</h3>
    </div>
    <div id="ind_usRep" style="display:none;">
        <h3>US Rep Indpendent</h3>
    </div>
    <div id="dem_travisDA" style="display:none;">
        <h3>DA Democrat</h3>
    </div>
    <div id="dem_travisDA" style="display:none;">
        <h3>DA Republican</h3>
    </div>
    <div id="ind" style="display:none;">
        <h3>DA Independent</h3>
    </div>
    <div id="aisd" style="display:none;">
        <h3>Aisd Rep</h3>
    </div>
    
    


    <hr>

    <div>Well, our job here is done. You're on your own. Take a look at the resources below to learn more.</div>

    <div id="resources">
        <h2>Resources:</h2>
        <ul>
            <li><a class="clickable" href="https://www.emilyslist.org/">Emily's List:</a> A political aid for pro-choice, democrat women.</li>
        
            <li><a class="clickable" href="https://runforsomething.net/">Run For Something:</a> A political resource for young, progressive candidates</li>
        
            <li><a class="clickable" href="https://ourrevolution.com/">Our Revolution:</a>A political organization working to elect progressive Democrats through local efforts.
            </li>
        </ul>
    </div>  
    </div>
    <script>
        // Position requirements
        // Age
        let usRepAge = 25;
        let txRepAge = 21;
        let aisdAge = 18;
        let daAge = 18;


        // Variables
        var office = "<?= $info_arr['office'] ?>";
        var party = "<?= $info_arr['party'] ?>";
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
        var yrsTxRes ="<?= $info_arr['yrsTxRes'] ?>";
        var yrsCitizen = "<?= $info_arr['yrsCitizen'] ?>";
        var isFelon = "<?= $info_arr['isFelon'] ?>";
        var isMentalIncap = "<?= $info_arr['isMentalIncap'] ?>";
        var party = "<?= $info_arr['party'] ?>";
        var isRegVote = "<?= $info_arr['isRegVote'] ?>";



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
        console.log(posCateg)
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
        isReady = false;
        if (isOldEnough == 0) {
            document.getElementById("readyOrNot").innerHTML = "<h4>Sorry, you're ineligible for the following reasons:</h4>";
        } else if (isCitizen == 0) {
            document.getElementById("readyOrNot").innerHTML = "<h4>Sorry, you're ineligible for the following reasons:</h4>";
        } else if (isTxRes == 0) {
            document.getElementById("readyOrNot").innerHTML = "<h4>Sorry, you're ineligible for the following reasons:</h4>";
        } else if (yrsCitizen < 7) {
            document.getElementById("readyOrNot").innerHTML = "<h4>Sorry, you're ineligible for the following reasons:</h4>";
        } else if (isRegVote != 1) {
            document.getElementById("readyOrNot").innerHTML = "<h4>Sorry, you're ineligible for the following reasons:</h4>";
        } else {
            document.getElementById("readyOrNot").innerHTML = "<h4>You're ready to rock for 2020!</h4>";
            isReady = true;
        }
        }

        // Print, if necessary, why user is not eligible
        // Some requirements for all, some for only certain positions
        function whyOrWhyNotFunc() {
        trigger = false;
        console.log(isOldEnough)
        console.log(isCitizen)
        console.log(isTxRes)
        console.log(posCateg)
        console.log(yrsCitizen)
        console.log(yrsTxRes)
        
        if (isOldEnough == 0) {
            document.getElementById("whyOrWhyNotAge").innerHTML = "<li>You're not old enough.</li>";
            trigger = true;
        }
        if (isCitizen == 0) {
            document.getElementById("whyOrWhyNotCitizen").innerHTML = "<li>Being a U.S. citizen is a requirement for all elected seats.</li>";
            trigger = true;
        }
        if (isTxRes == 0) {
            document.getElementById("whyOrWhyNotTx").innerHTML = "<li>Being a Texas resident is a requirement to run for this position</li>";
            trigger = true;
        }
        if (isRegVote == 0) {
            document.getElementById("whyOrWhyNotTx").innerHTML = "<li>Being registered to vote is a requirement to run for this position</li>";
            trigger = true;
        }
        // Logic for us rep
        if (posCateg == 'usRep'){
            if (yrsCitizen < 7) {
                document.getElementById("whyOrWhyNot").innerHTML = "<li>It's a requirement to be a U.S. Citizen for at least 7 years to run for this position.</li>";
                trigger = true;
            }
        }
        // Logic for tx rep
        if (posCateg == 'txRep'){
            document.getElementById("notice").style.display = "inline";
            document.getElementById("notice").innerHTML = "<h3>Notice:</h3><li>You must a resident of your district for at least 1 year to run for this position. Double check <a class=\"clickable\" href=\"https://fyi.capitol.texas.gov/Address.aspx\">here.</a></li>";
            if (yrsTxRes < 2) {
                document.getElementById("whyOrWhyNot").innerHTML = "<li>It's a requirement to be a Texas resident for at least 2 years immediatly before running for this position.</li>";
                trigger = true;
            }
        }
        // Logic for travis DA
        if (posCateg == 'travisDA'){
            if (yrsTxRes < 1) {
                document.getElementById("whyOrWhyNot").innerHTML = "<li>It's a requirement to be a Texas resident for at least 1 year immediatly before running for this position.</li>";
                trigger = true;
            }
        }
        // Logic for aisd Board
        if (posCateg == 'aisdBoard'){
            document.getElementById("notice").style.display = "inline";
            document.getElementById("notice").innerHTML = "<h3>Notice:</h3><li>You must a resident of your district for at least 6 months to run for this position. Double check <a class=\"clickable\" href=\"https://www.austinisd.org/board/boundaries\">here.</a></li>";
            if (yrsTxRes < 1) {
                document.getElementById("whyOrWhyNot").innerHTML = "<li>It's a requirement to be a Texas resident for at least 1 year immediatly before running for this position.</li>";
                trigger = true;
            }
        }
        
        if (trigger){
            document.getElementById("butt").style.display = "inline";
        }
        console.log("did the why not");
        }
        
        // Display either Democrat or Republican next steps display

        function fullSteps() {
        document.getElementById("whatNext").style.display = 'initial';
        if (posCateg == "aisdBoard"){
            document.getElementById("aisd").style.display = 'initial';
        }
        else if (party == "democrat") {
            document.getElementById("dem_" + posCateg).style.display = 'initial';
            }
        else if (party == "republican") {
            document.getElementById("rep_" + posCateg).style.display = 'initial';
            }
        else if (party == "independent") {
            document.getElementById("ind_" + posCateg).style.display = 'initial';
            }
        }


        // New (and improved) eligible logic
        function whatBoutDis() {
	        oldVar = (isOldEnough == 1) ? "&#10003; Old enough<br>" : "&#10007; Old enough<br>";
            voteVar = (isRegVote == 1) ? "&#10003; Voter Status<br>" : "&#10007; Voter Status<br>";
            resVar = (isTxRes == 1) ? "&#10003; Texas resident status<br>" : "&#10007; Texas resident status<br>";
            citVar = (isCitizen == 1) ? "&#10003; U.S. citizen status<br>" : "&#10007; U.S. citizen status<br>";
            document.getElementById("quals").innerHTML = oldVar + voteVar + resVar + citVar;
            console.log("hi dan");
        }
        // Fill in key info
        document.getElementById("fullName").innerHTML = fullName + ",";

        whatPosCateg(office);
        oldEnough();
        readyOrNotFunc();
        whyOrWhyNotFunc();
        whatBoutDis();
        if (isReady){
            fullSteps();
        }

        
    </script>
  </body>
</html>