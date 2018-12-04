<?php
/*
 Template Name: input-form-template
 */
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
    input[type=text] {
        width: 300px;
    }

    </style>

    <title>MAGA</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    </head>
    <body>

        <form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post" autocomplete="off">
        <table>
        <tr>
            <td><label for="office">What Office would you like to run for?</label></td>
            <td><input list="office" name="office" id="office">
                <datalist id="offices">
                    <option value="">Select an Office</option>
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
                </datalist></td>
        </tr>

        <tr>
            <td><label for="fname">First Name:</label></td>
            <td><input type="text" name="fname" id="fname" value="" /></td>
        </tr>

        <tr>
            <td><label for="lname">Last Name:</label></td>
            <td><input type="text" name="lname" id="lname" value="" /></td>
        </tr>
        
        <th><h2>Where do you currently live?</h2></th>
        <tr>
            <td>
                <div id="locationField">
                <label for="autocomplete">Google maps autocomplete address:</label>
                <input id="autocomplete" placeholder="Enter your address"
                onFocus="geolocate()" type="text"></input>
                </div>
             </td>
        </tr>
        <tr>
            <td><label for="street_address">Street Address:</label></td>
            <td><input type="text" name="street_number" id="street_number" value="" /></td>
            <td><input type="text" name="street_address" id="street_address" value="" /></td>
        </tr>
        
        <tr>
            <td><label for="city">City:</label></td>
            <td><input type="text" name="city" id="city" value="" /></td>
        </tr>

        <!-- <tr>
            <td><label for="state">State:</label></td>
            <td><select name='state'>
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
            </select></td>
        </tr>
        -->
        <tr>
            <td><label for="state">State:</label></td>
            <td><input type="text" name="state" id="state" value="" /></td>
        </tr>

        <tr>
            <td><label for="zip">Zip Code:</label></td>
            <td><input type="text" name="zip" id="zip" value="" /></td>
        </tr>

        <tr>
            <td><label for="county">County:</label></td>
            <td><input type="text" name="county" id="county" value="" /></td>
        </tr>

        <tr>
            <td><label for="yrsAtCurRes">How many years have you lived at this address?</label></td>
            <td><input type="text" name="yrsAtCurRes" id="yrsAtCurRes" value="" /></td>
        </tr>

        <tr>
            <td><label for="dob">Date of Birth:</label></td>
            <td><input type="date" id="dob" name="dob" value=""/></td>
        </tr>

        <tr>
            <td><label for="isCitizen">Are you a US citizen?</label></td>
            <td><input type="radio" name="isCitizen" value=1>Yes</input>
            <input type="radio" name="isCitizen" value=0>No</input></td>
        </tr>

        <tr>
            <td><label for="yrsCitizen">How many years have you been a citizen?</label></td>
            <td><input type="text" name="yrsCitizen" id="yrsCitizen" value="" /></td>
        </tr>

        <th><h2>Fields for School Board (I think?)</h2></th>

        <tr>
            <td><label for="isFelon">Have you even been convicted of a felony?</label></td>
            <td><input type="radio" name="isFelon" value=1>Yes</input>
            <input type="radio" name="isFelon" value=0>No</input></td>
        </tr>
        
        <tr>
            <td><label for="isMentalIncap">Have you even been deemed totally mentally incapacitated or partially mentally incapacitated without the right to vote by a court of law?</label></td>
            <td><input type="radio" name="isMentalIncap" value=1>Yes</input>
            <input type="radio" name="isMentalIncap" value=0>No</input></td>
        </tr>

        <tr>
            <td><input type="hidden" name="action" value="basic_info"></td>
            <td><input type="submit" name="submit_form" value="submit"></td>
        </tr>
        </form>
        </table>
    </body>

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