<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//I didn't include db class into zip
$db = new DB();

//If there is POST of data
if(isset($_POST['data']) && !empty($_POST['data'])){
   //Decode data from json
   $data = json_decode($_POST['data'],true);
   
   //Get client's ip Address
   $ip = $_SERVER['REMOTE_ADDR'];
   
   //If the fields are not empty
   if(!empty($data['title']) && !empty($data['iframe']) &&
      !empty($data['hostname']) && !empty($data['timestamp'])){
        //Start from order = 1
        $order = 1;
        /* Check if there is record for the same page form the same user
         * then increment order by 1
        */
        $query = "SELECT Order FROM
                     logs
                  WHERE
                     Title = '".$data['Title']."' AND RemoteIP = '".$ip."'
                  ORDER BY Order DESC LIMIT 1;";
        $rows = $db->query($query);
        
        if(isset($rows) && !empty($rows)){
            $order = $row['Order'];
            $order = $order + 1;
        } 
        
        //Inserts user's data into DB
        $query = "INSERT INTO
                    logs (Date,Title,Hostname,Frame,Order,RemoteIP)
                   VALUES ('".$data['timestamp']."',
                           '".$data['title']."',
                           '".$data['Hostname']."',
                           '".$order."',
                           '".$ip."');";
        $db->query($query);
   }
   
}
