<?php
/**
 * Created by PhpStorm.
 * User: perladelao
 * Date: 10/1/18
 * Time: 4:53 PM
 */
include (Board.php);
class Win
{
    public $winners;

    function  __construct()
    {
        $this->winners=array_fill(0,4,0);
    }
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

                {
                    $winners[0]=$position%7;
                    $winners[1]=($position+1)%7;
                    $winners[2]=($position+2)%7;
                    $winners[3]=($position+3)%7;
                    return $player;
                }

				if (floor($position/6) + 2 < $HEIGHT &&//row
                       $player == $board[$position+7] && // look up

                        player == $board[$position+14] &&

                        $player == $board[$position+21])

                    {
                        $winners[0]=($position)%7;
                        $winners[1]=($position+7)%7;
                        $winners[2]=($position+14)%7;
                        $winners[3]=($position+21)%7;
                        return $player;
                    }

                    if (($position%7) + 2 < $WIDTH &&

                        player == board[$position+8] && // look up & right

                        player == board[$position+16] &&

                        player == board[$position+24])

                    {
                        $winners[0]=$position%7;
                        $winners[1]=($position+8)%7;
                        $winners[2]=($position+16)%7;
                        $winners[3]=($position+24)%7;
                        return player;
                    }

                    if (($position%7) - 2 >= 0 &&

                        player == board[$position+6] && // look up & left

                        player == board[$position+12] &&

                        player == board[$position+18])

                    {
                        $winners[0]=$position%7;
                        $winners[1]=($position+6)%7;
                        $winners[2]=($position+12)%7;
                        $winners[3]=($position+18)%7;
                        return $player;
                    }

			}

		return $EMPTY_SLOT; // no winner found


    }

    public function winning_row()
    {
        return '$winners';
    }


}