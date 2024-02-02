<?php 
 session_start();
 $empId=$_SESSION['email'] ;
   include "menuPractice.php";
   include "UrlConfig.php";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<style>

body {
         background-image: url('https://hubble.miraclesoft.com/assets/img/bg-login.jpg');
         background-repeat: no-repeat;
         background-attachment: fixed;
         background-size: 100% 100%;
         background-color: #f4f4f4; 
         margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
      }
.body-1{

margin-left: 35%;;
margin-top: 10%;; 

}
    @media only screen and (min-width:320px) and (max-width:950px){
.body-1{

   margin-left:12%;
   margin-right:20%;
   margin-top: 10%;

}


.mb-3{
  max-width:340px;
  height:460px;
  
}
.no-gutters{
overflow: scroll;
}
    }
/* @media only screen and (min-width:320px) and (max-width:813px){
      .profile-image{
        max-width:40%; 
        height: 20%; 

      }
.body-1{

   margin-left:15%;
   margin-right:10%;
   margin-top: 10%;
  
}
.mb-3{
  max-width:340px;
  height:560px;
  
}
.no-gutters{
  overflow:scroll;
}
} */

</style>
<body>
    <div class="body-1">
<div class="card mb-3" style="max-width: 640px;">
  <div class="row no-gutters">
    <div class="col-md-4">
    <?php
                            if (!empty($imageURL)) {
                            
                              $imageData = base64_decode($imageURL);
                              $imageType = "data:image/png;base64,"; 
                              echo '<img style="max-width:70%; height: 60%;" id="profile-image" src="' . $imageType . base64_encode($imageData) . '" alt="Profile Image">';
                          } else {
                              echo 'No image available';
                          }
                            ?>
                            
                            <br>

Employee Id:<label id="emp" ></label><br>

<i style="font-size:24px" class="fa">&#xf095;</i>  <label id="phone" ></label>  
    </div>
    <div class="col-md-8">
      <div class="card-body">
      <a style="margin-left:80%;" class="nav-link" href="ProfileEditbo.php"><i class="fa fa-edit" style="font-size:36px; color:blue;" ></i><span class="sr-only"></span></a>
        <h5 class="card-title" id="pname" ></h5> 
       
        <br>
         Date of Birth: <label id="db" ></label><br>
         <i class="fa fa-envelope" style="font-size:24px"></i> <label id="em" ></label><br>
     
        gender:  <input type="radio" id="female" name="sj" value="female" disabled>female</input>
              <input type="radio" id="male" name="sj"value="male" disabled >male</input><br><br>
      
        Skills:  <input type="checkbox"  id="Java" name="skills[]" value="Java" disabled >Java </input>
               <input type="checkbox" id="SQL" name="skills[]" value="SQL"  disabled >SQL</input>
               <input type="checkbox" id="Springboot"  name="skills[]" value="Springboot" disabled>Springboot</input>
               <input type="checkbox" id="HTML" name="skills[]" value="HTML" disabled >HTML</input>
             
      </div>
    </div>
  </div>
</div> 
                        </div>
<script> 
document.getElementById("emp").innerHTML=<?= json_encode($empid); ?>;
document.getElementById("pname").innerHTML=<?= json_encode($profileName); ?>;

document.getElementById("db").innerHTML=<?= json_encode($dob); ?>;
document.getElementById("phone").innerHTML=<?= json_encode($phone); ?>;
document.getElementById("em").innerHTML=<?= json_encode($email); ?>;
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
            
</script>

</body>
</html>