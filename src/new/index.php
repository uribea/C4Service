<?php // index.php
define('STRATEGY', 'strategy'); // constant

$strategies = array("Smart", "Random"); // supported strategies

if (!array_key_exists(STRATEGY, $_GET)) { echo'{"response": false, "reason": "Strategy not specified"}'; exit; }
elseif (!(in_array($strategies[0],$_GET) xor in_array($strategies[1],$_GET))) {
    echo'{"response": false, "reason": "Unknown Strategy"}'; exit; }

//$strategy = $_GET[STRATEGY];
// write your code here … use uniqid() to create a unique play id.
$UID = uniqid();
echo'{"response": true, "pid": "'.$UID.'"}';

?>