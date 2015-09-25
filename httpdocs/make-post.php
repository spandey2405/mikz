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

if(isset($_GET["post"]))
{
    $access = 0;
    if(isset($_GET["a"]))
        $access = htmlspecialchars($_GET["a"]);
    $post =  htmlspecialchars($_GET["post"]);
    $post = explode(".",$post)[0];
    if(mkdir("posts/".$post))
    {
        if(copy("post.txt", "posts/".$post."/index.php"))
        {
            $data["success"] =1;
        }
        else
        {
            $data["error"]="could not create Index file in posts folder";
        }
        
    }
    else
    {
        $data["error"]="could not create folder"."posts/".$post;
    }
    
    if($access==1)
        $data['info'] = "Folder "."posts.".$post." Sucessfully Created With Index File";
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

