<?php


$feature = 0;


if ($this->countModules('feature1')) $feature++;


if ($this->countModules('feature2')) $feature++;


if ($this->countModules('feature3')) $feature++;


if ($this->countModules('feature4')) $feature++;


if ($this->countModules('feature5')) $feature++;


if ($this->countModules('feature6')) $feature++;


if ( $feature == 6  ) {                   // If 6 modules are published


    $featuremodwidth = 'span2';    // about 160px


}if ( $feature == 5  ) {                   // If 5 modules are published


    $featuremodwidth = 'span2';    // Each module width will be 20%


}if ( $feature == 4  ) {                   // If 4 modules are published


    $featuremodwidth = 'span3';    // Each module width will be 25%


}if ( $feature == 3 ) {                   // If 3 modules are published


    $featuremodwidth = 'span4';    // Each module width will be 33.3%


}if ( $feature == 2 ) {                  // If 2 modules are published


    $featuremodwidth = 'span6';      // Each module width will be 49%


} else if ($feature == 1) {            // If 1 module is published


    $featuremodwidth = 'span12';    // This  module width will be 100%


}


?>