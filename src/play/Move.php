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
    public $board;

    function  __construct($board)
    {
        $this->board;
    }

    function update_board($c,$player)//you give a column, row and a player
    {
        if($this->valid_pos(c)==1)
        {
            $board[r*row]=player;
        }
    }

    function valid_pos($c)
    {
        //checks if valid position returns 1 if the position is valid else 0
        for($i=0;$i<7;$i++)
        {
            if(board[$c+1]==0)
            {
               return  1;//valid
            }

        }
        return 0;//not valid
    }

}