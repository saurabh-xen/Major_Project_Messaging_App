<?php
include "login.php";
include "registration.php";

if (isset($_GET['gotologin'])) {
    ?>
    <script>
jQuery(function(){
   jQuery('#login_button').click();
});
</script>
<?php
    
}

?>
<!-- header only for home -->
    <script>
      $(document).ready(function () {
        $("#hamburger-div").click(function () {
          $("#menu-list").toggle("#menu-list");
        });
      });
      </script>

    <div class="nav-wrapper">
        <nav class="navbar">
            <div class="logo-div">
                <img src="imgs/logo-light.png" alt="" class="logo">
            </div>
            <div class="menu-navbar" id="menu-navbar">
                <ul class="menu-list" id="menu-list">
                    <li class="menu-items"><a href="#" class="menu-links">Home</a></li>
                    <li class="menu-items"><a href="#" class="menu-links">Listing</a></li>
                    <li class="menu-items"><a href="#" class="menu-links">Property</a></li>
                    <li class="menu-items"><a href="#" class="menu-links">Agents</a></li>
                    <li class="menu-items"><a href="#" class="menu-links">Blog</a></li>
                    <li class="menu-items"><a href="#" class="menu-links">Page</a></li>
                </ul>
            </div>
            <div class="menu-items-right">
                <?php
                
                if(isset($_SESSION['regis_id']))   //regis_id
                {
                    
                ?>

                <a href="<?php echo $dashboard_url; ?>" id="login_button" class="icons-menu"  data-target="#myModal"><img src="imgs/person-outline(1).svg" alt="" class="icons-image"></a>

                <?php
                }
                else
                {
                    ?>
                    <a href="" id="login_button" class="icons-menu" type="button" data-toggle="modal" data-target="#myModal"><img src="imgs/person-outline(1).svg" alt="" class="icons-image"></a>
                <?php
                }
                ?>
                <a href="#" class="icons-menu"><img src="imgs/heart-outline.svg" alt="#" class="icons-image"></a>
                <a href="#" class="icons-menu"><img src="imgs/shuffle-outline.svg" alt="" class="icons-image"></a>
                <a href="/post_property/">
                    <button class="add-listing">Post Property</button>
                </a>
            </div>
            <div class="hamburger-div" id="hamburger-div">
                <img src="imgs/menu-outline.svg" alt="" class="hamburger-icon" id="hamburger">
            </div>
        </nav>
        <div class="main-wrapper">
            <div class="heading-div">
                <h3 class="heading-div-h1">Discover thousands <br>of <b>real estate listings.</b></h3>
            </div>
            <div class="search-div-home">
                <div class="select-category-home">
                    <p class="select-category-button">Buy</p>
                    <p class="select-category-button">Rent</p>
                    <p class="select-category-button">Sold</p>
                </div>
                <div class="search-category-home">
                    <input type="text" placeholder="Enter Keywords" class="search-input-home">
                    <select name="select-category" id="" class="select-category-home-select">
                        <option value="0" selected>Office</option>
                        <option value="1">Townhouse</option>
                        <option value="2">Shop</option>
                        <option value="3">Social Housing</option>
                        <option value="4">Villa</option>
                        <option value="5">Apartment</option>
                    </select>
                    <button class="search-category-button">Search</button>
                    <div class="advanced-search">
                        <img class="search-svg " src="imgs/search-outline.svg">
                        <p class="advanced-search-p"> Advanced Search</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


