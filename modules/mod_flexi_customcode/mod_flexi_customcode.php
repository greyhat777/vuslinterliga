<?php
/**
* Flexi Custom Code - Joomla Module
* Version			: 1.3.1
* Created by		: RBO Team > Project::: RumahBelanja.com, Demo::: GtechPedia.Com
* Created on		: v1.0 - December 16th, 2010 (Joomla 1.6.x) - v1.2 - August 21th, 2011 (Joomla 1.7.x) - v1.2.1 December 24th, 2011 (Joomla 2.5) - V.1.3.1 - September 30, 2012
* Updated			: v1.3.1 - September 30, 2012
* Package			: Joomla 3.0.x
* License			: http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
*/


// no direct access
defined('_JEXEC') or die('Restricted access');

// Include the syndicate functions only once
require_once (dirname(__FILE__).'/helper.php');

require JModuleHelper::getLayoutPath('mod_flexi_customcode', $params->get('layout', 'default'));
?>