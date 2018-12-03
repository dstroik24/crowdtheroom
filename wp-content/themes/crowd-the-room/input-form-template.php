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

    </style>
        <title>MAGA</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    </head>

    <body>

        <form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post" style="display: inline;">

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

        <label for="street_address">Street Address:</label>
        <input type="text" name="street_address" id="street_address" value="" />

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

    </body>


</html>