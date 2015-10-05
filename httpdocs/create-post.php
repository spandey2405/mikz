<?php

$domain = "http://funnymiku.in/";
$domain_api = "http://api.funnymiku.in/v1.0/";
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

if(isset($_GET["key"]) && isset($_GET["msg"]) && isset($_GET["title"]) && isset($_GET["file"]))
{
    $data['success'] = 1;
    $key = $_GET["key"];

    $title = $_GET["title"];
    $file = $_GET["file"];
   
    create_post_folder($_GET['file']);
    create_post_image(explode(".",$_GET['file'])[0] , $_GET['msg']);
    $type = "jokes";
    if (isset($_GET["type"]))
    {
        $type = $_GET["type"];
    }
    
    $by = "Miku";
    if (isset($_GET["by"]))
    {
        $by = $_GET["by"];
    }
    
    update_db($key, $title, $file, $by, $type);
    
}
else
{
    $data['error']="Post Id Required";
}

if($p==1)
{
   echo json_encode($data);
   exit(0);
}
else
{
   echo "<pre>".json_encode(($data),JSON_PRETTY_PRINT)."</pre>";
   exit(0);
}

function create_post_folder($file)
{
    global $domain, $data;
    $data['folder-create-info'] =  file_get_contents($domain.'make-post.php?p=1&a=1&post='.$file);
    
}

function create_post_image($file , $message)
{
    global $domain, $data;
    $data['image-create-info'] = file_get_contents($domain.'create-image.php?p=1&a=1&file='.$file."&msg=".$message);
   
}

function update_db($key, $title, $file, $by, $type)
{
    global $domain_api, $data;
    $data['update-db-info'] = file_get_contents($domain_api.'insert.php?p=1&key='.$key.'&title='.$title.'&file='.$file.'&by='.$by.'&type='.$type);
}
?>
