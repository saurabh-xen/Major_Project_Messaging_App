
<!-- <div class="col-md-9">
             <br />
                <div class="row filter_data">
                
                </div>
            </div> -->

<!-- This file is fecthing data from search.php -->
<?php
include "global_variable.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_SERVER['REQUEST_METHOD']==="POST")
{
    echo "Get reques";
}
if(isset($_POST["action"]))
{
    echo "POST REQUEST_METHOD";
}
?>

<?php include __DIR__.'/header.php'
?>
<!-- <script src="jquery.range.js"></script> -->
<?php include "connect_db.php"  ?>

<!DOCTYPE html>
<html>
<head>
    <title>Listing</title>

    <!-- own server -->
    <link rel="stylesheet" href="/mycss/listing.css">
    <link rel="stylesheet" href="/mycss/index.css">
    <link rel="stylesheet" type="text/css" href="/mycss/footer.css">
    <link rel="stylesheet" type="text/css" href="/mycss/header.css">
    <script type="text/javascript" src="myjs/listing.js"></script>

    <!-- CDN -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <!-- bootstrap --> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>

<div class="breadcrumb-div">
    <div class="container">
        <span><a href="#" class="breadcrumb-link">Listing</a></span>
        <span><a href="#" class="breadcrumb-link"> > </a></span>
        <span><a href="#" class="breadcrumb-link">Office</a></span>
    </div>
</div>
<div class="title-main">
    <div class="container">
        <div class="heading-main">Office</div>
    </div>
</div>

<div class="main-wrapper-listings">
    <div class="container main-mini-listings">
        <div class="sidebar-left desktop-sidebar">
            
            <div class="sidebar-item">
                <div class="sidebar-item-content">
                    <p class="sidebar-item-heading">Category</p>
                    <select class="select-sidebar-item common_selector property_for">

                    <?php  
                        $sql = "SELECT DISTINCT property_for
                        FROM post
                        ORDER BY property_for ASC" ;

                        $property_for_list = array(
                                            "0" => "Sell",
                                            "1" => "Rent",
                                            "2" => "Pg"
                                            );

                        if(!$conn->query($sql))
                        {
                            echo $conn->error;
                            
                        }
                        $result_property_for = $conn->query($sql);
                        if ($result_property_for->num_rows >0) {
                           
                                             

                        while ($row = $result_property_for->fetch_assoc())                           
                        {
                            $item_name = $property_for_list[$row['property_for']]
                            ?>
                              <option class="" value="<?php echo $row['property_for'] ?>"> <?php echo $item_name ?>  </option>
                                <?php
                        }
                    }
                    else
                    {
                        echo "Server Error !";
                    }
                ?> 
                



                      
                        
                    </select>
                </div>
            </div>

            <div class="sidebar-item">
                <div class="sidebar-item-content">
                    <p class="sidebar-item-heading">Contract Type</p>
                    <select class="select-sidebar-item common_selector contract_type ">
                        
                        <?php
                         $sql = "SELECT DISTINCT contract_type
                        FROM post
                        ORDER BY contract_type ASC" ;
                        //property type will vary on basis of contract type
                        $contract_type_list = array(
                                                "0" => "Residential",
                                                "1" => "Commercial",
                                                "2" => "Open For All"
                                                );


                        if(!$conn->query($sql))
                        {
                            echo $conn->error;
                            
                        }

                        $result_contract_type = $conn->query($sql);
                        if ($result_contract_type->num_rows >0) {
                           
                                      
                        while($row = $result_contract_type->fetch_assoc())
                        {   
                             $new_array[ ] = $row;

                            $list_item2 = $contract_type_list[$row['contract_type']];
                            ?>
                            

                            <option value="<?php echo $row['contract_type'] ?>"> <?php echo $list_item2; ?> </option>
                        <?php
                        }
                    }
                    else
                    {
                        echo "Server Error";
                        
                    }
                    ?>
                    </select>
                </div>
            </div>

            <div class="sidebar-item">
                <div class="sidebar-item-content">
                    <p class="sidebar-item-heading">Property Type</p>
                    <select class="select-sidebar-item common_selector property_type">
                        <?php
                        $sql = "SELECT DISTINCT property_type
                        FROM post
                        ORDER BY property_type ASC" ;
                        //property type will vary on basis of contract type
                        $property_type_list = array(
                                                "0" => "Flat",
                                                "1" => "House",
                                                "2" => "Villa",
                                                "3" => "Penthouse Plot",
                                                "4" => "Office Space",
                                                "5" => "Shop",
                                                "6" => "Godown"

                                                );


                        if(!$conn->query($sql))
                        {
                            echo $conn->error;
                            
                        }

                        $result_property_type = $conn->query($sql);
                        if ($result_property_type->num_rows >0) {
                           
                                      
                        while($row = $result_property_type->fetch_assoc())
                        {   
                             $new_array[ ] = $row;

                            $list_item2 = $property_type_list[$row['property_type']];
                            ?>
                            

                            <option value="<?php echo $row['property_type'] ?>"> <?php echo $list_item2; ?> </option>
                        <?php
                        }
                    }
                    else
                    {
                        echo "Server Error";
                        
                    }
                    ?>


                    </select>
                </div>
            </div>

            <div class="sidebar-item">
                <div class="sidebar-item-content">
                    <p class="sidebar-item-heading">City</p>
                    <select class="select-sidebar-item">

                        <?php
                        $sql = "SELECT DISTINCT post_city
                        FROM post
                        ORDER BY post_city ASC" ;
                        //property type will vary on basis of contract type
                        $city_list = array(
                                                "0" => "Hyderabad",
                                                "1" => "Nizamabad",
                                                "2" => "Howrah",
                                                "3" => "Varanasi"

                                                );


                        if(!$conn->query($sql))
                        {
                            echo $conn->error;
                            
                        }

                        $result_post_city = $conn->query($sql);
                        if ($result_post_city->num_rows >0) {
                           
                                      
                        while($row = $result_post_city->fetch_assoc())
                        {   
                             $new_array[ ] = $row;

                            $list_item2 = $city_list[$row['post_city']];
                            ?>
                            

                            <option value="<?php echo $row['post_city'] ?>"> <?php echo $list_item2; ?> </option>
                        <?php
                        }
                    }
                    else
                    {
                        echo "Server Error";
                        
                    }
                    ?>
                    </select>
                </div>
            </div>

            <div class="sidebar-item">
                <div class="sidebar-item-content">
                    <p class="sidebar-item-heading">Price</p>
                    <input type="range" width="100%" id="input_price">
                </div>
            </div>

            

            
            
            <div class="sidebar-item">
                <div class="sidebar-item-content">
                    <p class="sidebar-item-heading">Bedroom</p>
                    <div class="inputs-beds">
                        <?php
                        $sql = "SELECT DISTINCT property_details.property_bedroom
                        FROM post
                        INNER JOIN property_details 
                        ON post.property_details = property_details.property_details
                        ORDER BY property_details.property_bedroom ASC" ;
                        //property type will vary on basis of contract type
                        


                        if(!$conn->query($sql))
                        {
                            echo $conn->error;
                            
                        }

                        $result_property_bedroom = $conn->query($sql);
                        if ($result_property_bedroom->num_rows >0) {
                           
                                      
                        while($row = $result_property_bedroom->fetch_assoc())
                        {   
                             
                            ?>
                            <span><input type="checkbox" value="<?php echo $row['property_bedroom'] ?>" class="beds-input-comp common_selector property_bedroom"><label for="Bed_1" class="bed-label"><?php echo $row['property_bedroom'] ?></label></span>

                            
                        <?php
                        }
                    }
                    else
                    {
                        echo "Server Error";
                        
                    }
                    ?>
                        
                        
                    </div>
                </div>
            </div>
            <div class="sidebar-item">
                <div class="sidebar-item-content">
                    <p class="sidebar-item-heading">Other</p>
                    <div class="amenities">
                        <?php
                        $sql = "SELECT  post_category_id,category
                        FROM post_category
                        ORDER BY category ASC" ;


                        if(!$conn->query($sql))
                        {
                            echo $conn->error;
                            
                        }

                        $result_category = $conn->query($sql);
                        if ($result_category->num_rows >0) {
                           
                                      
                        while($row = $result_category->fetch_assoc())
                        {   
                             
                            ?>
                            <span>
                                <input type="checkbox" id="<?php echo 'category_'.$row['post_category_id'] ?>" value="<?php echo $row['post_category_id'] ?>" class="other_category common_selector amenities_input  ">
                            <label for="<?php echo 'category_'.$row['post_category_id'] ?>" class="amenities-label"><?php echo $row['category'] ?></label>
                            </span>

                            
                        <?php
                        }
                    }
                    else
                    {
                        echo "Server Error";
                        
                    }
                    ?>
                        <!-- <p class="input-para"><input type="checkbox" name="am_1" id="am_1" class="amenities_input"><label for="am_1" class="amenities-label">Air Conditioner</label></p> -->
                        
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile only view -->
        <div class="sidebar-mobile">
            <div class="sidebar-left-grid">
                <select name="Category" id="category_select" class="sidebar-left-select">
                    <?php
                    $sql = "SELECT DISTINCT property_for
                        FROM post
                        ORDER BY property_for ASC" ;

                        $property_for_list = array(
                                            "0" => "Sell",
                                            "1" => "Rent",
                                            "2" => "Pg"
                                            );

                        if(!$conn->query($sql))
                        {
                            echo $conn->error;
                            
                        }
                        $result_property_for = $conn->query($sql);
                    if ($result_property_for->num_rows >0) {
                           
                                             

                        while ($row = $result_property_for->fetch_assoc())                           
                        {
                            $item_name = $property_for_list[$row['property_for']]
                            ?>
                              <option value="<?php echo $row['property_for'] ?>"> <?php echo $item_name ?>  </option>
                                <?php
                        }
                    }
                    else
                    {
                        echo "Server Error !";
                    }
                ?> 
                    <!-- <option value="0">Buy</option>
                    <option value="1">Sell</option>
                    <option value="2">Rent</option> -->
                </select>
                <select name="City" id="city_select" class="sidebar-left-select">
                    <option value="0">Las Vegas</option>
                    <option value="1">California</option>
                    <option value="2">Manchester</option>
                </select>
                <select name="Beds" id="beds_selection" class="sidebar-left-select">
                    <option value="0">1</option>
                    <option value="1">2</option>
                    <option value="2">3</option>
                    <option value="3">4</option>
                    <option value="4">5</option>
                    <option value="5" selected disabled>Beds</option>
                </select>
            </div>
            <div class="sidebar-right-grid">
            <select name="Amenties" id="amenities_selection" class="sidebar-right-select">
                    <option value="0">1</option>
                    <option value="1">2</option>
                    <option value="2">3</option>
                    <option value="3">4</option>
                    <option value="4">5</option>
                    <option value="5" selected disabled>Amenities</option>
                </select>
                <select name="price" id="price_selection" class="sidebar-right-select">
                    <option value="0">$1000</option>
                    <option value="1">$2000</option>
                    <option value="2">$3000</option>
                    <option value="3">$4000</option>
                    <option value="4">$5000</option>
                    <option value="5" selected disabled>Price</option>
                </select>
                <select name="baths" id="baths_selection" class="sidebar-right-select">
                    <option value="0">1</option>
                    <option value="1">2</option>
                    <option value="2">3</option>
                    <option value="3">4</option>
                    <option value="4">5</option>
                    <option value="5" selected disabled>Baths</option>
                </select>
            </div>
        </div>
        <div class="main-content-right">
            <div class="right-filter">
                <div class="property-matches"><span class="number-matches">5</span><span class="prop-text">Properties</span></div>
                <div class="right-filters-sub">
                    <a href="#" class="filter-items"> <i class="material-icons icons-filter">cached</i>Reset Search</a>
                    <a href="#" class="filter-items"><i class="material-icons icons-filter">favorite_border</i> Search</a>
                    <span class="prop-text">
                        <label for="filter-select" class="filter-select-label">Sort By</label>
                        <select id="filter-select">
                            <option value="0">Latest</option>
                            <option value="1">Price</option>
                            <option value="2">Size</option>
                        </select>
                    </span>
                </div>
            </div>

            <div class="container-listings filter_data">
                
               <!--  <div class="row row-listings">
                    <div class="featured-prop-small listing-small">
                        <a href="#">
                            <div class="thumbnail-prop">
                                <img src="imgs/property-3-1.-615x450.jpg" alt="" class="thumbnail-img">
                                <h2 class="price-thumbnail">$560,000</h2>
                            </div>
                            <div class="prop-small-info info-listings">
                                <h4 class="name-of-property">Casa Alda</h4>
                                <p class="add-of-property">160 Las Vegas Blvd N, Las Vegas, NV 89191 , USA</p>
                                <div class="features-small-icons">
                                    <p><img src="imgs/water-outline.svg" class="feature-small-icons-img">3 Beds</p>
                                    <p><img src="imgs/bed-outline.svg" class="feature-small-icons-img">1 Baths</p>
                                    <p><img src="imgs/home-outline.svg" class="feature-small-icons-img">1186 sqfts</p>
                                </div>
                                <div class="company-reality">
                                    <div class="company-left">
                                        <img src="imgs/agency-1.jpg" alt="" class="company-image">
                                        <p>Company Reality</p>
                                    </div>
                                    <div class="company-right">
                                        <button class="button-company">Left</button><button class="button-company">Right</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="featured-prop-small listing-small">
                        <a href="#">
                            <div class="thumbnail-prop">
                                <img src="imgs/property-13-2.-615x450.jpg" alt="" class="thumbnail-img">
                                <h2 class="price-thumbnail">$560,000</h2>
                            </div>
                            <div class="prop-small-info info-listings">
                                <h4 class="name-of-property">Casa Alda</h4>
                                <p class="add-of-property">160 Las Vegas Blvd N, Las Vegas, NV 89191 , USA</p>
                                <div class="features-small-icons">
                                    <p><img src="imgs/water-outline.svg" class="feature-small-icons-img">3 Beds</p>
                                    <p><img src="imgs/bed-outline.svg" class="feature-small-icons-img">1 Baths</p>
                                    <p><img src="imgs/home-outline.svg" class="feature-small-icons-img">1186 sqfts</p>
                                </div>
                                <div class="company-reality">
                                    <div class="company-left">
                                        <img src="imgs/agency-1.jpg" alt="" class="company-image">
                                        <p>Company Reality</p>
                                    </div>
                                    <div class="company-right">
                                        <button class="button-company">Left</button><button class="button-company">Right</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="row row-listings">
                    <div class="featured-prop-small listing-small">
                        <a href="#">
                            <div class="thumbnail-prop">
                                <img src="imgs/property-3-1.-615x450.jpg" alt="" class="thumbnail-img">
                                <h2 class="price-thumbnail">$560,000</h2>
                            </div>
                            <div class="prop-small-info info-listings">
                                <h4 class="name-of-property">Casa Alda</h4>
                                <p class="add-of-property">160 Las Vegas Blvd N, Las Vegas, NV 89191 , USA</p>
                                <div class="features-small-icons">
                                    <p><img src="imgs/water-outline.svg" class="feature-small-icons-img">3 Beds</p>
                                    <p><img src="imgs/bed-outline.svg" class="feature-small-icons-img">1 Baths</p>
                                    <p><img src="imgs/home-outline.svg" class="feature-small-icons-img">1186 sqfts</p>
                                </div>
                                <div class="company-reality">
                                    <div class="company-left">
                                        <img src="imgs/agency-1.jpg" alt="" class="company-image">
                                        <p>Company Reality</p>
                                    </div>
                                    <div class="company-right">
                                        <button class="button-company">Left</button><button class="button-company">Right</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="featured-prop-small listing-small">
                        <a href="#">
                            <div class="thumbnail-prop">
                                <img src="imgs/property-13-2.-615x450.jpg" alt="" class="thumbnail-img">
                                <h2 class="price-thumbnail">$560,000</h2>
                            </div>
                            <div class="prop-small-info info-listings">
                                <h4 class="name-of-property">Casa Alda</h4>
                                <p class="add-of-property">160 Las Vegas Blvd N, Las Vegas, NV 89191 , USA</p>
                                <div class="features-small-icons">
                                    <p><img src="imgs/water-outline.svg" class="feature-small-icons-img">3 Beds</p>
                                    <p><img src="imgs/bed-outline.svg" class="feature-small-icons-img">1 Baths</p>
                                    <p><img src="imgs/home-outline.svg" class="feature-small-icons-img">1186 sqfts</p>
                                </div>
                                <div class="company-reality">
                                    <div class="company-left">
                                        <img src="imgs/agency-1.jpg" alt="" class="company-image">
                                        <p>Company Reality</p>
                                    </div>
                                    <div class="company-right">
                                        <button class="button-company">Left</button><button class="button-company">Right</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="row row-listings">
                    <div class="featured-prop-small listing-small">
                        <a href="#">
                            <div class="thumbnail-prop">
                                <img src="imgs/property-3-1.-615x450.jpg" alt="" class="thumbnail-img">
                                <h2 class="price-thumbnail">$560,000</h2>
                            </div>
                            <div class="prop-small-info info-listings">
                                <h4 class="name-of-property">Casa Alda</h4>
                                <p class="add-of-property">160 Las Vegas Blvd N, Las Vegas, NV 89191 , USA</p>
                                <div class="features-small-icons">
                                    <p><img src="imgs/water-outline.svg" class="feature-small-icons-img">3 Beds</p>
                                    <p><img src="imgs/bed-outline.svg" class="feature-small-icons-img">1 Baths</p>
                                    <p><img src="imgs/home-outline.svg" class="feature-small-icons-img">1186 sqfts</p>
                                </div>
                                <div class="company-reality">
                                    <div class="company-left">
                                        <img src="imgs/agency-1.jpg" alt="" class="company-image">
                                        <p>Company Reality</p>
                                    </div>
                                    <div class="company-right">
                                        <button class="button-company">Left</button><button class="button-company">Right</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="featured-prop-small listing-small">
                        <a href="#">
                            <div class="thumbnail-prop">
                                <img src="imgs/property-13-2.-615x450.jpg" alt="" class="thumbnail-img">
                                <h2 class="price-thumbnail">$560,000</h2>
                            </div>
                            <div class="prop-small-info info-listings">
                                <h4 class="name-of-property">Casa Alda</h4>
                                <p class="add-of-property">160 Las Vegas Blvd N, Las Vegas, NV 89191 , USA</p>
                                <div class="features-small-icons">
                                    <p><img src="imgs/water-outline.svg" class="feature-small-icons-img">3 Beds</p>
                                    <p><img src="imgs/bed-outline.svg" class="feature-small-icons-img">1 Baths</p>
                                    <p><img src="imgs/home-outline.svg" class="feature-small-icons-img">1186 sqfts</p>
                                </div>
                                <div class="company-reality">
                                    <div class="company-left">
                                        <img src="imgs/agency-1.jpg" alt="" class="company-image">
                                        <p>Company Reality</p>
                                    </div>
                                    <div class="company-right">
                                        <button class="button-company">Left</button><button class="button-company">Right</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div> -->
            </div>

            

        </div>

    </div>
            <div class="pagination-links">
                <a href="#" class="pagination-link-items active-page">1</a>
                <a href="#" class="pagination-link-items">2</a>
                <a href="#" class="pagination-link-items">Last</a>
            </div>
        </div>
    </div>
</div>





<!-- <?php include __DIR__.'/footer.php' ;

?> -->

<style type="text/css">
#loading
{
 text-align:center; 
 background: url('loader.gif') no-repeat center; 
 height: 150px;
}
</style>

</body>
</html>