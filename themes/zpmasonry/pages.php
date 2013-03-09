<?php include ("inc-header.php"); ?>

		<div id="breadcrumbs">
			<a href="<?php echo $zpmas_homelink; ?>" title="<?php echo gettext("Gallery Index"); ?>"><?php echo gettext("Gallery Index"); ?></a> &raquo; <?php printZenpageItemsBreadcrumb(""," &raquo; "); ?><?php printPageTitle(); ?>
		</div>
		<div id="wrapper">
			<div id="sidebar">
				<div id="sidebar-inner">
					<div id="sidebar-padding">
						<?php if (getPageExtraContent()) { ?>
						<div class="sidebar-divide">
							<div class="extra-content"><?php printPageExtraContent(); ?></div>
						</div>
						<?php } ?>
						<div class="side-menu sidebar-divide">
							<?php printPageMenu('omit-top','','active','','active','',true,false);  ?>
						</div>
						<div class="latest sidebar-divide">
							<?php printLatestNews(1,'none'); ?>
						</div>
						<?php include ("inc-copy.php"); ?>
					</div>
				</div>
			</div>
			<div id="page">
				<div class="post">
					<h1><?php printPageTitle(); ?></h1>
					<?php printPageContent(); printCodeblock(1); ?>
				</div>
				<?php if (function_exists('printRating')) { ?><div class="post"><?php printRating(); ?></div><?php } ?>
				<?php if (function_exists('printCommentForm')) { ?><div class="post"><?php printCommentForm(); ?></div><?php } ?>
			</div>
		</div>

<?php include ("inc-footer.php"); ?>		