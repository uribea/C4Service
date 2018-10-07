<?php
/**
 * Created by PhpStorm.
 * User: perladelao
 * Date: 9/30/18
 * Time: 10:52 AM
 */

class Random extends Strategy
{
    public $col;
    function  __construct()
    {
        $this->col=0;
    }

    function rand_pos($player)
    {
        $col= rand(0,6);
        $r=rand(0,5);
        while ($this->valid_pos($col)==0)
        {
            $col=rand(0,7);
        }
        $this->update($col,$player,$r);
    }
    function move($player)
    {
        rand_pos($player);
    }

}