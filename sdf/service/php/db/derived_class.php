
<?php
/* include files */
require 'db_conn_class.php';
/* include files*** */



class derived_class extends db_conn_class{
    // insert update delete implementations are in db_conn_class(base class).
}
$pipe = new derived_class();
if($pipe->connection()){
	echo '<span style="color:green;font-size:20px;">CONNECTION SUCCESSFUL </span>, below statements will be executed...';

	/*$query = 'INSERT INTO kurti_comm(name,article_sub_type,style_name,material,product_desc,occasion_type,sleeve_type,pattern) values("one","tow","three","four","five","six","seven","eight")';
	echo $pipe->insert($query);*/
	$query = 'SELECT * from kurti where id_kurti<="86"';
     print_r ($pipe->return_values($query);
	 //print JSON_DECODE(   JSON_DECODE($pipe->return_values($query)) [1][2])[2];
	/*$query="UPDATE cus SET email='myupdated_email_id' WHERE id_cus>1;";
	$pipe->update($query);
	$query="DELETE FROM cus WHERE id_cus<10";
	$pipe->delete($query);
	$query = 'SELECT * FROM kurti_comm';
	echo $pipe->return_values($query);*/
}
else{
	echo '<span style="color:red;font-size:20px;">ERROR in DATABASE CONNECTION</span>, please try again ...';
}
?>

