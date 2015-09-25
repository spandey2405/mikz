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

//execute body 

if(isset($_GET["page"]))
{
    $type = $defaultdata["type"];
    if(isset($_GET["type"]))
    {
        $type = htmlspecialchars($_GET["type"]);
    }
    
   
    $current_page =  htmlspecialchars($_GET["page"]);
    $no_of_pages = count_folder($type);
    $next = $current_page + 1;
    $prev = $current_page - 1;
    if ($next > $no_of_pages)
    {
        $next = 1;
    }
    if ($prev < 1)
    {
        $prev = $no_of_pages;
    }
    
    $data["prev"] = $prev;
    if($current_page -3 < 1)
    {
        $start = 1;
    }
    else if($current_page + 3 > $no_of_pages)
    {
        $start = $no_of_pages - 4;
    }
    else
    {
        $start = $current_page - 2;    
    }
    for($i=1; $i<=5;$i++)
    {
        $data[$start]= $start;
        $start ++;
    }
    $data["next"] = $next;
    
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

function count_folder($type)
{
    $i = 0; 
    $dir = "../../httpdocs/pages/".$type."/";
    if ($handle = opendir($dir)) {
        while (($file = readdir($handle)) !== false){
            if (!in_array($file, array('.', '..'))) 
 
                $i++;
        }
    }
    return $i;
}

?>