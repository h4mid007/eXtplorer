<?php
// ensure this file is being included by a parent file
if( !defined( '_JEXEC' ) && !defined( '_VALID_MOS' ) ) die( 'Restricted access' );

//------------------------------------------------------------------------------
// Configuration Variables
	if( !is_object( $my )) {
		// login to use eXtplorer: (true/false)
		$GLOBALS["require_login"] = true;
	}
	
	// allow Zip, Tar, TGz
	if( function_exists("gzcompress")) {
	  	$GLOBALS["zip"] = $GLOBALS["tgz"] = true;
	}
	else {
	  	$GLOBALS["zip"] = $GLOBALS["tgz"] = false;
	}

//------------------------------------------------------------------------------
// Global User Variables (used when $require_login==false)
	$GLOBALS["separator"] = "/";
	  
	// the home directory for the filemanager: (use '/', not '\' or '\\', no trailing '/')

	
	// show hidden files in QuiXplorer: (hide files starting with '.', as in Linux/UNIX)
	$GLOBALS["show_hidden"] = true;
	
	// filenames not allowed to access: (uses PCRE regex syntax)
	$GLOBALS["no_access"] = "^\.ht";
	
	// user permissions bitfield: (1=modify, 2=password, 4=admin, add the numbers)
	$GLOBALS["permissions"] = 7;
//------------------------------------------------------------------------------
/* NOTE:
	Users can be defined by using the Admin-section,
	or in the file "config/.htusers.php".
	For more information about PCRE Regex Syntax,
	go to http://www.php.net/pcre.pattern.syntax
*/
//------------------------------------------------------------------------------
?>
