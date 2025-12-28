<?php
/*
php h:\github\music\_music_room\list_movies.php
*/

$par_path = 'E:';
//$dir_name = 'Video\\Movies';
$dir_name = 'Movies';
$movies = array();
list_movies( $par_path, $dir_name, $movies );
echo sizeof( $movies );
foreach( $movies as $movie )
{
	echo $movie, ", Movies\n";
}

function list_movies(
	string $par_path,
	string $dir_name, 
	array &$movies )
{
	$dir_path = $par_path . "\\" . $dir_name;
	
	if( is_dir( $dir_path ) )
	{
		$contents = scandir( $dir_path );
		
		foreach( $contents as $item )
		{
			// Exclude "." and ".." which represent the current and parent directories
			if( $item != '.' && $item != '..' )
			{
				if( is_dir( 
					$dir_path . "\\" . $item ) )
				{
					list_movies( $dir_path, $item, $movies );
				}
				else
				{
					if( str_ends_with( $item, '.srt' ) )
					{}
					else
					{
						array_push( $movies, $item );
					}
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

