<?php include_once 'config.php'?>
<?php

//var_dump($_POST);
if(isset($_POST['gbtoken']) && $_SESSION['gbtoken'] == $_POST['gbtoken']){
    if(isset($_POST['action'])){
        switch($_POST['action']){
            case 'access':  
                $authC = new AuthCotroller;
                $email = $_POST['name'];
                $password = $_POST['pass'];

                $c = new AuthCotroller();
                $c->login($email, $password);
        }
    }
}



/* $c = new AuthCotroller();
 $c->login('crve_19@alu.uabcs.mx',  'A9*27rh6%#271N');
 */
 
class AuthCotroller{


    public function login($email, $password){
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://crud.jonathansoto.mx/api/login',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('email' =>  $email,'password' => $password),
));

$response = curl_exec($curl);
$response = json_decode($response);
curl_close($curl);
//print_r($response);

if(isset($response->code) && $response->code >0){
    $_SESSION['name'] = $response->data->name;
    $_SESSION['id'] = $response->data->id;
    $_SESSION['lastname'] = $response->data->lastname;
    $_SESSION['avatar'] = $response->data->avatar;
    $_SESSION['token'] = $response->data->token;
    
    echo $_SESSION['token'] ;



   header('Location:../products');
    
}else{
    
    header('Location:../index.php');
}
    }
}
?>