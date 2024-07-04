<?php
    $database = new database();
    $db = $database->connect();
    $id = $_GET["id"];
    $blogs = new blogs($db);
    $socials = new socials($db);
    $stmt_socials = $socials->readAll();
    $blogcategories = new blogcategories($db);
    $stmt_categories = $blogcategories->readAll();
    $blogs->id=$id;
    $blogs->read();
    $blogcategories = new blogcategories($db);
    $blogcategories->id = $blogs->id;
    $blogcategories->read();
    $comments = new comments($db);
    $comments->id_blog = $blogs->id;
    $comments = $comments->readAllWithIDBlog();
    $users = new users($db);
    $users->id = $blogs->id_user;
    $users->read();
?>

<div class="col-lg-8 col-md-12">
    <div class="blog-posts">

        <div class="single-post">
            <div class="image-wrapper"><img src="<?php echo "../images/blogs/".$blogs->image?>" alt="Blog Image"></div>
            <div class="icons">
                <div class="left-area">
                    <a class="btn caegory-btn" href="#"><b><?php echo $blogcategories->title?></b></a>
                </div>
                <ul class="right-area social-icons">
                    <li><a href="#"><i class="ion-android-textsms"></i><?php echo $comments->rowCount()?></a></li>
                </ul>
            </div>
            <p class="date"><em><?php echo $blogs->created_at?></em></p>
            <h3 class="title"><a href="index.php?page=blogdetail&id=<?php echo $blogs->id?>"><b class="light-color"><?php echo $blogs->title?></b></a></h3>
            <p class="desc"><?php echo $blogs->content?></p>

            <ul>
            <?php
                while($rows = $stmt_categories->fetch()){
                    if($rows["status"]==1){
            ?>
                <li><a class="btn" href="#"><?php echo $rows["title"]?></a></li>
            <?php
                    }}
            ?>
            </ul>

        </div><!-- single-post -->


        <div class="post-author">
            <div class="author-image"><img src="<?php echo "../images/users/".$users->image?>" alt="Autohr Image"></div>
            <div class="author-info">
                <h4 class="name"><b class="light-color"><?php echo $users->name?></b></h4>

                <ul class="social-icons">
                <?php
					while($socialsData = $stmt_socials->fetch()){
				?>
					<li><a href="<?php echo $socialsData["url"]?>"><?php echo $socialsData["icon"]?></a></li>
				<?php
					}
				?>
                </ul><!-- right-area -->

            </div><!-- author-info -->
        </div><!-- post-author -->

        <div class="comments-area">
            <h4 class="title"><b class="light-color"><?php echo $comments->rowCount()?> Comments</b></h4>
            <?php 
                $userWithName = new users($db);
                while($comment = $comments->fetch()){
                    $userWithName->name = $comment["name"];
                    $user = $userWithName->readAllUsersWithName()->fetch();
            ?>
            <div class="comment">
                <div class="author-image"><img src="<?php echo "../images/users/".$user["image"]?>" alt="Autohr Image"></div>
                <div class="comment-info">
                    <h5><b class="light-color"><?php echo $comment["name"]?></b></h5>
                    <h6 class="date"><em><?php echo $comment["created_at"]?></em></h6>
                    <p><?php echo $comment["comment"]?></p>
                </div>
            </div><!-- comment -->
            <?php
                }
            ?>
        </div><!-- comments-area -->

        <div class="leave-comment-area">
            <h4 class="title"><b class="light-color">Leave a comment</b></h4>
            <div class="leave-comment">

                <form method="post">
                    <div class="row">
                        <div class="col-sm-6">
                            <input class="name-input" type="text" placeholder="Name">
                        </div>
                        <div class="col-sm-6">
                            <input class="email-input" type="text" placeholder="Email">
                        </div>
                        <div class="col-sm-12">
                            <input class="subject-input" type="text" placeholder="Subject">
                        </div>
                        <div class="col-sm-12">
                            <textarea class="message-input" rows="6" placeholder="Message"></textarea>
                        </div>
                        <div class="col-sm-12">
                            <button class="btn btn-2"><b>COMMENT</b></button>
                        </div>

                    </div><!-- row -->
                </form>

            </div><!-- leave-comment -->

        </div><!-- comments-area -->

    </div><!-- blog-posts -->
</div><!-- col-lg-4 -->