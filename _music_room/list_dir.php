<?php
/*
php h:\github\music\_music_room\list_dir.php
*/

$par_path = 'e:';
$dir_name = '';

list_dir( $par_path, $dir_name, '' );

function list_dir(
	string $par_path,
	string $dir_name, 
	string $padding )
{
	$dir_path = $par_path . "\\" . $dir_name;
	
	if( is_dir( $dir_path ) )
	{
		$contents = scandir( $dir_path );

		echo "${padding}${dir_name}\n";
		
		foreach( $contents as $item )
		{
			// Exclude "." and ".." which represent the current and parent directories
			if( $item != '.' && $item != '..')
			{
				if( is_dir( 
					$dir_path . "\\" . $item ) )
				{
					list_dir( $dir_path, $item, $padding . "  " );
				}
				else
				{
					//echo $item . "\n";
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

