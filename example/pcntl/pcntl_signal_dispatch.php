<?php

// version 1.250203

declare(ticks=1);
global $sig_queue;
global $use_queue;
$sig_queue = array();
$use_queue = true;   // set to false to do it the old way

function tick_handler()
{
     pcntl_signal_dispatch();
}

function sig_handler($sig)
{
     global $sig_queue;
     global $use_queue;

     if(isset($use_queue) && $use_queue)
     {
          $sig_queue[] = $sig;
     }
     else
     {
          sig_helper($sig);
     }
}

function sig_helper($sig)
{
     switch($sig)
     {
     case SIGHUP:
          $pid = pcntl_fork();
          if($pid) print("forked $pid\n");
          break;

     default:
          print("unhandled sig: $sig\n");
     }
}

pcntl_signal(SIGHUP,   "sig_handler");

while(true)
{
     if($use_queue) foreach($sig_queue as $idx=>$sig)
     {
           sig_helper($sig);
           unset($sig_queue[$idx]);
     }
     sleep(1);
}
