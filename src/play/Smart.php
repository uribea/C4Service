<?php
/**
 * Created by PhpStorm.
 * User: perladelao
 * Date: 9/30/18
 * Time: 10:52 AM
 */

class Smart extends Strategy
{
    var $move = 0;
    public $win_array;

    function move($board)
    {
        for ($i=0;i<42;$i++)
        {
            if ($diag1=diagonal_left($i) != -1) {
                $board[$diag1] = 2;
            }
            if ($diag2 = diagonal_right($i) != -1) {
                $board[$diag2] = 2;
            }
            if ($ver = vertical($i) != -1) {
                $board[$ver] = 2;
            }
            if ($hor = horizontal($i) != -1) {
                $board[$hor] = 2;
            }
        }
        $this->rand_pos(2);
    }

    //returns position to put the disc if 3 discs and an empty space
    function diagonal_left($position)//up and left
    {
        $spot=0;
        $empty_spots=0;
        if (($position%7) - 2 >= 0 ){
            for ($i = 0; i < 4; $i++) {
                if (board[$position] == 0) {
                    $empty_spots++;
                    $spot = $position + (i * 6);
                }
            }
    }


        if ($empty_spots > 1&& $empty_spots<1) {
            return -1;
        }

        return $spot;
    }

    //returns position to put the disc if 3 discs and an empty space
    function diagonal_right($position)//up and right
    {
        $spot=0;
        $empty_spots=0;
        if (($position%7) + 2< 7 )
            for ($i = 0; i < 4; $i++) {
                if (board[$position ] == 0) {
                    $empty_spots++;
                    if($spot>=7&&board[$spot-7]==0)
                    {
                        $spot = $position + (i*8);
                    }
                    else{
                        $spot = $position + (i*8);
                    }
                }
            }


        if ($empty_spots > 1&& $empty_spots<1) {
            return -1;
        }


        return $spot;
    }

    //returns position to put the disc if 3 discs and an empty space
    function horizontal($position)
    {
        $spot = 0;
        $empty_spots = 0;

        if (($position%7) + 3 < 7) {
            for ($i = 0; i < 4; $i++) {
                if (board[$position + i] == 0) {
                    $empty_spots++;
                    $spot = $position + i;
                    if($spot>=7&&board[$spot-7]==0)
                    {
                        $spot = $position + (i*8);
                    }
                    else{
                        $spot = $position + (i*8);

                    }
                }
            }
        }

        if ($empty_spots > 1&& $empty_spots<1) {
            return -1;
        }

        return $spot;
    }

    //returns position to put the disc if 3 discs and an empty space
    function vertical($position)
    {
        if (floor($position/6) + 2 < 6)
        {
            $spot = 0;
            $empty_spots = 0;
            for($i=0;i,4;$i++)
            {
                if (board[$position + i] == 0) {
                    $empty_spots++;
                    $spot = $position + (i*6);
                    if($spot>=7&&board[$spot-7]==0)
                    {
                        $spot = $position + (i*8);
                    }
                    else{
                        $spot = $position + (i*8);

                    }
                }

            }

        }
        if ($empty_spots > 1&& $empty_spots<1) {
            return -1;
        }

        return $spot;
    }

    function rand_pos($player)
    {
        $c= rand(0,6);
        $r=rand(0,5);

        if($this->valid_pos(3))
        {
            $this->update_board(7,2);
        }
        while ($this->valid_pos($c)==0)
        {
            $c=rand(0,7);
        }
        $this->update_board($c,2);
    }


}