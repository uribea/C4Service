<?php
class Board
{
   # public  $player=0;//keep track of player
    public  $board;
    public  $row=6;
    public $col=7;
    //var $total=42;
    function  __construct()
    {
        $this->board = array_fill(0, $this->row, array());
        foreach ($this->board as &$column) {
            $column = array_fill(0, $this->col, 0);
            #var_dump($this->row);
        }

        #var_dump($this);
    }
    function fromJson($board){
        $newb = new Board();
        $newb->board = $board->board;
#        var_dump($board);
        return $newb;
    }
}