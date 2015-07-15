<?php
/**
 * @author
 * @copyright
 * @license
 */

defined("_JEXEC") or die("Restricted access");

if (!empty($params['readmorelink'])) {
	$item = JFactory::getApplication()->getMenu()->getItem( $params['readmorelink'] );
	$readModeUrl = JRoute::_($item->link . '&Itemid=' . $item->id);
} else {
	$readModeUrl = "";
}

if ($params['videosource'] == "youtube") {
	$videoUrl = "http://www.youtube.com/embed/". $params['youtubeid']. "?autoplay=1";
} else {
	$videoUrl = $params['url'];
}
if ($params['backgroundf']) {
	$styleStr = 'style="position: fixed; top:'. $params['top_position'] . 'px; left:0; height: '. $params['height'] . '; z-index:' . $params['z_index'] . '"';
} else {
	$styleStr = 'style="position: absolute;"';
}
?>

<div class="b-bgvideo">
    <div class="b-bgvideo-wrap" <?php echo $params['backgroundf']? "" : 'style="padding-bottom: '. $params['height'] . ';"'; ?>>
	<?php if (!$params['backgroundf']) { ?>
		<div class="content">
			<div class="inner">
				<?php if (!$params['backgroundf']) { ?>
					<h3><?php echo $params['header']; ?></h3>
					<p><?php echo $params['content']; ?></p>
					<?php if (!empty($readModeUrl)) { ?>
						<a href="<?php echo $readModeUrl; ?>" class="btn btn-border btn-lg"><?php JText::_('MOD_BBGVIDEO_READMORE'); ?></a>
					<?php } ?>
				<?php } ?>
            </div>
        </div>
        <div class="mask">&nbsp;</div>
		<?php } ?>
        <?php if($params['displaymode'] == 'iframe') { ?>
        <iframe  <?php echo $styleStr; ?> src="<?php echo $videoUrl; ?>" frameborder="0"></iframe>
        <?php } else { ?>
        <video <?php echo $styleStr; ?> autoplay <?php echo $params['loop']? " loop" : ""; ?>>
            <source src="<?php echo $videoUrl; ?>" type="video/mp4" />
        </video>
        <?php } ?>
    </div>
</div>
