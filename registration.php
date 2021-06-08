<?php


include "connect_db.php";
$message = "";
        //select all (featured 1 - ~ 0:House)

if (isset($_POST['r_submit'])) {
  
	$fname = $_POST['r_fname'];
	$lname = $_POST['r_lname'];

	$user_name = $fname.$lname;
	$user_name = strtolower($user_name);
	$rnd = (40129041)?rand(0, 40129041):"";
	$user_name = $user_name.$rnd;

	$email = $_POST['r_email'];
	$pwd = $_POST['r_pwd'];
	$contact = $_POST['r_contact'];
	$r_regis_type = $_POST['r_radio'];
	echo $r_regis_type;
	if (isset($_POST['r_checkbox'])) {
		// echo "okay";
	}


$sql = "INSERT INTO `registable` (`regis_id`, `user_name`, `regis_email`, `regis_pwd`, `regis_type`)
	 VALUES (NULL, '".$user_name."', '".$email."', '".$pwd."', '".$r_regis_type."')";

// INSERT INTO `agent` (`agent_id`, `regis_id`, `agent_fname`, `agent_lname`, `agent_contact`, `agent_address`, `agent_city`, `agent_rating`, `agent_lead_id`, `agent_payment_type`, `agent_payment_id`, `agent_about`, `agent_website`, `agent_image`) VALUES (NULL, '10', 'djasb', 'jkf', 'jk', 'jkjk', 'fjbjk', '21', '121', '313', '31', 'dasf', 'fasf', 'fas');

if ($r_regis_type == "1") {
	// echo "agent";
	$sql2 = "INSERT INTO `agent` (`agent_id`, `regis_id`, `agent_fname`, `agent_lname`, `agent_contact`) 
		VALUES (NULL, (SELECT regis_id FROM registable WHERE regis_email='".$email."'), '".$fname."', '".$lname."', '".$contact."');";
}
else if ($r_regis_type == "2") {	//user
		
		// echo "user";
	$sql2 = "INSERT INTO `customer` (`customer_id`, `regis_id`, `customer_fname`, `customer_lname`, `customer_contact`) 
		VALUES (NULL, (SELECT regis_id FROM registable WHERE regis_email='".$email."'), '".$fname."', '".$lname."', '".$contact."')";
	}
 	

		//Setting auto commit to true
		$conn->autocommit(FALSE);

        if(!($conn->query($sql)) )
        {
        	$conn->error;
          $message = "Registration Failed, Please try again later 1 .";
          exit();

        }
        else
        	 {
        			if (!($conn->query($sql2))) {
        				$message = "Registration Failed, Please try again later.";
  						echo "Failed to connect to MySQL: " . $conn->error;
			 			}
			 			else
			 			{
			 				$conn->commit();
			 				$message = "Registration Success";	

			 				

			 			} 
			}

    //     if(!($conn->query($sql2)))
    //     {
    //     	$conn->error;

		  // $message = "Registration Failed, Please try again later.";

    //     }

			// $sub_res = $conn->query("DELETE FROM registable
			// 			order by regis_id desc limit 1");	
							

		
        // $result = $conn->query($sql);
        // $result2 = $conn->query($sql2);

        // //Saving the results
        // $conn->commit();
        // $conn -> close();



        
}
if ($message !="") {
  ?>
    <div style="font-size:18px;background-color:orange; widows: 100%;text-align: center;"><?php echo $message; ?></div>
  <?php
}

?>
