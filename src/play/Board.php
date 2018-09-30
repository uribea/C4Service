<?php
/**
 * Created by PhpStorm.
 * User: perladelao
 * Date: 9/30/18
 * Time: 10:52 AM
 */

class Board
{
    var $player=0;//keep track of player
    var $board=array(array(0,0,0,0,0,0,0)
            ,array(0,0,0,0,0,0,0)
            ,array(0,0,0,0,0,0,0)
            ,array(0,0,0,0,0,0,0)
            ,array(0,0,0,0,0,0,0)
            ,array(0,0,0,0,0,0,0));
    var $row=7;
    var $col=6;

    function update($c,$player)
    {
        if($this->valid_pos(c)==1)
        {
           //board[$this->available_row()][c] =$player; //updates position
        }
    }

    function valid_pos($c)
    {
        $result=0;
        //checks if valid position returns 1 if the position is valid else 0
        return $result;
    }

    function available_row($c)
    {
        $r=0;
        return $r;
    }
}