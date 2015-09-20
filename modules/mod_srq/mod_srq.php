<?php
/**
* Author:	Omar Muhammad
* Email:	admin@omar84.com
* Website:	http://omar84.com
* Module:	Simple Random Quotes
* Version:	1.7.0
* Date:		23/8/2011
* License:	http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Copyright:Copyright © 2007 - 2011 Omar's Site. All rights reserved.
**/

defined('_JEXEC') or die('Restricted access');

$renderer	= $params->get('renderer','');
$dir		= $params->get('dir','');
$url		= $params->get('url','');
$sep		= $params->get('sep','');
$source		= $params->get('source','');
$backup[0]	= "";
for ($i=1; $i<10; $i++)
	$backup[$i]	= $params->get('backup'.$i,'');
?>
<!-- Simple Random Quotes 1.7.0 starts here -->

<?php
require_once ('functions.php');
echo srq_fetch($backup, $renderer, $dir, $url, $sep, $source);
?>

<!-- Simple Random Quotes 1.7.0 ends here -->
