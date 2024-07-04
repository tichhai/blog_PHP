<?php
    $database = new database();
    $db = $database->connect();
	$sliders = new sliders($db);
	$stmt_sliders = $sliders->readAll();
?>

<div class="main-slider">
		<div id="slider">
			<?php 
				while($rows = $stmt_sliders->fetch()){
			?>
			<div class="ls-slide" data-ls="bgsize:cover; bgposition:50% 50%; duration:4000; transition2d:104; kenburnsscale:1.00;">
				<img src="<?php echo "../images/sliders/".$rows["image"]?>" class="ls-bg" alt="" />
					<div class="slider-content ls-l" style="top:60%; left:30%;" data-ls="offsetyin:100%; offsetxout:-50%; durationin:800; delayin:100; durationout:400; parallaxlevel:0;">
						<a class="btn" href="#">TRAVEL</a>
						<h3 class="title"><b><?php echo $rows["title"]?></b></h3>
						<h6><?php echo $rows["created_at"]?></h6>
					</div>

			</div><!-- ls-slide -->
			<?php
				}
			?>
		</div><!-- slider -->
	</div><!-- main-slider -->