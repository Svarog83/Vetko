<div class="stats-menu">
	<?php
	$imgheader = TRUE;
	$albheader = TRUE;
	$active = '';
	$imgheadertext = '<div class="bold-header">' . gettext('Gallery Archive') . '</div>';

	if ($imgheader) {
		echo $imgheadertext;
		$imgheader = FALSE;
	}
	if (isset( $_GET['set'] )) {
		if ($_GET['set'] == 'popularimages') {
			$active = ' class="active"';
		} else {
			$active = '';
		}
	}
	echo '<div' . $active . '><a href="' . getCustomPageURL('archive',
															'set=popularimages') . '"><i class="fa fa-eye fa-fw"></i> ' . gettext('All albums') . '</a></div>';
	$active = '';
	?>
</div>
<?php if (getOption('libratus_social')) {
	include( 'inc-socialshare.php' );
} ?>
