<?php include ("header.php"); ?>
			<div id="image-page">
				<div id="headline" class="clearfix">
					<h4><?php printHomeLink('', ' | '); ?><a href="<?php echo htmlspecialchars(getGalleryIndexURL());?>" title="<?php gettext('Albums Index'); ?>"><?php echo getGalleryTitle();?></a> | <?php echo gettext('Contact'); ?></h4>
				</div>

				<div class="post">
					<?php if (function_exists('printContactForm')) { printContactForm(); } else { ?> 
					<p><?php echo gettext('The Contact Form plugin has not been activated.'); ?></p>
					<?php } ?>
				</div>
				
			</div>		
			
			<?php if ( ((getOption('image_statistic')!='none')) && (((function_exists('printImageStatistic')) || (getOption('image_statistic')=='random'))) ) { ?>
			<?php include("image_statistic.php"); ?>
			<?php } ?>
		
<?php include("footer.php"); ?>