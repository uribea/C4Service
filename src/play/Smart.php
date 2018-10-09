<?php

    function smart_mov($pl,$board)
    {
        $r = -1;
        for ($i = 0; $i < $board->board->row; $i++) {
            if ($board->board[$i][$pl] == 0) {
                $r = $i;//valid
            }
        }
        if ($r > 1) {
            if ($ver = vertical($r, $pl, $board) != -1) {
                return $pl;
            }
        }
        if ($hor = horizontal($r, $pl, $board) != -1) {
            #echo ' hor';
            for ($j = $pl; $j < $pl + 7; $j++)
                if ($board->board[$r][$j % 7] == 0){

                    return $j;
                    }
                else
                    return rand_pos($board);
        }





        if ($diag = diagonal($r, $pl, $board) != -1) {
            if($board->board[$r][$pl-1] != 0 && $board->board[$r+1][$pl-1] == 0 )
                return $pl-1;
            if($board->board[$r][$pl+1] != 0 && $board->board[$r+1][$pl+1] == 0)
                return $pl+1;

            for ($j = $pl; $j < 7; $j++) {

                for ($ti = $r; $ti >= 0; $r--) {

                if ($board->board[$ti][$j % 7] == 0)
                    return $j % 7;

                }
                if ($ti == 0){
                    break;
                }
            }
            for ($j = $pl; $j >= 0; $j--) {

                for ($ti = $r; $ti >= 0; $r--) {

                    if ($board->board[$ti][$j % 7] == 0)
                        return $j % 7;

                }
                if ($ti == 0){
                    break;
                }
            }


        }

        return rand_pos($board);
    }

    //returns position to put the disc if 3 discs and an empty space
    function diagonal($row,$col,$board)//up and left
    {
        $tempR = $row;
        $tempC = $col;
        $diagonal = 0;
        $player = 1;

        for ($i = $tempR-1; $i >= 0; $i--) {
            if ($board->board[$i][$col-1]) {
                if ($board->board[$tempC-1][$tempR-1] != $player) {
                    break;
                }
            }
            $tempC--;
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
       # echo $diagonal;

       # echo 'diagonal';
        if ($diagonal > 2) {
            return $player;
        }

        #               echo 'diag'.$diagonal;
        return -1;
    }


    //returns position to put the disc if 3 discs and an empty space
    function horizontal($row,$col,$board)
    {
        $player = 1;
        $horizontal = 0;

        for ($i = $col; $i >= 0; $i--) {
            if ($board->board[$row][$i] != $player) {
                break;
            }
            $horizontal++;

        }
        for ($i = $col + 1; $i < 7; $i++) {
            if ($board->board[$row][$i] != $player) {
                break;
            }
            $horizontal++;
        }
        #echo 'horiz';
        #echo  $horizontal;
        if ($horizontal > 2) {
            return 1;
        }
        return -1;
    }

    //returns position to put the disc if 3 discs and an empty space
    function vertical($row,$col,$board)
    {
        $player = 1;
        $vertical = 0;
        echo 'ver';
        #      var_dump($board);
        #     echo 'xcvbn'.$row.'rc'.$col;
        for ($i = $row; $i >= 0; $i--) {
            if ($board->board[$i][$col] != $player) {
                break;
            }
            $vertical++;
        }
        #       echo 'ver'.$vertical.'tic';


        if ($vertical > 2) {
            return $player;
        }
        # echo $vertical;
        //*/
        return -1;
    }