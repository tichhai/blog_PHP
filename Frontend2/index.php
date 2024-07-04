<?php
    include "../admin/database/database.php";
    include "../admin/database/blogcategories.php";
    include "../admin/database/blogs.php";
    include "../admin/helper/help_function.php";
    include "../admin/database/sliders.php";
    include "../admin/database/socials.php";
    include "../admin/database/links.php";
    include "../admin/database/about.php";
    include "../admin/database/contact.php";
    include "../admin/database/terms.php";
    include "../admin/database/settings.php";
    include "../admin/database/mailsettings.php";
    include "../admin/database/subscribers.php";
    include "../admin/database/comments.php";
    include "../admin/database/users.php";
  $page = isset($_GET["page"]) ? $_GET["page"] : "home";
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>TITLE</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">


	<!-- Font -->

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">


	<!-- Stylesheets -->

	<link href="common-css/bootstrap.css" rel="stylesheet">

	<link href="common-css/ionicons.css" rel="stylesheet">

	<link href="common-css/layerslider.css" rel="stylesheet">


	<link href="01-homepage/css/styles.css" rel="stylesheet">

	<link href="01-homepage/css/responsive.css" rel="stylesheet">

	<link href="04-Contact/css/styles.css" rel="stylesheet">

	<link href="04-Contact/css/responsive.css" rel="stylesheet">

	<link href="03-About-me/css/styles.css" rel="stylesheet">

	<link href="03-About-me/css/responsive.css" rel="stylesheet">

	<link href="02-Single-post/css/styles.css" rel="stylesheet">

	<link href="02-Single-post/css/responsive.css" rel="stylesheet">
</head>
<body>

	<?php include "./includes/header.php"?>

	<?php
	if($page == "home"){
		include "includes/slider.php";
	}
		?>

	<section class="section blog-area">
		<div class="container">
			<div class="row">
                <?php
                    if($page == "home"){
                        include "includes/home.php";
                    }else if($page == "contact"){
                        include "includes/contact.php";
                    }else if($page == "about"){
                        include "includes/about.php";
                    }else if($page == "blogdetail"){
                        include "includes/blogdetail.php";
                    }
                ?>
				<?php include "./includes/sidebar.php"?>

			</div><!-- row -->
		</div><!-- container -->
	</section><!-- section -->

	<?php include "./includes/footer.php"?>

	<!-- SCIPTS -->

	<script src="common-js/jquery-3.1.1.min.js"></script>

	<script src="common-js/tether.min.js"></script>

	<script src="common-js/bootstrap.js"></script>

	<script src="common-js/layerslider.js"></script>

	<script src="common-js/scripts.js"></script>

	<script src="common-js/grasp_mobile_progress_circle-1.0.0.js"></script>

	<script src="common-js/embed.videos.min.js"></script>

	<script src="common-js/jquery.circliful.min.js"></script>

    <script
    src="https://use.fontawesome.com/releases/v6.1.0/js/all.js"
    crossorigin="anonymous"
    ></script>
</body>
</html>
