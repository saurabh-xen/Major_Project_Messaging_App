<?php 
session_start();

$message = "";


include 'connect_db.php';
include "global_variable.php";



if (isset($_GET['post_id'])) 
{
	echo $_GET['post_id']; 
	$post_id = $_GET['post_id']; 


$property_type_list = array(
                                                "0" => "Flat",
                                                "1" => "House",
                                                "2" => "Villa",
                                                "3" => "Penthouse Plot",
                                                "4" => "Office Space",
                                                "5" => "Shop",
                                                "6" => "Godown"

                                                );

$sql = "SELECT * FROM post
		INNER JOIN property_details
		ON post.property_details = property_details.property_details
		WHERE post.post_id = '".$post_id."' ";

if (!$conn->query($sql)) {
	echo $conn->error;
}

$result = $conn->query($sql);
$row = $result->fetch_assoc();

$property_name = $row['property_name'];
echo $property_name;
$property_address1 = $row['property_address1'];
$property_price = $row['property_price'];
$property_type = $row['property_type'];
$property_size = $row['property_size'];
$property_bedroom = $row['property_bedroom'];

$property_buildon = $row['property_buildon'];
$property_bathroom = $row['property_bathroom'];
$property_garage = $row['property_garage'];
$property_latitude = $row['property_latitude'];
$property_longitude = $row['property_longitude'];
$property_rooms = $row['property_rooms'];
$property_kitchen = $row['property_kitchen'];
$posted_on = $row['posted_on'];
$property_size = $row['property_size'];
$property_living_room = $row['property_living_room'];
$property_orienten = $row['property_orienten'];
$property_description = $row['property_description'];

$posted_by = $row['posted_by'];
$posted_by_id = $row['posted_by_id'];

echo $property_latitude.'+';
echo $property_longitude;



echo "  posted by id = ".$posted_by_id;
echo "  posted by  = ".$posted_by;
//agent details

//agent
if ($posted_by == '1') {
	echo "Agent";

$sql_2 = "SELECT * FROM registable
			    JOIN agent 
			   ON registable.regis_id = agent.regis_id
			   WHERE registable.regis_id = '".$posted_by_id."' ";
$dashboard_name = "agent_dashboard";

}
//customer
else if ($posted_by == '2') {
	$sql_2 = "SELECT * FROM registable
			   INNER JOIN customer 
			   ON registable.regis_id = customer.regis_id
			   WHERE registable.regis_id = '".$posted_by_id."' ";

	$dashboard_name = "user_dashboard";			   
}
if (!$conn->query($sql_2)) {
	echo $conn->error;
}

$result_2 = $conn->query($sql_2);
$row_2 = $result_2->fetch_assoc();

// only for agent
if ($posted_by == '1') {

$agent_fname = $row_2['agent_fname'];
echo $agent_fname;
}

}
else
{
?>

	<script type="text/javascript">window.location.href = "index.php";</script>
<?php
}

if (isset($_POST['send_message'])) 
{
	echo "sender message to ".$posted_by_id;

$msg_query = "INSERT INTO `chat_message` (`chat_message_id`, `to_user_id`, `from_user_id`, `chat_message`, `timestamp`, `status`) VALUES (NULL, '".$posted_by_id."', '".$_SESSION['regis_id']."', '".$_POST['sender_message']."', current_timestamp(), '1')";
	

	// $msg_query = "INSERT INTO chat_message 
	// 		('chat_message_id','to_user_id','from_user_id','status')
	// 		VALUES (NULL,'".$posted_by_id."','".$_SESSION['regis_id']."',,'1')
	// 				 ";

	if(!$conn->query($msg_query))
	{
			echo $conn->error;
			$message = "Your Message could not be send due to server issue.";
	}
	else	
	{
	$message = "Message send Successfully. Go to <a href= '/user_dashboard/messages.php'> <i syle='color:blue;''> Messages </i> </a>";
	}
}



///fecth posted data of user/agent
if ($posted_by == 1) {  //agent
	
	echo "here";

	$sql = "SELECT * 
    	FROM agent
    	WHERE regis_id = '".$posted_by_id."'
    	
    			";

        
        if(!$conn->query($sql))
        {
          echo $conn->error;
        }

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {   
        
        $agent_fname = $row['agent_fname'];
        $agent_lname = $row['agent_lname'];
        $contact = $row['agent_contact'];
        
        $name = $row['agent_fname']." ".$row['agent_lname'];


        
        

        	echo "name is ".$name;
        




}
}

}
elseif ($posted_by == 2) {
		

			$sql = "SELECT * 
    	FROM customer
    	
    	
    	WHERE regis_id = '".$posted_by_id."'
    	
    			";

        
        if(!$conn->query($sql))
        {
          echo $conn->error;
        }

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {   
        
        $customer_fname = $row['customer_fname'];
        $customer_lname = $row['customer_lname'];

        $name = $row['customer_fname']." ".$row['customer_lname'];

        $contact = $row['customer_contact'];
            



}
}
}


?>
 

<!DOCTYPE html>

<html lang="en-US" class=""><head><meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0">
<link rel="profile" href="//gmpg.org/xfn/11">
<link rel="pingback" href="https://rentex.wpopal.com/xmlrpc.php">
<title>Property Detail</title>

<link rel="preload" as="font" type="font/woff2" href="https://rentex.wpopal.com/wp-content/themes/rentex/assets/fonts/rentex-icon.woff2">
<link rel="dns-prefetch" href="//js.stripe.com">
<link rel="dns-prefetch" href="//s.w.org">
<link rel="alternate" type="application/rss+xml" title="Listing &raquo; Feed" href="https://rentex.wpopal.com/feed/">
<link rel="alternate" type="application/rss+xml" title="Listing &raquo; Comments Feed" href="https://rentex.wpopal.com/comments/feed/">
<script type="text/javascript">
			window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/12.0.0-1\/72x72\/","ext":".png","svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/12.0.0-1\/svg\/","svgExt":".svg","source":{"concatemoji":"https:\/\/rentex.wpopal.com\/wp-includes\/js\/wp-emoji-release.min.js?ver=5.4.2"}};
			/*! This file is auto-generated */
			!function(e,a,t){var r,n,o,i,p=a.createElement("canvas"),s=p.getContext&&p.getContext("2d");function c(e,t){var a=String.fromCharCode;s.clearRect(0,0,p.width,p.height),s.fillText(a.apply(this,e),0,0);var r=p.toDataURL();return s.clearRect(0,0,p.width,p.height),s.fillText(a.apply(this,t),0,0),r===p.toDataURL()}function l(e){if(!s||!s.fillText)return!1;switch(s.textBaseline="top",s.font="600 32px Arial",e){case"flag":return!c([127987,65039,8205,9895,65039],[127987,65039,8203,9895,65039])&&(!c([55356,56826,55356,56819],[55356,56826,8203,55356,56819])&&!c([55356,57332,56128,56423,56128,56418,56128,56421,56128,56430,56128,56423,56128,56447],[55356,57332,8203,56128,56423,8203,56128,56418,8203,56128,56421,8203,56128,56430,8203,56128,56423,8203,56128,56447]));case"emoji":return!c([55357,56424,55356,57342,8205,55358,56605,8205,55357,56424,55356,57340],[55357,56424,55356,57342,8203,55358,56605,8203,55357,56424,55356,57340])}return!1}function d(e){var t=a.createElement("script");t.src=e,t.defer=t.type="text/javascript",a.getElementsByTagName("head")[0].appendChild(t)}for(i=Array("flag","emoji"),t.supports={everything:!0,everythingExceptFlag:!0},o=0;o<i.length;o++)t.supports[i[o]]=l(i[o]),t.supports.everything=t.supports.everything&&t.supports[i[o]],"flag"!==i[o]&&(t.supports.everythingExceptFlag=t.supports.everythingExceptFlag&&t.supports[i[o]]);t.supports.everythingExceptFlag=t.supports.everythingExceptFlag&&!t.supports.flag,t.DOMReady=!1,t.readyCallback=function(){t.DOMReady=!0},t.supports.everything||(n=function(){t.readyCallback()},a.addEventListener?(a.addEventListener("DOMContentLoaded",n,!1),e.addEventListener("load",n,!1)):(e.attachEvent("onload",n),a.attachEvent("onreadystatechange",function(){"complete"===a.readyState&&t.readyCallback()})),(r=t.source||{}).concatemoji?d(r.concatemoji):r.wpemoji&&r.twemoji&&(d(r.twemoji),d(r.wpemoji)))}(window,document,window._wpemojiSettings);
		</script><style type="text/css">
img.wp-smiley,
img.emoji {
	display: inline !important;
	border: none !important;
	box-shadow: none !important;
	height: 1em !important;
	width: 1em !important;
	margin: 0 .07em !important;
	vertical-align: -0.1em !important;
	background: none !important;
	padding: 0 !important;
}


</style><link rel="stylesheet" id="wp-block-library-css" href="css/block-library-style.min.css" type="text/css" media="all"><link rel="stylesheet" id="wp-block-library-theme-css" href="css/block-library-theme.min.css" type="text/css" media="all"><link rel="stylesheet" id="rentex-gutenberg-blocks-css" href="css/base-gutenberg-blocks.css" type="text/css" media="all"><link rel="stylesheet" id="contact-form-7-css" href="css/css-styles.css" type="text/css" media="all"><link rel="stylesheet" id="image-map-pro-dist-css-css" href="css/css-image-map-pro.min.css" type="text/css" media=""><link rel="stylesheet" id="-css" href="css/opal-demo-style.css" type="text/css" media="all"><link rel="stylesheet" id="rentex-style-css" href="css/rentex-style.css" type="text/css" media="all"><link rel="stylesheet" id="elementor-frontend-css" href="css/css-frontend.min.css" type="text/css" media="all"><link rel="stylesheet" id="elementor-post-326-css" href="css/css-post-326.css" type="text/css" media="all"><link rel="stylesheet" id="stm-grid-css-css" href="css/css-stm-grid.css" type="text/css" media="all"><link rel="stylesheet" id="select2-css" href="css/css-select2.min.css" type="text/css" media="all"><link rel="stylesheet" id="rentex-ulising-style-css" href="css/ulisting-ulisting.css" type="text/css" media="all"><link rel="stylesheet" id="rentex-ulising-detail-style-css" href="css/ulisting-ulisting-detail.css" type="text/css" media="all"><link rel="stylesheet" id="photoswipe-css" href="css/libs-photoswipe.css" type="text/css" media="all"><link rel="stylesheet" id="photoswipe-skin-css" href="css/default-skin-default-skin.css" type="text/css" media="all"><link rel="stylesheet" id="rentex-elementor-css" href="css/base-elementor.css" type="text/css" media="all"><link rel="stylesheet" id="rentex-child-style-css" href="css/demo-child-style.css" type="text/css" media="all"><link rel="stylesheet" id="rentex-inline-css-css" href="css/css-rentex-inline.css" type="text/css" media="all"><link rel="stylesheet" id="elementor-icons-shared-0-css" href="css/css-fontawesome.min.css" type="text/css" media="all"><link rel="stylesheet" id="elementor-icons-fa-solid-css" href="css/css-solid.min.css" type="text/css" media="all"><script type="text/javascript" src="js/jquery-jquery.js"></script><script type="text/javascript" src="js/jquery-jquery-migrate.min.js"></script><script type="text/javascript">
 var ulisting_compare_url ="https://rentex.wpopal.com";
</script><script type="text/javascript" src="js/frontend-ulisting-listing-compare.js"></script><script type="text/javascript" src="js/vue-vue.js"></script><script type="text/javascript" src="https://js.stripe.com/v3/?ver=5.4.2"></script><script type="text/javascript" src="js/js-jarallax.js"></script><script type="text/javascript" src="js/js-select2.full.js"></script><script type="text/javascript" src="js/js-js.cookie.js"></script><script type="text/javascript" src="js/dist-ulisting-main.js"></script><script type="text/javascript" src="js/vue-tinymce-2-tinymce.min.js"></script><script type="text/javascript" src="js/vue-tinymce-2-vue-easy-tinymce.min.js"></script><script type="text/javascript" src="js/vue-vue2-datepicker.js"></script><script type="text/javascript" src="js/vue-vue-resource.js"></script><script type="text/javascript">
Vue.http.options.root = 'https://rentex.wpopal.com/1/api';
</script><script type="text/javascript" src="js/vue-vuejs-paginate.js"></script><script type="text/javascript" src="js/frontend-stm-google-map.js"></script><script type="text/javascript" src="js/vendor-photoswipe.min.js"></script><script type="text/javascript" src="js/vendor-photoswipe-ui-default.min.js"></script><link rel="https://api.w.org/" href="https://rentex.wpopal.com/wp-json/"><link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://rentex.wpopal.com/xmlrpc.php?rsd"><link rel="wlwmanifest" type="application/wlwmanifest+xml" href="https://rentex.wpopal.com/wp-includes/wlwmanifest.xml"><link rel="prev" title="Langs Beach House" href="https://rentex.wpopal.com/listing/langs-beach-house/"><link rel="next" title="Neue Dimensionen im Schr&auml;gdach" href="https://rentex.wpopal.com/listing/neue-dimensionen-im-schragdach-2/"><meta name="generator" content="WordPress 5.4.2"><link rel="shortlink" href="https://rentex.wpopal.com/?p=39"><link rel="alternate" type="application/json+oembed" href="https://rentex.wpopal.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Frentex.wpopal.com%2Flisting%2Fneue-dimensionen-im-schragdach%2F"><link rel="alternate" type="text/xml+oembed" href="https://rentex.wpopal.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Frentex.wpopal.com%2Flisting%2Fneue-dimensionen-im-schragdach%2F&amp;format=xml"><meta name="framework" content="Redux 4.1.5"><style type="text/css">

</style><link rel="icon" href="favicons/05-cropped-favicon-80x80.png" sizes="32x32"><link rel="icon" href="favicons/05-cropped-favicon-300x300.png" sizes="192x192"><link rel="apple-touch-icon" href="favicons/05-cropped-favicon-300x300.png"><meta name="msapplication-TileImage" content="https://rentex.wpopal.com/wp-content/uploads/2020/05/cropped-favicon-300x300.png"></head>


<body class="listing-template-default single single-listing postid-39 wp-embed-responsive gecko has-post-thumbnail rentex-layout-wide rentex-footer-builder elementor-default">

<?php
if ($message !="") {
  ?>
    <div style="font-size:18px;padding: 2px; background-color:orange; widows: 100%;text-align: center;"><div><h5><?php echo $message; ?></h5></div></div>
  <?php
}
?>

<?php 
	include "header.php";
?>	
<div id="page" class="hfeed site">


<!-- 
<header id="masthead" class="site-header header-1" role="banner" style=""><div class="header-topbar desktop-hide-down">
	<div class="container">
<div class="row align-items-center justify-content-between">
<div class="column">
<div class="rentex-contact-info"><ul><li><i class="rentex-icon-map-marker-alt"></i><span>655 Lawrence Ave. Zanesville</span></li>
<li><i class="rentex-icon-paper-plane"></i><span>+84 123 456 78</span></li>
<li><i class="rentex-icon-phone-square"></i><span><a href="email-protection.html" class="__cf_email__" data-cfemail="9af9f5f4eefbf9eedaffe2fbf7eaf6ffb4f9f5f7">[email&nbsp;protected]</a></span></li>
</ul></div> </div>
<div class="column">
<nav class="topbar-navigation" role="navigation" aria-label="Topbar Navigation"><div class="topbar-navigation"><ul id="menu-topbar" class="menu"><li id="menu-item-495" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-495"><a href="social-housing.html">Find a Home</a></li>
<li id="menu-item-496" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-496"><a href="addlisting.html">Sell a Home</a></li>
<li id="menu-item-497" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-497"><a href="pricing-plan.html">Become an Agent</a></li>
</ul></div> </nav></div>
</div>
</div>
</div>
<div class="header-sticky">
<div class="header-container container">
<div class="header-left mobile-group-button">
<div class="site-branding">
<a href="rentex.wpopal.html" class="custom-logo-link" rel="home"><img src="images/05-logo.svg" class="logo-light" alt="Logo"></a> </div>
</div>
<div class="header-center desktop-hide-down">
<nav class="main-navigation" role="navigation" aria-label="Primary Navigation"><div class="primary-navigation"><ul id="menu-main-menu" class="menu"><li id="menu-item-503" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-has-children menu-item-503"><a href="rentex.wpopal.html">Home</a>
<ul class="sub-menu"><li id="menu-item-1987" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-1987"><a href="rentex.wpopal.html">Home 1 &ndash; Default Search</a></li>
<li id="menu-item-505" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-505"><a href="home-2.html">Home 2 &ndash; Top Search</a></li>
<li id="menu-item-504" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-504"><a href="home-3.html">Home 3 &ndash; Bottom Search</a></li>
<li id="menu-item-879" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-879"><a href="home-4.html">Home 4 &ndash; Agents</a></li>
<li id="menu-item-886" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-886"><a href="home-5.html">Home 5 &ndash; Agency</a></li>
<li id="menu-item-885" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-885"><a href="home-6.html">Home 6 &ndash; Tab Search</a></li>
<li id="menu-item-880" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-880"><a href="home-7.html">Home 7 &ndash; Video</a></li>
<li id="menu-item-878" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-878"><a href="home-8.html">Home 8 &ndash; Map</a></li>
<li id="menu-item-877" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-877"><a href="home-9.html">Home 9 &ndash; Contact Form</a></li>
<li id="menu-item-1548" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1548"><a href="home-10.html">Home 10 &ndash; Property Slider</a></li>
</ul></li>
<li id="menu-item-2584" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2584"><a href="#">Listing</a>
<ul class="sub-menu"><li id="menu-item-1746" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1746"><a href="office.html">Grid View</a>
<ul class="sub-menu"><li id="menu-item-1748" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1748"><a href="?layout=ulisting_type_page_layout_3.html">Grid View &ndash; Style 01</a></li>
<li id="menu-item-1990" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1990"><a href="buildings.html">Grid View &ndash; Style 02</a></li>
<li id="menu-item-1620" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1620"><a href="villa.html">Grid View &ndash; Style 03</a></li>
<li id="menu-item-1488" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1488"><a href="?layout=ulisting_type_page_layout_0.html">Grid View &ndash; Left Filter</a></li>
<li id="menu-item-1489" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1489"><a href="?layout=ulisting_type_page_layout_1.html">Grid View &ndash; Right Filter</a></li>
</ul></li>
<li id="menu-item-1629" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1629"><a href="apartment.html">List View</a>
<ul class="sub-menu"><li id="menu-item-1627" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1627"><a href="?layout=ulisting_type_page_layout_8.html">List view &ndash; Top Filter</a></li>
<li id="menu-item-1532" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1532"><a href="?layout=ulisting_type_page_layout_6.html">List View &ndash; Left Filter</a></li>
<li id="menu-item-1450" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1450"><a href="?layout=ulisting_type_page_layout_7.html">List View &ndash; Right Filter</a></li>
</ul></li>
<li id="menu-item-1484" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1484"><a href="?layout=ulisting_type_page_layout_2.html">Map View</a>
<ul class="sub-menu"><li id="menu-item-1622" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1622"><a href="social-housing.html">Map View &ndash; Half Map 01</a></li>
<li id="menu-item-1456" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1456"><a href="?layout=ulisting_type_page_layout_9.html">Map View &ndash; Half Map 02</a></li>
<li id="menu-item-1623" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1623"><a href="?layout=ulisting_type_page_layout_5.html">Map View &ndash; Half Map 03</a></li>
<li id="menu-item-1451" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1451"><a href="?layout=ulisting_type_page_layout_2.html">Map View &ndash; Full Map</a></li>
</ul></li>
</ul></li>
<li id="menu-item-506" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children menu-item-506"><a href="#">Property</a>
<ul class="sub-menu"><li id="menu-item-507" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-507"><a href="neue-dimensionen-im-schragdach.html">Single Property v1</a></li>
<li id="menu-item-508" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-508"><a href="?layout=2.html">Single Property v2</a></li>
<li id="menu-item-509" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-509"><a href="?layout=3.html">Single Property v3</a></li>
<li id="menu-item-510" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item menu-item-510"><a href="?layout=4.html" aria-current="page">Single Property v4</a></li>
<li id="menu-item-511" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-511"><a href="?layout=5.html">Single Property v5</a></li>
<li id="menu-item-512" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-512"><a href="?layout=6.html">Single Property v6</a></li>
</ul></li>
<li id="menu-item-2585" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2585"><a href="#">Agents</a>
<ul class="sub-menu"><li id="menu-item-1847" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1847"><a href="agents-grid.html">Agents Page</a>
<ul class="sub-menu"><li id="menu-item-1849" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1849"><a href="agents-grid.html">Agents &ndash; Grid</a></li>
<li id="menu-item-1848" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1848"><a href="agents-list.html">Agents &ndash; List</a></li>
<li id="menu-item-1853" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1853"><a href="leah-amidala.html">Agent Profile</a></li>
</ul></li>
<li id="menu-item-1846" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1846"><a href="agency-list.html">Agency Page</a>
<ul class="sub-menu"><li id="menu-item-1850" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1850"><a href="agency-list.html">Agency &ndash; List</a></li>
<li id="menu-item-1852" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1852"><a href="company-realty.html">Agency Profile</a></li>
</ul></li>
</ul></li>
<li id="menu-item-699" class="menu-item menu-item-type-post_type menu-item-object-page current_page_parent menu-item-has-children menu-item-699"><a href="blog.html">Blog</a>
<ul class="sub-menu"><li id="menu-item-1480" class="menu-item menu-item-type-post_type menu-item-object-page current_page_parent menu-item-1480"><a href="blog.html">Blog standard</a></li>
<li id="menu-item-1471" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1471"><a href="?blog_type=style-1&amp;sidebar-blog=0.html">Blog grid</a></li>
<li id="menu-item-1470" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1470"><a href="?blog_type=style-2.html">Blog modern</a></li>
<li id="menu-item-1854" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1854"><a href="the-gifts-we-want-to-give-in-2018.html">Single Post</a></li>
</ul></li>
<li id="menu-item-612" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-612"><a href="#">Page</a>
<ul class="sub-menu"><li id="menu-item-2159" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2159"><a href="#">IDX Pages</a>
<ul class="sub-menu"><li id="menu-item-2166" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2166"><a href="ihomefinder-map-search.html">iHomeFinder &ndash; Map Search</a></li>
<li id="menu-item-2164" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2164"><a href="ihomefinder-listing-list.html">iHomeFinder &ndash; Listing List</a></li>
<li id="menu-item-2165" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2165"><a href="ihomefinder-listing-grid.html">iHomeFinder &ndash; Listing Grid</a></li>
<li id="menu-item-2161" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2161"><a href="ihomefinder-slider.html">iHomeFinder &ndash; Slider</a></li>
<li id="menu-item-2162" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2162"><a href="ihomefinder-sell-my-house-form.html">iHomeFinder &ndash; Sell my house form</a></li>
<li id="menu-item-2163" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2163"><a href="ihomefinder-search-form.html">iHomeFinder &ndash; Search Form</a></li>
<li id="menu-item-2160" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2160"><a href="ihomefinder-valuation.html">iHomeFinder &ndash; Valuation</a></li>
</ul></li>
<li id="menu-item-613" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-613"><a href="about-us.html">About us</a></li>
<li id="menu-item-75" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-75"><a href="pricing-plan.html">Pricing Plan</a></li>
<li id="menu-item-698" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-698"><a href="404.html">404 Page</a></li>
<li id="menu-item-614" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-614"><a href="contact-us.html">Contact Us</a></li>
<li id="menu-item-2105" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2105"><a href="faqs.html">FAQ&rsquo;s</a></li>
<li id="menu-item-615" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-615"><a href="icons.html">Icons</a></li>
</ul></li>
</ul></div> </nav></div>
<div class="header-right">
<div class="header-group-action">
<div class="site-header-account">
<a class="group-button" href="account.html"><i class="rentex-icon rentex-icon-user"></i></a>
<div class="account-dropdown">
</div>
</div>
<div class="ulisting-wishlist-link">
<a class="ulisting-wishlist-page-link group-button" href="wishlist.html">
<i class="rentex-icon rentex-icon-heart"></i>
<span class="ulisting-wishlist-total-count-all count ulisting-c-total-count-all">0</span>
</a>
<ul class="ulisting-account-panel-dropdown-menu"><li>
<a class="nav-link " href="wishlist-list.html">
Listing <span class="badge badge-secondary ulisting-wishlist-total-count">0</span>
</a>
</li>
<li>
<a class="nav-link " href="saved-searches-list.html">
Search <span class="badge badge-secondary ulisting-saved-searches-total-count">0</span>
</a>
</li>
</ul></div>
<div class="ulisting-compare-link">
<a class="ulisting-compare-page-link group-button" href="compare.html">
<i class="rentex-icon rentex-icon-random"></i>
<span class="ulisting_listing_compare_count_total compare-total count">0</span>
</a>
</div>
<a class="button button-add-listing" href="addlisting.html">
<i class="rentex-icon-home-plus"></i>
<span>Add Listing</span>
</a>
<a href="#" class="menu-mobile-nav-button">
<span class="toggle-text screen-reader-text">Menu</span>
<i class="rentex-icon-bars"></i>
</a>
</div>
</div>
</div>
</div>
</header> -->

<div id="content" class="site-content" tabindex="-1">
<div class="col-full">
<div class=" ulisting_element_820_1553249009531 ulisting_element_820_1553249009531">
<div class="container ">
<div class=" stm-row  ulisting_element_350_1553249009531">
<div class=" stm-col  stm-col-xl-0 stm-col-lg-0 stm-col-md-0 stm-col-sm-0 stm-col-0 ulisting_element_490_1553249009531">
<div class="listing-single-info style_1">
<div class=" ulisting_element_860_1590569932340">
<div class="inner">
<div class="listing-info-btn listing-type-list">
<span>Buildings</span>
</div>
<div class="listing-category-list"><span>Buy</span><span>Rent</span></div>
<div class="listing-info-item listing-published">
<i class="rentex-icon-clock"></i>
<span>
5 months ago </span>
</div>
<span class="listing-dot"></span>
<div class="listing-info-item listing-views">
<i class="rentex-icon-eye"></i>
<span>
5218 </span>
</div>
<ul class="listing-meta"><li>
<a class="listing-email" href="/cdn-cgi/l/email-protection#fdc28e889f97989e89c09589898d8ec7d2d28f9893899885d38a8d928d9c91d39e9290d291948e8994939ad293988898d099949098938e9492939893d09490d08e9e958f9c9a999c9e95d2">
<i class="rentex-icon-envelope"></i>
<span>&nbsp;&nbsp;Email</span>
</a>
</li>
<li>
<a class="listing-print" href="javascript:window.html">
<i class="rentex-icon-print"></i>
<span>&nbsp;&nbsp;Print</span>
</a>
</li>
<li class="listing-save-wishlist">
<span data-wishlist_id="39" onclick="ulisting_wishlist(39)" class="ulisting-listing-wishlist stm-cursor-pointer ulisting_wishlist_39  "> <i class="fa fa-heart"></i></span> <span class="ulisting_wishlist_load_39 ulisting-load-wishlist hidden"><i class="fa fa-heart ld ld-heartbeat"></i></span> <span class="screen-reader-text">Wishlist</span> <a class="listing-save" href="#">
<i class="rentex-icon-heart"></i>
<span>&nbsp;&nbsp;Save</span>
</a>
</li>
<li>
<div class="listing-share-socials js-listing-share-socials">
<a class="listing-share-link js-listing-share-btn" href="#">
<i class="rentex-icon-share-alt"></i>
<span>&nbsp;&nbsp;Share</span>
</a>
<div class="listing-share-box">
<div class="listing-share-wrapper">
<a href="#" class="js-share-link facebook" data-share="https://www.facebook.com/sharer/sharer.php?u=https://rentex.wpopal.com/listing/neue-dimensionen-im-schragdach/" data-social="facebook">
<span class="rentex-icon-facebook"></span>
</a>
<a href="#" class="js-share-link twitter" data-share="https://twitter.com/home?status=https://rentex.wpopal.com/listing/neue-dimensionen-im-schragdach/" data-social="twitter">
<span class="rentex-icon-twitter"></span>
</a>
<a href="#" class="js-share-link google-plus" data-share="https://plus.google.com/share?url=https://rentex.wpopal.com/listing/neue-dimensionen-im-schragdach/" data-social="google-plus">
<span class="rentex-icon-google-plus"></span>
</a>
<a href="#" class="js-share-link linkedin" data-share="https://www.linkedin.com/shareArticle?mini=true&amp;url=https://rentex.wpopal.com/listing/neue-dimensionen-im-schragdach/&amp;title=&amp;summary=&amp;source=" data-social="linkedin">
<span class="rentex-icon-linkedin"></span>
</a>
<a href="#" class="js-share-link pinterest-p" data-share="https://pinterest.com/pin/create/button/?url=https://rentex.wpopal.com/listing/neue-dimensionen-im-schragdach/&amp;media=https://rentex.wpopal.com/wp-content/uploads/2020/05/property-1-1.-960x640.jpg&amp;description=" data-social="pinterest-p">
<span class="rentex-icon-pinterest-p"></span>
</a>
<a href="/cdn-cgi/l/email-protection#152a6660777f707661287d616165662f3a3a67707b61706d3b62657a6574793b767a783a797c66617c7b723a7b70607038717c78707b667c7a7b707b387c783866767d6774727174767d3a" class="email"><span class="rentex-icon-envelope"></span></a>
</div>
</div>
</div>
</li>
</ul></div>
</div>
</div>
<div class="rentex-listing-divider ulisting_element_900_1591002484620"></div>
<div class=" stm-row ulisting_element_610_1590636029251">
<div class=" stm-col  stm-col-xl-0 stm-col-lg-0 stm-col-md-8 stm-col-sm-0 stm-col-12 ulisting_element_530_1590636029251">
<div class="listing-single-title style_1">
<div class=" ulisting_element_560_1590636059647">
<div class="wrapper">
<h1 class="title"><?php echo $property_name; ?></h1> </div>
</div>
</div>
<div class="rentex_listing_address">
<div class=" ulisting_element_240_1592560873547">
<div class="wrapper">
<div class="rentex-address"></div> <?php echo $property_address1; ?></div>
</div>
</div>
</div>
<div class=" stm-col  stm-col-xl-0 stm-col-lg-4 stm-col-md-4 stm-col-sm-0 stm-col-12 ulisting_element_750_1590636089219">
<div class=" ulisting_element_90_1590739704528">
<div class="ulisting-listing-price"> <span class="ulisting-listing-price-new">&#8377 <?php echo $property_price; ?> </span></div></div>
</div>
</div>


<div class=" ulisting_element_160_1553249533131">

<div class="rentex-property-gallery-contaniner rentex-property-gallery-4">

<div class="ulisting_tab_gallery_content">

<div class="tab-content active gallery">

<div class="gallery-wrapper">

<div class="ulisting_single_gallery" id="ulisting-single-gallery-thumbnail-preview">

<a href="#" class="gallery-view-full">
<i class="rentex-icon-expand-alt"></i>
</a>


<div class="inner rentex-carousel" data-popup-json='[{"src":"https:\/\/rentex.wpopal.com\/wp-content\/uploads\/2020\/05\/property-4-6.-960x640.jpg","w":960,"h":640},{"src":"https:\/\/rentex.wpopal.com\/wp-content\/uploads\/2020\/05\/property-1-2.-960x640.jpg","w":960,"h":640},{"src":"https:\/\/rentex.wpopal.com\/wp-content\/uploads\/2020\/05\/property-2-6.-960x640.jpg","w":960,"h":640},{"src":"https:\/\/rentex.wpopal.com\/wp-content\/uploads\/2020\/05\/property-4-3.-960x640.jpg","w":960,"h":640},{"src":"https:\/\/rentex.wpopal.com\/wp-content\/uploads\/2020\/05\/property-2-7.-960x640.jpg","w":960,"h":640},{"src":"https:\/\/rentex.wpopal.com\/wp-content\/uploads\/2020\/05\/property-1-10.-960x640.jpg","w":960,"h":640},{"src":"https:\/\/rentex.wpopal.com\/wp-content\/uploads\/2020\/05\/property-1-7.-960x640.jpg","w":960,"h":640},{"src":"https:\/\/rentex.wpopal.com\/wp-content\/uploads\/2020\/05\/property-1-8.-960x640.jpg","w":960,"h":640},{"src":"https:\/\/rentex.wpopal.com\/wp-content\/uploads\/2020\/05\/property-1-9.-960x640.jpg","w":960,"h":640}]'>

<?php

$sql_img = "SELECT image_name FROM property_images WHERE post_id ='".$_GET['post_id']."' ";

if (!$conn->query($sql_img)) {

	echo $conn->error;
}
$result_img = $conn->query($sql_img);

if ($result_img->num_rows > 0) {
	# code...

while($row = $result_img->fetch_assoc())
{

	$property_img = $row['image_name'];
	$property_img = "post_property/property_images/".$property_img;
	// echo $property_img;

?>

<img width="960" height="450" src="<?php echo $property_img ?>" class="attachment-rentex-ulisting-detail-gallery size-rentex-ulisting-detail-gallery" alt="">
<?php
}
}
else
{
	echo "Image Unavaible";
}

?>
<!-- <img width="960" height="450" src="images/05-property-1-2.-960x450.jpg" class="attachment-rentex-ulisting-detail-gallery size-rentex-ulisting-detail-gallery" alt=""><img width="960" height="450" src="images/05-property-2-6.-960x450.jpg" class="attachment-rentex-ulisting-detail-gallery size-rentex-ulisting-detail-gallery" alt=""><img width="960" height="450" src="images/05-property-4-3.-960x450.jpg" class="attachment-rentex-ulisting-detail-gallery size-rentex-ulisting-detail-gallery" alt=""><img width="960" height="450" src="images/05-property-2-7.-960x450.jpg" class="attachment-rentex-ulisting-detail-gallery size-rentex-ulisting-detail-gallery" alt=""><img width="960" height="450" src="images/05-property-1-10.-960x450.jpg" class="attachment-rentex-ulisting-detail-gallery size-rentex-ulisting-detail-gallery" alt=""><img width="960" height="450" src="images/05-property-1-7.-960x450.jpg" class="attachment-rentex-ulisting-detail-gallery size-rentex-ulisting-detail-gallery" alt=""><img width="960" height="450" src="images/05-property-1-8.-960x450.jpg" class="attachment-rentex-ulisting-detail-gallery size-rentex-ulisting-detail-gallery" alt=""><img width="960" height="450" src="images/05-property-1-9.-960x450.jpg" class="attachment-rentex-ulisting-detail-gallery size-rentex-ulisting-detail-gallery" alt="">
 -->

</div>
</div>

<div class="ulisting_single_thumbnails" id="ulisting-single-gallery-thumbnail">
<?php

$sql_img = "SELECT image_name FROM property_images WHERE post_id ='".$_GET['post_id']."' ";

if (!$conn->query($sql_img)) {

	echo $conn->error;
}
$result_img = $conn->query($sql_img);
$i = 0;
if ($result_img->num_rows > 0) {
	# code...

while($row = $result_img->fetch_assoc())
{

	$property_img = $row['image_name'];
	$property_img = "post_property/property_images/".$property_img;
	// echo $property_img;

?>

<div data-slick-index="<?php echo $i ?>" data-thumbnail="<?php echo $property_img ?>" class="thumbnail-inner active">
<img src="<?php echo $property_img ?>" alt="Gallery Thumbnail <?php echo $i ?>"></div>
<?php
$i++;
}
}
else
{
	echo "thumbnail-inner Unavaible";
}
?>

<!-- 
<div data-slick-index="1" data-thumbnail="https://rentex.wpopal.com/wp-content/uploads/2020/05/property-1-2.-615x450.jpg" class="thumbnail-inner">
<img src="images/05-property-1-2.-615x450.jpg" alt="Gallery Thumbnail 1"></div>

<div data-slick-index="2" data-thumbnail="https://rentex.wpopal.com/wp-content/uploads/2020/05/property-2-6.-615x450.jpg" class="thumbnail-inner last">
<img src="images/05-property-2-6.-615x450.jpg" alt="Gallery Thumbnail 2"><span class="count">+6</span>
</div>

<div data-slick-index="3" data-thumbnail="https://rentex.wpopal.com/wp-content/uploads/2020/05/property-4-3.-615x450.jpg" class="thumbnail-inner">
<img src="images/05-property-4-3.-615x450.jpg" alt="Gallery Thumbnail 3">
</div>

<div data-slick-index="4" data-thumbnail="https://rentex.wpopal.com/wp-content/uploads/2020/05/property-2-7.-615x450.jpg" class="thumbnail-inner">
<img src="images/05-property-2-7.-615x450.jpg" alt="Gallery Thumbnail 4"></div>
<div data-slick-index="5" data-thumbnail="https://rentex.wpopal.com/wp-content/uploads/2020/05/property-1-10.-615x450.jpg" class="thumbnail-inner">
<img src="images/05-property-1-10.-615x450.jpg" alt="Gallery Thumbnail 5"></div>
<div data-slick-index="6" data-thumbnail="https://rentex.wpopal.com/wp-content/uploads/2020/05/property-1-7.-615x450.jpg" class="thumbnail-inner">
<img src="images/05-property-1-7.-615x450.jpg" alt="Gallery Thumbnail 6"></div>
<div data-slick-index="7" data-thumbnail="https://rentex.wpopal.com/wp-content/uploads/2020/05/property-1-8.-615x450.jpg" class="thumbnail-inner">
<img src="images/05-property-1-8.-615x450.jpg" alt="Gallery Thumbnail 7"></div>
<div data-slick-index="8" data-thumbnail="https://rentex.wpopal.com/wp-content/uploads/2020/05/property-1-9.-615x450.jpg" class="thumbnail-inner">
<img src="images/05-property-1-9.-615x450.jpg" alt="Gallery Thumbnail 8"></div> -->

</div>
</div>
</div>

<div class="tab-content map">
<div class="gallery-data-location" style="height: 300px;" data-color='[{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#dde6e8"},{"visibility":"on"}]}]' data-lat="37.7749295" data-lng="-122.41941550000001" data-icon="https://rentex.wpopal.com/wp-content/themes/rentex/assets/images/ulisting/mapmarker.svg"></div>

</div>
</div>
</div>
</div>

<div class="rentex-box-divider stm-row ulisting_element_410_1590993043879">
<div class=" stm-col  stm-col-xl-2 stm-col-lg-2 stm-col-md-4 stm-col-sm-4 stm-col-6 ulisting_element_390_1590993043879">
<div class=" ulisting_element_570_1590993517704">
<span style="font-size: 14px;">Property Type</span></div>
<div class=" ulisting_element_650_1590993097593">
<div class="attribute_input_block_style attribute_style_3 attribute_type">
<div class="attribute-icon"></div>
<div class="attribute-parts-wrap">
<span class="attribute-value"><?php echo $property_type_arr[$property_type]; ?></span>
<span class="attribute-affix"></span>
</div>
</div>
</div>
</div>
<div class=" stm-col  stm-col-xl-2 stm-col-lg-2 stm-col-md-4 stm-col-sm-4 stm-col-6 ulisting_element_920_1590993049434">
<div class=" ulisting_element_170_1592469550802">
<div class="ulisting-attribute-template attribute_style_3 attribute_bedrooms"><div class="attribute-icon"><i class="rentex-icon-bed"></i></div>
<div class="attribute-parts-wrap">
<span class="attribute-value"><?php echo $property_bedroom; ?></span>
<span class="attribute-affix">Beds</span>
</div> </div> </div>
</div>
<div class=" stm-col  stm-col-xl-2 stm-col-lg-2 stm-col-md-4 stm-col-sm-4 stm-col-6 ulisting_element_10_1590993049434">
<div class=" ulisting_element_80_1592469553227">
<div class="ulisting-attribute-template attribute_style_3 attribute_bathrooms"><div class="attribute-icon"><i class="rentex-icon-bath"></i></div>
<div class="attribute-parts-wrap">
<span class="attribute-value"><?php echo $property_bathroom; ?></span>
<span class="attribute-affix">Baths</span>
</div> </div> </div>
</div>
<div class=" stm-col  stm-col-xl-2 stm-col-lg-2 stm-col-md-4 stm-col-sm-4 stm-col-6 ulisting_element_560_1590993049434">
<div class=" ulisting_element_770_1592469555113">
<div class="ulisting-attribute-template attribute_style_3 attribute_garages"><div class="attribute-icon"><i class="rentex-icon-garage"></i></div>
<div class="attribute-parts-wrap">
<span class="attribute-value"><?php echo $property_garage; ?></span>
<span class="attribute-affix">Garage</span>
</div> </div> </div>
</div>
<div class=" stm-col  stm-col-xl-2 stm-col-lg-2 stm-col-md-4 stm-col-sm-4 stm-col-6 ulisting_element_50_1590993049434">
<div class=" ulisting_element_390_1592469557196">
<div class="attribute_input_block_style attribute_style_3 attribute_area">
<div class="attribute-icon"><i class="rentex-icon-sqft"></i></div>
<div class="attribute-parts-wrap">
<span class="attribute-value"><?php echo $property_size; ?></span>
<span class="attribute-affix">Sqft</span>
</div>
</div>
</div>
</div>
<div class=" stm-col  stm-col-xl-2 stm-col-lg-2 stm-col-md-4 stm-col-sm-4 stm-col-6 ulisting_element_290_1590993049434">
<div class=" ulisting_element_330_1590993085243">
<div class="attribute_input_block_style attribute_style_3 attribute_year_built">
<div class="attribute-icon"><i class="rentex-icon-year"></i></div>
<div class="attribute-parts-wrap">
<span class="attribute-value"><?php echo $property_buildon; ?></span>
<span class="attribute-affix">Old</span>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class=" ulisting_element_160_1553249663085 ulisting_element_160_1553249663085">
<div class="container ">
<div class=" stm-row  ulisting_element_30_1553249663085">
<div class=" stm-col  stm-col-xl-8 stm-col-lg-8 stm-col-md-0 stm-col-sm-0 stm-col-12 ulisting_element_690_1553249663085">
<div class="rentex_listing_heading_title">
<div class=" ulisting_element_130_1590985546425">
<div class="wrapper">
<h4 class="ulisting-heading">
Description </h4>
</div>
</div>
</div>
<div class=" ulisting_element_660_1590568093440">
<p><?php  echo $property_description; ?></p> </div>
<div class=" stm-row ulisting_element_250_1590740301068">
<div class=" stm-col  stm-col-xl-0 stm-col-lg-0 stm-col-md-0 stm-col-sm-0 stm-col-0 ulisting_element_230_1590740301068">
<div class=" ulisting_element_310_1590740341205">
<h4 style="font-size:18px;margin:0;padding-bottom:10px;">Property Detail</h4></div>
<div class="ulisting-attribute-box ulisting_element_200_1590740402940">
<div style="width: 33.333333333333%">
<div class=" ulisting_element_330_1592469590814">
<div class="ulisting-attribute-template attribute_style_1 attribute_bedrooms"><div class="attribute-parts-wrap">
<span class="attribute-name">Bedrooms:</span>
<span class="attribute-value"><?php echo $property_bedroom; ?></span>
</div></div> </div>
</div>
<div style="width: 33.333333333333%">
<div class=" ulisting_element_830_1590740503983">
<div class="attribute_input_block_style attribute_style_1 attribute_orienten">
<div class="attribute-parts-wrap">
<span class="attribute-name">Orienten:</span>
<span class="attribute-value"><?php echo $property_orienten; ?></span>
</div>
</div>
</div>
</div>
<div style="width: 33.333333333333%">
<div class=" ulisting_element_820_1590741594513">
<div class="attribute_input_block_style attribute_style_1 attribute_type">
<div class="attribute-parts-wrap">
<span class="attribute-name">Type:</span>
<span class="attribute-value"><?php echo $property_type_arr[$property_type]; ?></span>
</div>
</div>
</div>
</div>
<div style="width: 33.333333333333%">
<div class=" ulisting_element_820_1592469600935">
<div class="attribute_input_block_style attribute_style_1 attribute_area">
<div class="attribute-parts-wrap">
<span class="attribute-name">Area:</span>
<span class="attribute-value"><?php echo $property_size ?> sqft</span>
</div>
</div>
</div>
</div>
<div style="width: 33.333333333333%">
<div class=" ulisting_element_980_1592469594731">
<div class="ulisting-attribute-template attribute_style_1 attribute_bathrooms"><div class="attribute-parts-wrap">
<span class="attribute-name">Bathrooms:</span>
<span class="attribute-value"><?php echo $property_bathroom ?></span>
</div></div> </div>
</div>
<div style="width: 33.333333333333%">
<div class=" ulisting_element_80_1590740546845">
<div class="attribute_input_block_style attribute_style_1 attribute_livingrooms">
<div class="attribute-parts-wrap">
<span class="attribute-name">Livingrooms:</span>
<span class="attribute-value">2</span>
</div>
</div>
</div>
</div>
<div style="width: 33.333333333333%">
<div class=" ulisting_element_550_1592469598331">
<div class="ulisting-attribute-template attribute_style_1 attribute_garages"><div class="attribute-parts-wrap">
<span class="attribute-name">Garages:</span>
<span class="attribute-value"><?php echo $property_garage; ?></span>
</div></div> </div>
</div>
<div style="width: 33.333333333333%">
<div class=" ulisting_element_90_1590740583778">
<div class="attribute_input_block_style attribute_style_1 attribute_rooms">
<div class="attribute-parts-wrap">
<span class="attribute-name">TotalRooms:</span>
<span class="attribute-value">Unavailable</span>
</div>
</div>
</div>
</div>
<div style="width: 33.333333333333%">
<div class=" ulisting_element_810_1590740592112">
<div class="attribute_input_block_style attribute_style_1 attribute_plot_size">
<div class="attribute-parts-wrap">
<span class="attribute-name">Plot size:</span>
<span class="attribute-value"><?php echo $property_size; ?></span>
</div>
</div>
</div>
</div>
<div style="width: 33.333333333333%">
<div class=" ulisting_element_550_1590740601430">
<div class="attribute_input_block_style attribute_style_1 attribute_kitchens">
<div class="attribute-parts-wrap">
<span class="attribute-name">Kitchens:</span>
<span class="attribute-value"><?php echo $property_kitchen ?></span>
</div>
</div>
</div>
</div>
<div style="width: 33.333333333333%">
<div class=" ulisting_element_940_1590741573812">
<div class="attribute_input_block_style attribute_style_1 attribute_year_built">
<div class="attribute-parts-wrap">
<span class="attribute-name">Year Built:</span>
<span class="attribute-value"><?php echo $property_buildon ?> old</span>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="rentex-listing-divider ulisting_element_1000_1590985683630"></div>
	
	<!-- <div class=" ulisting_element_680_1590568125722">
<div class="ulisting-attribute-template attribute_style_4 attribute_amenities"> <h4 class="ulisting-heading">Amenities </h4> <ul><li> <span class="ulisting-attribute-template-icon"> <i class="rentex-icon-check-square"></i> </span> <span class="ulisting-attribute-template-value"> Air Conditioning </span> </li><li> <span class="ulisting-attribute-template-icon"> <i class="rentex-icon-check-square"></i> </span> <span class="ulisting-attribute-template-value"> Buil-In Wardrobes </span> </li><li> <span class="ulisting-attribute-template-icon"> <i class="rentex-icon-check-square"></i> </span> <span class="ulisting-attribute-template-value"> Dishwasher </span> </li><li> <span class="ulisting-attribute-template-icon"> <i class="rentex-icon-check-square"></i> </span> <span class="ulisting-attribute-template-value"> Fencing </span> </li><li> <span class="ulisting-attribute-template-icon"> <i class="rentex-icon-check-square"></i> </span> <span class="ulisting-attribute-template-value"> Clinic </span> </li><li> <span class="ulisting-attribute-template-icon"> <i class="rentex-icon-check-square"></i> </span> <span class="ulisting-attribute-template-value"> Floor Coverings </span> </li><li> <span class="ulisting-attribute-template-icon"> <i class="rentex-icon-check-square"></i> </span> <span class="ulisting-attribute-template-value"> Internet </span> </li><li> <span class="ulisting-attribute-template-icon"> <i class="rentex-icon-check-square"></i> </span> <span class="ulisting-attribute-template-value"> Park </span> </li> </ul></div> </div>
<div class="rentex-listing-divider ulisting_element_920_1590994185979"></div>
<div class=" ulisting_element_780_1590994174163">
<div class="stm-row">
<div class="stm-col-12 stm-col-md-12">
<h4 class="ulisting-heading">Location</h4>
</div>
</div>


<div id="ulisting_attribute_location_39" style="width: 100%; height: 360px">
<rentext-google-map inline-template id="listing-map_55032" :zoom="zoom" :center="center" :markers="markers" map-type-id="terrain" :styles='[{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#dde6e8"},{"visibility":"on"}]}]'><div class="stm-listing-map-custom"> <div style="width: 100%; height: 360px" v-bind:id="id"></div></div>
</rentext-google-map></div>
</div>

<div class="rentex-listing-divider ulisting_element_170_1590985697476"></div>
<div class="rentex_listing_heading_title">
<div class=" ulisting_element_730_1590985589476">
<div class="wrapper">
<h4 class="ulisting-heading">
Floor Plans </h4>
</div>
</div>
</div>

<div id="accordion_61947">
<div class="card card-accordion rentex-accordion">
<div class="card-header js-btn-accordion active">
<div class="mb-0">
<div class="stm-row">
<div class="stm-col-12 stm-col-sm-4">
<button class="btn btn-link card-title">
First Floor </button>
</div>
<div class="stm-col-12 stm-col-sm-8 text-right">
<div class="card-option">
<strong>2</strong>
<span>Beds</span>
</div>
<div class="card-option">
<strong>2</strong>
<span>Baths</span>
</div>
<div class="card-option">
<strong>2.950</strong>
<span>sqft</span>
</div>
</div>
</div>
</div>
</div>
<div class="card-collapse js-card-body active">
<div class="card-body">
<div class="card-shortcode"><div id="image-map-pro-4899"></div></div> <div class="card-content"><p><br>To the left is the modern kitchen with central island, leading through to the unique breakfast/family room which feature glass walls and doors out onto the garden and access to the separate utility room.</p></div> </div>
</div>
</div>
<div class="card card-accordion rentex-accordion">
<div class="card-header js-btn-accordion">
<div class="mb-0">
<div class="stm-row">
<div class="stm-col-12 stm-col-sm-4">
<button class="btn btn-link card-title">
Second Floor </button>
</div>
<div class="stm-col-12 stm-col-sm-8 text-right">
<div class="card-option">
<strong>3</strong>
<span>Beds</span>
</div>
<div class="card-option">
<strong>3</strong>
<span>Baths</span>
</div>
<div class="card-option">
<strong>2.750</strong>
<span>sqft</span>
</div>
</div>
</div>
</div>
</div>
<div class="card-collapse js-card-body">
<div class="card-body">
<div class="card-shortcode"><div id="image-map-pro-9318"></div></div> <div class="card-content"><p><br>To the left is the modern kitchen with central island, leading through to the unique breakfast/family room which feature glass walls and doors out onto the garden and access to the separate utility room.</p></div> </div>
</div>
</div>
<div class="card card-accordion rentex-accordion">
<div class="card-header js-btn-accordion">
<div class="mb-0">
<div class="stm-row">
<div class="stm-col-12 stm-col-sm-4">
<button class="btn btn-link card-title">
Third Floor </button>
</div>
<div class="stm-col-12 stm-col-sm-8 text-right">
<div class="card-option">
<strong>2</strong>
<span>Beds</span>
</div>
<div class="card-option">
<strong>3</strong>
<span>Baths</span>
</div>
<div class="card-option">
<strong>1.750</strong>
<span>sqft</span>
</div>
</div>
</div>
</div>
</div>
<div class="card-collapse js-card-body">
<div class="card-body">
<div class="card-shortcode"><div id="image-map-pro-8697"></div></div> <div class="card-content"><p><br>To the left is the modern kitchen with central island, leading through to the unique breakfast/family room which feature glass walls and doors out onto the garden and access to the separate utility room.</p></div> </div>
</div>
</div>
</div>
<div class="rentex-listing-divider ulisting_element_120_1591065489394"></div>
<div class="rentex_listing_heading_title">
<div class=" ulisting_element_880_1591065471779">
<div class="wrapper">
<h4 class="ulisting-heading">
Video </h4>
</div>
</div>
</div>
<div class="listing-video-embed">
<div class="listing-video-wrap">
<iframe title="Property Tour: 400 Park Avenue South, 29B" width="980" height="551" src="https://www.youtube.com/embed/F0sAjbkoY9E?feature=oembed" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> </div>
</div>
<div class="rentex-listing-divider ulisting_element_510_1590985708493"></div>
<div class=" ulisting_element_900_1590568320761">
<div class="yelp_nearby_box">
<div class="yelp_nearby_title_box">
<h4 class="ulisting-heading yelp-heading">What's Nearby?</h4>
</div>
<div class="yelp_category_list">
<div class="yelp_category_title">education</div>
<ul class="yelp_sub_cat_list"><li>
<div class="yelp_sub_cat-avatar">
<a href="https://www.yelp.com/biz/eureka-valley-harvey-milk-memorial-branch-library-san-francisco?adjust_creative=J7O80Ba-ZZl7LZePgkEVtA&amp;utm_campaign=yelp_api_v3&amp;utm_medium=api_v3_business_search&amp;utm_source=J7O80Ba-ZZl7LZePgkEVtA" title="Eureka Valley/Harvey Milk Memorial Branch Library" target="_blank">
<img src="images/0u3xkWW5L_zFSJy-9zB-sQ-o.jpg" alt="Eureka Valley/Harvey Milk Memorial Branch Library"></a>
</div>
<div class="yelp_sub_cat-info">
<h6 class="yelp_sub_cat_title">
<a href="https://www.yelp.com/biz/eureka-valley-harvey-milk-memorial-branch-library-san-francisco?adjust_creative=J7O80Ba-ZZl7LZePgkEVtA&amp;utm_campaign=yelp_api_v3&amp;utm_medium=api_v3_business_search&amp;utm_source=J7O80Ba-ZZl7LZePgkEVtA" title="Eureka Valley/Harvey Milk Memorial Branch Library" target="_blank">Eureka Valley/Harvey Milk Memorial Branch Library</a>
</h6>
<div class="yelp_sub_cat_distance">
(1.00 mi)
</div>
<div class="yelp_sub_cat_address">1 Jose Sarria Court San Francisco, CA 94114 </div>
</div>
<div class="yelp_sub_cat-ratings">
<div class="yelp_sub_cat_reviews_count">
<span>28</span> reviews </div>
<div class="yelp_sub_cat_rating_stars rating_pos_3_5"></div>
</div>
</li>
<li>
<div class="yelp_sub_cat-avatar">
<a href="https://www.yelp.com/biz/milvali-extensions-and-academy-san-francisco?adjust_creative=J7O80Ba-ZZl7LZePgkEVtA&amp;utm_campaign=yelp_api_v3&amp;utm_medium=api_v3_business_search&amp;utm_source=J7O80Ba-ZZl7LZePgkEVtA" title="Milvali Extensions &amp; Academy" target="_blank">
<img src="images/WzCPWfatYdmUa-52hfY7hA-o.jpg" alt="Milvali Extensions &amp; Academy"></a>
</div>
<div class="yelp_sub_cat-info">
<h6 class="yelp_sub_cat_title">
<a href="https://www.yelp.com/biz/milvali-extensions-and-academy-san-francisco?adjust_creative=J7O80Ba-ZZl7LZePgkEVtA&amp;utm_campaign=yelp_api_v3&amp;utm_medium=api_v3_business_search&amp;utm_source=J7O80Ba-ZZl7LZePgkEVtA" title="Milvali Extensions &amp; Academy" target="_blank">Milvali Extensions &amp; Academy</a>
</h6>
<div class="yelp_sub_cat_distance">
(1.74 mi)
</div>
<div class="yelp_sub_cat_address">2036 Union St San Francisco, CA 94123 </div>
</div>
<div class="yelp_sub_cat-ratings">
<div class="yelp_sub_cat_reviews_count">
<span>3</span> reviews </div>
<div class="yelp_sub_cat_rating_stars rating_pos_5_0"></div>
</div>
</li>
<li>
<div class="yelp_sub_cat-avatar">
<a href="https://www.yelp.com/biz/lingo-san-francisco?adjust_creative=J7O80Ba-ZZl7LZePgkEVtA&amp;utm_campaign=yelp_api_v3&amp;utm_medium=api_v3_business_search&amp;utm_source=J7O80Ba-ZZl7LZePgkEVtA" title="Lingo" target="_blank">
<img src="images/5MmUID_07M82z-O285VxpQ-o.jpg" alt="Lingo"></a>
</div>
<div class="yelp_sub_cat-info">
<h6 class="yelp_sub_cat_title">
<a href="https://www.yelp.com/biz/lingo-san-francisco?adjust_creative=J7O80Ba-ZZl7LZePgkEVtA&amp;utm_campaign=yelp_api_v3&amp;utm_medium=api_v3_business_search&amp;utm_source=J7O80Ba-ZZl7LZePgkEVtA" title="Lingo" target="_blank">Lingo</a>
</h6>
<div class="yelp_sub_cat_distance">
(1.48 mi)
</div>
<div class="yelp_sub_cat_address">San Francisco, CA 94114 </div>
</div>
<div class="yelp_sub_cat-ratings">
<div class="yelp_sub_cat_reviews_count">
<span>13</span> reviews </div>
<div class="yelp_sub_cat_rating_stars rating_pos_5_0"></div>
</div>
</li>
</ul></div>
<div class="yelp_category_list">
<div class="yelp_category_title">food</div>
<ul class="yelp_sub_cat_list"><li>
<div class="yelp_sub_cat-avatar">
<a href="https://www.yelp.com/biz/happy-lemon-san-francisco-4?adjust_creative=J7O80Ba-ZZl7LZePgkEVtA&amp;utm_campaign=yelp_api_v3&amp;utm_medium=api_v3_business_search&amp;utm_source=J7O80Ba-ZZl7LZePgkEVtA" title="Happy Lemon" target="_blank">
<img src="images/wppgj1RVSCOXhFBOqU7ZdA-o.jpg" alt="Happy Lemon"></a>
</div>
 <div class="yelp_sub_cat-info">
<h6 class="yelp_sub_cat_title">
<a href="https://www.yelp.com/biz/happy-lemon-san-francisco-4?adjust_creative=J7O80Ba-ZZl7LZePgkEVtA&amp;utm_campaign=yelp_api_v3&amp;utm_medium=api_v3_business_search&amp;utm_source=J7O80Ba-ZZl7LZePgkEVtA" title="Happy Lemon" target="_blank">Happy Lemon</a>
</h6>
<div class="yelp_sub_cat_distance">
(1.51 mi)
</div>
<div class="yelp_sub_cat_address">1320 4th St San Francisco, CA 94158 </div>
</div>
<div class="yelp_sub_cat-ratings">
<div class="yelp_sub_cat_reviews_count">
<span>35</span> reviews </div>
<div class="yelp_sub_cat_rating_stars rating_pos_4_5"></div>
</div>
</li>
<li>
<div class="yelp_sub_cat-avatar">
<a href="https://www.yelp.com/biz/tacorea-chinatown-san-francisco?adjust_creative=J7O80Ba-ZZl7LZePgkEVtA&amp;utm_campaign=yelp_api_v3&amp;utm_medium=api_v3_business_search&amp;utm_source=J7O80Ba-ZZl7LZePgkEVtA" title="Tacorea - Chinatown" target="_blank">
<img src="images/I854yltYEbRqedm0HOC-aQ-o.jpg" alt="Tacorea - Chinatown"></a>
</div>
<div class="yelp_sub_cat-info">
<h6 class="yelp_sub_cat_title">
<a href="https://www.yelp.com/biz/tacorea-chinatown-san-francisco?adjust_creative=J7O80Ba-ZZl7LZePgkEVtA&amp;utm_campaign=yelp_api_v3&amp;utm_medium=api_v3_business_search&amp;utm_source=J7O80Ba-ZZl7LZePgkEVtA" title="Tacorea - Chinatown" target="_blank">Tacorea - Chinatown</a>
</h6>
<div class="yelp_sub_cat_distance">
(1.72 mi)
</div>
<div class="yelp_sub_cat_address">620 Broadway San Francisco, CA 94133 </div>
</div>
<div class="yelp_sub_cat-ratings">
<div class="yelp_sub_cat_reviews_count">
<span>9</span> reviews </div>
<div class="yelp_sub_cat_rating_stars rating_pos_4_5"></div>
</div>
</li>
<li>
<div class="yelp_sub_cat-avatar">
<a href="https://www.yelp.com/biz/happy-lemon-san-francisco?adjust_creative=J7O80Ba-ZZl7LZePgkEVtA&amp;utm_campaign=yelp_api_v3&amp;utm_medium=api_v3_business_search&amp;utm_source=J7O80Ba-ZZl7LZePgkEVtA" title="Happy Lemon" target="_blank">
<img src="images/lXfR8qO0BuSoFO6QY2JTiw-o.jpg" alt="Happy Lemon"></a>
</div>
<div class="yelp_sub_cat-info">
<h6 class="yelp_sub_cat_title">
<a href="https://www.yelp.com/biz/happy-lemon-san-francisco?adjust_creative=J7O80Ba-ZZl7LZePgkEVtA&amp;utm_campaign=yelp_api_v3&amp;utm_medium=api_v3_business_search&amp;utm_source=J7O80Ba-ZZl7LZePgkEVtA" title="Happy Lemon" target="_blank">Happy Lemon</a>
</h6>
<div class="yelp_sub_cat_distance">
(1.83 mi)
</div>
<div class="yelp_sub_cat_address">99 Drumm St San Francisco, CA 94111 </div>
</div>
<div class="yelp_sub_cat-ratings">
<div class="yelp_sub_cat_reviews_count">
<span>21</span> reviews </div>
<div class="yelp_sub_cat_rating_stars rating_pos_5_0"></div>
</div>
</li>
</ul></div>
<div class="yelp_category_list">
<div class="yelp_category_title">health</div>
<ul class="yelp_sub_cat_list"><li>
<div class="yelp_sub_cat-avatar">
<a href="https://www.yelp.com/biz/rose-glavin-san-francisco?adjust_creative=J7O80Ba-ZZl7LZePgkEVtA&amp;utm_campaign=yelp_api_v3&amp;utm_medium=api_v3_business_search&amp;utm_source=J7O80Ba-ZZl7LZePgkEVtA" title="Rose Glavin" target="_blank">
<img src="images/4tddkdjLYR4QULlYZwcr2w-o.jpg" alt="Rose Glavin"></a>
</div>
<div class="yelp_sub_cat-info">
<h6 class="yelp_sub_cat_title">
<a href="https://www.yelp.com/biz/rose-glavin-san-francisco?adjust_creative=J7O80Ba-ZZl7LZePgkEVtA&amp;utm_campaign=yelp_api_v3&amp;utm_medium=api_v3_business_search&amp;utm_source=J7O80Ba-ZZl7LZePgkEVtA" title="Rose Glavin" target="_blank">Rose Glavin</a>
</h6>
<div class="yelp_sub_cat_distance">
(0.21 mi)
</div>
<div class="yelp_sub_cat_address">379 Hayes St San Francisco, CA 94102 </div>
</div>
<div class="yelp_sub_cat-ratings">
<div class="yelp_sub_cat_reviews_count">
<span>18</span> reviews </div>
<div class="yelp_sub_cat_rating_stars rating_pos_5_0"></div>
</div>
</li>
<li>
<div class="yelp_sub_cat-avatar">
<a href="https://www.yelp.com/biz/hayes-valley-wellness-san-francisco?adjust_creative=J7O80Ba-ZZl7LZePgkEVtA&amp;utm_campaign=yelp_api_v3&amp;utm_medium=api_v3_business_search&amp;utm_source=J7O80Ba-ZZl7LZePgkEVtA" title="Hayes Valley Wellness" target="_blank">
<img src="images/sfQ6GBNuMT4Hqd6tx-65Dg-o.jpg" alt="Hayes Valley Wellness"></a>
</div>
<div class="yelp_sub_cat-info">
<h6 class="yelp_sub_cat_title">
<a href="https://www.yelp.com/biz/hayes-valley-wellness-san-francisco?adjust_creative=J7O80Ba-ZZl7LZePgkEVtA&amp;utm_campaign=yelp_api_v3&amp;utm_medium=api_v3_business_search&amp;utm_source=J7O80Ba-ZZl7LZePgkEVtA" title="Hayes Valley Wellness" target="_blank">Hayes Valley Wellness</a>
</h6>
<div class="yelp_sub_cat_distance">
(0.17 mi)
</div>
<div class="yelp_sub_cat_address">190 Gough St San Francisco, CA 94102 </div>
</div>
<div class="yelp_sub_cat-ratings">
<div class="yelp_sub_cat_reviews_count">
<span>67</span> reviews </div>
<div class="yelp_sub_cat_rating_stars rating_pos_5_0"></div>
</div>
</li>
<li>
<div class="yelp_sub_cat-avatar">
<a href="https://www.yelp.com/biz/hae-min-cho-lac-san-francisco-3?adjust_creative=J7O80Ba-ZZl7LZePgkEVtA&amp;utm_campaign=yelp_api_v3&amp;utm_medium=api_v3_business_search&amp;utm_source=J7O80Ba-ZZl7LZePgkEVtA" title="Hae Min Cho, LAc" target="_blank">
<img src="images/zJcLBmiT3XCr42oa8_4PUQ-o.jpg" alt="Hae Min Cho, LAc"></a>
</div>
<div class="yelp_sub_cat-info">
<h6 class="yelp_sub_cat_title">
<a href="https://www.yelp.com/biz/hae-min-cho-lac-san-francisco-3?adjust_creative=J7O80Ba-ZZl7LZePgkEVtA&amp;utm_campaign=yelp_api_v3&amp;utm_medium=api_v3_business_search&amp;utm_source=J7O80Ba-ZZl7LZePgkEVtA" title="Hae Min Cho, LAc" target="_blank">Hae Min Cho, LAc</a>
</h6>
<div class="yelp_sub_cat_distance">
(0.18 mi)
</div>
<div class="yelp_sub_cat_address">44 Gough St Ste 308 San Francisco, CA 94103</div>
</div>
<div class="yelp_sub_cat-ratings">
<div class="yelp_sub_cat_reviews_count">
<span>35</span> reviews </div>
<div class="yelp_sub_cat_rating_stars rating_pos_4_5"></div>
</div>
</li>
</ul></div>
</div>
</div>
<div class="rentex-listing-divider ulisting_element_500_1590985751113"></div>
<div class="rentex_listing_heading_title">
<div class=" ulisting_element_480_1590985610708">
<div class="wrapper">
<h4 class="ulisting-heading">
3D Gallery </h4>
</div>
</div>
</div> -->
<!-- <div class=" ulisting_element_680_1590568336761">
<p><iframe src="https://my.matterport.com/show/?m=amhzZJk3ehh&amp;play=1&amp;qs=1" width="100%" height="480" frameborder="0" allowfullscreen="allowfullscreen"></iframe></p> </div>
<div class="rentex-listing-divider ulisting_element_470_1590985734254"></div>
<div class="rentex_listing_heading_title"> -->
<!-- <div class=" ulisting_element_450_1590985624558">
<div class="wrapper">
<h4 class="ulisting-heading">
Walk Score </h4>
</div>
</div> -->
<!-- </div>
<div class=" ulisting_element_500_1590743347984">
<div id="ws-walkscore-tile" class="walkscore-box"></div>
</div>
<div class="rentex-listing-divider ulisting_element_670_1590985723178"></div> -->
<!-- <div class=" ulisting_element_410_1590568363063">
<div id="listing-page-statistics">
<ulisting-page-statistics inline-template page_step_size="10" listing='{"checked":true,"label":"View","id":39,"borderColor":"#4AA2E2","backgroundColor":"#ABD4F1"}' user='{"checked":true,"label":"Clicked","id":"8","borderColor":"#FF7E9B","backgroundColor":"#FF9933"}'><div>
<div class="page_statistics_title_box">
<h4 class="ulisting-heading yelp-heading">Page statistics</h4>
</div>
<ul class="nav nav-pills justify-content-end"><li data-v-for="_type in types" class="nav-item">
<a data-v-on_click="set_type(_type.id)" class="nav-link" data-v-bind_class="{ active: type == _type.id }" href="javascript:void(0)">{{_type.title}}</a>
</li>
</ul><div class="row align-items-center ulisting-min-height-400px" v-if="preloader">
<div class="col text-center">
<div class="ulisting-preloader-ring">
<div></div>
<div></div>
<div></div>
<div></div>
</div>
</div>
</div>
<ulisting-page-statistics-chart v-if="!preloader" :page_step_size="step" :labels="labels" :datasets="datasets"></ulisting-page-statistics-chart><div class="ulisting-page-statistics-switch">
<template v-for="(element, index) in checkboxes"><div class="ulisting-pretty p-default">
<input type="checkbox" v-model="element.checked"><div class="state">
<label :class="'ulisting_checkbox_label_' + index">{{element.label}}</label>
</div>
</div>
</template></div>
</div>
</ulisting-page-statistics></div>
</div> -->
<style>
    
                    .ulisting-pretty input:checked ~ .state .ulisting_checkbox_label_user:after {
                        background-color: #FF9933 !important;
                    }
                    .ulisting-pretty input:checked ~ .state .ulisting_checkbox_label_listing:after {
                        background-color: #ABD4F1 !important;
                    }
                </style></div>
<div class=" stm-col  stm-col-xl-4 stm-col-lg-4 stm-col-md-0 stm-col-sm-0 stm-col-12 ulisting_element_930_1590568048132">

<div class="agent-contact-box">
<?php 

if ( !	(isset($_SESSION['regis_id'])) || !($posted_by_id == $_SESSION['regis_id'])) {
	# code...

?>

<!-- contact -->
<div class="rentex-agent-info">
<div class="listing-item-box listing-item-boxshadow ulisting_element_770_1591771615794">
<h4 class="ulisting-heading normal">Contact Owner</h4> <div class="agent-info-wrapper">
<div class="agent-info-box">
<div class="avatar">
<a href="#"><img src="images/avatar-agency-1.jpg" alt="Company Realty"></a>
</div>
<div class="info">
<h4 class="user_name">
<a href="company-realty.html"><?php echo $name; ?></a>
</h4>
<div class="user_phone">
<span class="show-phone">*****321</span>
<span class="phone-detail"><?php echo $contact; ?></span>
<span class="display-phone js-btn-phone">show</span>
</div>
<!-- <div class="user_email"><a href="#" class="__cf_email__" data-cfemail="2e4d41435e4f4057035c4b4f425a576e595e415e4f42004d4143">email id</a></div>
</div> -->
</div>

<?php
if (isset($_SESSION['regis_id'])) {
	

?>

<a class="button user-btn js-btn-contact-popup button-full" data-effect="mfp-zoom-in" href="#contact-popup">Send Your Message</a>
<?php
}
else
{
	?>
	<a class="button user-btn js-btn-contact-popup button-full" >Login To Send Message</a>

	<?php
}

?>
<div id="contact-popup" class="contact-popup mfp-hide">
	<div role="form" class="" id="" lang="en-US" dir="ltr">
		<div class="screen-reader-response" role="alert" aria-live="polite"></div>

		<form action="" method="post" class="form init" novalidate="novalidate">
			<div style="display: none;">
				<!-- <input type="hidden" name="_wpcf7" value="1019">
				<input type="hidden" name="_wpcf7_version" value="5.2">
				<input type="hidden" name="_wpcf7_locale" value="en_US">
				<input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f1019-p39-o1">
				<input type="hidden" name="_wpcf7_container_post" value="39">
				<input type="hidden" name="_wpcf7_posted_data_hash" value=""> -->
			</div>
			<div class="form-author-wrap">
				<div class="form-field">
					<span class="form-control-wrap sender_name">
						<input type="text" name="sender_name" value="" size="40" class="form-control wpcf7-text validates-as-required" aria-required="true" aria-invalid="false" placeholder="Your Name">
					</span><br>
				</div><br>
				<div class="form-field">
					<span class="form-control-wrap sender_email">
						<input type="email" name="sender_email" value="" size="40" class="wpcf7-form-control text email validates-as-required validates-as-email" aria-required="true" aria-invalid="false" placeholder="Your Email">
					</span><br>
				</div><br>
<div class="form-field">
<span class="form-control-wrap sender_contact">
	<input type="tel" name="sender_contact" value="" size="40" class="form-control text tel validates-as-required validates-as-tel" aria-required="true" aria-invalid="false" placeholder="Your Contact"></span><br></div>
	<br>
<div class="form-field">
<span class="form-control-wrap your-message"><textarea name="sender_message" cols="40" rows="5" class="form-control textarea" aria-invalid="false"></textarea></span><br></div>


<div class="form-submit">
<input type="submit" name="send_message" value="Request Details" class="form-control submit btn-block"></div>
</div>


</form>
</div>

</div>
<div class="contact-info hidden js-contact-info">
I am interested in your property name "Neue Dimensionen im Schr&auml;gdach" and would like to rent for a long time and look for the best price. I have some questions to ask you about rental price, equipment,... We want to make an appointment for further conversation. Link property detail: https://rentex.wpopal.com/listing/neue-dimensionen-im-schragdach/ </div>
<a class="button call-now" href="tel:318-838-5675"><i class="rentex-icon-help_desk"></i>Call Now !</a>
</div>

</div>
</div>
<?php
}
?>
</div>
<!-- 
<div class="rentex-carousel-listing-layout">
<div class="listing-item-box listing-item-boxshadow ulisting_element_970_1591771619040">
<h4 class="ulisting-heading normal">Popular properties</h4> <div class="carousel-listing-layout-wrapper">
<div class="ulisting_posts_box ulisting_posts_carousel rentex-carousel js-listing-carousel" data-desktop="1" data-tablet="1" data-tablet-mini="2" data-mobile="2" data-mobile-mini="1" data-nav="false" data-dots="true" data-loop="true"><div class="column-item ulisting-item-grid template_1"><div class="ulisting-popular-item">
<div class="inventory_content_wrap">
<div class=" ulisting_element_890_1591344543182 ulisting_element_890_1591344543182">
<div class="container ">
<div class=" stm-row  ulisting_element_130_1591344543182">
<div class=" stm-col  stm-col-xl-0 stm-col-lg-0 stm-col-md-0 stm-col-sm-0 stm-col-0 ulisting_element_950_1591344543182">
<div class="rentex-listing-grid-item grid-style-3">

<div class="rentex-listing-thumbnail-panel">

<div class="rentex-thumbnail-panel-top">

<div class="rentext-listing-category"><span>Rent</span><span>Sold</span></div>
<div class=" count-box ulisting_element_900_1591344544263 ulisting_element_900_1591344544263">
<span class="rentext-listing-photo-count"> <i class="rentex-icon-images"></i> 4 </span>
</div>
</div>
<div class="ulisting-thumbnail-panel"><div class="thumbnail-box-listing"><a href="gravenhurst-cottage.html" class="ulisting-thumbnail-box-link"></a><img src="images/05-property-8-1.-615x450.jpg" alt="Listing"><div class="ulisting-thumbnail-panel-top"></div> <div class="ulisting-thumbnail-panel-bottom"></div></div></div> </div>

<div class="rentex-listing-content-panel">
<div class="rentex-main-content">
<div class="ulisting-listing-price"> <span class="ulisting-listing-price-new">$475,000 </span></div> 
<div class="listing-single-title style_1">
<div class="wrapper">
<h3 class="title">
<a href="gravenhurst-cottage.html">
Gravenhurst Cottage </a>
</h3>
</div>
</div>
<div class="rentex-meta-size rentex-short-desc">Unnamed Road, Las Vegas, NV 89103, USA</div> 
<div class="rentex-meta-extra">
<div class="ulisting-attribute-template attribute_style_2 attribute_bedrooms"><div class="attribute-parts-wrap">
<span class="attribute-icon"><i class="rentex-icon-bed"></i></span>
<span class="attribute-value">1</span>
<span class="attribute-affix">Beds</span>
</div></div> <div class="ulisting-attribute-template attribute_style_2 attribute_bathrooms"><div class="attribute-parts-wrap">
<span class="attribute-icon"><i class="rentex-icon-bath"></i></span>
<span class="attribute-value">2</span>
<span class="attribute-affix">Baths</span>
</div></div> <div class="ulisting-attribute-template attribute_style_2 attribute_area"><div class="attribute-parts-wrap">
<span class="attribute-icon"><i class="rentex-icon-sqft"></i></span>
<span class="attribute-value">1760</span>
<span class="attribute-affix">Sqft</span>
</div></div> </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div> </div>
</div>
</div><div class="column-item ulisting-item-grid template_1"><div class="ulisting-popular-item">
<div class="inventory_content_wrap">
<div class=" ulisting_element_890_1591344543182 ulisting_element_890_1591344543182">
<div class="container ">
<div class=" stm-row  ulisting_element_130_1591344543182">
<div class=" stm-col  stm-col-xl-0 stm-col-lg-0 stm-col-md-0 stm-col-sm-0 stm-col-0 ulisting_element_950_1591344543182">
<div class="rentex-listing-grid-item grid-style-3">

<div class="rentex-listing-thumbnail-panel">

<div class="rentex-thumbnail-panel-top">

<div class="rentext-listing-category"><span>Buy</span><span>Rent</span></div>
<div class=" count-box ulisting_element_900_1591344544263 ulisting_element_900_1591344544263">
<span class="rentext-listing-photo-count"> <i class="rentex-icon-images"></i> 8 </span>
</div>
</div>
<div class="ulisting-thumbnail-panel"><div class="thumbnail-box-listing"><a href="kayak-point-house.html" class="ulisting-thumbnail-box-link"></a><img src="images/05-property-3-1.-615x450.jpg" alt="Listing"><div class="ulisting-thumbnail-panel-top"></div> <div class="ulisting-thumbnail-panel-bottom"></div></div></div> </div>

<div class="rentex-listing-content-panel">
<div class="rentex-main-content">
<div class="ulisting-listing-price"> <span class="ulisting-listing-price-new">$580,000 </span></div> 
<div class="listing-single-title style_1">
<div class="wrapper">
<h3 class="title">
<a href="kayak-point-house.html">
Kayak Point House </a>
</h3>
</div>
</div>
<div class="rentex-meta-size rentex-short-desc">N0490 Rd Texhoma Cimarron County</div> 
<div class="rentex-meta-extra">
<div class="ulisting-attribute-template attribute_style_2 attribute_bedrooms"><div class="attribute-parts-wrap">
<span class="attribute-icon"><i class="rentex-icon-bed"></i></span>
<span class="attribute-value">4</span>
<span class="attribute-affix">Beds</span>
</div></div> <div class="ulisting-attribute-template attribute_style_2 attribute_bathrooms"><div class="attribute-parts-wrap">
<span class="attribute-icon"><i class="rentex-icon-bath"></i></span>
<span class="attribute-value">1</span>
<span class="attribute-affix">Baths</span>
</div></div> <div class="ulisting-attribute-template attribute_style_2 attribute_area"><div class="attribute-parts-wrap">
<span class="attribute-icon"><i class="rentex-icon-sqft"></i></span>
<span class="attribute-value">1186</span>
<span class="attribute-affix">Sqft</span>
</div></div> </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div> </div>
</div>
</div><div class="column-item ulisting-item-grid template_1"><div class="ulisting-popular-item">
<div class="inventory_content_wrap">
<div class=" ulisting_element_890_1591344543182 ulisting_element_890_1591344543182">
<div class="container ">
<div class=" stm-row  ulisting_element_130_1591344543182">
<div class=" stm-col  stm-col-xl-0 stm-col-lg-0 stm-col-md-0 stm-col-sm-0 stm-col-0 ulisting_element_950_1591344543182">
<div class="rentex-listing-grid-item grid-style-3">

<div class="rentex-listing-thumbnail-panel">

<div class="rentex-thumbnail-panel-top">

<div class="rentext-listing-category"><span>Buy</span><span>Rent</span></div>
<div class=" count-box ulisting_element_900_1591344544263 ulisting_element_900_1591344544263">
<span class="rentext-listing-photo-count"> <i class="rentex-icon-images"></i> 9 </span>
</div>
</div>
<div class="ulisting-thumbnail-panel"><div class="thumbnail-box-listing"><a href="neue-dimensionen-im-schragdach.html" class="ulisting-thumbnail-box-link"></a><img src="images/05-property-1-1.-615x450.jpg" alt="Listing"><div class="ulisting-thumbnail-panel-top"></div> <div class="ulisting-thumbnail-panel-bottom"></div></div></div> </div>

<div class="rentex-listing-content-panel">
<div class="rentex-main-content">
<div class="ulisting-listing-price"> <span class="ulisting-listing-price-new">$320,000 </span></div> 
<div class="listing-single-title style_1">
<div class="wrapper">
<h3 class="title">
<a href="neue-dimensionen-im-schragdach.html">
Neue Dimensionen im Schr&auml;gdach </a>
</h3>
</div>
</div>
<div class="rentex-meta-size rentex-short-desc">Unnamed Road, San Francisco, CA 94102, &#1057;&#1064;&#1040;</div> 
<div class="rentex-meta-extra">
<div class="ulisting-attribute-template attribute_style_2 attribute_bedrooms"><div class="attribute-parts-wrap">
<span class="attribute-icon"><i class="rentex-icon-bed"></i></span>
<span class="attribute-value">3</span>
<span class="attribute-affix">Beds</span>
</div></div> <div class="ulisting-attribute-template attribute_style_2 attribute_bathrooms"><div class="attribute-parts-wrap">
<span class="attribute-icon"><i class="rentex-icon-bath"></i></span>
<span class="attribute-value"><?php $property_bathroom ?></span>
<span class="attribute-affix">Baths</span>
</div></div> <div class="ulisting-attribute-template attribute_style_2 attribute_area"><div class="attribute-parts-wrap">
<span class="attribute-icon"><i class="rentex-icon-sqft"></i></span>
<span class="attribute-value"><?php $property_size ?></span>
<span class="attribute-affix">Sqft</span>
</div></div> </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div> </div>
</div>
</div><div class="column-item ulisting-item-grid template_1"><div class="ulisting-popular-item">
<div class="inventory_content_wrap">
<div class=" ulisting_element_890_1591344543182 ulisting_element_890_1591344543182">
<div class="container ">
<div class=" stm-row  ulisting_element_130_1591344543182">
<div class=" stm-col  stm-col-xl-0 stm-col-lg-0 stm-col-md-0 stm-col-sm-0 stm-col-0 ulisting_element_950_1591344543182">
<div class="rentex-listing-grid-item grid-style-3">

<div class="rentex-listing-thumbnail-panel">

<div class="rentex-thumbnail-panel-top">

<div class="rentext-listing-category"><span>Rent</span><span>Sold</span></div>
<div class=" count-box ulisting_element_900_1591344544263 ulisting_element_900_1591344544263">
<span class="rentext-listing-photo-count"> <i class="rentex-icon-images"></i> 9 </span>
</div>
</div>
<div class="ulisting-thumbnail-panel"><div class="thumbnail-box-listing"><a href="langs-beach-house.html" class="ulisting-thumbnail-box-link"></a><img src="images/05-property-2-1.-615x450.jpg" alt="Listing"><div class="ulisting-thumbnail-panel-top"></div> <div class="ulisting-thumbnail-panel-bottom"></div></div></div> </div>

<div class="rentex-listing-content-panel">
<div class="rentex-main-content">
<div class="ulisting-listing-price"> <span class="ulisting-listing-price-new">$320,000 </span></div> 
<div class="listing-single-title style_1">
<div class="wrapper">
<h3 class="title">
<a href="langs-beach-house.html">
Langs Beach House </a>
</h3>
</div>
</div>
<div class="rentex-meta-size rentex-short-desc">Co Rd X Tribune Tribune</div> 
<div class="rentex-meta-extra">
<div class="ulisting-attribute-template attribute_style_2 attribute_bedrooms"><div class="attribute-parts-wrap">
<span class="attribute-icon"><i class="rentex-icon-bed"></i></span>
<span class="attribute-value">6</span>
<span class="attribute-affix">Beds</span>
</div></div> <div class="ulisting-attribute-template attribute_style_2 attribute_bathrooms"><div class="attribute-parts-wrap">
<span class="attribute-icon"><i class="rentex-icon-bath"></i></span>
<span class="attribute-value">4</span>
<span class="attribute-affix">Baths</span>
</div></div> <div class="ulisting-attribute-template attribute_style_2 attribute_area"><div class="attribute-parts-wrap">
<span class="attribute-icon"><i class="rentex-icon-sqft"></i></span>
<span class="attribute-value">1996</span>
<span class="attribute-affix">Sqft</span>
</div></div> </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div> </div>
</div>
</div><div class="column-item ulisting-item-grid template_1"><div class="ulisting-popular-item">
<div class="inventory_content_wrap">
<div class=" ulisting_element_890_1591344543182 ulisting_element_890_1591344543182">
<div class="container ">
<div class=" stm-row  ulisting_element_130_1591344543182">
<div class=" stm-col  stm-col-xl-0 stm-col-lg-0 stm-col-md-0 stm-col-sm-0 stm-col-0 ulisting_element_950_1591344543182">
<div class="rentex-listing-grid-item grid-style-3">

<div class="rentex-listing-thumbnail-panel">

<div class="rentex-thumbnail-panel-top">

<div class="rentext-listing-category"><span>Buy</span><span>Rent</span></div>
<div class=" count-box ulisting_element_900_1591344544263 ulisting_element_900_1591344544263">
<span class="rentext-listing-photo-count"> <i class="rentex-icon-images"></i> 9 </span>
</div>
</div>
<div class="ulisting-thumbnail-panel"><div class="thumbnail-box-listing"><a href="cascade-blocks.html" class="ulisting-thumbnail-box-link"></a><img src="images/05-property-12-1.-615x450.jpg" alt="Listing"><div class="ulisting-thumbnail-panel-top"></div> <div class="ulisting-thumbnail-panel-bottom"></div></div></div> </div>

<div class="rentex-listing-content-panel">
<div class="rentex-main-content">
<div class="ulisting-listing-price"> <span class="ulisting-listing-price-new">$540,000 </span></div> 
<div class="listing-single-title style_1">
 <div class="wrapper">
<h3 class="title">
<a href="cascade-blocks.html">
Cascade Blocks </a>
</h3>
</div>
</div>

<div class="rentex-meta-size rentex-short-desc">51 Merrick Way, Coral Gables, FL 33134, USA</div> 
<div class="rentex-meta-extra">
<div class="ulisting-attribute-template attribute_style_2 attribute_bedrooms"><div class="attribute-parts-wrap">
<span class="attribute-icon"><i class="rentex-icon-bed"></i></span>
<span class="attribute-value">1</span>
<span class="attribute-affix">Beds</span>
</div></div> <div class="ulisting-attribute-template attribute_style_2 attribute_bathrooms"><div class="attribute-parts-wrap">
<span class="attribute-icon"><i class="rentex-icon-bath"></i></span>
<span class="attribute-value">3</span>
<span class="attribute-affix">Baths</span>
</div></div> <div class="ulisting-attribute-template attribute_style_2 attribute_area"><div class="attribute-parts-wrap">
<span class="attribute-icon"><i class="rentex-icon-sqft"></i></span>
<span class="attribute-value">740</span>
<span class="attribute-affix">Sqft</span>
</div></div> </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div> </div>
</div>
</div></div> </div>
</div>
</div> -->
<!-- <div class="rentex-grid-listing-layout">
<div class="listing-item-box listing-item-boxshadow ulisting_element_350_1591771621707">
<h4 class="ulisting-heading normal">Latest properties</h4> <div class="grid-listing-layout-wrapper">
<div class="ulisting_posts_box ulisting_posts_latest_grid"><div class="row" data-elementor-columns="1" data-elementor-columns-tablet="1" data-elementor-columns-mobile="1"><div class="column-item ulisting-item-grid template_1"><div class="ulisting-latest-item">
<div class="inventory_content_wrap">
<div class=" ulisting_element_890_1591344543182 ulisting_element_890_1591344543182">
<div class="container ">
<div class=" stm-row  ulisting_element_130_1591344543182">
<div class=" stm-col  stm-col-xl-0 stm-col-lg-0 stm-col-md-0 stm-col-sm-0 stm-col-0 ulisting_element_950_1591344543182">
<div class="rentex-listing-grid-item grid-style-5">

<div class="rentex-listing-thumbnail-panel">
<div class="ulisting-thumbnail-panel"><div class="thumbnail-box-listing"><a href="neue-dimensionen-im-schragdach.html" class="ulisting-thumbnail-box-link"></a><img src="images/05-property-1-1.-615x450.jpg" alt="Listing"><div class="ulisting-thumbnail-panel-top"></div> <div class="ulisting-thumbnail-panel-bottom"></div></div></div> </div>

<div class="rentex-listing-content-panel">
<div class="rentex-main-content">
<div class="ulisting-listing-price"> <span class="ulisting-listing-price-new">$320,000 </span></div> 
<div class="listing-single-title style_1">
<div class="wrapper">
<h3 class="title">
<a href="neue-dimensionen-im-schragdach.html">
Neue Dimensionen im Schr&auml;gdach </a>
</h3>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div> </div>
</div>
</div><div class="column-item ulisting-item-grid template_1"><div class="ulisting-latest-item">
<div class="inventory_content_wrap">
<div class=" ulisting_element_890_1591344543182 ulisting_element_890_1591344543182">
<div class="container ">
<div class=" stm-row  ulisting_element_130_1591344543182">
<div class=" stm-col  stm-col-xl-0 stm-col-lg-0 stm-col-md-0 stm-col-sm-0 stm-col-0 ulisting_element_950_1591344543182">
<div class="rentex-listing-grid-item grid-style-5">

<div class="rentex-listing-thumbnail-panel">
<div class="ulisting-thumbnail-panel"><div class="thumbnail-box-listing"><a href="langs-beach-house.html" class="ulisting-thumbnail-box-link"></a><img src="images/05-property-2-1.-615x450.jpg" alt="Listing"><div class="ulisting-thumbnail-panel-top"></div> <div class="ulisting-thumbnail-panel-bottom"></div></div></div> </div>

<div class="rentex-listing-content-panel">
<div class="rentex-main-content">
<div class="ulisting-listing-price"> <span class="ulisting-listing-price-new">$320,000 </span></div> 
<div class="listing-single-title style_1">
<div class="wrapper">
<h3 class="title">
<a href="langs-beach-house.html">
Langs Beach House </a>
</h3>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div> </div>
</div>
</div><div class="column-item ulisting-item-grid template_1"><div class="ulisting-latest-item">
<div class="inventory_content_wrap">
<div class=" ulisting_element_890_1591344543182 ulisting_element_890_1591344543182">
<div class="container ">
<div class=" stm-row  ulisting_element_130_1591344543182">
<div class=" stm-col  stm-col-xl-0 stm-col-lg-0 stm-col-md-0 stm-col-sm-0 stm-col-0 ulisting_element_950_1591344543182">
<div class="rentex-listing-grid-item grid-style-5">

<div class="rentex-listing-thumbnail-panel">
<div class="ulisting-thumbnail-panel"><div class="thumbnail-box-listing"><a href="kayak-point-house.html" class="ulisting-thumbnail-box-link"></a><img src="images/05-property-3-1.-615x450.jpg" alt="Listing"><div class="ulisting-thumbnail-panel-top"></div> <div class="ulisting-thumbnail-panel-bottom"></div></div></div> </div>

<div class="rentex-listing-content-panel">
<div class="rentex-main-content">
<div class="ulisting-listing-price"> <span class="ulisting-listing-price-new">$580,000 </span></div> 
<div class="listing-single-title style_1">
<div class="wrapper">
<h3 class="title">
<a href="kayak-point-house.html">
Kayak Point House </a>
</h3>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div> </div>
</div>
</div></div></div> </div>
</div>
</div>
<div class="listing-item-boxshadow ulisting_element_180_1590569457109">
<div id="mortgage_calc">
<div class="mortgage_calc_box">
<div class="mortgage_calc_title_box">
<h4 class="ulisting-heading calc-heading white">Mortgage Calculator</h4>
</div>
<div class="mortgage_calc-results">
<div class="calc-payment-price">
<div class="form-group total">
<label>Total Amount</label>
<span>{{formatAsCurrency(principal)}}</span>
</div>
<div class="form-group payment">
<label>Your payment</label>
<span>{{formatAsCurrency(payment)}}</span>
</div>
</div>
<div class="calc-payment-info">
<div class="form-group">
<label>Total cost of loan</label>
<span class="">{{formatAsCurrency(totalCostOfMortgage)}}</span>
</div>
<div class="form-group">
<label>Total interest paid</label>
<span class="">{{formatAsCurrency(interestPayed)}}</span>
</div>
<div class="form-group">
<label>Payment</label>
<span class="out">{{paymentSelection}}</span>
</div>
<div class="form-group">
<label>Mortgage payment:</label>
<span class="out">{{formatAsCurrency(payment)}}</span>
</div>
</div>
</div>
<div class="mortgage_calc-form">
<div class="form-group">
<label>Total Amount </label>
<calc_field v-model="homeValue" :step="1000" value="222" type="currency"></calc_field></div>
<div class="form-group">
<label>Down Payment </label>
<calc_field v-model="downpayment" :step="1000" type="currency"></calc_field></div>
<div class="form-group">
<label>Interest Rate </label>
<calc_field v-model="interestRate" :step="0.001" type="percent" :decimals="3"></calc_field></div>
<div class="form-group">
<label>Amortization Period </label>
<calc_field v-model="amortization" :step="1" type="years"></calc_field></div>
<div class="form-group">
<label>Payment Preiod </label>
<select class="form-control" v-model="paymentSelection"><option v-for="payment, key in paymentPeriod" :value="key">{{key}}</option></select></div>
</div>
</div>
</div>
<template id="calc_field"><input type="text" class="form-control" :value="active?val:formatted" true></template></div>
</div>
</div>
</div>
</div>
</div>
</div> -->
<!-- <footer id="colophon" class="site-footer" role="contentinfo"><div data-elementor-type="page" data-elementor-id="326" class="elementor elementor-326" data-elementor-settings="[]">
<div class="elementor-inner">
<div class="elementor-section-wrap">
<section class="elementor-element elementor-element-38578c5 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-id="38578c5" data-element_type="section" data-settings='{"stretch_section":"section-stretched"}'><div class="elementor-background-overlay"></div>
<div class="elementor-container elementor-column-gap-no">
<div class="elementor-row">
<div class="elementor-element elementor-element-d1cef51 elementor-column elementor-col-100 elementor-top-column" data-id="d1cef51" data-element_type="column" data-settings='{"background_background":"classic"}'>
<div class="elementor-column-wrap  elementor-element-populated">
<div class="elementor-widget-wrap">
<section class="elementor-element elementor-element-08ba364 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-inner-section" data-id="08ba364" data-element_type="section"><div class="elementor-container elementor-column-gap-no">
<div class="elementor-row">
<div class="elementor-element elementor-element-21ffef6 elementor-column elementor-col-50 elementor-inner-column" data-id="21ffef6" data-element_type="column">
<div class="elementor-column-wrap  elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-3706e5d elementor-widget elementor-widget-text-editor" data-id="3706e5d" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<div class="elementor-text-editor elementor-clearfix">newsletter</div>
</div>
</div>
<div class="elementor-element elementor-element-db867dd elementor-widget__width-initial elementor-widget elementor-widget-heading" data-id="db867dd" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h2 class="elementor-heading-title elementor-size-default">Sign up for newsletter and get latest
news and update</h2> </div>
</div>
<div class="elementor-element elementor-element-07feb83 elementor-button-align-stretch elementor-widget elementor-widget-form" data-id="07feb83" data-element_type="widget" data-settings='{"button_width":"25","button_width_mobile":"50","step_next_label":"Next","step_previous_label":"Previous","step_type":"number_text","step_icon_shape":"circle"}' data-widget_type="form.default">
<div class="elementor-widget-container">
<form class="elementor-form" method="post" name="New Form">
<input type="hidden" name="post_id" value="326"><input type="hidden" name="form_id" value="07feb83"><input type="hidden" name="queried_id" value="39"><div class="elementor-form-fields-wrapper elementor-labels-above">
<div class="elementor-field-type-email elementor-field-group elementor-column elementor-field-group-email elementor-col-75 elementor-md-60 elementor-sm-100 elementor-field-required elementor-mark-required">
<input size="1" type="email" name="form_fields[email]" id="form-field-email" class="elementor-field elementor-size-md  elementor-field-textual" placeholder="your email" required="required" aria-required="true"></div>
<div class="elementor-field-group elementor-column elementor-field-type-submit elementor-col-25 e-form__buttons elementor-sm-50">
<button type="submit" class="elementor-button elementor-size-md">
<span>
<span class=" elementor-button-icon">
</span>
<span class="elementor-button-text">Subscribe</span>
</span>
</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<div class="elementor-element elementor-element-af0ef10 elementor-column elementor-col-50 elementor-inner-column" data-id="af0ef10" data-element_type="column">
<div class="elementor-column-wrap  elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-70658ca elementor-widget-mobile__width-initial elementor-absolute elementor-widget elementor-widget-image" data-id="70658ca" data-element_type="widget" data-settings='{"_position":"absolute"}' data-widget_type="image.default">
<div class="elementor-widget-container">
<div class="elementor-image">
<img width="249" height="295" src="images/05-image-footer-249x295.png" class="attachment-full size-full" alt=""></div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section></div>
</div>
</div>
</div>
</div>
</section> -->
<!-- <section class="elementor-element elementor-element-d61cd6b elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-id="d61cd6b" data-element_type="section" data-settings='{"stretch_section":"section-stretched","background_background":"classic"}'><div class="elementor-container elementor-column-gap-no">
<div class="elementor-row">
<div class="elementor-element elementor-element-73b31ee elementor-column elementor-col-20 elementor-top-column" data-id="73b31ee" data-element_type="column">
<div class="elementor-column-wrap  elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-9dca91c elementor-widget elementor-widget-heading" data-id="9dca91c" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h2 class="elementor-heading-title elementor-size-default">contact us</h2> </div>
</div>
<div class="elementor-element elementor-element-681b3ad elementor-widget elementor-widget-text-editor" data-id="681b3ad" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<div class="elementor-text-editor elementor-clearfix"><p>If you have any question, please<br>contact us at <span style="color: #000000;"><a href="email-protection.html" class="__cf_email__" data-cfemail="b4c7c1c4c4dbc6c0f4d1ccd5d9c4d8d19ad7dbd9">[email&nbsp;protected]</a></span></p></div>
</div>
</div>
<div class="elementor-element elementor-element-5d7af8c elementor-view-stacked elementor-position-left elementor-shape-circle elementor-vertical-align-top elementor-widget elementor-widget-icon-box" data-id="5d7af8c" data-element_type="widget" data-widget_type="icon-box.default">
<div class="elementor-widget-container">
<div class="elementor-icon-box-wrapper">
<div class="elementor-icon-box-icon">
<span class="elementor-icon elementor-animation-">
<i aria-hidden="true" class="fas fa-phone-alt"></i> </span>
</div>
<div class="elementor-icon-box-content">
<h3 class="elementor-icon-box-title">
<span>+(844) 180-355-268</span>
</h3>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="elementor-element elementor-element-c4a9064 elementor-column elementor-col-20 elementor-top-column" data-id="c4a9064" data-element_type="column">
<div class="elementor-column-wrap  elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-2180627 elementor-widget elementor-widget-heading" data-id="2180627" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h2 class="elementor-heading-title elementor-size-default">location</h2> </div>
</div>
<div class="elementor-element elementor-element-54c9341 elementor-widget elementor-widget-text-editor" data-id="54c9341" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<div class="elementor-text-editor elementor-clearfix">Box 565, Charlestown, Nevis, West
Indies, Caribbean</div>
</div>
</div>
<div class="elementor-element elementor-element-b76979e elementor-widget elementor-widget-text-editor" data-id="b76979e" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<div class="elementor-text-editor elementor-clearfix"><p><span style="color: #000000;">Monday &ndash; Friday:</span> 8am &ndash; 4pm<br><span style="color: #000000;">Saturday:</span> 9am &ndash; 5pm</p></div>
</div>
</div>
</div>
</div>
</div>
<div class="elementor-element elementor-element-2cd7487 elementor-column elementor-col-20 elementor-top-column" data-id="2cd7487" data-element_type="column">
<div class="elementor-column-wrap  elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-57f3b6d elementor-widget elementor-widget-heading" data-id="57f3b6d" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h2 class="elementor-heading-title elementor-size-default">quick links</h2> </div>
</div>
<div class="elementor-element elementor-element-d196536 elementor-mobile-align-center elementor-icon-list--layout-traditional elementor-widget elementor-widget-icon-list" data-id="d196536" data-element_type="widget" data-widget_type="icon-list.default">
<div class="elementor-widget-container">
<ul class="elementor-icon-list-items"><li class="elementor-icon-list-item">
<a href="#"> <span class="elementor-icon-list-text">Pricing Plans</span>
</a>
</li>
<li class="elementor-icon-list-item">
<a href="#"> <span class="elementor-icon-list-text">Our Services</span>
</a>
</li>
<li class="elementor-icon-list-item">
<a href="#"> <span class="elementor-icon-list-text"> About Us</span>
</a>
</li>
<li class="elementor-icon-list-item">
<a href="#"> <span class="elementor-icon-list-text">Contact Us </span>
</a>
</li>
<li class="elementor-icon-list-item">
<a href="#"> <span class="elementor-icon-list-text">Blog</span>
</a>
</li>
</ul></div>
</div>
</div>
</div>
</div>
<div class="elementor-element elementor-element-abbea0e elementor-column elementor-col-20 elementor-top-column" data-id="abbea0e" data-element_type="column">
<div class="elementor-column-wrap  elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-722b979 elementor-widget elementor-widget-heading" data-id="722b979" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h2 class="elementor-heading-title elementor-size-default">Discover</h2> </div>
</div>
<div class="elementor-element elementor-element-6613742 elementor-mobile-align-center elementor-icon-list--layout-traditional elementor-widget elementor-widget-icon-list" data-id="6613742" data-element_type="widget" data-widget_type="icon-list.default">
<div class="elementor-widget-container">
<ul class="elementor-icon-list-items"><li class="elementor-icon-list-item">
<a href="#"> <span class="elementor-icon-list-text">Chicago</span>
</a>
</li>
<li class="elementor-icon-list-item">
<a href="#"> <span class="elementor-icon-list-text">Los Angeles</span>
</a>
</li>
<li class="elementor-icon-list-item">
<a href="#"> <span class="elementor-icon-list-text">Miami</span>
</a>
</li>
<li class="elementor-icon-list-item">
<a href="#"> <span class="elementor-icon-list-text">New York </span>
</a>
</li>
<li class="elementor-icon-list-item">
<a href="#"> <span class="elementor-icon-list-text">Las Vegas</span>
</a>
</li>
</ul></div>
</div>
</div>
</div>
</div>
<div class="elementor-element elementor-element-fc0a602 elementor-column elementor-col-20 elementor-top-column" data-id="fc0a602" data-element_type="column">
<div class="elementor-column-wrap  elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-d18e8fb elementor-widget elementor-widget-heading" data-id="d18e8fb" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h2 class="elementor-heading-title elementor-size-default">Popular Searches</h2> </div>
</div>
<div class="elementor-element elementor-element-1d5a361 elementor-mobile-align-center elementor-icon-list--layout-traditional elementor-widget elementor-widget-icon-list" data-id="1d5a361" data-element_type="widget" data-widget_type="icon-list.default">
<div class="elementor-widget-container">
<ul class="elementor-icon-list-items"><li class="elementor-icon-list-item">
<a href="#"> <span class="elementor-icon-list-text">Apartment</span>
</a>
</li>
<li class="elementor-icon-list-item">
<a href="#"> <span class="elementor-icon-list-text">House</span>
</a>
</li>
<li class="elementor-icon-list-item">
<a href="#"> <span class="elementor-icon-list-text">Villa</span>
</a>
</li>
<li class="elementor-icon-list-item">
<a href="#"> <span class="elementor-icon-list-text">Offices</span>
</a>
</li>
<li class="elementor-icon-list-item">
<a href="#"> <span class="elementor-icon-list-text">Residence</span>
</a>
</li>
</ul></div>
</div>
</div>
</div>
</div>
</div>
</div>
</section><section class="elementor-element elementor-element-73854b2 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-id="73854b2" data-element_type="section" data-settings='{"stretch_section":"section-stretched","background_background":"classic"}'><div class="elementor-container elementor-column-gap-no">
<div class="elementor-row">
<div class="elementor-element elementor-element-f5e45b7 elementor-column elementor-col-50 elementor-top-column" data-id="f5e45b7" data-element_type="column">
<div class="elementor-column-wrap  elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-90720c2 elementor-widget elementor-widget-text-editor" data-id="90720c2" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<div class="elementor-text-editor elementor-clearfix">&copy; 2020 <a href="#">Rentex</a>. All Rights Reserved.</div>
</div>
</div>
</div>
</div>
</div>
<div class="elementor-element elementor-element-710b342 elementor-column elementor-col-50 elementor-top-column" data-id="710b342" data-element_type="column">
<div class="elementor-column-wrap  elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-3bcd89b elementor-widget elementor-widget-text-editor" data-id="3bcd89b" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<div class="elementor-text-editor elementor-clearfix"><p>Carefully crafted by <span style="color: #000000;"><a style="color: #000000;" href="#">OpalThemes</a></span></p></div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section></div>
</div>
</div>
</footer></div>
<div class="account-wrap" style="display: none;">
<div class="account-inner ">
<div class="login-form-head">
<span class="login-form-title">Sign in</span>
<span class="pull-right">
<a class="register-link" href="account.html" title="Register">Create an Account</a>
</span>
</div>
<form class="rentex-login-form-ajax" data-toggle="validator">
<p>
<label>Username or email <span class="required">*</span></label>
<input name="username" type="text" required placeholder="Username"></p>
<p>
<label>Password <span class="required">*</span></label>
<input name="password" type="password" required placeholder="Password"></p>
<button type="submit" data-button-action class="btn btn-primary btn-block w-100 mt-1">Login</button>
<input type="hidden" name="action" value="rentex_login"><input type="hidden" id="security-login" name="security-login" value="d8d1d16305"><input type="hidden" name="_wp_http_referer" value="/listing/neue-dimensionen-im-schragdach/?layout=4"></form>
<div class="login-form-bottom">
<a href="wp-login.php?action=lostpassword&amp;redirect_to=https%3A%2F%2Frentex.wpopal.html" class="lostpass-link" title="Lost your password?">Lost your password?</a>
</div>
</div>
</div>
<div class="rentex-mobile-nav">
<a href="#" class="mobile-nav-close"><i class="rentex-icon-times"></i></a>
<nav class="mobile-navigation" aria-label="Mobile Navigation"><div class="handheld-navigation"><ul id="menu-main-menu-1" class="menu"><li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-has-children menu-item-503"><a href="rentex.wpopal.html">Home</a>
<ul class="sub-menu"><li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-1987"><a href="rentex.wpopal.html">Home 1 &ndash; Default Search</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-505"><a href="home-2.html">Home 2 &ndash; Top Search</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-504"><a href="home-3.html">Home 3 &ndash; Bottom Search</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-879"><a href="home-4.html">Home 4 &ndash; Agents</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-886"><a href="home-5.html">Home 5 &ndash; Agency</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-885"><a href="home-6.html">Home 6 &ndash; Tab Search</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-880"><a href="home-7.html">Home 7 &ndash; Video</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-878"><a href="home-8.html">Home 8 &ndash; Map</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-877"><a href="home-9.html">Home 9 &ndash; Contact Form</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1548"><a href="home-10.html">Home 10 &ndash; Property Slider</a></li>
</ul></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2584"><a href="#">Listing</a>
<ul class="sub-menu"><li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1746"><a href="office.html">Grid View</a>
<ul class="sub-menu"><li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1748"><a href="?layout=ulisting_type_page_layout_3.html">Grid View &ndash; Style 01</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1990"><a href="buildings.html">Grid View &ndash; Style 02</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1620"><a href="villa.html">Grid View &ndash; Style 03</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1488"><a href="?layout=ulisting_type_page_layout_0.html">Grid View &ndash; Left Filter</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1489"><a href="?layout=ulisting_type_page_layout_1.html">Grid View &ndash; Right Filter</a></li>
</ul></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1629"><a href="apartment.html">List View</a>
<ul class="sub-menu"><li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1627"><a href="?layout=ulisting_type_page_layout_8.html">List view &ndash; Top Filter</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1532"><a href="?layout=ulisting_type_page_layout_6.html">List View &ndash; Left Filter</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1450"><a href="?layout=ulisting_type_page_layout_7.html">List View &ndash; Right Filter</a></li>
</ul></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1484"><a href="?layout=ulisting_type_page_layout_2.html">Map View</a>
<ul class="sub-menu"><li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1622"><a href="social-housing.html">Map View &ndash; Half Map 01</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1456"><a href="?layout=ulisting_type_page_layout_9.html">Map View &ndash; Half Map 02</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1623"><a href="?layout=ulisting_type_page_layout_5.html">Map View &ndash; Half Map 03</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1451"><a href="?layout=ulisting_type_page_layout_2.html">Map View &ndash; Full Map</a></li>
</ul></li>
</ul></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children menu-item-506"><a href="#">Property</a>
<ul class="sub-menu"><li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-507"><a href="neue-dimensionen-im-schragdach.html">Single Property v1</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-508"><a href="?layout=2.html">Single Property v2</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-509"><a href="?layout=3.html">Single Property v3</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item menu-item-510"><a href="?layout=4.html" aria-current="page">Single Property v4</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-511"><a href="?layout=5.html">Single Property v5</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-512"><a href="?layout=6.html">Single Property v6</a></li>
</ul></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2585"><a href="#">Agents</a>
<ul class="sub-menu"><li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1847"><a href="agents-grid.html">Agents Page</a>
<ul class="sub-menu"><li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1849"><a href="agents-grid.html">Agents &ndash; Grid</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1848"><a href="agents-list.html">Agents &ndash; List</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1853"><a href="leah-amidala.html">Agent Profile</a></li>
</ul></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1846"><a href="agency-list.html">Agency Page</a>
<ul class="sub-menu"><li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1850"><a href="agency-list.html">Agency &ndash; List</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1852"><a href="company-realty.html">Agency Profile</a></li>
</ul></li>
</ul></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page current_page_parent menu-item-has-children menu-item-699"><a href="blog.html">Blog</a>
<ul class="sub-menu"><li class="menu-item menu-item-type-post_type menu-item-object-page current_page_parent menu-item-1480"><a href="blog.html">Blog standard</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1471"><a href="?blog_type=style-1&amp;sidebar-blog=0.html">Blog grid</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1470"><a href="?blog_type=style-2.html">Blog modern</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1854"><a href="the-gifts-we-want-to-give-in-2018.html">Single Post</a></li>
</ul></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-612"><a href="#">Page</a>
<ul class="sub-menu"><li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2159"><a href="#">IDX Pages</a>
<ul class="sub-menu"><li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2166"><a href="ihomefinder-map-search.html">iHomeFinder &ndash; Map Search</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2164"><a href="ihomefinder-listing-list.html">iHomeFinder &ndash; Listing List</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2165"><a href="ihomefinder-listing-grid.html">iHomeFinder &ndash; Listing Grid</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2161"><a href="ihomefinder-slider.html">iHomeFinder &ndash; Slider</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2162"><a href="ihomefinder-sell-my-house-form.html">iHomeFinder &ndash; Sell my house form</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2163"><a href="ihomefinder-search-form.html">iHomeFinder &ndash; Search Form</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2160"><a href="ihomefinder-valuation.html">iHomeFinder &ndash; Valuation</a></li>
</ul></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-613"><a href="about-us.html">About us</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-75"><a href="pricing-plan.html">Pricing Plan</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-698"><a href="404.html">404 Page</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-614"><a href="contact-us.html">Contact Us</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2105"><a href="faqs.html">FAQ&rsquo;s</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-615"><a href="icons.html">Icons</a></li>
</ul></li>
</ul></div> </nav><div class="rentex-social">
<ul><li><a href="https://www.facebook.com/"></a></li>
</ul></div>
</div>
<div class="rentex-overlay"></div>
<script data-cfasync="false" src="js/cloudflare-static-email-decode.min.js"></script><script type="text/javascript"> var currentAjaxUrl = '/wp-admin/admin-ajax.php' </script><div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

<div class="pswp__bg"></div>

<div class="pswp__scroll-wrap">

<div class="pswp__container">
<div class="pswp__item"></div>
<div class="pswp__item"></div>
<div class="pswp__item"></div>
</div>

<div class="pswp__ui pswp__ui--hidden">
<div class="pswp__top-bar">

<div class="pswp__counter"></div>
<a class="pswp__button pswp__button--close" title="Close (Esc)" href="neue-dimensionen-im-schragdach.html"></a>
<a class="pswp__button pswp__button--share" title="Share" href="neue-dimensionen-im-schragdach.html"></a>
<a class="pswp__button pswp__button--fs" title="Toggle fullscreen" href="neue-dimensionen-im-schragdach.html"></a>
<a class="pswp__button pswp__button--zoom" title="Zoom in/out" href="neue-dimensionen-im-schragdach.html"></a>


<div class="pswp__preloader">
<div class="pswp__preloader__icn">
<div class="pswp__preloader__cut">
<div class="pswp__preloader__donut"></div>
</div>
</div>
</div>
</div>
<div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
<div class="pswp__share-tooltip"></div>
</div>
<a class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)" href="neue-dimensionen-im-schragdach.html">
</a>
<a class="pswp__button pswp__button--arrow--right" title="Next (arrow right)" href="neue-dimensionen-im-schragdach.html">
</a>
<div class="pswp__caption">
<div class="pswp__caption__center"></div>
</div>
</div>
</div>
</div> -->
<script>
				;(function ($, window, document, undefined ) {
					$(document).ready(function() {
						setTimeout(function() {
							
						var settings = {"id":4899,"editor":{"selected_shape":"poly-5580","tool":"poly","shapeCounter":{"polys":17}},"general":{"name":"FloorPlan1","shortcode":"floorplan1","width":790,"height":511,"naturalWidth":790,"naturalHeight":511},"image":{"url":"https:\/\/rentex.wpopal.com\/wp-content\/uploads\/2020\/05\/floorplans01.jpg"},"layers":{"layers_list":[{"id":0,"title":"Main Floor","image_url":"https:\/\/rentex.wpopal.com\/wp-content\/uploads\/2020\/05\/floorplans01.jpg","image_width":790,"image_height":511}]},"spots":[{"id":"poly-2254","title":"Master Bedroom","type":"poly","x":57.342,"y":13.16,"width":20.949,"height":29.746,"x_image_background":57.34177215189873,"y_image_background":13.160469667318983,"width_image_background":20.949367088607595,"height_image_background":29.74559686888454,"static":1,"default_style":{"background_color":"#e45151","background_opacity":0.37},"mouseover_style":{"background_opacity":0},"tooltip_style":{"padding":5,"background_opacity":0.9924479166666667,"offset_x":0.22151898734178133,"offset_y":1.761252446183951},"tooltip_content":{"squares_settings":{"containers":[{"id":"sq-container-591911","settings":{"elements":[{"settings":{"name":"Heading","iconClass":"fa fa-header"},"options":{"heading":{"text":"Master Bedroom"}}}]}}]}},"points":[{"x":0,"y":99.17763157894737},{"x":0,"y":8.552631578947368},{"x":54.68277945619335,"y":8.388157894736842},{"x":55.135951661631424,"y":0.6578947368421052},{"x":91.6918429003021,"y":0},{"x":91.6918429003021,"y":9.046052631578947},{"x":99.8489425981873,"y":9.210526315789473},{"x":100,"y":100}]},{"id":"poly-865","title":"Master Bathroom","type":"poly","x":62.405,"y":43.933,"width":21.203,"height":22.016,"x_image_background":62.405,"y_image_background":43.933,"width_image_background":21.203,"height_image_background":22.016,"default_style":{"background_color":"#00c2f8","background_opacity":0.35},"mouseover_style":{"background_opacity":0},"tooltip_style":{"padding":5,"offset_x":0.009825949367083808,"offset_y":2.3483365949119275},"tooltip_content":{"squares_settings":{"containers":[{"id":"sq-container-62221","settings":{"elements":[{"settings":{"name":"Heading","iconClass":"fa fa-header"},"options":{"heading":{"text":"Master bathroom"}}}]}}]}},"points":[{"x":0,"y":0},{"x":99.10388594694957,"y":0.888886123465401},{"x":100,"y":97.33441718181321},{"x":0,"y":97.33303051946065},{"x":0.0003582068167016112,"y":100}]},{"id":"poly-3859","title":"Bedroom 1","type":"poly","x":41.677,"y":66.341,"width":17.405,"height":23.483,"x_image_background":41.677,"y_image_background":66.341,"width_image_background":17.405,"height_image_background":23.483,"default_style":{"background_color":"#9078de","background_opacity":0.47},"mouseover_style":{"background_opacity":0},"tooltip_style":{"padding":5,"width":118,"offset_x":-0.10284810126582755,"offset_y":0.3424657534246478},"tooltip_content":{"squares_settings":{"containers":[{"id":"sq-container-617561","settings":{"elements":[{"settings":{"name":"Heading","iconClass":"fa fa-header"},"options":{"heading":{"text":"Bedroom 1"}}}]}}]}},"points":[{"x":0,"y":0},{"x":86.72727272727273,"y":0.20833333333333334},{"x":87.27272727272727,"y":45.416666666666664},{"x":99.81818181818181,"y":45},{"x":100,"y":67.91666666666667},{"x":87.63636363636364,"y":68.33333333333333},{"x":87.45454545454545,"y":86.875},{"x":65.27272727272727,"y":88.33333333333333},{"x":65.27272727272727,"y":100},{"x":21.818181818181817,"y":100},{"x":21.454545454545453,"y":87.91666666666667},{"x":0,"y":87.29166666666667}]},{"id":"poly-8327","title":"Bathroom 1","type":"poly","x":57.342,"y":66.536,"width":8.386,"height":15.802,"x_image_background":57.342,"y_image_background":66.536,"width_image_background":8.386,"height_image_background":15.802,"default_style":{"background_color":"#00c2f8","background_opacity":0.23},"mouseover_style":{"background_opacity":0},"tooltip_style":{"padding":5,"offset_x":0.009889240506332442,"offset_y":0.7338551859099738},"tooltip_content":{"squares_settings":{"containers":[{"id":"sq-container-22151","settings":{"elements":[{"settings":{"name":"Heading","iconClass":"fa fa-header"},"options":{"heading":{"text":"Bathroom 1"}}}]}}]}},"points":[{"x":0.7547169811320755,"y":58.82352941176471},{"x":0,"y":0.30959752321981426},{"x":100,"y":0},{"x":99.62264150943396,"y":98.76160990712074},{"x":27.92452830188679,"y":100},{"x":27.547169811320753,"y":59.44272445820433}]},{"id":"poly-7635","title":"Bedroom 2","type":"poly","x":16.551,"y":61.888,"width":15.348,"height":28.033,"x_image_background":16.551,"y_image_background":61.888,"width_image_background":15.348,"height_image_background":28.033,"default_style":{"background_color":"#9078de","background_opacity":0.33},"mouseover_style":{"background_opacity":0},"tooltip_style":{"padding":5,"offset_x":-0.05537974683544178,"offset_y":0.44031311154599706},"tooltip_content":{"squares_settings":{"containers":[{"id":"sq-container-757261","settings":{"elements":[{"settings":{"name":"Heading","iconClass":"fa fa-header"},"options":{"heading":{"text":"Bedroom 2"}}}]}}]}},"points":[{"x":0.4123711340206186,"y":89.3542757417103},{"x":0,"y":15.18324607329843},{"x":42.88659793814433,"y":14.834205933682373},{"x":43.09278350515464,"y":0},{"x":98.76288659793815,"y":0},{"x":100,"y":88.65619546247818},{"x":74.84536082474227,"y":89.52879581151832},{"x":74.63917525773196,"y":100},{"x":25.15463917525773,"y":100},{"x":24.948453608247423,"y":89.87783595113437}]},{"id":"poly-5643","title":"Bathroom 2","type":"poly","x":16.551,"y":45.793,"width":6.076,"height":19.423,"x_image_background":16.551,"y_image_background":45.793,"width_image_background":6.076,"height_image_background":19.423,"default_style":{"background_color":"#00c2f8","background_opacity":0.23},"mouseover_style":{"background_opacity":0},"tooltip_style":{"padding":5,"offset_x":-0.0059335443037973334,"offset_y":0.538160469667325},"tooltip_content":{"squares_settings":{"containers":[{"id":"sq-container-717511","settings":{"elements":[{"settings":{"name":"Heading","iconClass":"fa fa-header"},"options":{"heading":{"text":"Bathroom 2"}}}]}}]}},"points":[{"x":1.0416666666666665,"y":100},{"x":99.47916666666666,"y":99.49622166246851},{"x":100,"y":0},{"x":0,"y":0}]},{"id":"poly-6860","title":"laundry","type":"poly","x":23.165,"y":45.768,"width":8.56,"height":15.191,"x_image_background":23.165,"y_image_background":45.768,"width_image_background":8.56,"height_image_background":15.191,"default_style":{"background_color":"#2f6eb6"},"mouseover_style":{"background_opacity":0},"tooltip_style":{"padding":5},"tooltip_content":{"squares_settings":{"containers":[{"id":"sq-container-690391","settings":{"elements":[{"settings":{"name":"Heading","iconClass":"fa fa-header"},"options":{"heading":{"text":"Laundry"}}}]}}]}},"points":[{"x":0,"y":0},{"x":0,"y":100},{"x":100,"y":100},{"x":98.33641404805915,"y":0}]},{"id":"poly-2400","title":"Common area","type":"poly","x":32.12,"y":45.67,"width":21.519,"height":22.896,"x_image_background":32.12,"y_image_background":45.67,"width_image_background":21.519,"height_image_background":22.896,"default_style":{"background_color":"#68902a"},"mouseover_style":{"background_opacity":0},"tooltip_style":{"padding":5,"offset_x":-0.02373417721519644,"offset_y":0.4892367906066539},"tooltip_content":{"squares_settings":{"containers":[{"id":"sq-container-529191","settings":{"elements":[{"settings":{"name":"Heading","iconClass":"fa fa-header"},"options":{"heading":{"text":"Common Area"}}}]}}]}},"points":[{"x":0,"y":0},{"x":1.0294117647058822,"y":100},{"x":20,"y":99.78632478632478},{"x":20.294117647058822,"y":86.11111111111111},{"x":41.61764705882353,"y":85.47008547008546},{"x":41.47058823529412,"y":53.205128205128204},{"x":100,"y":52.991452991452995},{"x":99.8529411764706,"y":0.2136752136752137}]},{"id":"poly-6858","title":"Hall","type":"poly","x":41.171,"y":58.879,"width":20.728,"height":6.409,"x_image_background":41.171,"y_image_background":58.879,"default_style":{"background_color":"#f5a44a","background_opacity":0.38},"mouseover_style":{"background_opacity":0},"tooltip_style":{"padding":5,"offset_x":0.04549050632910934,"offset_y":0.6849315068493169},"tooltip_content":{"squares_settings":{"containers":[{"id":"sq-container-819541","settings":{"elements":[{"settings":{"name":"Heading","iconClass":"fa fa-header"},"options":{"heading":{"text":"Hall"}}}]}}]}},"points":[{"x":0.3053435114503817,"y":97.70992366412213},{"x":0,"y":0},{"x":100,"y":2.2900763358778624},{"x":99.84732824427482,"y":100}]},{"id":"poly-105","title":"Hall","type":"poly","x":54.335,"y":43.762,"width":7.468,"height":14.432,"x_image_background":54.335,"y_image_background":43.762,"width_image_background":7.468,"height_image_background":14.432,"default_style":{"background_color":"#f5a44a","background_opacity":0.56},"mouseover_style":{"background_opacity":0},"tooltip_style":{"padding":5,"offset_x":0.029667721518983114,"offset_y":0.587084148727989},"tooltip_content":{"squares_settings":{"containers":[{"id":"sq-container-415491","settings":{"elements":[{"settings":{"name":"Heading","iconClass":"fa fa-header"},"options":{"heading":{"text":"Hall"}}}]}}]}},"points":[{"x":0,"y":13.898305084745763},{"x":0,"y":99.66101694915255},{"x":99.57627118644068,"y":100},{"x":100,"y":0.6779661016949152},{"x":39.83050847457627,"y":0},{"x":39.40677966101695,"y":13.559322033898304}]},{"id":"poly-9791","title":"Hall","type":"poly","x":32.405,"y":66.389,"width":8.608,"height":11.448,"x_image_background":32.405,"y_image_background":66.389,"width_image_background":8.608,"height_image_background":11.448,"default_style":{"background_color":"#f5a44a","background_opacity":0.23},"mouseover_style":{"background_opacity":0},"tooltip_style":{"padding":5,"offset_x":0.6625791139240462,"offset_y":0.6360078277886458},"tooltip_content":{"squares_settings":{"containers":[{"id":"sq-container-691161","settings":{"elements":[{"settings":{"name":"Heading","iconClass":"fa fa-header"},"options":{"heading":{"text":"Hall"}}}]}}]}},"points":[{"x":0,"y":29.48717948717949},{"x":1.1029411764705883,"y":100},{"x":99.63235294117648,"y":99.14529914529915},{"x":100,"y":0},{"x":54.779411764705884,"y":0.4273504273504274},{"x":54.779411764705884,"y":29.059829059829063}]},{"id":"poly-5580","title":"Balcony","type":"poly","x":57.12,"y":3.229,"width":11.202,"height":11.448,"x_image_background":57.12,"y_image_background":3.229,"width_image_background":11.202,"height_image_background":11.448,"default_style":{"background_color":"#b1dc6f"},"mouseover_style":{"background_opacity":0,"stroke_opacity":0.68},"tooltip_style":{"padding":5,"offset_x":0.07369936708860791,"offset_y":2.5470518590998035},"tooltip_content":{"squares_settings":{"containers":[{"id":"sq-container-781711","settings":{"elements":[{"settings":{"name":"Heading","iconClass":"fa fa-header"},"options":{"heading":{"text":"Balcony"}}}]}}]}},"points":[{"x":0.28409090909089163,"y":100},{"x":0,"y":0},{"x":100,"y":0.8658008658008661},{"x":98.86784624498863,"y":99.56222149618377}]}]};
$('#image-map-pro-4899').imageMapPro(settings);
						}, 0);
					});
				})(jQuery, window, document);
				</script><script>
				;(function ($, window, document, undefined ) {
					$(document).ready(function() {
						setTimeout(function() {
							
						var settings = {"id":9318,"editor":{"previewMode":1,"selected_shape":"poly-2383","tool":"text","shapeCounter":{"polys":17}},"general":{"name":"FloorPlan2","shortcode":"FloorPlan2","width":790,"height":559,"naturalWidth":790,"naturalHeight":559},"image":{"url":"https:\/\/rentex.wpopal.com\/wp-content\/uploads\/2020\/05\/floorplans02.jpg"},"layers":{"layers_list":[{"id":0,"title":"Main Floor","image_url":"https:\/\/rentex.wpopal.com\/wp-content\/uploads\/2020\/05\/floorplans02.jpg","image_width":790,"image_height":559}]},"spots":[{"id":"poly-7012","title":"Bedroom","type":"poly","x":8.987,"y":16.1,"width":19.715,"height":21.914,"x_image_background":8.987,"y_image_background":16.1,"width_image_background":19.715,"height_image_background":21.914,"default_style":{"background_color":"#e45151"},"tooltip_style":{"padding":5,"offset_x":0.002966772151900443,"offset_y":0.4919499105545615},"tooltip_content":{"squares_settings":{"containers":[{"id":"sq-container-27261","settings":{"elements":[{"settings":{"name":"Heading","iconClass":"fa fa-header"},"options":{"heading":{"text":"Bedroom"}}}]}}]}},"points":[{"x":0.16051364365971107,"y":0},{"x":99.67897271268058,"y":0.40816326530612246},{"x":100,"y":100},{"x":0,"y":100}]},{"id":"poly-8063","title":"Bath","type":"poly","x":8.987,"y":39.222,"width":11.994,"height":12.88,"x_image_background":8.987,"y_image_background":39.222,"width_image_background":11.994,"height_image_background":12.88,"default_style":{"background_color":"#00c2f8","background_opacity":0.44},"tooltip_style":{"padding":5,"offset_x":0.008900316455694224,"offset_y":0.581395348837205},"tooltip_content":{"squares_settings":{"containers":[{"id":"sq-container-610621","settings":{"elements":[{"settings":{"name":"Heading","iconClass":"fa fa-header"},"options":{"heading":{"text":"Bathroom"}}}]}}]}},"points":[{"x":0.2638522427440633,"y":0},{"x":71.76781002638522,"y":0},{"x":71.76781002638522,"y":44.79166666666667},{"x":60.4221635883905,"y":46.18055555555556},{"x":60.94986807387863,"y":53.81944444444444},{"x":99.73614775725594,"y":53.47222222222222},{"x":100,"y":98.95833333333334},{"x":0,"y":100}]},{"id":"poly-4367","title":"Water Closet","type":"poly","x":21.677,"y":46.221,"width":10,"height":5.814,"x_image_background":21.677,"y_image_background":46.221,"width_image_background":10,"height_image_background":5.814,"default_style":{"background_color":"#00c2f8","background_opacity":0.3},"tooltip_style":{"padding":5,"offset_x":-0.003214003164551116,"offset_y":0.22361359570661676},"tooltip_content":{"squares_settings":{"containers":[{"id":"sq-container-427231","settings":{"elements":[{"settings":{"name":"Heading","iconClass":"fa fa-header"},"options":{"heading":{"text":"Water Closet"}}}]}}]}},"points":[{"x":0.15822784810126583,"y":0},{"x":99.84177215189874,"y":0},{"x":100,"y":98.84615384615385},{"x":0,"y":100}]},{"id":"poly-10","title":"Hall","type":"poly","x":18.386,"y":39.155,"width":14.335,"height":5.926,"x_image_background":18.386,"y_image_background":39.155,"width_image_background":14.335,"height_image_background":5.926,"default_style":{"background_color":"#f5a44a","background_opacity":0.37},"tooltip_style":{"padding":5,"offset_x":-0.01681170886076444,"offset_y":0.35778175313058824},"tooltip_content":{"squares_settings":{"containers":[{"id":"sq-container-975581","settings":{"elements":[{"settings":{"name":"Heading","iconClass":"fa fa-header"},"options":{"heading":{"text":"Hall"}}}]}}]}},"points":[{"x":0.22075055187637466,"y":1.1320754716981136},{"x":100,"y":0},{"x":99.88644591611477,"y":100},{"x":0,"y":99.62264150943389}]},{"id":"poly-3688","title":"Room","type":"poly","x":76.313,"y":38.64,"width":13.908,"height":12.88,"x_image_background":76.313,"y_image_background":38.64,"width_image_background":13.908,"height_image_background":12.88,"default_style":{"background_color":"#9078de"},"tooltip_style":{"padding":5},"tooltip_content":{"squares_settings":{"containers":[{"id":"sq-container-678521","settings":{"elements":[{"settings":{"name":"Heading","iconClass":"fa fa-header"},"options":{"heading":{"text":"Room"}}}]}}]}},"points":[{"x":5.688282138794084,"y":0.3472222222222222},{"x":100,"y":0},{"x":99.77246871444824,"y":100},{"x":5.688282138794084,"y":99.82638888888889},{"x":5.233219567690557,"y":72.04861111111111},{"x":0.11376564277588168,"y":72.04861111111111},{"x":0,"y":29.51388888888889},{"x":5.802047781569966,"y":29.34027777777778}]},{"id":"poly-2107","title":"Living room","type":"poly","x":29.383,"y":5.97,"width":28.671,"height":31.663,"x_image_background":29.383,"y_image_background":5.97,"width_image_background":28.671,"height_image_background":31.753,"default_style":{"background_color":"#68902a"},"tooltip_style":{"padding":5,"offset_x":-0.07530379746835081,"offset_y":1.0738282647584978},"tooltip_content":{"squares_settings":{"containers":[{"id":"sq-container-21781","settings":{"elements":[{"settings":{"name":"Heading","iconClass":"fa fa-header"},"options":{"heading":{"text":"Living room"}}}]}}]}},"points":[{"x":0,"y":100},{"x":0,"y":3.418803418803417},{"x":13.024282560706393,"y":3.133903133903135},{"x":12.803532008830027,"y":0},{"x":84.54746136865343,"y":0.28490028490028546},{"x":84.54746136865343,"y":3.418803418803417},{"x":98.45474613686531,"y":3.418803418803417},{"x":98.6754966887417,"y":8.547008547008545},{"x":99.77924944812361,"y":8.831908831908834},{"x":100,"y":76.92307692307692},{"x":98.45474613686531,"y":77.2079772079772},{"x":98.67651301439646,"y":99.71956796508805}]},{"id":"poly-8800","title":"Kitchen","type":"poly","x":58.038,"y":3.175,"width":32.184,"height":35.644,"x_image_background":58.038,"y_image_background":3.175,"default_style":{"background_color":"#c63710"},"tooltip_style":{"padding":5,"offset_x":4.068433544303801,"offset_y":3.935599284436495},"tooltip_content":{"squares_settings":{"containers":[{"id":"sq-container-289481","settings":{"elements":[{"settings":{"name":"Heading","iconClass":"fa fa-header"},"options":{"heading":{"text":"Kitchen"}}}]}}]}},"points":[{"x":1.27826941986234,"y":96.61229611041405},{"x":1.1799410029498525,"y":76.03513174404016},{"x":0.09832841691248771,"y":75.90966122961103},{"x":0,"y":15.934755332496863},{"x":1.0816125860373649,"y":15.809284818067754},{"x":1.1799410029498525,"y":11.668757841907151},{"x":7.964601769911504,"y":11.668757841907151},{"x":17.305801376597838,"y":0.2509410288582183},{"x":28.220255653883974,"y":0},{"x":36.97148475909538,"y":11.417816813048933},{"x":58.30875122910521,"y":11.417816813048933},{"x":58.4070796460177,"y":5.269761606022585},{"x":81.41592920353983,"y":5.144291091593475},{"x":81.41592920353983,"y":11.543287327478042},{"x":99.90167158308752,"y":11.668757841907151},{"x":100,"y":96.61229611041405},{"x":26.94198623402163,"y":96.86323713927227},{"x":26.843657817109147,"y":100},{"x":12.684365781710916,"y":99.87452948557089},{"x":12.782694198623402,"y":96.86323713927227}]},{"id":"poly-2004","title":"Office","type":"poly","x":62.231,"y":60.264,"width":10,"height":18.157,"x_image_background":62.231,"y_image_background":60.264,"width_image_background":10,"height_image_background":18.157,"default_style":{"background_color":"#2f6eb6"},"tooltip_style":{"padding":5,"offset_x":-1.824564873417728,"offset_y":0.5366726296958788},"tooltip_content":{"squares_settings":{"containers":[{"id":"sq-container-878341","settings":{"elements":[{"settings":{"name":"Heading","iconClass":"fa fa-header"},"options":{"heading":{"text":"Office"}}}]}}]}},"points":[{"x":0.31645569620253167,"y":99.75369458128078},{"x":99.68354430379746,"y":100},{"x":100,"y":5.911330049261084},{"x":41.45569620253164,"y":5.665024630541872},{"x":40.50632911392405,"y":0},{"x":4.430379746835443,"y":0},{"x":4.430379746835443,"y":5.172413793103448},{"x":0,"y":5.665024630541872}]},{"id":"poly-271","title":"Formal Dining","type":"poly","x":43.133,"y":53.309,"width":19.051,"height":30.277,"x_image_background":43.133,"y_image_background":53.309,"width_image_background":19.051,"height_image_background":30.277,"default_style":{"background_color":"#c63710","background_opacity":0.23},"tooltip_style":{"padding":5,"offset_x":0.04514161392404503,"offset_y":0.4472271914132193},"tooltip_content":{"squares_settings":{"containers":[{"id":"sq-container-477851","settings":{"elements":[{"settings":{"name":"Heading","iconClass":"fa fa-header"},"options":{"heading":{"text":"Formal Dining"}}}]}}]}},"points":[{"x":96.34557079858574,"y":99.9996395877096},{"x":96.51168121683192,"y":19.64542402535506},{"x":98.17278539929288,"y":19.202294160121486},{"x":99.8335573609174,"y":19.79166278928033},{"x":100,"y":2.363359281245731},{"x":96.8439020533241,"y":2.2156493261678656},{"x":96.01334996209354,"y":0},{"x":0.4998594705861696,"y":0.44312986523357306},{"x":0,"y":83.45740083300136},{"x":7.972967854976264,"y":82.86472940924703},{"x":8.475352203919808,"y":83.30821968677103},{"x":8.305188691468455,"y":100}]},{"id":"poly-7095","title":"Entryway","type":"poly","x":32.473,"y":37.567,"width":10.723,"height":41.86,"x_image_background":32.473,"y_image_background":37.567,"width_image_background":10.723,"height_image_background":41.86,"default_style":{"background_color":"#68902a","background_opacity":0.6},"tooltip_style":{"padding":5,"offset_x":0.01275232374747759,"offset_y":1.3416815742397148},"tooltip_content":{"squares_settings":{"containers":[{"id":"sq-container-466681","settings":{"elements":[{"settings":{"name":"Heading","iconClass":"fa fa-header"},"options":{"heading":{"text":"Entryway"}}}]}}]}},"points":[{"x":1.428687935642827,"y":97.22328632478633},{"x":30.94458496785656,"y":97.43589743589743},{"x":31.534848604246275,"y":99.78632478632481},{"x":71.08251224235805,"y":100},{"x":72.26303951513748,"y":97.43589743589743},{"x":98.82490315267528,"y":97.64983333333332},{"x":100,"y":34.4017094017094},{"x":99.415166789065,"y":22.008547008547},{"x":98.82490315267528,"y":19.01709401709402},{"x":98.82490315267528,"y":0},{"x":2.6119304211496788,"y":0.21367521367520814},{"x":2.3851318847975165,"y":17.7402027840301},{"x":0,"y":18.800798095299644}]},{"id":"poly-4862","title":"Den","type":"poly","x":6.424,"y":53.131,"width":26.234,"height":30.456,"x_image_background":6.424,"y_image_background":53.131,"width_image_background":26.234,"height_image_background":30.456,"default_style":{"background_color":"#e1e1d8","background_opacity":0.47},"tooltip_style":{"padding":5},"tooltip_content":{"squares_settings":{"containers":[{"id":"sq-container-48771","settings":{"elements":[{"settings":{"name":"Heading","iconClass":"fa fa-header"},"options":{"heading":{"text":"Den"}}}]}}]}},"points":[{"x":30.156815440289503,"y":100},{"x":93.36550060313631,"y":100},{"x":93.24487334137515,"y":83.11306901615272},{"x":100,"y":83.11306901615272},{"x":99.03498190591074,"y":0.2936857562408223},{"x":9.650180940892641,"y":0},{"x":9.7708082026538,"y":22.3201174743025},{"x":0,"y":22.760646108663728},{"x":0,"y":62.55506607929515},{"x":9.408926417370326,"y":62.55506607929515},{"x":10.012062726176115,"y":82.96622613803231},{"x":29.794933655006034,"y":83.40675477239354}]},{"id":"poly-589","title":"Stairway","type":"poly","x":43.165,"y":38.551,"width":14.494,"height":13.865,"x_image_background":43.165,"y_image_background":38.551,"width_image_background":14.494,"height_image_background":13.865,"tooltip_style":{"padding":5,"offset_x":-0.03581012658227678,"offset_y":1.1618385509838944},"tooltip_content":{"squares_settings":{"containers":[{"id":"sq-container-489241","settings":{"elements":[{"settings":{"name":"Heading","iconClass":"fa fa-header"},"options":{"heading":{"text":"Stairway"}}}]}}]}},"points":[{"x":0.43580291228137014,"y":95.48326454038609},{"x":4.80256556039104,"y":95.48326454038609},{"x":5.675918090012953,"y":100},{"x":100,"y":99.34765190037558},{"x":99.99799128918184,"y":0.6483482596180301},{"x":0,"y":0}]},{"id":"poly-8596","title":"Warehouse","type":"poly","x":67.104,"y":50.648,"width":9.335,"height":9.571,"x_image_background":67.104,"y_image_background":50.648,"width_image_background":9.335,"height_image_background":9.571,"default_style":{"background_color":"#865d2f"},"tooltip_style":{"padding":5,"offset_x":-0.16688093354430578,"offset_y":0.31270963774597504},"tooltip_content":{"squares_settings":{"containers":[{"id":"sq-container-820901","settings":{"elements":[{"settings":{"name":"Heading","iconClass":"fa fa-header"},"options":{"heading":{"text":"Warehouse"}}}]}}]}},"points":[{"x":8.305084745762711,"y":100},{"x":100,"y":100},{"x":100,"y":20.794392523364486},{"x":52.88135593220339,"y":20.5607476635514},{"x":53.050847457627114,"y":0.23364485981308408},{"x":8.305084745762711,"y":0},{"x":8.135593220338983,"y":24.53271028037383},{"x":0,"y":24.53271028037383},{"x":0.3389830508474576,"y":70.32710280373831},{"x":8.135593220338983,"y":69.85981308411215}]},{"id":"poly-2383","title":"Hall","type":"poly","x":58.354,"y":38.64,"width":18.038,"height":21.556,"x_image_background":58.354,"y_image_background":38.64,"default_style":{"background_color":"#f5a44a","background_opacity":0.37},"tooltip_style":{"padding":5},"tooltip_content":{"squares_settings":{"containers":[{"id":"sq-container-127471","settings":{"elements":[{"settings":{"name":"Heading","iconClass":"fa fa-header"},"options":{"heading":{"text":"Hall"}}}]}}]}},"points":[{"x":21.403508771929825,"y":100},{"x":48.59649122807018,"y":100},{"x":48.771929824561404,"y":51.037344398340245},{"x":100,"y":51.45228215767634},{"x":99.47368421052632,"y":0.2074688796680498},{"x":0.3508771929824561,"y":0},{"x":0,"y":62.863070539419084},{"x":21.052631578947366,"y":63.27800829875518}]}]};
$('#image-map-pro-9318').imageMapPro(settings);
						}, 0);
					});
				})(jQuery, window, document);
				</script><script>
				;(function ($, window, document, undefined ) {
					$(document).ready(function() {
						setTimeout(function() {
							
						var settings = {"id":8697,"editor":{"previewMode":1,"selected_shape":"poly-7568","tool":"poly","shapeCounter":{"polys":14}},"general":{"name":"FloorPlan3","shortcode":"FloorPlan3","width":790,"height":559,"naturalWidth":790,"naturalHeight":559},"image":{"url":"https:\/\/rentex.wpopal.com\/wp-content\/uploads\/2020\/05\/floorplans03.jpg"},"spots":[{"id":"poly-5247","title":"Bedroom","type":"poly","x":44.43,"y":45.975,"width":19.399,"height":35.107,"x_image_background":44.43,"y_image_background":45.975,"default_style":{"background_color":"#e45151"},"tooltip_style":{"padding":5},"tooltip_content":{"squares_settings":{"containers":[{"id":"sq-container-975811","settings":{"elements":[{"settings":{"name":"Heading","iconClass":"fa fa-header"},"options":{"heading":{"text":"bedroom"}}}]}}]}},"points":[{"x":0.1631321370309951,"y":95.6687898089172},{"x":2.7732463295269167,"y":95.92356687898089},{"x":2.936378466557912,"y":99.87261146496816},{"x":92.33278955954323,"y":100},{"x":92.82218597063621,"y":95.92356687898089},{"x":94.61663947797716,"y":95.6687898089172},{"x":95.26916802610114,"y":94.01273885350318},{"x":100,"y":94.14012738853503},{"x":100,"y":41.783439490445865},{"x":95.59543230016313,"y":41.65605095541402},{"x":95.10603588907016,"y":38.21656050955414},{"x":63.94779771615008,"y":37.961783439490446},{"x":63.1321370309951,"y":20.764331210191084},{"x":66.557911908646,"y":20.891719745222932},{"x":66.88417618270799,"y":8.535031847133757},{"x":62.96900489396411,"y":7.006369426751593},{"x":62.47960848287113,"y":0.12738853503184713},{"x":1.631321370309951,"y":0},{"x":0,"y":7.515923566878981}]},{"id":"poly-9793","title":"Bedroom","type":"poly","x":32.31,"y":52.281,"width":11.519,"height":23.435,"x_image_background":32.31,"y_image_background":52.281,"width_image_background":11.519,"height_image_background":23.435,"default_style":{"background_color":"#9078de","background_opacity":0.38},"tooltip_style":{"padding":5},"tooltip_content":{"squares_settings":{"containers":[{"id":"sq-container-342761","settings":{"elements":[{"settings":{"name":"Heading","iconClass":"fa fa-header"},"options":{"heading":{"text":"Bedroom"}}}]}}]}},"points":[{"x":4.1208791208791204,"y":99.61832061068702},{"x":95.32967032967034,"y":100},{"x":94.78021978021978,"y":93.89312977099237},{"x":100,"y":93.32061068702289},{"x":99.72527472527473,"y":3.6259541984732824},{"x":92.3076923076923,"y":2.8625954198473282},{"x":93.13186813186813,"y":0},{"x":65.38461538461539,"y":0},{"x":65.10989010989012,"y":4.961832061068702},{"x":2.197802197802198,"y":4.007633587786259},{"x":1.9230769230769231,"y":29.580152671755727},{"x":0.27472527472527475,"y":29.580152671755727},{"x":0,"y":87.40458015267176},{"x":2.197802197802198,"y":87.78625954198473},{"x":1.9230769230769231,"y":93.89312977099237},{"x":3.8461538461538463,"y":94.27480916030534}]},{"id":"poly-5505","title":"Bathroom","type":"poly","x":63.133,"y":33.542,"width":7.722,"height":18.47,"x_image_background":63.133,"y_image_background":33.542,"width_image_background":7.722,"height_image_background":18.47,"default_style":{"background_color":"#00c2f8"},"tooltip_style":{"padding":5,"offset_x":-0.011372626582286216,"offset_y":0.5366726296958895},"tooltip_content":{"squares_settings":{"containers":[{"id":"sq-container-866881","settings":{"elements":[{"settings":{"name":"Heading","iconClass":"fa fa-header"},"options":{"heading":{"text":"Bathroom"}}}]}}]}},"points":[{"x":0.8196721311475228,"y":95.15738498789347},{"x":56.55737704918037,"y":95.15497336561741},{"x":57.78688524590165,"y":99.75786924939466},{"x":95.08196721311486,"y":100},{"x":95.49180327868862,"y":95.15738498789347},{"x":100,"y":94.67312348668278},{"x":100,"y":0.4842615012106414},{"x":0,"y":0}]},{"id":"poly-2323","title":"Bathroom","type":"poly","x":26.582,"y":63.663,"width":5.396,"height":10.577,"x_image_background":26.582,"y_image_background":63.663,"width_image_background":5.396,"height_image_background":10.577,"default_style":{"background_color":"#00c2f8"},"tooltip_style":{"padding":5,"offset_x":0.01804786392405333,"offset_y":0.26833631484793585},"tooltip_content":{"squares_settings":{"containers":[{"id":"sq-container-463301","settings":{"elements":[{"settings":{"name":"Heading","iconClass":"fa fa-header"},"options":{"heading":{"text":"Bathroom"}}}]}}]}},"points":[{"x":0.5865102639296188,"y":100},{"x":99.70674486803519,"y":99.36575052854123},{"x":100,"y":8.668076109936575},{"x":55.718475073313776,"y":8.456659619450317},{"x":55.718475073313776,"y":0},{"x":5.278592375366569,"y":0.21141649048625794},{"x":4.69208211143695,"y":8.24524312896406},{"x":0,"y":8.24524312896406}]},{"id":"poly-5411","title":"Office","type":"poly","x":71.392,"y":44.678,"width":16.709,"height":15.34,"default_style":{"background_color":"#68902a"},"tooltip_style":{"padding":5,"offset_x":0.40644778481014043,"offset_y":1.43112701252236},"tooltip_content":{"squares_settings":{"containers":[{"id":"sq-container-470091","settings":{"elements":[{"settings":{"name":"Heading","iconClass":"fa fa-header"},"options":{"heading":{"text":"Office"}}}]}}]}},"points":[{"x":3.2196969696969697,"y":100},{"x":97.1590909090909,"y":99.12536443148689},{"x":97.1590909090909,"y":90.0874635568513},{"x":100,"y":89.79591836734694},{"x":99.62121212121212,"y":6.122448979591836},{"x":23.484848484848484,"y":6.122448979591836},{"x":23.674242424242426,"y":0},{"x":3.787878787878788,"y":0},{"x":3.977272727272727,"y":5.247813411078718},{"x":0,"y":6.122448979591836},{"x":0.1893939393939394,"y":84.8396501457726},{"x":0.1893939393939394,"y":89.50437317784257},{"x":3.0303030303030303,"y":90.0874635568513}]},{"id":"poly-6301","title":"Cinema","type":"poly","x":70.823,"y":20.125,"width":17.247,"height":24.508,"default_style":{"background_color":"2f6eb6"},"tooltip_style":{"padding":5},"tooltip_content":{"squares_settings":{"containers":[{"id":"sq-container-263601","settings":{"elements":[{"settings":{"name":"Heading","iconClass":"fa fa-header"},"options":{"heading":{"text":"Cinema"}}}]}}]}},"points":[{"x":3.669371263747749,"y":100},{"x":100,"y":99.81751824817519},{"x":100,"y":0},{"x":4.036345087504892,"y":0.5474452554744531},{"x":3.669371263747749,"y":1.642335766423359},{"x":0,"y":1.8248175182481723},{"x":0.18311993805480842,"y":17.518248175182485},{"x":3.8528581756263205,"y":17.7007299270073}]},{"id":"poly-5391","title":"Storage","type":"poly","x":63.133,"y":20.125,"width":7.722,"height":12.59,"default_style":{"background_color":"#865d2f","background_opacity":0.21},"tooltip_style":{"padding":5,"offset_x":-0.008317246835432002,"offset_y":0.2906135957066205},"tooltip_content":{"squares_settings":{"containers":[{"id":"sq-container-72711","settings":{"elements":[{"settings":{"name":"Heading","iconClass":"fa fa-header"},"options":{"heading":{"text":"Storage"}}}]}}]}},"points":[{"x":0,"y":100},{"x":100,"y":99.9920569602626},{"x":99.78903091918278,"y":0},{"x":0.004589847912074657,"y":0.17694932710092318}]},{"id":"poly-3086","title":"Storage","type":"poly","x":9.557,"y":46.02,"width":16.392,"height":29.741,"default_style":{"background_color":"#865d2f","background_opacity":0.52},"tooltip_style":{"padding":5},"tooltip_content":{"squares_settings":{"containers":[{"id":"sq-container-985301","settings":{"elements":[{"settings":{"name":"Heading","iconClass":"fa fa-header"},"options":{"heading":{"text":"Storage"}}}]}}]}},"points":[{"x":0.3861003861003861,"y":94.73684210526315},{"x":4.440154440154441,"y":95.03759398496241},{"x":4.826254826254826,"y":99.84962406015038},{"x":25.868725868725868,"y":100},{"x":26.061776061776058,"y":94.73684210526315},{"x":31.08108108108108,"y":95.03759398496241},{"x":31.27413127413127,"y":40},{"x":99.8069498069498,"y":39.849624060150376},{"x":100,"y":0.15037593984962408},{"x":0,"y":0}]},{"id":"poly-8821","title":"Storage","type":"poly","x":26.582,"y":39.177,"width":12.468,"height":14.132,"default_style":{"background_color":"#865d2f","background_opacity":0.21},"tooltip_style":{"padding":5,"offset_x":0.014833860759502215,"offset_y":0.581395348837205},"tooltip_content":{"squares_settings":{"containers":[{"id":"sq-container-268321","settings":{"elements":[{"settings":{"name":"Heading","iconClass":"fa fa-header"},"options":{"heading":{"text":"Storage"}}}]}}]}},"points":[{"x":95.17766497461928,"y":0},{"x":0.2538071065989791,"y":0.3164556962025487},{"x":0,"y":93.03797468354433},{"x":5.329949238578674,"y":93.35443037974683},{"x":5.329949238578674,"y":100},{"x":29.695431472081236,"y":100},{"x":29.187817258883246,"y":92.72151898734178},{"x":95.43147208121832,"y":92.40506329113929},{"x":94.9238578680203,"y":87.9746835443038},{"x":99.74619289340102,"y":88.29113924050635},{"x":100,"y":58.86075949367089},{"x":94.92152284263963,"y":57.594164556962056}]},{"id":"poly-2054","title":"Storage","type":"poly","x":15.285,"y":53.22,"width":16.677,"height":22.54,"default_style":{"background_color":"#865d2f"},"tooltip_style":{"padding":5},"tooltip_content":{"squares_settings":{"containers":[{"id":"sq-container-196251","settings":{"elements":[{"settings":{"name":"Heading","iconClass":"fa fa-header"},"options":{"heading":{"text":"Storage"}}}]}}]}},"points":[{"x":0.3795066413662239,"y":25.198412698412696},{"x":0,"y":93.45238095238095},{"x":0.7590132827324478,"y":99.8015873015873},{"x":40.03795066413662,"y":99.60317460317461},{"x":40.22770398481973,"y":93.65079365079364},{"x":42.50474383301708,"y":93.65079365079364},{"x":42.50474383301708,"y":99.8015873015873},{"x":58.06451612903226,"y":100},{"x":58.82352941176471,"y":93.45238095238095},{"x":63.946869070208734,"y":93.45238095238095},{"x":64.13662239089184,"y":46.230158730158735},{"x":100,"y":46.03174603174603},{"x":100,"y":0},{"x":67.74193548387096,"y":0.1984126984126984},{"x":67.74193548387096,"y":24.801587301587304}]},{"id":"poly-2779","title":"Terrace","type":"poly","x":63.924,"y":59.973,"width":24.968,"height":23.837,"default_style":{"background_color":"#82c31f"},"tooltip_style":{"padding":5},"tooltip_content":{"squares_settings":{"containers":[{"id":"sq-container-494141","settings":{"elements":[{"settings":{"name":"Heading","iconClass":"fa fa-header"},"options":{"heading":{"text":"terrace"}}}]}}]}},"points":[{"x":0,"y":100},{"x":100,"y":100},{"x":99.74651457541192,"y":0.37523452157598497},{"x":0,"y":0}]},{"id":"poly-1010","title":"Common","type":"poly","x":38.987,"y":33.721,"width":32.468,"height":24.776,"default_style":{"background_color":"#f5a44a"},"tooltip_style":{"padding":5,"offset_x":-1.7029272151898667,"offset_y":6.261180679785333},"tooltip_content":{"squares_settings":{"containers":[{"id":"sq-container-676221","settings":{"elements":[{"settings":{"name":"Heading","iconClass":"fa fa-header"},"options":{"heading":{"text":"Common"}}}]}}]}},"points":[{"x":0.19582846003897017,"y":75.08812416060839},{"x":14.619883040935672,"y":74.72711492028807},{"x":14.814814814814808,"y":45.848173520679794},{"x":56.72514619883042,"y":45.848173520679794},{"x":56.53021442495129,"y":99.63855032840648},{"x":98.04978557504874,"y":100},{"x":98.05068226120862,"y":96.38946716552366},{"x":99.80506822612087,"y":96.02845792520333},{"x":100,"y":79.06102363014863},{"x":98.05068226120862,"y":78.33900514950798},{"x":98.05068226120862,"y":74.00689426566423},{"x":72.51461988304094,"y":73.64588502534393},{"x":72.31879142300197,"y":0.001797826016791381},{"x":56.72514619883042,"y":0},{"x":56.53021442495129,"y":21.299545178898484},{"x":0,"y":22.021563659539122}]},{"id":"poly-7568","title":"Stairway","type":"poly","x":57.437,"y":17.442,"width":5.063,"height":16.145,"tooltip_style":{"padding":5},"tooltip_content":{"squares_settings":{"containers":[{"id":"sq-container-746231","settings":{"elements":[{"settings":{"name":"Heading","iconClass":"fa fa-header"},"options":{"heading":{"text":"Stairway"}}}]}}]}},"points":[{"x":1.25,"y":100},{"x":99.375,"y":99.7229916897507},{"x":100,"y":0.2770083102493075},{"x":0,"y":0}]}]};
$('#image-map-pro-8697').imageMapPro(settings);
						}, 0);
					});
				})(jQuery, window, document);
				</script><link rel="stylesheet" id="ulisting_builder_stytle_ulisting_single_page_layout_2-css" href="css/css-ulisting_single_page_layout_2.css" type="text/css" media="all"><link rel="stylesheet" id="magnific-popup-css" href="css/libs-magnific-popup.css" type="text/css" media="all"><link rel="stylesheet" id="ulisting_builder_stytle_ulisting_item_card_9_grid-css" href="css/css-ulisting_item_card_9_grid.css" type="text/css" media="all"><link rel="stylesheet" id="elementor-icons-css" href="css/css-elementor-icons.min.css" type="text/css" media="all"><link rel="stylesheet" id="elementor-animations-css" href="css/animations-animations.min.css" type="text/css" media="all"><link rel="stylesheet" id="elementor-pro-css" href="css/css-frontend.min.css" type="text/css" media="all"><link rel="stylesheet" id="elementor-global-css" href="css/css-global.css" type="text/css" media="all"><script type="text/javascript" src="js/ui-core.min.js"></script><script type="text/javascript" src="js/ui-datepicker.min.js"></script><script type="text/javascript">
jQuery(document).ready(function(jQuery){jQuery.datepicker.setDefaults({"closeText":"Close","currentText":"Today","monthNames":["January","February","March","April","May","June","July","August","September","October","November","December"],"monthNamesShort":["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],"nextText":"Next","prevText":"Previous","dayNames":["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],"dayNamesShort":["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],"dayNamesMin":["S","M","T","W","T","F","S"],"dateFormat":"MM d, yy","firstDay":1,"isRTL":false});});
</script><script type="text/javascript" src="js/ui-widget.min.js"></script><script type="text/javascript" src="js/ui-position.min.js"></script><script type="text/javascript" src="js/ui-menu.min.js"></script><script type="text/javascript" src="js/vendor-wp-polyfill.min.js"></script><script type="text/javascript">
( 'fetch' in window ) || document.write( '<script src="https://rentex.wpopal.com/wp-includes/js/dist/vendor/wp-polyfill-fetch.min.js?ver=3.0.0">' + 'ipt>' );( document.contains ) || document.write( '<script src="https://rentex.wpopal.com/wp-includes/js/dist/vendor/wp-polyfill-node-contains.min.js?ver=3.42.0">' + 'ipt>' );( window.DOMRect ) || document.write( '<script src="https://rentex.wpopal.com/wp-includes/js/dist/vendor/wp-polyfill-dom-rect.min.js?ver=3.42.0">' + 'ipt>' );( window.URL && window.URL.prototype && window.URLSearchParams ) || document.write( '<script src="https://rentex.wpopal.com/wp-includes/js/dist/vendor/wp-polyfill-url.min.js?ver=3.6.4">' + 'ipt>' );( window.FormData && window.FormData.prototype.keys ) || document.write( '<script src="https://rentex.wpopal.com/wp-includes/js/dist/vendor/wp-polyfill-formdata.min.js?ver=3.0.12">' + 'ipt>' );( Element.prototype.matches && Element.prototype.closest ) || document.write( '<script src="https://rentex.wpopal.com/wp-includes/js/dist/vendor/wp-polyfill-element-closest.min.js?ver=2.0.2">' + 'ipt>' );
</script><script type="text/javascript" src="js/dist-dom-ready.min.js"></script><script type="text/javascript" src="js/dist-a11y.min.js"></script><script type="text/javascript">
/* <![CDATA[ */
var uiAutocompleteL10n = {"noResults":"No results found.","oneResult":"1 result found. Use up and down arrow keys to navigate.","manyResults":"%d results found. Use up and down arrow keys to navigate.","itemSelected":"Item selected."};
/* ]]> */
</script><script type="text/javascript" src="js/ui-autocomplete.min.js"></script><script type="text/javascript">
/* <![CDATA[ */
var wpcf7 = {"apiSettings":{"root":"https:\/\/rentex.wpopal.com\/wp-json\/contact-form-7\/v1","namespace":"contact-form-7\/v1"}};
/* ]]> */
</script><script type="text/javascript" src="js/js-scripts.js"></script><script type="text/javascript" src="js/js-image-map-pro.min.js"></script><script type="text/javascript">
 var ulisting_wishlist_url ="https://rentex.wpopal.com";
</script><script type="text/javascript" src="js/frontend-ulisting-wishlist.js"></script><script type="text/javascript" src="js/frontend-stm-pricing-plan.js"></script><script type="text/javascript" src="js/frontend-user-plan-detail.js"></script><script type="text/javascript" src="js/js-stripe-card-component.js"></script><script type="text/javascript" src="js/js-stripe-my-card.js"></script><script type="text/javascript" src="js/js-underscore.min.js"></script><script type="text/javascript">
/* <![CDATA[ */
var _wpUtilSettings = {"ajax":{"url":"\/wp-admin\/admin-ajax.php"}};
/* ]]> */
</script><script type="text/javascript" src="js/js-wp-util.min.js"></script><script type="text/javascript">
/* <![CDATA[ */
var rentexAjax = {"ajaxurl":"https:\/\/rentex.wpopal.com\/wp-admin\/admin-ajax.php"};
/* ]]> */
</script><script type="text/javascript" src="js/frontend-main.js"></script><script type="text/javascript" src="js/js-skip-link-focus-fix.min.js"></script><script type="text/javascript" src="js/frontend-sticky-header.js"></script><script type="text/javascript" src="js/frontend-login.js"></script><script type="text/javascript" src="js/vendor-moment.min.js"></script><script type="text/javascript">
moment.locale( 'en_US', {"months":["January","February","March","April","May","June","July","August","September","October","November","December"],"monthsShort":["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],"weekdays":["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],"weekdaysShort":["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],"week":{"dow":1},"longDateFormat":{"LT":"g:i a","LTS":null,"L":null,"LL":"F j, Y","LLL":"F j, Y g:i a","LLLL":null}} );

</script><script type="text/javascript" src="js/ui-tabs.min.js"></script><script type="text/javascript" src="js/vendor-jquery.sticky-kit.min.js"></script><script type="text/javascript" src="js/frontend-sticky-layout.js"></script><script type="text/javascript" src="js/ulisting-detail.js"></script><script type="text/javascript" src="js/js-wp-embed.min.js"></script><script type="text/javascript" src="js/frontend-nav-mobile.js"></script><script type="text/javascript" src="js/ulisting-share.js"></script><script type="text/javascript" async defer src="https://maps.googleapis.com/maps/api/js?libraries=geometry%2Cplaces&amp;key=AIzaSyCWRsJI4PuFc5u6TR6ZQQLFy5y21uCznbw&amp;callback=googleApiLoadw&amp;ver=5.4.2"></script><script type="text/javascript" src="js/vendor-slick.min.js"></script><script type="text/javascript" src="js/ulisting-gallery-style-4.js"></script><script type="text/javascript" src="js/ulisting-google-map.js"></script><script type="text/javascript">
var ulisting_attribute_location_data = json_parse('{\"address\":\"Unnamed Road, San Francisco, CA 94102, \\u0421\\u0428\\u0410\",\"latitude\":\"<?php echo $property_latitude?>\",\"longitude\":\"<?php echo $property_longitude?>\",\"postal_code\":\"94103\",\"id\":39,\"zoom\":10,\"marker\":{\"icon\":{\"url\":\"https:\\/\\/rentex.wpopal.com\\/wp-content\\/themes\\/rentex\\/assets\\/images\\/ulisting\\/mapmarker.svg\",\"scaledSize\":{\"width\":40,\"height\":40}}}}');

</script><script type="text/javascript" src="js/attribute-location.js"></script><script type="text/javascript" src="js/ulisting-floorplan.js"></script><script type="text/javascript">
var ws_wsid = "0f63efbf84d9bb3ad8311c31ff6b37dd"; ws_address = "Unnamed Road, San Francisco, CA 94102, &#1057;&#1064;&#1040;"; ws_format = "wide"; ws_width = "550"; ws_height = "350";
</script><script type="text/javascript" src="https://www.walkscore.com/tile/show-walkscore-tile.php?ver=5.4.2"></script><script type="text/javascript" src="js/js-chart.min.js"></script><script type="text/javascript" src="js/vue-vue-chartjs.min.js"></script><script type="text/javascript">
var types = [{"id":"hours","title":"Hours"},{"id":"weekly","title":"Weekly"},{"id":"monthly","title":"Monthly"}]
</script><script type="text/javascript" src="js/frontend-stm-listing-page-statistics.js"></script><script type="text/javascript" src="js/vendor-jquery.magnific-popup.min.js"></script><script type="text/javascript" src="js/ulisting-agent.js"></script><script type="text/javascript" src="js/ulisting-carousel-listing.js"></script><script type="text/javascript">
/* <![CDATA[ */
var mortgage_calc_data = {"price":"320000","currency":"$","settings":"{\"currency\":\"USD\",\"position\":\"left\",\"thousands_separator\":\",\",\"decimal_separator\":\".\",\"characters_after\":\"0\"}"};
/* ]]> */
</script><script type="text/javascript" src="js/ulisting-mortgage_calc.js"></script><script type="text/javascript" src="js/js-frontend-modules.min.js"></script><script type="text/javascript" src="js/sticky-jquery.sticky.min.js"></script><script type="text/javascript">
var ElementorProFrontendConfig = {"ajaxurl":"https:\/\/rentex.wpopal.com\/wp-admin\/admin-ajax.php","nonce":"3ec213fcf8","i18n":{"toc_no_headings_found":"No headings were found on this page."},"shareButtonsNetworks":{"facebook":{"title":"Facebook","has_counter":true},"twitter":{"title":"Twitter"},"google":{"title":"Google+","has_counter":true},"linkedin":{"title":"LinkedIn","has_counter":true},"pinterest":{"title":"Pinterest","has_counter":true},"reddit":{"title":"Reddit","has_counter":true},"vk":{"title":"VK","has_counter":true},"odnoklassniki":{"title":"OK","has_counter":true},"tumblr":{"title":"Tumblr"},"delicious":{"title":"Delicious"},"digg":{"title":"Digg"},"skype":{"title":"Skype"},"stumbleupon":{"title":"StumbleUpon","has_counter":true},"mix":{"title":"Mix"},"telegram":{"title":"Telegram"},"pocket":{"title":"Pocket","has_counter":true},"xing":{"title":"XING","has_counter":true},"whatsapp":{"title":"WhatsApp"},"email":{"title":"Email"},"print":{"title":"Print"}},"facebook_sdk":{"lang":"en_US","app_id":""},"lottie":{"defaultAnimationUrl":"https:\/\/rentex.wpopal.com\/wp-content\/plugins\/elementor-pro\/modules\/lottie\/assets\/animations\/default.json"}};
</script><script type="text/javascript" src="js/js-frontend.min.js"></script><script type="text/javascript" src="js/dialog-dialog.min.js"></script><script type="text/javascript" src="js/waypoints-waypoints.min.js"></script><script type="text/javascript" src="js/swiper-swiper.min.js"></script><script type="text/javascript" src="js/share-link-share-link.min.js"></script><script type="text/javascript">
var elementorFrontendConfig = {"environmentMode":{"edit":false,"wpPreview":false},"i18n":{"shareOnFacebook":"Share on Facebook","shareOnTwitter":"Share on Twitter","pinIt":"Pin it","downloadImage":"Download image"},"is_rtl":false,"breakpoints":{"xs":0,"sm":480,"md":768,"lg":1025,"xl":1440,"xxl":1600},"version":"2.9.14","urls":{"assets":"https:\/\/rentex.wpopal.com\/wp-content\/plugins\/elementor\/assets\/"},"settings":{"page":[],"general":{"elementor_global_image_lightbox":"yes","elementor_lightbox_enable_counter":"yes","elementor_lightbox_enable_fullscreen":"yes","elementor_lightbox_enable_zoom":"yes","elementor_lightbox_enable_share":"yes","elementor_lightbox_title_src":"title","elementor_lightbox_description_src":"description"},"editorPreferences":[]},"post":{"id":39,"title":"Neue%20Dimensionen%20im%20Schr%C3%A4gdach%20%E2%80%93%20Listing","excerpt":"","featuredImage":"https:\/\/rentex.wpopal.com\/wp-content\/uploads\/2020\/05\/property-1-1.-960x565.jpg"}};
</script><script type="text/javascript" src="js/js-frontend.min.js"></script><script type="text/javascript" src="js/js-elementor-frontend.js"></script></body></html>

