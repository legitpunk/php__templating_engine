<?php

?>

<head>
	<script src="js/jquery-3.3.1.js"></script>
	<style>
	.tomato 
	{
		color: tomato;
	}
</style>
</head>

<?php

$file		=		'template_00001.php';

/*
echo		nl2br(file_get_contents($file));
*/


$orig = file_get_contents($file);
/*$a = htmlentities($orig);*/

/*
echo '<code>';
echo '<pre>';

echo $a;

echo '</pre>';
echo '</code>';
*/
/*
header("Content-Type: text/plain");
*/
echo '<textarea id="textarea" class="" style="width:100%;height:100%;">';
echo $orig;
echo '</textarea>';

?>

<script>
var $test = $('#textarea').html();
$test = $test.replace(/ar/gi, '<span class="tomato">ar</span>');
$('#textarea').html($test);
</script>