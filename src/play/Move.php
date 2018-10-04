<?php
/**
 * Created by PhpStorm.
 * User: perladelao
 * Date: 10/2/18
 * Time: 11:31 AM
 */
require_once (Board.php);

class Move
{
    function update_board($c,$player,$r)//you give a column, row and a player
    {
        if($this->valid_pos(r)==1)
        {
            $board[r*row]=player;
        }
    }

    function valid_pos($r)
    {
        $result=0;
        //checks if valid position returns 1 if the position is valid else 0
        for($i=0;$i<42;$i++)
        {
            if(i==r*col)
            {
                for($j=0;j<7;$j++)
                {
                    if(board[r*col]==0)
                    {
                        return $result=1;
                    }
                }

            }
        }
        return $result;
    }

}