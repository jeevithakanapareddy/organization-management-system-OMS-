<?php session_start(); ?>
<?php include 'menuPractice.php';
include "UrlConfig.php"; ?>

<?php
 
$passwd=$_SESSION['pass'];
$empId= $_SESSION['email'] 


// echo '<script>';
// echo "alert('pasword reset successful!:$passwd');";



?>

<!DOCTYPE html>
<html>

<head>

<title>Update password</title>
<style>
         body {
         background-image: url('https://hubble.miraclesoft.com/assets/img/bg-login.jpg');
         background-repeat: no-repeat;
         background-attachment: fixed;
         background-size: 100% 100%;
      
      }
.register {
text-align: center;
top:8rem;
margin-left: 36%;
margin-right: 36%;
position: relative;
/* border-radius: 5px; */
background-color: white;
padding: 14px 27px 18px 27px;
margin-top: 4%;
margin-bottom: 9%;
z-index: 0;
position: fixed;
max-height: 70vh;
max-width: 700px;
/* overflow-y: auto; */
padding:1%;

border-radius:3%;
}

h3 {
text-align: center;
}

p {
color: red;
}

.select {
border-color: transparent;
margin-left: 14%;
margin-right: 15%;
}
.label{
    text-align:left;
}
.button{
    background-color:DeepSkyBlue;
    color:white;
    font-size:large;
}

.button:hover {
background-color: DeepSkyBlue;
color:white;
font-size: large;
}

.error-tooltip {
    position: absolute;
    margin-top: 8px;
    background-color: #ffcccc;
    color: red;
    padding: 8px;
    border-radius: 4px;
    display: none;
    width:200px;
    z-index:50;
}

/* @media only screen and (max-width:1050px) and (min-width:350px){
    .register{
        max-height:25vh;
        padding:1%;
    }
} */
/* 
#tm {
            cursor: pointer;
            position: absolute;
            right: 96px;
            top: 50%;
            transform: translateY(3%);
        } */
</style>
</head>

<body>
<div class="register">
<h2 style="color:DeepSkyBlue; margin-top:0rem; "> Reset Password </h2>



<form action="" method="post" onsubmit="return validateForm()" action="Rpast.php"><br><br>

Old Password :<input type="password" id="oldpassword" name="oldpassword" placeholder=" enter here.." >
<img src="https://cdn3.iconfinder.com/data/icons/show-and-hide-password/100/show_hide_password-08-512.png" width="9%" height="10%" style="margin-left: -11%;display:inline; vertical-align: middle" id="tp">
<p id="oldpasswordMessage"></p><br><br>
<div id="oldpasswordMessage" class="error-tooltip"></div>
<label>New Password : </label>
<input type="password" id="newpassword" name="newpassword" onclick="eye()" placeholder=" enter here.." >
<img src="https://cdn3.iconfinder.com/data/icons/show-and-hide-password/100/show_hide_password-08-512.png" width="9%" height="10%" style="margin-left: -11%;display:inline; vertical-align: middle" id="tl">
<p id="newpasswordMessage"></p><br><br>
<label>Confirm Password : </label>
<input type="password" id="confirmpassword" name="confirmpassword" onclick="eye1()" placeholder=" enter here.." >
<img src="https://cdn3.iconfinder.com/data/icons/show-and-hide-password/100/show_hide_password-08-512.png" width="9%" height="10%" style="margin-left: -12%;display:inline; vertical-align: middle" id="tm">
<p id="confirmpasswordMessage"></p><br><br>
<input class="button" type="submit" value="Update">
</form>
</div>

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



function jqpassword1() {
        var name = $("#pas").val();
        var a = /^[A-Z]+[A-Za-z0-9@!~%$#*]{8,16}$/;

        if (!name.match(a)) {
            if (name === "") {
                showErrorTooltip("Field can't be empty!!!","password-error-tooltip");
            } else {
                showErrorTooltip("Password must contain at least one special character, uppercase, lowercase letter, and number!!!","password-error-tooltip");
            }
        } else {
            str = str + "c";
            // Do something when the password is valid
            hideErrorTooltip("password-error-tooltip");
        }
    }


    function checkOldPassword() {
const existingPassword = <?= json_encode($passwd); ?>;
const passwordInput = $("#oldpassword").val();
const passwordPattern =  /^[A-Z]+[A-Za-z0-9@!~%$#*0-9]{7,16}$/;
const passwordElement = $("#oldpasswordMessage");
const passwordMatch = passwordInput.match(passwordPattern);

if(passwordInput === ""){
    showErrorTooltip("Password Can Not Be Empty:  ","oldpasswordMessage");
}
else if (!passwordMatch) {
    showErrorTooltip("Password must contain at least one uppercase letter, one lowercase letter, and one special character.","oldpasswordMessage");
}
else if (existingPassword !== passwordInput) {
    showErrorTooltip("Existing Password Does Not Match","oldpasswordMessage");
}
else {
count++;
hideErrorTooltip("oldpasswordMessage");
}
}



    ///=======================================>

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
$token=$_SESSION['token'];

$url =$urlPath."pass";
$data = [
   
    'pass' => $pass,
    'cpass'=>$cpass,
    'email'=>$_SESSION['em']
  
  ];

  $options = [
    'http' => [
  
 
'method' => 'POST',
        'header' => [
            'Content-Type: application/json',
            'Authorization:' . $token 
        ],
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