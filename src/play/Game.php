<?php
/**
 * Created by PhpStorm.
 * User: fantm
 * Date: 9/28/18
 * Time: 6:08 PM
 */
require_once '../common/constants.php';

include 'Board.php';
include 'Move.php';
include 'checkWinDraw.php';
include 'Random.php';
include 'Smart.php';

class Game{
    public $board;
    public $strategy;

    function __construct($strategy){
        $this->board = new Board();
        $this->strategy = $strategy;
    }
    function toJsonString(){
        #echo  json_encode($this);
        return json_encode($this);
    }

    function makePlayerMove($x,$y){
        $isover = ['isWin'=>false,'isDraw'=>false, 'row'=>array('')];
        #var_dump($y);
        $val = update_board($x,1,$y);
        if(!$val)
            return $isover;
      #  var_dump($val[BOARD]);
#        echo ' now check boardfor game';
        $this->board = $val[BOARD];

        #var_dump($val[c]);
        $win = isWin($val[r],$val[c],$val[BOARD]);
        #var_dump($win);
        #var_dump($win);
        $isover[row] = $win[0];
        #var_dump($isover);
        if ($win[0])
            $isover[isWin] = true;
        else
            $isover[isWin] = false;


  #      echo 'iswin';
        #$isover->isDraw = isDraw($val[BOARD]);
        if (isDraw($val[BOARD]))
            $isover[isDraw] = true;
        else
            $isover[isDraw] = false;


        return $isover;#$isover;
    }

    function makeOpponentMove($pl){
        $isover = ['isWin'=>false,'isDraw'=>false, 'row'=>array(),'x'=>0];
        #echo 'this';
        #var_dump($this);
        #echo 'by;';
        $x = 0;
        if($this->strategy == 'Smart')
            $x = smart_mov($pl,$this->board);
        else
            $x = rand_pos($this->board);
        #if($this->strategy)
        #var_dump($isover);
        $isover[x] = $x;

        #echo $x.'new';
        #var_dump($isover);

        #echo 'hi';
        $val = update_board($x,2,$this->board);
        $win = isWin($val[r],$val[c],$val[BOARD]);
        $isover[row] = $win->row;
        if ($win->check)
            $isover[isWin] = true;
        else
            $isover[isWin] = false;

        if (isDraw($this->board))
            $isover[isDraw] = true;
        else
            $isover[isDraw] = false;
        return $isover;


    }
    static function fromJsonString($json) {
        $obj = json_decode($json,false); // instance of stdClass
        $board = $obj->{'board'};
#        var_dump($json);
        $game = new Game($obj->{'strategy'});
        #var_dump($game);
        $game->board = Board::fromJson($board);
        $game->strategy = $obj->{'strategy'};
#        var_dump($game);
        #$name = $strategy->{'name'};
        #$game->strategy = $name::fromJson($strategy);
        #$game->strategy->board = $game->board;
#        var_dump($game);
        return $game;
    }
}
?>