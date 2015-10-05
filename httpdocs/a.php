<?php
require 'connect/connect.php';
require 'keys/key.php';
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

if(isset($_GET["key"]) && isset($_GET["title"]) && isset($_GET["file"]) && isset($_GET["by"]))
{
    $type = $defaultdata["type"];
    if (isset($_GET["type"]))
    {
        $type = htmlspecialchars($_GET["type"]);
    }
    
    $key = htmlspecialchars($_GET["key"]);
    if ($key == $key1)
    {
    $title = htmlspecialchars($_GET["title"]);
    $file = htmlspecialchars($_GET["file"]);
    $by = htmlspecialchars($_GET["by"]);
    $t = time();
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $sql = "INSERT INTO `funnymiku`(`title`, `type`, `filename`, `time`, `postedby`) VALUES ('$title','$type','$file',$t,'$by')";
    if (mysqli_query($conn, $sql)) {
        $data['success'] = 1;
    } else {
        $data['error'] = mysqli_error($conn);
        $data['query'] = $sql;
    }
    mysqli_close($conn); 
    }
    else
    {
        $data['error']="Invalid Authentication";
    }


}
else
{
    $data['error']="Arguments Missing";
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