<?php switch ($_zp_gallery_page) {
	case 'index.php':
	$socialtext = urlencode(getBareGalleryTitle()." - ".strip_tags(truncate_string(getBareGalleryDesc(),75,'...')));		
	break;
	case 'album.php':
	$socialtext = urlencode(getBareAlbumTitle()." - ".strip_tags(truncate_string(getBareAlbumDesc(),75,'...')));		
	break;
	case 'image.php':
	$socialtext = urlencode(getBareImageTitle()." - ".strip_tags(truncate_string(getBareImageDesc(),75,'...')));		
	break;
	case 'news.php':
	$socialtext = urlencode(getBareNewsTitle()." - ".strip_tags(truncate_string(getNewsContent(),75,'...')));	
	break;
	case 'pages.php':
	$socialtext = urlencode(getBarePageTitle()." - ".strip_tags(truncate_string(getPageContent(),75,'...')));		
	break;
} ?>
<?php
$user = 'JamieCrager';
define('socialFULLWEBPATH', PROTOCOL."://" . $_SERVER['HTTP_HOST'] );
$url = urlencode(socialFULLWEBPATH.$_SERVER['REQUEST_URI']);
?>

<script src="//platform.twitter.com/widgets.js" type="text/javascript"></script>		
<div class="social">
	<div class="tw">
		<a href="http://twitter.com/intent/tweet?url=<?php echo $url; ?>&via=<?php echo $user; ?>&text=<?php echo $socialtext; ?>">
			<img src="<?php echo $_zp_themeroot; ?>/images/twitter.png" alt="<?php echo gettext('Tweet'); ?>" />
		</a>
	</div>
	<div class="fb">
		<a href="https://www.facebook.com/sharer.php?u=<?php echo $url; ?>&t=<?php echo $socialtext; ?>">
			<img src="<?php echo $_zp_themeroot; ?>/images/facebook.png" alt="<?php echo gettext('FB Share'); ?>" />
		</a>
	</div>	
	<div class="gplusone">
		<div class="gplus hide">
			<g:plusone size="medium" annotation="none"></g:plusone>
			<script type="text/javascript">
				(function() {
					var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
					po.src = 'https://apis.google.com/js/plusone.js';
					var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
				})();
			</script>
		</div>
		<div class="gplus show">
			<img src="<?php echo $_zp_themeroot; ?>/images/google.png" alt="<?php echo gettext('Google +1'); ?>" />
		</div>
	</div>
</div>