<?php

// require
require 'db/db_conn_class.php';

//$post_date = file_get_contents("php://input");
//$data = json_decode($post_date);

$post_date = file_get_contents("php://input");
$received = json_decode($post_date);
//$toString=json-encode($received);
//echo $received->email;
//echo $received->pass;
//echo $received->confirmPass;
//echo $received->operation;

//member functions
function sender($l_code,$received_values = ''){
    switch($l_code){

        case 0:
            echo '{"code":0}';
            //echo $received->email;
            break;

        case 1:
            echo '{"code":1}';
            break;

        case 2:
            echo '{"code":2}';
            break;

        case 3:
            echo '{"code":3}';
            break;

        case 200:
            echo '{"code":200}';
            break;

         case 201:
            echo '{"code":201,"data":'.$received_values.'}';
            break;

        case 0://for failure in connection
            echo '{"code":0}';
            break;
        
        
        default:
            echo "{'code':1000}";
    }

}
//member functions***
//header('Content-Type: application/json');


class derived_class extends db_conn_class{
    // insert update delete implementations are in db_conn_class(base class).
}
$pipe_db = new derived_class();


if($pipe_db->connection())
{    //login funcitonality  

     if($received->operation=='login'){
        //echo 'login operations to be done';
        $query="SELECT * FROM cus WHERE email='".$received->email."' and pass='".$received->pass."'";
        if( $pipe_db->search_count($query)>0){
            sender(200);//successfully login
        }
        else{
            sender(2);//email & pass do not match
        }

    }//login functionality***fetch_kurti_comm

    if($received->operation=='signup'){
        //db connection is successful
        $query='SELECT * FROM cus WHERE email='."'".$received->email."'";
        $count = $pipe_db->search_count($query);
        // checking if email is already in use
        if($count>0){
            //email already in use
            sender(0);
        }
        else{
            $query = 'INSERT INTO cus(email,pass) values('."'".$received->email."','".$received->pass."')";
            $pipe_db->insert($query);
            sender(1);
        }
        //new mail it is, so save to db 
    


    }//if($received->operation=='signup')***

    // This will write product details in db, below code is invoked from dashboard folder.
    if($received->operation == 'products_entry'){
        
        $query = 'INSERT INTO kurti(fk_id_kurti_comm,colors,prices,sizes,qty) values('."'".$received->kurti_comm_id."','".$received->colors."','".$received->prices."','".$received->sizes."','".$received->qty."')";
        $count = $pipe_db->insert($query);
        if($count>=1){
            sender(200);
        }
        else{
            sender(3);
        }
        
    }

     // To fetch kurti_comm_details, will be invoked from admin panel.
    if($received->operation == 'fetch_kurti_comm'){
        $query = "SELECT * FROM kurti_comm";
        $received_values = $pipe_db->return_values($query);
        sender(201,$received_values);
        
    }

     if($received->operation == 'kurti_comm_entry'){
         //, name, article_sub_type, style_name, material, product_desc, , occasion_type, sleeve_type, pattern, 
        $query = 'INSERT INTO kurti_comm(name,article_sub_type,style_name,material,product_desc,occasion_type,sleeve_type,pattern) values('."'".$received->name."','".$received->article_sub_type."','".$received->style_name."','".$received->material."','".$received->product_desc."','".$received->occasion_type."','".$received->sleeve_type."','".$received->pattern."')";
        $count = $pipe_db->insert($query);
        if($count>=1){
            sender(200);
        }
        else{
            echo $count;
            sender(3);
        }
        
    }

    


 }//**inside successfull connection context
 else{//$pipe_db->test_db() failed
     sender(0);
 }




?>