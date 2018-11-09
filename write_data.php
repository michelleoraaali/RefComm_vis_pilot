<?php
$input = file_get_contents('php://input');
echo $input;


#$input = str_replace("\\n", "", $input);
$input = str_replace('\\"', "", $input);
/*$post_data = json_decode($input, true);
$name = "data/".$post_data['filename'].".csv"; 
$data = $post_data['filedata'];
*/

$filename = explode( 'filename":"' , $input );
$filename = explode( '"' , $filename[1] )[0];
$name = "data/".$filename.".txt";

$data = explode( 'filedata":"' , $input )[ 1 ];
$data = str_replace('\\r\\n', 'NEWLINE', $data);
$data = explode( 'NEWLINE"}' , $data )[ 0 ];

//$post_data = json_decode($input, true);
//print $post_data;
// the directory "data" must be writable by the server
 
// write the file to disk
file_put_contents($name, $data);
?>