<?php require_once("session.php");
      
// require_once('class.user.php');
// $user = new USER();
include('dbcon.php');


$Primary_Vendor_Name="";

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title></title>

		<meta name="description" content="Static &amp; Dynamic Tables" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">

		<?php include('header.php'); ?>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<?php include('nav/menu_nav.php'); ?>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="dashboard.php">Home</a>
							</li>

							<li>
								<a href="#">On Boarding List</a>
							</li>
							
						</ul><!-- /.breadcrumb -->

						
					</div>

					<div class="page-content">

						<?php include('theme-settings.php'); ?>

						<div class="row">
							<div class="col-xs-12">
                              <?php include('action_alerts.php'); ?>
                                <div class="row">
									<div class="col-xs-12">
										<h3 class="header smaller lighter blue">On Boarding List</h3>
                                       
                                         <!-- <a href="add_attendance.php" class="btn btn-info">  Add Leaves</a> -->
                                         
                                         
                                         <?php if(($user_role=='1') ||($user_role=='3')) { ?>
										 <a href="add_onboarding.php" class="btn btn-info" > Add On Boarding  </a>
										 <a href="archive_onboarding_list.php" class="btn btn-info" > Archive Boarding  </a>
										  
										 <?php } ?>
										 
  										 
										 
										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
										<div class="table-header">
											Results For "List Of On Boarding"
										</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														
														<th>S.No</th>
														<th>Edit</th>
														<th>Consultant Name</th>
														<th>Consultant Email</th>
														<th>Consultant Phone</th>
														<th>Vendor Company Name</th>
														<th>Vendor Recruiter Name</th>
														<th>Vendor Email</th>
														<th>Vendor Phone </th>
														<th>Bill Rate from Vendor </th>
														<th>Employee Type </th>
														<th>Client Name</th>
														<th>MSA</th>
														<th>PO</th>
														<th>Invoice Cycle</th>
														<th>Payment Terms</th>
														<th>Rate</th>
														<th style="width: 100px;">Start Date</th>
														<th style="width: 100px;">End Date</th>
														<th>Remarks</th>
														
														<th>Quickbooks</th>
														<th>CEIPAL Entry</th>
														<th>CEIPAL User</th>
														<th>Initial Timesheets</th>
														
														<th style="width: 100px;">Entry Date</th>
														<th style="width: 100px;">Last Modified Date</th>
    												  <?php if(($user_role=='1') ||($user_role=='3')) { ?>  <th>Action</th> <?php } ?>
														
														
													</tr>
												</thead>

												<tbody>
													 
													<?php   
                                                
													try{		
													    
													            
														    
													    
													    $stmt = $DBcon->prepare("SELECT * FROM  tbl_Onboardinglist  order by id desc");
													    
                                          			    
																					  $stmt->execute();

																					  $i="0";
																					  if($stmt->rowCount() > 0)
																					   {
																						   while($row=$stmt->FETCH(PDO::FETCH_ASSOC))                             
																  
																 {   
																	 $i=$i+1;

															    $id=$row['id'];
                                                                $Consultant_Name=$row['Consultant_Name'];
                                                                $Vendor_Name=$row['Vendor_Name'];
                                                                $Client_Name=$row['Client_Name'];
                                                                $Invoice_Cycle=$row['Invoice_Cycle'];
                                                                $Payment_Terms=$row['Payment_Terms'];
                                                                 $Rate=$row['Rate'];
                                                                $Start_Date=$row['Start_Date'];
                                                                $End_Date=$row['End_Date'];
                                                                $Remarks=$row['Remarks'];
                                                                $MSA=$row['MSA'];
                                                                $PO=$row['PO'];
                                                                $Contact_Person=$row['Contact_Person'];
                                                                $Email_Id=$row['Email_Id'];
                                                                $Phone_Number=$row['Phone_Number'];
                                                                $Quickbooks=$row['Quickbooks'];
                                                                $CEIPAL_entry=$row['CEIPAL_entry'];
                                                                $CEIPAL_user=$row['CEIPAL_user'];
                                                                $Initial_Timesheets=$row['Initial_Timesheets'];
                                                                
                                                                $updated_date=$row['updated_date'];
                                                                $created_date=$row['created_date'];
                                                                
                                                                $text_Existing_Client=$row['text_Existing_Client'];
                                                                $Vendor_Recruiter_Name=$row['Vendor_Recruiter_Name'];
                                                              
                                                              
                                                               $due_Date = date('Y-m-d', strtotime($Start_Date));
                                                               $date4 = date('Y-m-d');
                                                               $days = (strtotime($date4) - strtotime($due_Date)) / (60 * 60 * 24);
                                                                
   															   ?>
   															   
 <?php if($days <= '90'){ ?>  															   
<?php

if(($Consultant_Name !="") &&
($Vendor_Name !="") &&
($Invoice_Cycle !="") &&
($Payment_Terms !="") &&
($Rate !="") &&
($Start_Date !="") &&
($Contact_Person !="") &&                                                   
($Email_Id !="") &&                                                        
($Phone_Number !="") &&
($Quickbooks !="") &&
($CEIPAL_entry !="") &&
($CEIPAL_user !="") &&
($Initial_Timesheets !="")){  ?>
                                                    
                            
                                                    
                                                    <tr>
                                                     <td><?php echo $i ?></td>
											 <td>
															<div class="hidden-sm hidden-xs action-buttons">
																
															<a class="blue" href="add_onboarding.php?id=<?php echo $id ?>" data-toggle="modal">
																	<i class="ace-icon fa fa-pencil bigger-130"></i>
																</a>
                                                         </div>

															<div class="hidden-md hidden-lg">
																<div class="inline pos-rel">
																	<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
																		<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
																	</button>

																	<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																	
																		<li>
																			<a href="add_onboarding.php?id=<?php echo $id ?>" class="tooltip-success" data-rel="tooltip" title="Edit">
																				<span class="green">
																					<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																				</span>
																			</a>
																		</li>
                                                                         
																		
																		
                                                                    

																	</ul>
																</div>
															</div>
														</td>
											
										   	<td >
										   	    <?php
										   	       //echo $q="select * from Consultant_Details where Primary_Vendor_id='$Consultant_Name'";
										   	        $stmtp = $DBcon->prepare("SELECT ety.Et_Description,pvd.Primary_Vendor_Email_Id,pvd.Primary_Vendor_Contact_Phone_Number,cd.Cd_Email_Id,cd.Cd_Phone_No, pd.Proj_Bill_Rate, pd.Proj_Id , pd.Proj_Name , cd.Cd_First_Name , cd.Cd_Last_Name FROM tbl_Project_Details as pd
                                                        LEFT JOIN tbl_Consultant_Details as cd
                                                        ON cd.Cd_Id = pd.Cd_Id
                                                        LEFT JOIN Primary_Vendor_Details as pvd
                                                        ON pvd.Primary_Vendor_id = pd.Vd_id
                                                        LEFT JOIN tbl_Employee_Type as ety
                                                        ON ety.Et_Id = pd.Et_Id
                                                        where pd.Proj_Id='$Consultant_Name'
                                                        order by cd.Cd_First_Name asc");
													$stmtp->execute();
													while($rowp=$stmtp->fetch(PDO::FETCH_ASSOC))
													{   
													            $Consultant_id=$rowp['Proj_Id'];
													            $Proj_Name=$rowp['Proj_Name'];
																$Consultant_First_Name=$rowp['Cd_First_Name'];
																$Consultant_Last_Name=$rowp['Cd_Last_Name'];
																
																$Cd_Email_Id=$rowp['Cd_Email_Id'];
																$Cd_Phone_No=$rowp['Cd_Phone_No'];
																$Primary_Vendor_Email_Id=$rowp['Primary_Vendor_Email_Id'];
																$Primary_Vendor_Contact_Phone_Number=$rowp['Primary_Vendor_Contact_Phone_Number'];
																$Proj_Bill_Rate=$rowp['Proj_Bill_Rate'];
																$Et_Description=$rowp['Et_Description'];
																
																$fullname= $Consultant_First_Name.' '.$Consultant_Last_Name;
													} ?>
										   	    <?php echo $fullname ?>(<?php echo $Proj_Name ?>)</td>
										   	    <td ><?php echo $Cd_Email_Id ?></td>
										   	    <td ><?php echo $Cd_Phone_No ?></td>
										   	<td ><?php echo $Vendor_Name ?></td>
										   	<td ><?php echo $Vendor_Recruiter_Name ?></td>
										   	
										   	<td ><?php echo $Primary_Vendor_Email_Id ?></td>
										   	<td ><?php echo $Primary_Vendor_Contact_Phone_Number ?></td>
										   	<td ><?php echo $Proj_Bill_Rate ?></td>
										   	<td ><?php echo $Et_Description ?></td>
										   	
										   	
										   	<td ><?php echo $Client_Name ?></td>
										   	<td ><a href="documents/<?php echo $MSA ?>" target="_blank"><?php echo $MSA ?></a></td>
										   	<td ><a href="documents/<?php echo $PO ?>" target="_blank"><?php echo $PO ?></a></td>
										   	<td ><?php echo $Invoice_Cycle ?></td>
                                           <td ><?php echo $Payment_Terms ?></td>
                                           <td ><?php echo $Rate ?></td>
										   	<td style="width: 100px;"><?php 
										   	if(($Start_Date=='0000-00-00') || ($Start_Date=='')){  }else{
										   	
										   	echo $Start_Date = date("d/M/Y", strtotime($Start_Date));  } ?>
										   	</td>
										    <td style="width: 100px;"><?php 
										    
										    if(($End_Date=='0000-00-00') || ($End_Date=='')){  }else{
										    echo $End_Date = date("d/M/Y", strtotime($End_Date)); } ?></td>
                                           <td ><?php echo $Remarks ?></td>
                                           
                                           <td ><?php  if($Quickbooks==""){ }else{ echo "Yes"; } ?></td>
                                           <td ><?php if($CEIPAL_entry==""){ }else{ echo "Yes"; } ?></td>
                                           <td ><?php if($CEIPAL_user==""){ }else{ echo "Yes"; } ?></td>
                                           <td ><?php if($Initial_Timesheets==""){ }else{ echo "Yes"; } ?></td>
                                           
                                           <td style="width: 100px;"><?php echo $created_date = date("d/M/Y", strtotime($created_date)); ?></td>
										    <td style="width: 100px;"><?php 
										    
										    if($updated_date==""){ }else{
										    echo $updated_date = date("d/M/Y", strtotime($updated_date));  } ?></td>
                                           
                                                 
                                                                               
                                                                
                                                                
                                          
											<td>
															<div class="hidden-sm hidden-xs action-buttons">
																
															    <?php if(($user_role=='2') || ($user_role=='4')){  }else{?>
																 <a class="red" href="delete_onboarding.php?id=<?php echo $id ?>" onclick="return confirm('Are you sure you want to delete onboarding Details'); ">
																	<i class="ace-icon fa fa-trash-o bigger-130"></i>
																</a> <?php } ?>

                                                         </div>

															<div class="hidden-md hidden-lg">
																<div class="inline pos-rel">
																	<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
																		<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
																	</button>

																	<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																	<?php if(($user_role=='2') || ($user_role=='4')){  }else{?>
																		<li>
																			<a href="delete_onboarding.php?id=<?php echo $id ?>" class="tooltip-error" data-rel="tooltip" title="Delete" onclick="return confirm('Are you sure you want to delete onboarding Details'); ">
																				<span class="red">
																					<i class="ace-icon fa fa-trash-o bigger-120"></i>
																				</span>
																			</a>
																		</li><?php } ?>
																		
																		
                                                                    

																	</ul>
																</div>
															</div>
														</td>	
														
														
														
													</tr>
													
													<?php }else{ ?>
											<tr>		  
											 <td ><?php echo $i ?></td>
											 <td>
															<div class="hidden-sm hidden-xs action-buttons">
																
															<a class="blue" href="add_onboarding.php?id=<?php echo $id ?>" data-toggle="modal">
																	<i class="ace-icon fa fa-pencil bigger-130"></i>
																</a>
                                                         </div>

															<div class="hidden-md hidden-lg">
																<div class="inline pos-rel">
																	<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
																		<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
																	</button>

																	<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																	
																		<li>
																			<a href="add_onboarding.php?id=<?php echo $id ?>" class="tooltip-success" data-rel="tooltip" title="Edit">
																				<span class="green">
																					<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																				</span>
																			</a>
																		</li>
																	</ul>
																</div>
															</div>
														</td>
											
										   	<td style="background: #f34343;color: #fff;">
										   	    <?php
										   	       //echo $q="select * from Consultant_Details where Primary_Vendor_id='$Consultant_Name'";
										   	        $stmtp = $DBcon->prepare("SELECT ety.Et_Description,pvd.Primary_Vendor_Email_Id,pvd.Primary_Vendor_Contact_Phone_Number,cd.Cd_Email_Id,cd.Cd_Phone_No, pd.Proj_Bill_Rate, pd.Proj_Id , pd.Proj_Name , cd.Cd_First_Name , cd.Cd_Last_Name FROM tbl_Project_Details as pd
                                                        LEFT JOIN tbl_Consultant_Details as cd
                                                        ON cd.Cd_Id = pd.Cd_Id 
                                                        LEFT JOIN Primary_Vendor_Details as pvd
                                                        ON pvd.Primary_Vendor_id = pd.Vd_id
                                                        LEFT JOIN tbl_Employee_Type as ety
                                                        ON ety.Et_Id = pd.Et_Id
                                                        where pd.Proj_Id='$Consultant_Name'
                                                        order by cd.Cd_First_Name asc");
													$stmtp->execute();
													while($rowp=$stmtp->fetch(PDO::FETCH_ASSOC))
													{   
													            $Consultant_id=$rowp['Proj_Id'];
													            $Proj_Name=$rowp['Proj_Name'];
																$Consultant_First_Name=$rowp['Cd_First_Name'];
																$Consultant_Last_Name=$rowp['Cd_Last_Name'];
																
																$Cd_Email_Id=$rowp['Cd_Email_Id'];
																$Cd_Phone_No=$rowp['Cd_Phone_No'];
																$Primary_Vendor_Email_Id=$rowp['Primary_Vendor_Email_Id'];
																$Primary_Vendor_Contact_Phone_Number=$rowp['Primary_Vendor_Contact_Phone_Number'];
																$Proj_Bill_Rate=$rowp['Proj_Bill_Rate'];
																$Et_Description=$rowp['Et_Description'];
																
																$fullname= $Consultant_First_Name.' '.$Consultant_Last_Name;
													} ?>
										   	    <?php echo $fullname ?>(<?php echo $Proj_Name ?>)</td>
										   	 <td ><?php echo $Cd_Email_Id ?></td>
										   	    <td ><?php echo $Cd_Phone_No ?></td>
										   	<td ><?php echo $Vendor_Name ?></td>
										   	<td ><?php echo $Vendor_Recruiter_Name ?></td>
										   	<td ><?php echo $Primary_Vendor_Email_Id ?></td>
										   	<td ><?php echo $Primary_Vendor_Contact_Phone_Number ?></td>
										   	<td ><?php echo $Proj_Bill_Rate ?></td>
										   	<td ><?php echo $Et_Description ?></td>
										   	<td ><?php echo $Client_Name ?></td>
										   	<td ><a href="documents/<?php echo $MSA ?>" target="_blank"><?php echo $MSA ?></a></td>
										   	<td ><a href="documents/<?php echo $PO ?>" target="_blank"><?php echo $PO ?></a></td>
										   	<td ><?php echo $Invoice_Cycle ?></td>
                                           <td ><?php echo $Payment_Terms ?></td>
                                           <td ><?php echo $Rate ?></td>
										   	<td style="width: 100px;"><?php 
										   	if(($Start_Date=='0000-00-00') || ($Start_Date=='')){  }else{
										   	
										   	echo $Start_Date = date("d/M/Y", strtotime($Start_Date));  } ?>
										   	
										   	</td>
										    <td style="width: 100px;"><?php 
										    
										    if(($End_Date=='0000-00-00') || ($End_Date=='')){  }else{
										    echo $End_Date = date("d/M/Y", strtotime($End_Date)); } ?></td>
                                           <td ><?php echo $Remarks ?></td>
                                          
                                          <td ><?php  if($Quickbooks==""){ }else{ echo "Yes"; } ?></td>
                                           <td ><?php if($CEIPAL_entry==""){ }else{ echo "Yes"; } ?></td>
                                           <td ><?php if($CEIPAL_user==""){ }else{ echo "Yes"; } ?></td>
                                           <td ><?php if($Initial_Timesheets==""){ }else{ echo "Yes"; } ?></td>
                                           
                                           <td style="width: 100px;"><?php echo $created_date = date("d/M/Y", strtotime($created_date)); ?></td>
										    <td style="width: 100px;"><?php 
										    
										    if($updated_date==""){ }else{
										    echo $updated_date = date("d/M/Y", strtotime($updated_date));  } ?></td>
                                           
										
										
											<td>
															<div class="hidden-sm hidden-xs action-buttons">
																
															    <?php if(($user_role=='2') || ($user_role=='4')){  }else{?>
																 <a class="red" href="delete_onboarding.php?id=<?php echo $id ?>" onclick="return confirm('Are you sure you want to delete onboarding Details'); ">
																	<i class="ace-icon fa fa-trash-o bigger-130"></i>
																</a> <?php } ?>

                                                         </div>

															<div class="hidden-md hidden-lg">
																<div class="inline pos-rel">
																	<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
																		<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
																	</button>

																	<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																	
                                                                         <?php if(($user_role=='2') || ($user_role=='4')){  }else{?>
																		<li>
																			<a href="delete_onboarding.php?id=<?php echo $id ?>" class="tooltip-error" data-rel="tooltip" title="Delete" onclick="return confirm('Are you sure you want to delete onboarding Details'); ">
																				<span class="red">
																					<i class="ace-icon fa fa-trash-o bigger-120"></i>
																				</span>
																			</a>
																		</li> <?php } ?>
																		
																		
                                                                    

																	</ul>
																</div>
															</div>
														</td>	
														
														
													</tr>
													
													<?php } ?>
                                                    
													<?php } $i++;  } 
													
																					   }
													
													}catch(PDOException $e)
                                                		{
                                                			echo $e->getMessage();
                                                		}?>
													
												
													
												</tbody>
											</table>
										</div>
									</div>
								</div>



											</div>

											
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div>
                                 

                                




								<div class="hr hr-18 dotted hr-double"></div>


								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

		<?php include('footer.php'); ?>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="assets/js/dataTables.buttons.min.js"></script>
		<script src="assets/js/buttons.flash.min.js"></script>
		<script src="assets/js/buttons.html5.min.js"></script>
		<script src="assets/js/buttons.print.min.js"></script>
		<script src="assets/js/buttons.colVis.min.js"></script>
		<script src="assets/js/dataTables.select.min.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				//initiate dataTables plugin
				var myTable = 
				$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": false },
					  null, null, null, null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null, null, null,
					  { "bSortable": false }
					],
					"aaSorting": [],
					
					
					//"bProcessing": true,
			        //"bServerSide": true,
			        //"sAjaxSource": "http://127.0.0.1/table.php"	,
			
					//,
					//"sScrollY": "200px",
					//"bPaginate": false,
			
					"sScrollX": "100%",
					"sScrollXInner": "120%",
					"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element
			
					//"iDisplayLength": 50
			
			
					select: {
						style: 'multi'
					}
			    } );
			
				
				
				$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
				
					<?php if($user_role=='1'){ ?>
				new $.fn.dataTable.Buttons( myTable, {
					buttons: [
					  {
						"extend": "colvis",
						"text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
						"className": "btn btn-white btn-primary btn-bold",
						columns: ':not(:first):not(:last)'
					  },
					  {
						"extend": "copy",
						"text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "csv",
						"text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "excel",
						"text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "pdf",
						"text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "print",
						"text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
						"className": "btn btn-white btn-primary btn-bold",
						autoPrint: false,
						message: 'This print was produced using the Print button for DataTables'
					  }		  
					]
				} );   <?php } ?>
				myTable.buttons().container().appendTo( $('.tableTools-container') );
				
				//style the message box
				var defaultCopyAction = myTable.button(1).action();
				myTable.button(1).action(function (e, dt, button, config) {
					defaultCopyAction(e, dt, button, config);
					$('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
				});
				
				
				var defaultColvisAction = myTable.button(0).action();
				myTable.button(0).action(function (e, dt, button, config) {
					
					defaultColvisAction(e, dt, button, config);
					
					
					if($('.dt-button-collection > .dropdown-menu').length == 0) {
						$('.dt-button-collection')
						.wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
						.find('a').attr('href', '#').wrap("<li />")
					}
					$('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
				});
			
				////
			
				setTimeout(function() {
					$($('.tableTools-container')).find('a.dt-button').each(function() {
						var div = $(this).find(' > div').first();
						if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
						else $(this).tooltip({container: 'body', title: $(this).text()});
					});
				}, 500);
				
				
				
				
				
				myTable.on( 'select', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
					}
				} );
				myTable.on( 'deselect', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
					}
				} );
			
			
			
			
				/////////////////////////////////
				//table checkboxes
				$('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);
				
				//select/deselect all rows according to table header checkbox
				$('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$('#dynamic-table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) myTable.row(row).select();
						else  myTable.row(row).deselect();
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
				$('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
					var row = $(this).closest('tr').get(0);
					if(this.checked) myTable.row(row).deselect();
					else myTable.row(row).select();
				});
			
			
			
				$(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
					e.stopImmediatePropagation();
					e.stopPropagation();
					e.preventDefault();
				});
				
				
				
				//And for the first simple table, which doesn't have TableTools or dataTables
				//select/deselect all rows according to table header checkbox
				var active_class = 'active';
				$('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$(this).closest('table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
						else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
				$('#simple-table').on('click', 'td input[type=checkbox]' , function(){
					var $row = $(this).closest('tr');
					if($row.is('.detail-row ')) return;
					if(this.checked) $row.addClass(active_class);
					else $row.removeClass(active_class);
				});
			
				
			
				/********************************/
				//add tooltip for small view action buttons in dropdown menu
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				
				//tooltip placement on right or left
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					//var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
				
				
				
				
				/***************/
				$('.show-details-btn').on('click', function(e) {
					e.preventDefault();
					$(this).closest('tr').next().toggleClass('open');
					$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
				});
				/***************/
				
				
				
				
				
				/**
				//add horizontal scrollbars to a simple table
				$('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
				  {
					horizontal: true,
					styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
					size: 2000,
					mouseWheelLock: true
				  }
				).css('padding-top', '12px');
				*/
			
			
			})
		</script>
	</body>
</html>
