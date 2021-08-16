<?php
namespace App\Listeners;
use Illuminate\Contracts\Queue\ShouldQueue;
use Log;
class ContactaddededuListener implements ShouldQueue
{
    public $data;
    public function __construct()
    {
    	// $this->data = $data;
    }
        
    public function handle($event)
    {
        // Log::info('Order created on estore:' . json_encode($event));
        print_r($event);
    }
}

?>