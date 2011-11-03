<?php

/**
 * Shoutcast Class Demo Usage
 *  
 * Setting details:
 * You can set the shoutcast details in the constructor or the setDetails() method.
 * The constructor will call the setDetails method with the arguments that it receives.
 * 
 * setDetails($host, $port = 8000, $pass = '', $stream = 1)
 * The port default is 8000
 * The stream is default to 1, this will not affect shoutcast v.1 usage.
 * 
 * Requirements
 * 
 * cURL
 * PHP 5.3.3+ 
 * 
*/ 
require_once 'Shoutcast.php';

// No password and default stream id (1)
$sc = new Shoutcast('example.com',7309);

//Load the basic stats

if($sc->getBasicStats()){
   
   // can use the __get magic method
   echo $sc->songTitle;
   // can use the get method (the __get method just calls this one anyway)
   echo $sc->get('songtitle');
   
   // whatever you pass to the two above methods will be put through strtoupper()
   // as all of the keys are uppercase
   
   // get the XML out of the object so you can do whatever you want with it
   $xml = $sc->getXML();
   
   // you can then get the stats for a second server by setting the details again
   if($sc->setDetails('anotherHost.com', 1234)->getBasicStats()){
      
      echo $sc->songTitle;
      
   }else{
      echo $sc->getError();
   }
}else{
   echo $sc->getError();
}