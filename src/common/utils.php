<?php
/**
 * Created by PhpStorm.
 * User: fantm
 * Date: 9/28/18
 * Time: 6:08 PM
 * */


function storeState($file,$json){
    $fileo = fopen($file, "w") or die("Unable to open file!");
    fwrite($fileo, $json);
    fclose($fileo);
    return True;
}

function pwinResponse($slot,$var){
    $row = [0,0,1,1,2,2,3,3];#getRow();
#    var_dump($var);
    #$Move = array(SLOT => $slot, ISWIN=>false,ISDRAW=>false, ROW => $row);
    $win = $var[isWin];
 #   echo $win;
    return json_encode(array(RESPONSE=>true, ACK => array(SLOT => $slot, ISWIN=>$win,ISDRAW=>false, ROW => $row)));
    #, MOVE => array(SLOT => $slot, ISWIN=>false,ISDRAW=>false, ROW => $row)));
}


function owinResponse($slot,$var){
    $row = [0,0,1,1,2,2,3,3];#getRow();
#    var_dump($var);
    #$Move = array(SLOT => $slot, ISWIN=>false,ISDRAW=>false, ROW => $row);
    $win = $var[isWin];
    #   echo $win;
    return json_encode(array(RESPONSE=>true, ACK => array(SLOT => $slot, ISWIN=>$win,ISDRAW=>false, ROW => $row)));
    #, MOVE => array(SLOT => $slot, ISWIN=>false,ISDRAW=>false, ROW => $row)));
}

function createResponse($reason){
    return json_encode(array(RESPONSE => False, REASON => $reason ));
}

function getRow(){
    return $row = [];
}

function continueResponse($slot){
    $row = getRow();
    #$Move = array(SLOT => $slot, ISWIN=>false,ISDRAW=>false, ROW => $row);
    return json_encode(array(RESPONSE=>true, ACK => array(SLOT => $slot, ISWIN=>false,ISDRAW=>false, ROW => $row),
        MOVE => array(SLOT => $slot, ISWIN=>false,ISDRAW=>false, ROW => $row)));
}
#function #{"response":true,"ack_move":{"slot":6,"isWin":false,"isDraw":false,"row":[]},"move":{"slot":4,"isWin":false,"isDraw":false,"row":[]}}
?>