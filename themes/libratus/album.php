<?php include ('inc-header.php'); ?>

		<div id="page-header" class="wrap" style="background-image: linear-gradient(rgba(0, 0, 0, 0.75),rgba(0, 0, 0, 0.75)), url(<?php echo $bg; ?>);">
			<div class="inner">
				<h1><?php printAlbumTitle(); ?></h1>
			</div>
		</div>
		
		<div class="bar">
			<div class="inner">
				<?php echo $quickmenu; ?>
				<div class="pad" id="breadcrumb">
					<a href="<?php echo getGalleryIndexURL(); ?>"><i class="fa fa-home"></i>&nbsp;<?php printGalleryTitle(); ?></a>&nbsp;/
					<?php printParentBreadcrumb('',' / ',' / '); printAlbumTitle(); ?>
				</div>
			</div>
		</div>

		<div id="main" class="wrap clearfix">
			<div class="inner">
				<div class="gallery pad">
					<div class="gallery-thumbs">
						<?php
						$gmap_c = 0;
						while (next_image()):
							$imageTitle = html_encode(getBareImageTitle());
							$defaultSizedImage = html_encode(getDefaultSizedImage());
						?>
						<div>
							<a class="swipebox"
							   title="<?php echo $imageTitle; ?>"
							   href="<?php echo $defaultSizedImage; ?>">
								<?php printImageThumb(NULL, 'check-flagthumb scale'); ?>
							</a>
						</div>

						<?php endwhile; ?>
					</div>
				
					<?php if (hasNextPage() || hasPrevPage()) { ?><div class="pad"><hr /><?php printPageListWithNav('« '.gettext('prev'),gettext('next').' »',false,true,'pagination'); ?></div><?php } ?>
				</div>
				
				<div class="gallery-sidebar pad">
					<?php if ($_zp_gallery_page == 'album.php') { ?>
					<div class="single-nav">
						<?php if ($prev = getPrevAlbum()) { ?>
						<a class="button prev-link" href="<?php echo html_encode(getPrevAlbumURL()); ?>" title="<?php echo gettext('Prev album').': '.html_encode($prev->getTitle()); ?>"><i class="fa fa-caret-left"></i> <?php echo html_encode($prev->getTitle());?></a>
						<?php } else { ?>
						<span class="button prev-link"><i class="fa fa-caret-left"></i> <?php echo gettext("Prev album"); ?></span>
						<?php } ?>
						
						<?php if ($next = getNextAlbum()) { ?>
						<a class="button next-link" href="<?php echo html_encode(getNextAlbumURL()); ?>" title="<?php echo gettext('Next album').': '.html_encode($next->getTitle()); ?>"><?php echo html_encode($next->getTitle()); ?> <i class="fa fa-caret-right"></i></a>
						<?php } else { ?>
						<span class="button next-link"><?php echo gettext("Next album"); ?> <i class="fa fa-caret-right"></i></span>
						<?php } ?>
					</div>
					<hr />
					<?php if ((getOption('libratus_date_albums')) && ($_zp_gallery_page == 'album.php')) { ?><div><i class="fa fa-calendar fa-fw"></i> <?php printAlbumDate(); ?></div><?php } ?>
					<?php } ?>
					
					<?php if (getNumAlbums() > 0) { ?><div><i class="fa fa-folder fa-fw"></i> <?php echo getNumAlbums().' '.gettext("albums"); ?></div><?php } ?>
					<?php if (getNumImages() > 0) { ?><div><i class="fa fa-photo fa-fw"></i> <?php echo getNumImages().' '.gettext("images"); ?></div><?php } ?>
					<br />
					<div class="desc"><?php printAlbumDesc(); ?></div>
					<?php $singletag = getTags(); $tagstring = implode(', ', $singletag); 
					if (strlen($tagstring) > 0) { ?>
					<div class="tags"><i class="fa fa-tags fa-fw"></i> <?php printTags('links','','taglist', ', '); ?></div>
					<?php } ?>
					
					<?php if (function_exists('printSlideShowLink') && (getNumImages() > 1)) { ?><hr /><div class="slideshow-link"><i class="fa fa-play fa-fw"></i> <?php printSlideShowLink(); ?></div><?php } ?>
					<hr />
					
					<?php if ($_zp_gallery_page == 'album.php') {
					if (getOption('libratus_social')) include ('inc-socialshare.php');
					} ?>
					
					<?php printCodeblock(); ?>

					<?php if (!function_exists('printCommentForm') || $_zp_gallery_page == 'favorites.php') {
					if (function_exists('printRating') && $_zp_gallery_page != 'favorites.php') { ?>
					<div id="rating" class="block"><?php printRating(); ?></div>
					<?php } 
					if (function_exists('printAddToFavorites')) include ('inc-favorites.php');
					} ?>
					
				</div>
				
			</div>	
		</div>

<?php include ('inc-footer.php'); ?>
<?php
global $_zp_HTML_cache;
$_zp_HTML_cache->enabled = true;
?>