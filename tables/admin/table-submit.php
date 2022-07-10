<?php

session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


require_once("mte/admin/mte-submit.php");
$tabledit = new MySQLtabledit();



		#####################
		# required settings #
		#####################


# database settings:
require_once "config_tables.php";


# table of the database you want to edit:
$tabledit->table = 'LogSubmit';


# the primary key of the table (must be AUTO_INCREMENT):
$tabledit->primary_key = 'ID';


# the fields you want to see in "list view"
# Always add the primary key (`ID)`: 



	$tabledit->fields_in_list_view = array('ID','user','label','page','IP','date');


		#####################
		# optional settings #
		#####################


# Head of the page (<h1>head_1<h1>):
$tabledit->head_1 = "";


# language (en=English, de=German, fr=French, nl=Dutch, sv=Swedish):
$tabledit->language = 'en';


# numbers of rows/records in "list view": 
$tabledit->num_rows_list_view = 50;


# required fields in edit or add record: 
$tabledit->fields_required = array();


# Fields you want to edit (remove this to edit all the fields).
$tabledit->fields_to_edit = array();


# help texts: 
$tabledit->help_text = array(
	'user' => '',
	'label' => '',
	'page' => '',
	'IP' => '',
	'date' => ''
);


# visible name of the fields: 
$tabledit->show_text = array(
	'user' => '',
	'label' => '',
	'page' => '',
	'IP' => '',
	'date' => ''
);


# visible name of the fields in list view: 
$tabledit->show_text_listview = array(
	'user' => 'Username',
	'label' => 'Label',
	'page' => 'Page',
	'IP' => 'IP Address',
	'date' => 'Date/Time'
);

# Make selectlist on inputfield based on another table
# in this example: `employees`.`job` is based on `jobs`.`jobname`: 
/*$tabledit->lookup_table = array(
	'emails' => array(
		'query' => "SELECT `id`, `phrase` FROM `phrase`;",
		'option_value' => 'id',
		'option_text' => 'jobname'
	)
);*/


$tabledit->width_editor = '90%';
$tabledit->width_input_fields = '500px';
$tabledit->width_text_fields = '498px';
$tabledit->height_text_fields = '200px';


# warning no .htaccess ('on' or 'off'): 
$tabledit->no_htaccess_warning = 'on';



		####################################
		# connect, show editor, disconnect #
		####################################


$tabledit->database_connect();

echo "<!DOCTYPE html>
<html lang='en'>
<head>

	<meta charset='utf-8'>

	</head>
	<body>
";

$tabledit->do_it();

echo "
	</body>
	</html>"
;

$tabledit->database_disconnect();
?>