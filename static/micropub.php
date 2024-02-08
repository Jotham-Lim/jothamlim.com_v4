<?php
// No change until here
if(!empty($_POST)){
    $headers = apache_request_headers();
    $token = $headers['Authorization'];
    $ch = curl_init("https://tokens.indieauth.com/token");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, Array(
         "Content-Type: application/x-www-form-urlencoded"
        ,"Authorization: $token"
    ));
    $response = Array();
    parse_str(curl_exec($ch), $response);
    curl_close($ch);
    
    //Personalize here
    $me = $response['me'];
    $iss = $response['issued_by'];
    $client = $response['client_id'];
    $scope = $response['scope'];
    if(empty($response)){
        header("HTTP/1.1 401 Unauthorized");
        exit;
    }elseif($me != "https://jothamlim.com" || $scope != "post"){
        header("HTTP/1.1 403 Forbidden");
        exit;
    }elseif(empty($_POST['content'])){
        header("HTTP/1.1 400 Bad Request");
        echo "Missing content";
    }else{
        // Keep going
        $fn = "posts/".time().".txt";
        $h = fopen($fn, 'w');
        foreach($_POST as $k => $v){
            $data .= "[$k] => $v<br/>";
        }
        fwrite($h, $data); 
        fclose($h); 
        header("HTTP/1.1 201 Created");
        // Output full URL
        header("Location: https://jothamlim.com/".$fn);
    }
}
?>