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

class matchday_listJSModel extends JSPRO_Models
{
	
	var $_data = null;
	var $_lists = null;
	var $_total = null;

	var $_pagination = null;
	var $limit = null;
	var $limitstart = null;

	function __construct()
	{
		parent::__construct();

		$mainframe = JFactory::getApplication();

		// Get the pagination request variables
		$this->limit		= $mainframe->getUserStateFromRequest( 'global.list.limit', 'limit', $mainframe->getCfg('list_limit'), 'int' );
		$this->limitstart	= $mainframe->getUserStateFromRequest( 'com_joomsport.limitstart_mdays', 'limitstart', 0, 'int' );
		$season_id	= $mainframe->getUserStateFromRequest( 'com_joomsport.s_id', 's_id', 0, 'int' );
		// In case limit has been changed, adjust limitstart accordingly
		$this->limitstart = ($this->limit != 0 ? (floor($this->limitstart / $this->limit) * $this->limit) : 0);
		$this->getPagination($season_id);
		
		$this->getData($season_id);
		$this->getSlist($season_id);

        $type_tourn = array();
        $type_tourn[] = JHTML::_('select.option',  0, JText::_('BLBE_GROUP'), 'id', 'name' );
        if($season_id != -1){
			$type_tourn[] = JHTML::_('select.option',  1, JText::_('BLBE_KNOCK'), 'id', 'name' );
			$type_tourn[] = JHTML::_('select.option',  2, JText::_('BLBE_DOUBLE'), 'id', 'name' );
		}
        $this->_lists['t_type'] = JHTML::_('select.genericlist',   $type_tourn, 't_type', 'class="inputbox" size="1"', 'id', 'name');
	}

	function getData($season_id)
	{
		if (empty($this->_data))
		{
			$query = $this->_buildQuery($season_id);
			$this->_data = $this->_getList($query, $this->limitstart, $this->limit);
			$error = $this->db->getErrorMsg();
			if ($error)
			{
				return JError::raiseError(500, $error);
			}
		}
		
		return $this->_data;
	}

	function getTotal($season_id)
	{
		if (empty($this->_total))
		{
			$query = $this->_buildQuery($season_id);
			$this->_total = $this->_getListCount($query);
		}

		return $this->_total;
	}
	function _getListCount($query){
		$this->db->setQuery($query);
		$tot = $this->db->loadObjectList();
		return count($tot);
	}
	
	function _getList($query,$limitstart,$limit){
		$this->db->setQuery($query,$limitstart,$limit);
		$tot = $this->db->loadObjectList();
		return $tot;
	}
	
	function getPagination($season_id)
	{
		if (empty($this->_pagination))
		{
			jimport('joomla.html.pagination');
			$this->_pagination = new JPagination( $this->getTotal($season_id), $this->limitstart, $this->limit );
		}

		return $this->_pagination;
	}

	function _buildQuery($season_id)
	{
		
		$orderby	= $this->_buildContentOrderBy($season_id);
		if($season_id == -1){
			$query ="SELECT m.*, '".JText::_('BLBE_FRIENDLYMATCH')."' as tourn FROM #__bl_matchday as m WHERE m.s_id = -1";
		}else if($season_id == 0){
			$query ="SELECT DISTINCT(m.id),m.*, IF(m.s_id = -1,'".JText::_('BLBE_FRIENDLYMATCH')."',CONCAT(t.name,' ',s.s_name)) as tourn FROM #__bl_matchday as m , #__bl_tournament as t LEFT JOIN #__bl_seasons as s ON s.t_id = t.id WHERE m.s_id = s.s_id OR m.s_id = -1";
		}else{
			$query ="SELECT m.*, CONCAT(t.name,' ',s.s_name) as tourn FROM #__bl_matchday as m , #__bl_tournament as t LEFT JOIN #__bl_seasons as s ON s.t_id = t.id WHERE m.s_id = s.s_id ".($season_id?" AND s.s_id=".$season_id:"");
		}
		$query .= $orderby;
		

		return $query;
	}

	function _buildContentOrderBy($season_id)
	{
		
		$mainframe = JFactory::getApplication();

		$this->_lists["sortfield"]	= $mainframe->getUserStateFromRequest( 'com_joomsport.md_list_field', 'sortfield', 'm.ordering', 'string' );
		$this->_lists["sortway"]	= $mainframe->getUserStateFromRequest( 'com_joomsport.md_list_way', 'sortway', 'ASC', 'string' );
		
		$orderby 	= ' ORDER BY '.$this->_lists["sortfield"].' '.$this->_lists["sortway"];
		if($season_id == -1){
			$orderby = ' ORDER BY m.id';
		}
		

		return $orderby;
	}
	
	function getSlist($season_id){
		$is_tourn = array();
		$javascript = 'onchange = "document.adminForm.limitstart.value=0;document.adminForm.submit();"';
		$query = "SELECT s.s_id as id, s_name FROM #__bl_tournament as t, #__bl_seasons as s WHERE s.t_id = t.id AND t.id={tourid} ORDER BY t.name, s.s_name";
		/*$this->db->setQuery($query);
		$tourn = $this->db->loadObjectList();
		$is_tourn[] = JHTML::_('select.option',  0, JText::_('BLBE_SELECTIONNO'), 'id', 'name' );
		$is_tourn[] = JHTML::_('select.option',  -1, JText::_('BLBE_FRIENDLYMATCH'), 'id', 'name' );
		$tourn_is = array_merge($is_tourn,$tourn);
		$this->_lists['tourn'] = JHTML::_('select.genericlist',   $tourn_is, 's_id', 'class="inputbox" size="1" '.$javascript, 'id', 'name', $season_id );
		*/
		$this->_lists['tourn'] = $this->getSeasDList($season_id, $query, 1, $javascript,1, 's_id');
	}

	
}