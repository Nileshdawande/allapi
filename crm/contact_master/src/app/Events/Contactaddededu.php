<?php
namespace App\Events;

class Contactaddededu extends Event
{
    public $data;
    public function __construct($data)
    {
        $this->data = $data;
       
    }
}

?>
