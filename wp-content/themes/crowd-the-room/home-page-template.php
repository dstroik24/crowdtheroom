<?php
/*
 Template Name: home-page-template
 */
?>

<!DOCTYPE html>

<html>

    <head>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <style>
    h1 { 
        font-family: Lato; 
        font-size: 100px; 
        font-style: normal; 
        font-variant: normal; 
        font-weight: 700; 
        line-height: 23px;
        text-align: center;
    } 
    h3 { 
        font-family: Lato; 
        font-size: 40px; 
        font-style: normal; 
        font-variant: normal; 
        font-weight: 700; 
        line-height: 23px; 
        text-align: center; 
        padding-top: 50px; 
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
    .bigBreak{
        height: 20;
    }
    .niceButt{
        text-align: center;
        margin: auto;
    }
    .niceButt input[type=submit]{
        font-family: Lato; 
        height: 70px;
        width: 350px;
        font-size: 35px;
        padding: 8px 10px 8px 10px;
        margin: 10px;
        border-radius: 5px;
        text-align: center;
    }
    .niceButt input[type=submit][name="about_us"]{
        color: white;
        background-color: transparent;
        border-color: #ffffff;
    }
    .niceButt input[type=submit][name="start_running"]{
        color: #779FFF;
        background-color: #ffffff;
        border: none;
    }
    .niceButt input[type=submit][name="about_us"]:hover{
        background: #C7E7FF;
    }
    .niceButt input[type=submit][name="start_running"]:hover{
        background: #C7E7FF;
    }
    form#run_form {
         float: left; 
         margin: auto;
    }
    form#about_us {
         float:left;
         clear: right;
         margin: auto;
         /* with some space to the left of the second form */
         
    }
    </style>
    </head>

    <body>

        <br class="bigBreak">
        <br class="bigBreak">
        <br class="bigBreak">

        <div id="title">
            <h1>You want to run for office.</h1>
            <h1>We're here to help.</h1>
        </div>

        <br class="bigBreak">
        <br class="bigBreak">

        <div id="subtitle">
            <h3>We'll get you on the ballot. You just have to win.</h3>
        </div>

        <div class="niceButt">
            <input type="submit" name="start_running" value="Get Running" 
                onclick="location.href='http://104.248.4.174/application/';">
            <input type="submit" name="about_us" value="About Us" 
                onclick="location.href='https://en.wikipedia.org/wiki/Cambridge_Analytica';">
        </div>


    </body>

</html>
