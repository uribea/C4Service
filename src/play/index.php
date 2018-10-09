<?php // index.php
require_once '../common/constants.php';
require_once '../common/utils.php';
require_once '../play/Game.php';
$json = $_GET;
$response = true;
#

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
    #
    if ( !file_exists ($file)) {
    $response = false;
    $reason = 'Unknown pid';
    }elseif ($mov < 0 || $mov > 6) {
    $response = false;
    $reason = 'Invalid slot, '.$mov;
    }
}
#
if(!$response){
    echo createResponse($reason);
    exit;
}
$file = DATA_DIR . $pid . DATA_EXT;
$json2 = file_get_contents($file);
$game = Game::fromJsonString($json2);
$x = $json[MOVE];

$y = $game->board;
$playerMove = $game->makePlayerMove($x, $y);
if ($playerMove['isWin'] || $playerMove['isDraw']) {
    unlink($file);
    echo pwinResponse($x,$playerMove);
    exit; }
$opponentMove = $game->makeOpponentMove($mov);
if ($opponentMove['isWin']  || $opponentMove['isDraw']) {
    unlink($file);
    echo owinResponse($mov,$opponentMove);
    exit;}
echo continueResponse($mov,$opponentMove['x']);
storeState($file, $game->toJsonString());

?>