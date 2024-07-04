<?php
    $database = new database();
    $db = $database->connect();
    $settings = new settings($db);
    $blogcategories = new blogcategories($db);
    $socials = new socials($db);
    $stmt_socials = $socials->readAll();
    $stmt_blogcategories = $blogcategories->readAll();
    $settings->id = 1;
    $settings->read();
?>

<header>
		<div class="top-menu">
			<ul class="left-area welcome-area">
				<li class="hello-blog">Hello nice people, welcome to my blog</li>
				<li><a href="mailto:<?php echo $settings->contact_email?>"><?php echo $settings->contact_email?></a></li>
			</ul><!-- left-area -->
			<div class="right-area">
				<div class="src-area">
					<form action="post">
						<input class="src-input" type="text" placeholder="Search">
						<button class="src-btn" type="submit"><i class="ion-ios-search-strong"></i></button>
					</form>
				</div><!-- src-area -->

				<ul class="social-icons">
                    <?php
                        while($socialsData = $stmt_socials->fetch()){
                    ?>
					    <li><a href="<?php echo $socialsData["url"]?>"><?php echo $socialsData["icon"]?></a></li>
                    <?php
                        }
                    ?>
				</ul><!-- right-area -->

			</div><!-- right-area -->

		</div><!-- top-menu -->

		<div class="middle-menu center-text"><a href="#" class="logo"><img src="<?php echo "../images/".$settings->site_logo?>" alt="Logo Image"></a></div>

		<div class="bottom-area">
			<div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>
			<ul class="main-menu visible-on-click" id="main-menu">
				<li><a href="index.php?page=home">HOME</a></li>
				<li class="drop-down"><a href="#!">CATEGORIES<i class="ion-ios-arrow-down"></i></a>
					<ul class="drop-down-menu">
							<?php
                                while($rows = $stmt_blogcategories->fetch()){
                                    if($rows["status"]==1){
                            ?>
                                <li><a href="#"><?php echo $rows["title"]?></a></li>
                            <?php
                                    }}
                            ?>
					</ul>
				</li>
				<li><a href="index.php?page=about">ABOUT</a></li>
				<li><a href="index.php?page=contact">CONTACT</a></li>
			</ul><!-- main-menu -->

		</div><!-- conatiner -->
	</header>