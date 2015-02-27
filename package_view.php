<?php
	include 'headers/connect_to_mysql.php';
	include 'headers/session.php';

?>


<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->

<!-- Mirrored from thevectorlab.net/adminlab/managed_table.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 04 Nov 2014 07:58:54 GMT -->
<head>
   <meta charset="utf-8" />
   <title>View Packages</title>
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
   <script type="text/javascript">
	function deleteConfirm(id)
	{
		var result = confirm("Want to delete?");
		if(result == true){
			return true;
			}
		else{
			return false;
		}
	}
	</script>

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
   
  
    <!-- END PAGE HEADER--> 
    <!-- BEGIN PAGE CONTENT-->
 
                   <!-- END THEME CUSTOMIZER-->
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->     
                  <h3 class="page-title">
                     Al-Furat
                     <small>Travel & Tours</small>
                  </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="index.php"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="#">Package</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="package_view.php">View Package</a><span class="divider-last">&nbsp;</span></li>
                   </ul>
                  <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->

            <!-- BEGIN ADVANCED TABLE widget-->
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN EXAMPLE TABLE widget-->
                    <div class="widget">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i>All Package</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <div class="portlet-body">
                                
                                <div class="space15"></div>
                                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                    <thead>
                                    <tr>
                                    <th style="width:5%;">id</th>
                                    <th style="width:76%;">Package Name</th>
                                    <th>Status</th>
                                        <th style="display:none">Edit</th>
                                        <th style="display:none">Delete</th>
                                    </tr>
                                    
                                  
    <?php
				$query_package = "SELECT * FROM `package`";
			$result_package = mysqli_query($con,$query_package);
			while($row_package = mysqli_fetch_array($result_package))
			{
				$package_name = $row_package['package_name'];
				$packageID = $row_package['package_id'];
					echo"<tr class=''>
					<td class=''>${packageID}</td>
					<td class=''>${package_name}</td>
					<td style='width:26%;'><a href='delete_package.php?package_id=$packageID' id='delete_button' class='btn btn-danger' onClick='return deleteConfirm(30);'>
					<i class='icon-trash'></i> Delete </a>
					<a href='insert_package.php?packageID=$packageID'  id='update_button' class='btn btn-success'>
					<i class='icon-edit'></i> Update</a></td>
					<td style='display:none'><a class='' href='javascript:;'>Edit</a></td>
				<td style='display:none'><a class='' href='javascript:;'>Delete</a></td>
	</tr>";
											
			}
    ?>
		

                                </tr>
                            </thead>
                            <tbody>
                                
                                </tbody>
                        </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE widget-->
                </div>
            </div>

            <!-- END ADVANCED TABLE widget-->

            <!-- END PAGE CONTENT-->
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->
   </div>
   <!-- END CONTAINER -->
   <!-- BEGIN FOOTER -->
   <div id="footer">
       2015 &copy; Digital EggHeads.
      <div class="span pull-right">
         <span class="go-top"><i class="icon-arrow-up"></i></span>
      </div>
   </div>
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
      <script src="script/table-editable.js"></script>

   <script>
      jQuery(document).ready(function() {       
         // initiate layout and plugins
         App.init();
      });
   </script>
</body>
<!-- END BODY -->

<!-- Mirrored from thevectorlab.net/adminlab/managed_table.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 04 Nov 2014 07:58:54 GMT -->
</html>
