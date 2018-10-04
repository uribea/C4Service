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


				if ($this->col($position)+ 4 < WIDTH &&

                    player == board[$position+1] && // look right

                    player == board[$position+2] &&

                    player == board[$position+3])

                    return $player;

				if ($this->row($position) + 3 < HEIGHT) {

                    if (player == board[$position-6] && // look up

                        player == board[$position-12] &&

                        player == board[$position-18])

                        return $player;

                    if ($this->col($position) + 3 < WIDTH &&

                        player == board[$position-5] && // look up & right

                        player == board[$position-10] &&

                        player == board[$position-15])

                        return player;

                    if ($this->col($position) - 3 >= 0 &&

                        player == board[$position-7] && // look up & left

                        player == board[$position-17] &&

                        player == board[$position-21])

                        return $player;

                }

			}



		return $EMPTY_SLOT; // no winner found


    }

    //finds the column that the element belongs to
    function col($num)
    {
        if($num==0||$num==6||$num==12||$num==18||$num==24||$num==30||$num==36)
        {
            return 0;
        }
        if($num==1||$num==7||$num==13||$num==19||$num==25||$num==31||$num==37)
        {
            return 1;
        }
        if($num==2||$num==8||$num==14||$num==20||$num==26||$num==32||$num==38)
        {
            return 2;
        }
        if($num==3||$num==9||$num==15||$num==21||$num==27||$num==33||$num==39)
        {
            return 3;
        }
        if($num==4||$num==10||$num==16||$num==22||$num==28||$num==34||$num==40)
        {
            return 4;
        }
        if($num==5||$num=11||$num==17||$num==23||$num==29||$num==35||$num==41)
        {
            return 5;
        }
    }

    function row($num)
    {
        return floor($num/7);
    }



}