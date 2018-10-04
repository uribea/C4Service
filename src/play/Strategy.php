<?php
/**
 * Created by PhpStorm.
 * User: perladelao
 * Date: 10/2/18
 * Time: 11:25 AM
 */
require_once (Win.php);
require_once (Move.php);

abstract class Strategy extends Board
{
    abstract function move($player);

}