		<?php setThemeDomain("zpgalleriffic"); ?>	
		<div id="footer">
			<?php if ((getOption('Allow_search')) || (function_exists('printAlbumMenu'))) { ?>
			<div id="jump-search" class="clearfix">
				<?php if (getOption('Allow_search')) { printSearchForm( '','searchform','',gettext('SEARCH'),"$_zp_themeroot/images/search-drop.png" ); } ?>
				<?php if (function_exists('printAlbumMenu')) { printAlbumMenu('jump'); } ?>			
			</div>
			<?php } ?>
				
			<div id="foot-left">
				<div id="copyright">
					<p>&copy; <?php echo getBareGalleryTitle(); ?>, <?php echo gettext('all rights reserved'); ?> <?php if (function_exists('printContactForm')) { ?> | <?php printCustomPageURL(gettext("Contact Us"),"contact"); } ?></p>
				</div>
				<div id="rsslinks">
					<span><?php echo gettext('Subscribe: '); ?></span>
					<?php 
					if (in_context(ZP_ALBUM)) { printRSSLink( "Collection","",gettext('This Album'),"  |  ", false,"rsslink" ); }
					printRSSLink( "Gallery","",(gettext('Gallery Images')),"",false,"rsslink" ); 
					if (function_exists('printZenpageRSSLink')) { printZenpageRSSLink( "News",'','  |  ',gettext('News'),'',false ); }		
					?>
				</div>	
				<?php if (getOption('show_credit')) { ?>
				<div id="zpcredit">
					<?php printZenphotoLink(); ?>
				</div>
				<?php } ?>
			</div>
		</div>
			
	</div><!-- END #CONTAINER -->
</div><!-- END #PAGE -->
<?php printAdminToolbox(); ?>		
</body>
</html>