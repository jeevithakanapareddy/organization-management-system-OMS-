<?php
//-------------------------------------------------------->
include "UrlConfig.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['g-recaptcha-response'] != "") {
    //secret key ----------------------->
    $secret = '6Lc2El0pAAAAAHeP2dq56fko2qzAY26MfJx2yHgl';
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
    $responseData = json_decode($verifyResponse);
    if ($responseData->success) {
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['db'];
    $email = $_POST['em'];
    $password = $_POST['pas'];
    $phone = $_POST['phone'];
    $gender = isset($_POST['sj']) ? $_POST['sj'] : '';

    $skillsArray = isset($_POST['skills']) ? (array)$_POST['skills'] : [];
    $skills = implode(',', $skillsArray);

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === 0) {
        $file = $_FILES["image"];
        $fileTmpName = $file["tmp_name"];
        $imageContent = file_get_contents($fileTmpName);
    } else {
        echo '<script>alert("File upload failed. Please select a valid image file.");</script>';
        exit();
    }

    $url = $urlPath."employee";

    $postData = [
        'firstName' => $fname,
        'lastName' => $lname,
        'dateofBirth' => $dob,
        'email' => $email,
        'password' => $password,
        'phoneNum' => $phone,
        'gender' => $gender,
        'skills' => $skills,
    ];

    // Create a cURL file object
    $postData['file'] = new CurlFile($fileTmpName, $file['type'], $file['name']);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    $responseData = json_decode($response, true);

    curl_close($ch);

    if ($responseData['success']) {
        $errorMessage = $responseData['message'];
        echo "<script>";
        echo "alert('Registration successful!:$errorMessage');";
        echo "window.location.href='index.php';";
        echo "</script>";
    } else {
        $errorMessage = $responseData['message'];
        echo "<script>";
        echo "alert('Registration failed: $errorMessage');";
        echo "window.history.back();";
        echo "</script>";
    }
}} else {
    echo "Please submit the form";
    echo "<script>";
    echo "alert('please slect the captcha');";
    echo "window.history.back();";
    echo "</script>";
}

// }else{
//     echo "captcha failed to verify"
// }
?>
