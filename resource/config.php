<?php 
	session_start();
	//session_destroy();
 ?>
<?php 
	defined("DS")?null:define("DS",DIRECTORY_SEPARATOR);
	defined("template_front")?null:define("template_front",__DIR__.DS."template/front");
	defined("template_back")?null:define("template_back",__DIR__.DS."template/back");
	// echo __FILE__;
	// echo __DIR__;
	// echo DIRECTORY_SEPARATOR;
	// echo template_front."<hr>";
	// echo template_back."<hr>";

	defined("db_host")?null:define("db_host","localhost");
	defined("db_user")?null:define("db_user","root");
	defined("db_password")?null:define("db_password","");
	defined("db_name")?null:define("db_name","phpecommerce");
	$connect=mysqli_connect(db_host,db_user,db_password,db_name);
	// if($connect){
	// 	echo "Success";
	// }
	include_once "functions.php";
 ?>