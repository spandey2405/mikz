<?php
//main domains directory
//$home_base_dir = "http://funnymiku.in/";
//$api_base_dir = "http://api.funnymiku.in/v1.0/";

$home_base_dir = "http://localhost/httpdocs/";
$api_base_dir = "http://localhost/api.funnymiku.in/v1.0/";

//$home_base_dir -> dir/files
$ads = $home_base_dir."ads/";
$connect = $home_base_dir."connect/";
$pages = $home_base_dir."pages/";
$css = $home_base_dir."css/";
$images = $home_base_dir."images/";
$post = $home_base_dir."post/";
//$api_base_dir -> dir/files
$getNagv = $api_base_dir."get-navg.php?p=1&page=";
$pageData = $api_base_dir."page-data.php?p=1&page=";
$postData = $api_base_dir."post-data.php?p=1&postid=";

//$home_base_dir -> ads -> files
$dAds = $ads."d_ads.php";
$mAds = $ads."m_ads.php";

//$home_base_dir -> css -> files
$styleD = $css."style_d.css";
$styleM = $css."style_m.css";

//$home_base_dir -> images -> dir/files   

$dataImage = $images."data/";
$social = $images."social/";
$web= $images."web/";

//$home_base_dir -> images -> social -> files

$fbSocial = $social."fb.png";
$twSocial = $social."tw.png";
$gSocial = $social."g.png";
$ptSocial = $social."pt.png";
$shareSocial = $social."share.jpg";
$feviSocial = $social."fevi.png";
$logoSocial = $social."logo.png";
$header_logo = $social."header_logo_horizontal.jpg";

//social share

$fbShare = "http://www.facebook.com/share.php?u=http://funnymiku.in/posts/";
$twShare = "https://twitter.com/intent/tweet?url=http://funnymiku.in/posts/";
$ptShare = "https://pinterest.com/pin/create/button/?url=http://funnymiku.in/posts/";
$gShare = "https://plus.google.com/share?url=http://funnymiku.in/posts/";

?>