<?php
/**
 * Created by PhpStorm.
 * User: fantm
 * Date: 9/28/18
 * Time: 6:08 PM
 */
class Game{
    public $board;
    public $strategy;

    function Game(){

    }
    function toJsonString(){
        return json_encode();
    }

    static function fromJsonString($json) {
        $obj = json_decode($json); // instance of stdClass
        $strategy = $obj->{'strategy'};
        $board = $obj->{'board'};
        $game = new Game();
        $game->board = Board::fromJson($board);
        $name = $strategy->{'name'};
        $game->strategy = $name::fromJson($strategy);
        $game->strategy->board = $game->board;
        return $game;
    }
}
?>