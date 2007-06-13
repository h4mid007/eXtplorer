<?php
/** ensure this file is being included by a parent file */
if( !defined( '_JEXEC' ) && !defined( '_VALID_MOS' ) ) die( 'Restricted access' );

require( $mosConfig_absolute_path.'/components/com_joomlaxplorer/configuration.jx.php' );

if( !$frontend_enabled || empty( $subdir ) || $subdir == '/' || $subdir == '\\' ) {
	echo _NOT_EXIST;
	return;
}

$GLOBALS["home_dir"] = $mosConfig_absolute_path . $subdir;
// the url corresponding with the home directory: (no trailing '/')
$GLOBALS["home_url"] = $mosConfig_live_site.'/downloads';

require( $mosConfig_absolute_path.'/components/com_joomlaxplorer/joomlaxplorer.init.php');
include( $mosConfig_absolute_path.'/components/com_joomlaxplorer/joomlaxplorer.list.php');

if( !empty($GLOBALS['ERROR'])) {
	echo '<h2>'.$GLOBALS['ERROR'].'</h2>';
	return;
}

$database->setQuery( 'SELECT id, name FROM `#__menu` WHERE link LIKE \'%option=com_joomlaxplorer%\' ORDER BY `id` LIMIT 1');
$database->loadObject( $res );
if( is_object( $res )) {
	$name = $res->name;
}
else {
	$name = '';
}

if( $name || $dir ) {
	$mainframe->setPageTitle( $name.' - '.$dir );
}
$action = mosGetParam( $_REQUEST, 'action', 'list');
$item = mosGetParam( $_REQUEST, 'item', '');

// Here we allow *download* and *directory listing*, nothing more, nothing less
switch( $action ) {
	case 'download':
		require _JX_PATH . "/include/download.php";
	  	jx_Download::execAction($dir, $item);
	  	exit;
	case 'list':
	default:
		list_dir($dir);
		break;
}

// A small nice footer. Remove if you don't want to give credit to the developer.
echo '<br style="clear:both;"/>
	<small>
	<a class="title" href="'.$GLOBALS['jx_home'].'" target="_blank">powered by joomlaXplorer</a>
	</small>
	';
	
?>