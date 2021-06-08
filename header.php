
<?php



$dashboard_url = "#";
$post_property_url = "/index.php?gotologin=jdnajn";
if (isset($_SESSION['regis_type'])) {


        $post_property_url = "/post_property/";
    if ($_SESSION['regis_type'] == '1')    {   //agent 
            $dashboard_url = "/agent_dashboard/";

        }
        else if ($_SESSION['regis_type'] == '2') { //user
                $dashboard_url = "/user_dashboard/";
            }    
}


?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/mycss/header.css">
    <link rel="stylesheet" href="/mycss/listing.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <script>
      $(document).ready(function () {
        $("#hamburger-div").click(function () {
          $("#menu-list").toggle("#menu-list");
        });
      });
      </script>
    <title>Home 6 - Listing</title>
</head>

<body>
    
    <div class="nav-wrapper-header">
    <div class="container">
        <nav class="navbar-main">
            <div class="logo-div">
                <img src="/imgs/logo.svg" alt="" class="logo" width="135px">
            </div>
            <div class="menu-navbar" id="menu-navbar">
                <ul class="menu-list" id="menu-list">
                    <li class="menu-items"><a href="/" class="menu-links-main">Home</a></li>
                    <li class="menu-items"><a href="#" class="menu-links-main">Listing</a></li>
                    <li class="menu-items"><a href="#" class="menu-links-main">Property</a></li>
                    <li class="menu-items"><a href="#" class="menu-links-main">Agents</a></li>
                    <li class="menu-items"><a href="#" class="menu-links-main">Blog</a></li>
                    <li class="menu-items"><a href="#" class="menu-links-main">Page</a></li>
                </ul>
            </div>
            <div class="menu-items-right">
                <a href="<?php echo $dashboard_url; ?>" class="icons-menu"><img src="/imgs/person-outline(1).svg" alt="" class="icons-image"></a>
                <a href="#" class="icons-menu"><img src="/imgs/heart-outline(1).svg" alt="#" class="icons-image"></a>
                <a href="#" class="icons-menu"><img src="/imgs/shuffle-outline1.svg" alt="" class="icons-image"></a>
                <a href="<?php echo $post_property_url; ?>">
                    <button class="add-listing">Add Property</button>
                </a>
            </div>
            <div class="hamburger-div" id="hamburger-div">
                <img src="/imgs/menu-outline1.svg" alt="" class="hamburger-icon" id="hamburger">
            </div>
        </nav>
        </div>
    </div>
    