<?php
// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

class JoomsportViewmatch_edit extends JViewLegacy
{
	var $_model = null;
	function __construct(& $model){
		$this->_model = $model;
	}
	function display($tpl = null)
	{
		$db		= JFactory::getDBO();
		$uri	= JFactory::getURI();

		// Get data from the model
		$items		= $this->_model->_data;
		$lists		= $this->_model->_lists;
		$s_id		= $this->_model->s_id;

		$this->addToolbar($this->_model->_mode);
		
		
		// $editor = JEditor::getInstance();
		$editor = JFactory::getEditor();
		$this->assignRef('editor',		$editor);
		$this->assignRef('lists',		$lists);
		$this->assignRef('row',		$items);
		$this->assignRef('s_id',		$s_id);


		require_once(dirname(__FILE__).'/tmpl/default'.($tpl?"_".$tpl:"").'.php');
	}
	
	protected function addToolbar($edit)
	{
		$text = ( $edit ? JText::_( 'BLBE_EDIT' ) : JText::_( 'BLBE_NEW' ) );
		JToolBarHelper::title( JText::_( 'BLBE_MATCH' ).': <small><small>[ '. $text.' ]</small></small>', 'match.png' );
		
		JToolBarHelper::apply('match_apply');
		JToolBarHelper::save('match_save');
		if ( $edit ) {
			JToolBarHelper::back();
		} else {
			JToolBarHelper::back();
		}
		
	}
}