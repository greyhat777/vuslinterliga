<?php


$maintop = 0;


if ($this->countModules('maintop1')) $maintop++;


if ($this->countModules('maintop2')) $maintop++;


if ($this->countModules('maintop3')) $maintop++;


if ($this->countModules('maintop4')) $maintop++;


if ($this->countModules('maintop5')) $maintop++;


if ($this->countModules('maintop6')) $maintop++;


if ( $maintop == 6  ) {                   // If 6 modules are published


    $maintopmodwidth = 'span2';    // about 160px


}if ( $maintop == 5  ) {                   // If 5 modules are published


    $maintopmodwidth = 'span2';    // Each module width will be 20%


}if ( $maintop == 4  ) {                   // If 4 modules are published


    $maintopmodwidth = 'span3';    // Each module width will be 25%


}if ( $maintop == 3 ) {                   // If 3 modules are published


    $maintopmodwidth = 'span4';    // Each module width will be 33.3%


}if ( $maintop == 2 ) {                  // If 2 modules are published


    $maintopmodwidth = 'span6';      // Each module width will be 49%


} else if ($maintop == 1) {            // If 1 module is published


    $maintopmodwidth = 'span12';    // This  module width will be 100%


}


?>


