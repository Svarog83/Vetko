<?php include ("header.php"); ?>
		<div id="headline" class="clearfix">
			<h4><span><?php printHomeLink('', ' | '); ?><a href="<?php echo htmlspecialchars(getGalleryIndexURL());?>" title="<?php echo gettext('Albums Index'); ?>"><?php echo getGalleryTitle();?></a><?php printNewsIndexURL("News"," | "); ?><?php printCurrentNewsCategory(" | Category - "); ?><?php printNewsTitle(" | "); printCurrentNewsArchive(" | "); ?></h4>
			<?php if(is_NewsArticle()) { ?>
			<table id="navbar" class="clr">
				<tr>
					<td width="50%">
						<div id="navbar-prev">
							<?php if(getPrevNewsURL()) { ?><span class="singlenews_prev"><?php printPrevNewsLink('&lsaquo;'); ?></span><?php } ?>
						</div>
					</td>
					<td width="50%">
						<div id="navbar-next">
								<?php if(getNextNewsURL()) { ?><span class="singlenews_next"><?php printNextNewsLink('&rsaquo;'); ?></span><?php } ?>
						</div>
					</td>
				</tr>
			</table>
			<?php } ?>
		</div>
			
		<?php
		// single news article
		if(is_NewsArticle() AND !checkforPassword()) { ?>  	
		<div id="post" class="clearfix">
			<h2><?php printNewsTitle(); ?></h2>
			<div class="newsarticlecredit">
				<span><?php printNewsDate();?> | <?php printNewsCategories(", ",gettext("Categories: "),"hor-list"); ?> <?php if (function_exists('printCommentForm')) { ?>| <?php echo gettext("Comments:"); ?> <?php echo getCommentCount(); ?><?php } ?></span>
			</div>
			<div class="extra-content">
				<?php printNewsExtraContent(); ?>
			</div>
			<?php 
			printNewsContent(); 
			printCodeblock(1); 
			?>
		</div>
			
		<?php if ((function_exists('printCommentForm')) && (zenpageOpenedForComments()) ) { ?>
		<a class="fadetoggler"><?php echo gettext('Comments'); ?> (<?php echo getCommentCount(); ?>)</a>
		<?php } ?>
		<?php if ((function_exists('printCommentForm')) && (zenpageOpenedForComments()) ) { ?>
		<div id="comment-wrap" class="fader clearfix">
			<?php printCommentForm(); ?>
		</div>
		<?php } ?>
			
		<?php } else { // news article loop ?>
		
		<div id="post" class="clearfix">
			<h2>
				<?php echo gettext('News'); ?>
				<?php if (is_NewsArchive) { printCurrentNewsArchive(' | '); } ?>
				<?php if (is_NewsCategory) { printCurrentNewsCategory(' | '); } ?>
			</h2>
			<div class="extra-content">
				<?php printAllNewsCategories( gettext('All News'),true,'news-cat-list','news-cat-active' ); ?>
			</div>	
				<?php while (next_news()): ;?> 
				<div class="news-truncate"> 
				<h3><?php printNewsTitleLink(); ?></h3>	
				<div class="newsarticlecredit">
					<span><?php printNewsDate();?> | <?php printNewsCategories(", ",gettext("Categories: "),"hor-list"); ?><?php if (function_exists('printCommentForm')) { ?> | <?php echo gettext("Comments:"); ?> <?php echo getCommentCount(); ?> <?php } ?></span>
				</div>	
				<?php printNewsContent(); ?>
				<?php printCodeblock(1); ?>
			</div>	
			<?php endwhile; ?>
		</div>
		
		<div id="pagination" class="clearfix">
			<?php printNewsPageListWithNav( gettext('Next &rsaquo;'),gettext('&lsaquo; Previous'),true,'clearfix' ); ?>
		</div>
		<?php } ?> 
		
		<?php if ( ((getOption('image_statistic')!='none')) && (((function_exists('printImageStatistic')) || (getOption('image_statistic')=='random'))) ) { ?>
		<?php include("image_statistic.php"); ?>
		<?php } ?>
		
<?php include("footer.php"); ?>

