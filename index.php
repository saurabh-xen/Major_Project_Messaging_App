    
<?php

define('ROOTPATH', __DIR__);




?>
<?php include 'connect_db.php' ?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- own server -->
    <link rel="stylesheet" href="/mycss/header.css">
    <link rel="stylesheet" href="/mycss/footer.css">
    <link rel="stylesheet" href="/mycss/index.css">
    <link rel="stylesheet" href="/mycss/login.css">

    <!-- CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

</head>
<body>

<?php 

    include __DIR__."/header_home.php" ;

?>


<div class="find-city-wrapper">
    <h2 class="find-city-heading heading-re">Find Your City</h2>
    <p class="find-city-para">Explore our selection of the best places around the world.</p>
    <div class="row">
        <div class="find-city-item">
            <div class="item-desc">
                <h6 class="city-name-heading"><a href="#">Las Vegas</a></h6>
                <p class="city-name-para">3 Listings</p>
            </div>
            <div class="item-arrow">
                <a href="#"><img src="/imgs/arrow-forward-outline.svg" alt="" class="arrow-svg"></a>
            </div>
            </a>
        </div>
        <div class="find-city-item">
            <div class="item-desc">
                <h6 class="city-name-heading"><a href="#">Las Vegas</a></h6>
                <p class="city-name-para">3 Listings</p>
            </div>
            <div class="item-arrow">
                <a href="#"><img src="/imgs/arrow-forward-outline.svg" alt="" class="arrow-svg"></a>
            </div>
            </a>
        </div>
        <div class="find-city-item">
            <div class="item-desc">
                <h6 class="city-name-heading"><a href="#">Las Vegas</a></h6>
                <p class="city-name-para">3 Listings</p>
            </div>
            <div class="item-arrow">
                <a href="#"><img src="/imgs/arrow-forward-outline.svg" alt="" class="arrow-svg"></a>
            </div>
            </a>
        </div>
        <div class="find-city-item">
            <div class="item-desc">
                <h6 class="city-name-heading"><a href="#">Las Vegas</a></h6>
                <p class="city-name-para">3 Listings</p>
            </div>
            <div class="item-arrow">
                <a href="#"><img src="/imgs/arrow-forward-outline.svg" alt="" class="arrow-svg"></a>
            </div>
            </a>
        </div>
    </div>
    <div class="row mg-bottom">
        <div class="find-city-item">
            <div class="item-desc">
                <h6 class="city-name-heading"><a href="#">Las Vegas</a></h6>
                <p class="city-name-para">3 Listings</p>
            </div>
            <div class="item-arrow">
                <a href="#"><img src="/imgs/arrow-forward-outline.svg" alt="" class="arrow-svg"></a>
            </div>
            </a>
        </div>
        <div class="find-city-item">
            <div class="item-desc">
                <h6 class="city-name-heading"><a href="#">Las Vegas</a></h6>
                <p class="city-name-para">3 Listings</p>
            </div>
            <div class="item-arrow">
                <a href="#"><img src="/imgs/arrow-forward-outline.svg" alt="" class="arrow-svg"></a>
            </div>
            </a>
        </div>
        <div class="find-city-item">
            <div class="item-desc">
                <h6 class="city-name-heading"><a href="#">Las Vegas</a></h6>
                <p class="city-name-para">3 Listings</p>
            </div>
            <div class="item-arrow">
                <a href="#"><img src="/imgs/arrow-forward-outline.svg" alt="" class="arrow-svg"></a>
            </div>
            </a>
        </div>
        <div class="find-city-item">
            <div class="item-desc">
                <h6 class="city-name-heading"><a href="#">Las Vegas</a></h6>
                <p class="city-name-para">3 Listings</p>
            </div>
            <div class="item-arrow">
                <a href="#"><img src="/imgs/arrow-forward-outline.svg" alt="" class="arrow-svg"></a>
            </div>
            </a>
        </div>
    </div>
</div>
<div class="why-us-wrapper">
    <h2 class="heading-re">Why Us</h2>
    <p class="para-re">Now more than ever, we understand the real value of home</p>
    <div class="row">
        <div class="why-us-item">
            <img src="imgs/wide_range.svg" alt="" class="why-us-image">
            <h3 class="wide-range-heading">Wide range of properties</h3>
            <p class="wide-range-para">With over 1 million+ homes for sale available on the website, we can match you with a house you will want to call home.</p>
            <a href="#" class="wide-range-link">Find A Home&nbsp; &rarr;</a>
        </div>
        <div class="why-us-item">
            <img src="imgs/trust.svg" alt="" class="why-us-image">
            <h3 class="wide-range-heading">Financing made easy</h3>
            <p class="wide-range-para">With 35+ filters and custom keyword search, we can help you easily find a home or apartment for rent that you'll love.</p>
            <a href="#" class="wide-range-link">Find A Home&nbsp; &rarr;</a>
        </div>
        <div class="why-us-item">
            <img src="imgs/financing.svg" alt="" class="why-us-image">
            <h3 class="wide-range-heading">Trust by thousands</h3>
            <p class="wide-range-para">With more neighborhood insights than any other real estate website, we've captured the color and diversity of communities.</p>
            <a href="#" class="wide-range-link">Find A Home&nbsp; &rarr;</a>
        </div>
    </div>
</div>
<!-- *****************************  1  ************************ -->
<!-- start of post -->
<!-- Featured properties 1 ~ 0: HOUSE-->
<div class="featured-wrapper">
    <h2 class="heading-re">New posted </h2>
    <p class="para-re">Now more than ever, we understand the real value of home.</p>
<?php

        //select all (featured 1 - ~ 0:House)
$sql = "SELECT post.post_id,post.posted_by, post.property_price, post.property_name, post.property_price, post.posted_on, post.property_status, property_details.property_size, property_details.property_bedroom,property_details.property_bathroom,property_details.property_garage, property_details.property_address1 
    FROM post 
    INNER JOIN property_details 
    ON post.property_details = property_details.property_details
    
    ORDER BY post_id DESC
    LIMIT 1 ";

        
        if(!$conn->query($sql))
        {
          echo $conn->error;
        }

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {   
        
        $property_name = $row['property_name'];
        $property_size = $row['property_size'];
        $property_size = $property_size." ft";
        $property_price = $row['property_price'];

        $property_bedroom = $row['property_bedroom'];
        $property_bathroom = $row['property_bathroom'];
        $property_garage  = $row['property_garage'];
        $posted_on = $row['posted_on'];
        $property_address1 = $row['property_address1'];
        
        // $image_path = "bike_image/".$image_path ;        
      ?>
    <div class="large-featured-property">
        <a href="property_details.php?post_id=  <?php echo $row['post_id'] ?> ">
            <div class="card-featured">
                <h3 class="price-of-property"> &#8377 <?php echo $property_price; ?></h3>
                <h4 class="name-of-property"><?php echo $property_name; ?></h4>
                <p class="add-of-property">N09927 Cinnamon Road, Flowerity</p>
                <div class="features-small-icons">
                    <p><img src="imgs/water-outline.svg" class="feature-small-icons-img"><?php echo $property_bedroom.'Beds '; ?></p>
                    <p><img src="imgs/bed-outline.svg" class="feature-small-icons-img"><?php echo $property_bathroom."Baths     "; ?></p>
                    <p><img src="imgs/home-outline.svg" class="feature-small-icons-img"><?php echo $property_size." sqfts"; ?></p>
                </div> 
            </div>
        </a>
    </div>

        <?php  }
}
      else {
    echo "We are sorry, data is  unavailable";
      } 

      
?>

    <div class="row">
<?php

        //, select all (LIMIT 0 - _ featured)
$sql = "SELECT post.post_id,post.posted_by, post.property_price, post.property_name, post.property_price, post.posted_on, post.property_status, property_details.property_size, property_details.property_bedroom,property_details.property_bathroom,property_details.property_garage, property_details.property_address1 
    FROM post 
    INNER JOIN property_details 
    ON post.property_details = property_details.property_details
    
    ORDER BY post_id DESC
    LIMIT 5 OFFSET 1";

        
        if(!$conn->query($sql))
        {
          echo $conn->error;
        }

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc())
    {   


        $property_name = $row['property_name'];
        $property_size = $row['property_size'];
        $property_size = $property_size." ft";
        $property_price = $row['property_price'];

        $property_bedroom = $row['property_bedroom'];
        $property_bathroom = $row['property_bathroom'];
        $property_garage  = $row['property_garage'];
        $posted_on = $row['posted_on'];
        $property_address1 = $row['property_address1'];
        
        // $image_path = "bike_image/".$image_path ;        
      ?>
        <div class="featured-prop-small">
            <a href="property_details.php?post_id=<?php echo $row['post_id'] ?>">
                <div class="thumbnail-prop">
                    <img src="imgs/property-3-1.-615x450.jpg" alt="" class="thumbnail-img">
                    <h2 class="price-thumbnail"> &#8377 <?php echo $property_price; ?></h2>
                </div>
                <div class="prop-small-info">
                    <h4 class="name-of-property"><?php echo $property_name; ?></h4>
                    <p class="add-of-property">160 Las Vegas Blvd N, Las Vegas, NV 89191 , USA</p>
                    <div class="features-small-icons">
                        <p><img src="imgs/water-outline.svg" class="feature-small-icons-img"><?php echo $property_bedroom.'Beds '; ?></p>
                        <p><img src="imgs/bed-outline.svg" class="feature-small-icons-img"><?php echo $property_bathroom."Baths     "; ?></p>
                        <p><img src="imgs/home-outline.svg" class="feature-small-icons-img"><?php echo $property_size." sqfts "; ?></p>



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
            </a>
        </div>
        
        <?php  }
}
      else {
    echo "We are sorry, data is  unavailable";
      } 

      
?>
    </div>
</div>
<!-- end of post-->




<!-- 2************************************2**************************** -->
<?php 


$properties = array('Houses','Apartment','Bunglows','Pg-Rooms','Plots' );
$properties_type = "";
for ($i=0; $i <=3 ; $i++) { 
    $property_type = $properties[$i];



?>
<!-- start of post -->
<!-- Featured properties 1 ~ 0: HOUSE-->
<div class="featured-wrapper">
    <h2 class="heading-re">Featured <?php echo $property_type; ?></h2>
    <p class="para-re">Now more than ever, we understand the real value of home.</p>
<?php

        //select all (featured 1 - ~ 0:House)
$sql = "SELECT post.post_id,post.posted_by, post.property_price, post.property_name, post.property_price, post.posted_on, post.property_status, property_details.property_size, property_details.property_bedroom,property_details.property_bathroom,property_details.property_garage, property_details.property_address1 
    FROM post 
    INNER JOIN property_details 
    ON post.property_details = property_details.property_details
    WHERE post.featured = '1' and post.property_type = '".$i."'
    ORDER BY post_id ASC
    LIMIT 1 ";

        
        if(!$conn->query($sql))
        {
          echo $conn->error;
        }

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {   
        
        $property_name = $row['property_name'];
        $property_size = $row['property_size'];
        $property_size = $property_size." ft";
        $property_price = $row['property_price'];

        $property_bedroom = $row['property_bedroom'];
        $property_bathroom = $row['property_bathroom'];
        $property_garage  = $row['property_garage'];
        $posted_on = $row['posted_on'];
        $property_address1 = $row['property_address1'];
        
        // $image_path = "bike_image/".$image_path ;        
      ?>
    <div class="large-featured-property">
        <a href="property_details.php?post_id=  <?php echo $row['post_id'] ?> ">
            <div class="card-featured">
                <h3 class="price-of-property"> &#8377 <?php echo $property_price; ?></h3>
                <h4 class="name-of-property"><?php echo $property_name; ?></h4>
                <p class="add-of-property">N09927 Cinnamon Road, Flowerity</p>
                <div class="features-small-icons">
                    <p><img src="imgs/water-outline.svg" class="feature-small-icons-img"><?php echo $property_bedroom.'Beds '; ?></p>
                    <p><img src="imgs/bed-outline.svg" class="feature-small-icons-img"><?php echo $property_bathroom."Baths     "; ?></p>
                    <p><img src="imgs/home-outline.svg" class="feature-small-icons-img"><?php echo $property_size." sqfts"; ?></p>
                </div> 
            </div>
        </a>
    </div>

        <?php  }
}
      else {
    echo "We are sorry, data is  unavailable";
      } 

      
?>

    <div class="row">
<?php

        //, select all (LIMIT 0 - _ featured)
$sql = "SELECT post.post_id,post.posted_by, post.property_price, post.property_name, post.property_price, post.posted_on, post.property_status, property_details.property_size, property_details.property_bedroom,property_details.property_bathroom,property_details.property_garage, property_details.property_address1 
    FROM post 
    INNER JOIN property_details 
    ON post.property_details = property_details.property_details
    WHERE post.featured = '1' AND post.property_type = '".$i."'
    ORDER BY post_id ASC
    LIMIT 10 OFFSET 1";

        
        if(!$conn->query($sql))
        {
          echo $conn->error;
        }

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc())
    {   


        $property_name = $row['property_name'];
        $property_size = $row['property_size'];
        $property_size = $property_size." ft";
        $property_price = $row['property_price'];

        $property_bedroom = $row['property_bedroom'];
        $property_bathroom = $row['property_bathroom'];
        $property_garage  = $row['property_garage'];
        $posted_on = $row['posted_on'];
        $property_address1 = $row['property_address1'];
        
        // $image_path = "bike_image/".$image_path ;        
      ?>
        <div class="featured-prop-small">
            <a href="property_details.php?post_id=<?php echo $row['post_id'] ?>">
                <div class="thumbnail-prop">
                    <img src="imgs/property-3-1.-615x450.jpg" alt="" class="thumbnail-img">
                    <h2 class="price-thumbnail"> &#8377 <?php echo $property_price; ?></h2>
                </div>
                <div class="prop-small-info">
                    <h4 class="name-of-property"><?php echo $property_name; ?></h4>
                    <p class="add-of-property">160 Las Vegas Blvd N, Las Vegas, NV 89191 , USA</p>
                    <div class="features-small-icons">
                        <p><img src="imgs/water-outline.svg" class="feature-small-icons-img"><?php echo $property_bedroom.'Beds '; ?></p>
                        <p><img src="imgs/bed-outline.svg" class="feature-small-icons-img"><?php echo $property_bathroom."Baths     "; ?></p>
                        <p><img src="imgs/home-outline.svg" class="feature-small-icons-img"><?php echo $property_size." sqfts "; ?></p>



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
            </a>
        </div>
        
        <?php  }
}
      else {
    echo "We are sorry, data is  unavailable";
      } 

      
?>
    </div>
</div>
<!-- end of post-->
<?php
}
?>
<!-- Submit Property -->
<div class="submit-property-wrapper">
    <p class="submit-property-p">Buy or Sell</p>
    <h2 class="submit-property-heading">Now more than ever, we understand the real value of home</h2>
    <div class="buttons-submit-property">
        <button class="submit-property-btn">Submit Property</button>
        <button class="submit-property-btn browse-btn">Browse Properties</button>
    </div>
</div>
<!-- Meet our agents -->
<div class="meet-our-agents">
    <h2 class="heading-re">Meet Our Agents</h2>
    <p class="para-re">Get in touch with our real estate experts.</p>
    <div class="row">
    <?php 
        $sql_agent = " SELECT agent_name,agent_desc,agent_contact,agent_image
                       FROM agent ";
        if (!$conn->query($sql_agent)) {
            echo $conn->conn_error;;
        }
        $result_agent = $conn->query($sql_agent);
        if ($result_agent->num_rows>0) {
            # code...
        
            while($row = $result_agent->fetch_assoc())
            {

                $agent_image = $row['agent_image'];
                $agent_image = 'imgs_agent/'.$agent_image;
               if ($row['agent_desc']=='0') {
                   $agent_desc = "Seller";
               }

     ?>
        <div class="agent-card">
            <div class="agent-image-div">
                <img src="<?php echo $agent_image; ?>" alt="" class="agent-image">
            </div>
            <div class="agent-info-div">
                <p class="agent-desc"><?php echo $agent_desc; ?></p>
                <p class="agent-name"><?php echo $row['agent_name']; ?></p>
                <p class="agent-number"></p>
            </div>
            <button class="view-agent">View Profile</button>
        </div>
        <?php
            }
        }
        else
        {
            echo "NO data found";
        }

        ?>
    </div>
    </div>
</div>
<!-- reviews -->
<div class="reviews-div">
    <p class="review-main">
        Rentex is worth much more than I paid. It's just amazing. I couldn't have asked for more than this. I am so pleased with this product.
    </p>
    <p class="reviewer-name">Erin Brook</p>
    <p class="agent-desc">Coporate Executive</p>
</div>
<!-- brands -->
<div class="brand-divs">
    <div class="row">
        <img src="imgs/brand-1-145x70.png" alt="" class="brain-images">
        <img src="imgs/brand-2-145x70.png" alt="" class="brain-images">
        <img src="imgs/brand-3-145x70.png" alt="" class="brain-images">
        <img src="imgs/brand-4-145x70.png" alt="" class="brain-images">
        <img src="imgs/brand-5-145x70.png" alt="" class="brain-images">
    </div>
</div>
<?php include __DIR__.'/footer.php'?>
</body>
</html>