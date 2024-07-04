<?php
    $database = new database();
    $db = $database->connect();
    $about= new about($db);
    $about->id=1;
    $about->read();
?>

<div class="col-lg-8 col-md-12">
    <div class="blog-posts">
        <div class="single-post">
            <h5 class="quoto"><em><i class="ion-quote"></i><?php echo $about->content?>
            </em></h5>

            <p class="desc"><?php echo $about->footer?></p>

        </div>

    </div><!-- blog-posts -->
</div><!-- col-lg-4 -->