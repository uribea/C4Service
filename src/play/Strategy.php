<?php
/**
 * Created by PhpStorm.
 * User: perladelao
 * Date: 10/2/18
 * Time: 11:25 AM
 */

abstract class Strategy
{
    var $board;

    function __construct(Board $board = null) {
        $this->board = $board;
    }

    abstract function pickSlot();

    function toJason() {
        return array(‘name’ => get_class($this));
    }

    static function fromJson($obj) {
        $strategy = new static();
        return $strategy;
    }

    function move()
    {

    }

}