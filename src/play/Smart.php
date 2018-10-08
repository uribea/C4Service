<?php
include 'Random.php';


    function smart_mov($board)
    {

        for ($j=0;$j<6;$i++) {

            for ($i = 0; $i < 7; $i++) {

                if($board[$j][$i] == 0) {
                    if ($diag = diagonal($i, $j, $board) != -1) {
                        return $i;
                    }

                    if ($ver = vertical($i, $j, $board) != -1) {
                        return $i;
                    }
                    if ($hor = horizontal($i, $j, $board) != -1) {
                        return $i;
                    }
                }
            }
        }
        return rand_pos($board);
    }

    //returns position to put the disc if 3 discs and an empty space
    function diagonal($col,$row,$board)//up and left
    {
        $tempR = $row;
        $tempC = $col;
        $diagonal = 0;
        for($player =1 ; $player<3; $player++) {
            for ($i = $tempR; $i >= 0; $i--) {
                if ($board->board[$i][$col]) {
                    if ($board->board[$tempC][$tempR] != $player) {
                        break;
                    }
                }
                $tempC++;
                $diagonal++;
            }
            for ($i = $tempR; $i < $board->row; $i++) {
                if ($tempC >= $board->col) {
                    break;
                }
                if ($board->board[$i][$tempC] != $player) {
                    break;
                }
                $tempC++;
                $diagonal++;
            }
            echo $diagonal;

            echo 'diagonal';
            if ($diagonal == 4) {
                return $player;
            }
        }
        #               echo 'diag'.$diagonal;
        return -1;
    }


    //returns position to put the disc if 3 discs and an empty space
    function horizontal($col,$row,$board)
    {
        $player = $board->board[$row][$col];
        $horizontal = 0;

        for ($i = $col; $i >= 0; $i--) {
            if ($board->board[$row][$i] != $player) {
                break;
            }
            $horizontal++;

        }
        for ($trow = $i + 1; $trow < $board->board->col; $trow++) {
            if ($board->board[$row][$i] != $player) {
                break;
            }
            $horizontal++;
        }
        echo 'horiz';
        echo  $horizontal;
        if ($horizontal == 4) {
            return 0;
        }
        echo 'hor';
#        echo 'hor'.$horizontal;
        return -1;
    }

    //returns position to put the disc if 3 discs and an empty space
    function vertical($col,$row,$board)
    {
        $player = $board->board[$row][$col];
        $vertical = 0;
        #      var_dump($board);
        #     echo 'xcvbn'.$row.'rc'.$col;
        for ($i = $row; $i >= 0; $i--) {
            if ($board->board[$i][$col] != $player) {
                break;
            }
            $vertical++;
        }
        #       echo 'ver'.$vertical.'tic';

        for ($i = $row + 1; $i < $board->row; $i++) {
            if ($board->board[$i][$col] != $player) {
                break;
            }
            $vertical++;
        }
        echo 'vertical';
        echo $vertical;
        if ($vertical == 4) {
            return $player;
        }
        # echo $vertical;
        //*/
        return -1;
    }