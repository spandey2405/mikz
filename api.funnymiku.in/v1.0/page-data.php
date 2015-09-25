<?php
require 'connect/connect.php';
require 'conf/conf.php';
if(isset($_GET["p"]))
{
    $p = htmlspecialchars($_GET["p"]);
}
else
{
    $p = 0;
}
if(isset($_GET["page"]))
{   
    $type = $defaultdata["type"];
    if(isset($_GET["type"]))
    {
        $type = htmlspecialchars($_GET["type"]);
    }
    
    $page = htmlspecialchars($_GET["page"]);
    
    $max = $page*4 ;
    $min = $max - 4;

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM  `funnymiku` WHERE  `type` =  '$type' ORDER BY  `funnymiku`.`time` DESC";
    $result = mysqli_query($conn, $sql);
    $datano = 1;
    $count = 1;
    if (mysqli_num_rows($result) > 0) 
    {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            if($type=="posts")
            {
            if($count == $page)
            {
            $data[$datano] = $row;         
            }
            $count++;
            }
            else
            {
            if($count <= $max && $count > $min)
            {
            $data[$datano] = $row;
            $datano = $datano + 1;            
            }
            $count++;
            }

            
        }
        
    }
    else {
            $data['error']="No Data Found";
        }
}
else
{
    $data['error']="Post Id Required";
}



if($p==1)
{
   echo json_encode($data);
}
else
{
   echo "<pre>".json_encode(($data),JSON_PRETTY_PRINT)."</pre>";
}

//callmethod = api/v1.0/helper/page-data.php?page=2

?>

