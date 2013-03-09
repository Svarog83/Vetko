
				<div id="menu">
					<?php if ($_zp_gallery_page != '404.php') { ?>
					<div id="social">
						<a href="http://facebook.com/share.php?u=<?php echo $sociallink; ?>&amp;title=<?php echo $socialtitle; ?>" target="_blank" class="f" title="<?php echo gettext('Share on Facebook'); ?>"></a>
						<a href="http://twitter.com/home?status=<?php echo $socialtitle; ?> <?php echo $twitterlink; ?>" target="_blank" class="t" title="<?php echo gettext('Spread the word on Twitter'); ?>"></a>
						<a href="http://digg.com/submit?phase=2&amp;url=<?php echo $sociallink; ?>&amp;title=<?php echo $socialtitle; ?>" target="_blank" class="di" title="<?php echo gettext('Bookmark on Digg'); ?>"></a>

						<a href="javascript:toggle('subscribeextrashow');" class="rss" title="<?php echo gettext('RSS'); ?>"></a>
						<div id="subscribeextrashow">
							<ul>
								<?php if (in_context(ZP_ALBUM)) { ?>
								<li><?php printRSSLink('Collection', $prev, gettext('Latest Images of this Album'),'',false); ?></li>
								<li><?php printRSSLink('Comments-album', $prev, gettext('Latest Comments of this Album'),'',false); ?></li>
								<?php } ?>
								<?php if (in_context(ZP_IMAGE)) { ?>
								<li><?php printRSSLink('Comments-image', $prev, gettext('Latest Comments of this Image'),'',false); ?></li>
								<?php } ?>
								<li><?php printRSSLink('Gallery', $prev, gettext('Latest Images'),'',false); ?></li>
								<li><?php printRSSLink('AlbumsRSS', $prev, gettext('Latest Albums'),'',false); ?></li>
								<?php if ($zenpage) { ?>
								<li><?php printZenpageRSSLink('News','','',gettext('Latest News'),'',false); ?></li>
								<li><?php printZenpageRSSLink('NewsWithImages','','',gettext('Latest News and Images'),'',false); ?></li>
								<li><?php printZenpageRSSLink('Comments-all','','',gettext('Latest Comments'),'',false); ?></li>
								<?php } else { ?>
								<li><?php printRSSLink('Comments', $prev, gettext('Latest Comments'),'',false); ?></li>
								<?php } ?>				
							</ul>
						</div>
						<?php if ((!zp_loggedin()) && (function_exists('printUserLogin_out'))) { ?>
						<?php if (checkAccess($hint,$show)) { ?>
						<a href="javascript:toggle('password-div');" class="pass" title="<?php echo gettext('Login'); ?>"></a>
						<div id="password-div">
							<?php printUserLogin_out('','',true); ?>
						</div>
						<?php } ?>
						<?php } else {
						printAdminToolbox(); 
						} ?>
					</div>
					<?php } ?>
					<ul id="nav">
						<li <?php if ($galleryactive) { ?>class="active" <?php } ?>><a href="<?php echo $zpmas_homelink; ?>" title="<?php echo gettext("Gallery"); ?>"><?php echo gettext("Gallery"); ?></a></li>
						<?php if ($zenpage) { ?>
						<li <?php if ($_zp_gallery_page == "news.php") { ?>class="active" <?php } ?>><a href="<?php echo getNewsIndexURL(); ?>"><?php echo gettext('News'); ?></a></li>
						<?php printPageMenu('list-top','','active','','active','',true,false); ?>
						<?php } ?>
						<li <?php if ($_zp_gallery_page == "archive.php") { ?>class="active" <?php } ?>><a href="<?php echo getCustomPageURL('archive'); ?>" title="<?php echo gettext('Archive View'); ?>"><?php echo gettext('Archive'); ?></a></li>
						<?php if (function_exists('printContactForm')) { ?><li <?php if ($_zp_gallery_page == "contact.php") { ?>class="active" <?php } ?>><?php printCustomPageURL(gettext('Contact'),"contact"); ?></li><?php } ?>
						<?php if ((!zp_loggedin()) && (function_exists('printRegistrationForm'))) { ?>
						<li <?php if ($_zp_gallery_page == "register.php") { ?>class="active" <?php } ?>><a href="<?php echo getCustomPageURL('register'); ?>" title="<?php echo gettext('Register'); ?>"><?php echo gettext('Register'); ?></a></li>
						<?php } ?>					
					</ul>
				</div>