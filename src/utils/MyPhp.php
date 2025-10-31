<?php
use Monolog\Logger;
class MyLog { 
    /** 
    * @var \Monolog\Logger 
    */ 
    private $log; 

    private function __construct(string $filename) { 
        $this->log = new Monolog\Logger('name'); 
        $this->log->pushHandler(new Monolog\Handler\StreamHandler($filename, \Monolog\Level::Info)); 
    } 
    
    public static function load(string $filename) :MyLog { 
        return new MyLog($filename); 
    } 
    
    public function add(string $message): void { 
        $this->log->info($message); 
    } 
} 