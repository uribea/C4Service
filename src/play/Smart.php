<?php
/**
 * Created by PhpStorm.
 * User: perladelao
 * Date: 9/30/18
 * Time: 10:52 AM
 */

class Smart extends Strategy
{
    var $move=0;
    public $win_array;

    function move($player)
    {
        if(move ==0)
        {
            rand_pos($player);
        }

        $this->win_array=array_fill(0,42,0);

        if(defence()==0&& move!=0)
        {
            offence();
        }


    }
    function defence($r, $c,$player)
    {
        $this->win_array=array_fill(0,42,0);
        $max=0;
        for($i=0;i<42;$i++)
        {
            $win_array[i]=count($r,$c,$player);//finds number of connected discs for all
            if(b[i]>$max)
            {
                $max=$win_array[i];
            }
        }
        if($max -1>=3)
        {
            update_board($c,$player,$r);
        }
    }

    function offence()
    {

    }


}