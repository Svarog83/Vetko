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
		setOptionDefault('zpmas_css', 'dark');
		setOptionDefault('zpmas_logo', '');
		setOptionDefault('zpmas_logoheight', '');
		setOptionDefault('zpmas_zpsearchcount', 2);
		setOptionDefault('zpmas_finallink', 'nolink');
		setOptionDefault('zpmas_disablemeta', false);
		setOptionDefault('zpmas_imagetitle', false);
		setOptionDefault('zpmas_thumbsize', 'small');
		setOptionDefault('zpmas_thumbcrop', true);
		setOptionDefault('zpmas_infscroll', true);
		setOptionDefault('zpmas_fixsidebar', true);
		setOptionDefault('zpmas_cbtarget', true);
		setOptionDefault('zpmas_cbstyle', 'style3');
		setOptionDefault('zpmas_cbtransition', 'fade');
		setOptionDefault('zpmas_cbssspeed', '2500');	
		setOptionDefault('zpmas_ss',true);
		setOptionDefault('zpmas_sstype', 'random');
		setOptionDefault('zpmas_sscount', 5);
		setOptionDefault('zpmas_sseffect', 'fade');
		setOptionDefault('zpmas_ssspeed', '4000');
		setOptionDefault('jcarousel_zpmasonry_image', 1);
	}
	
	function getOptionsSupported() {
		return array(
			gettext('(01) Style') => array('key' => 'zpmas_css', 'type' => OPTION_TYPE_CUSTOM, 'desc' => gettext('Select a dark or light overall color style.')),		
			gettext('(02) General Thumb Sizes') => array('key' => 'zpmas_thumbsize', 'type' => OPTION_TYPE_CUSTOM, 'desc' => gettext('Toggle large or small thumbnails.  This theme does not allow you to set the thumb sizes above for layout reasons. For advanced users, these are set in the functions.php file.')),		
			gettext('(03) Crop Album Thumbs to Landscape Orientation?') => array('key' => 'zpmas_thumbcrop', 'type' => OPTION_TYPE_CHECKBOX, 'desc' => gettext('Check to crop the album thumbs to a more landscape orientation.')),
			gettext('(04) Show Image Title on Album Pages?') => array('key' => 'zpmas_imagetitle', 'type' => OPTION_TYPE_CHECKBOX, 'desc' => gettext('Check to show the image title above images on the album and search pages.')),	
			gettext('(05) Use Infinite Scroll?') => array('key' => 'zpmas_infscroll', 'type' => OPTION_TYPE_CHECKBOX, 'desc' => gettext('Loads subsequent pages into the current page, disables normal pagination. Experimental, use with caution.')),
			gettext('(06) Fix the sidebar\'s position?') => array('key' => 'zpmas_fixsidebar', 'type' => OPTION_TYPE_CHECKBOX, 'desc' => gettext('Check to fix the sidebar and make it always visible as user scrolls.  If sidebar is too tall for the users viewport, it will revert to static position.')),
			gettext('(07) Logo Image') => array('key' => 'zpmas_logo', 'type' => OPTION_TYPE_TEXT, 'desc' => gettext('Enter an image file located in the themes image directory, including extension, to use as an image logo. Or leave blank to use a text representation of your Gallery name.  As an example there is a logo.gif image in the images directory with a height of 83 (must enter height of image as well!).')),
			gettext('(08)   --> Logo Height') => array('key' => 'zpmas_logoheight', 'type' => OPTION_TYPE_TEXT, 'desc' => gettext('If using a logo image above, you must enter the height of the image in pixels here.')),
			gettext('(09) Final Image Link Option') => array('key' => 'zpmas_finallink', 'type' => OPTION_TYPE_CUSTOM, 'desc' => gettext('Choose the option for the final image link on image.php.  Can either link to full image using standard zenphoto process (with core options), colorbox (if plugin enabled), or no link (default).')),		
			gettext('(10) Disable MetaData Display?') => array('key' => 'zpmas_disablemeta', 'type' => OPTION_TYPE_CHECKBOX, 'desc' => gettext('Check to disable the metadata (EXIF,IPTC) display on the image page.')),
			gettext('(11) ZenPage Search Results') => array('key' => 'zpmas_zpsearchcount', 'type' => OPTION_TYPE_TEXT, 'desc' => gettext('If using Zenpage, enter the number of search results to display for each news and pages.  Default is 2 (4 total possible).')),
			gettext('(12) Colorbox Style') => array('key' => 'zpmas_cbstyle', 'type' => OPTION_TYPE_CUSTOM, 'desc' => gettext('Select the Colorbox style you wish to use (examples on the colorbox site).')),
			gettext('(13)   --> Colorbox Transition Type') => array('key' => 'zpmas_cbtransition', 'type' => OPTION_TYPE_CUSTOM, 'desc' => gettext('The colorbox transition type. Can be set to elastic, fade, or none.')),
			gettext('(14)   --> Colorbox Slideshow Speed') => array('key' => 'zpmas_cbssspeed', 'type' => OPTION_TYPE_TEXTBOX, 'multilingual' => 1, 'desc' => gettext('Enter a number here in milliseconds that determines the colorbox slideshow speed. Default is \'2500\'.')),
			gettext('(15)   --> Colorbox Target Sized Image in Galleriffic') => array('key' => 'zpmas_cbtarget', 'type' => OPTION_TYPE_CHECKBOX, 'desc' => gettext('Click to enable colorbox targeting the sized image setting in the top options, instead of the full original image. This is usefull if you upload large images as you can set Colorbox to target a smaller, resized version based on your setting above.')),			
			gettext('(16) Frontpage Slideshow?') => array('key' => 'zpmas_ss', 'type' => OPTION_TYPE_CHECKBOX, 'desc' => gettext('Check if you want to show a slideshow on the frontpage. Contents of slideshow and settings can be selected below.')),
			gettext('(17)   --> Frontpage Slideshow Option') => array('key' => 'zpmas_sstype', 'type' => OPTION_TYPE_CUSTOM, 'desc' => gettext('Select the contents option of the frontpage slideshow if selected above.')),
			gettext('(18)   --> Frontpage Slideshow Count') => array('key' => 'zpmas_sscount', 'type' => OPTION_TYPE_TEXT, 'desc' => gettext('How many images/albums to display in the slideshow.')),
			gettext('(19)   --> Rotator Transition Effect?') => array('key' => 'zpmas_sseffect', 'type' => OPTION_TYPE_CUSTOM, 'desc' => gettext('Choose the transition effect, if slideshow is selected above.')),
			gettext('(20)   --> Rotator Speed?') => array('key' => 'zpmas_ssspeed', 'type' => OPTION_TYPE_TEXTBOX, 'desc' => gettext('Choose the delay of each rotation for slideshow in milliseconds.'))
						
		);				
	}

	function handleOption($option, $currentValue) {

		if ($option == 'zpmas_cbstyle') {
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
		
		if ($option == 'zpmas_cbtransition') {
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
		
		if ($option == 'zpmas_sstype') {
			echo '<select id="' . $option . '" name="' . $option . '"' . ">\n";
			echo '<option value="random"';
				if ($currentValue == "random") { 
				echo ' selected="selected">Random</option>\n';
				} else {
				echo '>Random</option>\n';
				}
			echo '<option value="image-popular"';
				if ($currentValue == "image-popular") { 
				echo ' selected="selected">Image-Popular</option>\n';
				} else {
				echo '>Image-Popular</option>\n';
				}
			echo '<option value="image-latest"';
				if ($currentValue == "image-latest") { 
				echo ' selected="selected">Image-Latest</option>\n';
				} else {
				echo '>Image-Latest</option>\n';
				}
			echo '<option value="image-latest-date"';
				if ($currentValue == "image-latest-date") { 
				echo ' selected="selected">Image-Latest-Date</option>\n';
				} else {
				echo '>Image-Latest-Date</option>\n';
				}
			echo '<option value="image-latest-mtime"';
				if ($currentValue == "image-latest-mtime") { 
				echo ' selected="selected">Image-Latest-mtime</option>\n';
				} else {
				echo '>Image-Latest-mtime</option>\n';
				}		
			echo '<option value="image-mostrated"';
				if ($currentValue == "image-mostrated") { 
				echo ' selected="selected">Image-MostRated</option>\n';
				} else {
				echo '>Image-MostRated</option>\n';
				}
			echo '<option value="image-toprated"';
				if ($currentValue == "image-toprated") { 
				echo ' selected="selected">Image-TopRated</option>\n';
				} else {
				echo '>Image-TopRated</option>\n';
				}
			echo '<option value="album-latest"';
				if ($currentValue == "album-latest") { 
				echo ' selected="selected">Album-Latest</option>\n';
				} else {
				echo '>Album-Latest</option>\n';
				}
			echo '<option value="album-latestupdated"';
				if ($currentValue == "album-latestupdated") { 
				echo ' selected="selected">Album-LatestUpdated</option>\n';
				} else {
				echo '>Album-LatestUpdated</option>\n';
				}
			echo '<option value="album-mostrated"';
				if ($currentValue == "album-mostrated") { 
				echo ' selected="selected">Album-MostRated</option>\n';
				} else {
				echo '>Album-MostRated</option>\n';
				}		
			echo '<option value="album-toprated"';
				if ($currentValue == "album-toprated") { 
				echo ' selected="selected">Album-TopRated</option>\n';
				} else {
				echo '>Album-TopRated</option>\n';
				}
			echo "</select>\n";
		}
		
		if ($option == 'zpmas_sseffect') {
			echo '<select style="width:200px;" id="' . $option . '" name="' . $option . '"' . ">\n";
			
			echo '<option value="fade"';
				if ($currentValue == "fade") { 
				echo ' selected="selected">Fade</option>\n';
				} else {
				echo '>Fade</option>\n';
				}
			echo '<option value="shuffle"';
				if ($currentValue == "shuffle") { 
				echo ' selected="selected">Shuffle</option>\n';
				} else {
				echo '>Shuffle</option>\n';
				}
			echo '<option value="scrollUp"';
				if ($currentValue == "scrollUp") { 
				echo ' selected="selected">Scroll Up</option>\n';
				} else {
				echo '>Scroll Up</option>\n';
				}
			echo '<option value="scrollDown"';
				if ($currentValue == "scrollDown") { 
				echo ' selected="selected">Scroll Down</option>\n';
				} else {
				echo '>Scroll Down</option>\n';
				}
			echo '<option value="scrollRight"';
				if ($currentValue == "scrollRight") { 
				echo ' selected="selected">Scroll Right</option>\n';
				} else {
				echo '>Scroll Right</option>\n';
				}
			echo '<option value="scrollLeft"';
				if ($currentValue == "scrollLeft") { 
				echo ' selected="selected">Scroll Left</option>\n';
				} else {
				echo '>Scroll Left</option>\n';
				}
			echo '<option value="scrollHorz"';
				if ($currentValue == "scrollHorz") { 
				echo ' selected="selected">Scroll Horizontal</option>\n';
				} else {
				echo '>Scroll Horizontal</option>\n';
				}			
			echo '<option value="scrollVert"';
				if ($currentValue == "scrollVert") { 
				echo ' selected="selected">Scroll Vertical</option>\n';
				} else {
				echo '>Scroll Vertical</option>\n';
				}
			echo '<option value="blindX"';
				if ($currentValue == "blindX") { 
				echo ' selected="selected">Blind X</option>\n';
				} else {
				echo '>Blind X</option>\n';
				}
			echo '<option value="blindY"';
				if ($currentValue == "blindY") { 
				echo ' selected="selected">Blind Y</option>\n';
				} else {
				echo '>Blind Y</option>\n';
				}
			echo '<option value="cover"';
				if ($currentValue == "cover") { 
				echo ' selected="selected">Cover</option>\n';
				} else {
				echo '>Cover</option>\n';
				}
			echo '<option value="curtainX"';
				if ($currentValue == "curtainX") { 
				echo ' selected="selected">Curtain X</option>\n';
				} else {
				echo '>Curtain X</option>\n';
				}
			echo '<option value="curtainY"';
				if ($currentValue == "curtainY") { 
				echo ' selected="selected">Curtain Y</option>\n';
				} else {
				echo '>Curtain Y</option>\n';
				}
			echo '<option value="fadeZoom"';
				if ($currentValue == "fadeZoom") { 
				echo ' selected="selected">Fade Zoom</option>\n';
				} else {
				echo '>Fade Zoom</option>\n';
				}
			echo '<option value="growX"';
				if ($currentValue == "growX") { 
				echo ' selected="selected">Grow X</option>\n';
				} else {
				echo '>Grow X</option>\n';
				}
			echo '<option value="growY"';
				if ($currentValue == "growY") { 
				echo ' selected="selected">Grow Y</option>\n';
				} else {
				echo '>Grow Y</option>\n';
				}
			echo '<option value="slideX"';
				if ($currentValue == "slideX") { 
				echo ' selected="selected">Slide X</option>\n';
				} else {
				echo '>Slide X</option>\n';
				}
			echo '<option value="slideY"';
				if ($currentValue == "slideY") { 
				echo ' selected="selected">Slide Y</option>\n';
				} else {
				echo '>Slide Y</option>\n';
				}
			echo '<option value="toss"';
				if ($currentValue == "toss") { 
				echo ' selected="selected">Toss</option>\n';
				} else {
				echo '>Toss</option>\n';
				}
			echo '<option value="turnUp"';
				if ($currentValue == "turnUp") { 
				echo ' selected="selected">Turn Up</option>\n';
				} else {
				echo '>Turn Up</option>\n';
				}
			echo '<option value="turnDown"';
				if ($currentValue == "turnDown") { 
				echo ' selected="selected">Turn Down</option>\n';
				} else {
				echo '>Turn Down</option>\n';
				}
			echo '<option value="turnRight"';
				if ($currentValue == "turnRight") { 
				echo ' selected="selected">Turn Right</option>\n';
				} else {
				echo '>Turn Right</option>\n';
				}
			echo '<option value="turnLeft"';
				if ($currentValue == "turnLeft") { 
				echo ' selected="selected">Turn Left</option>\n';
				} else {
				echo '>Turn Left</option>\n';
				}
			echo '<option value="uncover"';
				if ($currentValue == "uncover") { 
				echo ' selected="selected">Uncover</option>\n';
				} else {
				echo '>Uncover</option>\n';
				}
			echo '<option value="wipe"';
				if ($currentValue == "wipe") { 
				echo ' selected="selected">Wipe</option>\n';
				} else {
				echo '>Wipe</option>\n';
				}
			echo '<option value="zoom"';
				if ($currentValue == "zoom") { 
				echo ' selected="selected">Zoom</option>\n';
				} else {
				echo '>Zoom</option>\n';
				}
				
			echo "</select>\n";
		}
		
		if ($option == 'zpmas_finallink') {
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
		
		if ($option == 'zpmas_thumbsize') {
			echo '<select style="width:200px;" id="' . $option . '" name="' . $option . '"' . ">\n";
			
			echo '<option value="small"';
				if ($currentValue == "small") { 
				echo ' selected="selected">small</option>\n';
				} else {
				echo '>small</option>\n';
				}
			
			echo '<option value="large"';
				if ($currentValue == "large") { 
				echo ' selected="selected">large</option>\n';
				} else {
				echo '>large</option>\n';
				}
				
			echo "</select>\n";
		}
		
		if ($option == 'zpmas_css') {
			echo '<select style="width:200px;" id="' . $option . '" name="' . $option . '"' . ">\n";
			
			echo '<option value="dark"';
				if ($currentValue == "dark") { 
				echo ' selected="selected">dark</option>\n';
				} else {
				echo '>dark</option>\n';
				}
			
			echo '<option value="light"';
				if ($currentValue == "light") { 
				echo ' selected="selected">light</option>\n';
				} else {
				echo '>light</option>\n';
				}
				
			echo "</select>\n";
		}
	}

}
?>