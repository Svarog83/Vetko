<?php if (!defined('WEBPATH')) die(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="<?php echo LOCAL_CHARSET; ?>" />
	<?php zp_apply_filter('theme_head'); ?>
	<?php // Set some things depending on what page we are on...
	switch ($_zp_gallery_page) {
		case 'index.php':
			$zpskel_metatitle = getBareGalleryTitle();
			$zpskel_metadesc = truncate_string(getBareGalleryDesc(),150,'...');
			if ((!$zenpage) || ($zenpage_homepage == 'none')) $galleryactive = true;
			break;
		case 'gallery.php':
			$zpskel_metatitle = getBareGalleryTitle();
			$zpskel_metadesc = truncate_string(getBareGalleryDesc(),150,'...');
			$galleryactive = true;
			break;
		case 'album.php':
			$zpskel_metatitle = getBareAlbumTitle().getTitleBreadcrumb().' | '.getBareGalleryTitle();
			$zpskel_metadesc = truncate_string(getBareAlbumDesc(),150,'...');
			$galleryactive = true;
			printRSSHeaderLink('Collection',getBareAlbumTitle().' - '.gettext('Latest Images'), $lang='')."\n";
			if (function_exists('printCommentForm')) printRSSHeaderLink('Comments-album',getBareAlbumTitle().' - '.gettext('Latest Comments'), $lang='')."\n";		
			break;
		case 'image.php':
			$zpskel_metatitle = getBareImageTitle().' | '.getBareAlbumTitle().getTitleBreadcrumb().' | '.getBareGalleryTitle();
			$zpskel_metadesc = truncate_string(getBareImageDesc(),150,'...');
			$galleryactive = true;
			if (function_exists('printCommentForm')) printRSSHeaderLink('Comments-image',getBareImageTitle().' - '.gettext('Latest Comments'), $lang='')."\n";
			break;
		case 'archive.php':
			$zpskel_metatitle = gettext("Archive View").' | '.getBareGalleryTitle();
			$zpskel_metadesc = truncate_string(getBareGalleryDesc(),150,'...');
			break;
		case 'search.php':
			$zpskel_metatitle = gettext('Search').' | '.getSearchWords().' | '.getBareGalleryTitle();
			$zpskel_metadesc = truncate_string(getBareGalleryDesc(),150,'...');
			$galleryactive = true;
			break;
		case 'pages.php':
			$zpskel_metatitle = getBarePageTitle().' | '.getBareGalleryTitle();
			$zpskel_metadesc = strip_tags(truncate_string(getPageContent(),150,'...'));
			break;
		case 'news.php':
			if (is_NewsArticle()) {
			$zpskel_metatitle = gettext('News').' | '.getBareNewsTitle().' | '.getBareGalleryTitle();
			$zpskel_metadesc = strip_tags(truncate_string(getNewsContent(),150,'...'));
			} else if ($_zp_current_category) {
			$zpskel_metatitle = gettext('News').' | '.$_zp_current_category->getTitle().' | '.getBareGalleryTitle();
			$zpskel_metadesc = strip_tags(truncate_string(getNewsCategoryDesc(),150,'...'));
			} else if (getCurrentNewsArchive()) {
			$zpskel_metatitle = gettext('News').' | '.getCurrentNewsArchive().' | '.getBareGalleryTitle();
			$zpskel_metadesc = truncate_string(getBareGalleryDesc(),150,'...');
			} else {
			$zpskel_metatitle = gettext('News').' | '.getBareGalleryTitle();
			$zpskel_metadesc = truncate_string(getBareGalleryDesc(),150,'...');
			}
			break;
		case 'contact.php':
			$zpskel_metatitle = gettext('Contact').' | '.getBareGalleryTitle();
			$zpskel_metadesc = truncate_string(getBareGalleryDesc(),150,'...');
			break;
		case 'login.php':
			$zpskel_metatitle = gettext('Login').' | '.getBareGalleryTitle();
			$zpskel_metadesc = truncate_string(getBareGalleryDesc(),150,'...');
			break;
		case 'register.php':
			$zpskel_metatitle = gettext('Register').' | '.getBareGalleryTitle();
			$zpskel_metadesc = truncate_string(getBareGalleryDesc(),150,'...');
			break;
		case 'password.php':
			$zpskel_metatitle = gettext('Password Required').' | '.getBareGalleryTitle();
			$zpskel_metadesc = truncate_string(getBareGalleryDesc(),150,'...');
			break;
		case '404.php':
			$zpskel_metatitle = gettext('404 Not Found...').' | '.getBareGalleryTitle();
			$zpskel_metadesc = truncate_string(getBareGalleryDesc(),150,'...');
			break;
		default:
			$zpskel_metatitle = getBareGalleryTitle().getBareGalleryTitle();
			$zpskel_metadesc = truncate_string(getBareGalleryDesc(),150,'...');
			break;
	}

	// Finish out header RSS links
	printRSSHeaderLink('Gallery',gettext('Latest Images'))."\n";
	printRSSHeaderLink('AlbumsRSS',gettext('Latest Albums'))."\n";
	if ($zenpage) {
		printZenpageRSSHeaderLink('News','',gettext('Latest News'))."\n";
		printZenpageRSSHeaderLink('NewsWithImages','',gettext('Latest News and Images'))."\n";
		if (function_exists('printCommentForm')) printZenpageRSSHeaderLink('Comments-all','',gettext('Latest Comments'))."\n";
	} else {
	if (function_exists('printCommentForm')) printRSSHeaderLink('Comments',gettext('Latest Comments'))."\n";
	} ?>
	
	<script src="<?php echo $_zp_themeroot; ?>/js/zpskeleton.js"></script>
	<title><?php echo $zpskel_metatitle; ?></title>
	<meta name="description" content="<?php echo $zpskel_metadesc; ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<link rel="stylesheet" href="<?php echo $_zp_themeroot; ?>/css/style.css">
	
	<?php if (!$zpskel_ismobile) { ?>
	<link rel="stylesheet" href="<?php echo $_zp_themeroot; ?>/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
	<script src="<?php echo $_zp_themeroot; ?>/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript" charset="utf-8">
		$(document).ready(function(){
			$("a[rel^='slideshow']").prettyPhoto({
				slideshow: 5000, /* false OR interval time in ms */
				autoplay_slideshow: true, /* true/false */
				social_tools: false
			});
		});
	</script>
	<?php } ?>
	
	<?php if ($_zp_gallery_page == "search.php") printZDSearchToggleJS(); ?>
	<link rel="shortcut icon" href="<?php echo $_zp_themeroot; ?>/images/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo $_zp_themeroot; ?>/images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $_zp_themeroot; ?>/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $_zp_themeroot; ?>/images/apple-touch-icon-114x114.png">
</head>
<body>
	<?php zp_apply_filter('theme_body_open'); ?>
	<div class="wrapper topbar">
		<div class="container">
			<div class="sixteen columns">
				<h3 class="logo"><a href="<?php echo getGalleryIndexURL(false); ?>"><?php printGalleryTitle(); ?></a></h3>
				<ul id="nav">
					<li class="menu">
						<a class="menu" href="#"><?php echo gettext('Menu'); ?></a>
						<ul class="menu-dropdown">	
							<?php if (($zenpage) && ($zenpage_homepage != 'none')) { ?>
							<li <?php if ($_zp_gallery_page == "index.php") { ?>class="active" <?php } ?>><a href="<?php echo html_encode(getGalleryIndexURL(false)); ?>" title="<?php echo gettext('Home'); ?>"><?php echo gettext('Home'); ?></a></li>
							<li <?php if (($galleryactive) && ($_zp_gallery_page != "index.php")) { ?>class="active" <?php } ?>><?php printCustomPageURL(gettext('Gallery'),"gallery"); ?></li>
							<?php } else { ?>
							<li <?php if ($galleryactive) { ?>class="active" <?php } ?>><a href="<?php echo html_encode(getGalleryIndexURL(false)); ?>" title="<?php echo gettext('Gallery'); ?>"><?php echo gettext('Gallery'); ?></a></li>
							<?php } ?>
							<?php if ($zpskel_archive) { ?><li <?php if ($_zp_gallery_page == "archive.php") { ?>class="active" <?php } ?>><a href="<?php echo getCustomPageURL('archive'); ?>" title="<?php echo gettext('Archive View'); ?>"><?php echo gettext('Archive'); ?></a></li><?php } ?>
							<?php if ((function_exists('getNewsIndexURL')) && ($zpskel_usenews)) { ?>
							<li <?php if ($_zp_gallery_page == "news.php") { ?>class="active" <?php } ?>>
								<a href="<?php echo getNewsIndexURL(); ?>"><?php echo gettext('News'); ?></a>
							</li>
							<?php } ?>
							<?php if (function_exists('printContactForm')) { ?><li <?php if ($_zp_gallery_page == "contact.php") { ?>class="active" <?php } ?>><?php printCustomPageURL(gettext('Contact'),"contact"); ?></li><?php } ?>
							<?php if (function_exists('printPageMenu')) { ?>
							<li class="divider"></li>
							<?php printPageMenu('list-top','','active','','active','',true,false); ?>
							<?php } ?>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>