<?php

require_once 'animal.php';

class frog extends animal
{
    public function jump()
    {
        echo 'jump : hop hop';
    }
}