<?php

$status = isset($_GET['status']) ? $_GET['status'] : '';
if ($status === 'error') {
echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'>";
echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js'></script>";
echo "<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js'></script>";

echo "<style>";
echo " .custom-alert {";
echo " position: fixed;";
echo " top: 1%;";
echo " left: 50%;";
echo " width: 100%;";
echo " width:75%;"; 
echo " height: 60px;"; // Set the desired height
echo " text-align: center;";
echo " transform: translateX(-50%);";
echo " z-index: 1050;";
echo " }";
echo "</style>";
  
echo '<div class="alert alert-danger custom-alert" role="alert">';
echo "Login failed! Please check your credentials.";
echo '</div>';
echo '<script>
            setTimeout(function(){
                window.location.href = "index.php";
            }, 2000); // 2000 milliseconds = 2 seconds
          </script>';
}else if (isset($_GET['Resetstatus']) && $_GET['Resetstatus'] === 'success'){
  // if ($status === 'success') {
  echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'>";
  echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js'></script>";
  echo "<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js'></script>";
  // Display the message based on the status
  echo "<style>";
  echo " .custom-alert {";
  echo " position: fixed;";
  echo " top:5%;";
  echo " left: 50%;";
  // echo " width: 100%;";
  echo " width:75%;"; 
  echo " height: 60px;"; // Set the desired height
  echo " text-align: center;";
  echo " transform: translateX(-50%);";
  echo " z-index: 1050;";
  echo " }";
  echo "</style>";
  
  
      echo '<div class="alert alert-success custom-alert" role="alert">';
      echo 'pasword reset successful!';
      echo '</div>';
      // You may also add JavaScript to redirect after a delay
      echo '<script>
              setTimeout(function(){
                  window.location.href = "index.php";
              }, 2000); // 2000 milliseconds = 2 seconds
            </script>';
  }
?>
<!-- Your regular HTML content for the login page goes here -->


<!DOCTYPE html>
<html lang="en">
<head>


<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <!-- Add Bootstrap CSS link -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
    <title>login</title>
  
    <script  src="ProfileEdit_Validations.js"></script>  
    <style>

/* @media only screen and (min-width:350px) and (max-width:550px){
  #image-container{
    display:none;
  }
} */
#tp {
            cursor: pointer;
            position: absolute;
            right: 96px;
            top: 50%;
            transform: translateY(39%);
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
}

.input-container {
    position: relative;
    margin: 50px auto;
    width: 100px;
}
   .inputForm {
  border: 1.5px solid #ecedec;
  border-radius: 10px;
  height: 50px;
  display: flex;
  align-items: center;
  padding-left: 10px;
  transition: 0.2s ease-in-out;
}

        .login-form {
            width: 350px;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
            /* border-radius: 5px; */
            background: #fff;
            color: #151717;
  font-weight: 600;
  text-align: left; 
  align-items: left;
  /* background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px #000000; */
        }

       
        .form-control {
            width: 100%;
            padding: 10px;
            /* box-sizing: border-box; */
            /* border: 1px solid #ccc; */
            /* border-radius: 3px; */
            outline: none;
            min-height: 41px;
            background: #f2f2f2;
            box-shadow: none ;
            border: transparent;
        }

        /* .form-control:focus {
            border-color: #3598dc;
        } */


        .input {
  margin-left: 10px;
  border-radius: 10px;
  border: none;
  width: 85%;
  height: 100%;
}

.input:focus {
  outline: none;
}

        a {
            color: #3598dc;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .text-center {
            text-align: center;
        }

        .small {
            font-size: 12px;
        }
         body {
      margin: 0;
      padding: 0;
      display: flex;
      height: 100vh;
    }

    #image-container {
  flex: 1;
  overflow: hidden;
  height: 100vh;
    display: flex;
  align-items: center; 
 
}

    #login-container {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #f4f4f4; 
       max-width: 420px;  
       padding : 63px;
       width: 72%;
       z-index:50;
    }

    #content-container {
      position: absolute;
      bottom: 0;
      left: 0;
      padding: 20px;
      color: #fff;
    }

    #login-form {
      /* max-width: 270px;  */
     width: 81%;
       /* padding: 14px; */
      /* border-radius: 8px; */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      /* background-color: #fff;  */
    }
   h1{
    font-style:oblique;
   }

    #background-image {
      height:100%;
      object-fit: cover;
    }

    .button-submit {
  margin: 20px 0 10px 0;
  background-color: blue;
  border: none;
  color: white;
  font-size: 15px;
  font-weight: 500;
  border-radius: 10px;
  height: 50px;
  width: 100%;
  cursor: pointer;
}

@media only screen and (max-width: 550px) and (min-width: 350px) {
    #image-container {
        display: none;
    }
}
</style>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body id="bd">
<div id="image-container">
    <img id="background-image" src="https://hubble.miraclesoft.com/assets/img/bg-login.jpg" alt="Background Image">
    <div id="content-container">
      <p><h1>Welcome To Miracle Portal...</h1></p>
      <p><h1>Employee Portal </h1></p>
      <p><h1>Have A Nice Day !!!</h1></p>
      <p>© Miracle Software Systems, Inc.</p>
    </div>
  </div>






  <div id="login-container">

    <div class="login-form">
      
       <img style="margin-left:4rem;" alt="Image" width="189" height="72" src="data:image/png;base64,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" >  
  <div>
   
            <br><br>
            <form class="form" method="post" action="Loginaction.php">
            <label>Email ID </label><br><br></div>
      <div class="inputForm">
        <svg height="20" viewBox="0 0 32 32" width="20" xmlns="http://www.w3.org/2000/svg"><g id="Layer_3" data-name="Layer 3"><path d="m30.853 13.87a15 15 0 0 0 -29.729 4.082 15.1 15.1 0 0 0 12.876 12.918 15.6 15.6 0 0 0 2.016.13 14.85 14.85 0 0 0 7.715-2.145 1 1 0 1 0 -1.031-1.711 13.007 13.007 0 1 1 5.458-6.529 2.149 2.149 0 0 1 -4.158-.759v-10.856a1 1 0 0 0 -2 0v1.726a8 8 0 1 0 .2 10.325 4.135 4.135 0 0 0 7.83.274 15.2 15.2 0 0 0 .823-7.455zm-14.853 8.13a6 6 0 1 1 6-6 6.006 6.006 0 0 1 -6 6z"></path></g></svg>
        <input type="text" name="em" id="em" class="input" placeholder="Enter your Email" >
      </div>
      <p id="email-error-tooltip" class="error-tooltip"></p>

    <div><br>
      <label>Password </label><br><br></div>
      <div class="inputForm">
        <svg height="20" viewBox="-64 0 512 512" width="20" xmlns="http://www.w3.org/2000/svg"><path d="m336 512h-288c-26.453125 0-48-21.523438-48-48v-224c0-26.476562 21.546875-48 48-48h288c26.453125 0 48 21.523438 48 48v224c0 26.476562-21.546875 48-48 48zm-288-288c-8.8125 0-16 7.167969-16 16v224c0 8.832031 7.1875 16 16 16h288c8.8125 0 16-7.167969 16-16v-224c0-8.832031-7.1875-16-16-16zm0 0"></path><path d="m304 224c-8.832031 0-16-7.167969-16-16v-80c0-52.929688-43.070312-96-96-96s-96 43.070312-96 96v80c0 8.832031-7.167969 16-16 16s-16-7.167969-16-16v-80c0-70.59375 57.40625-128 128-128s128 57.40625 128 128v80c0 8.832031-7.167969 16-16 16zm0 0"></path></svg>        
        <input type="password" class="input" name="pas" id="pas"  placeholder="Enter your Password">
       
        <!-- <svg viewBox="0 0 576 512" height="1em" xmlns="http://www.w3.org/2000/svg"><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"></path></svg> -->
        <img src="https://cdn3.iconfinder.com/data/icons/show-and-hide-password/100/show_hide_password-08-512.png" width="3%" height="5%" height="1em" padding="5%" style="margin-left: -11%;display:inline; vertical-align: middle" id="tp">
      </div>
      <p id="password-error-tooltip" class="error-tooltip"></p>
 <br>
      <p class="p">Forgot password ? <a href="ForgotPass.php"  >click here</a>
    <div><div>
    <button id="btnFetch" type="submit"  value="submit" name="submit"  class="button-submit">
      Sign In</button>
    <p class="p">If your new Employee then Register here ? <a href="EmployeeRegister.php"  > Sign Up</a>
</button>
<script>
$(document).ready(function() {
    $("#btnFetch").click(function() {
     
      $(this).prop("disabled", true);
     
      $(this).html(
        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><i class="fa fa-spinner fa-spin" style="font-size:24px"></i>Loading...`
      );
    });
});
  </script>
<!-- 
<button type="button" id="btnFetch" class="btn btn-primary mb-2">Submit</button> -->
</form>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>



const togglePassword = document.querySelector('#tp'); 
  const password = document.querySelector('#pas'); 
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

    $(document).ready(function() {
 
$("#em").on("input", function(){
              jqemail();  
        }); 
        $("#pas").on("input", function(){
              jqpassword1();  
        });
    });
    function jqemail() {
        var name = $("#em").val();
        var a = /^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]+$/;

        if (!name.match(a)) {
            if (name === "")
            showErrorTooltip("Field can't be empty!!!","email-error-tooltip");
            else
            showErrorTooltip("Enter a valid email address!!!", "email-error-tooltip");
        } else {
         
            hideErrorTooltip("email-error-tooltip");
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
            // Do something when the password is valid
            hideErrorTooltip("password-error-tooltip");
        }
    }


  
</script>

</html>