<?php
/**
* @version		$Id: mod_stats.php 10381 2008-06-01 03:35:53Z pasamio $
* @package		Joomla
* @copyright	Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// Include the syndicate functions only once
require_once (dirname(__FILE__).'/helper.php');

$season_id = $params->get( 'season_id' );
$event_id = $params->get( 'event_id' );
$team_id = $params->get( 'team_id' );
$display_count 	= $params->get( 'display_count' );

$list = modBlPlayersHelper::getList($params);
$plname = modBlPlayersHelper::getPlName($params);
require(JModuleHelper::getLayoutPath('mod_js_players'));
