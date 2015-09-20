<?php die("Access Denied"); ?>#x#a:2:{s:6:"output";a:3:{s:4:"body";s:0:"";s:4:"head";a:2:{s:11:"styleSheets";a:3:{s:49:"/modules/mod_responsivegallery/css/style_dark.css";a:3:{s:4:"mime";s:8:"text/css";s:5:"media";N;s:7:"attribs";a:0:{}}s:55:"/modules/mod_responsivegallery/css/elastislide_dark.css";a:3:{s:4:"mime";s:8:"text/css";s:5:"media";N;s:7:"attribs";a:0:{}}s:54:"/modules/mod_responsivegallery/css/jquery.fancybox.css";a:3:{s:4:"mime";s:8:"text/css";s:5:"media";N;s:7:"attribs";a:0:{}}}s:7:"scripts";a:9:{s:27:"/media/jui/js/jquery.min.js";a:3:{s:4:"mime";s:15:"text/javascript";s:5:"defer";b:0;s:5:"async";b:0;}s:34:"/media/jui/js/jquery-noconflict.js";a:3:{s:4:"mime";s:15:"text/javascript";s:5:"defer";b:0;s:5:"async";b:0;}s:35:"/media/jui/js/jquery-migrate.min.js";a:3:{s:4:"mime";s:15:"text/javascript";s:5:"defer";b:0;s:5:"async";b:0;}s:30:"/media/jui/js/bootstrap.min.js";a:3:{s:4:"mime";s:15:"text/javascript";s:5:"defer";b:0;s:5:"async";b:0;}s:44:"/modules/mod_responsivegallery/js/gallery.js";a:3:{s:4:"mime";s:15:"text/javascript";s:5:"defer";b:0;s:5:"async";b:0;}s:52:"/modules/mod_responsivegallery/js/jquery.fancybox.js";a:3:{s:4:"mime";s:15:"text/javascript";s:5:"defer";b:0;s:5:"async";b:0;}s:48:"/modules/mod_responsivegallery/js/jquery.tmpl.js";a:3:{s:4:"mime";s:15:"text/javascript";s:5:"defer";b:0;s:5:"async";b:0;}s:54:"/modules/mod_responsivegallery/js/jquery.easing.1.3.js";a:3:{s:4:"mime";s:15:"text/javascript";s:5:"defer";b:0;s:5:"async";b:0;}s:55:"/modules/mod_responsivegallery/js/jquery.elastislide.js";a:3:{s:4:"mime";s:15:"text/javascript";s:5:"defer";b:0;s:5:"async";b:0;}}}s:13:"mime_encoding";s:9:"text/html";}s:6:"result";s:10776:"		<div class="moduletable">
					<h3>Image Gallery</h3>
					
			<script type="text/javascript">
			jQuery(function(){
				doTimer()
			})
			var t;
			var timer_is_on=0;

			function timedCount()
			{
			jQuery('.rg-image-nav-next').click()
			t=setTimeout("timedCount()",3000);
			}

			function doTimer()
			{
			if (!timer_is_on)
			{
			timer_is_on=1;
			timedCount(3000);
			}
			}

			function stopCount()
			{
			clearTimeout(t);
			timer_is_on=0;
			}
		</script>
		
				<style type="text/css">
				.rg-image img{
					max-height: !important;
					max-width: !important;
				} 
			</style>
		<noscript>
			<style type="text/css">
				.es-carousel273 ul{
					display:block;
				} 
			</style>
		</noscript>
		<script id="img-wrapper-tmpl" type="text/x-jquery-tmpl">	
			<div class="rg-image-wrapper">
				{{if itemsCount > 1}}
					<div class="rg-image-nav">
						<a href="#" class="rg-image-nav-prev">Previous Image</a>
						<a href="#" class="rg-image-nav-next">Next Image</a>
					</div>
				{{/if}}
				<div class="rg-image"></div>
				<div class="rg-loading"></div>
				<div class="rg-caption-wrapper">
					<div class="rg-caption" style="display:none;">
						<p></p>
					</div>
				</div>
			</div>
		</script>
			<div class="contentText" style="margin-top:0px">
		<script type="text/javascript">
			jQuery(function(){
				jQuery('#rg-gallery273').rgallery({
					module: 273,
					position: 'above',
					mode: 'carousel'
				});
			});
		</script>
				<div id="rg-gallery273" class="rg-gallery">
											<div id="buttons">
					<div class="playbutton"><a href="javascript:doTimer();"><img src="modules/mod_responsivegallery/images/playButton.png" alt="Play" alt="Play"></a></div>
					<div class="pausebutton"><a href="javascript:stopCount();"><img src="modules/mod_responsivegallery/images/pauseButton.png" alt="Pause" alt="Pause"></a></div>
						</div>
													<div class="rg-thumbs">
						<div class="es-carousel-wrapper">
							<div class="es-nav">
								<span class="es-nav-prev">Previous</span>
								<span class="es-nav-next">Next</span>
							</div>
							<div class="es-carousel">
		<style>.es-carouse273 ul li a img{
			width: 48px;
			height: 48px;			
			}
		</style>	
	<div id="gallery">		
	<ul>
		
			<li>					
				<a href="#"><img src="http://vuslinterliga.com/images/vuslgallery/vusl1.png" style="height:48px; width:48px; margin-top:-30px;" data-large="http://vuslinterliga.com/images/vuslgallery/vusl1.png" alt=" " data-description=" &nbsp;" data-href="http://vuslinterliga.com/images/vuslgallery/vusl1.png" />
				</a>
			</li>		
		
			<li>					
				<a href="#"><img src="http://vuslinterliga.com/images/vuslgallery/vusl10.png" style="height:48px; width:48px; margin-top:-30px;" data-large="http://vuslinterliga.com/images/vuslgallery/vusl10.png" alt=" " data-description=" &nbsp;" data-href="http://vuslinterliga.com/images/vuslgallery/vusl10.png" />
				</a>
			</li>		
		
			<li>					
				<a href="#"><img src="http://vuslinterliga.com/images/vuslgallery/vusl11.png" style="height:48px; width:48px; margin-top:-30px;" data-large="http://vuslinterliga.com/images/vuslgallery/vusl11.png" alt=" " data-description=" &nbsp;" data-href="http://vuslinterliga.com/images/vuslgallery/vusl11.png" />
				</a>
			</li>		
		
			<li>					
				<a href="#"><img src="http://vuslinterliga.com/images/vuslgallery/vusl12.png" style="height:48px; width:48px; margin-top:-30px;" data-large="http://vuslinterliga.com/images/vuslgallery/vusl12.png" alt=" " data-description=" &nbsp;" data-href="http://vuslinterliga.com/images/vuslgallery/vusl12.png" />
				</a>
			</li>		
		
			<li>					
				<a href="#"><img src="http://vuslinterliga.com/images/vuslgallery/vusl13.png" style="height:48px; width:48px; margin-top:-30px;" data-large="http://vuslinterliga.com/images/vuslgallery/vusl13.png" alt=" " data-description=" &nbsp;" data-href="http://vuslinterliga.com/images/vuslgallery/vusl13.png" />
				</a>
			</li>		
		
			<li>					
				<a href="#"><img src="http://vuslinterliga.com/images/vuslgallery/vusl14.png" style="height:48px; width:48px; margin-top:-30px;" data-large="http://vuslinterliga.com/images/vuslgallery/vusl14.png" alt=" " data-description=" &nbsp;" data-href="http://vuslinterliga.com/images/vuslgallery/vusl14.png" />
				</a>
			</li>		
		
			<li>					
				<a href="#"><img src="http://vuslinterliga.com/images/vuslgallery/vusl15.png" style="height:48px; width:48px; margin-top:-30px;" data-large="http://vuslinterliga.com/images/vuslgallery/vusl15.png" alt=" " data-description=" &nbsp;" data-href="http://vuslinterliga.com/images/vuslgallery/vusl15.png" />
				</a>
			</li>		
		
			<li>					
				<a href="#"><img src="http://vuslinterliga.com/images/vuslgallery/vusl16.png" style="height:48px; width:48px; margin-top:-30px;" data-large="http://vuslinterliga.com/images/vuslgallery/vusl16.png" alt=" " data-description=" &nbsp;" data-href="http://vuslinterliga.com/images/vuslgallery/vusl16.png" />
				</a>
			</li>		
		
			<li>					
				<a href="#"><img src="http://vuslinterliga.com/images/vuslgallery/vusl17.png" style="height:48px; width:48px; margin-top:-30px;" data-large="http://vuslinterliga.com/images/vuslgallery/vusl17.png" alt=" " data-description=" &nbsp;" data-href="http://vuslinterliga.com/images/vuslgallery/vusl17.png" />
				</a>
			</li>		
		
			<li>					
				<a href="#"><img src="http://vuslinterliga.com/images/vuslgallery/vusl18.png" style="height:48px; width:48px; margin-top:-30px;" data-large="http://vuslinterliga.com/images/vuslgallery/vusl18.png" alt=" " data-description=" &nbsp;" data-href="http://vuslinterliga.com/images/vuslgallery/vusl18.png" />
				</a>
			</li>		
		
			<li>					
				<a href="#"><img src="http://vuslinterliga.com/images/vuslgallery/vusl19.png" style="height:48px; width:48px; margin-top:-30px;" data-large="http://vuslinterliga.com/images/vuslgallery/vusl19.png" alt=" " data-description=" &nbsp;" data-href="http://vuslinterliga.com/images/vuslgallery/vusl19.png" />
				</a>
			</li>		
		
			<li>					
				<a href="#"><img src="http://vuslinterliga.com/images/vuslgallery/vusl2.png" style="height:48px; width:48px; margin-top:-30px;" data-large="http://vuslinterliga.com/images/vuslgallery/vusl2.png" alt=" " data-description=" &nbsp;" data-href="http://vuslinterliga.com/images/vuslgallery/vusl2.png" />
				</a>
			</li>		
		
			<li>					
				<a href="#"><img src="http://vuslinterliga.com/images/vuslgallery/vusl20.png" style="height:48px; width:48px; margin-top:-30px;" data-large="http://vuslinterliga.com/images/vuslgallery/vusl20.png" alt=" " data-description=" &nbsp;" data-href="http://vuslinterliga.com/images/vuslgallery/vusl20.png" />
				</a>
			</li>		
		
			<li>					
				<a href="#"><img src="http://vuslinterliga.com/images/vuslgallery/vusl21.png" style="height:48px; width:48px; margin-top:-30px;" data-large="http://vuslinterliga.com/images/vuslgallery/vusl21.png" alt=" " data-description=" &nbsp;" data-href="http://vuslinterliga.com/images/vuslgallery/vusl21.png" />
				</a>
			</li>		
		
			<li>					
				<a href="#"><img src="http://vuslinterliga.com/images/vuslgallery/vusl22.png" style="height:48px; width:48px; margin-top:-30px;" data-large="http://vuslinterliga.com/images/vuslgallery/vusl22.png" alt=" " data-description=" &nbsp;" data-href="http://vuslinterliga.com/images/vuslgallery/vusl22.png" />
				</a>
			</li>		
		
			<li>					
				<a href="#"><img src="http://vuslinterliga.com/images/vuslgallery/vusl23.png" style="height:48px; width:48px; margin-top:-30px;" data-large="http://vuslinterliga.com/images/vuslgallery/vusl23.png" alt=" " data-description=" &nbsp;" data-href="http://vuslinterliga.com/images/vuslgallery/vusl23.png" />
				</a>
			</li>		
		
			<li>					
				<a href="#"><img src="http://vuslinterliga.com/images/vuslgallery/vusl24.png" style="height:48px; width:48px; margin-top:-30px;" data-large="http://vuslinterliga.com/images/vuslgallery/vusl24.png" alt=" " data-description=" &nbsp;" data-href="http://vuslinterliga.com/images/vuslgallery/vusl24.png" />
				</a>
			</li>		
		
			<li>					
				<a href="#"><img src="http://vuslinterliga.com/images/vuslgallery/vusl3.png" style="height:48px; width:48px; margin-top:-30px;" data-large="http://vuslinterliga.com/images/vuslgallery/vusl3.png" alt=" " data-description=" &nbsp;" data-href="http://vuslinterliga.com/images/vuslgallery/vusl3.png" />
				</a>
			</li>		
		
			<li>					
				<a href="#"><img src="http://vuslinterliga.com/images/vuslgallery/vusl4.png" style="height:48px; width:48px; margin-top:-30px;" data-large="http://vuslinterliga.com/images/vuslgallery/vusl4.png" alt=" " data-description=" &nbsp;" data-href="http://vuslinterliga.com/images/vuslgallery/vusl4.png" />
				</a>
			</li>		
		
			<li>					
				<a href="#"><img src="http://vuslinterliga.com/images/vuslgallery/vusl5.png" style="height:48px; width:48px; margin-top:-30px;" data-large="http://vuslinterliga.com/images/vuslgallery/vusl5.png" alt=" " data-description=" &nbsp;" data-href="http://vuslinterliga.com/images/vuslgallery/vusl5.png" />
				</a>
			</li>		
		
			<li>					
				<a href="#"><img src="http://vuslinterliga.com/images/vuslgallery/vusl6.png" style="height:48px; width:48px; margin-top:-30px;" data-large="http://vuslinterliga.com/images/vuslgallery/vusl6.png" alt=" " data-description=" &nbsp;" data-href="http://vuslinterliga.com/images/vuslgallery/vusl6.png" />
				</a>
			</li>		
		
			<li>					
				<a href="#"><img src="http://vuslinterliga.com/images/vuslgallery/vusl7.png" style="height:48px; width:48px; margin-top:-30px;" data-large="http://vuslinterliga.com/images/vuslgallery/vusl7.png" alt=" " data-description=" &nbsp;" data-href="http://vuslinterliga.com/images/vuslgallery/vusl7.png" />
				</a>
			</li>		
		
			<li>					
				<a href="#"><img src="http://vuslinterliga.com/images/vuslgallery/vusl8.png" style="height:48px; width:48px; margin-top:-30px;" data-large="http://vuslinterliga.com/images/vuslgallery/vusl8.png" alt=" " data-description=" &nbsp;" data-href="http://vuslinterliga.com/images/vuslgallery/vusl8.png" />
				</a>
			</li>		
		
			<li>					
				<a href="#"><img src="http://vuslinterliga.com/images/vuslgallery/vusl9.png" style="height:48px; width:48px; margin-top:-30px;" data-large="http://vuslinterliga.com/images/vuslgallery/vusl9.png" alt=" " data-description=" &nbsp;" data-href="http://vuslinterliga.com/images/vuslgallery/vusl9.png" />
				</a>
			</li>		
		</ul>
	</div>
							</div>
						</div>
					</div>
				</div>			
			
				</div>
	";}