
<?php

// echo password_hash("112233", PASSWORD_DEFAULT);
include('database_connection.php');
include('connect_db.php');
$root_path = $_SERVER['DOCUMENT_ROOT'];
$dashboard_url = "";
session_start();

    if(isset($_SESSION['regis_id']))   //regis_id
        {
            // header('location:after_login.php');
          
                  if($_SESSION['regis_type'] == 1)
                  {
                    
                    $dashboard_url = "/agent_dashboard/";
                  }
                  else if ($_SESSION['regis_type'] == 2) { // user
                    $dashboard_url = "/user_dashboard/";
                  }

        }


$message = '';


// login
if(isset($_POST["l_submit"]))
{
    
 $query = "
   SELECT * FROM registable 
    WHERE regis_email = :username
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
    array(
      ':username' => $_POST["l_email"]
     )
  );
  $count = $statement->rowCount();
  if($count > 0)
 {
  $result = $statement->fetchAll();
    foreach($result as $row)
    {
      
      // if(password_verify($_POST["password"], $row["regis_pwd"]))
      if($_POST['l_pass']== $row['regis_pwd'])
      {
        
        $_SESSION['regis_id'] = $row['regis_id'];
        $_SESSION['regis_email'] = $row['regis_email'];
        $_SESSION['username'] = $row['user_name'];
        $_SESSION['regis_type'] = $row['regis_type'];



        $sub_query = "INSERT INTO login_details (regis_id) 
                      VALUES ('".$row['regis_id']."') ";

        

        
        $statement = $connect->prepare($sub_query);
        
        $statement->execute(); 
        $_SESSION['login_details_id'] = $connect->lastInsertId(); // retrieve inserted id
        if($_SESSION['regis_type'] == 1) // agent 
            {                    
                  
                  
          header("location:agent_dashboard");
      }
      else if($_SESSION['regis_type'] == 2) // user/customer
                  {
                    
                  
                  
          header("location:user_dashboard");
      }

    }
      else
      {
       $message = "<label>Wrong Password</label>";
      }
    }
 }
 else
 {
  $message = "<label>Wrong Username</labe>";
 }
}


if ($message !="") {
  ?>
    <div style="font-size:18px;background-color:orange; widows: 100%;text-align: center;"><?php echo $message; ?></div>
  <?php
}



// echo $message;


//Registration 


?>


 <!--Login/Registration model box-->
<div class="container">
  
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      
       <div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#login">Login</a></li>
        <li class="tab"><a href="#signup">Registration</a></li>
      </ul>
      
      <div class="tab-content">

        <div id="login">   

            <h3>Welcome Back!</h3>
          
            <form action="" method="post">
          
            <div class="field-wrap">
                <label class="signup-info">
                  Email Address<span class="req">*</span>
                </label>
                <input type="text" name="l_email" required autocomplete="off" class="rg-input"/>
            </div>
          
            <div class="field-wrap">
              <label class="signup-info">
                Password<span class="req">*</span>
              </label>
              <input type="password" name="l_pass" required autocomplete="off" class="rg-input"/>
            </div>
          
          <p class="forgot"><a href="#">Forgot Password?</a></p>
          
          <button type="submit" name="l_submit" class="button button-block"/>Log In</button>
          
          </form>

        </div>

        <div id="signup">   
          <p class="rg-info" style="margin-top: -16px;margin-bottom: 27px;">Register With US</p>
          
          <form action="" method="post">
          
          <div class="top-row">
            <div class="field-wrap">
              <label class="signup-info">
                First Name<span class="req">*</span>
              </label>
              <input type="text" name="r_fname" required autocomplete="off" class="rg-input" />
            </div>
        
            <div class="field-wrap">
              <label class="signup-info">
                Last Name<span class="req">*</span>
              </label>
              <input type="text"required name="r_lname" autocomplete="off" class="rg-input"/>
            </div>
          </div>


          <div class="field-wrap">
            <label class="signup-info">
              Email Address<span class="req">*</span>
            </label>
            <input type="email" name="r_email" required autocomplete="off" class="rg-input"/>
          </div>
          
          
          <div class="field-wrap">
            <label class="signup-info">
             Password<span class="req">*</span>
            </label>
            <input type="password" name="r_pwd" required autocomplete="off" class="rg-input"/>
          </div>
          
          <div class="field-wrap">
            <label class="signup-info" for="phonenum">
              Mobile number<span class="req">*</span>
            </label>
            <input  type="text/number" name="r_contact" maxlength="10" minlength="6"class="rg-input"/>
          </div>
           
          <span class="rg-info">  Register as:</span>
          <br>
          <br>
          <!-- see globale array for 2: user, 1: agent -->
          <label class="crcontainer">User
          <input type="radio" value="2" checked="checked" name="r_radio">
          <span class="checkmark"></span>
          </label>
         <label class="crcontainer">Broker/Agent
         <input type="radio" value="1" name="r_radio">
        <span class="checkmark"></span>
        </label>
        <br>

        
        <label class="ck-container">I Accept, all the T&C.
        <input type="checkbox" name="r_checkbox"  >
        <span class="ck-checkmark"></span>
        </label>

          <button type="submit" name="r_submit" class="button button-block"/>Register</button>
          
          </form>

        </div>
        
       
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
      </div>
      
    
  </div>
  
</div>
    <!--model box-->
    
    
    
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="myjs/login.js"></script>
  <script type="text/javascript">
      
      
      
      
      <?php

      
    
    
       ?>
      
                          
  </script>

