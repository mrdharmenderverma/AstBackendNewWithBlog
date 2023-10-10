<?php
    
    $userMail = $_POST['userContact'];

     $params=array(
    'token' => 's6ft8ezw0a5vl2ah',
    'to' => '91'.$userMail,
    'body' => 'Hello, Welcome to Avtar Space Techonology.'
    );
    
    // print_r($params);
    
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.ultramsg.com/instance61324/messages/chat",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_SSL_VERIFYHOST => 0,
      CURLOPT_SSL_VERIFYPEER => 0,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => http_build_query($params),
      CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded"
      ),
    ));
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    
    if ($params) {
        header('Location: ../hire-developer.php');
    } else {
       echo "cURL Error #:" . $err;
    }
    
    curl_close($curl);
    
?>    
    