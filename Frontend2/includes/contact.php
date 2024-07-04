<?php
    $database = new database();
    $db = $database->connect();
    $contact = new contact($db);
    $contact->id=1;
    $contact->read();
?>

<div class="col-lg-8 col-md-12">
    <div class="blog-posts">

        <div class="single-post">
            <div class="image-wrapper"><img src="images/blog-8-1000x600.jpg" alt="Blog Image"></div>

            <h3 class="title"><b class="light-color">Contact me</b></h3>
            <p class="desc"><?php echo $contact->content?></p>

        </div><!-- single-post -->

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