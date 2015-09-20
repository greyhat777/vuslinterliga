<?php

// no direct access
defined('_JEXEC') or die;



class JHtmlImages
{


    static function getPlayerThumb($id,$type,$name = null,$ptags = 0,$height=29){
        $width = $height;
        $html = '';
        $gef = JHtmlImages::getDefaultEmbl($id,$type);

        if($gef && is_file('media/bearleague/'.$gef)){
            $html = '<div class="team-embl" style="margin-right:8px;line-height: 0;"><img class="team-embl  player-ico" '.(JHtmlImages::getImgPop($gef,5,$height,$width)).' alt="'.$name.'" /></div>'.($ptags?'<p class="player-name" style="display: table-cell;padding-left:7px;">':"");//line-height: 29px; ?? --- delete
        }else{
            $html = '<img class="player-ico" src="'.JURI::base().'components/com_joomsport/img/ico/season-list-player-ico.gif" width="30" height="30" alt="">'.($ptags?'<p class="player-name">':"");
        }

        return $html;
    }


    static function getTeamEmbl($id, $type, $name = null,$ptags = 0,$height=29){
        $width = $height;
        $html = '';
        $embl = JHtmlImages::getDefaultEmbl($id,$type);

        if($embl && is_file('media/bearleague/'.$embl)){
            $html =  '<div class="team-embl" style="margin-right:8px;"><img player-ico" '.(JHtmlImages::getImgPop($embl,5,$height,$width)).' style="max-width: none;" alt="'.$name.'" /></div>'.($ptags?'<p class="player-name" style="display: table-cell;padding-left:7px;">':"");
        }else{
            $html =  '<img class="player-ico" src="'.JURI::base().'components/com_joomsport/img/ico/players-ico.png" width="30px" height="30px" style="max-width: none;" alt="">'.($ptags?'<p class="player-name">':"");
        }
        return $html;
    }

    static function getClubEmbl($id, $type, $name = null,$ptags = 0,$height=29){
        $width = $height;
        $html = '';
        $embl = JHtmlImages::getDefaultEmbl($id,$type);

        if($embl && is_file('media/bearleague/'.$embl)){
            $html =  '<div class="team-embl" style="margin-right:8px;"><img player-ico" '.(JHtmlImages::getImgPop($embl,5,$height,$width)).' style="max-width: none;" alt="'.$name.'" /></div>'.($ptags?'<p class="player-name" style="display: table-cell;padding-left:7px;">':"");
        }else{
            $html =  '<img class="player-ico" src="'.JURI::base().'components/com_joomsport/img/ico/players-ico.png" width="30px" height="30px" style="max-width: none;" alt="">'.($ptags?'<p class="player-name">':"");
        }
        return $html;
    }


    static public function getDefaultEmbl($id,$type){
        $db		= JFactory::getDBO();
        $def_img2 = '';
        switch($type){
            case 0:///player

                $query = "SELECT def_img FROM #__bl_players WHERE id = ".$id;
                $db->setQuery($query);
                $pl_def = $db->loadResult();

                if($pl_def){
                    $query = "SELECT ph_filename FROM  #__bl_photos as p WHERE p.id = ".$pl_def;
                    $db->setQuery($query);
                    $def_img2 = $db->loadResult();
                }
                if(!$def_img2){
                    $query = "SELECT p.ph_name as name,p.id as id,p.ph_filename as filename FROM #__bl_assign_photos as ap, #__bl_photos as p WHERE ap.photo_id = p.id AND cat_type = 1 AND cat_id = ".$id;
                    $db->setQuery($query);
                    $photos2 = $db->loadObjectList();
                    if(isset($photos2[0])){
                        $def_img2 = $photos2[0]->filename;
                    }
                }
                return $def_img2;
                break;
            case 1:///team
                $query = "SELECT t_emblem FROM #__bl_teams WHERE id = ".$id;
                $db->setQuery($query);
                $t_embl = $db->loadResult();
                return $t_embl;
                break;
            case 2:///venue

                break;
            case 3:///club

                $query = "SELECT def_img FROM #__bl_club WHERE id = ".$id;
                $db->setQuery($query);
                $pl_def = $db->loadResult();

                if($pl_def){
                    $query = "SELECT ph_filename FROM  #__bl_photos as p WHERE p.id = ".$pl_def;
                    $db->setQuery($query);
                    $def_img2 = $db->loadResult();
                }
                if(!$def_img2){
                    $query = "SELECT p.ph_name as name,p.id as id,p.ph_filename as filename FROM #__bl_assign_photos as ap, #__bl_photos as p WHERE ap.photo_id = p.id AND cat_type = 6 AND cat_id = ".$id;
                    $db->setQuery($query);
                    $photos2 = $db->loadObjectList();
                    if(isset($photos2[0])){
                        $def_img2 = $photos2[0]->filename;
                    }
                }
                return $def_img2;
                break;
            default:break;
        }
    }


    static function getDefaultImgHTML($id,$type,$title = null,$photos = null){
        $db		= JFactory::getDBO();
		$def_img = '';
        $html = '';
        switch($type){
            case 0:// player
                $query = "SELECT def_img FROM #__bl_players WHERE id = ".$id;
                $db->setQuery($query);
                $def_img_val = $db->loadResult();

                $def_img = '';
                if($def_img_val){
                    $query = "SELECT ph_filename FROM  #__bl_photos as p WHERE p.id = ".$def_img_val;
                    $db->setQuery($query);
                    $def_img = $db->loadResult();
                }else if(isset($photos[0])){
                    $def_img = $photos[0]->filename;
                }

                if($def_img && is_file('media/bearleague/'.$def_img)){
                    $imgsize = getimagesize('media/bearleague/'.$def_img);
                    if($imgsize[0] > 200){
                        $width = 200;
                    }else{
                        $width  = $imgsize[0];
                    }

                    $html = '<a rel="lightbox-imgsportsingle" href="'.JHtmlImages::getImgPop($def_img).'" class="gray-box-img"><img itemprop="image" '.JHtmlImages::getImgPop($def_img,3).' width="'.$width.'" alt="'.$title->first_name.' '.$title->last_name.'" /></a>';
                }else{
                    $html = '<img itemprop="image" src="'.JURI::base().'media/bearleague/player_st.png" width="200" alt="" style="margin-bottom:18px;" />';
                }

                return $html;
                break;
            case 1://team

                $query = "SELECT def_img FROM #__bl_teams WHERE id = ".$id;
                $db->setQuery($query);
                $def_img_val = $db->loadResult();

                if($def_img_val){
                    $query = "SELECT ph_filename FROM  #__bl_photos as p WHERE p.id = ".$def_img_val;
                    $db->setQuery($query);
                    $def_img = $db->loadResult();
                }else if(isset($photos[0])){
                    $def_img = $photos[0]->filename;
                }

                if(!empty($def_img) && is_file('media/bearleague/'.$def_img)){

                    $imgsize = getimagesize('media/bearleague/'.$def_img);
                    if($imgsize[0] > 200){
                        $width = 200;
                    }else{
                        $width  = $imgsize[0];
                    }

                    $html = '<a rel="lightbox-imgsportteam" href="'.(JHtmlImages::getImgPop($def_img)).'"  class="gray-box-img"><img '.(JHtmlImages::getImgPop($def_img,3)).' width="'.$width.'" alt="'.$title.'" /></a>';
                }else{
                    $html = '<img src="'.JURI::base().'media/bearleague/teams_st.png" width="200" alt="'.$title.'" style="margin-bottom:18px;" />';
                }

                return $html;
                break;
            case 3:

                $query = "SELECT v_defimg FROM #__bl_venue WHERE id = ".$id;
                $db->setQuery($query);
                $v_defimg = $db->loadResult();

                if($v_defimg){
                    $query = "SELECT ph_filename FROM  #__bl_photos as p WHERE p.id = ".$v_defimg;
                    $db->setQuery($query);
                    $def_img = $db->loadResult();
                }else if(isset($photos[0])){
                    $def_img = $photos[0]->filename;
                }

                if($def_img && is_file('media/bearleague/'.$def_img)){

                    $imgsize = getimagesize('media/bearleague/'.$def_img);
                    if($imgsize[0] > 200){
                        $width = 200;
                    }else{
                        $width  = $imgsize[0];
                    }

                    $html = '<a rel="lightbox-imgsportteam" itemprop="image" href="'.JHtmlImages::getImgPop($def_img).'"  class="gray-box-img"><img '.JHtmlImages::getImgPop($def_img,3).' width="'.$width.'" alt="'.$title.'" /></a>';
                }else{
                    $html = '<img src="'.JURI::base().'media/bearleague/teams_st.png" width="200" alt="'.$title.'" />';
                }
                return $html;
                break;
			case 4: 
				$query = "SELECT def_img FROM #__bl_club WHERE id = ".$id;
                $db->setQuery($query);
                $v_defimg = $db->loadResult();

                if($v_defimg){
                    $query = "SELECT ph_filename FROM  #__bl_photos as p WHERE p.id = ".$v_defimg;
                    $db->setQuery($query);
                    $def_img = $db->loadResult();
                }else if(isset($photos[0])){
                    $def_img = $photos[0]->filename;
                }

                if($def_img && is_file('media/bearleague/'.$def_img)){

                    $imgsize = getimagesize('media/bearleague/'.$def_img);
                    if($imgsize[0] > 200){
                        $width = 200;
                    }else{
                        $width  = $imgsize[0];
                    }

                    $html = '<a rel="lightbox-imgsportteam" itemprop="image" href="'.JHtmlImages::getImgPop($def_img).'"  class="gray-box-img"><img '.JHtmlImages::getImgPop($def_img,3).' width="'.$width.'" alt="'.$title.'" /></a>';
                }else{
                    $html = '<img src="'.JURI::base().'media/bearleague/teams_st.png" width="200" alt="'.$title.'" />';
                }
                return $html;
			break;
            default:break;
        }
    }


    static function getGalleryHTML($photos){
        $html = '';

        $html .= '<ul class="player-gallery">';
        for($i=0;$i<count($photos);$i++){
            $photo = $photos[$i];

            $html .= '<li><a rel="lightbox-imgsport" title="'.htmlspecialchars($photo->name).'" href="'.(JHtmlImages::getImgPop($photo->filename)).'" class="team-images"><img '.(JHtmlImages::getImgPop($photo->filename,2)).' height="100" class="allimages" alt="'.htmlspecialchars($photo->name).'" title="'.htmlspecialchars($photo->name).'" /></a></li>';

        }
        $html .= "</ul>";

        return $html;
    }

//resize images
   static function getImgPop($img,$thumb_type = 0,$height=0,$width=0){

        $link = ($thumb_type != 6)?('media/bearleague/'.$img):('media/bearleague/events/'.$img);

        $fileDetails = ($thumb_type != 6)?pathinfo(JURI::base().'/media/bearleague/'.$img):(pathinfo(JURI::base().'/media/bearleague/events/'.$img));
        $img_types = array('png','gif','jpg','jpeg');
        $ext = strtolower($fileDetails["extension"]);
        $adit_par = '';

        if (is_file(JPATH_ROOT.'/media/bearleague/'.$img) || is_file(JPATH_ROOT.'/media/bearleague/events/'.$img)){
            $size = ($thumb_type != 6)?getimagesize(JPATH_ROOT.'/media/bearleague/'.$img):getimagesize(JPATH_ROOT.'/media/bearleague/events/'.$img);
            switch($thumb_type){
                case '1': //player list, team list
                    $max_height = 29;
                    $max_width = 29;

                    break;
                case '2': //photo gallery
                    $max_height = 100;
                    //hack width
                    $max_width = 1000;
                    $size[0] = 1;

                    break;
                case '3': //main photo team, player
                    //hack height
                    $max_height = 100;
                    $size[1] = 1;
                    $max_width = 198;
                    break;
                case '4': //tournament logo
                    //hack height
                    $max_height = 100;
                    $size[1] = 1;
                    $max_width = 100;
                    break;
                case '5': //player list, team list
                    $max_height = $height;
                    $max_width = $width;

                    break;
                case '6': //player list, team list
                    $max_height = 32;
                    $max_width = 32;

                    break;
                default:
                    $max_height = 500;
                    $max_width = 600;
                    if(in_array(strtolower($ext),$img_types)){
                        if($size[0] > $max_width && $size[0] >= $size[1]){
                            $link = JURI::base().'/index.php?option=com_joomsport&task=imgres&src='.$link.'&w='.$max_width;
                        }else if($size[1] > $max_height && $size[1] >= $size[0]){
                            $link = JURI::base().'/index.php?option=com_joomsport&task=imgres&src='.$link.'&h='.$max_height;
                        }
                    }
                    return $link;


            }
            if(in_array(strtolower($ext),$img_types)){
                if($size[0] > $max_width && $size[0] >= $size[1]){                    
                    $link = JURI::base().'/index.php?option=com_joomsport&task=imgres&src='.$link.'&w='.$max_width;
                }else if($size[1] > $max_height && $size[1] >= $size[0]){                    
                    $link = JURI::base().'/index.php?option=com_joomsport&task=imgres&src='.$link.'&h='.$max_height;
                }
            }else{
                if($size[0] >= $size[1]){
                    $adit_par = ' width="'.$max_width.'" ';
                }else{
                    $adit_par = ' height="'.$max_height.'" ';
                }
            }

        }
        $res = ' src="'.$link.'" '.$adit_par;
        return $res;
    }

    /*Content------>*/
    static function getViewContent($Itemid,$lay_name,$ext_fields,$about,$type,$photo = null,$teams = null,$title = null,$venue = null){
        //$db		=& JFactory::getDBO();
        $html = '<div class="gray-box">';
        
        switch($type){
            case 0://player
                $html .= JHtml::_('images.getDefaultImgHTML',  $lay_name->id,0,$title,$photo);
                $html .='<table cellpadding="0" cellspacing="0" border="0" class="adf-fields-table">
						<tr>
							<td>'.JText::_("BL_NAME").':</td>
							<td>'.$lay_name->first_name." ".$lay_name->last_name.'</td>
						</tr>';
						if($lay_name->country){
						$html .= '<tr>
							<td></td>
							<td>';
                           $url =  'components/com_joomsport/img/flags/'.strtolower($lay_name->ccode).'.png';
                            if(file_exists($url)){
                                $html .= '<img src="'.JURI::base().$url.'" alt="'.$lay_name->country.'" title="'.$lay_name->country.'" />';
                            }
						$html .='&nbsp;&nbsp;'.$lay_name->country.'</td>
						</tr>';
						 }
						 if($teams){
							$html .= '
								<tr>
									<td>'.(count(explode(',',$teams))>1?JText::_("BL_TEAMZ"):JText::_("BLFA_TEAM")).':</td>
									<td>'.$teams.'</td>
								</tr>
								
							';
						 }
						if($lay_name->nick) {
                            $html .= '<tr>
							<td>
								'.JText::_("BL_NICK").':
							</td>
							<td>
								'.$lay_name->nick.'
							</td>
						</tr>';
                        }
                break;
            case 1://team
                $html .= JHtml::_('images.getDefaultImgHTML',  $lay_name->id,1,$title,$photo);
                $html .= '<table cellpadding="0" cellspacing="0" border="0" class="adf-fields-table">';
						if($lay_name->t_city){
				$html .= '<tr>
							<td width="100" class="team_info">
								'.JText::_('BLFA_CITY').':
							</td>
							<td>
								'.$lay_name->t_city.'
							</td>
						</tr>';
						}
						if($lay_name->club_name){
						 $link = JRoute::_("index.php?option=com_joomsport&task=club&id=".$lay_name->club_id."&Itemid=".$Itemid);
						$loc = '<a href="'.$link.'" title="'.$lay_name->club_name.'">'.$lay_name->club_name.'</a>';
				$html .= '<tr>
							<td width="100" class="team_info">
								'.JText::_('BLFA_CLUB').':
							</td>
							<td>
								'.$loc.'
							</td>
						</tr>';
						}
                break;
            case 3://venue
                $html .= JHtml::_('images.getDefaultImgHTML',  $lay_name->id,3,$title,$photo);
                $html .= '<table cellpadding="0" cellspacing="0" border="0" class="adf-fields-table">';
				if($lay_name->v_address){
				$html .= '<tr>
					<td width="100" class="team_info">'.JText::_('BLFA_VADDRESS').':&nbsp;</td>
					<td>
						'.$lay_name->v_address .'
					</td>
				</tr>';
				}
                break;
			case 4: 
				$html .= JHtml::_('images.getDefaultImgHTML',  $lay_name->id,4,$title,$photo);
				$html .= '<table cellpadding="0" cellspacing="0" border="0" class="adf-fields-table">';
				break;

        }

        $html .= $ext_fields;///extra fields

        if(!empty($venue)){//Venue
            if(!empty($venue->v_name)){
                $html .= '<tr>';

                $link = JRoute::_("index.php?option=com_joomsport&task=venue&id=".$venue->id."&Itemid=".$Itemid);
                $loc = '<a href="'.$link.'" title="'.$venue->v_name.'">'.$venue->v_name.'</a>';

                $html .= '<td width="100" class="team_info">'.JText::_('BLFA_VENUE').':</td>
                        <td>'.$loc.'</td>
                    </tr>';
            }
        }
        $html .= '  </table>
                    <div class="gray-box-cr tl"><!-- --></div>
					    <div class="gray-box-cr tr"><!-- --></div>
					    <div class="gray-box-cr bl"><!-- --></div>
					    <div class="gray-box-cr br"><!-- --></div>
			    </div>';

        $html .= '<div class="jscontent">';
            if($about){
                JPluginHelper::importPlugin('content');
                $dispatcher = JDispatcher::getInstance();
                $results = @$dispatcher->trigger('onContentPrepare', array ('content'));
                $about = JHTML::_('content.prepare', $about);
            }
            $html .= $about;///description

        if(isset($lay_name->v_coordx) && isset($lay_name->v_coordy)){
            $html .= '<p>';

			if($lay_name->v_coordx && $lay_name->v_coordy){

            $html .= '<div id="venue_gmap"></div>
                <script type="text/javascript">
                    function initialize() {
                        var myLatlng = new google.maps.LatLng('.$lay_name->v_coordx.', '.$lay_name->v_coordy.');

                        var myOptions = {
                            zoom: 12,
                            center: myLatlng,
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                        }
                        var map = new google.maps.Map(document.getElementById("venue_gmap"), myOptions);
                        var marker = new google.maps.Marker({
                            position: myLatlng,
                            title:"'.htmlspecialchars($lay_name->v_name).'"
                        });

                        // To add the marker to the map, call setMap();
                        marker.setMap(map);
                    }

                    function loadScriptik() {
                        var script = document.createElement("script");
                        script.type = "text/javascript";
                        script.src = "http://maps.google.com/maps/api/js?sensor=false&callback=initialize";
                        document.body.appendChild(script);
                    }

                    window.onload = loadScriptik;
                </script>';


            }

			$html .= '</p>';
        }

        $html .= '</div>';

        return $html;

    }
}
