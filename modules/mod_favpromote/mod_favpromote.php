<?php 
/**
* @file
* @brief    Responsive FavPromote Module
* @author   FavThemes
* @version  1.4
* @remarks  Copyright (C) 2013 FavThemes
* @remarks  Licensed under GNU/GPLv3, see http://www.gnu.org/licenses/gpl-3.0.html
* @see      http://www.favthemes.com/
*/

// no direct access

defined('_JEXEC') or die;

$moduleBgColor            = $params->get('moduleBgColor');
$moduleBorder             = $params->get('moduleBorder');
$moduleBorderRadius       = $params->get('moduleBorderRadius');
$uploadImage              = $params->get('uploadImage');
$imageAlt                 = $params->get('imageAlt');
$moduleLink               = $params->get('moduleLink');
$moduleTarget             = $params->get('moduleTarget');
$paragraphText            = $params->get('paragraphText');
$paragraphTextColor       = $params->get('paragraphTextColor');
$paragraphTextFontSize    = $params->get('paragraphTextFontSize');
$paragraphTextLineHeight  = $params->get('paragraphTextLineHeight');
$paragraphTextAlign       = $params->get('paragraphTextAlign');
$titleText                = $params->get('titleText');
$titleIcon                = $params->get('titleIcon');
$titleIconFontSize        = $params->get('titleIconFontSize');
$titleIconVerticalAlign   = $params->get('titleIconVerticalAlign');
$titleColor               = $params->get('titleColor');
$titleBgColor             = $params->get('titleBgColor');
$titlePadding             = $params->get('titlePadding');
$titleFontSize            = $params->get('titleFontSize');
$titleLineHeight          = $params->get('titleLineHeight');
$titleTextAlign           = $params->get('titleTextAlign');

JHTML::stylesheet('modules/mod_favpromote/theme/favpromote.css');
JHTML::stylesheet('modules/mod_favpromote/theme/FontAwesome/css/font-awesome.css');

$rv = rand(0,1000);

?>

<style type="text/css">

    .favpromote<?php echo $rv; ?> {
        background-color: #<?php echo $moduleBgColor; ?>;
        border: 1px solid #<?php echo $moduleBorder; ?>;
        -webkit-border-radius: <?php echo $moduleBorderRadius; ?>;
        -moz-border-radius: <?php echo $moduleBorderRadius; ?>;
        border-radius: <?php echo $moduleBorderRadius; ?>;
      }
    .favpromote<?php echo $rv; ?>:hover { 
        background-color: #<?php echo $titleBgColor; ?>; 
      }

</style>

<div id="favpromote" class="favpromote<?php echo $rv; ?>" >

  <div 
    id="favpromote-uploadimage"
    style="height:100%; text-align: center;">
      <a href="<?php echo $moduleLink; ?>" target="_<?php echo $moduleTarget; ?>">
        <?php if ($uploadImage) { ?>
          <img src="<?php echo $uploadImage; ?>" 
          alt="<?php echo $imageAlt; ?>"/>
        <?php } else { ?>
          <img src="modules/mod_favpromote/demo/demo-image.jpg" />
        <?php } ?>
      </a>
  </div>

  <p 
    id="favpromote-text" 
    style="color: #<?php echo $paragraphTextColor; ?>;
          font-size: <?php echo $paragraphTextFontSize; ?>;
          line-height: <?php echo $paragraphTextLineHeight; ?>;
          text-align: <?php echo $paragraphTextAlign; ?>;">
            <?php echo $paragraphText; ?>
  </p>

  <h3 
    id="favpromote-title"
    style="margin-bottom:0;
          background-color: #<?php echo $titleBgColor; ?>;
          padding: <?php echo $titlePadding; ?>;
          font-size: <?php echo $titleFontSize; ?>;
          line-height: <?php echo $titleLineHeight; ?>;
          text-align: <?php echo $titleTextAlign; ?>;">
      <i class="fa <?php echo $titleIcon; ?>"
        style="color: #<?php echo $titleColor; ?>;
              font-size: <?php echo $titleIconFontSize; ?>;
              vertical-align: <?php echo $titleIconVerticalAlign; ?>; "></i>
      <a href="<?php echo $moduleLink; ?>" target="_<?php echo $moduleTarget; ?>"
        style="color: #<?php echo $titleColor; ?>";>
        <?php echo $titleText; ?>
      </a>
  </h3>

</div>