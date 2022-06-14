<style>
@import url('https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900');

body {
    font-family: 'Montserrat', sans-serif;
    background-color: #eee;
}

a:hover,
a:focus {
    text-decoration:none;
}

.fa {
    color: #FFF;
}

.box-top {
    background: #dedede;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

.box-top.instagram {
    background: linear-gradient(45deg, #f2935b, #6f49c0);
}

.box-top.twitter {
    background: linear-gradient(45deg, #cae1f3, #55aded);
}

.box-top.facebook {
    background: linear-gradient(45deg, #95a2c1, #3b579d);
}

.box-bottom {
    background: #FFF;
    padding: 30px 0px;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
}

.box-bottom .box-text {
    padding: 10px 0px; 
}

.box-bottom .instagram-title {
    font-size: 20px;  
    font-weight: 600;
    background: linear-gradient(45deg, #f2935b, #6f49c0);
    -webkit-background-clip: text; 
    -webkit-text-fill-color: transparent;
}

.box-bottom .twitter-title {
    font-size: 20px;  
    font-weight: 600;
    background: linear-gradient(45deg, #cae1f3, #55aded);
    -webkit-background-clip: text; 
    -webkit-text-fill-color: transparent;
}

.box-bottom .facebook-title {
    font-size: 20px; 
    font-weight: 600;
    color: #428bca;
}
 
</style>
<div class="row">
    <!-- All Notice Area Start Here -->
    <div class="col-8-xxxl col-12">
        <div class="card height-auto">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Notice Board</h3>
                    </div>
                     <div class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button" 
                        data-toggle="dropdown" aria-expanded="false">...</a>

                    </div>
                </div>
				
				<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
				<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
				<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
				<!------ Include the above in your HEAD tag ---------->

				<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> 
				<div class="box">
					<div class="notice-board-wrap">
					<div class="container">
						<div class="notice-list">
						<div class="row">
							<?php foreach ($pengumuman as $row) { ?>
							<div class="col-lg-4 col-12 text-center">
								<div class="box-column">
									<a href="<?php echo $row['url'] ?>" target="_blank">
									<div class="box-top twitter">
										<img src="<?php echo $row['urlToImage'] ?>">
									</div>
									</a>
									<div class="box-bottom">
										<div class="box-title twitter-title">
											<b><?php echo $row['title'] ?></b>
										</div>
										<div class="box-text">
											<?php echo $row['description'] ?>
										</div>
										<?php echo $row['publishedAt'] ?>
									</div>
									
								 </div>
							</div>
							<?php } ?>
						</div>		
						</div>		
					</div>
					</div>
				</div>
				
        </div>
    </div>
    <!-- All Notice Area End Here -->
</div>