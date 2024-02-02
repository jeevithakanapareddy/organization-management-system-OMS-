<?php

$imageURL = $_SESSION['img'];
$employId = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 <style>

header{
  top:0rem;
  z-index:100;
  /* background-size: 100% 100%; */
  position: sticky;
  justify-content: flex-end;
 
  background-color: black;
  /* width: fit-content;
block-size: fit-content; */
}

nav.navbar {
width: 100%;
}
  footer {
    bottom: 0;
    background-color: black;
    color: white;
    position: fixed;
    padding: -50px;
    width: 100%;
    text-align: right;
    justify-content: flex-end;
    margin-left: -0.18400000%;
    display:block;
}


.profilee{
  
  /* border-radius: 20%; */
  /* justify-content: flex-end;  */
  margin-left:5 rem; 
  
   padding-top: 1rem;
  
  }
  .pname{
    white-space: nowrap; /* Prevent text from wrapping */
  
    padding-left:-9%;
    margin-right:3.6rem; 
    color:DeepSkyBlue;
    margin-left:5rem;
    /* text-align:left; */
    padding-top: 2rem;
    /* padding-bottom: 3rem; */
    justify-content: flex-end; 
  }
  #profile-image {
              max-width: 100px;
              height: 72px;
           
          }
          .profile{
    margin-right:1%;
    /* width: 150px; */
              border-radius: 50%;
              z-index:500;
              /* overflow: hidden; */
  }
  .profile-container {
      /* position: relative; */
      position: sticky;
      display: inline-block;
      z-index:50;
  }
  
  .dropdown-content {
      display: none;
      position: absolute;
      background-color: black;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index:1000;
  }
  
  .dropdown-content a {
      padding: 12px 16px;
      display: block;
      text-decoration: none;
      color: white;
    
  }
  
  .dropdown-content a:hover {
      background-color:DeepSkyBlue;
  }
  
  .show {
      display: block;
  }
  </style>
 
  </body>
</html>
    
    <title>Document</title>
</head>
<body>
  <header>
<!-- class="navbar navbar-dark bg-dark"
class="navbar navbar-expand-lg navbar-light bg-light" -->
<nav class="navbar navbar-expand-lg navbar navbar-dark black">
  <!-- img -->
<img alt="Image" style="margin-left:1rem" width="169" height="59" src="https://images.miraclesoft.com/careers/footer/miracle-logo-white.png">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>




  <!-- <a class="active" href="homepage.php"><i class="fa fa-fw fa-home"></i> Home</a> 
  <a href="EmployeeView.php"><i class="fa fa-address-book-o"></i> View</a> 
   <a href="ProfileEdit.php"><i class="fa fa-edit"></i> Update</a>  -->






  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    
    <li class="nav-item ">

    </li>
    
    <li class="nav-item active">
        
        <a class="nav-link" href="homepage.php"><i class="fa fa-fw fa-home"></i>Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="EmployeeView.php"><i class="fa fa-address-book-o"></i> View<span class="sr-only">(current)</span></a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="ProfileEditbo.php"><i class="fa fa-edit"></i> Update<span class="sr-only">(current)</span></a>
      </li> -->

      

   
    </ul>
    <form class="form-inline my-2 my-lg-0">

    <div class="profilee"> 
  <?php
    // if (!empty($imageURL)) {
                            
    //   $imageData = base64_decode($imageURL);
    //   $imageType = "data:image/png;base64,"; 
    //   echo '<img style="max-width:100px;height:72px; id="profile-image" src="' . $imageType . base64_encode($imageData) .'" alt="Profile Image">';
    // }

    if (!empty($imageURL)) {
      $imageData = base64_decode($imageURL);
      $imageType = "data:image/png;base64,";
      echo '<div class="profile-container">';
      echo '<img style="max-width:80px; height: 62px;border-radius:50px;" id="profile-image" class="profile-image" src="' . $imageType . base64_encode($imageData) . '" alt="Profile Image">';
      echo '<div class="dropdown-content" id="myDropdown">';
      // echo '<a href="EmpProfileAll.php?empId=' . $employId . '">Profile</a>';
      echo '<a href="Profilebo.php"><i class="fa fa-fw fa-user"></i> Profile</a>';
      echo '<a href="Rpast.php"><i class="fa fa-pencil"></i>Change Password</a>';
      echo '<a href="logout.php"><i class="fa fa-power-off"></i> Logout</a>';
      echo '</div>';
      echo '</div>';
      } else {
      echo 'No image available';
      }
   
  ?>
</div>
<div class="pname"> 
  <?php
$Name = $_SESSION['id'];
// echo '<script> alert("' . $Name . '"); </script>';

if (!empty($Name)) {
                             
    //  echo '<p>' . htmlspecialchars($Name) . '  </p>';
     echo '<h3 style="font-family:serif;">' . $Name . '  </h3>';

 }
 ?> 
</div>
</header>
<div class="foot">
<footer>
        <p> © <span id="currentYear"></span> Miracle Software Systems, Inc.</p>
<script>
  document.getElementById('currentYear').innerHTML = new Date().getFullYear();
</script>

</footer>  
</div>
    </form>
  </div>
</nav>
<script>
document.addEventListener("DOMContentLoaded", function() {
const profileImage = document.querySelector('.profile-image');
const dropdown = document.querySelector('.dropdown-content');

profileImage.addEventListener('click', function() {
dropdown.classList.toggle('show');
});

window.addEventListener('click', function(event) {
if (!event.target.matches('.profile-image')) {
if (dropdown.classList.contains('show')) {
dropdown.classList.remove('show');
}
}
});
});
</script>
</body>
</html>