<?php

function php_templator($file_type, $file_contents, $V)
{
	if($file_type				===		'css')
	{
		$string					=			str_replace('(', '<?= $', $file_contents);
		$string					=			str_replace(')', '; ?>', $string);
		$string					=			str_replace('S[', '_SESSION[\'', $string);
		$string					=			str_replace(']S', '\']', $string);
	}
	elseif($file_type	===		'json')
	{
		$string					=			str_replace('"{', '"<?= $', $file_contents);
		$string					=			str_replace('}"', '; ?>"', $string);
		$string					=			str_replace('S[', '_SESSION[\'', $string);
		$string					=			str_replace(']S', '\']', $string);
	}
	else
	{
		$string					=			str_replace('{', '<?= $', $file_contents);
		$string					=			str_replace('}', '; ?>', $string);		
		$string					=			str_replace('S[', '_SESSION[\'', $string);
		$string					=			str_replace(']S', '\']', $string);
	}

	file_put_contents('tmp.php', $string);

	ob_start();
	
	include('tmp.php');
	
	$string						=			ob_get_clean();

	if($file_type				===		'css')
	{
		$string					=			'<style>'.$string.'</style>';
	}
	
	return $string;
}

	
/*
$string				=			str_replace('<ar', '<article', $string);
$string				=			str_replace('<b', '<button', $string);
$string				=			str_replace('<c', '<content', $string);
$string				=			str_replace('<d', '<div', $string);
$string				=			str_replace('</ar', '</article', $string);
$string				=			str_replace('</b', '</button', $string);
$string				=			str_replace('</c', '</content', $string);
$string				=			str_replace('</d', '</div', $string);
*/

?>