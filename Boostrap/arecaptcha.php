<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
   
    <title>Document</title>
</head>
<body>
<form id="form1"  method="POST" action="arecaptcha.php" >

<div id="recaptcha-error-tooltip" class="error-tooltip"></div>
<div class="g-recaptcha" id="recaptcha" name="recaptcha"  data-sitekey="6Lc2El0pAAAAAG_cyzTCreudbBj8KdfspUcsHa34"></div>

<button type="submit" class="btn btn-info" >Submit</button>
</form>
</body>
</html>
<?php

$recaptcha_secret_key = "6Lc2El0pAAAAAHeP2dq56fko2qzAY26MfJx2yHgl";
$recaptcha_response = $_POST['g-recaptcha-response'];

// Make a POST request to reCAPTCHA API
$url = "https://www.google.com/recaptcha/api/siteverify";
$data = [
    'secret' => $recaptcha_secret_key,
    'response' => $recaptcha_response,
];

$options = [
    'http' => [
        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        'method' => 'POST',
        'content' => http_build_query($data),
    ],
];

$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);
$json_result = json_decode($result, true);

if ($json_result['success']) {
    echo "captcha worked";
} else {
  
    echo "CAPTCHA validation failed";
}
?>
