<?php // index.php

require_once '../common/constants.php';
require_once '../common/utils.php';
require_once '../play/Game.php';

/**

define('UID', 'pid');
$response;
$reason;


$UID = uniqid();
echo'{"response": true, "pid": "'.$UID.'"}';
**/

$strategies = array("Smart", "Random"); // supported strategies
$response = true;
$reason = '';
$json = $_GET;
//print_r($_GET);

//echo $strategies;
if (!array_key_exists(STRATEGY, $json)) {
    $response = false;
    $reason = 'Strategy not specified';
}

elseif (!(in_array($strategies[0],$_GET) xor in_array($strategies[1],$_GET))) {
    $response = false;
    $reason = 'Unknown Strategy';
}

if(!$response){
    //echo json_encode(array(RESPONSE => $response, REASON => $reason ));
    echo createResponse($reason);

    exit;
}

$strategy = $json[STRATEGY];
$game= new Game();
$pid = uniqid();

$file = DATA_DIR . $pid . DATA_EXT;
 if (storeState($file, $game->toJsonString())) {
    echo json_encode(array(RESPONSE => true, PID => $pid));
} else {
    echo createResponse("Failed to store game data");
}

?>