<?php
/**
 * Created by PhpStorm.
 * User: perladelao
 * Date: 10/1/18
 * Time: 4:53 PM
 */

class Win
{
    function count_win($r,$c,$player)
    {
        $c1=0;
        $c2=0;
        $c3=0;
        $c4=0;
        if(board[col*r]==1||board[col*r]==2)//if position i not available
        {
            return $c1;
        }
        if(board[col*r]==0)//if 0 then
        {
            $board[r*col]=player;
        }



    }

    function diagonal1()
    {

    }
    function diagonal2()
    {

    }
    function horizontal()
    {

    }
    function vertical()
    {
        
    }
}