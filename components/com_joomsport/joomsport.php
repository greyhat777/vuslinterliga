<?php/** http://www.BearDev.com */// no direct accessdefined('_JEXEC') or die('Restricted access');// Require specific controller if requested$task = JRequest::getVar('task', null, 'default', 'cmd');$tmpl = JRequest::getVar( 'tmpl', '', 'get', 'string' );if($task != 'add_comment' && $task != 'del_comment' && $task != 'get_format' && $tmpl != 'component'){	/////	$js_err_mess = null;	function JS_errMess(){		$session =  JFactory::getSession();		$buffMess = null;		$errMess = $session->get('errMess','');		$typeMess = $session->get('typeMess','');		$session->set('errMess','');		$session->set('typeMess','');		if($errMess && $typeMess){			$style_font = '';			switch($typeMess){				case 1:					$left_img = "mesSucs_l.png";					$right_img = 'mesSucs_r.png';					$center_img = 'mesSucs_c.png';					break;				case 2:					$left_img = "mesErs_l.png";					$right_img = 'mesErs_r.png';					$center_img = 'mesErs_c.png';					$style_font = 'color:#FFF;';				break;				case 3:					$left_img = "mesWars_l.png";					$right_img = 'mesWars_r.png';					$center_img = 'mesWars_c.png';				break;				default: break;			}			$buffMess .= "\n<div class=\"error_message\">";				$buffMess .="\n\t<div class=\"error_message_l\" style=\"background:url(components/com_joomsport/img/contain/".$left_img.") no-repeat;\">";					$buffMess .="\n\t<div style=\"background:url(components/com_joomsport/img/contain/".$right_img.") 100% no-repeat;\">";						$buffMess .="\n\t<div class=\"error_message_c\" style=\"background:url(components/com_joomsport/img/contain/".$center_img.") repeat-x;\"><div class=\"error_message_style\" style=\"".$style_font."\">".$errMess."</div></div>";					$buffMess .="\n\t</div>";				$buffMess .="\n\t</div>";			$buffMess .= "\n</div>";			return $buffMess;		}	}	$js_err_mess = JS_errMess();	echo $js_err_mess;	////	echo '<div id="wr-module">';}if($controller = JRequest::getWord('controller')) {	$path = JPATH_COMPONENT.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR.$controller.'.php';	if (file_exists($path) && $controller) {		require_once $path;	} else {		$controller = '';		require_once(JPATH_COMPONENT.DIRECTORY_SEPARATOR.'controller.php');	}}else {		$controller = '';		require_once(JPATH_COMPONENT.DIRECTORY_SEPARATOR.'controller.php');	}// Create the controller$classname	= 'JoomsportController'.ucfirst($controller);$controller = new $classname( );$seasid = JRequest::getVar( 'seasid', 0, '', 'int' );$sid = JRequest::getVar( 'sid', 0, '', 'int' );if($seasid && !$sid){	JRequest::setVar( 'sid', $seasid );}// Perform the Request task$controller->execute(JRequest::getVar('task', null, 'default', 'cmd'));// Redirect if set by the controller$controller->redirect(); ?><?php if($task != 'add_comment' && $task != 'del_comment' && $task != 'get_format' && $tmpl != 'component'){?>	<!-- <corner> -->	<div class="wr-module-corner tl"><!-- --></div>	<div class="wr-module-corner tr"><!-- --></div>	<div class="wr-module-corner bl"><!-- --></div>	<div class="wr-module-corner br"><!-- --></div><!-- </corner> --></div><?php } ?>