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
// No direct access.
defined('_JEXEC') or die;

require(dirname(__FILE__).'/../models.php');

class team_menuJSModel extends JSPRO_Models
{
	
	var $_data = null;

	var $_total = null;

	var $_pagination = null;
	var $limit = null;
	var $limitstart = null;
	var $seas_id = null;

	function __construct()
	{
		parent::__construct();
		JHtml::_('behavior.framework');
		$mainframe = JFactory::getApplication();
		
		$this->seas_id = JRequest::getVar( 'seas_id', null, 'get', 'int' );
		$this->session =  JFactory::getSession();

		if(!empty($this->seas_id) or $this->seas_id == '0'){
			$this->session->set('sid_pt', $this->seas_id);
		}else{
			$this->seas_id = $this->session->get('sid_pt');
		}
		// Get the pagination request variables
		$this->limit		= $mainframe->getUserStateFromRequest( 'global.list.limit', 'limit', $mainframe->getCfg('list_limit'), 'int' );
		$this->limitstart	= $mainframe->getUserStateFromRequest( 'com_joomsport.limitstart', 'limitstart', 0, 'int' );

		// In case limit has been changed, adjust limitstart accordingly
		$this->limitstart = ($this->limit != 0 ? (floor($this->limitstart / $this->limit) * $this->limit) : 0);
		$this->getPagination();
		$this->getData();
	}

	function getData()
	{
		if (empty($this->_data))
		{
			$query = $this->_buildQuery();
			$this->_data = $this->_getList($query, $this->limitstart, $this->limit);
		}
		
		return $this->_data;
	}

	function getTotal()
	{
		if (empty($this->_total))
		{
			$query = $this->_buildQuery();
			$this->_total = $this->_getListCount($query);
		}

		return $this->_total;
	}
	function _getListCount($query){
		$this->db->setQuery($query);
		$tot = $this->db->loadObjectList();
		return count($tot);
	}
	
	function _getList($query){
		$this->db->setQuery($query);
		$tot = $this->db->loadObjectList();
		return $tot;
	}
	
	function getPagination()
	{
		if (empty($this->_pagination))
		{
			jimport('joomla.html.pagination');
			$this->_pagination = new JPagination( $this->getTotal(), $this->limitstart, $this->limit );
		}

		return $this->_pagination;
	}

	function _buildQuery()
	{
	// $seas_id = JRequest::getVar( 'seas_id', 0, 'get', 'int' );

		$orderby	= $this->_buildContentOrderBy();
		if($this->seas_id == 0){
			$query = ' SELECT * '
				. ' FROM #__bl_teams as t'
				. $orderby
			;
		}else{
			$query = " SELECT * "
				. " FROM #__bl_teams as t, #__bl_season_teams as st WHERE st.season_id = '".$this->seas_id."' AND st.team_id = t.id"
				. $orderby
			;
		}

		return $query;
	}

	function _buildContentOrderBy()
	{
		
		$mainframe = JFactory::getApplication();

		$filter_order		= $mainframe->getUserStateFromRequest( 'com_joomsport.filter_order',		'filter_order',		't.t_name',	'cmd' );
		$filter_order_Dir	= $mainframe->getUserStateFromRequest( 'com_joomsport.filter_order_Dir',	'filter_order_Dir',	'',				'word' );

		// sanitize $filter_order
		if (!in_array($filter_order, array('t.t_name', 'published','id'))) {
			$filter_order = 't.t_name';
		}

		if (!in_array(strtoupper($filter_order_Dir), array('ASC', 'DESC'))) {
			$filter_order_Dir = '';
		}

		
		$orderby 	= ' ORDER BY '.$filter_order.' '.$filter_order_Dir;
		

		return $orderby;
	}

}