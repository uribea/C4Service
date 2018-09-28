<?php // index.php
/**$n = $_POST;
echo '{"width":7,"height":6,"strategies":["Smart","Random"]}';
echo json_encode(array("response" => true, PID => $pid));**/
$json = $_GET;
$info['width'] = 7;
$info['height'] = 6;
$info['strategies'] = array("Smart", "Random");
define('width',7);
define('height',6);

/*$alsoinfo->width = 8;
$alsoinfo->heigth = 7;
$alsoinfo->strategies = array("Dumb", "Alternate");
$json_alsoinfo  = json_encode($alsoinfo);
*/
//$json_info =
echo json_encode($info);

//echo $json_info."<br>";
//echo $json_alsoinfo."<br>";

?>
