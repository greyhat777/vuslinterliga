<?php


$maincenter = 0;


if ($this->countModules('maincenter1')) $maincenter++;


if ($this->countModules('maincenter2')) $maincenter++;


if ($this->countModules('maincenter3')) $maincenter++;


if ($this->countModules('maincenter4')) $maincenter++;


if ($this->countModules('maincenter5')) $maincenter++;


if ($this->countModules('maincenter6')) $maincenter++;


if ( $maincenter == 6  ) {                   // If 6 modules are published


    $maincentermodwidth = 'span2';    // about 160px


}if ( $maincenter == 5  ) {                   // If 5 modules are published


    $maincentermodwidth = 'span2';    // Each module width will be 20%


}if ( $maincenter == 4  ) {                   // If 4 modules are published


    $maincentermodwidth = 'span3';    // Each module width will be 25%


}if ( $maincenter == 3 ) {                   // If 3 modules are published


    $maincentermodwidth = 'span4';    // Each module width will be 33.3%


}if ( $maincenter == 2 ) {                  // If 2 modules are published


    $maincentermodwidth = 'span6';      // Each module width will be 49%


} else if ($maincenter == 1) {            // If 1 module is published


    $maincentermodwidth = 'span12';    // This  module width will be 100%


}


?>


