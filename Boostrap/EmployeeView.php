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
echo " transform: translateX(-50%);";
echo " z-index: 1050;";
echo " }";
echo "</style>";



    echo '<div class="alert alert-success custom-alert" role="alert">';
    echo 'updation successful!...';
    echo '</div>';
   
    echo '<script>
            setTimeout(function(){
                window.location.href = "EmployeeView.php";
            }, 2000); // 2000 milliseconds = 2 seconds
          </script>';
}
?>

<?php 

 $empid=$_SESSION['email'] ;
 $token=$_SESSION['token'];
// if(isset($empid)){
 
$url = $urlPath.'employees';
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Authorization:'. $token,
)); 
  
  $response = curl_exec($ch);
  
  if (curl_errno($ch)) {
  echo "Error: " . curl_error($ch);
  } else {
      echo '<script>';
      echo 'var empdata = ' . json_encode(json_decode($response, true)) . ';';
      echo '</script>';
  }

 
// else{
//   $errorMessage = "login first to access this page!!!";
//   //  echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'>";
//   //  echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js'></script>";
//   //  echo "<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js'></script>";


//   //  <div class="alert alert-warning">
//   //   <strong>Warning!</strong> This alert box could indicate a warning that might need attention.
//   // </div>
//   echo "<script>";
//   echo "alert('Login failed. Please try again: $errorMessage');";
//   echo "window.location.href='loginpage.php?message=$errorMessage';";
//   echo "</script>";




// }
?>

<!DOCTYPE html>
<html>
<head>
 <style>

body {
       
         background-image: url('https://hubble.miraclesoft.com/assets/img/bg-login.jpg');
         background-repeat: no-repeat;
         background-attachment: fixed;
         background-size: 100% 100%;
      } 
table {
  /* text-align:right; */
  margin-top: 4rem;
  position:center;
  border-collapse:collapse; 
  border-spacing: 01px; 
  width:100%;
  background:white;
  /* position:absolute; */
  text-align:center;
  left:0%;
}
th {
    background-color:darkblue;
    color: white;

    text-size-adjust: 20px;
    font-style: oblique;
    font-size:120%;
  }
  th, td {
        border: transparent;
        text-align: left;
        padding: 12px;
      }
  td {
    border: transparent;
    text-align: left;
    padding: 10px;
    font-style: inherit;
    font-size:110%;
  }
  
  tr {
      border:transparent;
  }
      tr:nth-child(even) {
          background-color: #f2f2f2;
      }

      @media only screen and (min-width:350px) and (max-width:545){
         
        header{
          /* width:100%;
          position:fixed; */
          position: sticky;
          width: fit-content;
block-size: fit-content;
        }
        table{
          overflow:scroll;
        }
      }
    </style>
</head>
    <body style="background-color: white"><center>
      <form  method="POST"  >
       <!-- <h2 style="color:DeepSkyBlue; margin-left:30%;margin-top: 5rem;">Employee Data</h2>  -->
   
 <table>
    <thead>
        <tr>
          <th></th>
            <th>Empid</th>
            <th>firstname</th>
            <th>lastName</th>
            <th>skills</th>
            <!-- <th></th>
            <th></th> -->
        </tr>
    </thead>
 <tbody id="body">
   
 </tbody>
 </table>

       <script>
         var data = empdata.data;
        Object.values(data).forEach(user => {
                const markup = `<tr  onclick="navigateToEditPage(${user.empID})" >
                <td></td>
                               <td>${user.empID}</td>
                               <td>${user.firstName}</td>
                               <td>${user.lastName}</td>
                               <td>${user.skills}</td>

                               </tr>`
                document.querySelector('tbody').insertAdjacentHTML("beforeend", markup); 
            }); 
                                           
function navigateToEditPage(empID) {
 window.location.href = `ProfileAllbo.php?empId=${empID}`;
 }
 //  <td><button type="submit" formaction="EmployProfile.php?empId=${user.empID}">View</button></td>
       </script>
        </form>
    </body></center>
</html>