<?php
/**
 * Created by PhpStorm.
 * User: perladelao
 * Date: 9/30/18
 * Time: 10:52 AM
 */

class Smart extends Board
{
    var $move=0;

    function move()
    {


    }

    function defence()
    {

    }

    function count($x,$y,$player)
    {
        $c1=0;
        $c2=0;
        $c3=0;
        $c4=0;
        if(board[$x][$y]==1||board[$x][$y]==2)
        {
            return $c1;
        }
        if(board[$x][$y]==0)
        {
            //add player to board[$x][$y]
        }


    }
}