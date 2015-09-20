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
	if(isset($this->message)){
		$this->display('message');
	}
	$row = $this->row;
	$lists = $this->lists;
	$Itemid = JRequest::getInt('Itemid');

$new_tmp = '';
if (! empty($this->lists['team_reg'])) {
    $tmp = array_map('addslashes', $this->lists['team_reg']);
    $new_tmp = "'" . implode("','",$tmp) . "'";
}
if(count($lists['ext_fields'])){
	foreach($lists['ext_fields'] as $ext){
		if($ext->reg_require == 1){
			$arr_extra[] = $ext->id;
		}
	}
	$extra_id = isset($arr_extra)?"'" . implode("','",$arr_extra) . "'":'';
}
//print_R($extra_id);
?>
<script type="text/javascript">
function confirmDelete(pressbutton) {
	var arrId = new Array(<?php echo $extra_id;?>);
	var tagName = document.getElementsByName('t_name')[0].value; 
	var msg;

	var arrTeam = new Array(<?php echo $new_tmp;?>)
			
		for(var i=0;i<arrTeam.length;i++){
			if(arrTeam[i] == tagName){
				 msg = 1;
			}
			
		}//////
		for(var i=0;i<arrId.length;i++){
			valExtra = document.getElementsByName('extraf['+arrId[i]+']')[0].value;
			if(valExtra==""){
				//document.getElementsByName('extraf['+arrId[i]+']')[0].style.borderColor="red !important";
				document.getElementsByName('extraf['+arrId[i]+']')[0].style.setProperty ("border-color", "red", "important");
				return;
			}
		}	/////////
		if(msg){
			if (confirm('<?php echo JText::_('BLFA_WARNTEAM')?>')) {
				submitform( pressbutton );
							return;
			} else {
				return false;
			}
		}else{
			submitform( pressbutton );
							return;
		}
		
}
</script>

<script type="text/javascript">
function bl_submit(task,chk){
	if(chk == 1 && document.adminForm.boxchecked.value == 0){
		alert('<?php echo JText::_('BLFA_SELECTITEM')?>');
	}else{
		document.adminForm.task.value = task;
		document.adminForm.submit();	
	}
}
function delete_logo(){
			getObj("logoiddiv").innerHTML = '';
		}	
</script>

<?php
echo $lists["panel"];
?>

<!-- <module middle> -->
<div class="module-middle solid">
	
	<!-- <back box> -->
	<!-- <div class="back dotted"><a href="#" title="Back">&larr; Back</a></div> -->
	<!-- </back box> -->
	<div class="title-box padd-bot">
			<h2>
				<?php echo $row->id?JText::_('BLFA_TEAM_EDIT'):JText::_('BLFA_NTEAM');?>
			</h2>
			<?php if($this->acl == 2):?>
			<div class="select-wr">
				<form action='<?php echo JURI::base();?>index.php?option=com_joomsport&task=team_edit&controller=moder&Itemid=<?php echo $Itemid?>' method='post' name='chg_team'>
					<div style="position:relative;text-align: right;"><span class='down'><!-- --></span><?php echo $this->lists['tm_filtr'];?></div>
					<?php if(isset($this->lists['seass_filtr_nofr'])){ ?>
					<div style="position:relative;text-align: right;"><?php echo $this->lists["tourn_name"];?><span class='down'><!-- --></span><?php echo $this->lists['seass_filtr_nofr'];?></div>
					<?php }?>
					<input type="hidden" name="jscurtab" id="jscurtab" value="<?php echo $this->lists['jscurtab'];?>" />
				</form>
			</div>
			<?php endif;?>
	</div>
	<?php if($this->lists['waiting_players_count']){?>
	<div style="margin-bottom:10px;padding-left:15px;">
<!--UPDATE-->
		<span><?php echo JText::_('BLFA_APPROVE').":";?></span>
		<ul>
		<?php 
		
			for($i=0;$i<count($this->lists['waiting_players_count']);$i++){
			?>
				<li><a href="<?php echo JURI::base();?>index.php?option=com_joomsport&task=team_edit&controller=moder&tid=<?php echo $row->id;?>&moderseason=<?php echo $this->lists['waiting_players_count'][$i]->s_id;?>&jscurtab=etab_pl"><?php echo $this->lists['waiting_players_count'][$i]->s_name." (".$this->lists['waiting_players_count'][$i]->kol.")";?></a></li>
			<?php }?>
		</ul>
	</div>
	<?php 
		}?>
	<!-- <tab box> -->
		<?php if($this->acl == 1){?>
		<ul class="tab-box">
			<?php
			require_once(JPATH_ROOT.DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.'com_joomsport'.DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'tabs.php');
			$etabs = new esTabs();
			echo $etabs->newTab(JText::_('BLFA_TEAM'),'etab_team','star','vis');
			echo $etabs->newTab(JText::_('BLFA_PLAYER'),'etab_pl','players');
			?>
		</ul>
		<?php }else{ ?>
		<ul class="tab-box-main">
			<li class="active"><a href="<?php echo JRoute::_('index.php?option=com_joomsport&controller=moder&view=edit_team&tid='.$row->id."&Itemid=".$Itemid);?>" title=""><span><img src="<?php echo JURI::base();?>components/com_joomsport/img/spacer.gif" width="16" height="16" class="star" /><?php echo JText::_('BLFA_TEAM')?></span></a></li>

			<?php if(! empty($lists["moder_matchday"])): ?>
			<li><a href="<?php echo JRoute::_( 'index.php?option=com_joomsport&controller=moder&view=edit_matchday&tid='.$row->id.'&Itemid='.$Itemid )?>" title=""><span><img src="<?php echo JURI::base();?>components/com_joomsport/img/spacer.gif" width="16" height="16" /><?php echo JText::_('BLFA_MATCHDAY')?></span></a></li>
			<?php endif;?>
			<?php if($lists['moder_addplayer']){ ?>
			<li><a href="<?php echo JRoute::_( 'index.php?option=com_joomsport&controller=moder&view=admin_player&tid='.$row->id.'&Itemid='.$Itemid)?>" title=""><span><img class="players" src="<?php echo JURI::base();?>components/com_joomsport/img/spacer.gif" width="16" height="16" /><?php echo JText::_('BLFA_PLAYER')?></span></a></li>
			<?php } ?>
			
		</ul>
		<?php } ?>
		<!-- </tab box> -->
	
</div>
<!-- </module middle> -->
<!-- <control bar> -->
<div class="control-bar-wr dotted">
	<ul class="control-bar">
		<li>
			<a class="save" href="#" title="<?php echo JText::_('BLFA_SAVE')?>" onclick="javascript:submitbutton('team_save');return false;"><?php echo JText::_('BLFA_SAVE')?></a>
		</li>
		<?php if($this->acl == 1):?>
		<li><a class="delete" href="<?php echo JRoute::_("index.php?option=com_joomsport&controller=admin&view=admin_team&sid=".$lists["s_id"]."&Itemid=".$Itemid);?>" title="<?php echo JText::_('BLFA_CLOSE')?>"><?php echo JText::_('BLFA_CLOSE')?></a></li>
		<?php endif;?>
	</ul>
</div>
<!-- </control bar> -->
<?php if($this->acl == 2):?>
<!-- <tab box> -->
<div class="module-middle solid">
		<ul class="tab-box">
			<?php
			 require_once(JPATH_ROOT.DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.'com_joomsport'.DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'tabs.php');

			 $etabs = new esTabs();
			  echo $etabs->newTab(JText::_('BLFA_TEAM'),'etab_team','star',($this->lists['jscurtab'] == 'etab_team')?'vis':"");
			  if(isset($this->lists['seass_filtr']) || !empty($this->lists['is_friendly_season'])) {
				echo $etabs->newTab(JText::_('BLFA_TEAMPLAYER'),'etab_pl','players',($this->lists['jscurtab'] == 'etab_pl')?'vis':"");
			  }
			?>
		</ul>
</div>		
<!-- </tab box> -->
<?php endif;?>
<!-- <content module> -->
	<div class="content-module admin-mo-co">

<?php 
        $fCity = $this->_model->getCustomField('team_city', array('team_id' => $Itemid));
		//$editor =& JFactory::getEditor();
		JHTML::_('behavior.tooltip');
		?>
		<script type="text/javascript">
		
		function submitbutton(pressbutton) {
			var form = document.adminForm;
			var arrId = new Array(<?php echo $extra_id;?>);
			if (pressbutton == 'team_save' || pressbutton == 'team_apply') {
				
				
				if(form.t_name.value != ""){
					<?php if (! (empty($fCity['enabled']) || empty($fCity['required']))): ?>
					if (form.t_city.value.trim() == "") {
				        alert("<?php echo JText::_("BLFA_ENTERCITY"); ?>");
				        return;
				    }
				    <?php endif; ?>
					var team_n = "<?php echo htmlspecialchars($row->t_name);?>";
					
					if(!team_n){
						confirmDelete(pressbutton);
						
					}else{						
						for(var i=0;i<arrId.length;i++){
							valExtra = document.getElementsByName('extraf['+arrId[i]+']')[0].value;
							if(valExtra==""){
								//document.getElementsByName('extraf['+arrId[i]+']')[0].style.borderColor="red !important";
								document.getElementsByName('extraf['+arrId[i]+']')[0].style.setProperty ("border-color", "red", "important");
								return;
							}
						}					
						submitform( pressbutton );
						return;
					}
				}else{	
					alert("<?php echo JText::_("BLFA_ENTERNAME")?>");	
				}
			}else{
				
				submitform( pressbutton );
					return;
			}
			
			
		}	
		function addplayer(){
			if(getObj('playerz_id').value == 0){
				alert("<?php echo JText::_("BLFA_JSMDNOT5");?>");
				return false;
			}

			var tbl = getObj('add_pl');
			var row = tbl.insertRow(tbl.rows.length-1);
			var cell1 = document.createElement("td");
			var cell2 = document.createElement("td");
			
			var input_hd = document.createElement('input');
			input_hd.type = 'hidden';
			input_hd.name = 'teampl[]';
			input_hd.value = getObj('playerz_id').value;

			cell1.innerHTML = '<a href="javascript: void(0);" onClick="javascript:Delete_tbl_row(this); return false;" title="<?php echo JText::_('BLFA_DELETE');?>"><img src="components/com_joomsport/img/ico/close.png"  border="0" alt="Delete"></a>';
			cell1.appendChild(input_hd);
			cell2.innerHTML = getObj('playerz_id').options[getObj('playerz_id').selectedIndex].text;
			row.appendChild(cell1);
			row.appendChild(cell2);
			
			if('<?php echo $this->acl;?>' == '2'){
				if('<?php echo isset($lists['esport_invite_player'])?$lists['esport_invite_player']:0;?>' == '1'){
					var cell3 = document.createElement("td");
					cell3.style.textAlign = 'center';
					cell3.align = "center";
					cell3.innerHTML = '<img src="components/com_joomsport/img/ico/negative.png" width="20" border="0" alt="">';
					row.appendChild(cell3);
				}
			}
            //getObj('playerz_id').innerHTML = 'Select Player';
			
		}
		function inviteemail(){
			var regex = /^[a-zA-Z0-9._-]+(\+[a-zA-Z0-9._-]+)*@([a-zA-Z0-9.-]+\.)+[a-zA-Z0-9.-]{2,4}$/;
			if (!regex.test(getObj('invemail').value)){
				alert("Incorrect email");
				return false;
			}
			var tbl = getObj('initetbl');
			var row = tbl.insertRow(tbl.rows.length-1);
			var cell1 = document.createElement("td");
			var cell2 = document.createElement("td");
			cell1.innerHTML = '<a href="javascript: void(0);" onClick="javascript:Delete_tbl_row(this); return false;" title="<?php echo JText::_('BLFA_DELETE');?>"><img src="components/com_joomsport/img/ico/close.png"  border="0" alt="Delete"></a>';
			cell2.innerHTML = getObj('invemail').value;
			var input_hd = document.createElement('input');
			input_hd.type = 'hidden';
			input_hd.name = 'emlinv[]';
			input_hd.value = getObj('invemail').value;
			cell2.appendChild(input_hd);
			row.appendChild(cell1);
			row.appendChild(cell2);
			getObj('invemail').value = "";
		}
		</script>
		<form action="" method="post" name="adminForm" id="adminForm" class="form-validate" enctype="multipart/form-data">
		<div id="etab_team_div" class="tabdiv" <?php echo ($this->lists['jscurtab'] != 'etab_team')?"style='display:none;'":""?>>
		<table class="season-list" cellpadding="0" cellspacing="0" border="0">
			<tr>
				<td width="100">
					<span class="editlinktip hasTip" title="<?php echo JText::_( 'BLFA_TEAMNAME' ); ?>::<?php echo JText::_( 'BLFA_TT_TEAMNAME' );?>"><?php echo JText::_( 'BLFA_TT_TEAMNAME' ); ?>
					<img src="components/com_joomsport/img/quest.jpg" border="0" /></span>
				</td>
				<td>
					<input type="text" class="feed-back inp-big" maxlength="255" size="60" name="t_name" value="<?php echo htmlspecialchars($row->t_name)?>" />
				</td>
			</tr>
        	<?php if ($fCity['enabled']): ?>
			<tr>
				<td width="100">
					<span class="editlinktip hasTip" title="<?php echo JText::_( 'BLFA_CITY' ); ?>::<?php echo JText::_( 'BLFA_TT_CITY' );?>"><?php echo JText::_( 'BLFA_CITY' ); ?>
					<img src="components/com_joomsport/img/quest.jpg" border="0" /></span>
				</td>
				<td>
					<input type="text" maxlength="255" class="feed-back inp-big" size="60" name="t_city" value="<?php echo htmlspecialchars($row->t_city)?>" />
				</td>
			</tr>
			<?php endif; ?>

			<?php	
		
			for($p=0;$p<count($lists['ext_fields']);$p++){
			if($lists['ext_fields'][$p]->field_type == '3' && !isset($lists['ext_fields'][$p]->selvals)){
			}else{
				if($lists['s_id'] > 0 && $lists['ext_fields'][$p]->season_related){
			?>
			<tr>
				<td width="100">
					<?php echo $lists['ext_fields'][$p]->name;?>
				</td>
				<td>
					<?php
					
						switch($lists['ext_fields'][$p]->field_type){
								
							case '1':	echo $lists['ext_fields'][$p]->selvals;
										break;
							case '2':	echo $this->editor->display( 'extraf['.$lists['ext_fields'][$p]->id.']',  htmlspecialchars(isset($lists['ext_fields'][$p]->fvalue_text)?($lists['ext_fields'][$p]->fvalue_text):"", ENT_QUOTES), '550', '300', '60', '20', array('pagebreak', 'readmore', 'image') ) ;
										break;
							case '3':	echo '<div class="selectsty"><span class="down"><!-- --></span>'.$lists['ext_fields'][$p]->selvals.'</div>';
										break;	
							case '0':					
							default:	echo '<input type="text" class="feed-back inp-big'.($lists['ext_fields'][$p]->reg_require?' required':'').'" maxlength="255" size="60" name="extraf['.$lists['ext_fields'][$p]->id.']" value="'.(isset($lists['ext_fields'][$p]->fvalue)?htmlspecialchars($lists['ext_fields'][$p]->fvalue):"").'" />';		
										break;
								
						}
					?>
					<input type="hidden" name="extra_ftype[<?php echo $lists['ext_fields'][$p]->id;?>]" value="<?php echo $lists['ext_fields'][$p]->field_type?>" />
					<input type="hidden" name="extra_id[<?php echo $lists['ext_fields'][$p]->id;?>]" value="<?php echo $lists['ext_fields'][$p]->id?>" />
				</td>
			</tr>
			<?php	
				}else if(!$lists['ext_fields'][$p]->season_related && $lists['ext_fields'][$p]->reg_exist){ ?>
					<tr>
						<td width="100">
							<?php echo $lists['ext_fields'][$p]->name;?>
						</td>
						<td>
							<?php
							
								switch($lists['ext_fields'][$p]->field_type){
										
									case '1':	echo $lists['ext_fields'][$p]->selvals;
												break;
									case '2':	echo $this->editor->display( 'extraf['.$lists['ext_fields'][$p]->id.']',  htmlspecialchars(isset($lists['ext_fields'][$p]->fvalue_text)?($lists['ext_fields'][$p]->fvalue_text):"", ENT_QUOTES), '550', '300', '60', '20', array('pagebreak', 'readmore', 'image') ) ;
												break;
									case '3':	echo '<div class="selectsty"><span class="down"><!-- --></span>'.$lists['ext_fields'][$p]->selvals.'</div>';
												break;	
									case '0':					
									default:	echo '<input type="text" class="feed-back inp-big'.($lists['ext_fields'][$p]->reg_require?' required':'').'" maxlength="255" size="60" name="extraf['.$lists['ext_fields'][$p]->id.']" value="'.(isset($lists['ext_fields'][$p]->fvalue)?htmlspecialchars($lists['ext_fields'][$p]->fvalue):"").'" />';		
												break;
										
								}
							?>
							<input type="hidden" name="extra_ftype[<?php echo $lists['ext_fields'][$p]->id;?>]" value="<?php echo $lists['ext_fields'][$p]->field_type?>" />
							<input type="hidden" name="extra_id[<?php echo $lists['ext_fields'][$p]->id;?>]" value="<?php echo $lists['ext_fields'][$p]->id?>" />
						</td>
					</tr>
					
					
			<?php }
			}
			}
			?>
			
			<tr>
				<td valign="top">
					<?php echo JText::_( 'BLFA_TEAM_LOGO' ); ?>
					<span class="editlinktip hasTip" title="<?php echo JText::_( 'BLFA_TEAM_LOGO' ); ?>::<?php echo JText::_( 'BLFA_TT_TEAM_LOGO' );?>"><img src="components/com_joomsport/img/quest.jpg" border="0" /></span>
				</td>
				<td>
					<input type="file" name="t_logo" class="feed-back inp-small" />
					
					<button class="send-button" onclick="javascript:submitbutton('<?php echo ($this->acl == 1)?'team_apply':'team_save';?>');" ><span><?php echo JText::_( 'BLFA_UPLOAD' ); ?></span></button>
					<br />
					<?php
					
					if($row->t_emblem && is_file('media/bearleague/'.$row->t_emblem)){
						echo '<div id="logoiddiv" style="padding-top:5px;">
						<div class="wrapper-avatar-top">
							<div class="wrapper-avatar">
								<div class="wrapper-avatar-bottom">
									<a class="close" href="javascript:void(0);" title="'.JText::_( 'BLFA_REMOVE' ).'" onclick="javascript:delete_logo();">X<!-- --></a>
									<input type="hidden" name="istlogo" value="1" />
									<img width="120" src="'.JURI::base().'media/bearleague/'.$row->t_emblem.'" />
								</div>
							</div>
						</div>';
						?>
					<!--</div>-->
					<?php
					}
					?>
		        </td>
			</tr>
			<tr>
				<td width="100">
					<?php echo JText::_( 'BLFA_ABOUT_TEAM' ); ?>
					<span class="editlinktip hasTip" title="<?php echo JText::_( 'BLFA_ABOUT_TEAM' ); ?>::<?php echo JText::_( 'BLFA_TT_ABOUT_TEAM' );?>"><img src="components/com_joomsport/img/quest.jpg" border="0" /></span>
				</td>
				<td>
					<?php  echo $this->editor->display( 't_descr',  htmlspecialchars($row->t_descr, ENT_QUOTES), '550', '300', '60', '20', array('pagebreak', 'readmore') ) ;  ?>
					
				</td>
			</tr>
		</table>
		<br />
		<div style="margin-top:10px;border:1px solid #BBB;">
		<table style="padding:10px;" class="season-list">
			<tr>
				<td>
				</td>
			</tr>
			<tr>
				<td>
					<?php echo JText::_( 'BLFA_UPLFOTO' ); ?>
					<span class="editlinktip hasTip" title="<?php echo JText::_( 'BLFA_UPLFOTO' ); ?>::<?php echo JText::_( 'BLFA_TT_UPLOAD_PHOTO' );?>"><img src="components/com_joomsport/img/quest.jpg" border="0" /></span>
				</td>
			</tr>
			<tr>
				<td>
				<input type="file" name="player_photo_1" value="" class="feed-back inp-small" id="player_photo_1"/>
				</td>
			</tr>
			<tr>
				<td>
				<input type="file" name="player_photo_2" value="" class="feed-back inp-small" id="player_photo_2"/>
				</td>
			</tr>
			<tr>
				<td>
					<button class="send-button" id="player_photo"><span><?php echo JText::_( 'BLFA_UPLOAD' ); ?></span></button>
					
				</td>
			</tr>
		</table>
            <script type="text/javascript">
                var photo1 = document.getElementById("player_photo_1");
                var photo2 = document.getElementById("player_photo_2");
                var but_on = document.getElementById("player_photo");
                var serv_sett = <?php echo $lists['post_max_size'];?>;
                but_on.onclick = function() {
                    if(photo1.files[0]){
                        var size_img =  photo1.files[0].size;
                    }else if(photo2.files[0]){
                        var size_img =  photo2.files[0].size;
                    }

                    if(size_img > serv_sett){
                        alert("Image too big (change settings post_max_size)"); return false;
                    }else{submitbutton('<?php echo ($this->acl == 1)?'team_apply':'team_save';?>');}
                };
            </script>
		<?php
		if(count($lists['photos'])){
		?>
		<table class="adminlist">
			<tr>
				<th class="title" width="30"><?php echo JText::_( 'BLFA_DELETE' ); ?></th>
				<th class="title" width="30"><?php echo JText::_( 'BLFA_DEFAULT' ); ?></th>
				<th class="title" ><?php echo JText::_( 'BLFA_TITLE' ); ?></th>
				<th class="title" width="250"><?php echo JText::_( 'BLFA_IMAGE' ); ?></th>
			</tr>
			<?php
			foreach($lists['photos'] as $photos){
			if(is_file(JPATH_ROOT.'/media/bearleague/'.$photos->filename)){
			?>
			<tr>
				<td align="center">
					<a href="javascript:void(0);" title="<?php echo JText::_( 'BLFA_REMOVE' ); ?>" onClick="javascript:Delete_tbl_row(this);"><img src="<?php echo JURI::base();?>components/com_joomsport/img/ico/close.png" title="<?php echo JText::_( 'BLFA_REMOVE' ); ?>" /></a>
				</td>
				<td align="center">
					<?php
					$ph_checked = ($row->def_img == $photos->id) ? 'checked="true"' : "";
					
					?>
					<input type="radio" name="ph_default" value="<?php echo $photos->id;?>" <?php echo $ph_checked?>/>
					<input type="hidden" name="photos_id[]" value="<?php echo $photos->id;?>"/>
				</td>
				<td>
					<input type="text" maxlength="255" size="60" name="ph_names[]" value="<?php echo htmlspecialchars($photos->name)?>" />
				</td>
				<td align="center">
					<?php
					$imgsize = getimagesize(JPATH_ROOT.'/media/bearleague/'.$photos->filename);
					if($imgsize[0] > 200){
						$width = 200;
					}else{
						$width  = $imgsize[0];
					}
					?>
					<a rel="lightbox-imgsport" href="<?php echo getImgPop($photos->filename)?>" title="Image"><img src="<?php echo JURI::base();?>media/bearleague/<?php echo $photos->filename?>" width="<?php echo $width;?>" /></a>
				</td>
			</tr>
			<?php
			}
			}
			?>
		</table>
		<?php
		}
		?>
		</div>
		</div>
		<?php if($this->acl == 1){?>
				<div id="etab_pl_div" class="tabdiv" style="display:none;">
				<?php
				echo '<table class="season-list" cellpadding="0" cellspacing="0" border="0" id="add_pl">';
				echo '<tr>';
				echo '<th class="title" width="30">#</th>';
				echo '<th class="title">'.JText::_('BLFA_PLAYER').'</th>';
				echo '</tr>';
				for($i=0;$i<count($lists['team_players']);$i++){
					$pl = $lists['team_players'][$i];
					echo '<tr class="'.($i%2?"":"gray").'"><td><a href="javascript: void(0);" onClick="javascript:Delete_tbl_row(this); return false;" title="'.JText::_('BLFA_DELETE').'"><img src="components/com_joomsport/img/ico/close.png"  border="0" alt="Delete"></a><input type="hidden" name="teampl[]" value="'.$pl->id.'" /></td><td>'.$pl->name.'</td></tr>';
				}
				?>
					<tr>
						<td colspan="2">
							<div class="div_for_styled"><span class='down'><!-- --></span><?php echo $lists['player']; ?>
							<button class="send-button" onclick="addplayer();return false;" style="cursor:pointer;" /><span><b><?php echo JText::_('BLFA_ADD');?></b></span></button>
							</div>
						</td>
					</tr>
				</table>
				</div>
				
				<input type="hidden" name="option" value="com_joomsport" />
				<input type="hidden" name="controller" value="admin" />
				<input type="hidden" name="task" value="edit_team" />
				<input type="hidden" name="id" value="<?php echo $row->id?>" />
				<input type="hidden" name="boxchecked" value="0" />
				<input type="hidden" name="sid" value="<?php echo $lists["s_id"];?>" />
				<input type="hidden" name="jscurtab" id="jscurtab" value="" />
		<?php }else{ ?>	
			<?php
			if(isset($this->lists['seass_filtr']) || !empty($this->lists['is_friendly_season'])) {
			?>
			
			<div id="etab_pl_div" class="tabdiv" <?php echo ($this->lists['jscurtab'] != 'etab_pl')?"style='display:none;'":""?>>
			<?php
			echo '<table class="season-list" cellpadding="0" cellspacing="0" border="0" id="add_pl">';
			echo '<tr>';
			echo '<th class="title" width="30">#</th>';
			echo '<th class="title">'.JText::_('BLFA_PLAYER').'</th>';
			if($lists['esport_invite_player']){
				echo '<th class="title" width="50">'.JText::_('BLFA_CONFIRMED').'</th>';
			}
			echo '</tr>';
			for($i=0;$i<count($lists['team_players']);$i++){
				$pl = $lists['team_players'][$i];
				echo '<tr class="'.($i%2?"":"gray").'">';
				echo '<td><a href="javascript: void(0);" onClick="javascript:Delete_tbl_row(this); return false;" title="'.JText::_('BLFA_DELETE').'"><img src="components/com_joomsport/img/ico/close.png"  border="0" alt="Delete"></a><input type="hidden" name="teampl[]" value="'.$pl->id.'" /></td>';
				echo '<td>'.$pl->name.'</td>';
				if($lists['esport_invite_player']){
					$imgs = ($pl->confirmed == 0)?'ico/active.png':'ico/negative.png';
					echo '<td align="center" style="text-align:center;"><img src="components/com_joomsport/img/'.$imgs.'" border="0" alt=""></td>';
				}
				echo '</tr>';
			}
			?>
				<tr>
					<td colspan="3">
						<div class="div_for_styled"><span class='down'><!-- --></span><?php echo $lists['player']; ?>
						<button class="send-button" onclick="addplayer();return false;" >
							<span>
								<?php if($lists['esport_invite_player']){echo JText::_( 'BLFA_INVITE' );}else{echo JText::_( 'BLFA_ADD' );} ?>
							</span>
						</button>
						</div>
					</td>
				</tr>
			</table>
			<?php if($lists['esport_invite_unregister']){?>
			<br />
			<?php echo JText::_("BLFA_INVITEUNREG");?>
			<table id="initetbl" class="season-list">
				<tr>
					<td colspan="2">
						<input type="text" id="invemail" name="invemail" value="" class="feed-back inp-small" />
						<button class="send-button" onclick="inviteemail();return false;" ><span><?php echo JText::_( 'BLFA_INVITE' ); ?></span></button>
					</td>
				</tr>
				
			</table>
			<?php } ?>
			
			<?php if($lists['esport_join_team'] && count($lists["waiting_players"])){?>
			<br />
			<?php echo JText::_("BLFA_WAITINGAPPROVAL");?>
			<table>
				<?php for($z=0;$z<count($lists["waiting_players"]);$z++){?>
				<tr>
					<td>
					<!--UPDATE-->
						<input type="hidden" name="appr_pl[]" value="<?php echo $lists["waiting_players"][$z]->id;?>" /><?php echo $lists["waiting_players"][$z]->name;?>
					</td>
					<td>
						<?php echo JHTML::_('select.genericlist',   $lists["arr_action"], 'action_'.$lists["waiting_players"][$z]->id, 'class="inputbox" size="1"', 'id', 'name', 0 );?>
					</td>
				</tr>
				<?php }?>
				
			</table>
			<?php } ?>
			</div>
			<?php } ?>
			<input type="hidden" name="option" value="com_joomsport" />
			<input type="hidden" name="controller" value="moder" />
			<input type="hidden" name="task" value="edit_team" />
			<input type="hidden" name="boxchecked" value="0" />
			<input type="hidden" name="tid" value="<?php echo $row->id;?>" />
		<?php }?>		
		
		<?php echo JHTML::_( 'form.token' ); ?>
		</form>
</div>