<?php


$intro = 0;


if ($this->countModules('intro1')) $intro++;


if ($this->countModules('intro2')) $intro++;


if ($this->countModules('intro3')) $intro++;


if ($this->countModules('intro4')) $intro++;


if ($this->countModules('intro5')) $intro++;


if ($this->countModules('intro6')) $intro++;


if ( $intro == 6  ) {                   // If 6 modules are published


    $intromodwidth = 'span2';    // about 160px


}if ( $intro == 5  ) {                   // If 5 modules are published


    $intromodwidth = 'span2';    // Each module width will be 20%


}if ( $intro == 4  ) {                   // If 4 modules are published


    $intromodwidth = 'span3';    // Each module width will be 25%


}if ( $intro == 3 ) {                   // If 3 modules are published


    $intromodwidth = 'span4';    // Each module width will be 33.3%


}if ( $intro == 2 ) {                  // If 2 modules are published


    $intromodwidth = 'span6';      // Each module width will be 49%


} else if ($intro == 1) {            // If 1 module is published


    $intromodwidth = 'span12';    // This  module width will be 100%


}


?>


