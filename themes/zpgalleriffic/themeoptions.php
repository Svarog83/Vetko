<?php

/* Plug-in for theme option handling 
 * The Admin Options page tests for the presence of this file in a theme folder
 * If it is present it is linked to with a require_once call.
 * If it is not present, no theme options are displayed.
 * 
 */

require_once(SERVERPATH . "/" . ZENFOLDER . "/admin-functions.php");

class ThemeOptions {
	
	function ThemeOptions() {
		setOptionDefault('zpgal_tagline', 'Welcome to zpGalleriffic - Change this in Theme Options');
		setOptionDefault('zpgal_homepage', gettext('none'));
		setOptionDefault('zpgal_show_credit', false);
		setOptionDefault('zpgal_contrast', 'dark');
		setOptionDefault('zpgal_use_image_logo_filename', '');
		setOptionDefault('zpgal_zp_latestnews', '2');
		setOptionDefault('zpgal_zp_latestnews_trunc', '400');
		setOptionDefault('zpgal_show_meta', '1');
		setOptionDefault('zpgal_final_link', 'colorbox');
		setOptionDefault('zpgal_nogal', '1');
		setOptionDefault('zpgal_leftalign', '0');		
		setOptionDefault('zpgal_delay', '6000');
		setOptionDefault('zpgal_thumbcount', '6');
		setOptionDefault('zpgal_preload', '12');		
		setOptionDefault('zpgal_minigaloption', 'latest');
		setOptionDefault('zpgal_download_link', true);		
		setOptionDefault('zpgal_cbtarget', true);
		setOptionDefault('zpgal_cbstyle', 'style3');
		setOptionDefault('zpgal_cbtransition', 'fade');
		setOptionDefault('zpgal_cbssspeed', '2500');		
		setOptionDefault('zpgal_minigal', true);
		setOptionDefault('zpgal_minigalheight', '250');
		setOptionDefault('zpgal_minigalcount', '12');
		setOptionDefault('zpgal_color', '#B45E2C');		
		setOptionDefault('zpgal_archiveoption', 'latest');
		setOptionDefault('zpgal_archivecount', '16');
		setOptionDefault('zpgal_crop', true);
		setOptionDefault('jcarousel_zpgalleriffic_image', 1);
	}
	
	function getOptionsSupported() {
		return array(	
						gettext('(1) Theme Version') => array('key' => 'zpgal_contrast', 'type' => OPTION_TYPE_CUSTOM, 'desc' => gettext('Choose a dark or light contrast style for your gallery.')),
						gettext('(2) Primary Color') => array('key' => 'zpgal_color', 'type' => OPTION_TYPE_TEXTBOX, 'multilingual' => 1, 'desc' => gettext('Enter a Hex (with the pound (#) sign) or RGB color code (Affects mainly link colors). Default is \'#B45E2C\'.')),						
						gettext('(3) Tagline') => array('key' => 'zpgal_tagline', 'type' => OPTION_TYPE_TEXTBOX, 'multilingual' => 1, 'desc' => gettext('The text to include in the metatag title on the homepage.')),
						gettext('(4) Homepage') => array('key' => 'zpgal_homepage', 'type' => OPTION_TYPE_CUSTOM, 'desc' => gettext("Choose here any <em>unpublished Zenpage page</em> (listed by <em>titlelink</em>) to act as your site's homepage instead the normal gallery index.")),
						gettext('(5) Show ZenPhoto Credit') => array('key' => 'zpgal_show_credit', 'type' => OPTION_TYPE_CHECKBOX, 'desc' => gettext('Check to display the Powered by ZenPhoto link in the footer.')),
						gettext('(6) Align WebSite Left') => array('key' => 'zpgal_leftalign', 'type' => OPTION_TYPE_CHECKBOX, 'desc' => gettext('Check to left align the entire site, instead of centered.')),						
						gettext('(7) Use this File as Header Logo') => array('key' => 'zpgal_use_image_logo_filename', 'type' => OPTION_TYPE_TEXTBOX, 'multilingual' => 1, 'desc' => gettext('If using an image file for the logo/title area, enter the full filename (including extension) of the image file located in the images directory in zpGallerifficII theme folder. <strong>Or leave blank to use a text representation of your site name (recommended).</strong>')),
						gettext('(8) ZenPage Latest News on Home page') => array('key' => 'zpgal_zp_latestnews', 'type' => OPTION_TYPE_TEXTBOX, 'multilingual' => 1, 'desc' => gettext('If using Zenpage, number of latest news artciles to show on the gallery page.  Make sure you enter a valid number here! Enter 0 to not show any news and expand the width of the album list.')),
						gettext('(8a) -> Latest News Truncation') => array('key' => 'zpgal_zp_latestnews_trunc', 'type' => OPTION_TYPE_TEXTBOX, 'multilingual' => 1, 'desc' => gettext('If using Zenpage, and you have articles set to display on the home page, set here the number of characters to show in the article snippet (truncation).  Make sure you enter a valid number here!')),								
						gettext('(9) Home Page: Galleriffic Slideshow?') => array('key' => 'zpgal_minigal', 'type' => OPTION_TYPE_CHECKBOX, 'desc' => gettext('Shows mini slideshow on homepage; set options below.')),
						gettext('(9a) -> Home Page: Galleriffic Image Option') => array('key' => 'zpgal_minigaloption', 'type' => OPTION_TYPE_CUSTOM, 'desc' => gettext('If Home page Mini Galleriffic option is enabled, select what you want the slideshow to display.')),						
						gettext('(9b) -> Home Page: Galleriffic Height') => array('key' => 'zpgal_minigalheight', 'type' => OPTION_TYPE_TEXTBOX, 'multilingual' => 1, 'desc' => gettext('Based on the length of your gallery description, you will have to adjust this to increase or decrease the height of the image slideshow. Default is \'250\'.')),
						gettext('(9c) -> Home Page: Galleriffic Image Count') => array('key' => 'zpgal_minigalcount', 'type' => OPTION_TYPE_TEXTBOX, 'multilingual' => 1, 'desc' => gettext('The number of images to display if mini galleriffic on home page is enabled. Default is \'12\'.')),						
						gettext('(10) Archive Initial Display') => array('key' => 'zpgal_archiveoption', 'type' => OPTION_TYPE_CUSTOM, 'desc' => gettext('Set the option for what to display on the initial archive page.')),
						gettext('(11) Archive Image Count') => array('key' => 'zpgal_archivecount', 'type' => OPTION_TYPE_TEXTBOX, 'multilingual' => 1, 'desc' => gettext('The number of images to display on the initial archive page. Default is \'12\'.')),						
						gettext('(12) Album Page: Use Galleriffic Script?') => array('key' => 'zpgal_nogal', 'type' => OPTION_TYPE_CHECKBOX, 'desc' => gettext('Uncheck this to use the alternate album pages that do not use the Galleriffic Script.')),
						gettext('(12a) -> Galleriffic Slide Transition Delay') => array('key' => 'zpgal_delay', 'type' => OPTION_TYPE_TEXTBOX, 'desc' => gettext('Default is \'6000\'.')),
						gettext('(12b) -> Galleriffic # of Thumbs') => array('key' => 'zpgal_thumbcount', 'type' => OPTION_TYPE_TEXTBOX, 'desc' => gettext('Default is \'9\'.')),
						gettext('(12c) -> Galleriffic # of Images to Preload') => array('key' => 'zpgal_preload', 'type' => OPTION_TYPE_TEXTBOX, 'desc' => gettext('Default is \'10\'.')),					
						gettext('(12d) -> Galleriffic crop image') => array('key' => 'zpgal_crop', 'type' => OPTION_TYPE_CHECKBOX, 'desc' => gettext('Choose to crop the galleriffic large image. Cropping fills the area better, but some may need original proportions on images.')),
						
						gettext('(13) Colorbox Style') => array('key' => 'zpgal_cbstyle', 'type' => OPTION_TYPE_CUSTOM, 'desc' => gettext('Select the Colorbox style you wish to use (examples on the colorbox site).')),
						gettext('(14) Colorbox Transition Type') => array('key' => 'zpgal_cbtransition', 'type' => OPTION_TYPE_CUSTOM, 'desc' => gettext('The colorbox transition type. Can be set to elastic, fade, or none.')),
						gettext('(15) Colorbox Slideshow Speed') => array('key' => 'zpgal_cbssspeed', 'type' => OPTION_TYPE_TEXTBOX, 'multilingual' => 1, 'desc' => gettext('Enter a number here in milliseconds that determines the colorbox slideshow speed. Default is \'2500\'.')),
						gettext('(16) Colorbox Target Sized Image in Galleriffic') => array('key' => 'zpgal_cbtarget', 'type' => OPTION_TYPE_CHECKBOX, 'desc' => gettext('Click to enable colorbox targeting the sized image setting in the top options, instead of the full original image. This is usefull if you upload large images as you can set Colorbox to target a smaller, resized version based on your setting above.')),
						gettext('(17) Show Image EXIF Data') => array('key' => 'zpgal_show_meta', 'type' => OPTION_TYPE_CHECKBOX, 'desc' => gettext('Show the Image MetaData slide on Image page.')),
						gettext('(18) Show Download Link') => array('key' => 'zpgal_download_link', 'type' => OPTION_TYPE_CHECKBOX, 'desc' => gettext('Show a download link for the image on the album and search pages.')),
						gettext('(19) Final Image Link') => array('key' => 'zpgal_final_link', 'type' => OPTION_TYPE_CUSTOM, 'desc' => gettext('Choose final link action at image.php: no link, colorbox, or default zenphoto.'))
						
					);				
	}

	function handleOption($option, $currentValue) {

		if ($option == 'zpgal_cbstyle') {
			echo '<select style="width:200px;" id="' . $option . '" name="' . $option . '"' . ">\n";
			
			echo '<option value="style1"';
				if ($currentValue == "style1") { 
				echo ' selected="selected">style1</option>\n';
				} else {
				echo '>style1</option>\n';
				}
			
			echo '<option value="style2"';
				if ($currentValue == "style2") { 
				echo ' selected="selected">style2</option>\n';
				} else {
				echo '>style2</option>\n';
				}
			
			echo '<option value="style3"';
				if ($currentValue == "style3") { 
				echo ' selected="selected">style3</option>\n';
				} else {
				echo '>style3</option>\n';
				}
			
			echo '<option value="style4"';
				if ($currentValue == "style4") { 
				echo ' selected="selected">style4</option>\n';
				} else {
				echo '>style4</option>\n';
				}
				
			echo '<option value="style5"';
				if ($currentValue == "style5") { 
				echo ' selected="selected">style5</option>\n';
				} else {
				echo '>style5</option>\n';
				}
				
			echo "</select>\n";
		}
		
		if ($option == 'zpgal_cbtransition') {
			echo '<select style="width:200px;" id="' . $option . '" name="' . $option . '"' . ">\n";
			
			echo '<option value="fade"';
				if ($currentValue == "fade") { 
				echo ' selected="selected">Fade</option>\n';
				} else {
				echo '>Fade</option>\n';
				}
			
			echo '<option value="elastic"';
				if ($currentValue == "elastic") { 
				echo ' selected="selected">Elastic</option>\n';
				} else {
				echo '>Elastic</option>\n';
				}
			
			echo '<option value="none"';
				if ($currentValue == "none") { 
				echo ' selected="selected">None</option>\n';
				} else {
				echo '>None</option>\n';
				}
				
			echo "</select>\n";
		}
		
		if ($option == 'zpgal_contrast') {
			echo '<select style="width:200px;" id="' . $option . '" name="' . $option . '"' . ">\n";
			
			echo '<option value="dark"';
				if ($currentValue == "dark") { 
				echo ' selected="selected">Dark</option>\n';
				} else {
				echo '>Dark</option>\n';
				}
			
			echo '<option value="light"';
				if ($currentValue == "light") { 
				echo ' selected="selected">Light</option>\n';
				} else {
				echo '>Light</option>\n';
				}
				
			echo "</select>\n";
		}
		
		if ($option == 'zpgal_color_style') {
			echo '<select style="width:200px;" id="' . $option . '" name="' . $option . '"' . ">\n";
			
			echo '<option value="default-orange"';
				if ($currentValue == "default-orange") { 
				echo ' selected="selected">Default Orange</option>\n';
				} else {
				echo '>Default Orange</option>\n';
				}
			
			echo '<option value="blue"';
				if ($currentValue == "blue") { 
				echo ' selected="selected">Blue</option>\n';
				} else {
				echo '>Blue</option>\n';
				}
			
			echo '<option value="green"';
				if ($currentValue == "green") { 
				echo ' selected="selected">Green</option>\n';
				} else {
				echo '>Green</option>\n';
				}

			echo '<option value="custom"';
				if ($currentValue == "custom") { 
				echo ' selected="selected">Custom</option>\n';
				} else {
				echo '>Custom</option>\n';
				}
				
			echo "</select>\n";
		}
		
		if ($option == 'zpgal_final_link') {
			echo '<select style="width:200px;" id="' . $option . '" name="' . $option . '"' . ">\n";
			
			echo '<option value="colorbox"';
				if ($currentValue == "colorbox") { 
				echo ' selected="selected">Colorbox</option>\n';
				} else {
				echo '>Colorbox</option>\n';
				}
			
			echo '<option value="nolink"';
				if ($currentValue == "nolink") { 
				echo ' selected="selected">No Link</option>\n';
				} else {
				echo '>No Link</option>\n';
				}
			
			echo '<option value="standard"';
				if ($currentValue == "standard") { 
				echo ' selected="selected">Standard ZenPhoto</option>\n';
				} else {
				echo '>Standard ZenPhoto</option>\n';
				}
			
			echo '<option value="standard-new"';
				if ($currentValue == "standard-new") { 
				echo ' selected="selected">Standard ZenPhoto - New Window</option>\n';
				} else {
				echo '>Standard ZenPhoto - New Window</option>\n';
				}
				
			echo "</select>\n";
		}
		
		if ($option == 'zpgal_minigaloption') {
			echo '<select style="width:200px;" id="' . $option . '" name="' . $option . '"' . ">\n";
			echo '<option value="random"';
				if ($currentValue == "random") { 
				echo ' selected="selected">Random</option>\n';
				} else {
				echo '>Random</option>\n';
				}
			echo '<option value="popular"';
				if ($currentValue == "popular") { 
				echo ' selected="selected">Popular</option>\n';
				} else {
				echo '>Popular</option>\n';
				}
			echo '<option value="latest"';
				if ($currentValue == "latest") { 
				echo ' selected="selected">Latest</option>\n';
				} else {
				echo '>Latest</option>\n';
				}
			echo '<option value="latest-date"';
				if ($currentValue == "latest-date") { 
				echo ' selected="selected">Latest-date</option>\n';
				} else {
				echo '>Latest-date</option>\n';
				}
			echo '<option value="latest-mtime"';
				if ($currentValue == "latest-mtime") { 
				echo ' selected="selected">Latest-mtime</option>\n';
				} else {
				echo '>Latest-mtime</option>\n';
				}		
			echo '<option value="mostrated"';
				if ($currentValue == "mostrated") { 
				echo ' selected="selected">Most Rated</option>\n';
				} else {
				echo '>Most Rated</option>\n';
				}
			echo '<option value="toprated"';
				if ($currentValue == "toprated") { 
				echo ' selected="selected">Top Rated</option>\n';
				} else {
				echo '>Top Rated</option>\n';
				}
			echo "</select>\n";
		}
		
		if ($option == 'zpgal_archiveoption') {
			echo '<select style="width:200px;" id="' . $option . '" name="' . $option . '"' . ">\n";
			echo '<option value="random"';
				if ($currentValue == "random") { 
				echo ' selected="selected">Random</option>\n';
				} else {
				echo '>Random</option>\n';
				}
			echo '<option value="popular"';
				if ($currentValue == "popular") { 
				echo ' selected="selected">Popular</option>\n';
				} else {
				echo '>Popular</option>\n';
				}
			echo '<option value="latest"';
				if ($currentValue == "latest") { 
				echo ' selected="selected">Latest</option>\n';
				} else {
				echo '>Latest</option>\n';
				}
			echo '<option value="latest-date"';
				if ($currentValue == "latest-date") { 
				echo ' selected="selected">Latest-date</option>\n';
				} else {
				echo '>Latest-date</option>\n';
				}
			echo '<option value="latest-mtime"';
				if ($currentValue == "latest-mtime") { 
				echo ' selected="selected">Latest-mtime</option>\n';
				} else {
				echo '>Latest-mtime</option>\n';
				}		
			echo '<option value="mostrated"';
				if ($currentValue == "mostrated") { 
				echo ' selected="selected">Most Rated</option>\n';
				} else {
				echo '>Most Rated</option>\n';
				}
			echo '<option value="toprated"';
				if ($currentValue == "toprated") { 
				echo ' selected="selected">Top Rated</option>\n';
				} else {
				echo '>Top Rated</option>\n';
				}
			echo "</select>\n";
		}
						
		if($option == "zpgal_homepage") {
			$unpublishedpages = query_full_array("SELECT titlelink FROM ".prefix('pages')." WHERE `show` != 1 ORDER by `sort_order`");
			if(empty($unpublishedpages)) {
				echo gettext("No unpublished pages available");
				// clear option if no unpublished pages are available or have been published meanwhile
				// so that the normal gallery index appears and no page is accidentally set if set to unpublished again.
				setOption("zpgal_homepage", gettext("none"), true);
			} else {
				echo '<input type="hidden" name="'.CUSTOM_OPTION_PREFIX.'selector-zpgal_homepage" value="0" />' . "\n";
				echo '<select id="'.$option.'" name="zpgal_homepage">'."\n";
				if($currentValue === gettext("none")) {
					$selected = " selected = 'selected'";
				} else {
					$selected = "";
				}
				echo "<option$selected>".gettext("none")."</option>";
				foreach($unpublishedpages as $page) {
					if($currentValue === $page["titlelink"]) {
						$selected = " selected = 'selected'";
					} else {
						$selected = "";
					}
					echo "<option$selected>".$page["titlelink"]."</option>";
				}
				echo "</select>\n";
			}
		}
	}

}
?>