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
    function check_win($board)
    {

		$HEIGHT = 6;

		$WIDTH = 7;

		$EMPTY_SLOT = 0;

		for ($position = 0; $position < 42; $position++) { // iterates through array


            $player = board[$position];

				if ($player == $EMPTY_SLOT)

                    continue; // don't check empty slots


				if (($position%7)+ 3 < $WIDTH &&

                    player == board[$position+1] && // look right

                    player == board[$position+2] &&

                    player == board[$position+3])

                {return $player;}

				if (floor($position/6) + 2 < $HEIGHT &&//row
                       $player == $board[$position+7] && // look up

                        player == $board[$position+14] &&

                        $player == $board[$position+21])

                    {return $player;}

                    if (($position%7) + 2 < $WIDTH &&

                        player == board[$position+8] && // look up & right

                        player == board[$position+16] &&

                        player == board[$position+24])

                    {return player;}

                    if (($position%7) - 2 >= 0 &&

                        player == board[$position+6] && // look up & left

                        player == board[$position+12] &&

                        player == board[$position+18])

                    { return $player;}



			}



		return $EMPTY_SLOT; // no winner found


    }



}