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
if(isset($_GET["type"]))
{
    $access = 0;
    if(isset($_GET["a"]))
        $access = htmlspecialchars($_GET["a"]);
    $type =  htmlspecialchars($_GET["type"]);
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM  `funnymiku` WHERE  `type` =  '$type'";
    $result = mysqli_query($conn, $sql);
    $count = 0;
    
    if (mysqli_num_rows($result) > 0) {
        
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            
            $count = $count + 1;
        }
    
    
    } else {
        $data['Posts']="No Data Found";
        $data['error'] = $sql;
    }
    mysqli_close($conn); 
    
    $folders = count_folder($type);
    
    $id = $count;
    
    if($type=="posts")
    {
        $needed = $id;
    }
    else
    {
        $needed = ceil($id/4);
    }
    
    
    $folder = "pages/".$type."/";

    for($i = $folders; $i < $needed ; $i ++)
    {
        
        $c = $i + 1;
        mkdir($folder.$c);
        copy("index.txt", $folder.$c."/index.php");
        
    }
    $folders = count_folder($type);
    if($access == 1)
    {
        $data["Posts"] = $count;
        $data["folders"] = $folders;
        $data["required"] = $needed;
        $data["folder"] = $folder;
    }
    $data['success'] = 1;
    
}
else
{
    $data['error']="Post Type Is Required";
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


// Function Included 

function count_folder($type)
{
    $i = 0; 
    $dir = "pages/".$type;
    if ($handle = opendir($dir)) {
        while (($file = readdir($handle)) !== false){
            if (!in_array($file, array('.', '..'))) 

                $i++;
        }
    }
    return $i;
}
?>