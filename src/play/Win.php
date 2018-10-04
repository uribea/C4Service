<?php
/**
 * Created by PhpStorm.
 * User: perladelao
 * Date: 10/1/18
 * Time: 4:53 PM
 */
require_once (Board.php);
class Win
{
    //checks if a slot has connected 5 or not
    function check_win($row,$col,$player)
    {
        $height=7;
        $width=6;
        $empty_slot=0;
        $player;
        if(board[(row*height)-1]==0)
        {
            return 0;//returns 0 because 0 is not a player
        }
        //checks for right
        if($col+3<$width&&$player==board[(row*height)+1]&&$player==board[(row*height)+1]&&
        $player==board[(row*height)+1])
        {
            return $player;
        }
        //checks up and right
        if(col+2<$width&&$player==board[row*height-5]&&$player==board[row*height-10]&&
            $player==board[row*height-15])
        {
            return $player;
        }
        //checks up
        if((col+2<$height&&$player==board[row*height-6]&&$player==board[row*height-12]&&
            $player==board[row*height-18]))
        {
            return $player;
        }
        //look up and left
        if((col-2<0&&$player==board[row*height-6]&&$player==board[row*height-12]&&
            $player==board[row*height-18]))
        {
            return $player;
        }


        return 0;

    }
    

}