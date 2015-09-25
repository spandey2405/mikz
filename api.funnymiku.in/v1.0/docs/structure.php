<?php
require 'connect/connect.php';
$data['success'] = 0;
if(isset($_GET["p"]))
{
    $p = htmlspecialchars($_GET["p"]);
}
else
{
    $p = 0;
}

//execute body 

if(isset($_GET["argument"]))
{
    $argument =  htmlspecialchars($_GET["argument"]);
    $conn = mysqli_connect($servername, $username, $password, $dbname);
//    **** If Argument Given Return Data $data ****
    mysqli_close($conn); 

}
else
{
    $data['error']="Post Id Required";
}

//print responce

if($p==1)
{
   echo json_encode($data);
}
else
{
   echo "<pre>".json_encode(($data),JSON_PRETTY_PRINT)."</pre>";
}
?>

