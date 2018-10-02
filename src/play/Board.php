<?php
/**
 * Created by PhpStorm.
 * User: perladelao
 * Date: 9/30/18
 * Time: 10:52 AM
 */

class Board
{
    public  $player=0;//keep track of player
    public  $board;
    public  $row=7;
    public $col=6;
    //var $total=42;

    function  __construct()
    {
        $this->board=array_fill(0,42,0);
    }



}