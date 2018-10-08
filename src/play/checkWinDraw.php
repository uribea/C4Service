<?php
    function isWin($row, $col,$board)
    {
      #  var_dump($row);
       # echo "chrck strt";
        $player = detectVertical($row, $col,$board);
       echo 'player';
       var_dump($player);
        if($player != 0) {
            return true;
        };
        $player =  detectHorizontal($row, $col,$board);
        if($player != 0){
            return true;
        }
        $player = detectDiagonal($row, $col,$board);
        if($player !=0){
            return true ;
        }
        return false;
    }

    function detectHorizontal($row, $col,$board)
    {
        $player = $board->board[$row][$col];
        $horizontal = 0;
        $wrow = [];

        for ($i = $col; $i >= 0; $i--) {
            if ($board->board[$row][$i] != $player) {
                break;
            }
            $horizontal++;
           array_push($wrow,$row,$i);
        }
        for ($trow = $i + 1; $trow < $board->board->col; $trow++) {
            if ($board->board[$row][$i] != $player) {
                break;
            }
            $horizontal++;
            array_push($wrow,$row,$i);
        }
        if ($horizontal == 4) {
            return $wrow;
        }
        echo 'wrow';
        var_dump($wrow);
#        echo 'hor'.$horizontal;
        return 0;
    }

    function detectVertical($row, $col,$board)
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
        if ($vertical == 4) {
            return $player;
        }
       # echo $vertical;
        //*/
        return 0;
    }

    function detectDiagonal($row, $col,$board)
    {
        $tempR = $row;
        $tempC = $col;
        $diagonal = 0;
        $player = $board->board[$row][$col];
#echo 'hidia'.$player;
#var_dump();
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
                if ($diagonal == 4) {
                    return $player;
                }
 #               echo 'diag'.$diagonal;
        return 0;
    }
    function isDraw($board){
#        var_dump($board);
        $tempR = $board->row;
        $tempC = $board->col;
        #echo $tempR.'rc.'.$tempC;
        for ($i = 0; $i<$tempC;$i++) {
            if ($board->board[$tempR - 1][$i] == 0)
  #                          echo 'false';
                return false;
        }
        return true;
    }