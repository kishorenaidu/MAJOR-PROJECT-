<?php
require 'util.php';
$FIREBASE = "https://project-2d302-default-rtdb.firebaseio.com/";
$NODE_DELETE = "artists.json";
$NODE_GET = "artists.json";
$NODE_PATCH = ".json";
$NODE_PUT = "artists.json";
$data = 32;


$value = 'OFF';

$data = array(
    "Switch" => $value
);

$json = json_encode( $data );

$curl = curl_init();

curl_setopt( $curl, CURLOPT_URL, $FIREBASE . $NODE_PATCH );
curl_setopt( $curl, CURLOPT_CUSTOMREQUEST, "PATCH" );
curl_setopt( $curl, CURLOPT_POSTFIELDS, $json );

curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );

$response = curl_exec( $curl );
curl_close( $curl );
header('Location: '.'./title.php'); 

?>