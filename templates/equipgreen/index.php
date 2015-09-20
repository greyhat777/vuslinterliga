<?php

/**

 * @version		2.0 - 2014-02-14

 * @copyright	webunderdog.com

 * @author		Justin M. @ webunderdog.com

 * @link		http://webunderdog.com

 * @license		License GNU General Public License version 2 or later

 * @package		EquipGreen

 * @facebook 	http://www.facebook.com/webunderdog

 * @twitter	    https://twitter.com/#!/webunderdog

 */

// No direct access

defined('_JEXEC') or die;

JHtml::_('behavior.tooltip');

$doc = JFactory::getDocument();

$doc->addStyleSheet($this->baseurl . '/media/jui/css/bootstrap.min.css');

$doc->addStyleSheet($this->baseurl . '/media/jui/css/bootstrap-responsive.css');

$doc->addStyleSheet('templates/' . $this->template . '/css/style.css');

$doc->addScript('/templates/' . $this->template . '/js/main.js', 'text/javascript');

?>

<!DOCTYPE html>

<html>

<head>

    <jdoc:include type="head" />
  
	<meta property="fb:admins" content="1024990272"/>
  	<meta property="og:url" content="http://www.vuslinterliga.com/" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php require_once('snippets/mainbottom.php'); ?>

<?php require_once('snippets/utility.php'); ?>

<?php require_once('snippets/feature.php'); ?>

<?php require_once('snippets/maintop.php'); ?>

<?php require_once('snippets/maincenter.php'); ?>

<?php require_once('snippets/mainbottom.php'); ?>

<?php require_once('snippets/bottom.php'); ?>

<?php require_once('snippets/footer.php'); ?>

<?php require_once('snippets/spotlight.php'); ?>

<?php

if($this->countModules('left and right') == 0) $contentwidth = "12";

if($this->countModules('left or right') == 1) $contentwidth = "9";

if($this->countModules('left and right') == 1) $contentwidth = "6";

?>

</head>

<body>
  
  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
        <!-- header -->

        <div class="header"><div class="container"><div class='row'>
				<div id="logo"><div class='span4'><jdoc:include type="modules" name="logo" style="xhtml" /></div></div>
                <div class="phone"><div id="head1"><div class='span8'><jdoc:include type="modules" name="head1" style="xhtml" /></div></div></div>
        </div></div></div>
        
        		<!-- navigation -->
        
        <div class="navigation"><div class="container"><div class='row'>
                <div id="navmenu"><div class='span9'><jdoc:include type="modules" name="navmenu" style="xhtml" /></div></div>
                <div class="phone"><div id="icons"><div class='span3'><jdoc:include type="modules" name="icons" style="xhtml" /></div></div></div>
        </div></div></div>

	<!-- showcase -->
<?php if($this->countModules('showcase1')) : ?><div class="showcase"><div class="container"><div class='row'>
  		<div class='span10'><jdoc:include type="modules" name="showcase1" style="xhtml" /></div><?php endif; ?>
        <?php if($this->countModules('showcase2')) : ?><div class='span2'><jdoc:include type="modules" name="showcase2" style="xhtml" /></div>
 </div></div></div><?php endif; ?>

        <!-- utility -->

<div class="phone"><?php if ($this->countModules( 'utility1 or utility2 or utility3 or utility4 or utility5 or utility6' )) : ?><div class="utility"><div class="container"><div class='row'>

<?php if ($this->countModules('utility1')) {?>

<div id="utility1" class="<?php echo $utilitymodwidth ?>" ><jdoc:include type="modules" name="utility1" style="xhtml" /> </div><?php } ?>

<?php if ($this->countModules('utility2')) {?>

<div id="utility2" class="<?php echo $utilitymodwidth ?>" ><jdoc:include type="modules" name="utility2" style="xhtml" /> </div><?php } ?>

<?php if ($this->countModules('utility3')) {?>

<div id="utility3" class="<?php echo $utilitymodwidth ?>" ><jdoc:include type="modules" name="utility3" style="xhtml" /> </div><?php } ?>

<?php if ($this->countModules('utility4')) {?>

<div id="utility4" class="<?php echo $utilitymodwidth ?>" ><jdoc:include type="modules" name="utility4" style="xhtml" /> </div><?php } ?>

<?php if ($this->countModules('utility5')) {?>

<div id="utility5" class="<?php echo $utilitymodwidth ?>" ><jdoc:include type="modules" name="utility5" style="xhtml" /> </div><?php } ?>

<?php if ($this->countModules('utility6')) {?>

<div id="utility6" class="<?php echo $utilitymodwidth ?>" ><jdoc:include type="modules" name="utility6" style="xhtml" /> </div><?php } ?>

</div></div></div><?php endif; ?></div>

                <!-- feature -->

        <?php if ($this->countModules( 'feature1 or feature2 or feature3 or feature4 or feature5 or feature6' )) : ?><div class="feature"><div class="container"><div class='row'>

<?php if ($this->countModules('feature1')) {?>

<div id="feature1" class="<?php echo $featuremodwidth ?>" ><jdoc:include type="modules" name="feature1" style="xhtml" /> </div><?php } ?>

<?php if ($this->countModules('feature2')) {?>

<div id="feature2" class="<?php echo $featuremodwidth ?>" ><jdoc:include type="modules" name="feature2" style="xhtml" /> </div><?php } ?>

<?php if ($this->countModules('feature3')) {?>

<div id="feature3" class="<?php echo $featuremodwidth ?>" ><jdoc:include type="modules" name="feature3" style="xhtml" /> </div><?php } ?>

<?php if ($this->countModules('feature4')) {?>

<div id="feature4" class="<?php echo $featuremodwidth ?>" ><jdoc:include type="modules" name="feature4" style="xhtml" /> </div><?php } ?>

<?php if ($this->countModules('feature5')) {?>

<div id="feature5" class="<?php echo $featuremodwidth ?>" ><jdoc:include type="modules" name="feature5" style="xhtml" /> </div><?php } ?>

<?php if ($this->countModules('feature6')) {?>

<div id="feature6" class="<?php echo $featuremodwidth ?>" ><jdoc:include type="modules" name="feature6" style="xhtml" /> </div><?php } ?>

</div></div></div><?php endif; ?>

        <!-- maintop -->

        <?php if ($this->countModules( 'maintop1 or maintop2 or maintop3 or maintop4 or maintop5 or maintop6' )) : ?><div class="maintop"><div class="container"><div class='row'>

<?php if ($this->countModules('maintop1')) {?>

<div id="maintop1" class="<?php echo $maintopmodwidth ?>" ><jdoc:include type="modules" name="maintop1" style="xhtml" /> </div><?php } ?>

<?php if ($this->countModules('maintop2')) {?>

<div id="maintop2" class="<?php echo $maintopmodwidth ?>" ><jdoc:include type="modules" name="maintop2" style="xhtml" /> </div><?php } ?>

<?php if ($this->countModules('maintop3')) {?>

<div id="maintop3" class="<?php echo $maintopmodwidth ?>" ><jdoc:include type="modules" name="maintop3" style="xhtml" /> </div><?php } ?>

<?php if ($this->countModules('maintop4')) {?>

<div id="maintop4" class="<?php echo $maintopmodwidth ?>" ><jdoc:include type="modules" name="maintop4" style="xhtml" /> </div><?php } ?>

<?php if ($this->countModules('maintop5')) {?>

<div id="maintop5" class="<?php echo $maintopmodwidth ?>" ><jdoc:include type="modules" name="maintop5" style="xhtml" /> </div><?php } ?>

<?php if ($this->countModules('maintop6')) {?>

<div id="maintop6" class="<?php echo $maintopmodwidth ?>" ><jdoc:include type="modules" name="maintop6" style="xhtml" /> </div><?php } ?>

</div></div></div><?php endif; ?>


<?php if ($this->countModules( 'maincenter1 or maincenter2 or maincenter3 or maincenter4 or maincenter5 or maincenter6' )) : ?><div class="maincenter"><div class="container"><div class='row'>

<?php if ($this->countModules('maincenter1')) {?>

<div id="maincenter1" class="<?php echo $maincentermodwidth ?>" ><jdoc:include type="modules" name="maincenter1" style="xhtml" /> </div><?php } ?>

<?php if ($this->countModules('maincenter2')) {?>

<div id="maincenter2" class="<?php echo $maincentermodwidth ?>" ><jdoc:include type="modules" name="maincenter2" style="xhtml" /> </div><?php } ?>

<?php if ($this->countModules('maincenter3')) {?>

<div id="maincenter3" class="<?php echo $maincentermodwidth ?>" ><jdoc:include type="modules" name="maincenter3" style="xhtml" /> </div><?php } ?>

<?php if ($this->countModules('maincenter4')) {?>

<div id="maincenter4" class="<?php echo $maincentermodwidth ?>" ><jdoc:include type="modules" name="maincenter4" style="xhtml" /> </div><?php } ?>

<?php if ($this->countModules('maincenter5')) {?>

<div id="maincenter5" class="<?php echo $maincentermodwidth ?>" ><jdoc:include type="modules" name="maincenter5" style="xhtml" /> </div><?php } ?>

<?php if ($this->countModules('maincenter6')) {?>

<div id="maincenter6" class="<?php echo $maincentermodwidth ?>" ><jdoc:include type="modules" name="maincenter6" style="xhtml" /> </div><?php } ?>

</div></div></div><?php endif; ?>

        <!-- mid container - includes main content -->

        <div class="maindiv"><div class="container"><div class='row'>

        <!-- left sidebar -->

            <?php if($this->countModules('left')) : ?><div id="left"><div class='span3'>

                <jdoc:include type="modules" name="left" style="xhtml" />

            </div></div><?php endif; ?>

            <!-- main content area -->

            <div class="span<?php echo $contentwidth; ?>"><div id="maincontent">

                <?php if($this->countModules('contenttop')) : ?><jdoc:include type="modules" name="contenttop" style="xhtml" /><?php endif; ?>

                <!--<jdoc:include type="message" />-->

                <!--Start Component-->

					<?php if (JRequest::getVar('view') != 'frontpage'): ?>

					<div id="component">

					<jdoc:include type="component" />

					</div>

					<?php endif ?>

               		<!--End Component-->

                <?php if($this->countModules('contentbot')) : ?><jdoc:include type="modules" name="contentbot" style="xhtml" /><?php endif; ?>

                <?php if($this->countModules('addthis')) : ?><jdoc:include type="modules" name="addthis" style="xhtml" /><?php endif; ?>

            </div></div>

            <!-- right sidebar -->

            <?php if($this->countModules('right')) : ?><div id="right"><div class='span3'>

                <jdoc:include type="modules" name="right" style="xhtml" />

            </div></div><?php endif; ?>

        </div></div></div>

        <!-- mainbottom -->

        <?php if ($this->countModules( 'mainbottom1 or mainbottom2 or mainbottom3 or mainbottom4 or mainbottom5 or mainbottom6' )) : ?><div class="mainbottom"><div class="container"><div class='row'>

<?php if ($this->countModules('mainbottom1')) {?>

<div id="mainbottom1" class="<?php echo $mainbottommodwidth ?>" ><jdoc:include type="modules" name="mainbottom1" style="xhtml" /> </div><?php } ?>

<?php if ($this->countModules('mainbottom2')) {?>

<div id="mainbottom2" class="<?php echo $mainbottommodwidth ?>" ><jdoc:include type="modules" name="mainbottom2" style="xhtml" /> </div><?php } ?>

<?php if ($this->countModules('mainbottom3')) {?>

<div id="mainbottom3" class="<?php echo $mainbottommodwidth ?>" ><jdoc:include type="modules" name="mainbottom3" style="xhtml" /> </div><?php } ?>

<?php if ($this->countModules('mainbottom4')) {?>

<div id="mainbottom4" class="<?php echo $mainbottommodwidth ?>" ><jdoc:include type="modules" name="mainbottom4" style="xhtml" /> </div><?php } ?>

<?php if ($this->countModules('mainbottom5')) {?>

<div id="mainbottom5" class="<?php echo $mainbottommodwidth ?>" ><jdoc:include type="modules" name="mainbottom5" style="xhtml" /> </div><?php } ?>

<?php if ($this->countModules('mainbottom6')) {?>

<div id="mainbottom6" class="<?php echo $mainbottommodwidth ?>" ><jdoc:include type="modules" name="mainbottom6" style="xhtml" /> </div><?php } ?>

</div></div></div><?php endif; ?>

                <!-- spotlight -->

<?php if ($this->countModules( 'spotlight1 or spotlight2 or spotlight3 or spotlight4 or spotlight5 or spotlight6' )) : ?><div class="spotlight"><div class="container"><div class='row'>

<?php if ($this->countModules('spotlight1')) {?>

<div id="spotlight1" class="<?php echo $spotlightmodwidth ?>" ><jdoc:include type="modules" name="spotlight1" style="xhtml" /> </div><?php } ?>

<?php if ($this->countModules('spotlight2')) {?>

<div id="spotlight2" class="<?php echo $spotlightmodwidth ?>" ><jdoc:include type="modules" name="spotlight2" style="xhtml" /> </div><?php } ?>

<?php if ($this->countModules('spotlight3')) {?>

<div id="spotlight3" class="<?php echo $spotlightmodwidth ?>" ><jdoc:include type="modules" name="spotlight3" style="xhtml" /> </div><?php } ?>

<?php if ($this->countModules('spotlight4')) {?>

<div id="spotlight4" class="<?php echo $spotlightmodwidth ?>" ><jdoc:include type="modules" name="spotlight4" style="xhtml" /> </div><?php } ?>

<?php if ($this->countModules('spotlight5')) {?>

<div id="spotlight5" class="<?php echo $spotlightmodwidth ?>" ><jdoc:include type="modules" name="spotlight5" style="xhtml" /> </div><?php } ?>

<?php if ($this->countModules('spotlight6')) {?>

<div id="spotlight6" class="<?php echo $spotlightmodwidth ?>" ><jdoc:include type="modules" name="spotlight6" style="xhtml" /> </div><?php } ?>

</div></div></div><?php endif; ?>

                <!-- bottom -->

        <?php if ($this->countModules( 'bottom1 or bottom2 or bottom3 or bottom4 or bottom5 or bottom6' )) : ?><div class="bottom"><div class="container"><div class='row'>

<?php if ($this->countModules('bottom1')) {?>

<div id="bottom1" class="<?php echo $bottommodwidth ?>" ><jdoc:include type="modules" name="bottom1" style="xhtml" /> </div><?php } ?>

<?php if ($this->countModules('bottom2')) {?>

<div id="bottom2" class="<?php echo $bottommodwidth ?>" ><jdoc:include type="modules" name="bottom2" style="xhtml" /> </div><?php } ?>

<?php if ($this->countModules('bottom3')) {?>

<div id="bottom3" class="<?php echo $bottommodwidth ?>" ><jdoc:include type="modules" name="bottom3" style="xhtml" /> </div><?php } ?>

<?php if ($this->countModules('bottom4')) {?>

<div id="bottom4" class="<?php echo $bottommodwidth ?>" ><jdoc:include type="modules" name="bottom4" style="xhtml" /> </div><?php } ?>

<?php if ($this->countModules('bottom5')) {?>

<div id="bottom5" class="<?php echo $bottommodwidth ?>" ><jdoc:include type="modules" name="bottom5" style="xhtml" /> </div><?php } ?>

<?php if ($this->countModules('bottom6')) {?>

<div id="bottom6" class="<?php echo $bottommodwidth ?>" ><jdoc:include type="modules" name="bottom6" style="xhtml" /> </div><?php } ?>

</div></div></div><?php endif; ?>

        <!-- footer -->

        <?php if ($this->countModules( 'footer1 or footer2 or footer3 or footer4 or footer5 or footer6' )) : ?><div class="footer"><div class="container"><div class='row'>

<?php if ($this->countModules('footer1')) {?>

<div id="footer1" class="<?php echo $footermodwidth ?>" ><jdoc:include type="modules" name="footer1" style="xhtml" /> </div><?php } ?>

<?php if ($this->countModules('footer2')) {?>

<div id="footer2" class="<?php echo $footermodwidth ?>" ><jdoc:include type="modules" name="footer2" style="xhtml" /> </div><?php } ?>

<?php if ($this->countModules('footer3')) {?>

<div id="footer3" class="<?php echo $footermodwidth ?>" ><jdoc:include type="modules" name="footer3" style="xhtml" /> </div><?php } ?>

<?php if ($this->countModules('footer4')) {?>

<div id="footer4" class="<?php echo $footermodwidth ?>" ><jdoc:include type="modules" name="footer4" style="xhtml" /> </div><?php } ?>

<?php if ($this->countModules('footer5')) {?>

<div id="footer5" class="<?php echo $footermodwidth ?>" ><jdoc:include type="modules" name="footer5" style="xhtml" /> </div><?php } ?>

<?php if ($this->countModules('footer6')) {?>

<div id="footer6" class="<?php echo $footermodwidth ?>" ><jdoc:include type="modules" name="footer6" style="xhtml" /> </div><?php } ?>

</div></div></div><?php endif; ?>
        
        <!-- copyright -->

        <div class="copy"><div class="container"><div class='row'>

                <div class='span12'><jdoc:include type="modules" name="copy1" style="xhtml" /></div>

        </div></div></div>

</body>

</html>


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-60003658-1', 'auto');
  ga('send', 'pageview');

</script>