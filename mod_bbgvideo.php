<?php
/**
 * @author
 * @copyright
 * @license
 */

defined("_JEXEC") or die("Restricted access");

$b_debug = false;

if ($b_debug) {
	echo "<br>In ". __FILE__ . "<br>";
    print_r($params);
}
$doc =& JFactory::getDocument();
$doc->addStyleSheet( JURI::base() . "/modules/mod_bbgvideo/css/style.css");
$doc->addScript( JURI::base() . "/modules/mod_bbgvideo/js/jquery.vide.js");

// Include the syndicate functions only once
// require_once __DIR__ . '/helper.php';
// $item = ModBbgvideoHelper::getItem($params);

require JModuleHelper::getLayoutPath('mod_bbgvideo', $params->get('layout', 'default'));
