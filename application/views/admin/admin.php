<?php

?>
<html>
<head>
    <link href = "css/bootstrap.css" rel = "stylesheet">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
</head>

<style>

		body{
            background-color: silver;
        }
        
        #header{
            margin-top: auto;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: auto;
            border:groove 7px silver;
            -moz-border-radius-topleft: 45px;
            -moz-border-radius-topright:16px;
            -moz-border-radius-bottomleft:16px;
            -moz-border-radius-bottomright:14px;
            -webkit-border-top-left-radius:45px;
            -webkit-border-top-right-radius:16px;
            -webkit-border-bottom-left-radius:16px;
            -webkit-border-bottom-right-radius:14px;
            border-top-left-radius:45px;
            border-top-right-radius:16px;
            border-bottom-left-radius:16px;
            border-bottom-right-radius:14px;
            background:-webkit-gradient(linear, 80% 20%, 10% 21%, from(white), to(silver));   
            height: 15%;
            width: 60%;
            min-height: 15%; 
            overflow: hidden;
            padding: 2px;
            }

        #fontstyle{
                margin-top: auto;
                margin-left: auto;
                margin-right: auto;
                margin-bottom: auto;
                font-style: oblique;
                text-shadow:6px -1px 4px #000000;
                font-size: 90px;
                
            }

        #fontstyle_sec{
                font-style: oblique;
                text-shadow:3px -1px 4px #000000;
                font-size: 30px;
                margin-left: 5%;
            }


        #container_body{
        	margin-top: auto;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: auto;
            border:groove 7px silver;
            height: 15%;
            width: 60%;
            min-height: 85%; 
        }

        .form-control_first{
            margin-top: 1%!important;
            width:10%!important;  
        }

        .form-control_sec{
            margin-top: 1%!important;
            width: 22%!important;
            margin-left: 5%!important;
            float:left;
        }



</style>

<body>
<div id="header"><font id="fontstyle">Our Parish</font></div>
<div id="container_body">
<div><font id="fontstyle_sec">ADMINISTRATOR PAGE</font></div>
<select class="form-control form-control_sec">
  <option>MASS SCHEDULES</option>
  <option>BAPTISM SCHEDULES</option>
  <option>CONFESSION SCHEDULES</option>
  <option>CONFIRMATION SCHEDULES</option>
</select>   
<select class="form-control form-control_first">
  <option>ADD</option>
  <option>DELETE</option>
  <option>UPDATE</option>
</select>


</body>
</html>