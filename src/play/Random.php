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
        $c= rand(0,7);
        $r=rand(0,6);
        while ($this->valid_pos($c)==0)
        {
            $c=rand(0,7);
        }
        $this->update($c,$player,$r);
    }

}