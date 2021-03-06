<?php 

	include 'headers/connect_to_mysql.php';
	include 'headers/session.php';
	
	$formAction = "";
	$emp_id = "";	
	$user_name = "";
	$mobile = "";
	$mobile_other = "";
	$tele = "";
	$location = "";
	$email = "";
	$packageID = "";
	$description = "";
	$queryID = ""; // hidden field
	$counter="";
	
	
	if($_POST)
	{
		
		$emp_id = $_SESSION['emp_id'];	
		$user_name = $_POST['user_name'];
		$mobile = $_POST['mobile'];
		$mobile_other = $_POST['mobile_other'];
		$tele = $_POST['tele'];
		$location = $_POST['location'];
		$email = $_POST['email'];
		$packageID = $_POST['packageID'];
		$description = $_POST['description'];
		$queryID = $_POST['queryID']; // hidden field
		$optionsRadios = $_POST['optionsRadios'];
		$error = "";
		
		if(!isset($mobile) || $mobile == "" || empty($mobile))
		{
			$error = "	    <div class='alert alert-danger'>
                <button class='close' data-dismiss='alert'>×</button>
                <strong>Danger!</strong> You have to to write your mobile no on step 1 .
            </div>";
			
		}
		else
		{
			if(isset($_GET['customerID']))
			{
				/* UPDATE THE EXISTING CUSTOMER */
				$customerID = $_GET['customerID'];
				$query = "UPDATE `form` SET `emp_id` = '$emp_id', `user_name` = '$user_name', `mobile` = '$mobile', `mobile_other` = '$mobile_other', `tele` = '$tele', `location` = '$location', `email` = '$email', `time_stamp` = now() WHERE user_id = '$customerID'";
				$result = mysqli_query($con,$query);
				
				
				for($i=0; $i<count($_POST['packageID']); $i++)
				{
					
					/*here we check if the query already exist, if yes then we update else we insert as a new query.*/
					
					$query = "SELECT * FROM `query` WHERE `id` = '{$queryID[$i]}'";
					$result = mysqli_query($con,$query);
					$rowQuery = mysqli_fetch_assoc($result);
					$count = mysqli_num_rows($result);
					$descriptionFromDatabase = $rowQuery['description'];
					$timestamp = $rowQuery['time_stamp'];
					
					if($count == 1)
					{
						// check if old query has been updated or not. if not, then we will use old timestamp.
						
						if($description[$i]===$descriptionFromDatabase)
						{
						}
						else
						{
							date_default_timezone_set("Asia/Karachi");
							$timestamp = date("Y-m-d H:i:s");
						}
						
						$query = "UPDATE `query` set `package_id` = '$packageID[$i]', `time_stamp` = '$timestamp', `description` = '$description[$i]', 
								`emp_id` = '$emp_id',`status` = '$optionsRadios[$i]' WHERE `id` = '$queryID[$i]'";
						$result = mysqli_query($con,$query) or die("ERROR!");
					}
					else
					{
						$query = "INSERT INTO `query` (`user_id`,`emp_id`,`package_id`,`time_stamp`,`description`,`status`) VALUES('$customerID','$emp_id','$packageID[$i]',now(),'$description[$i]','$optionsRadios[$i]')";
						$result = mysqli_query($con,$query);
					}
					
				}
				
				header('Location: index.php');
				
				
			} // ENDING IF OF ISSET.
			else
			{
			
				$query = "INSERT INTO `form`(`emp_id`,`user_name`, `mobile`, `mobile_other`, `tele`, `location`, `email`, `time_stamp`) VALUES ('$emp_id','$user_name','$mobile','$mobile_other','$tele','$location','$email',now())"
				or die ('sorry there is an error in login Insert code');
				$result = mysqli_query($con,$query);
				
				/* 
					GETTING THE LAST ROW THAT IS INSERTED.
				*/
				
				
				$query = "select max(`user_id`) as maxID from `form`";
				$result = mysqli_query($con,$query);
				$row = mysqli_fetch_assoc($result);
				$user_id = $row['maxID'];
				
				
				
				/*
					INSERTING MULTIPLE QUERIES BELOW.
				*/
				
				
				
				
					if(isset($_POST["packageID"]))
					{
						
						$packageIDArray = $_POST['packageID'];
						$descriptionArray = $_POST['description'];
						
						for($i=0; $i<count($_POST['packageID']); $i++)
						{
							/*echo "PACKAGEID: ". $packageIDArray[$i];
							echo "<br/>";
							echo "DESCRIPTION: " . $descriptionArray[$i];*/
							
							$query = "INSERT into query(`user_id`,`emp_id`,`package_id`,`time_stamp`,`description`,`status`)
									VALUES ('$user_id','$emp_id','$packageIDArray[$i]',now(),'$descriptionArray[$i]','$optionsRadios[$i]')";
							$result = mysqli_query($con,$query);
							
						}
						
						
					}
					
					header('Location: index.php');
					
				} // ENDING ELSE OF ISSET()
			
		}
	} // IF Post ends here.
	
	else
	{
		if(isset($_GET['customerID']))
		{
			$customerID = $_GET['customerID'];
			$formAction = "?customerID={$customerID}";
			$query = "SELECT * from `form` where `user_id` = '{$customerID}'";
			$result = mysqli_query($con,$query);
			$row = mysqli_fetch_assoc($result);
			$user_name = $row['user_name'];
			$mobile = $row['mobile'];
			$mobile_other = $row['mobile_other'];
			$tele = $row['tele'];
			$location = $row['location'];
			$email = $row['email'];
			
		}
	}
	
?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->

<!-- Mirrored from thevectorlab.net/adminlab/blank.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 04 Nov 2014 07:58:59 GMT -->

<head>
<meta charset="utf-8" />
<title>Registration</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />
<link href="stylesheet/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="stylesheet/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
<link href="stylesheet/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
<link href="stylesheet/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" />
<link href="css/style_responsive.css" rel="stylesheet" />
<link href="css/style_default.css" rel="stylesheet" id="style_color" />
<link rel="stylesheet" href="stylesheet/data-tables/DT_bootstrap.css" />
<link rel="stylesheet" type="text/css" href="stylesheet/gritter/css/jquery.gritter.css" />
<link rel="stylesheet" type="text/css" href="stylesheet/chosen-bootstrap/chosen/chosen.css" />
<link href="stylesheet/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="stylesheet/gritter/css/jquery.gritter.css" />
<link rel="stylesheet" type="text/css" href="stylesheet/uniform/css/uniform.default.css" />
<link rel="stylesheet" type="text/css" href="stylesheet/chosen-bootstrap/chosen/chosen.css" />
<link rel="stylesheet" type="text/css" href="stylesheet/jquery-tags-input/jquery.tagsinput.css" />
<link rel="stylesheet" type="text/css" href="stylesheet/clockface/css/clockface.css" />
<link rel="stylesheet" type="text/css" href="stylesheet/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
<link rel="stylesheet" type="text/css" href="stylesheet/bootstrap-datepicker/css/datepicker.css" />
<link rel="stylesheet" type="text/css" href="stylesheet/bootstrap-timepicker/compiled/timepicker.css" />
<link rel="stylesheet" type="text/css" href="stylesheet/bootstrap-colorpicker/css/colorpicker.css" />
<link rel="stylesheet" href="stylesheet/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
<link rel="stylesheet" href="stylesheet/data-tables/DT_bootstrap.css" />
<link rel="stylesheet" type="text/css" href="stylesheet/bootstrap-daterangepicker/daterangepicker.css" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
<?php
include 'headers/menu-top-navigation.php'; 
?>
<!-- BEGIN PAGE -->
<div id="main-content"> 
  <!-- BEGIN PAGE CONTAINER-->
  <div class="container-fluid"> 
    <!-- BEGIN PAGE HEADER-->
    <div class="row-fluid">
      <div class="span12"> 
        
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title"> Registration Form </h3>
        <ul class="breadcrumb">
          <li> <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span> </li>
          <li> <a href="#">My Home></a> <span class="divider-last">&nbsp;</span> </li>
        </ul>
        <!-- END PAGE TITLE & BREADCRUMB--> 
      </div>
    </div>
    <!-- END PAGE HEADER--> 
    <!-- BEGIN PAGE CONTENT-->
    <!-- <div class="row-fluid">
      <div class="span12"> 
         BEGIN RECENT ORDERS PORTLET
        <div class="widget">
          <div class="widget-title">
            <h4><i class="icon-tags"></i> CRM Registration</h4>
            <span class="tools"> <a href="javascript:;" class="icon-chevron-down"></a> <a href="javascript:;" class="icon-remove"></a> </span> </div>
           <div class="widget-body">
            <div class="alert alert-success">
              <button class="close" data-dismiss="alert">×</button>
              <strong>Welcome to CRM Registraion Portal</strong> </div>
          </div>
        </div>
      </div>
    </div> -->
    <div class="row-fluid">
      <div class="span12">
      <?php
					 if($_POST){
					 if(isset($error)){
						echo $error;	
					 }
					 }
					?>
                    
        <div class="widget box blue" id="form_wizard_1">
          <div class="widget-title">
            <h4> <i class="icon-reorder"></i> Registration Form - <span class="step-title">Step 1 of 3</span> </h4>
            <span class="tools"> <a href="javascript:;" class="icon-chevron-down"></a> <a href="javascript:;" class="icon-remove"></a> </span> </div>
          <div class="widget-body form">
            <form action="register_form.php<?php echo $formAction; ?>" method="post" class="form-horizontal" id="myForm">
              <div class="form-wizard">
                <div class="navbar steps">
                  <div class="navbar-inner">
                    <ul class="row-fluid">
                      <li class="span3"> <a href="#tab1" data-toggle="tab" class="step active"> <span class="number">1</span> <span class="desc"><i class="icon-ok"></i> Step 1</span> </a> </li>
                      <li class="span3"> <a href="#tab2" data-toggle="tab" class="step"> <span class="number">2</span> <span class="desc"><i class="icon-ok"></i> Step 2</span> </a> </li>
                      <li class="span3"> <a href="#tab3" data-toggle="tab" class="step"> <span class="number">3</span> <span class="desc"><i class="icon-ok"></i> Final Step</span> </a> </li>
                    </ul>
                  </div>
                </div>
                <div id="bar" class="progress progress-striped">
                  <div class="bar"></div>
                </div>
				<?php 
			if ($email == null)
				('Location:index.php');
			?>
            
		  <div class="tab-content">
                  <div class="tab-pane active" id="tab1">
                    <h3 class="page-title">Fill up step 1</h3>
                    <div class="control-group">
                      <label class="control-label">Username</label>
                      <div class="controls">
                        <div class="input-icon left"> <i class="icon-user"></i>
                          <input name="user_name" id="inputUser" placeholder="Enter your name" type="text" class="span6" value="<?php echo $user_name; ?>" />
                          <span class="help-inline"></span> </div>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Email</label>
                      <div class="controls">
                        <div class="input-icon left"> <i class="icon-envelope"></i>
                          <input id="inputEmail" name="email" placeholder="Enter your email" type="text" class="span6" value="<?php echo $email; ?>" />
                          <span class="help-inline"></span> </div>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Location</label>
                      <div class="controls">
                        <div class="input-icon left"> <i class="icon-map-marker"></i>
                          <input id="inputLocation" name="location" placeholder="Enter your location" type="text" class="span6" value="<?php echo $location;?>" />
                          <span class="help-inline"></span> </div>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Mobile 1</label>
                      <div class="controls">
                      <div class="input-icon left"> <i class="icon-phone"></i>
                        <input id="phone" name="mobile" class="span6" type="text" placeholder="Enter your mobile no" value="<?php echo $mobile; ?>">
                        <span class="help-inline"></span> </div>
                    </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Mobile 2</label>
                      
                      <div class="controls">
                      <div class="input-icon left"> <i class="icon-phone"></i>
                        <input id="inputMobile1" name="mobile_other" class="span6" type="text" placeholder="Enter your mobile no (optional)" value="<?php echo $mobile_other; ?>"                                       >
                        <span class="help-inline"></span> </div>
                    </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Tele #</label>
                      <div class="controls">
                        <div class="input-icon left"> <i class="icon-book"></i>
                          <input id="inputTele" name="tele" class="span6" type="text" placeholder="Enter your tele no" value="<?php echo $tele; ?>" />
                          <span class="help-inline"></span> </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="tab2">
                    <h3 class="page-title">Fill up step 2</h3>
                    <div class="btn-group">
					
							echo "<button onclick='addInput()' type='button' class='btn btn-primary'> Add New <i class='icon-plus'></i> </button>";
					
                      
                    </div>
                    
                    
                    <?php 
					
						if(isset($_GET['customerID']))
						{
							
							$query = "SELECT q.*,p.package_name FROM `query` q,`package`p where q.`user_id` = '{$customerID}' AND p.package_id = q.package_id";
							$result = mysqli_query($con,$query);
							
							$counter = 0;
							
							while($row = mysqli_fetch_assoc($result))
							{
								
								$description = $row['description'];
								$package_name = $row['package_name'];
								$package_id = $row['package_id'];
								$query_id = $row['id'];
								$timestamp = $row['time_stamp'];
								$status = $row['status'];
								
								echo "<div class='control-group'>
										  <label class='control-label'>Packages</label>
										  <div class='controls'>
											<select id='' name='packageID[{$counter}]' class='' data-placeholder='Choose a Category' tabindex='1'>
											<option value='{$package_id}'>{$package_name}</option>
												
											</select>
									  </div>
									</div>
									<div class='control-group'>
									  <label class='control-label'>Description</label>
									  <div class='controls'>
										<textarea name='description[{$counter}]' id='inputDescription' class='span6 ' rows='3'>{$description}</textarea>
					
										
                          
 										</div>
									</div>
									
									<input type='text' name='queryID[{$counter}]' value='{$query_id}' style='display:none;'  />
									                                 
                                 <div class='control-group'>
									  <div class='controls'>
										 <label class='radio'>
										 <input type='radio' name='optionsRadios[{$counter}]' value='1'"; if($status == 1){echo " checked ";}
										 echo " />
										 Fixed
										 </label>
										 <label class='radio'>
										 <input type='radio' name='optionsRadios[{$counter}]' value='0'";  if($status == 0){echo " checked ";}
										 echo " />
										 Unfixed
										 </label>  
										 <label class='radio'>
										 <input type='radio' name='optionsRadios[{$counter}]' value='-1'"; if($status == -1){echo " checked ";} 
										 echo " />
										 Expired
										 </label> 
										<label class='user_name'>
											{$_username}
										 </label> <label class='radio'>
										 {$timestamp}
										 </label> 
									  </div>
								  </div>
                              
									"
									;
							
							$counter++;
							}
						}
						else
						{
							echo "<div class='control-group'>
                      <label class='control-label'>Packages</label>
                      <div class='controls'>
                        <select id='inputPackages' name='packageID[0]' class='' data-placeholder='Choose a Category' tabindex='1'>";
                         	
								include 'headers/package_detail.php';
								
                        echo"</select>
                      </div>
                    </div>
                    <div class='control-group'>
                      <label class='control-label'>Description</label>
                      <div class='controls'>
                        <textarea name='description[0]' id='inputDescription' class='span6 ' rows='3'></textarea>
                      
					
																	  </div>
                    <div class='employe'>
					 <a href='#'class='name'>{$_username}</a>
                                                <span class='datetime' {$display} /> ";?>  <?php if(isset($timestamp)){echo "at".$timestamp;}else{$display ="diplay:none";}?> <?php echo"</span>
					</div>
					</div>
					
					
									<div class='control-group'>
									  <div class='controls'>
										 <label class='radio'>
										 <input type='radio' name='optionsRadios[{$counter}]' value='1' />
										 Fixed
										 </label>
										 <label class='radio'>
										 <input type='radio' name='optionsRadios[{$counter}]' value='0' />
										 Unfixed
										 </label>  
										 <label class='radio'>
										 <input type='radio' name='optionsRadios[{$counter}]' value='-1' />
										 Expired
										 </label> 
										 </div>
								  </div>
					
					";
					$counter++;
						}
					
					?>
                    
                    
                    <span id="response"></span> </div>
                  <div class="tab-pane" id="tab3">
                  	
                    
                    <!-- <h3 class="page-title">Finall Step</h3>
                    <div class="control-group">
                      <label class="control-label">Username</label>
                      <div class="controls">
                        <input id="showUser" type="text" value="" class="span6" disabled />
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Email</label>
                      <div class="controls">
                        <input id="showEmail" type="text" value="" class="span6" disabled />
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Mobile 1</label>
                      <div class="controls">
                        <input id="showMobile" type="text" value="" class="span6" disabled />
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Mobile 2</label>
                      <div class="controls">
                        <input id="showMobile1" type="text" value="" class="span6" disabled />
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Tele #</label>
                      <div class="controls">
                        <input id="showTele" type="text" value="" class="span6" disabled />
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Location</label>
                      <div class="controls">
                        <input id="showLocation" type="text" value="" class="span6" disabled />
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Package</label>
                      <div class="controls">
                        <input id="showPackage" type="text" value="" class="span6" disabled />
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Description</label>
                      <div class="controls">
                        <input id="showDescription" type="text" value="" class="span6" disabled />
                      </div>
                    </div>-->
                  </div>
                  
                </div>

                <div class="form-actions clearfix"> <a href="javascript:;" class="btn button-previous"> <i class="icon-angle-left"></i> Back </a>  <button id="continueButton" class="btn btn-primary blue button-next" type="button" class="" >Continue <i class="icon-angle-right"></button></i>  
                  <!-- <a href="" id="submitThis" class="btn btn-success button-submit" onClick="document.getElementById("myForm").submit();" >-->
					
				<input type="submit"  class="btn btn-success button-submit" />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- END PAGE CONTENT--> 
  </div>
  <!-- END PAGE CONTAINER--> 
</div>
<!-- END PAGE -->
</div>
<!-- END CONTAINER --> 
<!-- BEGIN FOOTER -->
<div id="footer"> <a href ="http://www.digitaleggheads.com">2014-15 &copy; Digital Eggheads</a>
  <div class="span pull-right"> <span class="go-top"><i class="icon-arrow-up"></i></span> </div>
</div>
<!-- END FOOTER --> 
<!-- BEGIN JAVASCRIPTS --> 
<!-- Load javascripts at bottom, this will reduce page load time --> 
<script src="script/jquery-1.8.3.min.js"></script> 
<script src="stylesheet/bootstrap/js/bootstrap.min.js"></script> 
<script src="stylesheet/bootstrap/js/bootstrap.min.js"></script> 
<script src="stylesheet/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script> 
<script src="script/jquery.blockui.js"></script> 
<!-- ie8 fixes --> 
<!--[if lt IE 9]>
   <script src="js/excanvas.js"></script>
   <script src="js/respond.js"></script>
   <![endif]--> 
<script type="text/javascript" src="stylesheet/chosen-bootstrap/chosen/chosen.jquery.min.js"></script> 
<script type="text/javascript" src="stylesheet/uniform/jquery.uniform.min.js"></script> 
<script src="script/scripts.js"></script> 
<script type="text/javascript" src="stylesheet/data-tables/jquery.dataTables.js"></script> 
<script type="text/javascript" src="stylesheet/data-tables/DT_bootstrap.js"></script> 
<script src="script/scripts.js"></script> 
<script src="stylesheet/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script> 
<script src="script/table-editable.js"></script> 
<script type="text/javascript" src="stylesheet/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script> 
<script type="text/javascript" src="stylesheet/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script> 
<script type="text/javascript" src="stylesheet/clockface/js/clockface.js"></script> 
<script type="text/javascript" src="stylesheet/jquery-tags-input/jquery.tagsinput.min.js"></script> 
<script type="text/javascript" src="stylesheet/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script> 
<script type="text/javascript" src="stylesheet/bootstrap-datepicker/js/bootstrap-datepicker.js"></script> 
<script type="text/javascript" src="stylesheet/bootstrap-daterangepicker/date.js"></script> 
<script type="text/javascript" src="stylesheet/bootstrap-daterangepicker/daterangepicker.js"></script> 
<script type="text/javascript" src="stylesheet/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script> 
<script type="text/javascript" src="stylesheet/bootstrap-timepicker/js/bootstrap-timepicker.js"></script> 
<script type="text/javascript" src="stylesheet/bootstrap-inputmask/bootstrap-inputmask.min.js"></script> 
<script src="stylesheet/fancybox/source/jquery.fancybox.pack.js"></script> 
<script src="script/scripts.js"></script> 
<script>
document.getElementById("inputUser").onchange = function () {
    document.getElementById("showUser").value = this.value;
};
</script> 
<script>
document.getElementById("inputEmail").onchange = function () {
    document.getElementById("showEmail").value = this.value;
};
</script> 
<script>
document.getElementById("inputLocation").onchange = function () {
    document.getElementById("showLocation").value = this.value;
};
</script> 
<script>
document.getElementById("inputMobile").onchange = function () {
    document.getElementById("showMobile").value = this.value;
};
</script> 
<script>
document.getElementById("inputMobile1").onchange = function () {
    document.getElementById("showMobile1").value = this.value;
};
</script> 
<script>
document.getElementById("inputTele").onchange = function () {
    document.getElementById("showTele").value = this.value;
};
</script> 
<script>
document.getElementById("inputPackages").onchange = function () {
    document.getElementById("showPackage").value = $( "#inputPackages option:selected" ).text();
};
</script> 
<script>
document.getElementById("inputDescription").onchange = function () {
    document.getElementById("showDescription").value = this.value;
};
</script> 

	<script>
		function validate()
	{
    //form validation
    var phone=document.getElementById('phone');
     if (phone.value == null || phone.value==""){
       phone.style.border="2px solid red";
     }
	else{
		  //var myvar = <?php echo json_encode($blue  = "blue button-next"); ?>;
		  //alert(myvar);
		  //$("#continueButton").addClass(myvar);

	}
	 }
	 
</script> 
<script>

      jQuery(document).ready(function() {       
         // initiate layout and plugins
         App.init();
      });
   </script> 
<script>
var countBox =1;
var counter = '<?php echo $counter; ?>';
//alert(counter);
function addInput()
{
	 
	// alert(counter);
     var boxName="textBox"+countBox;	
		
		document.getElementById('response').innerHTML+='<div id="delete"><br/><div class="control-group">\
                      <label class="control-label">Packages</label>\
                      <div class="controls">\
                        <select id="'+boxName+'" name="packageID['+ counter +']" class="span6 chosen packageDropDown" data-placeholder="Choose a Category">\
                          <?php
									
										include 'headers/package_detail.php';
										
								 	?>
                        </select>\
                      </div>\
                    </div>\
                    <div class="control-group">\
                      <label class="control-label">Description</label>\
                      <div class="controls">\
                        <textarea name="description['+ counter +']" id="'+boxName+'" class="span6 " rows="3"></textarea>\
                      </div>\
                    </div>\
					<div class="control-group">\
					<div class="controls">\
						<div class="1">\
						<input type="radio" name="optionsRadios['+counter+']" class="css-checkbox" value="1" checked />\
						<label for="radio4" class="css-label  radGroup2">Fixed</label>\
						<input type="radio" name="optionsRadios['+counter+']" class="css-checkbox" value="0">\
						<label for="radio5" class="css-label radGroup2">Unfixed</label>\
						<input type="radio" name="optionsRadios['+counter+']" class="css-checkbox" value="-1">\
						<label for="radio6" class="css-label radGroup2">Expired</label>\
						</div>\
					</div></div><button class="btn btn-danger" id="Delete"><i class="icon-remove icon-white"></i>&nbsp;Delete</button>';
		
     countBox += 1;
	 counter++;
}
</script>
<script>
$(function(){

    $('#Delete').live('click',function(e){
    $(this).parent().remove();
    });
 
});
</script>

<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->

<!-- Mirrored from thevectorlab.net/adminlab/blank.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 04 Nov 2014 07:58:59 GMT -->
</html>