<?php
/*
 Template Name: input-form-template
 */
get_header();
?>

<!DOCTYPE html>

<html>

    <head>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <style>
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
        border: 5px solid #FFFD1D;
    }

    .form-style-4 input[type=submit],
    .form-style-4 input[type=button],
    .form-style-4 input[type=text],
    .form-style-4 input[type=email],
    .form-style-4 textarea,
    .form-style-4 label,
    .form-style-4 select,
    [type="date"],
    [type="radio"]
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
        background: #1D0185;
        height: 70px;
        width: 170px;
        font-size: 40px;
        border: none;
        padding: 8px 10px 8px 10px;
        border-radius: 2px;
        color: #ffffff;
        text-align: center;

    }
    .form-style-4 input[type=submit]:hover,
    .form-style-4 input[type=button]:hover{
        background: #83CAFF;
    }
    input:invalid {
        border-color: #FF0000;
    }
    .centerSubmit{
        text-align: center;
    }
    .intro{
        text-align: center;
        color: #ffffff;
        width: 70%;
        margin: 0 auto;
    }
    </style>

    <title>Crowd The Room</title>
    </head>
    <body>
        <div class="intro">
            
            <h1>Let's get you running!</h1>
            <p>We're happy you've expressed interest in running for a public office! In order to give you
                more details on how to run for the specific office you desire, we need to collect a little
                information first. We use this information to do a few simple checks and let you know if you're
                eligible to run.
            </p>
        </div>
        <div id="main-form" class="form-style-4">
            <form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post" autocomplete="off" onsubmit='return formValidation()'>
                <p>All fields are required to get you up and running.</p>
                <p id="val1" style="color: red;"></p>
                <div>
                    <label for="office">What Office would you like to run for?</label>
                    <select name='office' id="office" onchange = "addOptions()" required>
                        <option value="">Select an Office</option>
                        <option value="us_rep">United State Representative</option>
                        <option value="tx_rep">Texas State Representative</option>
                        <option value="travis_DA">Travis County District Attorney</option>
                        <option value="aisd">AISD Trustee</option>
                        <option value="aisd_large">AISD Trustee At Large</option>
                    </select>
                </div>

                <div>
                    <label for="district" id="districtLabel" style="display:none;">Which District?</label>
                    <select name='district' id="district" style="display:none;">
                        <option value="">Select a District</option>
                    </select>
                    <div id="district_div" style="display:none;">
                        <p> Not sure what district you live in? <br>Check your voter card or Texas residents can click <a class="clickable" href="https://fyi.capitol.texas.gov/Address.aspx">here</a> to find out.</p>
                    </div>
                    <div id="aisd_div" style="display:none;">
                        <p> Not sure what district you live in? <br>Find your residence on <a class="clickable" href="https://www.austinisd.org/board/boundaries">this map</a>.</p>
                    </div>
                </div>

                <div>
                    <label for="party">Which party are you running with?</label>
                    <input type="radio" name="party" value="democrat" required>Democrat</input>
                    <input type="radio" name="party" value="republican" >Republican</input>
                    <input type="radio" name="party" value="independent" >Independent</input>
                </div>
                
                <div>
                    <label for="fname">First Name:</label>
                    <input type="text" name="fname" id="fname" value="" required>
                </div>
            
                <div>
                    <label for="lname">Last Name:</label>
                    <input type="text" name="lname" id="lname" value="" required>
                </div>
                
                <h2>Where do you currently live?</h2>
                <p id="val2" style="color: red;"></p>
                <div id="locationField">
                    <label for="autocomplete">Address:</label>
                    <input id="autocomplete" onFocus="geolocate()" type="text" required></input>
                </div>
                    
                <div style="display:none;">
                    <label for="street_address">Street Address:</label>
                    <input type="text" name="street_number" id="street_number" value="" />
                    <input type="text" name="street_address" id="street_address" value="" />
                </div>
                
                <div style="display:none;">
                        <label for="city">City:</label>
                        <input type="text" name="city" id="city" value="" />
                </div>

                <div style="display:none;">
                        <label for="state">State:</label>
                        <input type="text" name="state" id="state" value="" />
                </div>

                    <div style="display:none;">
                        <label for="zip">Zip Code:</label>
                        <input type="text" name="zip" id="zip" value="" />
                    </div>

                <div style="display:none;">
                        <label for="county">County:</label>
                        <input type="text" name="county" id="county" value="" />
                </div>

                <div>
                    <label for="yrsAtCurRes">How many years have you lived at this address?</label>
                    <input type="text" name="yrsAtCurRes" id="yrsAtCurRes" value="" required>
                </div>

                <div id="texas_resident" style="display:none;">
                    <label for="yrsTxRes">How many years ago did you move to Texas? <p>(If there were multiple times, choose most recent. If you were born here and never left, put your age.)</p></label>
                    <input type="text" name="yrsTxRes" id="yrsTxRes" value="" required>
                </div>

            
                <div>
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob" value="" required>
                </div>

            
                <div>
                    <label for="isCitizen">Are you a US citizen?</label>
                    <input type="radio" name="isCitizen" value=1 required>Yes</input>
                    <input type="radio" name="isCitizen" value=0 >No</input>
                </div>

            
                <div>
                    <label for="yrsCitizen">How many years have you been a citizen?</label>
                    <input type="text" name="yrsCitizen" id="yrsCitizen" value="" required>
                </div>

                <div id="isFelonQuestion">
                    <label for="isFelon">Have you even been convicted of a felony?</label>
                    <input type="radio" name="isFelon" value=1 required>Yes</input>
                    <input type="radio" name="isFelon" value=0>No</input>
                </div>
                
                <div id="aisdHead" style="display:none;">
                    <h2>Field for School Board</h2>
                </div> 

                <div id="isMentalIncapQuestion" style="display:none;">
                    <label for="isMentalIncap">Have you even been deemed totally mentally incapacitated or partially mentally incapacitated without the right to vote by a court of law?</label>
                    <input type="radio" name="isMentalIncap" value=1>Yes</input>
                    <input type="radio" name="isMentalIncap" value=0>No</input>
                </div>

                <div class="centerSubmit">
                    <input type="hidden" name="action" value="basic_info">
                    <input type="submit" name="submit_form" value="Submit">
                </div>
            </form>
        </div>


    </body>
    <script type="text/javascript">
        function formValidation() {
            // Make quick references to our fields.
            var fname = document.getElementById('fname');
            var lname = document.getElementById('lname');
            var yrsAtCurRes = document.getElementById('yrsAtCurRes');
            var yrsTxRes = document.getElementById('yrsTxRes');
            var yrsCitizen = document.getElementById('yrsCitizen');
            
        
            // Check each input in the order that it appears in the form.
            if (inputAlphabet(fname, "* For your First Name please use letter only *")) {
                if (inputAlphabet(lname, "* For your Last Name please use letter only *")) {
                    if (textNumeric(yrsAtCurRes, "* Invalid Years at Residence (Use numbers) *")) {
                        if (textNumeric(yrsTxRes, "* Invalid Years in Texas (Use numbers)*")) {
                            if (textNumeric(yrsCitizen, "* Invalid Years of Citizenship (Use numbers)*")) {
            
            return true;
            }
            }
            }
            }
            }
            return false;
            }

            // Function that checks whether input text is numeric or not.
            function textNumeric(inputtext, alertMsg) {
            var numericExpression = /^[0-9]+$/;
            if (inputtext.value.match(numericExpression)) {
            return true;
            } else {
            document.getElementById('val1').innerText = alertMsg; // This segment displays the validation rule for zip.
            document.getElementById('val2').innerText = alertMsg;
            inputtext.focus();
            return false;
            }
            }

            // Function that checks whether input text is an alphabetic character or not.
            function inputAlphabet(inputtext, alertMsg) {
            var alphaExp = /^[a-zA-Z]+$/;
            if (inputtext.value.match(alphaExp)) {
            return true;
            } else {
            document.getElementById('val1').innerText = alertMsg; // This segment displays the validation rule for name.
            document.getElementById('val2').innerText = alertMsg;
            //alert(alertMsg);
            inputtext.focus();
            return false;
            }
            }
            // FROM https://www.formget.com/form-validation-using-javascript/
    </script>
    <script>
        function addOptions(){
            var distDiv=document.getElementById("district_div");
            var dSelect=document.getElementById("district");
            var dLabel=document.getElementById("districtLabel");
            var officeVal=document.getElementById("office").value;
            var aisdHead=document.getElementById("aisdHead");
            var isMentalIncapQuestion=document.getElementById("isMentalIncapQuestion");
            var txRes=document.getElementById("texas_resident");
            var aisdDiv=document.getElementById("aisd_div");

            while (true){
            
                if (dSelect.length > 0) {
                    dSelect.remove(dSelect.length-1);
                }else{
                    break;
                }
            }
            distDiv.style.display = 'none';
            dSelect.style.display = 'none';
            dLabel.style.display = 'none';
            aisdHead.style.display = 'none';
            isMentalIncapQuestion.style.display = 'none';
            txRes.style.display = 'none';
            aisdDiv.style.display = 'none';

            if (officeVal == "us_rep"){
                dSelect.add(new Option("Select your desired district", ""), null);
                dSelect.add(new Option("10", "d10"), null);
                dSelect.add(new Option("17", "d17"), null);
                dSelect.add(new Option("21", "d21"), null);
                dSelect.add(new Option("25", "d25"), null);
                dSelect.add(new Option("35", "d35"), null);
                
                distDiv.style.display = 'inline';
                dSelect.style.display = 'inline';
                dLabel.style.display = 'inline';
            }else if (officeVal == "tx_rep"){
                dSelect.add(new Option("Select your desired district", ""), null);
                dSelect.add(new Option("46", "d46"), null);
                dSelect.add(new Option("47", "d47"), null);
                dSelect.add(new Option("48", "d48"), null);
                dSelect.add(new Option("49", "d49"), null);
                dSelect.add(new Option("50", "d50"), null);
                dSelect.add(new Option("51", "d51"), null);
                
                distDiv.style.display = 'inline';
                dSelect.style.display = 'inline';
                dLabel.style.display = 'inline';
                txRes.style.display = 'inline';
            }else if (officeVal == "aisd"){
                dSelect.add(new Option("Select your desired district", ""), null);
                dSelect.add(new Option("1", "d1"), null);
                dSelect.add(new Option("2", "d2"), null);
                dSelect.add(new Option("3", "d3"), null);
                dSelect.add(new Option("4", "d4"), null);
                dSelect.add(new Option("5", "d5"), null);
                dSelect.add(new Option("6", "d6"), null);
                dSelect.add(new Option("7", "d7"), null);
                
                aisdDiv.style.display = 'inline';
                dSelect.style.display = 'inline';
                dLabel.style.display = 'inline';
                aisdHead.style.display = 'inline';
                isMentalIncapQuestion.style.display = 'inline';

            }else{
                dSelect.style.display = 'none';
                dLabel.style.display = 'none';
                aisdHead.style.display = 'none';
                isMentalIncapQuestion.style.display = 'none';
                txRes.style.display = 'none';
                distDiv.style.display = 'none';
                aisdDiv.style.display = 'none';
            }
    }
    </script>
    <script>
        // This example displays an address form, using the autocomplete feature
        // of the Google Places API to help users fill in the information.

        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

        var placeSearch, autocomplete;
        var componentForm = {
            street_number: 'long_name',
            route: 'long_name',
            locality: 'long_name',
            administrative_area_level_1: 'short_name',
            administrative_area_level_2: 'short_name',
            postal_code: 'short_name'
        };

        var compDecode = {
            street_number: 'street_number',
            route: 'street_address',
            locality: 'city',
            administrative_area_level_1: "state",
            administrative_area_level_2: "county",
            postal_code: 'zip'
        };

        function initAutocomplete() {
            // Create the autocomplete object, restricting the search to geographical
            // location types.
            autocomplete = new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
                {types: ['geocode']});

            // When the user selects an address from the dropdown, populate the address
            // fields in the form.
            autocomplete.addListener('place_changed', fillInAddress);
        }

        function fillInAddress() {
            // Get the place details from the autocomplete object.
            var place = autocomplete.getPlace();

            for (var comp in compDecode) {
                document.getElementById(compDecode[comp]).value = '';
                document.getElementById(compDecode[comp]).disabled = false;
            }

            // Get each component of the address from the place details
            // and fill the corresponding field on the form.
            for (var i = 0; i < place.address_components.length; i++) {
                var addressType = place.address_components[i].types[0];
                if (componentForm[addressType]) {
                    var val = place.address_components[i][componentForm[addressType]];
                    document.getElementById(compDecode[addressType]).value = val;
                }
            }
        }

        // Bias the autocomplete object to the user's geographical location,
        // as supplied by the browser's 'navigator.geolocation' object.
        function geolocate() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                var geolocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                var circle = new google.maps.Circle({
                    center: geolocation,
                    radius: position.coords.accuracy
                });
                autocomplete.setBounds(circle.getBounds());
                });
            }
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCytjQ0DS7mTa7WVRgvs-eoFaKD-UdKiLg&libraries=places&callback=initAutocomplete"
        async defer></script>


</html>