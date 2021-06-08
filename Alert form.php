<!DOCTYPE html>
<html lang="en">
<head>
  <title>Alert Form Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>


<div class="container">
	<br>
  <h4>Set new property alerts</h4>
  <br>
  <!--first radio-->
  <form>
<label style="font-weight: 600;" >Looking For:</label>
&nbsp;
<input type="radio" value="choice1"  name="looking_for" id="Residential" checked style="height: 11px;"><label for="pemp_yes"style="font-size: 14px;">Residential</label>
<input type="radio" value="choice2" name="looking_for" id="Commercial" style="height: 11px;"><label for="pemp_no" style="font-size: 14px;">Commercial</label>
  <!-- End first radio-->

<div class="res-choice">
  
    <div class="res_detail">
       
        <!--second radio-->
        
    <form>
      <label style="font-weight: 600;">I wish to:</label>
    <label class="radio-inline" style="font-size: 14px;">
      <input type="radio" name="optradio" style="height: 11px;"checked >Buy
    </label>
    <label class="radio-inline" style="font-size: 14px;">
      <input type="radio" name="optradio" style="height: 11px;">Rent
    </label>
    <label class="radio-inline" style="font-size: 14px;">
      <input type="radio" name="optradio" style="height: 11px;">PG
    </label>
  </form>
         <!--End second radio-->
        <!--residential type chech box list-->

<div class="container">
  
  <form action="/action_page.php">
    <label style="margin-left: -16px;font-weight: 600;">Property Type:</label>
    <div class="container-fluid">
    <div class="form-check-inline">
      <label class="form-check-label" for="check1">
        <input type="checkbox" class="form-check-input" id="check1" name="" value="something" checked>Residential Apartment
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label" for="check2">
        <input type="checkbox" class="form-check-input" id="check2" name="" value="something">Residential Land
      </label>
    </div>
    <br>
    <div class="form-check-inline">
      <label class="form-check-label" for="check3">
        <input type="checkbox" class="form-check-input" id="check3" name="" value="something">Independent House/Villa
      </label>
    </div>
  </div>
    
   
  </form>
</div>
        <!--End residential type chech box list-->
    </div>
</div>
<!--commercial type-->
<div class="com-choice" style="display:none;">
    <div class="com_detail">
       
        <!--third radio-->
        <form>
      <label style="font-weight: 600;">I wish to:</label>
    <label class="radio-inline" style="font-size: 14px;">
      <input type="radio" name="optradio" style="height: 11px;"checked >Buy
    </label>
    <label class="radio-inline" style="font-size: 14px;">
      <input type="radio" name="optradio" style="height: 11px;">Lease
    </label>
   
  </form>
        <!-- end third radio-->
        <!--commercial type check list-->
  <div class="container">
  
  <form action="/action_page.php">
    <label style="margin-left: -16px;font-weight: 600;">Property type:</label>
    <div class="container-fluid">
    <div class="form-check-inline">
      
      <label class="form-check-label" for="check1">
        <input type="checkbox" class="form-check-input" id="check1" name="" value="something" checked>Ready to move office
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label" for="check2">
        <input type="checkbox" class="form-check-input" id="check2" name="" value="something">Bare shell office space
      </label>
    </div>
    <br>
    <div class="form-check-inline">
      <label class="form-check-label" for="check3">
        <input type="checkbox" class="form-check-input" id="check3" name="" value="something">Co-working office space
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label" for="check3">
        <input type="checkbox" class="form-check-input" id="check4" name="" value="something">Commercial Office/Space
      </label>
    </div>
    <br>
    <div class="form-check-inline">
      <label class="form-check-label" for="check1">
        <input type="checkbox" class="form-check-input" id="check5" name="" value="something" checked>Commercial Shops
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label" for="check2">
        <input type="checkbox" class="form-check-input" id="check6" name="" value="something">Commercial Land/Inst. Land
      </label>
    </div>
    <br>
    <div class="form-check-inline">
      <label class="form-check-label" for="check3">
        <input type="checkbox" class="form-check-input" id="check7" name="" value="something">Commercial Showrooms
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label" for="check3">
        <input type="checkbox" class="form-check-input" id="check8" name="" value="something">Agricultural/Farm Land
      </label>
    </div>
    <br>
    <div class="form-check-inline">
      <label class="form-check-label" for="check1">
        <input type="checkbox" class="form-check-input" id="check9" name="" value="something" checked>Industrial Lands/Plots
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label" for="check2">
        <input type="checkbox" class="form-check-input" id="check10" name="" value="something">Factory
      </label>
    </div>
    <br>
    <div class="form-check-inline">
      <label class="form-check-label" for="check3">
        <input type="checkbox" class="form-check-input" id="check11" name="" value="something">Ware House
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label" for="check3">
        <input type="checkbox" class="form-check-input" id="check12" name="" value="something">Office in IT Park
      </label>
    </div>
    <br>
    <div class="form-check-inline">
      <label class="form-check-label" for="check1">
        <input type="checkbox" class="form-check-input" id="check13" name="" value="something" checked>Hotels/Resorts
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label" for="check2">
        <input type="checkbox" class="form-check-input" id="check14" name="" value="something">Guest-House/Banquet-Halls
      </label>
    </div>
    <br>
    <div class="form-check-inline">
      <label class="form-check-label" for="check3">
        <input type="checkbox" class="form-check-input" id="check15" name="" value="something">Space in Retail Mall
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label" for="check3">
        <input type="checkbox" class="form-check-input" id="check16" name="" value="something">Office in Buisenes Park
      </label>
    </div>
    <br>
    <div class="form-check-inline">
      <label class="form-check-label" for="check3">
        <input type="checkbox" class="form-check-input" id="check17" name="" value="something">Busieness center
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label" for="check3">
        <input type="checkbox" class="form-check-input" id="check18" name="" value="something">Manufacturing
      </label>
    </div>
    <br>
    <div class="form-check-inline">
      <label class="form-check-label" for="check3">
        <input type="checkbox" class="form-check-input" id="check19" name="" value="something">Cold Storage
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label" for="check3">
        <input type="checkbox" class="form-check-input" id="check20" name="" value="something">Time Share
      </label>
    </div>

    
   </div>
  </form>
</div>

      <!--End commercial type check list-->
        

    </div>
</div>
<!--budget preference-->
 <div class="container">
       <label style="margin-left: -16px;font-weight: 600;">Budget Preference:</label>
  <table class="table table-borderless" style="width:400px;">
    <thead >
      <tr>
        <th>
        <form action="/action_page.php" style="width:106px;">
       <div class="form-group">
     
      <select class="form-control" id="sel1" name="" style="font-size: 11px;height: 37px;">
        <option>Min</option>
        <option>5 Lacks</option>
        <option>10 Lacks</option>
        <option>15 Lacks</option>
        <option>20 Lacks</option>
        <option>25 Lacks</option>
        <option>30 Lacks</option>
        <option>40 Lacks</option>
        <option>50 Lacks</option>
        <option>60 Lacks</option>
        <option>75 Lacks</option>
        <option>90 Lacks</option>
        <option>1 Crores</option>
        <option>2 Crores</option>
        <option>3 Crores</option>
        <option>5 Crores</option>
        <option>10 Crores</option>
        <option>20 Crores</option>
        <option>30 Crores</option>
        <option>40 Crores</option>
        <option>50 Crores</option>
        <option>60 Crores</option>
        <option>70 Crores</option>
        <option>80 Crores</option>
        <option>90 Crores</option>
        <option>100Crores</option>
        <option>100+ Crores</option>
      </select>
     
      
      </div>
   
    </form>
   </th>
   
   <th>
        <form action="/action_page.php" style="width:106px;">
       
       <div class="form-group">
     
      <select class="form-control" id="sel1" name="" style="font-size: 11px;height: 37px;">
       <option>Max</option>
        <option>5 Lacks</option>
        <option>10 Lacks</option>
        <option>15 Lacks</option>
        <option>20 Lacks</option>
        <option>25 Lacks</option>
        <option>30 Lacks</option>
        <option>40 Lacks</option>
        <option>50 Lacks</option>
        <option>60 Lacks</option>
        <option>75 Lacks</option>
        <option>90 Lacks</option>
        <option>1 Crores</option>
        <option>2 Crores</option>
        <option>3 Crores</option>
        <option>5 Crores</option>
        <option>10 Crores</option>
        <option>20 Crores</option>
        <option>30 Crores</option>
        <option>40 Crores</option>
        <option>50 Crores</option>
        <option>60 Crores</option>
        <option>70 Crores</option>
        <option>80 Crores</option>
        <option>90 Crores</option>
        <option>100Crores</option>
        <option>100+ Crores</option>
      </select>
     
      
    </div>
   
   </form>
  </th>
        
 </tr>
</thead>
</table>
</div>

<!-- end budget preference-->
<!--choose location-->
<form class="form-horizontal" action="/action_page.php">
      <div class="form-group" style="margin-top: -25px;">
      <label class="control-label col-sm-2" for="email" style="margin-left: -16px;font-weight: 600;">Choose Location:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="location" placeholder="Enter Location" name="location" style="width: 271px;margin-left: 15px;"required>
      </div>
    </div>
  </form>
  <!-- end choose location-->
  <!--area preference-->
  <div class="container com-choice" style="display:none;">

       <label style="margin-left: -16px;font-weight: 600;">Area Preference:</label>
  <table class="table table-borderless" style="width:400px;">
    <thead >
      <tr>
        <th>
       <form class="form-horizontal" action="/action_page.php">
      <div class="form-group">
      
      <div class="col-sm-10">
        <input type="value" class="form-control" id="min value" placeholder="Min" name="min" style="margin-left: -6px;width: 65px;">
      </div>
     </div>
    </form>
       </th>
       <th>
       <form class="form-horizontal" action="/action_page.php">
      <div class="form-group">
     
      <div class="col-sm-10">
        <input type="value" class="form-control" id="max value" placeholder="Max" name="max" style="margin-left:0px;width: 64px;">
      </div>
    </div>
  </form>
       </th>
   
       <th>
        <form action="/action_page.php" style="width:100px;">
       
       <div class="form-group">
     
      <select class="form-control" id="sel1" name="measurements" style="font-size: 11px;height: 37px;">
        <option>sq.ft</option>
        <option>sq.yards</option>
        <option>sq.m</option>
        <option>acres</option>
        <option>marla</option>
        <option>cents</option>
        <option>bigha</option>
        <option>Kottah</option>
        <option>Kanal</option>
        <option>grounds</option>
        <option>acres</option>
        <option>biswa</option>
        <option>guntha</option>
        <option>aankadam</option>
        <option>hectares</option>
        <option>rood</option>
        <option>chataks</option>
        <option>perch</option>
      </select>
     
      
    </div>
   
   </form>
  </th>
        
 </tr>
</thead>
</table>
</div>

  <!-- end area preference-->
  <!--bed room choice-->
  <div class="container res-choice">
  
  <form action="/action_page.php">
    <label style="margin-left: -16px;font-weight: 600;">Bedrooms:</label>
    <div class="container-fluid">
    <div class="form-check-inline">
      <label class="form-check-label" for="check1">
        <input type="checkbox" class="form-check-input" id="check1" name="" value="something" checked>1 Bedroom
      </label>
    </div>
    <br>
    <div class="form-check-inline">
      <label class="form-check-label" for="check2">
        <input type="checkbox" class="form-check-input" id="check2" name="" value="something">2 Bedrooms
      </label>
    </div>
    <br>
    <div class="form-check-inline">
      <label class="form-check-label" for="check3">
        <input type="checkbox" class="form-check-input" id="check2" name="" value="something">3 Bedrooms
      </label>
    </div>
    <br>
    <div class="form-check-inline">
      <label class="form-check-label" for="check3">
        <input type="checkbox" class="form-check-input" id="check2" name="" value="something">4 Bedrooms
      </label>
    </div>
    <br>
    <div class="form-check-inline">
      <label class="form-check-label" for="check3">
        <input type="checkbox" class="form-check-input" id="check2" name="" value="something">5 Bedrooms
      </label>
    </div>
    <br>
    <div class="form-check-inline">
      <label class="form-check-label" for="check3">
        <input type="checkbox" class="form-check-input" id="check2" name="" value="something">5+ Bedrooms
      </label>
    </div>
  </div>
    
   
  </form>
</div>
  <!-- end bed room choice-->

  <!--sale type check-->
  <div class="container">
  <label style="margin-left: -16px;font-weight: 600;">Sale Type:</label>
  <form action="/action_page.php">
    <div class="form-check-inline">
      <label class="form-check-label" for="check1">
        <input type="checkbox" class="form-check-input" id="check1" name="Resale" value="something" checked style="margin-left: 16px;">Resale
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label" for="check2">
        <input type="checkbox" class="form-check-input" id="check2" name="New Booking" value="something" >New Booking
      </label>
    </div>
    
  </form>
</div>
  <!-- end sale type check-->
  <!--availablity check-->
  <div class="container">
  <label style="margin-left: -16px;font-weight: 600;">Availability:</label>
  <form action="/action_page.php">
    <div class="form-check-inline">
      <label class="form-check-label" for="check1">
        <input type="checkbox" class="form-check-input" id="check1" name="Under Construction" value="something" checked style="margin-left: 16px;">Under Construction
      </label>
    </div>
    <br>
    <div class="form-check-inline">
      <label class="form-check-label" for="check2">
        <input type="checkbox" class="form-check-input" id="check2" name="Ready to Move" value="something" style="margin-left: 16px;">Ready to Move
      </label>
    </div>
    
  </form>
</div>
  <!--end availablity check-->
  <br>
  <h5 >Alert preference</h5>
  <br>
  <!--alert radio-->
  <div class="container">
    <label style="margin-left: 0px;font-weight: 600;">Alert Frequency:</label>
   <form>
      
    <label class="radio-inline" style="font-size: 14px;">
      <input type="radio" name="optradio" style="height: 11px;"checked >Daily
    </label>
    <label class="radio-inline" style="font-size: 14px;">
      <input type="radio" name="optradio" style="height: 11px;">Weekly
    </label>
    <label class="radio-inline" style="font-size: 14px;">
      <input type="radio" name="optradio" style="height: 11px;">Twice a month
    </label>
    <label class="radio-inline" style="font-size: 14px;">
      <input type="radio" name="optradio" style="height: 11px;">Monthly
    </label>
  </form>
</div>
  <!--end alert radio-->

  <div class="container">
  
  <form class="form-horizontal" action="#">
    <div class="form-group">
      <label class="control-label col-sm-2"  style="margin-left:0px;font-weight: 600;" >Name your alert:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name_alert" placeholder="" name="email" style="width: 271px;margin-left:0px;"required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="name" style="margin-left:0px;font-weight: 600;">Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" style="width: 271px;margin-left:0px;"required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email" style="margin-left:0px;font-weight: 600;">Email:</label>
      <div class="col-sm-10">          
        <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" style="width: 271px;margin-left:0px;"required>
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default" style="background-color:#3366FF;margin-left: 0px;">Set my email alert</button>
      </div>
    </div>
  </form>
</div>
</form>
</div>
<!--scripts-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script type="text/javascript">
  $("input[name='looking_for']").on("click", function(){
    $(".res-choice").toggle(this.value === "choice1" && this.checked);
    $(".com-choice").toggle(this.value === "choice2" && this.checked);
});
</script>
</body>
</html>
