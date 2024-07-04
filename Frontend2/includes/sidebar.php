<?php
    $database = new database();
    $db = $database->connect();
    $comments = new comments($db);
    $users = new users($db);
	$blogcategoriesAll = new blogcategories($db);
	$stmt_categories = $blogcategoriesAll->readAll();
	$latest_blog = new blogs($db);
	$latest_blog = $latest_blog->readLatestBlog()->fetch();
	$blogcategories = new blogcategories($db);
	$blogcategories->id = $latest_blog["id_category"];
	$blogcategories->read();

	$socials = new socials($db);
    $stmt_socials = $socials->readAll();

	$stmt_comments = $comments->readAll();
	$first_comment = $stmt_comments->fetch();
	$users->name = $first_comment["name"];
	$first_user = $users->readAllUsersWithName()->fetch();

?>
<div class="col-lg-4 col-md-12">
	<div class="sidebar-area">
		<div class="sidebar-section about-author center-text">
			<div class="author-image"><img src="<?php echo "../images/users/".$first_user["image"]?>" alt="Autohr Image"></div>

			<ul class="social-icons">
				<?php
					while($socialsData = $stmt_socials->fetch()){
				?>
					<li><a href="<?php echo $socialsData["url"]?>"><?php echo $socialsData["icon"]?></a></li>
				<?php
					}
				?>
				
			</ul>
			<!-- right-area -->

			<h4 class="author-name"><b class="light-color"><?php echo $first_comment["name"]?></b></h4>
			<p><?php echo $first_comment["comment"]?></p>
			<a class="read-more-link" href="index.php?page=blogdetail&id=<?php echo $first_comment["id_blog"]?>"><b>READ MORE</b></a>

		</div><!-- sidebar-section about-author -->

		<div class="sidebar-section src-area">
			<form action="post">
				<input class="src-input" type="text" placeholder="Search">
				<button class="src-btn" type="submit"><i class="ion-ios-search-strong"></i></button>
			</form>

		</div><!-- sidebar-section src-area -->

		<div class="sidebar-section newsletter-area">
			<h5 class="title"><b>Subscribe to our newsletter</b></h5>
			<form action="post">
				<input class="email-input" type="text" placeholder="Your email here">
				<button class="btn btn-2" type="submit">SUBSCRIBE</button>
			</form>
		</div><!-- sidebar-section newsletter-area -->


		<div class="sidebar-section latest-post-area">
			<h4 class="title"><b class="light-color">Latest Posts</b></h4>
			<div class="latest-post" href="index.php?page=blogdetail&id=<?php echo $latest_blog["id"]?>">
				<div class="l-post-image"><img src="<?php echo "../images/blogs/".$latest_blog["image"]?>" alt="Category Image"></div>
				<div class="post-info">
					<a class="btn category-btn" href="#"><?php echo $blogcategories->title?></a>
					<h5><a href="index.php?page=blogdetail&id=<?php echo $latest_blog["id"]?>"><b class="light-color"><?php echo $latest_blog["title"]?></b></a></h5>
					<h6 class="date"><em><?php echo $latest_blog["created_at"]?></em></h6>
				</div>
			</div>
		</div><!-- sidebar-section latest-post-area -->

		<div class="sidebar-section advertisement-area">
			<h4 class="title"><b class="light-color">Advertisement</b></h4>
			<a class="advertisement-img" href="#">
				<img src="images/advertise-1-400x500.jpg" alt="Advertisement Image">
				<h6 class="btn btn-2 discover-btn">DISCOVER</h6>
			</a>
		</div><!-- sidebar-section advertisement-area -->

		<div class="sidebar-section tags-area">
			<h4 class="title"><b class="light-color">Tags</b></h4>
			<ul class="tags">
				<?php
					while($rows = $stmt_categories->fetch()){
						if($rows["status"]==1){
				?>
					<li><a class="btn" href="#"><?php echo $rows["title"]?></a></li>
				<?php
						}}
				?>
			</ul>
		</div><!-- sidebar-section tags-area -->


	</div><!-- about-author -->
</div><!-- col-lg-4 -->