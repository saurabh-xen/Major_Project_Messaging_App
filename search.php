
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$row_count = NULL;

include('connect_db.php');

if(isset($_POST["action"]))
{	$output = "";
	$query = "
		SELECT property_for, property_bedroom FROM post 
		INNER JOIN property_details 
		ON post.property_details=property_details.property_details ";
	// if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
	// {
	// 	$query .= "
	// 	 AND product_price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
	// 	";
	// }property_bedroom
	if(isset($_POST["property_for"]))
	{	

		$property_for = $_POST["property_for"];
		$query .= "
		 AND property_for = '".$property_for."'
		";
	}

	if(isset($_POST["contract_type"]))
	{
		$contract_type = $_POST["contract_type"];
		$query .= "
		 AND contract_type = '".$contract_type."'
		";
	}
	if(isset($_POST["property_type"]))
	{
		$property_type = $_POST["property_type"];
		$query .= "
		 AND property_type = '".$property_type."'
		";
	}
	if(isset($_POST["property_bedroom"]))
	{	
		$property_bedroom = implode("','", $_POST["property_bedroom"]);
		echo "value is ".$property_bedroom;
		$query .= "
		 AND property_bedroom IN('".$property_bedroom."')
		";
	}

			if(!$conn->query($query))
                        {
                            echo $conn->error;
                            
                        }

                        $result = $conn->query($query);

                        

                        if ($result->num_rows >0) {
                        	
                        	//for odd count check
                        	//1 row has two elements there we have to use if condition
                        	$row_count = $result->num_rows;
                        	
                        	$i = 1;


                        	
                           
                        
                        while($row = $result->fetch_assoc())
                        {   
                             
                            
                            if ($i%2!=0) {
                            	$output .= '<div class="row row-listings">';
                            

                            $output .= '
                
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
                    
                ';
            }
                 if ($i%2==0) {
                 				$output.='<div class="featured-prop-small listing-small">
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
                    </div>';

                            	$output .= '</div>';
                            }
                         if ($i==$row_count) {
                         	$output.= '</div>';

                         }
                            $i = $i +1;
                        
                        }
                    }
else
	{
		$output = '<h3>No Data Found</h3>';
	}
	if ($row_count%2==0) {

		$output.='</div>';
	}
	echo $output;
}

?>
