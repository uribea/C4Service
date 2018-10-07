<?php
/**
 * Created by PhpStorm.
 * User: perladelao
 * Date: 10/2/18
 * Time: 11:25 AM
 */
#include (Win.php);
#include (Move.php);

abstract class Strategy extends Board
{
    abstract function move($player);
    abstract function rand_pos($player);


}