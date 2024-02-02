<?php
 include "UrlConfig.php";
if (isset($_POST['submit'])) {

    $email = $_POST['em'];
    $password = $_POST['pas'];

    $url = $urlPath .'login'; 
     
    $data = [

        'email' => $email,
        'password' => $password
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
    
   
    $data = json_decode($response, true); 
    
    if (!empty($data) && isset($data['data']) && count($data['data']) > 0 &&isset($data['token'])) {
         

        $user = $data['data'][0];
    
        $empid=$user['empID'];
        $imageURL = $user['image'];
        
        $profileName = $user['firstName'] . ' ' . $user['lastName'];
      
       $email=$user['email'];



// $tokenParts = explode('.', $jwt_token);
// $payloadEncoded = $tokenParts[1];
// $payload = base64_decode($payloadEncoded);
// $decodedPayload = json_decode($payload, true);
// $firstName = $decodedPayload['firstName'];
// $lastName = $decodedPayload['lastName'];
// $email=$decodedPayload['email'];
// // $image = $decodedPayload['image'];
// $profileName = $firstName . ' ' . $lastName;
// $empid = $decodedPayload['empID'];

    //    echo "<script>";
    //    echo "alert('token is :'. $token .);";
    //    echo "</script>";
    //    echo $token;

    }
        //------------------------------------------------
     
        // $ch = curl_init($url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // $response = curl_exec($ch);
        // $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        // curl_close($ch);
        
        // if ($httpCode == 200) {
           
        //     $headers = get_headers($url, 1);
        //     $token = $headers['Authorization'];
        //     echo "Token: " . $token;
        // } else {
        //     echo "Failed to generate token. HTTP Code: " . $httpCode;
        // }

        
// try {

// $tokenParts = explode('.', $jwt_token);
// $payloadEncoded = $tokenParts[1];
// $payload = base64_decode($payloadEncoded);
// $decodedPayload = json_decode($payload, true);
// $firstName = $decodedPayload['firstName'];
// $lastName = $decodedPayload['lastName'];
// $image = $decodedPayload['image'];
// $employId = $decodedPayload['employId'];
// // $password = $decodedPayload['password'];
// $passKey = $decodedPayload['passKey'];
// $_SESSION['firstName'] = $firstName;
// $_SESSION['lastName'] = $lastName;
// $_SESSION['image'] = $image;
// $_SESSION['employId'] = $employId;
// $_SESSION['passKey'] = $passKey;
// } catch (\Exception $e) {
// echo 'Error: ' . $e->getMessage();
// }





        //---------------------------------------------------

        if ($responseData['success']) {
            $token = $responseData['token'];

            echo "<script>";
            echo "alert('Token is: " . $token . "');";
            echo "</script>";
           
            
            session_start();
            $_SESSION['email'] = $empid;
            $_SESSION['em']=$email;
            $_SESSION['id']=$profileName;
            $_SESSION['img']=$imageURL;
            $_SESSION['pass']= $password ;
            $_SESSION['token']=$token;
           
            // header('Location: homepage.php?status=success&tokenm=$token');
            header("Location: homepage.php?status=success");

            } else {
                // Failed login

                
               
                $errorMessage = urlencode($responseData['message']);
                echo "<script>";
                echo "window.location.href='index.php?status=error';";
                echo "</script>";
                // header("Location: loginpage.php?status=error");
                exit();
            }
    } else {
        header('Location:loginpage.php'); 
        
       
    }
     
?>










  



