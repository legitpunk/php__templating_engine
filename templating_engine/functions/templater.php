<?php

function templater_json($file)
{
	/*
	$file				=			str_replace('<ar', '<article', $file);
	$file				=			str_replace('<b', '<button', $file);
	$file				=			str_replace('<c', '<content', $file);
	$file				=			str_replace('<d', '<div', $file);
	$file				=			str_replace('</ar', '</article', $file);
	$file				=			str_replace('</b', '</button', $file);
	$file				=			str_replace('</c', '</content', $file);
	$file				=			str_replace('</d', '</div', $file);
	*/
	
	$file				=			str_replace('S[', '_SESSION[\'', $file);
	$file				=			str_replace(']S', '\']', $file);
	
	file_put_contents('tmp.php', $file);

	ob_start();
	include('tmp.php');
	$html	=	ob_get_clean();

	return $html;
}