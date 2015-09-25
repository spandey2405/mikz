<?php

include '../../../conf/conf.php';

$useragent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
{
$file = $styleM;
include '../../../ads/m_ads.php';
}
else
{
$file = $styleD;
include '../../../ads/d_ads.php';
}
$urlvar = explode("/",$_SERVER['REQUEST_URI']);
$pageno = $urlvar[count($urlvar)-2];
$type = $urlvar[count($urlvar)-3];
$page_data = json_decode(file_get_contents($pageData.$pageno."&type=".$type),true);
$nagdata = json_decode(file_get_contents($getNagv.$pageno."&type=".$type),true);
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

?>

<html>
    <head>
        <title>Funny Miku</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="<?php echo $file; ?>">
        <meta property="og:image" content="<?php echo $shareSocial; ?>"/>
<meta property="og:title" content="Miku : The Funny Character"/>
<meta property="og:url" content="<?php echo $actual_link; ?>"/>
<meta property="og:site_name" content="FunnyMiku.in"/>
<meta name="description" content="Funny Miku Is An Entertainment Website . We Focus On Making You Smile :)" />
<link rel="shortcut icon" href="/favicon.ico" type="<?php echo $feviSocial; ?>" />
    </head>
    
    <body>
        <div id="header-wrapper">
            <div id="wrapper">
                <div class="headerleft"><center><img src="<?php echo $logoSocial; ?>"></center></div>
                <div class="headerright"><center><img src="<?php echo $header_logo; ?>"></center></div>
            </div>

        </div>
        <div id="wrapper">
            <div id="main-wrapper">
                <div class="left">
                   <div class=""><center><?php echo $ads1; ?></center><br><br></div>
                   <br><center>
                    <?php     $link = $pages.$type."/";
    foreach ($nagdata as $pageTitle => $pageNo)
    echo '<a href="'.$link.$pageNo.'" class="css_btn_class">'.$pageTitle.'</a> ';
 ?>
                   </center><br>
<?php 

foreach($page_data as $data)
{

    $title = $data["title"];
    $file = $data["filename"];
    $filename = str_replace(".jpeg","",$data["filename"]);
    $fb = $fbShare.$filename;
    $tw = $twShare.$filename;
    $pin = $ptShare.$filename;
    $g = $gShare.$filename;

echo '<div class="post-title">'.$title.'</div>

<div class="post-body"><img src="'.$dataImage.$file.'" width="100%"></div>


<div class="social">
    <center>
        <div class="socialicons">
        <a href="'.$fb.'"><img src="'.$fbSocial.'"></a>
        </div>
        <div class="socialicons">
        <a href="'.$tw.'"><img src="'.$twSocial.'"></a>
        </div>
        <div class="socialicons">
        <a href="'.$pin.'"><img src="'.$ptSocial.'"></a>
        </div>
        <div class="socialicons">
        <a href="'.$g.'"><img src="'.$gSocial.'"></a>
        </div>
        </center>
</div>'; 
}
?>

                                      <br><center>
                       
                  <?php echo $ads2; ?>
                       <br><br>
                    <?php     $link = $pages.$type."/";
    foreach ($nagdata as $pageTitle => $pageNo)
    echo '<a href="'.$link.$pageNo.'" class="css_btn_class">'.$pageTitle.'</a> ';
 ?>
                   <br><br>
                  
                   
                   </center><br>
                   
                    
                </div>
                <div class="right">
                    <?php echo $ads3; ?>
                </div>
            </div>
        </div>
    </body>
</html>
