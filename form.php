<?php

if (isset($_POST['submit'])) {


if (isset($_POST['g-recaptcha-response'])){
    $recaptcha=$_POST['g-recaptcha-response'];
    
    if(!$recaptcha){
        echo '<script>alert("Captcha Incorrect")</script>';
        exit;
    }
else{
    $secret="6LemXmwcAAAAAB0tk67F24GM10cIJ4Qq3UXzkB8O";
    $url='https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$recaptcha;
    $response=file_get_contents($url);
    $responseKeys =json_decode($response,true);
    print_r($responseKeys);
$res=1;
}
}
if ($res) {
    $msg = "Submitted";
    echo "<script type='text/javascript'>alert('$msg');window.location.href='form.php';</script>";
} else {
    $msg = "Failed to Submit";
    echo "<script type='text/javascript'>alert('$msg');window.location.href='form.php';</script>";
}
}

?>
<html lang="en">

<head>
    

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>task</title>
    <style>
        .myForm {
            font-size: 0.8em;
            width: 50em;
            padding: 1em;
            border: 5px solid #000;
	    
            margin-top: 20px;
            align-items: center;
font-style:OPen Sans;
        }

        .myForm * {
            box-sizing: border-box;
        }

        .myForm fieldset {
            border: none;
            padding: 0;
        }

        .myForm legend,
        .myForm label {
            padding: 0;
            font-weight: bold;
        }

        .myForm label.choice {
            font-size: 0.9em;
            font-weight: normal;
        }

        .myForm input[type="text"],
        .myForm input[type="email"],
        .myForm input[type="date"],
        .myForm select,
        .myForm textarea {
            display: block;
            width: 100%;
            border: 1px solid #ccc;
            font-size: 0.9em;
            padding: 0.3em;
        }

        .myForm textarea {
            height: 30px;
        }

        .myForm button {
            padding: 1em;
            border-radius: 0.5em;
            background: #000;
            color: #ccc;
            border: none;
            font-weight: bold;
            margin-top: 1em;
        }

        .myForm button:hover {
            background: #eee;
            color: #000;
            cursor: pointer;
        }
	#timer{
	font-size: 50px;
	}
    </style>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body style="background-color: #DBF9FC">
<h3 style="margin-left:250px;">Sample Form</h3>
<form action=form.php method="POST"> 
    <section class="myForm" style="margin-left:30px;">
	<div class="container" >
            <div class="row">
                <form class="myForm" method="post" b>
    

                    <h1 style="text-align:center;">
<span id="timer"></span><br>
<span><h6 style="color:red">Please fill the form in 3 minutes</h6></span>

<script>
var now = new Date();
var timeup = now.setSeconds(now.getSeconds() + 180);

var counter = setInterval(timer, 1000);

function timer() {
  now = new Date();
  count = Math.round((timeup - now)/1000);
  if (now > timeup) {
      window.location = "form.php"; //or somethin'
      clearInterval(counter);
      return;
  }
  var seconds = Math.floor((count%60));
  var minutes = Math.floor((count/60) % 60);
  document.getElementById("timer").innerHTML = minutes + ":" + seconds;
}
</script></h1>
<table>

                    <tr>
                       <td> <label>Name
                            <input type="text" name="name" id="name" style="width:300px;"  required>
                        </label></td>
                    

                    <td>
                        <label>Email
                            <input type="email" name="email" id="email" style="width:300px;"  required>
                        </label>
                  </td></tr>
<tr>
                    <td><p>
                        <label>DOB
                            <input type="date" name="dob" id="dob" style="width:300px;" required>
                        </label>
                    </p></td>

<td><p>
                        <label>About yourself
                            <textarea name="about" id="about" style="width:300px;"  required></textarea>
                        </label>
                    </p></td><td></tr>
<tr><td>                  <p>
                        <label>Captcha
                            <div class="g-recaptcha" data-sitekey="6Lex9W0cAAAAACY92RaIpQr65HI20UQDGz_QTlCP"></div>
                            <br />
                            <input type="submit" value="Submit" name="submit" id="submit">
                        </label>
                    </p></td></tr>
                </form>
            </div>
        </div>
    </section>
</body>

</html>