<?php require_once("session.php");
      
require_once('class.user.php');
$user = new USER();

include('dbcon.php');

$Primary_Vendor_Email_Id="";

if(isset($_POST['add_reminder_sheet']))
{
									    

$cemeil=$_POST['cemeil'];

$consultid1=$_POST['consultid'];
$documenttype=$_POST['documenttype'];

if($documenttype == "Deposit"){
    
$file_att="https://pravaratech.com/admin/documents/Direct_Deposit_Form.pdf"; 

$docuname="Direct Deposit Form";
    
}else{
    
$file_att="https://pravaratech.com/admin/documents/On_Boarding_Documents_Template.pdf";
$docuname="onboarding document";    
    
}


//if($documenttype == "Deposit"){
    
//$purpose="Direct Deposit Form Needed"; 
    
//}else{    
//$purpose="Onboarding Documentation Needed";

//}

$purpose="Documentation Needed";
//$to = "aravind.garrepally@gmail.com";
$to = "aravind@cognisofttech.com";
//$to     = $cemeil;
$subject = $purpose;
   $message = "

<p>Hi,</p>
<p>Please find the  $docuname <a href='$file_att'> (Click Here To Download) </a>, fill the form and share back to us.</p>
<p>Let us know if you have any questions.</p>

";

// Always set content-type when sending HTML email   
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

// More headers
 $headers .= "From: info@cognisofttech.com \r\n"; 
// $headers .= "cc: sree@cognisofttech.com \r\n";
// $headers .= "cc: sreedhar@cognisofttech.com \r\n";
 $headers .= "cc: anu@cognisofttech.com \r\n";
 $headers .= "cc: shalini@cognisofttech.com \r\n";
 $headers .= "bcc: aravind@cognisofttech.com \r\n";
 
 
 mail($to,$subject,$message,$headers);	
   
echo "<script>window.location='on_boarding_templates.php?sent'</script>";

}


$Vd_id ="";


if(isset($_GET['consultid']))
{
$consultid = strip_tags($_GET['consultid']);

include('dbcon.php');


$stmt = $DBcon->prepare("SELECT  pd.Vd_id , pd.Cld_Id ,pd.MVd_id , pd.Proj_Id , cd.Cd_Id , pd.Proj_Name , cd.Cd_First_Name , cd.Cd_Last_Name FROM tbl_Project_Details as pd
LEFT JOIN tbl_Consultant_Details as cd
ON cd.Cd_Id = pd.Cd_Id
where pd.Proj_Id='$consultid' ");
                          $stmt->execute();
                           while($row=$stmt->FETCH(PDO::FETCH_ASSOC))                             
      
 {   
 $Proj_Id=$row['Proj_Id'];
 $Cd_Id=$row['Cd_Id'];
 $Vd_id=$row['Vd_id'];
 $Cld_Id=$row['Cld_Id'];
$Cd_First_Name=$row['Cd_First_Name'];
$Cd_Last_Name=$row['Cd_Last_Name'];
$fullname1=$Cd_First_Name.' '.$Cd_Last_Name;

}
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title></title>

		<meta name="description" content="Common form elements and layouts" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="assets/css/chosen.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css" />
		<link rel="stylesheet" href="assets/css/daterangepicker.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-colorpicker.min.css" />

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





    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script>
      $(document).ready(function(){
        $("#documenttype").change(function(){
          var cid=$(this).val();
          $.ajax({
            url:'get_documenttype.php',
            type:'post',
            data:{id:cid},
            success:function(res){
              $("#mailshow").html(res);
            }
          });
        });
      });
    </script>


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
								<a href="#"> On Boarding Templates</a>
							</li>
							
						</ul><!-- /.breadcrumb -->

						
					</div>

					<div class="page-content">
						<?php include('theme-settings.php'); ?>

						<div class="page-header">
							<h1> On Boarding Templates
								
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								
	<?php	 
	  if(isset($_GET['sent']))
			   {  ?>

             <div class="alert alert-success wow fadeInLeft delay-03s"  role="alert">
 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 <strong>Mail Sent Successfully!</strong>
 </div>
              <?php }  ?>
              
								<form class="form-horizontal" role="form" method="GET" enctype="multipart/form-data">
								    
								<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Consultant Name </label>

										<div class="col-sm-9">
										      <select name="consultid" id="consultid" class="col-xs-10 col-sm-5" onchange='this.form.submit()'>
                                                      <option value="">Please select consultant</option>
							                  <?php 
                                                   include('dbcon.php');

													$stmt = $DBcon->prepare("SELECT  * FROM tbl_Consultant_Details where Status='Active' ORDER BY Cd_First_Name asc");
													$stmt->execute();

													if($stmt->rowCount()>0)
													{
													while($row=$stmt->fetch(PDO::FETCH_ASSOC))
													{ 
												
													$Cd_First_Name =$row['Cd_First_Name'];
													$Cd_Last_Name =$row['Cd_Last_Name'];
													$fullname=$Cd_First_Name.' '.$Cd_Last_Name;
													
													 $Cd_Id =$row['Cd_Id'];
													
												//	$Cd_Email_Id =$row['Cd_Email_Id'];
													?>
													
													<?php
													
													if(isset($_GET['consultid']))
                                                    {
	
	                                                 $id1=$_GET["consultid"];  ?>
	                                                 
	                                                 <option value="<?php echo $Cd_Id ?>" <?php if($Cd_Id==$id1) echo "selected"; ?>><?php echo $fullname ?></option>
	                                                 
                                                   <?php  }else{
													
													?>
                                                     
													<option value="<?php echo $Cd_Id ?>" ><?php echo $fullname ?></option>
													
													<?php } ?>
                                                      
													<?php }
													}

                                               ?> 
						                      </select>
										</div>
									</div>
								</form>
								
								<form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
								   
                                    <input type="hidden" name="consultid" value="<?php echo $id1 ?>">	
                                    
                                     <br><br>
                                      <?php
                                      
                                      $stmt321 = $DBcon->prepare("select * from tbl_Consultant_Details where Cd_Id='$id1'");
                                      $stmt321->execute();					  
                                    
                                            while($row321=$stmt321->FETCH(PDO::FETCH_ASSOC))
                                        { 
                                         $Cd_Email_Id=$row321['Cd_Email_Id'];
                                         
                                        }
                                      ?>
                                  
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Email </label>
										<div class="col-sm-9">
                                            <input type="text" name="cemeil" class="col-xs-10 col-sm-5"  value="<?php echo $Cd_Email_Id ?>" >
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Document Type </label>
										<div class="col-sm-9">
                                            <select name="documenttype" id="documenttype" class="col-xs-10 col-sm-5">
                                                      <option value="">Please Document Type</option>
                                                      <option value="Deposit">Direct Deposit</option>
                                                      <option value="Boarding">On Boarding</option>
                                                      </select>
										</div>
									</div>
								
									
									<div class="form-group">
									    <div class="col-sm-2"></div>
										
										<div class="col-sm-8">
									
									<h3>Email Preview :</h3> <hr>


<div id="mailshow"></div>


									</div>
									</div>
									
									
									
									
									 
									 
								
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
										    
										
									
										
										<input type="submit" class="btn btn-info" name="add_reminder_sheet" value="Submit">
										
									
								        
										 &nbsp; &nbsp; &nbsp;
										
											<a href="pending_invoice_reminder.php" class="btn btn-danger mt-ladda-btn ladda-button">Cancel</a>
										
										
										</div>
									</div>																	
								</form>
                              </div>

                             
								
								





								
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
<?php include('footer.php'); ?>


<script>
    $(document).ready(function(){
 
        //iterate through each textboxes and add keyup
        //handler to trigger sum event
        $(".txt").each(function() {
 
            $(this).keyup(function(){
                calculateSum();
            });
        });
 
    });
 
    function calculateSum() {
 
        var sum = 0;
        //iterate through each textboxes and add the values
        $(".txt").each(function() {
 
            //add only if the value is number
            if(!isNaN(this.value) && this.value.length!=0) {
                sum += parseFloat(this.value);
            }
 
        });
        //.toFixed() method will roundoff the final sum to 2 decimal places
        $("#sum").html(sum.toFixed(0));
    }
</script>



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

	
	</body>
</html>
