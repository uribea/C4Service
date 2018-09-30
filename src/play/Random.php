<?php
/**
 * Created by PhpStorm.
 * User: perladelao
 * Date: 9/30/18
 * Time: 10:52 AM
 */

class Random extends Board
{

    function rand_pos($player)
    {
        $col= rand(0,7);
        while ($this->valid_pos($col)==0)
        {
            $col=rand(0,7);
        }
        $this->update($col,$player);
    }

}