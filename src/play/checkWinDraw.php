<?php
    function isWin($row, $col,$board)
    {

        $player = detectVertical($row, $col,$board);
        #var_dump($player[0]);
        if($player[0]!= 0) {
            return array(true,$player[1]);
        };
        $player =  detectHorizontal($row, $col,$board);
        if($player[0] != 0){
            return array(true,$player[1]);
        }
        $player = detectDiagonal($row, $col,$board);
        if($player[0] !=0){
            return array(true,$player[1]);
        }
        return array(false,array());
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
           array_push($wrow,$i,$col);
        }
        for ($i = $col + 1; $i < 7; $i++) {
            if ($board->board[$row][$i] != $player) {
                #var_dump();
                break;
            }
            $horizontal++;
            array_push($wrow,$i,$col);
        }
        if ($horizontal > 3) {
            return array(1,$wrow);
        }
        return array(0,array());
    }

    function detectVertical($row, $col,$board)
    {
        $wrow = [];
        $player = $board->board[$row][$col];
        $vertical = 0;
        for ($i = $row; $i >= 0; $i--) {
            if ($board->board[$i][$col] != $player) {
                break;
            }
            $vertical++;
            array_push($wrow,$row,$i);

        }

        if ($vertical == 4) {
            return array(1,$wrow);
        }

        return array(0,array());
    }

    function detectDiagonal($row, $col,$board)
    {
        $wrow = [];

        $tempR = $row;
        $tempC = $col;
        $diagonal = 0;
        $player = $board->board[$row][$col];

        for ($i = $tempR; $i >= 0; $i--) {
            if ($board->board[$i][$col]) {
                if ($board->board[$tempC][$tempR] != $player) {
                    break;
                }
            }
            $tempC--;
            $diagonal++;
            array_push($wrow,$row,$i);

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
            array_push($wrow,$tempR,$tempC);

        }
        if ($diagonal > 3) {
            return array(1,$wrow);
        }
        return array(0,array());
    }
    function isDraw($board){
        $tempR = $board->row;
        $tempC = $board->col;
        for ($i = 0; $i<$tempC;$i++) {
            if ($board->board[$tempR - 1][$i] == 0)
                return false;
        }
        return true;
    }