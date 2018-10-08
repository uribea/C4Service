<?php
/**
 * Created by PhpStorm.
 * User: perladelao
 * Date: 10/2/18
 * Time: 11:31 AM
 */

require_once '../common/constants.php';


    function update_board($c,$player,$board)//you give a column, row and a player
    {
        #echo 'hi';
        #$this->valid_pos($c,$board);
        if(($r = valid_pos($c,$board))!=-1)
        {
           # echo $r;
            $board->board[$r][$c]=$player;
          #  echo $r.'rc'.$c;
         #   var_dump($board);
            return array('r'=>$r,'c'=>$c, BOARD=>$board);
        }
        return false;
    }

    function valid_pos($c,$board)
    {
        //checks if valid position returns 1 if the position is valid else 0
        for($i=0;$i < $board->row;$i++)
        {
            #echo $board->board[$i][$c];
#            var_dump($board);
#            var_dump($board->board[$i]);
            if($board->board[$i][$c]==0)
            {
                #echo $i;
               return  $i;//valid
            }

        }
        return -1;//not valid
    }
