<?php 

include 'headers/connect_to_mysql.php';
$packageName = "";
$formAction = "";
$title = "";
	isset($_GET['packageID']);
	echo "package_id-->{$packageID}";

if(isset($_GET['packageID']))
{
	

	$packageID = $_GET['packageID'];
	$formAction = "?packageID={$packageID}";
	$query = "SELECT * from `package` WHERE `package_id` = '{$packageID}'";
	$result = mysqli_query($con,$query);
	$row = mysqli_fetch_assoc($result);
	$packageName = $row['package_name'];
}

if($_POST)
{
	if(isset($_GET['packageID']))
	{
		$packageName = $_POST['id'];
		$packageName = $packageName[0];
		$query = "UPDATE `package` SET `package_name` = '{$packageName}' WHERE `package_id` = '{$packageID}' ";
		$result = mysqli_query($con,$query);
		$title = "Update Package";
		header('Location:package_view.php');
	}
	else
	{
		foreach($_POST['id'] as $key => $value) 
		{
			echo "KEY: ", $value;
			$query = "INSERT INTO package(`package_name`) VALUES ('$value')";
			$result = mysqli_query($con,$query);
			$title = "Add Package";
		}	
	}
}

?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<!-- Mirrored from thevectorlab.net/adminlab/editable_table.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 04 Nov 2014 07:58:54 GMT -->
<head>
<meta charset="utf-8" />
<title><?php if(isset($packageID)){ $title = "Update package"; echo $title;}else{$title="Add Package"; echo $title;}?></title>
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />
<link href="stylesheet/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="stylesheet/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
<link href="stylesheet/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" />
<link href="css/style_responsive.css" rel="stylesheet" />
<link href="css/style_default.css" rel="stylesheet" id="style_color" />
<link href="stylesheet/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="stylesheet/uniform/css/uniform.default.css" />
<link rel="stylesheet" href="stylesheet/data-tables/DT_bootstrap.css" />
<link rel="stylesheet" type="text/css" href="stylesheet/gritter/css/jquery.gritter.css" />
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
<div id="main-content"> 
  <!-- BEGIN PAGE CONTAINER-->
  <div class="container-fluid"> 
    <!-- BEGIN PAGE HEADER-->
    <div class="row-fluid">
      <div class="span12"> 
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
                     Al-Furat
                     <small>Travel & Tours</small>
                  </h3>
        <ul class="breadcrumb">
          <li> <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span> </li>
          <li> <a href="#"><?php echo strtoupper($_username); ?></a> <span class="divider">&nbsp;</span> </li>
          <li><a href="#"><?php echo $title ; ?></a><span class="divider-last">&nbsp;</span></li>
        </ul>
        <!-- END PAGE TITLE & BREADCRUMB--> 
      </div>
    </div>
    <!-- END PAGE HEADER--> 
    <!-- BEGIN PAGE CONTENT-->
    <div class="row-fluid">
      <div class="span12">
        <div class="widget box blue" id="form_wizard_1">
          <div class="widget-title">
            <h4> <i class="icon-reorder"></i><?php echo $title;?> <span class="step-title"></span> </h4>
            <span class="tools"> <a href="javascript:;" class="icon-chevron-down"></a> <a href="javascript:;" class="icon-remove"></a> </span> </div>
          <div class="widget-body form">
            <form action="insert_package.php<?php echo $formAction; ?>" method="post" class="form-horizontal" id="myForm">
              <div class="form-wizard">
                <div class="clearfix">
                
               
                
                  <div class="btn-group" style=" <?php if(isset($_GET['packageID']))
				{
					echo "display:none;";
				}
				?>">
                    <button name="button" onclick="addInput()" type="button" class="btn btn-primary"> Add New <i class="icon-plus"></i> </button>
                  </div>
                  <div class="space15"></div>
                  <label class="control-label">Package Name</label>
                  <input required name="id[0]" type="text" class="span6" value = "<?php echo $packageName; ?>"/>
                  <span class="help-inline"></span> 
                  </div>
              </div>
              <span id="responce"></span>
              <input id="submit_package" type="submit" value="SUBMIT" class="btn btn-success " />
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
<div id="footer"> 2015 &copy; Digital EggHeads. </div>
<!-- END FOOTER --> 
<!-- BEGIN JAVASCRIPTS --> 
<!-- Load javascripts at bottom, this will reduce page load time --> 

<script src="script/jquery-1.8.3.min.js"></script> 
<script src="stylesheet/bootstrap/js/bootstrap.min.js"></script> 
<script src="script/jquery.blockui.js"></script> 
<!-- ie8 fixes --> 
<!--[if lt IE 9]>
   <script src="js/excanvas.js"></script>
   <script src="js/respond.js"></script>
   <![endif]--> 
<script type="text/javascript" src="stylesheet/uniform/jquery.uniform.min.js"></script> 
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
<script>
       jQuery(document).ready(function() {
           App.init();
           TableEditable.init();
       });
   </script> 
<script>

var countBox =1;
function addInput()
{
     var boxName="textBox"+countBox; 
document.getElementById('responce').innerHTML+='<div id="delete"><br/><label class="control-label">Package Name</label>\
<input required name="id['+countBox+']" id="'+boxName+'" type="text" class="span6"/><button class="btn btn-danger" id="Delete"><i class="icon-remove icon-white"></i>Delete</button><br/>';
     countBox += 1;

}
</script>
<script>
$(function(){

    $('#Delete').live('click',function(e){
    $(this).parent().remove();
    });
 
});
</script>
</body>
<!-- END BODY -->

<!-- Mirrored from thevectorlab.net/adminlab/editable_table.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 04 Nov 2014 07:58:55 GMT -->
</html>
