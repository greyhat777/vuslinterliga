<?php/*------------------------------------------------------------------------# JoomSport Professional # ------------------------------------------------------------------------# BearDev development company # Copyright (C) 2011 JoomSport.com. All Rights Reserved.# @license - http://joomsport.com/news/license.html GNU/GPL# Websites: http://www.JoomSport.com # Technical Support:  Forum - http://joomsport.com/helpdesk/-------------------------------------------------------------------------*/// no direct accessdefined( '_JEXEC' ) or die( 'Restricted access' );	if(isset($this->message)){		$this->display('message');	}global $Itemid;$Itemid = JRequest::getInt('Itemid');JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');?><?phpecho $this->lists["panel"];?><!-- <module middle> -->	<div class="module-middle dotted">				<!-- <back box> -->		<div class="back dotted">			<a href="javascript:void(0);" onclick="history.back(-1);" title="<?php echo JText::_("BL_BACK")?>">&larr; <?php echo JText::_("BL_BACK")?></a>			<div class="div_for_socbut">				<?php echo $this->lists['socbut'];?>			</div>			<div class="clear"></div>		</div>		<!-- </back box> -->				<!-- <title box> -->		<div class="title-box">			<h2><span itemprop="name"><?php echo $this->escape($this->ptitle); ?></span></h2>					</div>		<!-- </title box> -->		<!-- <tab box> -->		<ul class="tab-box">			<?php 			 require_once(JPATH_ROOT.DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.'com_joomsport'.DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'tabs.php');			 $etabs = new esTabs();			  echo $etabs->newTab(JText::_('BL_TAB_VENUE'),'etab_team','tab_star','vis');			  if(count($this->lists["photos"])){				echo $etabs->newTab(JText::_('BL_TAB_PHOTOS'),'etab_photos','photo');			  }			  			?>		</ul>	<!-- </tab box> -->	</div>	<!-- </module middle> --><!-- <content module> --><div class="content-module"><div id="etab_team_div" class="tabdiv">	<!-- <gray box> -->	<?php    //echo JHtml::_('images.getDefaultImgHTML',  $this->lists['id'],3,$this->escape($this->params->get('page_title')),$this->lists["photos"]);        echo JHtml::_('images.getViewContent',  $Itemid, $this->lists["venue"],null,$this->lists["venue"]->v_descr,3,$this->lists['photos'],'',$this->escape($this->params->get('page_title')));	?>	<div style="clear:both"></div>	</div><?phpif(count($this->lists["photos"])){	echo '<div id="etab_photos_div" class="tabdiv" style="display:none;">';	//getGalleryHTML     echo JHtml::_('images.getGalleryHTML',  $this->lists["photos"]);	echo "</div>";}?></div><input type="hidden" name="jscurtab" id="jscurtab" value="" />