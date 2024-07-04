<?php
    $database = new database();
    $db = $database->connect();
    $blogs = new blogs($db);
	$blogcategories = new blogcategories($db);
	$blogcategories2 = new blogcategories($db);
	$blogcategories3 = new blogcategories($db);
	$comments = new comments($db);
	$comments2 = new comments($db);
	$comments3 = new comments($db);
    $stmt_blogs = $blogs->readAll();
	$first_blog = $stmt_blogs->fetch();
	while($first_blog["status"]==0){
		$first_blog = $stmt_blogs->fetch();
	}
	$second_blog = $stmt_blogs->fetch();
	$bottom_blog = $stmt_blogs->fetch();
	while($bottom_blog["status"]==0){
		$bottom_blog = $stmt_blogs->fetch();
	}
	$blogcategories->id = $first_blog["id_category"];
	$blogcategories->read();
	$comments->id_blog = $first_blog["id"];
	$stmt_comments = $comments->readAllWithIDBlog();

	$blogcategories2->id = $second_blog["id_category"];
	$blogcategories2->read();
	$comments2->id_blog = $second_blog["id"];
	$stmt_comments2 = $comments2->readAllWithIDBlog();

	$blogcategories3->id = $bottom_blog["id_category"];
	$blogcategories3->read();
	$comments3->id_blog = $bottom_blog["id"];
	$stmt_comments3 = $comments3->readAllWithIDBlog();
?>

<div class="col-lg-8 col-md-12">
	<div class="blog-posts">
		<div class="single-post">
			<div class="image-wrapper"><img src="<?php echo "../images/blogs/".$first_blog["image"]?>" alt="Blog Image"></div>
			<div class="icons">
				<div class="left-area">
					<?php ?>
					<a class="btn caegory-btn" href="index.php?page=blogdetail&id=<?php echo $first_blog["id"]?>"><b><?php echo $blogcategories->title?></b></a>
				</div>
				<ul class="right-area social-icons">
					<li><a href="index.php?page=blogdetail&id=<?php echo $first_blog["id"]?>"><i class="ion-android-textsms"></i><?php echo $stmt_comments->rowCount()?></a></li>
				</ul>
			</div>
			<p class="date"><em><?php echo $first_blog["created_at"]?></em></p>
			<h3 class="title"><a href="index.php?page=blogdetail&id=<?php echo $first_blog["id"]?>"><b class="light-color"><?php echo $first_blog["title"]?></b></a></h3>
			<p><?php echo $first_blog["content"]?></p>
			<a class="btn read-more-btn" href="index.php?page=blogdetail&id=<?php echo $first_blog["id"]?>"><b>READ MORE</b></a>
		</div><!-- single-post -->

		<div class="single-post">
			<div class="image-wrapper"><img src="<?php echo "../images/blogs/".$second_blog["image"]?>" alt="Blog Image"></div>
			<div class="icons">
				<div class="left-area">
					<a class="btn caegory-btn" href="index.php?page=blogdetail&id=<?php echo $second_blog["id"]?>"><b><?php echo $blogcategories2->title?></b></a>
				</div>
				<ul class="right-area social-icons">
					<li><a href="index.php?page=blogdetail&id=<?php echo $second_blog["id"]?>"><i class="ion-android-textsms"></i><?php echo $stmt_comments2->rowCount()?></a></li>
				</ul>
			</div>
			<h6 class="date"><em><?php echo $second_blog["created_at"]?></em></h6>
			<h3 class="title"><a href="index.php?page=blogdetail&id=<?php echo $second_blog["id"]?>"><b class="light-color"><?php echo $second_blog["title"]?></b></a></h3>
			<p><?php echo $second_blog["content"]?></p>
			<a class="btn read-more-btn" href="index.php?page=blogdetail&id=<?php echo $second_blog["id"]?>"><b>READ MORE</b></a>
		</div><!-- single-post -->

		<div class="row">
			<?php
				$count=0;
				$four_blogcategories = new blogcategories($db);
				$four_comments = new comments($db);

				
				while(($four_blogs = $stmt_blogs->fetch())&&$count<4){
					if($four_blogs["status"]==1){
						$count++;
						$four_blogcategories->id = $four_blogs["id_category"];
						$four_blogcategories->read();
						$four_comments->id_blog = $four_blogs["id"];
						$stmt_four_comments = $four_comments->readAllWithIDBlog();
			?>
			<div class="col-lg-6 col-md-12">
				<div class="single-post">
					<div class="image-wrapper"><img src="<?php echo "../images/blogs/".$four_blogs["image"]?>" alt="Blog Image"></div>
					<div class="icons">
						<div class="left-area">
							<a class="btn caegory-btn" href="index.php?page=blogdetail&id=<?php echo $four_blogs["id"]?>"><b><?php echo $four_blogcategories->title?></b></a>
						</div>
						<ul class="right-area social-icons">
							<li><a href="index.php?page=blogdetail&id=<?php echo $four_blogs["id"]?>"><i class="ion-android-textsms"></i><?php echo $stmt_four_comments->rowCount()?></a></li>
						</ul>
					</div>
					<h6 class="date"><em><?php echo $four_blogs["created_at"]?></em></h6>
					<h3 class="title"><a href="index.php?page=blogdetail&id=<?php echo $four_blogs["id"]?>"><b class="light-color"><?php echo $four_blogs["title"]?></b></a></h3>
					<p><?php echo $four_blogs["content"]?></p>
					<a class="btn read-more-btn" href="index.php?page=blogdetail&id=<?php echo $four_blogs["id"]?>"><b>READ MORE</b></a>
				</div><!-- single-post -->
			</div><!-- col-sm-6 -->
			<?php
				}}
			?>

			<div class="col-lg-12 col-md-12">
				<div class="single-post post-style-2">
					<div class="image-wrapper width-50 left-area">
						<img src="<?php echo "../images/blogs/".$bottom_blog["image"]?>" alt="Blog Image"></div>
					<div class="post-details width-50 right-area">
						<div class="icons">
							<div class="left-area">
								<a class="btn caegory-btn" href="index.php?page=blogdetail&id=<?php echo $bottom_blog["id"]?>"><b><?php echo $blogcategories3->title?></b></a>
							</div>
							<ul class="right-area social-icons">
								<li><a href="index.php?page=blogdetail&id=<?php echo $bottom_blog["id"]?>"><i class="ion-android-textsms"></i><?php echo $stmt_comments3->rowCount()?></a></li>
							</ul>
						</div>
						<h6 class="date"><em><?php echo $bottom_blog["created_at"]?></em></h6>
						<h3 class="title"><a href="index.php?page=blogdetail&id=<?php echo $bottom_blog["id"]?>"><b class="light-color"><?php echo $bottom_blog["title"]?></b></a></h3>
						<p><?php echo $bottom_blog["content"]?></p>
						<a class="btn read-more-btn" href="index.php?page=blogdetail&id=<?php echo $bottom_blog["id"]?>"><b>READ MORE</b></a>
					</div><!-- post-details -->

				</div><!-- single-post -->
			</div><!-- col-sm-6 -->

		</div><!-- row -->

		<a class="btn load-more-btn" target="_blank" href="#">LOAD OLDER POSTS</a>

	</div><!-- blog-posts -->
</div><!-- col-lg-4 -->