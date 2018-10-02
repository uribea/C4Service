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

        return $c1;

    }

    function diagonal1($r,$c,$player)
    {
        $total=0;
        if(c+3<7&&c-3>=0)
        {
            for($i=0;i<5;$i++)
            {
                if((r*col)-(6+i)==player)
                {
                    $total++;
                }
            }

        }
        return $total;
    }

    function diagonal2($r,$c,$player)
    {
        $total=0;
        if(c+3<6&&c-3>=7)
        {
            for($i=0;i<5;$i++)
            {
                if((r*col)-(6+i)==player)
                {
                    $total++;
                }
            }

        }
        return $total;

    }

    function horizontal($r,$c,$player)
    {

    }

    function vertical($r,$c,$player)
    {

    }
}