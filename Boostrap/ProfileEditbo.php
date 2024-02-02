<?php 
 session_start();
 include "menuPractice.php";
 include "UrlConfig.php";
 $status = isset($_GET['status']) ? $_GET['status'] : '';
 if ($status === 'success') {
 echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'>";
 echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js'></script>";
 echo "<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js'></script>";
 
 echo "<style>";
 echo " .custom-alert {";
 echo " position: fixed;";
 echo " top:20%;";
 echo " left: 50%;";
  echo " width: 100%;";
 echo " width:75%;"; 
 echo " height: 60px;"; // Set the desired height
 echo " text-align: center;";
 echo "font-size: 20px;";
 echo " transform: translateX(-50%);";
 echo " z-index: 1050;";
 echo " }";
 echo "</style>";
 
 
 
     echo '<div class="alert alert-success custom-alert" role="alert">';
     echo 'updation successful!...';
     echo '</div>';
    
     echo '<script>
             setTimeout(function(){
                 window.location.href = "ProfileEditbo.php";
             }, 1000); // 2000 milliseconds = 1 seconds
           </script>';
 }
 ?>

<?php

 $empId=$_SESSION['email'] ;

   $url = $urlPath."employee/$empId";
   $ch = curl_init($url); 
   $token=$_SESSION['token'];
   curl_setopt($ch, CURLOPT_URL, $url);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); 
   curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Authorization:'. $token,
)); 
   $response = curl_exec($ch);
   if (curl_errno($ch)) {
       echo "Error: " . curl_error($ch);
       return;
   }
   curl_close($ch);
   $data = json_decode($response, true); 
   
   if (!empty($data) && isset($data['data']) && count($data['data']) > 0) {
   
       $user = $data['data'][0];
   
       $empid=$user['empID'];
       $firstName=$user['firstName'];
       $lastName=$user['lastName'];
       $phone=$user['phoneno'];
       $email=$user['email'];
       $gender=$user['gender'];
       $dob=$user['dateOfBirth'];
       $skills=$user['skills'];
       $imageURL = $user['image'];
       $profileName = $user['firstName'] . ' ' . $user['lastName'];
   
   
   } 
?>

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
    <script  src="ProfileEdit_Validations.js"></script>  
    <title>ProfileEdit</title>
</head>
<style>

body {
         background-image: url('https://hubble.miraclesoft.com/assets/img/bg-login.jpg');
         background-repeat: no-repeat;
         background-attachment: fixed;
         background-size: 100% 100%;
         background-color: #f4f4f4; 
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
.edit{
   margin-top:5%;
   margin-left:25%;
   margin-right:25%;
   padding-left:2%;
}

@media only screen and (min-width:250px) and (max-width:945px) {
 


/* .card mb-3{
    max-width: 640px;
    height:360px;
    width: fit-content;
  block-size: fit-content; 
} */
/* 
.card mb-3{
  max-width: 640px;
    height:360px;
overflow: scroll;
min-width: 80vw;
margin-left: -51px;
} */

.no-gutters{
  overflow: scroll;
}

}
    </style>
<body>
<form  id="form1" method="post" action="EmpUpdate(new+).php" enctype="multipart/form-data">  
<div class="edit">
<div class="card mb-3" style="max-width: 740px;height:490px;">

  <div class="row no-gutters">
    <div class="col-md-4">

    
    <?php

                   if (!empty($imageURL)) {
                              
                              $imageData = base64_decode($imageURL);
                              $imageType = "data:image/png;base64,"; 
                              echo '<img style="max-width:40%; height: 30%;" id="profile-image1" src="' . $imageType . base64_encode($imageData) . '" alt="Profile Image">';
                          } else {
                              echo 'No image available';
                          }
                            ?>
     <br>
      <div class="mb-3">
         <input class="form-control"  type="file" id="image" name="image" accept="image/*" onchange="displaySelectedImage()" >       
<script>
function displaySelectedImage() {
    var input = document.getElementById('image');
    var img = document.getElementById('profile-image1');
    // Check if a file is selected
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
        // Display the selected image
        img.src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

    </div><br>
     
       <i class="fa fa-phone" style="font-size:24px"></i> Phone Number <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone Number" >
       <div id="phone-error-tooltip" class="error-tooltip"></div><br>
       <i class="fa fa-envelope" style="font-size:24px"></i>Email <input type="text" id="em" name="em" class="form-control" placeholder="Email" aria-label="Last name">
          <div id="email-error-tooltip" class="error-tooltip"></div> 
    
    </div>
    <div class="col-xs-6 col-md-8">
      <div class="card-body">
      <br>
      <div class="row">
        <div class="col-xs-6 col-md-4"> 
        Employe ID: <label  id="emp" name="emp" ></label>
</div></div><br>
      <div class="row">
        <div class="col-xs-6 col-md-4"> 
            <label>First name</label>
</div>
<div class="col-xs-6 "> 
<input type="text" id="fname" name="fname" class="form-control" placeholder="First name" aria-label="First name">
          <div id="fname-error-tooltip" class="error-tooltip"></div>
       </div>
</div><br>

<div class="row">
        <div class="col-xs-6 col-md-4"> 
        
          <label>Last name</label>
</div>
                
               
<div class="col-xs-6 "> 
          <input type="text" id="lname" name="lname" class="form-control" placeholder="Last name" aria-label="Last name">
          <div id="lname-error-tooltip" class="error-tooltip"></div>
        
       
        
      </div> 
</div>


<br>
<div class="row">
        <div class=" col-xs-6 col-md-4"> 
            <label>Date Of Birth</label>
</div>
<div class="col-xs-6 "> 
<input type="date" id="db" name="db" class="form-control" placeholder="" aria-label="Last name">
          <div id="dob-error-tooltip" class="error-tooltip"></div>
       </div>
</div>
<br>
<div class="row">
        <div class="col-xs-6 col-md-4"> 
      
          <label>Gender</label>
</div>
<div class="col-xs-6 col-md-4"> 
<!-- <input type="radio" id="g1" name="sj" value="female" onblur="jqgender1()" >female</input> -->
<input type="radio" id="female" name="sj" value="female" >female</input>
              <!-- <input type="radio" id="male" name="sj"value="male" disabled >male</input> -->

        <!-- <input type="radio" id="g" name="sj" value="male"  onblur="jqgender1()" >male</input>      -->
        <input type="radio" id="male" name="sj"value="male" >male</input>
        <div id="gender-error-tooltip" class="error-tooltip"></div>
  </div> 
        
       
        
      </div> 

<br>
<div class="row">
  
<div class="col-xs-6 col-md-4">  
<label>Skills</label>
</div>
 <div class="col-xs-6 col-md-4">
 <input type="checkbox" id="Java" name="skills[]" value="Java"   onchange="jqskills1()">Java </input><br>
 <input type="checkbox" id="SQL" name="skills[]" value="SQL"  onchange="jqskills1()">SQL</input><br>
 <input type="checkbox" id="Springboot" name="skills[]" value="Springboot" onchange="jqskills1()">Springboot</input><br>
 <input type="checkbox" id="HTML" name="skills[]" value="HTML"  onchange="jqskills1()">HTML</input>
        <div id="skills-error-tooltip" class="error-tooltip"></div>
<!-- 

         
        Skills:  <input type="checkbox"  id="Java" name="skills" value="Java" disabled >Java </input>
               <input type="checkbox" id="SQL" name="skills" value="SQL"  disabled >SQL</input>
               <input type="checkbox" id="Springboot"  name="skills" value="Springboot" disabled>Springboot</input>
               <input type="checkbox" id="HTML" name="skills" value="HTML" disabled >HTML</input> -->
 </div>
 <div class="col-xs-6 col-md-4">

 </div>
 <input type="submit"  id="bFetch" class="btn btn-info" value="Update" ></input>

    
      </div><br>
      <div class="row">
      <div class="col-xs-6 col-md-4"></div>
      <div class="col-xs-6 col-md-4"></div>
        <div class="col-xs-6 col-md-4">
        <!-- <input type="submit" value="Update" ></input> -->

        <!-- <input type="submit"  class="btn btn-info" value="Update" ></input> -->
      <!-- <button type="submit" class="btn btn-info">Update</button> -->
</div>
</div>
    </div>
  </div>

  
</div>
</div>
</form>


<script>
            
document.getElementById("emp").innerHTML=<?= json_encode($empid); ?>;
document.getElementById("fname").value=<?= json_encode($firstName); ?>;
document.getElementById("lname").value=<?= json_encode($lastName); ?>;
document.getElementById("db").value=<?= json_encode($dob); ?>;
document.getElementById("phone").value=<?= json_encode($phone); ?>;
document.getElementById("em").value=<?= json_encode($email); ?>;
const gender1=<?= json_encode($gender); ?>;
document.getElementById(`${gender1}`).checked=true;


const skillsData=<?= json_encode($skills); ?>;
console.log(skillsData);
             const skillsArray=skillsData.split(",")
          
            for(const Data of skillsArray){
               const checkbox=document.getElementById(Data);
               
             if(checkbox){
                  checkbox.checked=true;
               }
            }

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
$("#lname").on("input", function(){
              jqlname1();  
        });   
$("#phone").on("input", function(){
              jqphoneno();  
        }); 
 $("#pas").on("input", function(){
          jqpassword1();  
        }); 
 $("#sj").on("input", function(){
          jqpassword1();  
        });  

    });





    function disableUpdateButton() {
        document.getElementById("bFetch").disabled = true;
    }
    disableUpdateButton();

    function enableUpdateButton() {
        document.getElementById("bFetch").disabled = false;
    }
    document.getElementById("fname").addEventListener("input", enableUpdateButton);
    document.getElementById("lname").addEventListener("input", enableUpdateButton);
    document.getElementById("db").addEventListener("change", enableUpdateButton);
    document.getElementById("phone").addEventListener("input", enableUpdateButton);
    document.getElementById("em").addEventListener("input", enableUpdateButton);
    document.getElementById("image").addEventListener("input", enableUpdateButton);
    document.querySelectorAll("[name='sj']").forEach(radioButton => {
        radioButton.addEventListener("change", enableUpdateButton);
    });
    document.querySelectorAll("[name='skills[]']").forEach(checkbox => {
        checkbox.addEventListener("change", enableUpdateButton);
    });


 
    </script>
</body>
</html>