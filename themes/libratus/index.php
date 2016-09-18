<?php include ('inc-header.php'); ?>
		
		<?php if ($_zp_page == 1) { ?>
		<div id="ss-wrap" style="cursor: pointer;" title="Click to open the album">
			<ul id="cbp-bislideshow" class="cbp-bislideshow">
				<?php
				/**
				 * @var $image Image
				 */
				$images = getImageStatistic(5,getOption('libratus_ss_type'),getOption('libratus_ss_album'),true);
				foreach ($images as $image) {

					/**
					 * @var $album Album
					 */
					$album = $image->getAlbum();
					$url = $album->getLink();
					$title = $album->getTitle();

					echo '<li title="Test title">';
					//echo '<a href="'.$url.'" title="'.html_encode($title).'">';
					$html = '<img src="' . html_encode(pathurlencode($image->getCustomImage(1200,null,null,null,null,null,null,true))) . '" title="'.$url.'" albumTitle="'.html_encode($album->getTitle()).'"  alt="' . html_encode($image->getTitle()) . '" />';
					echo zp_apply_filter('custom_image_html', $html, false);
					//echo '</a>';
					echo '</li>';
				} ?>
			</ul>
		<?php } else { ?>
		<div id="ss-noshow" style="background-image: linear-gradient(rgba(0, 0, 0, 0.75),rgba(0, 0, 0, 0.75)), url(<?php echo $bg; ?>);">
		<?php } ?>
			
			<div id="home-logo">
				<div class="inner pad">
					<h1 id="logo-text" ></h1>
				</div>
			</div>
			
			<div id="home-bar">
				<div id="gal-desc-wrap">
					<?php if (getGalleryDesc()) { ?>
					<div id="gal-desc">
						<div class="inner pad">
							<div><span id="index_title"><?php echo getGalleryDesc(); ?></span></div>
						</div>
					</div>
					<?php } ?>
					<div class="inner pad">
						<div id="cbp-bicontrols" class="cbp-bicontrols">	
							<span class="cbp-biprev"></span>
							<span class="cbp-bipause"></span>
							<span class="cbp-binext"></span>
						</div>
					</div>
				</div>

				<div class="bar">
					<div class="inner">
						<?php echo $quickmenu; ?>
						<div class="pad" id="breadcrumb"><a href="<?php echo getGalleryIndexURL(); ?>"><i class="fa fa-home"></i>&nbsp;<?php printGalleryTitle(); ?></a></div>
					</div>
				</div>
			</div>
			
		</div>

		<div id="main" class="wrap clearfix">
			<div class="inner">
				<div class="gallery pad<?php if (getOption('libratus_index_fullwidth')) echo ' fullwidth'; ?>">
					<div class="gallery-thumbs-large">
						<?php while (next_album()): ?>
						<div>
							<a href="<?php echo html_encode(getAlbumURL());?>">
								<?php printAlbumThumbImage(getBareAlbumTitle(),'check-flagthumb'); ?>
							</a>
							<div class="caption clearfix">
								<?php if (getOption('libratus_date_albums')) { ?><div class="album-date"><?php printAlbumDate(); ?></div><?php } ?>
								<h3 class="album-title"><?php printBareAlbumTitle();?></h3>
							</div>
							<i class="fa fa-angle-up mobile-click-details"></i>
						</div>	
						<?php endwhile; ?>
					</div>
					<?php if (hasNextPage() || hasPrevPage()) { ?><div class="pad"><hr /><?php printPageListWithNav('« '.gettext('prev'),gettext('next').' »',false,true,'pagination'); ?></div><?php } ?>
				</div>
				
				<?php if (!getOption('libratus_index_fullwidth')) { ?>
				<div class="gallery-sidebar pad">
					<?php printSearchForm('','search',$_zp_themeroot.'/images/magnifying_glass_16x16.png',gettext('Search gallery'),$_zp_themeroot.'/images/list_12x11.png'); ?>	
					<hr />
					<?php include ('inc-archive-stats-menu.php'); ?> 	
				</div>
				<?php } ?>
			</div>	
		</div>
		
<?php include ('inc-footer.php'); ?>