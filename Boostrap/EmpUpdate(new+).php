<?php 
session_start();
?>
<?php
 include "UrlConfig.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$email = $_POST['em'];
$phone=$_POST['phone'];
// $emp=$_POST['emp'];
$emp=$_SESSION['email'] ;
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$dob=$_POST['db'];
$gender = isset($_POST['sj']) ? $_POST['sj'] : '';
$skillsArray = isset($_POST['skills']) ? (array)$_POST['skills'] : [];
$skills = implode(',', $skillsArray);
$imageUrl=$_SESSION['img'];
// print_r($_POST); 


//$image = null;

// if (!empty($_FILES["image"]["tmp_name"])) {
// // If a new image file is uploaded, use it
// $imageData = file_get_contents($_FILES["image"]["tmp_name"]);
// $image = base64_encode($imageData);
// $imageUrl = isset($_SESSION['image_data']) ? $_SESSION['image_data'] : '';
// } elseif (!empty($imageUrl)) {
// // If no new image file is uploaded, and an image URL is provided in the session, retain the existing image
// $image = $imageUrl;
// }
//---------------------------------------------------------------------------->
// if (isset($_FILES["image"]) && $_FILES["image"]["error"] === 0) {
//   $file = $_FILES["image"];
//   $fileName = $file["name"];
//   $fileTmpName = $file["tmp_name"];
//   $fileSize = $file["size"];
//   $fileError = $file["error"];
//   $imageContent = file_get_contents($fileTmpName);
//   echo '<script>alert("File upload suc.");</script>';
// } 
//------------------------------------------------------------------------------->

if (isset($_FILES["image"]) && $_FILES["image"]["error"] === 0) {
  $file = $_FILES["image"];
  $fileTmpName = $file["tmp_name"];
  $imageContent = file_get_contents($fileTmpName);
}
  if(!empty($imageContent)){
    $image=new CurlFile($fileTmpName, $file['type'], $file['name']);
  }else{
    echo "error";
    $imageData = base64_decode($_SESSION['img']);
    $tempFileName = tempnam(sys_get_temp_dir(), 'image');
    file_put_contents($tempFileName, $imageData);
    $image = new CURLFile($tempFileName, 'image/png', 'image.png');
}
  
  
  // else{
  //   $imageData = base64_decode($_SESSION['pic']);
  //   $tempFileName = tempnam(sys_get_temp_dir(), 'image');
  //   file_put_contents($tempFileName, $imageData);
  //   $image = new CURLFile($tempFileName, 'image/png', 'image.png');
  // }
// echo $skills;

$url =$urlPath.'employees';
$data = [
    'firstName' => $fname,
    'lastName' => $lname,
    'dateofBirth' =>$dob,
    'email' => $email,
    'phoneNum' => $phone,
    'gender' => $gender,
    'skills' => $skills,
    'empId' =>$emp,
    // 'file'=>$image
 
  ];

//   $options = [
//     'http' => [
  
 
// 'method' => 'POST',
//         'header' => ['Content-Type: application/json'],
//         'content' => json_encode($data)
//     ]
// ];

// $context = stream_context_create($options);
// $response = file_get_contents($url, false,$context);
// $responseData = json_decode($response, true);
$data['file'] = $image;
    $ch = curl_init($url);
    $token=$_SESSION['token'];
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      'Content-Type: multipart/form-data',
      'Authorization:'. $token
  ));


  
    $response = curl_exec($ch);
    $responseData = json_decode($response, true);

    curl_close($ch);
// Handle Spring API response
if ($responseData['success']) {
    
//ProfileEditbo.php
   header('Location: ProfileEditbo.php?status=success');
    // echo "<script>";
    // echo "alert('updation successful!');";
    // echo "window.location.href='EmployeeView.php';";
    // echo "</script>";
} else {
 $errorMessage = $responseData['message'];


//  header("Location: ProfileEditbo.php?status=error&message=$errorMessage");
   echo "<script>";
   echo "alert('updation failed: $errorMessage ');";
   echo "window.location.href='ProfileEdit.php?message=$errorMessage';";
   echo "</script>";

   exit();
}
} else {

}
  

?>