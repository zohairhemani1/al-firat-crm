<?php
	include 'headers/connect_to_mysql.php';
	include 'headers/session.php';
	$posted = 0;

	if($_POST)
	{
		$dateFrom = $_POST['dateFrom'];
		$dateTo = $_POST['dateTo'];
		$packageID = $_POST['package'];
		$employeeID = $_POST['employee'];
		
		
		
		
		
		
		$query_main = "SELECT *,q.`time_stamp` as lastUpdated, f.`email` as customerEmail FROM `form` f,`package` p, `query` q,`login` l where f.`user_id` = q.`user_id` AND q.`package_id` = p.`package_id` AND l.emp_id = q.emp_id";
		
		if(isset($packageID) AND $packageID!="all" AND $packageID!="")
		{
			$query_main.= " AND p.`package_id` = '{$packageID}'";
		}
		else
		{
			$query_main.= " AND p.`package_id` = p.`package_id`";
		}
		if($dateFrom !="" AND $dateTo !="")
		{
			$query_main.=" AND (DATE_FORMAT(date(f.`time_stamp`),'%m/%d/%Y') between '{$dateFrom}' AND '{$dateTo}')";
		}
		
		if(isset($employeeID) AND $employeeID!="all" AND $employeeID!="" )
		{
			//echo "empID: " . $employeeID;
			$query_main.=" AND l.`emp_id` = '{$employeeID}'";
		}
		echo $query_main;
		
		/*$query_main = "SELECT *,q.`time_stamp` as lastUpdated FROM `form` f,`package` p, `query` q,`login` l where (DATE_FORMAT(date(f.`time_stamp`),'%m/%d/%Y') between '{$dateFrom}' AND '{$dateTo}') AND f.`user_id` = q.`user_id` AND q.`package_id` = p.`package_id` AND l.emp_id = q.emp_id AND p.`package_id` = '{$package}'"
					or die('error while fething every thing from database');
					echo $query_main;*/
		$result_main = mysqli_query($con,$query_main);
		$posted = 1;
		
	}

?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->

<!-- Mirrored from thevectorlab.net/adminlab/managed_table.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 04 Nov 2014 07:58:54 GMT -->
<head>
   <meta charset="utf-8" />
   <title>Al-Furat</title>
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
   <link rel="stylesheet" type="text/css" href="stylesheet/jquery-ui/jquery-ui-1.10.1.custom.min.css"/>
   <link rel="stylesheet" type="text/css" href="stylesheet/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
   <link rel="stylesheet" type="text/css" href="stylesheet/jquery-tags-input/jquery.tagsinput.css" />    
   <link rel="stylesheet" href="stylesheet/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
   <link rel="stylesheet" type="text/css" href="stylesheet/gritter/css/jquery.gritter.css" />
	 <link rel="stylesheet" type="text/css" href="stylesheet/bootstrap-daterangepicker/daterangepicker.css" />
	
	<link rel="stylesheet" type="text/css" href="stylesheet/bootstrap-datepicker/css/datepicker.css" />
	<link rel="stylesheet" type="text/css" href="stylesheet/bootstrap-timepicker/compiled/timepicker.css" />
	<link rel="stylesheet" type="text/css" href="stylesheet/bootstrap-colorpicker/css/colorpicker.css" />
    <link href="stylesheet/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="stylesheet/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
<link href="stylesheet/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
<link href="stylesheet/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" />
<link href="css/style_responsive.css" rel="stylesheet" />
<link href="css/style_default.css" rel="stylesheet" id="style_color" />
<link rel="stylesheet" href="stylesheet/data-tables/DT_bootstrap.css" />
   <link rel="stylesheet" type="text/css" href="stylesheet/chosen-bootstrap/chosen/chosen.css" />

<style>

<?php
	if($posted==0)
	{
		echo "#reportButtons{display:none;}";
	}
?>

</style>

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
                           <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="#">Repoting</a><span class="divider-last">&nbsp;</span></li>
                   </ul>
                  <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->

            <!-- BEGIN ADVANCED TABLE widget-->
            <div class="row-fluid">
                <div class="span12">
            <!-- BEGIN Serach TABLE widget-->
					<div class="widget">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i>Search Table</h4>
                            
                        </div>
                        <div id="widget_height"  class="widget-body">
                            <div class="portlet-body">
			<form action="reporting.php" method="post">

    	
			
            <div class="control-group" id="date_range">
            <label class="control-label">Date Range</label>
            <div id="text_field" class="controls">
                <input class="m-wrap small" size="16" type="text" placeholder="Starting Date" value="" id="ui_date_picker_range_from" name="dateFrom"/>
                    <span class="text-inline">&nbsp;to&nbsp;</span>
                <input class="m-wrap small" size="16" type="text" placeholder="End Date" value="" id="ui_date_picker_range_to" name="dateTo"/>
            </div>
        </div>

                        <div class="control-group" id="package_drop">
                              <label class="control-label">Packages</label>
                              <div class="controls">
                                  <select id="_dropdown" class="span6 chosen" data-placeholder="Choose a Package" tabindex="1" name="package">
									<option class="customer_serach" value=""></option>
									<option value="all">ALL</option>
									<?php include "headers/package_detail.php"; ?>
                                 </select>
                              </div>
                        </div>
						<div class="control-group" id="_customer">
                              <label class="control-label">Employees</label>
                              <div class="controls">
                                  <select id="dropdown" class="span6 chosen" data-placeholder="Choose an Employee" tabindex="1" name="employee">
									<option class="customer_serach" value=""></option>
									<option value="all">ALL</option>
									<?php include "headers/employee_detail.php"; ?>
                                    
                                 </select>
                              </div>
                        </div><br>
                        
						
			        <div id="repoting_button" class="form-actions clearfix">         
                  <input type="submit" value="SUBMIT" class="btn btn-success button-submit" />
                </div>
			</form> 
            </div></div></div>
               <!--          <div class="control-group" id="_customer">
                              <label class="control-label">Custom Dropdown</label>
                              <div class="controls">
                                 <select id="_dropdown" class="span6 chosen" data-placeholder="Choose a Category" tabindex="1">
                                    <option class="customer_serach" value=""></option>
                                    <option value="Category 1">Category 1</option>
                                    <option value="Category 2">Category 2</option>
                                    <option value="Category 3">Category 5</option>
                                    <option value="Category 4">Category 4</option>
                                 </select>
                              </div>
                           </div>
 

	                    <!-- BEGIN EXAMPLE TABLE widget-->
                    
                                    
                                  
    <?php

			if($posted==1)
			{
	echo"
	<!--table Widget start here-->
	<div class='widget'>
                        <div class='widget-title'>
                            <h4><i class='icon-reorder'></i>Managed Table</h4>
                            <span class='tools'>
                                <a href='javascript:;' class='icon-chevron-down'></a>
                                <a href='javascript:;' class='icon-remove'></a>
                            </span>
                        </div>
                        <div class='widget-body'>
                            <div class='portlet-body'>
                                
                                <div class='space15'></div>
                                <table class='table table-striped table-hover table-bordered' id='sample_editable_1'>
                                    <thead>
                                    <tr>
                                        <th style='width:5px;'>id</th>
                                        <th>Username</th>
                                        <th>Package Name</th>
                                        <th>Last Updated</th>
                                        <th>Status</th>
                                        <th>Action</th>
                    
					</tr>
					<!--fetching array value-->
					";
									
									
				while($row = mysqli_fetch_array($result_main))
					{
					$user_name = $row['user_name'];
					$email = $row['email'];
					$location = $row['location'];
					$user_id = $row['user_id'];
					$package_name = $row['package_name'];
					$lastUpdated = $row['lastUpdated'];
					$employeeName = $row['user'];
					$employeeName = strtoupper($employeeName);
					$status = $row['status'];
					
					switch ($status) 
					{
					case 0:
						$status = "Unfixed";
						break;
					case 1:
						$status = "Fixed";
						break;
					case -1:
						$status = "Expired";
						break;
					}
					
					echo"<tr class='odd gradeX'>
							<td class='hidden-phone'>${user_id}</td>
							<td class='hidden-phone'>${user_name}</td>
							<td class='hidden-phone'>${package_name}</td>
							<td class='hidden-phone'>${lastUpdated} - ${employeeName}</td>
							<td style='width:26%;'>${status}</td>
							<td style='width:9%;'>
								<a href='register_form.php?customerID=$user_id' class='btn btn-success'><i class='icon-edit'></i> Update</a></td>			
						</tr>";
					}
				} ?>
					</tbody>
                        </table>
			
					</div>
					     </div>

			
						
               
                    <!-- END EXAMPLE TABLE widget-->
		
        </div>
            </div>
			
			<div id="reportButtons">
			
				<!--<form method="post" action="downloadCSV.php?type=email&query=<?php echo $query_main; ?>">
					<input class = 'btn btn-success button-submit' type="submit" value="DOWNLOAD EMAIL AS .CSV" />
				</form>
				<form method="post" action="downloadCSV.php?type=phone&query=<?php echo $query_main; ?>">
					<input type="submit" class='btn btn-success button-submit' value="DOWNLOAD PHONE NUMBER AS .CSV" />
				</form>-->
				<a href="downloadCSV.php?type=email&query=<?php echo $query_main; ?>" target="_blank">
					<input class ="btn btn-success button-submit" type="submit" value="DOWNLOAD EMAIL AS .CSV" />
				</a>
				<a href="downloadCSV.php?type=phone&query=<?php echo $query_main; ?>" target="_blank">
					<input class = "btn btn-success button-submit" type="submit" value="DOWNLOAD PHONE NUMBER AS .CSV" />
				</a>
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
 <a href ="http://www.digitaleggheads.com/">2014-15 &copy; Digital Eggheads.</a>
      <div class="span pull-right">
         <span class="go-top" style="width:16px; float:right;"><i class="icon-arrow-up"></i></span>
      </div>
   </div>
   <!-- END FOOTER -->
   <!-- BEGIN JAVASCRIPTS -->
   <!-- Load javascripts at bottom, this will reduce page load time -->
   <script src="script/jquery-1.8.3.min.js"></script>
   <script src="stylesheet/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>

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
   <script type="text/javascript" src="stylesheet/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
   <script type="text/javascript" src="stylesheet/jquery-tags-input/jquery.tagsinput.min.js"></script>
   <script type="text/javascript" src="stylesheet/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script> 
   <script type="text/javascript" src="stylesheet/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
   <script type="text/javascript" src="stylesheet/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
   <script type="text/javascript" src="stylesheet/bootstrap-datepicker/js/bootstrap-datepicker.js"></script> 
<script type="text/javascript" src="stylesheet/bootstrap-daterangepicker/date.js"></script> 
<script type="text/javascript" src="stylesheet/bootstrap-daterangepicker/daterangepicker.js"></script> 
<script type="text/javascript" src="stylesheet/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script> 
<script type="text/javascript" src="stylesheet/bootstrap-timepicker/js/bootstrap-timepicker.js"></script> 



   <script src="script/scripts.js"></script>
      <script src="script/table-editable.js"></script>

   <script src="script/ui-jqueryui.js"></script>
   <script>
      jQuery(document).ready(function() {       
         // initiate layout and plugins
         App.init();
		 UIJQueryUI.init();
      });
   </script>
    
</body>
<!-- END BODY -->

<!-- Mirrored from thevectorlab.net/adminlab/managed_table.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 04 Nov 2014 07:58:54 GMT -->
</html>
