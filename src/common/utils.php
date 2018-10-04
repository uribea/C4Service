<?php
/**
 * Created by PhpStorm.
 * User: fantm
 * Date: 9/28/18
 * Time: 6:08 PM
 * */
function storeState($file,$json){
    $fileo = fopen($file, "w") or die("Unable to open file!");

    return True;
}

function createResponse($reason){
    return json_encode(array(RESPONSE => False, REASON => $reason ));
}
?>