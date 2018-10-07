<?php // index.php
require_once '../common/constants.php';
require_once '../common/utils.php';
require_once '../play/Game.php';
/* {"response": false, "reason": "Pid not specified"}
     {"response": false, "reason": "Move not specified"}
     {"response": false, "reason": "Unknown pid"}
     {"response": false, "reason": "Invalid slot, 10"}
 * */

$json = $_GET;
$response = true;
#echo $response;

if (!array_key_exists(PID, $json)) {
    $response = false;
    $reason = 'Pid not specified';
}elseif (!array_key_exists(MOVE, $json)) {
    $response = false;
    $reason = 'Move not specified';
}else{
    $pid = $json[PID];
    $mov = $json[MOVE];
    $file = DATA_DIR . $pid . DATA_EXT;
    #echo $file.PHP_EOL.'whygod';
    if ( !file_exists ($file)) {
    $response = false;
    #echo $pid.PHP_EOL;
    #echo $file.PHP_EOL;
    $reason = 'Unknown pid';
    }elseif ($mov < 0 || $mov > 6) {
    $response = false;
    $reason = 'Invalid slot, '.$mov;
    }
}
#echo 'sad';
if(!$response){
    //echo json_encode(array(RESPONSE => $response, REASON => $reason ));
    echo createResponse($reason);
    exit;
}
#echo'else';
$file = DATA_DIR . $pid . DATA_EXT;
$json2 = file_get_contents($file);
$game = Game::fromJsonString($json2);
$x = $json[MOVE];

$y = $game->board;
#var_dump($y);
#echo $x;
#var_dump($game);
echo 'atmove';
$playerMove = $game->makePlayerMove($x, $y);

echo continueResponse($mov);
/*
#$file = DATA_DIR . $pid . DATA_EXT;
$json = file_get_contents($file);
$game = Game::fromJsonString($json);
$playerMove = $game->makePlayerMove($x, $y);
if ($playerMove->isWin || $playerMove->isDraw) {
    unlink($file);
    echo pwinResponse();
    exit; }
$opponentMove = $game->makeOpponentMove();
if ($opponentMove->isWin || $opponentMove->isDraw) {
    unlink($file);
    echo owinResponse();
    exit;
}
//echo '__'.$mov.'__';
#echo continueResponse($mov);
storeState($file, $game->toJsonString());
*/
?>