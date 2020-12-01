<?php

error_reporting(E_ALL);
set_time_limit(0);
ini_set('display_errors', '1');
ini_set('memory_limit', '256M');
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');

function getDirectory( $path = '.', $level = 0 ){

    $ignore = array( 'cgi-bin', '.', '..', 'search-files.php' );
    $allow = array( '.php', '.htm', '.html', '.js', '.php' );
    // Directories to ignore when listing output. Many hosts
    // will deny PHP access to the cgi-bin.

    $dh = opendir( $path );
    // Open the directory to the handle $dh

    while( $dh && false !== ( $file = readdir( $dh ) ) ){
    // Loop through the directory

        if( !in_array( $file, $ignore ) && (is_allowed_file( $file ) || is_dir( "$path/$file" )) ) {
        // Check that this file is not to be ignored

            $spaces = str_repeat( '&nbsp;', ( $level * 4 ) );
            // Just to add spacing to the list, to better
            // show the directory tree.

            if( is_dir( "$path/$file" ) ){
            // Its a directory, so we need to keep reading down...

                getDirectory( "$path/$file", ($level+1) );
                // Re-call this same function but on a new directory.
                // this is what makes function recursive.

            } else {

                $file_content = file_get_contents($path."/".$file);
                if (preg_match('@Address Line 1@i', $file_content, $ingest_match))
                {
                	echo $path."/".$file . " - Found<br>\n";
                }

                unset( $file_content );
            }
        }
    }

    closedir( $dh );
    // Close the directory handle

}

function is_allowed_file($file) {
	if (stripos($file, "search-files.php") !== false) return false;

	if (stripos($file, ".html") !== false ||
		stripos($file, ".htm") !== false ||
		stripos($file, ".php") !== false ||
		stripos($file, ".js") !== false ||
		stripos($file, ".tpl") !== false ||
		stripos($file, ".module") !== false ||
		stripos($file, ".php") !== false)
		return true;
	return false;
}

getDirectory(dirname(__FILE__));
?>