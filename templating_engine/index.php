<?php

session_start();

// takes a template in html  or css or json and replaces "syntaxed" php vars with their php values;
include('functions/php_templator.php');
	
?>

<html>

	<style>
		p{
			font-size:1rem;
			font-family:Arial;
		}
	</style>
	
	<body>
		<center>
	
	<?php

	/***********************************************************************************************************************************************

	an html file;
	the change can be seen in the broswer inspector
	
	***********************************************************************************************************************************************/


	// ev.php - usage is ev($var) and it'll echo the var and put a <br> in there afterwards;
	include('functions/ev.php');			

	// the file name
	$file_php											=			'template.html';
	$file_type										=			'php';

	// get the file contents of the template file
	$contents_php								=			file_get_contents($file_php);

	// assign some variables to be used in the template;
	$V														=			new stdclass();
	$V->php_p__class_var			=			'php_p__class_var';
	$V->php_button__id_var			=			'php_button__id_var';
	$V->php_button__class_var	=			'php_button__class_var';
	$V->php_text_var						=			'an html file. <br>Inspect the html in the broswer to see that the php values have been applied to the correct html tags.<br><p class="p__class2">a css file: <br>this text shows that php values can be used in stylsheets, whilst allowing the developer to continue developing css stylesheets using the colored stylising from their IDE (code editor)</p>';
	$_SESSION['varname']				=			'session_varname';
			
	// create html from the template with all the vars used in it;
	$result_html									=			php_templator($file_type, $contents_php, $V);

	// echo the html
	ev($result_html);



	/***********************************************************************************************************************************************

	a css file;
	the change can be seen on the top line of text "wind in the willows";
	
	***********************************************************************************************************************************************/



	// assign some variables to be used in the template;
	$V														=			new stdclass();
	$V->p__fontsize							=			'2rem';
	$V->p__fontfamily						=			'\'Sans Serif\'';
	$_SESSION['varname']				=			'green';

	// the file name
	$file_css											=			'stylesheet2.css';
	$file_type										=			'css';

	$contents_css								=			file_get_contents($file_css);
	$result_css										=			php_templator($file_type, $contents_css, $V);
	
	ev($result_css);



	/***********************************************************************************************************************************************

	a json file;

	***********************************************************************************************************************************************/

?>
	<p>a json file:</p>
	<br>
	<p>the correct json php var values have been placed.</p>
<?php

	// takes a template in json and replaces "syntaxed" php vars with their values;
	include('functions/templater_json.php');

	// include the "echo pre" function
	include('functions/evp.php');	

	// this is for a json file templator
	$file_json												=			'template.json';
	$file_type											=			'json';

	// get the json file
	$contents_json									=			file_get_contents($file_json);

	// assign some variables to be used in the template;
	$V															=			new stdclass();
	$V->html_id										=			'php_html_id_var';
	$V->html_class								=			'php_html_class_var';
	$_SESSION['varname']					=			'php_session_var';

	// templater renders the json file with replaced php vars in it ($V->asdf = "asdf_value" and $V->div_id = "id" and $_SESSION['varname']	=	"session_varname");
	$result_json										=			php_templator($file_type, $contents_json, $V);

	// usage = evp($var);
	evp($result_json);



?>

		</center>
		
	</body>
	
</html>
