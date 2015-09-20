<?php
$bottom = 0;
if ($this->countModules('bottom1')) $bottom++;
if ($this->countModules('bottom2')) $bottom++;
if ($this->countModules('bottom3')) $bottom++;
if ($this->countModules('bottom4')) $bottom++;
if ($this->countModules('bottom5')) $bottom++;
if ($this->countModules('bottom6')) $bottom++;
if ( $bottom == 6  ) {                   // If 6 modules are published
    $bottomtmodwidth = 'span2';    // about 160px
}if ( $bottom == 5  ) {                   // If 5 modules are published
    $bottommodwidth = 'span2';    // Each module width will be 20%
}if ( $bottom == 4  ) {                   // If 4 modules are published
    $bottommodwidth = 'span3';    // Each module width will be 25%
}if ( $bottom == 3 ) {                   // If 3 modules are published
    $bottommodwidth = 'span4';    // Each module width will be 33.3%
}if ( $bottom == 2 ) {                  // If 2 modules are published
    $bottommodwidth = 'span6';      // Each module width will be 49%
} else if ($bottom == 1) {            // If 1 module is published
    $bottommodwidth = 'span12';    // This  module width will be 100%
}
?>
