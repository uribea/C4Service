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
        $isover = ['isWin'=>false,'isDraw'=>false];
        #var_dump($y);
        $val = update_board($x,1,$y);
#        var_dump($val[BOARD]);
#        echo ' now check boardfor game';
        $this->board = $val[BOARD];
 #       var_dump($val['r']);
        #echo json_encode($this);
        if (isWin($val[r],$val[c],$val[BOARD]))
            $isover[isWin] = false;
        else
            $isover[isWin] = true;


  #      echo 'iswin';
        #$isover->isDraw = isDraw($val[BOARD]);
        if (isDraw($val[BOARD]))
            $isover[isDraw] = false;
        else
            $isover[isDraw] = false;


   #     var_dump($isover);
        return $isover;#$isover;
    }

    function makeOpponentMove(){
        return true;
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