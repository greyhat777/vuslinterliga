<?php
$spotlight = 0;
if ($this->countModules('spotlight1')) $spotlight++;
if ($this->countModules('spotlight2')) $spotlight++;
if ($this->countModules('spotlight3')) $spotlight++;
if ($this->countModules('spotlight4')) $spotlight++;
if ($this->countModules('spotlight5')) $spotlight++;
if ($this->countModules('spotlight6')) $spotlight++;
if ( $spotlight == 6  ) {                   // If 6 modules are published
    $spotlightmodwidth = 'span2';    // about 160px
}if ( $spotlight == 5  ) {                   // If 5 modules are published
    $spotlightmodwidth = 'span2';    // Each module width will be 20%
}if ( $spotlight == 4  ) {                   // If 4 modules are published
    $spotlightmodwidth = 'span3';    // Each module width will be 25%
}if ( $spotlight == 3 ) {                   // If 3 modules are published
    $spotlightmodwidth = 'span4';    // Each module width will be 33.3%
}if ( $spotlight == 2 ) {                  // If 2 modules are published
    $spotlightmodwidth = 'span6';      // Each module width will be 49%
} else if ($spotlight == 1) {            // If 1 module is published
    $spotlightmodwidth = 'span12';    // This  module width will be 100%
}
?>
