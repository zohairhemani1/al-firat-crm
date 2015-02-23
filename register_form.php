<?php 

	include 'headers/connect_to_mysql.php';
	include 'headers/session.php';
	if($_POST)
	{
		
		//$user_id = $_POST['user_id'];
		$emp_id = $_SESSION['emp_id'];	
		$user_name = $_POST['user_name'];
		$mobile = $_POST['mobile'];
		$mobile_other = $_POST['mobile_other'];
		$tele = $_POST['tele'];
		$location = $_POST['location'];
		$email = $_POST['email'];
		$packageID = $_POST['packageID'];
		$description = $_POST['description'];
	
		
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
		
		
	
		$query_extra = "INSERT INTO `query`(`user_id`, `emp_id`, `package_id`,`description`, `time_stamp`) VALUES ('$user_id','$emp_id','$packageID','$description',now())"
		or die ('sorry there is an error in login Insert code');
		$result_extra = mysqli_query($con,$query_extra);
	}
	


	
	

	/*if($old_empID == $SESSION['emp_id'])
	{
		$query_detailUpdate = "UPDATE * FROM login WHERE package = '$package', description = '$description'"
		or die ('sorry there is an error in package update code');
	}
	else
	{
		$query_detailInsert = "INSERT INTO `query`(`user_id`,`emp_id`,`package_id`,`description`, `time_stamp`) 
		VALUES('$emp_id','$package_id','$description',now())"
		or die ('sorry there is an error in query code');
	} */
	
?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->

<!-- Mirrored from thevectorlab.net/adminlab/blank.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 04 Nov 2014 07:58:59 GMT -->

<head>
<meta charset="utf-8" />
<title>Dashboard</title>
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
    <div class="row-fluid">
      <div class="span12"> 
        <!-- BEGIN RECENT ORDERS PORTLET-->
        <div class="widget">
          <div class="widget-title">
            <h4><i class="icon-tags"></i> CRM Registration</h4>
            <span class="tools"> <a href="javascript:;" class="icon-chevron-down"></a> <a href="javascript:;" class="icon-remove"></a> </span> </div>
          <div class="widget-body">
          <div class="alert alert-success">
                                        <button class="close" data-dismiss="alert">×</button>
                                        <strong>Welcome to CRM Registraion Portal</strong> 
                                    </div>

          
           </div>
        </div>
      </div>
    </div>
            <div class="row-fluid">
               <div class="span12">
                  <div class="widget box blue" id="form_wizard_1">
                     <div class="widget-title">
                        <h4>
                           <i class="icon-reorder"></i> Form Wizard - <span class="step-title">Step 1 of 3</span>
                        </h4>
                        <span class="tools">
                           <a href="javascript:;" class="icon-chevron-down"></a>
                           <a href="javascript:;" class="icon-remove"></a>
                        </span>
                     </div>
                     <div class="widget-body form">
                        <form action="register_form.php" method="post" class="form-horizontal" id="myForm">
                           <div class="form-wizard">
                              <div class="navbar steps">
                                 <div class="navbar-inner">
                                    <ul class="row-fluid">
                                       <li class="span3">
                                          <a href="#tab1" data-toggle="tab" class="step active">
                                          <span class="number">1</span>
                                          <span class="desc"><i class="icon-ok"></i> Step 1</span>
                                          </a>
                                       </li>
                                       <li class="span3">
                                          <a href="#tab2" data-toggle="tab" class="step">
                                          <span class="number">2</span>
                                          <span class="desc"><i class="icon-ok"></i> Step 2</span>
                                          </a>
                                       </li>
                                       <li class="span3">
                                          <a href="#tab3" data-toggle="tab" class="step">
                                          <span class="number">3</span>
                                          <span class="desc"><i class="icon-ok"></i> Final Step</span>
                                          </a>
                                       </li>

                                    </ul>
                                 </div>
                              </div>
                              <div id="bar" class="progress progress-striped">
                                 <div class="bar"></div>
                              </div>
                              <div class="tab-content">
                                 <div class="tab-pane active" id="tab1">
                                            <h3 class="page-title">Fill up step 1</h3>
                                    <div class="control-group">
                                       <label class="control-label">Username</label>
                                       <div class="controls">
                                          <div class="input-icon left">
                                    <i class="icon-user"></i>
                                          <input required name="user_name" id="inputUser" type="text" class="span6" />
                                          <span class="help-inline">Give your username</span>
                                       </div>
                                    </div>
                                    </div>
                                    <div class="control-group">
                                       <label class="control-label">Email</label>
                                       <div class="controls">
									<div class="input-icon left">
                                    <i class="icon-envelope"></i>
                                          <input required id="inputEmail" name="email" type="text" class="span6" />
                                          <span class="help-inline">Give your Email</span>
                                       </div>
                                    </div>
                                    </div>
                                    <div class="control-group">
                                       <label class="control-label">Location</label>
                                       <div class="controls">
									<div class="input-icon left">
                                    <i class="icon-map-marker"></i>
                                          <input required id="inputLocation" name="location" type="text" class="span6" />
                                          <span class="help-inline">Give your Location</span>
                                       </div>
                                    </div>
                                    </div>
                                   <div class="control-group">
                                    <label class="control-label">Mobile 1</label>
                                    <div class="controls">
                                        <input required id="inputMobile" name="mobile" class="span5" type="text" data-mask="9999-99-99-999" placeholder="">
                                        <span class="help-inline">9999-99-99-999</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Mobile 2</label>
                                    <div class="controls">
                                        <input id="inputMobile1" name="mobile_other" class="span5" type="text" data-mask="9999-99-99-999" placeholder=""
                                        ><span class="help-inline">9999-99-99-999</span>
                                    </div>
                                </div>
                                     <div class="control-group">
                                    <label class="control-label">Tele #</label>
                                    <div class="controls">
 									<div class="input-icon left">
                                    <i class="icon-book"></i>
                                        <input required id="inputTele" name="tele" class="span5" type="text" data-mask="999-99999999" placeholder="" />
                                        <span class="help-inline">999-99999999</span>
                                    </div>
                                </div>
                                </div>
                                 </div>
                                 <div class="tab-pane" id="tab2">
                                    <h3 class="page-title">Fill up step 2</h3>
                                       <div class="btn-group">
                    <button onclick="addInput()" type="button" class="btn green"> Add New <i class="icon-plus"></i> </button>
                  </div>

                           <div class="control-group">
                              <label class="control-label">Packages</label>
                              <div class="controls">
                                 <select id="inputPackages" name="packageID" class="span6 chosen" data-placeholder="Choose a Category" tabindex="1">
                                    <?php
									
									$query_package = "SELECT * FROM `package`";
									$result_package = mysqli_query($con,$query_package);
									while($row_package = mysqli_fetch_array($result_package))
									{
										$package_name = $row_package['package_name'];
										$package_id = $row_package['package_id'];
										echo "
                                     		<option value='{$package_id}'>{$package_name}</option>
                                		 ";
									}
								 ?>
								 </select>
                              </div>
                           </div>
                  
                           <div class="control-group">
                              <label class="control-label">Description</label>
                              <div class="controls">
                                 <textarea required name="description" id="inputDescription" class="span6 " rows="3"></textarea>
                                </div>
                           </div>
                                 </div>
                                 <div class="tab-pane" id="tab3">
                                    <h3 class="page-title">Finall Step</h3>
									<div class="control-group">
                                       <label class="control-label">UserName</label>
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
                                    </div>
                                    
                                    <div class="control-group">
                                       <label class="control-label"></label>
                                       <div class="controls">
                                          <label class="checkbox">
                                          <input type="checkbox" value="" /> I am satisfied with my package
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-actions clearfix">
                                 <a href="javascript:;" class="btn button-previous">
                                 <i class="icon-angle-left"></i> Back 
                                 </a>
                                 <a href="javascript:;" class="btn btn-primary blue button-next">
                                 Continue <i class="icon-angle-right"></i>
                                 </a>
                                 <!-- <a href="" id="submitThis" class="btn btn-success button-submit" onClick="document.getElementById("myForm").submit();" >
                                 Submit <i class="icon-ok"></i> -->
                                 
                                 <input type="submit" class="btn btn-success button-submit" />
                                
                                 
                               
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
<div id="footer"> <a href ="https://www.facebook.com/avialdo.inc">2014-15 &copy; Avialdo.</a>
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
    document.getElementById("showPackage").value = this.value;
};
</script>
<script>
document.getElementById("inputDescription").onchange = function () {
    document.getElementById("showDescription").value = this.value;
};
</script>

<script>
</script>
<script>

      jQuery(document).ready(function() {       
         // initiate layout and plugins
         App.init();
      });
   </script>
   <script>
var countBox =1;
function addInput()
{
     var boxName="textBox"+countBox; 
document.getElementById('responce').innerHTML+='<br/><label class="control-label">Username</label><input required name="package_name" id="'+boxName+'" type="text" class="span6"/><span  class="help-inline">Give your username</span></div><div><br/><div class="control-group"><label class="control-label">Description</label><div class="controls"><textarea required name="description" id="'+boxName+'" class="span6 " rows="3"></textarea></div></div><br/>';
     countBox += 1;
}
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->

<!-- Mirrored from thevectorlab.net/adminlab/blank.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 04 Nov 2014 07:58:59 GMT -->
</html>
