<!doctype html>
<html class="no-js" lang="">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>ELEARNING | Admin ProSchool</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/img/favicon.png">
	<!-- Normalize CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/normalize.css">
	<!-- Main CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/all.min.css">
	<!-- Flaticon CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/flaticon.css">
	<!-- Full Calender CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/fullcalendar.min.css">
	<!-- Animate CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/animate.min.css">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/style.css">
	<!-- Modernize js -->
	<script src="<?php echo base_url();?>assets/js/modernizr-3.6.0.min.js"></script>
	<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css" />-->
</head>

<body>
	<!-- Preloader Start Here -->
	<div id="preloader"></div>
	<!-- Preloader End Here -->
	<div id="wrapper" class="wrapper bg-ash">
		<!-- Header Menu Area Start Here -->
		<?php include "includes/navbar.php" ?>
			<!-- Header Menu Area End Here -->
			<!-- Page Area Start Here -->
			<div class="dashboard-page-one">
				<!-- Sidebar Area Start Here -->
				<?php include "includes/menu.php" ?>
					<!-- Sidebar Area End Here -->
					<div class="dashboard-content-one">
						<!-- Breadcubs Area Start Here -->
						<div class="breadcrumbs-area">
							<h3>Admin Dashboard</h3>
							<ul>
								<li> <a href="index.html">Home</a> </li>
								<li>Admin</li>
								<?php echo $this->session->flashdata("msg");?>
							</ul>
						</div>
						<!-- Breadcubs Area End Here -->
						<div class="row gutters-20">
							<div class="col-12 col-xl-12 col-6-xxxl">
								<div class="card dashboard-card-three pd-b-20">
									<div class="card-body">
										<div class="heading-layout1">
											<div class="item-title">
												<h3>Forum</h3> </div>
											<div class="dropdown"> <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>
												<div class="dropdown-menu dropdown-menu-right"> <a class="dropdown-item" href="#"><i
                                                    class="fas fa-times text-orange-red"></i>Close</a> <a class="dropdown-item" href="#"><i
                                                    class="fas fa-cogs text-dark-pastel-green"></i>Edit</a> <a class="dropdown-item" href="#"><i
                                                    class="fas fa-redo-alt text-orange-peel"></i>Refresh</a> </div>
											</div>
										</div>
										<div class="nav-scroller bg-white box-shadow">
											<nav class="nav nav-underline"> <a class="nav-link active" href="#">Dashboard</a> <a class="nav-link" href="#">
          Friends
          <span class="badge badge-pill bg-light align-text-bottom">27</span>
        </a> <a class="nav-link" href="#">Explore</a> <a class="nav-link" href="#">Suggestions</a> <a class="nav-link" href="#">Link</a> <a class="nav-link" href="#">Link</a> <a class="nav-link" href="#">Link</a> <a class="nav-link" href="#">Link</a> <a class="nav-link" href="#">Link</a> </nav>
										</div>
										<main role="main" class="container">
											<div class="d-flex align-items-center p-3 my-3 bg-purple rounded box-shadow">
												<div class="lh-100">
													<h6 class="mb-0 lh-100">Bootstrap</h6> <small>Since 2011</small> </div>
											</div>
											<div class="my-3 p-3 bg-white rounded box-shadow">
												<h6 class="border-bottom border-gray pb-2 mb-0">Recent updates</h6>
												<div class="media text-muted pt-3"> <img data-src="holder.js/32x32?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="32x32" class="mr-2 rounded" style="width: 32px; height: 32px;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2232%22%20height%3D%2232%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2032%2032%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17f627f3cfd%20text%20%7B%20fill%3A%23007bff%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17f627f3cfd%22%3E%3Crect%20width%3D%2232%22%20height%3D%2232%22%20fill%3D%22%23007bff%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2211.541290283203125%22%20y%3D%2216.9%22%3E32x32%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
													<p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray"> <strong class="d-block text-gray-dark">@username</strong> Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. </p>
												</div>
												<div class="media text-muted pt-3"> <img data-src="holder.js/32x32?theme=thumb&amp;bg=e83e8c&amp;fg=e83e8c&amp;size=1" alt="32x32" class="mr-2 rounded" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2232%22%20height%3D%2232%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2032%2032%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17f627f3d00%20text%20%7B%20fill%3A%23e83e8c%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17f627f3d00%22%3E%3Crect%20width%3D%2232%22%20height%3D%2232%22%20fill%3D%22%23e83e8c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2211.541290283203125%22%20y%3D%2216.9%22%3E32x32%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="width: 32px; height: 32px;">
													<p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray"> <strong class="d-block text-gray-dark">@username</strong> Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. </p>
												</div>
												<div class="media text-muted pt-3"> <img data-src="holder.js/32x32?theme=thumb&amp;bg=6f42c1&amp;fg=6f42c1&amp;size=1" alt="32x32" class="mr-2 rounded" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2232%22%20height%3D%2232%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2032%2032%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17f627f3d03%20text%20%7B%20fill%3A%236f42c1%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17f627f3d03%22%3E%3Crect%20width%3D%2232%22%20height%3D%2232%22%20fill%3D%22%236f42c1%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2211.541290283203125%22%20y%3D%2216.9%22%3E32x32%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="width: 32px; height: 32px;">
													<p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray"> <strong class="d-block text-gray-dark">@username</strong> Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. </p>
												</div> <small class="d-block text-right mt-3">
          <a href="#">All updates</a>
        </small> </div>
											<div class="my-3 p-3 bg-white rounded box-shadow">
												<h6 class="border-bottom border-gray pb-2 mb-0">Suggestions</h6>
												<div class="media text-muted pt-3"> <img data-src="holder.js/32x32?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="32x32" class="mr-2 rounded" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2232%22%20height%3D%2232%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2032%2032%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17f627f3d05%20text%20%7B%20fill%3A%23007bff%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17f627f3d05%22%3E%3Crect%20width%3D%2232%22%20height%3D%2232%22%20fill%3D%22%23007bff%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2211.541290283203125%22%20y%3D%2216.9%22%3E32x32%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="width: 32px; height: 32px;">
													<div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
														<div class="d-flex justify-content-between align-items-center w-100"> <strong class="text-gray-dark">Full Name</strong> <a href="#">Follow</a> </div> <span class="d-block">@username</span> </div>
												</div>
												<div class="media text-muted pt-3"> <img data-src="holder.js/32x32?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="32x32" class="mr-2 rounded" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2232%22%20height%3D%2232%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2032%2032%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17f627f3d06%20text%20%7B%20fill%3A%23007bff%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17f627f3d06%22%3E%3Crect%20width%3D%2232%22%20height%3D%2232%22%20fill%3D%22%23007bff%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2211.541290283203125%22%20y%3D%2216.9%22%3E32x32%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="width: 32px; height: 32px;">
													<div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
														<div class="d-flex justify-content-between align-items-center w-100"> <strong class="text-gray-dark">Full Name</strong> <a href="#">Follow</a> </div> <span class="d-block">@username</span> </div>
												</div>
												<div class="media text-muted pt-3"> <img data-src="holder.js/32x32?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="32x32" class="mr-2 rounded" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2232%22%20height%3D%2232%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2032%2032%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17f627f3d08%20text%20%7B%20fill%3A%23007bff%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17f627f3d08%22%3E%3Crect%20width%3D%2232%22%20height%3D%2232%22%20fill%3D%22%23007bff%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2211.541290283203125%22%20y%3D%2216.9%22%3E32x32%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="width: 32px; height: 32px;">
													<div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
														<div class="d-flex justify-content-between align-items-center w-100"> <strong class="text-gray-dark">Full Name</strong> <a href="#">Follow</a> </div> <span class="d-block">@username</span> </div>
												</div> <small class="d-block text-right mt-3">
          <a href="#">All suggestions</a>
        </small> </div>
										<?php if(!empty($dataInfo) && count($dataInfo)>0) { ?>
	<?php foreach($dataInfo as $key=>$element) { ?>
		<div class="card gedf-card" style="margin: 5px;">
		  <div class="card-header">
		      <div class="d-flex justify-content-between align-items-center">
		          <div class="d-flex justify-content-between align-items-center">
		              <div class="mr-2">
		                  <img class="rounded-circle" width="45" src="<?php echo HTTP_IMAGE_PATH.$element['user_pic'];?>" alt="">
		              </div>
		              <div class="ml-2">
		                  <div class="h5 m-0">@<?php print $element['name'];?></div>
		                  <div class="h7 text-muted"><?php print $element['email'];?></div>
		              </div>
		          </div>
		          <div>
		              <div class="dropdown">
		                  <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		                      <i class="fa fa-ellipsis-h"></i>
		                  </button>
		                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
		                      <div class="h6 dropdown-header">Configuration</div>
		                      <a class="dropdown-item" href="#">Save</a>
		                      <a class="dropdown-item" href="#">Hide</a>
		                      <a class="dropdown-item" href="#">Report</a>
		                  </div>
		              </div>
		          </div>
		      </div>

		  </div>
		  <div class="card-body">
		      <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i>10 min ago</div>
		      <a class="card-link" href="#">
		          <h5 class="card-title"><?php print $element['title'];?></h5>
		      </a>
		      <p class="card-text"><?php print $element['description'];?></p>
		  </div>                    
		</div>
	<?php }?>  
<?php } ?>
										</main>
  <div class="container">
    <div class="pb-2 mt-4 mb-2 border-bottom">
      <h2>Load more data on page scroll using jQuery, Ajax and Codeigniter</h2>
    </div>
    <div class="row">       
      <div class="col-md-12 gedf-main">
        <span id="load-data"></span>
        <span id="load-data-msg"></span>
      </div>       
    </div>
  </div>
									</div>
								</div>
							</div>
						</div>
						<!-- Dashboard Content End Here -->
						<!-- Footer Area Start Here -->
						<?php include "includes/footer.php" ?>
							<!-- Footer Area End Here -->
					</div>
			</div>
			<!-- Page Area End Here -->
	</div>
	<!-- jquery-->
	<script src="<?php echo base_url();?>assets/js/jquery-3.3.1.min.js"></script>
	<!-- Plugins js -->
	<script src="<?php echo base_url();?>assets/js/jquery.counterup.min.js"></script>
	<!-- Moment Js -->
	<script src="<?php echo base_url();?>assets/js/moment.min.js"></script>
	<!-- Waypoints Js -->
	<script src="<?php echo base_url();?>assets/js/jquery.waypoints.min.js"></script>
	<!-- Scroll Up Js -->
	<script src="<?php echo base_url();?>assets/js/jquery.scrollUp.min.js"></script>
	<!-- Full Calender Js -->
	<script src="<?php echo base_url();?>assets/js/main.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script>
      var baseurl = "<?php print site_url();?>";
    </script>
	<script>
	  jQuery(document).ready(function() {
		var limit = 5;
		var start = 0;
		var flag = "inactive";
		function placeHolderShimmer(limit) {
		  var bindHTML = '';
		  for(var counter=0; counter<limit; counter++) {
			bindHTML += '<div class="timeline-item">';
			  bindHTML += '<div class="animated-background">';
				bindHTML += '<div class="background-masker header-top"></div>';
				bindHTML += '<div class="background-masker header-left"></div>';
				bindHTML += '<div class="background-masker header-right"></div>';
				bindHTML += '<div class="background-masker header-bottom"></div>';
				bindHTML += '<div class="background-masker subheader-left"></div>';
				bindHTML += '<div class="background-masker subheader-right"></div>';
				bindHTML += '<div class="background-masker subheader-bottom"></div>';
				bindHTML += '<div class="background-masker content-top"></div>';
				bindHTML += '<div class="background-masker content-first-end"></div>';
				bindHTML += '<div class="background-masker content-second-line"></div>';
				bindHTML += '<div class="background-masker content-second-end"></div>';
				bindHTML += '<div class="background-masker content-third-line"></div>';
				bindHTML += '<div class="background-masker content-third-end"></div>';
			  bindHTML += '</div>';
			bindHTML += '</div>';
		  }
		  jQuery("#load-data-msg").html(bindHTML);
		}
		// call function
		placeHolderShimmer(limit);
		function getData(limit, start) {
		  jQuery.ajax({
			url:"<?php echo base_url(); ?>forum/loadData",
			method:"POST",
			data:{limit:limit, start:start},
			dataType: 'html',
			cache: false,
			success:function(html) {
			  if(html == '')  {
				jQuery('span#load-data-msg').html('<div class="text-muted" style="font-weight:bold; font-size:18px; text-align:center;">No more result yet!</div>');
				flag = 'active';
			  }  else {
				jQuery('span#load-data').append(html);
				jQuery('span#load-data-msg').html("");
				flag = 'inactive';
			  }
			}
		  })
		}
		if(flag == 'inactive') {
		  flag = 'active';
		  getData(limit, start);
		}
		jQuery(window).scroll(function() {
		  if(jQuery(window).scrollTop() + jQuery(window).height() > jQuery("span#load-data").height() && flag == 'inactive') {
			placeHolderShimmer(limit);
			flag = 'active';
			start = start + limit;
			setTimeout(function() {
			  getData(limit, start);
			}, 1000);
		  }
		});
	  });
	</script>	
</body>

</html>