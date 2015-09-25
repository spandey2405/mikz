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

if(isset($_GET["file"]) && isset($_GET["msg"]))
{
    $file =  htmlspecialchars($_GET["file"]).".jpeg";
    $message =  htmlspecialchars($_GET["msg"]);

    $lines = explode("\n",$message);
    $count_lines = count($lines);
    $im = imagecreatetruecolor(550, (30*$count_lines)+80);

    // Create some colors
    $background = imagecolorallocate($im, 224, 224, 224);
    $color['red'] = imagecolorallocate($im, 151, 0, 0);
    $color['green'] = imagecolorallocate($im, 25, 51, 0);
    imagefilledrectangle($im, 0, 0, 550, (30*$count_lines)+80, $background);

    $font= 'font/AndBasR.ttf';
    $count = 1;

    foreach ($lines as $line)
    {
        imagettftext($im, 20, 0, 10, (30*$count)+25, $color['green'], $font, $line);
        $count = $count + 1;
    }
    $line = "- FunnyMiku.in";
    imagettftext($im, 14, 0, 380, (30*$count)+40, $color['red'], $font, $line);
    // Using imagepng() results in clearer text compared with imagejpeg()
    $quality = 90;
    $file = "images/data/".$file;
    imagejpeg($im, $file, $quality);
    $data["success"] = 1;
    $data["file"] =  $file;
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

