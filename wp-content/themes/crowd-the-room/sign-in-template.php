<?php
/*
 Template Name: sign-in-template
 */
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
    .centerSubmit{
        text-align: center;
    }
    .intro{
        text-align: center;
        color: #ffffff;
        width: 70%;
        margin: 0 auto;
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

    <title>Crowd The Room</title>
    </head>

    <body>
    <div class="header">
            <p id="right_head">Already running with us? Click <span class="clickable" style="color:blue;">here</span> to sign in.</p>
            <h1 id="left_head" onclick="location.href='http://crowdtheroom.org/';">crowdtheroom</h1>
    </div>
    <div style="padding: 30px;">
        
        <h1>Our apologies</h1>
        <p>Unfortunately, this page is not currently up and running. We're working hard to make it happen, but until then, keep crowding!</p>
        
    </div></body>
    
    </html>