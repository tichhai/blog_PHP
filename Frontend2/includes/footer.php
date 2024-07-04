<?php
    $database = new database();
    $db = $database->connect();
	$settings = new settings($db);
	$settings->id=1;
	$settings->read();
	$socials = new socials($db);
    $stmt_socials = $socials->readAll();
	$blogs = new blogs($db);
	$stmt_blogs = $blogs->readAll();
?>
<section class="footer-instagram-area">
	<ul class="instagram">
		<?php
			$count=0;
			while(($blog = $stmt_blogs->fetch()) && $count<=7){
				if($blog["status"]==1){
					$count++;
		?>
		<li><a href="index.php?page=blogdetail&id=<?php echo $blog["id"]?>"><img src="<?php echo "../images/blogs/".$blog["image"]?>" alt="Instagram Image"></a></li>
		<?php 
			}}
		?>
	</ul>
</section><!-- section -->


<footer>
	<div class="container">
		<div class="row">

			<div class="col-sm-6">
				<div class="footer-section">
					<p class="copyright"><?php echo $settings->site_footer?></p>
				</div><!-- footer-section -->
			</div><!-- col-lg-4 col-md-6 -->

			<div class="col-sm-6">
				<div class="footer-section">
					<ul class="social-icons">
						<?php
							while($socialsData = $stmt_socials->fetch()){
						?>
							<li><a href="<?php echo $socialsData["url"]?>"><?php echo $socialsData["icon"]?></a></li>
						<?php
							}
						?>
					</ul>
				</div><!-- footer-section -->
			</div><!-- col-lg-4 col-md-6 -->

		</div><!-- row -->
	</div><!-- container -->
</footer>