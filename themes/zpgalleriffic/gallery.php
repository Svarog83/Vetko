<?php include ("header.php"); ?>
<?php setThemeDomain("zpgalleriffic"); ?>
		<div id="headline" class="clearfix">	
			<div class="headline-text"><?php printGalleryDesc(true); ?></div>
			<table id="navbar" class="clr">
					<tr>
						<td width="100%">
							<div id="navbar-center">
								<span>
									<?php echo gettext('Gallery Stats: ').$_zp_gallery->getNumImages().gettext(' Images in ').$_zp_gallery->getNumAlbums().gettext(' Albums'); ?>
								</span>
							</div>
						</td>
					</tr>
			</table>
		</div>
		
		<div id="album-wrap" class="clearfix">
			<ul>
				<?php $x=1; while (next_album()): $lastcol=""; 
				if ($x==3) {$lastcol=" class='lastcol'"; $x=0;} ?>
				<li<?php echo $lastcol; ?>>		
					<a class="album-thumb" href="<?php echo htmlspecialchars(getAlbumLinkURL());?>" title="<?php echo gettext('View album:'); ?> <?php echo getBareAlbumTitle();?>"><?php printCustomAlbumThumbImage(getBareAlbumTitle(),NULL,267,100,267,100); ?></a>
					<h4><a href="<?php echo htmlspecialchars(getAlbumLinkURL());?>" title="<?php echo gettext('View album:'); ?> <?php echo getBareAlbumTitle();?>"><?php printAlbumTitle(); ?></a></h4>
				</li>
				<?php $x++; endwhile; ?>					
			</ul>
		</div>
		
		<div id="pagination">
			<?php printPageListWithNav( '&lsaquo; Previous','Next &rsaquo;',false,'true','clearfix','',true,'5' ); ?>
		</div>
		
		<?php if ( (function_exists('printLatestNews')) && ((getNumNews()) > 0) ) {
		if ( (getOption('zp_latestnews') > 0) && (is_numeric(getOption('zp_latestnews'))) ) { ?>
		<div id="home-latestnews" class="clearfix">
			<?php if (getOption('show_cats')) { ?>
			<div class="extra-content">
				<?php printAllNewsCategories( 'All News',true,'news-cat-list','news-cat-active' ); ?>
			</div>	
			<?php } ?>
			<?php if (is_numeric(getOption('zp_latestnews_trunc'))) { $latesttrunc = getOption('zp_latestnews_trunc'); } else { $latesttrunc = 400; } ?>
			<?php printLatestNews( getOption('zp_latestnews'),'none','',true,true,$latesttrunc,true ); ?>
		</div>
		<?php } 
		} ?>
		
		<?php if ( ((getOption('image_statistic')!='none')) && (((function_exists('printImageStatistic')) || (getOption('image_statistic')=='random'))) ) { ?>
		<?php include("image_statistic.php"); ?>
		<?php } ?>
		
<?php include("footer.php"); ?>