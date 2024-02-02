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
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script  src="validation.js"></script>  
</head>
<style>
    .register-body{
       margin-left:30%;
       margin-top:1%;
       margin-right:10%;
       padding:2%;
       color:black;
       background-color:white;
       width:45%;
       position: fixed;
    }
    .row{
       width:60rem;
       padding:5px;
       
      
    }
    body {
         /* background-image: url('https://hubble.miraclesoft.com/assets/img/bg-login.jpg');
         background-repeat: no-repeat;
         background-attachment: fixed;
         background-size: 100% 100%; */
         background-color:white;
      }
      label{
        color:brown;
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
/* .sub-buttons{
  margin-left:50%;
  margin-right:30%;
} */

.alert-1{
  margin-left:1px;
  margin-right:2px;
}

/* @media only screen and (min-width: 850px) and (max-width: 1250px) {
    .tp {
        width: 13%;
        height: 30%;
        margin-left: 76%;
        margin-top: -31%;
        display: inline;
        vertical-align: middle;
    }

    .row {
        width: 10rem; /* Adjust the value as needed 
        padding: 5px;
    }
} 
*/
@media only screen and (min-width:170px) and (max-width:1190px){

  /* h1{
    text-align:center;
    font-size:30px;
   
  }
  label{
    font-size:30px;
  }
   */

    .register-body{
       /* margin-left:25%;
       margin-top:3%;
       margin-right:10%;
       padding:2%; */
       color:brown;
       font-size:30px;
       /* overflow: scroll; */
       /* background-color:black; */
    }
  
}



</style>
<body>
       <h1 style="color:DeepSkyBlue; margin-top: 2rem; margin-left:30%;"> Employee Registration form</h1>
    <div class="register-body">
      <form id="form1"  method="POST" action="emp.php" onsubmit="return sub()" enctype="multipart/form-data">
<div id="div-alert" class="alert-1"></div>
    <div class="row">
        <div class="col-md-3 col-xs-6"> 
            <label>First name</label>
            </div>
        <div class="col-md-3 col-xs-6">
          <input type="text" id="fname" name="fname" class="form-control" placeholder="First name" aria-label="First name">
          <div id="fname-error-tooltip" class="error-tooltip"></div>
          <script>
       $(document).ready(function () {
    $("#fname").on("input", function() {
      //this.value = this.value.toUpperCase(); --->total
      var firstName = $(this).val();
      var fname = firstName.charAt(0).toUpperCase() + firstName.slice(1).toLowerCase();
      $(this).val(fname);
    });
  });

</script>


        </div>
        <div class="col-md-3 col-xs-6">
        </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-xs-6"> 
                <label>Last name</label>
                </div>
        <div class="col-md-3 col-xs-6">
          <input type="text" id="lname" name="lname" class="form-control" placeholder="Last name" aria-label="Last name">
          <div id="lname-error-tooltip" class="error-tooltip"></div>
          <script>
       $(document).ready(function () {
    $("#lname").on("input", function() {
      //this.value = this.value.toUpperCase(); --->total
      var lastName = $(this).val();
      var lname = lastName.charAt(0).toUpperCase() + lastName.slice(1).toLowerCase();
      $(this).val(lname);
    });
  });

</script>
        </div>
        <div class="col-md-3 col-xs-6">
        </div>
        
      </div> 


      <div class="row">
        <div class="col-md-3 col-xs-6"> 
            <label>Phone Number</label>
            </div>
        <div class="col-md-3 col-xs-6">
          <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone Number" aria-label="First name">
          <div id="phone-error-tooltip" class="error-tooltip"></div>
        </div>
        <div class="col-md-3 col-xs-6">
        </div>
        </div>
        
      <div class="row">
        <div class="col-md-3 col-xs-6"> 
            <label>Email</label>
            </div>
        <div class="col-md-3 col-xs-6">
          <input type="text" id="em" name="em" class="form-control" placeholder="Email" aria-label="Last name">
          <div id="email-error-tooltip" class="error-tooltip"></div>
        </div>
        <div class="col-md-3 col-xs-6">
        </div>
      </div>




      <div class="row">
        <div class="col-md-3 col-xs-6"> 
            <label>Password</label>
            </div>
        <div class="col-md-3 col-xs-6">
          <input type="password" id="pas" name="pas" class="form-control" placeholder="Password" aria-label="First name">
     <img src="https://cdn3.iconfinder.com/data/icons/show-and-hide-password/100/show_hide_password-08-512.png" width="13%" height="60%" style="margin-left:86%; margin-top: -36%;display:inline; vertical-align: middle" id="tp">
          <div id="password-error-tooltip" class="error-tooltip"></div>

        </div>
        <div class="col-md-3 col-xs-6">
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-3 col-xs-6"> 
            <label>Date Of Birth</label>
            </div>
        <div class="col-md-3 col-xs-6">
          <input type="date" id="db" name="db" class="form-control" placeholder="" aria-label="Last name">
          <div id="dob-error-tooltip" class="error-tooltip"></div>
        </div>
        <div class="col-md-3 col-xs-6">
        </div>
      </div>

      <div class="row">
        <div class="col-md-3 col-xs-6"> 
            <label>File</label>
            </div>
            <div class="col-md-3 col-xs-6">
    <div class="mb-3">
         <input class="form-control" type="file" id="image" name="image" accept="image/*">
    </div>
    
</div>
<div class="col-md-3 col-xs-6">
</div>
</div> 
      <div class="row">
       
        <div class="col-md-3 col-xs-6">
            <label>Gender : </label>
        </div>
        <div class="col-md-3 col-xs-6">
            <input type="radio" id="g1" name="sj" value="female" onblur="jqgender1()" >female</input>
    
        <!-- <div class="col"> -->
            <input type="radio" id="g" name="sj" value="male"  onblur="jqgender1()" >male</input>     
            <div id="gender-error-tooltip" class="error-tooltip"></div>
      </div> 
      
 <div class="col-md-3 col-xs-6"></div>
     
    </div>


<div class="row">
    <div class="col-md-3 col-xs-6"> 
    <label>Skills:</label>
    </div>
    <div class="col">
        <input type="checkbox" id="ip1" name="skills[]" value="Java"  onchange="jqskills1()">Java </input>
    <!-- </div> -->
    <!-- <div class="col"> -->
        <input type="checkbox" id="ip2" name="skills[]" value="SQL" onchange="jqskills1()">SQL</input>
    <!-- </div> -->

    <!-- <div class="col"> -->
                  <input type="checkbox" id="ip3" name="skills[]" value="Springboot"onchange="jqskills1()">Springboot</input>
                  <!-- <div class="col"> -->
                  <input type="checkbox" id="ip4" name="skills[]" value="HTML"onchange="jqskills1()">HTML</input>
                <!-- </div>  -->
                <div id="skills-error-tooltip" class="error-tooltip"></div>
 </div>    

 <div class="col"></div>
  
   
<div class="row"> 
<div class="col">
<div id="recaptcha-error-tooltip" class="error-tooltip"></div>
<div class="g-recaptcha" id="recaptcha" name="recaptcha"  data-sitekey="6Lc2El0pAAAAAG_cyzTCreudbBj8KdfspUcsHa34"></div>
</div>
</div>
      </div class="sub-buttons"> 
<div class="row">


<div class="col">
<button class="btn btn-info"><a href="index.php" style="color:white">Back</a></button>
      <!-- <button type="button" class="btn btn-info" formaction="index.php" style="color:white">Back</button> -->


      <button type="button" class="btn btn-info" onclick="resetErrors()">Reset</button>

     
      <button type="submit" class="btn btn-info" >Submit</button>
      
</div>
<div class="col"></div>
 </div>
 


</div>
</div>
</form>
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
         
 $(document).ready(function () {


$("#fname").on("input", function() {
     jqflname();
});

$("#em").on("input", function(){
              jqemail1();  
        }); 
$("#db").on("input", function() {
    jqdateofbirth();
        });        
$("#lname").on("input", function(){
              jqlname1();  
        });     
// $("#lname").on("input", function(){
//               jqlname1();  
//         });   
$("#phone").on("input", function(){
              jqphoneno();  
        }); 
 $("#pas").on("input", function(){
          jqpassword1();  
        }); 
   

    });

    function sub(){

jqflname();
jqlname1();
jqdateofbirth();
jqgender1();
jqskills1();
jqpassword1();
jqphoneno();
jqemail1();

if(str.includes("a") && str.includes("b") && str.includes("c") && str.includes("d") && str.includes("e") && str.includes("f") && str.includes("g")){
return true;
}else{

 alert1(); 
// alert("check Displayed Error fields")
return false;
}}


function resetErrors() {
    $(".error-tooltip").hide(); 
    $("#fname, #lname, #phone, #pas, #em, #db, #sj, #skills").val("");
  }
  
  function alert1() {
    var hideDelay = 2000;
    window.scrollTo(0, 0);
    var alertDiv = document.createElement("div");
    alertDiv.className = "alert alert-danger";
    var strongElement = document.createElement("strong");
    strongElement.textContent = "Danger!";
    var messageTextNode = document.createTextNode(" Check displayed error fields.");
    alertDiv.appendChild(strongElement);
    alertDiv.appendChild(messageTextNode);
    document.getElementById("div-alert").appendChild(alertDiv);
    setTimeout(function () {
        alertDiv.remove();
    }, hideDelay);
}


  
      </script>
</body>
</html>
