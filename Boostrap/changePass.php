<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script  src="validation.js"></script>  
</head>
<style>

.row{
       width:60rem;
       padding:5px;
       
      
    }
    </style>

    <body>
    <h2 style="color:DeepSkyBlue; margin-top:0rem; "> Reset Password </h2>



<form action="" method="post" onsubmit="return validateForm()" action="Rpast.php"><br><br>
<div class="row">
        <div class="col"> 
            <label>oldpassword</label>
            </div>
        <div class="col">
          <input type="password" id="oldpassword" name="oldpassword" class="form-control" placeholder="Password" aria-label="First name">
     <img src="https://cdn3.iconfinder.com/data/icons/show-and-hide-password/100/show_hide_password-08-512.png" width="13%" height="60%" style="margin-left:86%; margin-top: -26%;display:inline; vertical-align: middle" id="tp">
          <div id="password-error-tooltip" class="error-tooltip"></div>

        </div>
        <div class="col">
        </div>
      </div>

      <div class="row">
        <div class="col"> 
            <label>newpassword</label>
            </div>
        <div class="col">
          <input type="password" id="newpassword" name="newpassword" class="form-control" placeholder="Password" onclick="eye()"  aria-label="First name">
     <img src="https://cdn3.iconfinder.com/data/icons/show-and-hide-password/100/show_hide_password-08-512.png" width="13%" height="60%" style="margin-left:86%; margin-top: -26%;display:inline; vertical-align: middle" id="t1">
          <div id="password-error-tooltip" class="error-tooltip"></div>

        </div>
        <div class="col">
        </div>
      </div>

      <div class="row">
        <div class="col"> 
            <label>Password</label>
            </div>
        <div class="col">
          <input type="password" id="confirmpassword" name="confirmpassword" class="form-control"  onclick="eye1()" placeholder="confirm password" aria-label="First name">
     <img src="https://cdn3.iconfinder.com/data/icons/show-and-hide-password/100/show_hide_password-08-512.png" width="13%" height="60%" style="margin-left:86%; margin-top: -26%;display:inline; vertical-align: middle" id="tm">
          <div id="password-error-tooltip" class="error-tooltip"></div>

        </div>
        <div class="col">
        </div>
</div>
</form>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>


const togglePassword = document.querySelector('#tp'); 
  const password = document.querySelector('#oldpassword'); 
  togglePassword.addEventListener('click', function (e) { 

		
		const type = password.getAttribute( 
			'type') === 'password' ? 'text' : 'password'; 
		password.setAttribute('type', type); 

		// Toggle the eye slash icon 
		if (togglePassword.src.match( 
"https://clipground.com/images/password-eye-icon-png-2.png")) { 
			togglePassword.src = 
"https://cdn3.iconfinder.com/data/icons/show-and-hide-password/100/show_hide_password-08-512.png"; 
		} else { 
			togglePassword.src = 
"https://clipground.com/images/password-eye-icon-png-2.png"; 
		} 
	}); 

function eye(){
    const togglePassword = document.querySelector('#tl'); 
  const password = document.querySelector('#newpassword'); 
  togglePassword.addEventListener('click', function (e) { 

		
		const type = password.getAttribute( 
			'type') === 'password' ? 'text' : 'password'; 
		password.setAttribute('type', type); 

		// Toggle the eye slash icon 
		if (togglePassword.src.match( 
"https://clipground.com/images/password-eye-icon-png-2.png")) { 
			togglePassword.src = 
"https://cdn3.iconfinder.com/data/icons/show-and-hide-password/100/show_hide_password-08-512.png"; 
		} else { 
			togglePassword.src = 
"https://clipground.com/images/password-eye-icon-png-2.png"; 
		} 
	}); 
}


function eye1(){
    const togglePassword = document.querySelector('#tm'); 
  const password = document.querySelector('#confirmpassword'); 
  togglePassword.addEventListener('click', function (e) { 

		
		const type = password.getAttribute( 
			'type') === 'password' ? 'text' : 'password'; 
		password.setAttribute('type', type); 

		// Toggle the eye slash icon 
		if (togglePassword.src.match( 
"https://clipground.com/images/password-eye-icon-png-2.png")) { 
			togglePassword.src = 
"https://cdn3.iconfinder.com/data/icons/show-and-hide-password/100/show_hide_password-08-512.png"; 
		} else { 
			togglePassword.src = 
"https://clipground.com/images/password-eye-icon-png-2.png"; 
		} 
	}); 
}
$(document).ready(function () {
$("#oldpassword").on("blur", function () {
checkOldPassword();
});
$("#newpassword").on("blur", function () {
validateNewPassword();
});
$("#confirmpassword").on("blur", function () {
validateConfirmPassword();
});
});


let count = 0;

function validateForm() {
count = 0;

checkOldPassword();
validateNewPassword() ;
validateConfirmPassword();
if(count==3){
return true;
}else{
return false;
}


}






function checkOldPassword() {
const existingPassword = <?= json_encode($passwd); ?>;
const passwordInput = $("#oldpassword").val();
const passwordPattern =  /^[A-Z]+[A-Za-z0-9@!~%$#*0-9]{7,16}$/;
const passwordElement = $("#oldpasswordMessage");
const passwordMatch = passwordInput.match(passwordPattern);

if(passwordInput === ""){
passwordElement.html("Password Can Not Be Empty:  ");
}
else if (!passwordMatch) {
passwordElement.html("Password must contain at least one uppercase letter, one lowercase letter, and one special character.");
}
else if (existingPassword !== passwordInput) {
passwordElement.html("Existing Password Does Not Match");
}
else {
count++;
passwordElement.html("");
}
}

function validateNewPassword() {
const oldPasswordInput = $("#oldpassword").val();
const passwordInput = $("#newpassword").val();
const passwordPattern = /^[A-Z]+[A-Za-z0-9@!~%$#*]{7,16}$/;   // /^(?=.[a-z])(?=.[A-Z])(?=.*\W).+$/;
const passwordElement = $("#newpasswordMessage");
const passwordMatch = passwordInput.match(passwordPattern);

if(passwordInput === ""){
passwordElement.html("Password Can Not Be Empty.");
}
else if (!passwordMatch) {
passwordElement.html("Password must contain at least one uppercase letter, one lowercase letter, and one special character.");
}else if (oldPasswordInput == passwordInput) {
passwordElement.html("Do Not Use Old Password.");
}
else {
count++;
passwordElement.html("");
}
}

function validateConfirmPassword() {
const newPasswordInput = $("#newpassword").val();
const passwordInput = $("#confirmpassword").val();
const passwordPattern = /^[A-Z]+[A-Za-z0-9@!~%$#*]{7,16}$/;
const passwordElement = $("#confirmpasswordMessage");
const passwordMatch = passwordInput.match(passwordPattern);
if(passwordInput === ""){
passwordElement.html("Password Can Not Be Empty.");
}
else if (!passwordMatch) {
passwordElement.html("Password must contain at least one uppercase letter, one lowercase letter, and one special character.");
}else if (newPasswordInput !== passwordInput) {
passwordElement.html("Does Not Match With New Password.");
}
else {
count++;
passwordElement.html("");
}
}

</script>
</body>

</html>

<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


$pass = $_POST['newpassword'];
$cpass = $_POST['confirmpassword'];


$url ="http://172.17.13.133:8080/pass";
$data = [
   
    'pass' => $pass,
    'cpass'=>$cpass,
    'email'=>$_SESSION['em']
  
  ];

  $options = [
    'http' => [
  
 
'method' => 'POST',
        'header' => ['Content-Type: application/json'],
        'content' => json_encode($data)
    ]
];

$context = stream_context_create($options);
$response = file_get_contents($url, false,$context);
$responseData = json_decode($response, true);

if ($responseData['success']) {

    // header('Location: homepage.php?status=success');

    echo "<script>";
    echo "alert('pasword reset successful!');";
    echo "window.location.href='homepage.php';";
    echo "</script>";
} else {
 $errorMessage = $responseData['message'];
   echo "<script>";
   echo "alert(' password not reset !! failed !!: $errorMessage');";
   echo "window.location.href='Rpast.php?message=$errorMessage';";
   echo "</script>";

   exit();
}
} else {


}
  

?>