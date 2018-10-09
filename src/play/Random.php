<?php


/**
 * @param $board
 * @return int
 */
function rand_pos($board)
    {



        $col = mt_rand(0, 6);
        if ($board->board[($board->row) - 1][$col] == 0) {
            return $col;
        }
        else {
            while ($board->board[($board->row) - 1][$col] != 0) {
            $col = ($col + 1) % 7;
            }
        return $col;
        }

    }
