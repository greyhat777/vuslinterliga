<?php
/*------------------------------------------------------------------------
# JoomSport Professional 
# ------------------------------------------------------------------------
# BearDev development company 
# Copyright (C) 2011 JoomSport.com. All Rights Reserved.
# @license - http://joomsport.com/news/license.html GNU/GPL
# Websites: http://www.JoomSport.com 
# Technical Support:  Forum - http://joomsport.com/helpdesk/
-------------------------------------------------------------------------*/
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.controller');
require_once(dirname(__FILE__).'/../includes/func.php');
$mainframe = JFactory::getApplication();
function itgetVer(){
		$version = new JVersion;
		$joomla = $version->getShortVersion();
		return substr($joomla,0,3);
	}
if($task != 'get_format'&&$task != 'get_formatkn'){
	$doc = JFactory::getDocument();
	if(itgetVer() >= '1.6'){
		JHtml::_('behavior.framework', true);
		$doc->addCustomTag( '<script type="text/javascript" src="components/com_joomsport/includes/slimbox/js/slimbox.js"></script>' );
	}else{
		JHtml::_('behavior.mootools');
		if(isset($mainframe->MooToolsVersion) && $mainframe->MooToolsVersion){
			$doc->addCustomTag( '<script type="text/javascript" src="components/com_joomsport/includes/slimbox/js/slimbox.js"></script>' );
		}else{
			$doc->addCustomTag( '<script type="text/javascript" src="components/com_joomsport/includes/slimbox/js15/slimbox.js"></script>' );
		}
	}

	$doc->addCustomTag( '<link rel="stylesheet" type="text/css"  href="components/com_joomsport/css/admin_bl.css" />' );
$doc->addCustomTag( '<link rel="stylesheet" type="text/css"  href="components/com_joomsport/css/joomsport.css" />' );
	$doc->addCustomTag( '<script type="text/javascript" src="components/com_joomsport/js/joomsport.js"></script>' );
	$doc->addCustomTag( '<script type="text/javascript" src="components/com_joomsport/js/styled-long.js"></script>' );
	$doc->addCustomTag( '<link rel="stylesheet" type="text/css"  href="components/com_joomsport/includes/slimbox/css/slimbox.css" />' );

}

?>
<?php

$db			= JFactory::getDBO();
$user	= JFactory::getUser();
 $sid = JRequest::getVar( 'sid', 0, 'request', 'int' );
	

	if ( $user->get('guest')) {

			$return_url = $_SERVER['REQUEST_URI'];
			$return_url = base64_encode($return_url);
			
			if(itgetVer() >= '1.6'){
				$uopt = "com_users";
			}else{
				$uopt = "com_user";
			}
			$return	= 'index.php?option='.$uopt.'&view=login&return='.$return_url;

			// Redirect to a login form
			$mainframe->redirect( $return, JText::_('BLMESS_NOT_LOGIN') );
			
		} 

	$query = "SELECT COUNT(*) FROM #__users as u, #__bl_feadmins as f WHERE f.user_id = u.id AND f.season_id=".$sid." AND u.id = ".intval($user->id);

	$db->setQuery($query);

	if(!$db->loadResult()){
		JError::raiseError( 403, JText::_('Access Forbidden') );
			return;
	}
	
	

class JoomsportControllerAdmin extends JControllerLegacy
{

	protected $js_prefix = '';
	protected $mainframe = null;
	protected $option = 'com_joomsport';
	
	function __construct(){
		parent::__construct();
		$this->mainframe = JFactory::getApplication();
		$this->js_SetPrefix();
		$this->js_GetDBTables();
		$this->session =  JFactory::getSession();
	}
	private function js_SetPrefix(){
		$this->js_prefix = '';
		$db	= JFactory::getDBO();
		$query = "SELECT name FROM #__bl_addons WHERE published='1'";
		$db->setQuery($query);
		$addon = $db->loadResult();
		if($addon){
			$this->js_prefix = $addon;
		}
		
	}
	private function js_GetDBTables(){
		$path = JPATH_SITE.'/components/com_joomsport/tables/';
		if($this->js_prefix){
			if(is_file($path.$this->js_prefix.".php")){
				require($path.$this->js_prefix.".php");
			}else{
				require($path."default.php");
			}
		}else{
			require($path."default.php");
		}
	}
	private function js_Model($name){
		$path = dirname(__FILE__).'/../models/';
		if($this->js_prefix){
			if(is_file($path.$this->js_prefix."/".$name.".php")){
				require($path.$this->js_prefix."/".$name.".php");
			}else{
				require($path."default/".$name.".php");
			}
		}else{
			require($path."default/".$name.".php");
		}
	}
	private function js_Layout($task){
		$path = dirname(__FILE__).'/../views/'.$task;
		
		require($path."/view.html.php");
		
	}
	
	function display($cachable = false, $urlparams = false)
	{
		$view = JRequest::getCmd( 'view' );
		$task = JRequest::getCmd( 'task' );
		if(!$view) {
			//if($task){
				//$view = $task;
			//}else{
				$view = 'admin_matchday';
			//}	
		}
		
		
		$vName		= JRequest::getCmd('view', 'admin_matchday');
		
		$this->js_Model($vName);
		$classname = $vName."JSModel";
		$unviews = array('admin_player','edit_team','edit_matchday','edit_match','adplayer_edit');
		if(in_array($vName,$unviews)){
			$model = new $classname(1);
		}else{
			$model = new $classname();
		}
		
		$this->js_Layout($vName);
		$classname_l = "JoomsportView".$vName;
		
		$layout = new $classname_l($model);
		
		$layout->display();
	
		
		return $this;
		
	}
//update
	function set_sess($msg,$typeMess){
		$this->session->set('errMess', $msg);		
		$this->session->set('typeMess', $typeMess);
	}
	
	///---------------Matchday--------------------------/
	function admin_matchday()
	{
		JRequest::setVar( 'view', 'admin_matchday' );
		$this->display();
	}
	function edit_matchday()
	{
		JRequest::setVar( 'view', 'edit_matchday' );
		JRequest::setVar( 'edit', true );
		$this->display();
	}
	
	function matchday_add()
	{
		JRequest::setVar( 'view', 'edit_matchday' );
		JRequest::setVar( 'edit', false );
		$this->display();
	}
	
	function matchday_save(){

		$vName = 'edit_matchday';
		$this->js_Model($vName);
		$classname = $vName."JSModel";
		$model = new $classname(1);
		$model->AdmMDSave();
		
		$msg = JText::_('BLFA_MSG_ADDSCHED');

		$Itemid = JRequest::getInt('Itemid'); 
		$isapply = JRequest::getVar( 'isapply', 0, '', 'int' );
		if(!$isapply){
		
			$link = "index.php?option=com_joomsport&controller=admin&view=admin_matchday&sid=".$model->season_id."&Itemid=".$Itemid;
		}else{
			$link = "index.php?option=com_joomsport&controller=admin&view=edit_matchday&sid=".$model->season_id."&cid[]=".$model->id."&Itemid=".$Itemid;
		}
		
		$this->setRedirect( $link );
	}
	
	function matchday_del(){
		
		$vName = 'edit_matchday';
		$this->js_Model($vName);
		$classname = $vName."JSModel";
		$model = new $classname(1);
		$model->delAdmMD();
		
		$Itemid = JRequest::getInt('Itemid'); 
		$s_id = JRequest::getVar( 'sid', 0, '', 'int' );	
		$this->setRedirect("index.php?option=com_joomsport&controller=admin&view=admin_matchday&sid=".$s_id."&Itemid=".$Itemid);
	}
	
	
	///---------------Match--------------------------/

	function admin_match()
	{
		$mainframe = JFactory::getApplication();;	
		$s_id = JRequest::getVar( 'sid', 0, '', 'int' );	
		$mid = JRequest::getVar( 'm_id', 0, '', 'int' );	
		$Itemid = JRequest::getInt('Itemid'); 
		$this->setRedirect("index.php?option=com_joomsport&controller=admin&task=edit_matchday&sid=".$s_id."&mid=".$mid."&Itemid=".$Itemid);

	}
	function edit_match()
	{
		JRequest::setVar( 'view', 'edit_match' );
		
		$this->display();
	}
	function match_save(){
		$vName = 'edit_match';
		$this->js_Model($vName);
		$classname = $vName."JSModel";
		$model = new $classname(1);
		$model->saveAdmmatch();
		$isapply = JRequest::getVar( 'isapply', 0, '', 'int' );
		$Itemid = JRequest::getInt('Itemid'); 
		if(!$isapply){
			$this->setRedirect("index.php?option=com_joomsport&controller=admin&view=edit_matchday&cid[]=".$model->m_id."&sid=".$model->season_id."&Itemid=".$Itemid);
		}else{
			$this->setRedirect("index.php?option=com_joomsport&controller=admin&view=edit_match&cid[]=".$model->id."&sid=".$model->season_id."&Itemid=".$Itemid);
		}
	} 
	
	//----FORMAT---/
	
	function admin_team()
	{
		JRequest::setVar( 'view', 'admin_team' );
		$this->display();
	}
	
	function edit_team()
	{
		JRequest::setVar( 'view', 'edit_team' );
		JRequest::setVar( 'edit', true );
		$this->display();
	}
	
	function team_add()
	{
		JRequest::setVar( 'view', 'edit_team' );
		JRequest::setVar( 'edit', false );
		$this->display();
	}
	
	function team_apply(){
		$this->team_save(1);
	}
	
	function team_save($apl = 0){

		$vName = 'edit_team';
		$this->js_Model($vName);
		$classname = $vName."JSModel";
		$model = new $classname(1);
		$model->SaveAdmTeam();
		
		$Itemid = JRequest::getInt('Itemid'); 
		
		if($apl){
			$link = "index.php?option=com_joomsport&controller=admin&view=edit_team&cid[]=".$model->id."&sid=".$model->season_id."&Itemid=".$Itemid;
		}else{
			$link = "index.php?option=com_joomsport&controller=admin&view=admin_team&sid=".$model->season_id."&Itemid=".$Itemid;
		}
		$msg = JText::_('BLMESS_UPDSUCC');
		$typeMess = 1;
//update
		//$this->session->set('errMess', $msg);		
		//$this->session->set('typeMess', $typeMess);		
		$this->set_sess($msg,$typeMess);
		$this->setRedirect($link);
	}
	
	function add_ex_team(){

		$vName = 'admin_team';
		$this->js_Model($vName);
		$classname = $vName."JSModel";
		$model = new $classname();
		$model->SaveAdmExTeam();
		
		$Itemid = JRequest::getInt('Itemid'); 
		

		$link = "index.php?option=com_joomsport&controller=admin&view=admin_team&sid=".$model->season_id."&Itemid=".$Itemid;
	
		
		$this->setRedirect($link);
	}
	
	function team_del(){
		
		$vName = 'edit_team';
		$this->js_Model($vName);
		$classname = $vName."JSModel";
		$model = new $classname(1);
		$model->delAdmTeam();
		
		$s_id = JRequest::getVar( 'sid', 0, '', 'int' );	

		$Itemid = JRequest::getInt('Itemid');
		$this->setRedirect("index.php?option=com_joomsport&controller=admin&view=admin_team&sid=".$s_id."&Itemid=".$Itemid);
	}
	
	
	
	///---------------Players--------------------------/
	function admin_player()
	{
		JRequest::setVar( 'view', 'admin_player' );
		
		
		$this->display();
	}
	function adplayer_edit()
	{
		JRequest::setVar( 'view', 'adplayer_edit' );
		JRequest::setVar( 'edit', true );
		$this->display();
	}
	
	function adplayer_add()
	{
		JRequest::setVar( 'view', 'adplayer_edit' );
		JRequest::setVar( 'edit', false );
		$this->display();
	}
	
	function adplayer_apply(){
		$this->adplayer_save(1);
	}
	
	function adplayer_save($apl = 0){
		
		$vName = 'adplayer_edit';
		$this->js_Model($vName);
		$classname = $vName."JSModel";
		$model = new $classname(1);
		$model->savAdmPlayer();
		
		$Itemid = JRequest::getInt('Itemid');
		if($apl){
			$link = "index.php?option=com_joomsport&controller=admin&view=adplayer_edit&cid[]=".$model->id."&sid=".$model->season_id."&Itemid=".$Itemid;
		}else{
			$link = "index.php?option=com_joomsport&controller=admin&view=admin_player&sid=".$model->season_id."&Itemid=".$Itemid;
		}
		//$this->setRedirect($link);
		$msg = JText::_('BLMESS_UPDSUCC');
		$typeMess = 1;
//update
		
		$this->set_sess($msg,$typeMess);
		$this->setRedirect($link);
	
	}
	
	function adplayer_del(){
		
		$vName = 'adplayer_edit';
		$this->js_Model($vName);
		$classname = $vName."JSModel";
		$model = new $classname(1);
		$model->delAdmPlayer();

		$s_id = JRequest::getVar( 'sid', 0, '', 'int' );	
		$Itemid = JRequest::getInt('Itemid');
		$this->setRedirect("index.php?option=com_joomsport&controller=admin&view=admin_player&sid=".$s_id."&Itemid=".$Itemid);
	}

	function add_ex_player(){

		$vName = 'admin_player';
		$this->js_Model($vName);
		$classname = $vName."JSModel";
		$model = new $classname(1);
		$model->SaveAdmExPl();
		
		$Itemid = JRequest::getInt('Itemid'); 
		

		$link = "index.php?option=com_joomsport&controller=admin&view=admin_player&sid=".$model->season_id."&Itemid=".$Itemid;
	
		
		$this->setRedirect($link);
	}
	
}	

?>