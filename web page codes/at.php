<?php
require_once 'util.php';    
function search($latlong,$type) {
$curl= curl_init();
//echo $latlong;
// We POST the data
  //curl_setopt($curl, CURLOPT_GET, 1);
  // Set the url path we want to call
//13.045153,80.191477
//13.072957,80.204464
//13.032809,80.210392
//13.032809,80.210392

//echo 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.$latlong.'&sensor=false&key=AIzaSyBOti4mM-6x9WDnZIjIeyEU21OpBXqWBgw';

//echo 'https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.$latlong.'&radius=500&type='.$type.'&key=AIzaSyCeUrl7gFCnSwD5BXd0dcyFSRGCWjtmYEM';
  curl_setopt($curl, CURLOPT_URL, 'https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.$latlong.'&radius=500&type='.$type.'&key=AIzaSyCeUrl7gFCnSwD5BXd0dcyFSRGCWjtmYEM');
  // Make it so the data coming back is put into a string
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  // Insert the data
  //curl_setopt($curl, CURLOPT_POSTFIELDS, $some_data);

  // You can also bunch the above commands into an array if you choose using: curl_setopt_array

  // Send the request
  $result = curl_exec($curl);
  $json = json_decode($result);
  //  echo sizeof($json);
  $reslt = $json->{'results'};
   $res ="";
  for($k=0;$k<sizeof($reslt) && $k<3;$k++)
      {
      $res = $res.$reslt[$k]->{'name'}.',';

   // echo ($res);
  }
  //echo "$area1, $area2";
  // Free up the resources $curl is using
  curl_close($curl);
  return $res;
}
  //echo $result;
#$rest = search("13.032809,80.210392","hospital");
#echo $rest."<br>";
#$rest = search("13.032809,80.210392","police");
#echo $rest;



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
function sendmail($email){
   
       
        $memail = $email;
        $message = "Gas Has Been Leaked";

        sndMail($memail,$message);
    
}

function sndMail($email,$message) {
$mail = new PHPMailer(); // create a new object

$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "sg2plcpnl0078.prod.sin2.secureserver.net";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "info@iotclouds.in";
$mail->Password = "welcome@123";
$mail->SetFrom("info@iotclouds.in");
$mail->Subject = "EMERGENCY";

foreach($email as $val){
    //echo "sss $val";
	
$mail->AddAddress($val);
}
//if($file!='NILL'){
//$mail->AddEmbeddedImage($file, 'logoimg',$file); // attach file logo.jpg, and later link to it using identfier logoimg
//$mail->Body = "<h1>$message</h1>"
//       ."<img src=\"cid:logoimg\" /></p>";
//$mail->AltBody="$message";
//}else{
    $mail->Body = "<h1>$message</h1>";
//}

$mail->AddAddress($email);

 if(!$mail->Send()) {
    //echo "Mailer Error: " . $mail->ErrorInfo;
    return "ERROR";
 } else {
    //echo "Message has been sent";
    return "OK";
 }
}
function sum($latlong) {
$curl= curl_init();
//echo $latlong;
// We POST the data
  //curl_setopt($curl, CURLOPT_GET, 1);
  // Set the url path we want to call 
//13.045153,80.191477
//13.072957,80.204464
//13.032809,80.210392
//13.032809,80.210392

  curl_setopt($curl, CURLOPT_URL, 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.$latlong.'&sensor=false&key=AIzaSyBOti4mM-6x9WDnZIjIeyEU21OpBXqWBgw');
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

  $result = curl_exec($curl);
  $json = json_decode($result);

  $reslt = $json->{'results'};

  $addcom = $reslt[0]->{'address_components'};
  $area1="-1";
  $area2="-1";
  foreach($addcom as $key => $value ){
      $type = $value->{'types'};
      
      if(array_search("sublocality_level_2",$type)){
              $area1=$value->{'long_name'};
      }
  if(array_search("sublocality_level_1",$type)){
              $area2=$value->{'long_name'};
      }
      
  }
  curl_close($curl);
  return "$area1, $area2";
}
?>