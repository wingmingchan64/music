<?php
/*
php h:\github\music\_music_room\list_dir.php
*/

$par_path = 'k:';
//$dir_name = '_multi_channel';
//$dir_name = 'BR';
$dir_name = '_Others';
$to_skip = array(
	"Done",
	"5ch", "6ch", 
	"Artwork", "Artworks", "artwork", "art", "Art", "ART",
	"Booklet", "booklet",
	"covers", "Cover", "Covers",
	"scan", "scans", "Scan", "Scans",
	"Manooscans", "Stereo"
);

list_dir( $par_path, $dir_name, '  ' );
//list_dir( $par_path, $dir_name, '' );

function list_dir(
	string $par_path,
	string $dir_name, 
	string $padding = '',
	bool $show_file = false )
{
	global $to_skip;
	$dir_path = $par_path . "\\" . $dir_name;
	
	if( is_dir( $dir_path ) )
	{
		$contents = scandir( $dir_path );

		echo "${padding}${dir_name}\n";
		
		foreach( $contents as $item )
		{
			// Exclude "." and ".." which represent the current and parent directories
			if( $item != '.' && 
				$item != '..' && 
				!in_array( $item, $to_skip )
			)
			{
				if( is_dir( 
					$dir_path . "\\" . $item ) )
				{
					list_dir( $dir_path, $item, $padding . "  " );
				}
				elseif( $show_file )
				{
					echo $item . "\n";
				}
			}
		}
	}
	else
	{
		echo "Error: Directory '$dir_path' not found or not readable.\n";
	}
}
?>

