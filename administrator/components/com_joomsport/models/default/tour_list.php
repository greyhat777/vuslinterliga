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

class tour_listJSModel extends JSPRO_Models
{
	
	var $_data = null;

	var $_total = null;
	var $_lists = null;

	var $_pagination = null;
	var $limit = null;
	var $limitstart = null;

	function __construct()
	{
		parent::__construct();

		$mainframe = JFactory::getApplication();

		// Get the pagination request variables
		$this->limit		= $mainframe->getUserStateFromRequest( 'global.list.limit', 'limit', $mainframe->getCfg('list_limit'), 'int' );
		$this->limitstart	= $mainframe->getUserStateFromRequest( 'com_joomsport.limitstart_tours', 'limitstart', 0, 'int' );

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
			$error = $this->db->getErrorMsg();
			if ($error)
			{
				return JError::raiseError(500, $error);
			}
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
	
	function _getList($query,$limitstart,$limit){
		$this->db->setQuery($query,$limitstart,$limit);
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

		$orderby	= $this->_buildContentOrderBy();

		$query = ' SELECT * '
			. ' FROM #__bl_tournament '
			. $orderby
		;

		return $query;
	}

	function _buildContentOrderBy()
	{
		
		$mainframe = JFactory::getApplication();

		$this->_lists["sortfield"]	= $mainframe->getUserStateFromRequest( 'com_joomsport.tourn_list_field', 'sortfield', 'name', 'string' );
		$this->_lists["sortway"]	= $mainframe->getUserStateFromRequest( 'com_joomsport.tourn_list_way', 'sortway', 'ASC', 'string' );
		
		$orderby 	= ' ORDER BY '.$this->_lists["sortfield"].' '.$this->_lists["sortway"];
		

		return $orderby;
	}
	
	//delete tourn
	function delTourn($cid){
		if(count($cid)){
			$cids = implode(',',$cid);
			$query = "DELETE FROM `#__bl_tournament` WHERE id IN (".$cids.")";
			$this->db->setQuery($query);
			$this->db->query();
			
			$query = "SELECT s_id FROM #__bl_seasons WHERE t_id IN (".$cids.")";
			$this->db->setQuery($query);
			$sid = $this->db->loadColumn();
			
			$query = "DELETE FROM `#__bl_seasons` WHERE t_id IN (".$cids.")";
			$this->db->setQuery($query);
			$this->db->query();
			
			if(count($sid)){
				//mdays
				$sids = implode(',',$sid);
				$query = "SELECT id FROM #__bl_matchday WHERE s_id IN (".$sids.")";
				$this->db->setQuery($query);
				$mdid = $this->db->loadColumn();
				
				
				$query = "DELETE FROM `#__bl_matchday` WHERE s_id IN (".$sids.")";
				$this->db->setQuery($query);
				$this->db->query();

                if(count($mdid)){
                    $mdids = implode(',',$mdid);
                    $query = "SELECT id FROM #__bl_match WHERE m_id IN (".$mdids.")";
                    $this->db->setQuery($query);
                    $mids = $this->db->loadColumn();

                    $query = "DELETE FROM `#__bl_match` WHERE m_id IN (".$mdids.")";
                    $this->db->setQuery($query);
                    $this->db->query();
                    //$query = "DELETE p,ap,m FROM #__bl_photos as p, #__bl_assign_photos as ap,#__bl_match as m  WHERE p.id = ap.photo_id AND ap.cat_type = 3 AND ap.cat_id = m.id AND m_id IN (".$mdids.")";
                    //$this->db->setQuery($query);
                    //$this->db->query();
                    $this->db->setQuery("DELETE p,ap FROM #__bl_photos as p, #__bl_assign_photos as ap WHERE p.id = ap.photo_id AND ap.cat_type = 3 AND ap.cat_id IN (".implode(',',$mids).")");
                    $this->db->query();
                }
			}
			
		}
	}

}