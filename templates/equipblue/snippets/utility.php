<?php


$utility = 0;


if ($this->countModules('utility1')) $utility++;


if ($this->countModules('utility2')) $utility++;


if ($this->countModules('utility3')) $utility++;


if ($this->countModules('utility4')) $utility++;


if ($this->countModules('utility5')) $utility++;


if ($this->countModules('utility6')) $utility++;


if ( $utility == 6  ) {                   // If 6 modules are published


    $utilitymodwidth = 'span2';    // about 160px


}if ( $utility == 5  ) {                   // If 5 modules are published


    $utilitymodwidth = 'span2';    // Each module width will be 20%


}if ( $utility == 4  ) {                   // If 4 modules are published


    $utilitymodwidth = 'span3';    // Each module width will be 25%


}if ( $utility == 3 ) {                   // If 3 modules are published


    $utilitymodwidth = 'span4';    // Each module width will be 33.3%


}if ( $utility == 2 ) {                  // If 2 modules are published


    $utilitymodwidth = 'span6';      // Each module width will be 49%


} else if ($utility == 1) {            // If 1 module is published


    $utilitymodwidth = 'span12';    // This  module width will be 100%


}


?>


