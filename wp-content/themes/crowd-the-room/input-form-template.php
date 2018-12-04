<?php
/*
 Template Name: input-form-template
 */
?>

<!DOCTYPE html>

<html>

    <head>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <style>
    <style>
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
        background-color:   #91A8d0;
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
    
    .form-style-8{
        font-family: 'Lato';
        width: 500px;
        padding: 30px;
        background: #FFFFFF;
        margin: 50px auto;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
        -moz-box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
        -webkit-box-shadow:  0px 0px 15px rgba(0, 0, 0, 0.22);

    }
    .form-style-8 h2{
        background: #4D4D4D;
        text-transform: uppercase;
        font-family: 'Lato';
        color: #797979;
        font-size: 18px;
        font-weight: 100;
        padding: 20px;
        margin: -30px -30px 30px -30px;
    }
    .form-style-8 input[type="text"],
    .form-style-8 input[type="date"],
    .form-style-8 input[type="datetime"],
    .form-style-8 input[type="email"],
    .form-style-8 input[type="number"],
    .form-style-8 input[type="search"],
    .form-style-8 input[type="time"],
    .form-style-8 input[type="url"],
    .form-style-8 input[type="password"],
    .form-style-8 textarea,
    .form-style-8 select 
    {
        box-sizing: border-box;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        display: block;
        width: 100%;
        padding: 7px;
        border: none;
        border-bottom: 1px solid #ddd;
        background: transparent;
        margin-bottom: 10px;
        font: 16px Lato;
        height: 45px;
    }
    .form-style-8 textarea{
        resize:none;
        overflow: hidden;
    }
    .form-style-8 input[type="button"], 
    .form-style-8 input[type="submit"]{
        -moz-box-shadow: inset 0px 1px 0px 0px #45D6D6;
        -webkit-box-shadow: inset 0px 1px 0px 0px #45D6D6;
        box-shadow: inset 0px 1px 0px 0px #45D6D6;
        background-color: #2CBBBB;
        border: 1px solid #27A0A0;
        display: inline-block;
        cursor: pointer;
        color: #FFFFFF;
        font-family: 'Lato';
        font-size: 14px;
        padding: 8px 18px;
        text-decoration: none;
        text-transform: uppercase;
    }
    .form-style-8 input[type="button"]:hover, 
    .form-style-8 input[type="submit"]:hover {
        background:linear-gradient(to bottom, #34CACA 5%, #30C9C9 100%);
        background-color:#34CACA;
    }



    .form-style-4{
        width: 450px;
        font-size: 16px;
        background: #91A8d0;
        padding: 30px 30px 15px 30px;
        border: 5px solid #ffffff;
    }
    .form-style-4 input[type=submit],
    .form-style-4 input[type=button],
    .form-style-4 input[type=text],
    .form-style-4 input[type=email],
    .form-style-4 textarea,
    .form-style-4 label
    {
        font-family: Lato;
        font-size: 16px;
        color: #fff;
        margin-bottom: 30px;

    }
    .form-style-4 select
    {
        font-family: Lato;
        font-size: 16px;
        margin-bottom: 30px;

    }
    .form-style-4 label {
        display:block;
        margin-bottom: 7px;
    }
    .form-style-4 label > span{
        display: inline-block;
        float: left;
        width: 150px;
    }
    .form-style-4 input[type=text],
    .form-style-4 input[type=email] 
    {
        background: transparent;
        border: none;
        border-bottom: 1px dashed #ffffff;
        width: 275px;
        outline: none;
        padding: 0px 0px 0px 0px;
        font-style: italic;
    }
    .form-style-4 textarea{
        font-style: italic;
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
        background: #576E86;
        border: none;
        padding: 8px 10px 8px 10px;
        border-radius: 5px;
        color: #A8BACE;
    }
    .form-style-4 input[type=submit]:hover,
    .form-style-4 input[type=button]:hover{
    background: #394D61;
    }
    #main-form {
    width: 50%;
    margin: 0 auto;
    }
    </style>

    <title>MAGA</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    </head>
    <body>

        <form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post" autocomplete="off">

            <div>
                <label for="office">What Office would you like to run for?</label>
                <select name='office' id="office" onchange = "addOptions()" required>
                    <option value="">Select an Office</option>
                    <option value="us_rep">United State Representative</option>
                    <option value="tx_rep">Texas State Representative</option>
                    <option value="travis_DA">Travis County District Attorney</option>
                    <option value="aisd">AISD Trustee</option>
                    <option value="aisd_large">AISD Trustee At Large</option>
                </select><span style="color:red">*</span>
            </div>

            <div>
                <label for="district" id="districtLabel" style="display:none;">Which District?</label>
                <select name='district' id="district" style="display:none;">
                    <option value="">Select a District</option>
                </select>
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
            
            <div id="locationField">
                <label for="autocomplete">Google maps autocomplete address:</label>
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

            <div>
                <label for="yrsTxRes">How many years have you lived at this address?</label>
                <input type="text" name="yrsAtCurRes" id="yrsAtCurRes" value="" required>
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

            <div id="aisdHead" style="display:none;">
                <h2>Fields for School Board (I think?)</h2>
            </div> 

            <div id="isFelonQuestion" style="display:none;">
                <label for="isFelon">Have you even been convicted of a felony?</label>
                <input type="radio" name="isFelon" value=1>Yes</input>
                <input type="radio" name="isFelon" value=0>No</input>
            </div>
            
            
            <div id="isMentalIncapQuestion" style="display:none;">
                <label for="isMentalIncap">Have you even been deemed totally mentally incapacitated or partially mentally incapacitated without the right to vote by a court of law?</label>
                <input type="radio" name="isMentalIncap" value=1>Yes</input>
                <input type="radio" name="isMentalIncap" value=0>No</input>
            </div>

            
            <div>
                <input type="hidden" name="action" value="basic_info">
                <input type="submit" name="submit_form" value="submit">
            </div>
        </form>
    <p id="debug"></p>


    </body>
    <script>
        function addOptions(){
            var dSelect=document.getElementById("district");
            var dLabel=document.getElementById("districtLabel");
            var officeVal=document.getElementById("office").value;
            var aisdHead=document.getElementById("aisdHead");
            var isFelonQuestion=document.getElementById("isFelonQuestion");
            var isMentalIncapQuestion=document.getElementById("isMentalIncapQuestion");
            
            while (true){
            
                if (dSelect.length > 0) {
                    dSelect.remove(dSelect.length-1);
                }else{
                    break;
                }
            }
            dSelect.style.display = 'inline';
            dLabel.style.display = 'inline';
            if (officeVal == "us_rep"){
                dSelect.add(new Option("Select your desired district", ""), null);
                dSelect.add(new Option("10", "d10"), null);
                dSelect.add(new Option("17", "d17"), null);
                dSelect.add(new Option("21", "d21"), null);
                dSelect.add(new Option("25", "d25"), null);
                dSelect.add(new Option("35", "d35"), null);
            }else if (officeVal == "tx_rep"){
                dSelect.add(new Option("Select your desired district", ""), null);
                dSelect.add(new Option("46", "d46"), null);
                dSelect.add(new Option("47", "d47"), null);
                dSelect.add(new Option("48", "d48"), null);
                dSelect.add(new Option("49", "d49"), null);
                dSelect.add(new Option("50", "d50"), null);
                dSelect.add(new Option("51", "d51"), null);
            }else if (officeVal == "aisd"){
                dSelect.add(new Option("Select your desired district", ""), null);
                dSelect.add(new Option("1", "d1"), null);
                dSelect.add(new Option("2", "d2"), null);
                dSelect.add(new Option("3", "d3"), null);
                dSelect.add(new Option("4", "d4"), null);
                dSelect.add(new Option("5", "d5"), null);
                dSelect.add(new Option("6", "d6"), null);
                dSelect.add(new Option("7", "d7"), null);
                
                aisdHead.style.display = 'inline';
                isFelonQuestion.style.display = 'inline';
                isMentalIncapQuestion.style.display = 'inline';

            }else{
                dSelect.style.display = 'none';
                dLabel.style.display = 'none';
                aisdHead.style.display = 'none';
                isFelonQuestion.style.display = 'none';
                isMentalIncapQuestion.style.display = 'none';
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