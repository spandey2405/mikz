<?php
require 'connect/connect.php';

if(isset($_GET["p"]))
{
    $p = htmlspecialchars($_GET["p"]);
}
else
{
    $p = 0;
}
if(isset($_GET["postid"]))
{
    $file = htmlspecialchars($_GET["postid"]).".jpeg";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM  `funnymiku` WHERE  `filename` =  '$file'";
    $result = mysqli_query($conn, $sql);
    $count = 1;
    if (mysqli_num_rows($result) > 0) {
        
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $data['DATA'] = $row;
        }
        
    } else {
        $data['error']="No Data Found";
        $data['file'] = $file." Not Found";
    }
mysqli_close($conn); 
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
?>

