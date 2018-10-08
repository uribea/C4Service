<?php


/**
 * @param $board
 * @return int
 */
function rand_pos($board)
    {

        while (true) {

            $col = mt_rand(0, 6);
            echo "collll" . $col;
            var_dump($board->row);
            if ($board->board[($board->row) - 1][$col] == 0) {
                return $col;
            }
        }
        return 0;
    }
