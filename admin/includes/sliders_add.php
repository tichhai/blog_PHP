<?php
    $sliders = new sliders($db);
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $sliders->title = $_POST["title"];
        $sliders->image = uploadImage($_FILES["image"],"../images/sliders/");
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $sliders->created_at = date("Y-m-d h:i:s",time());
        $sliders->updated_at = date("Y-m-d h:i:s",time());
        if($sliders->create()){
            $message = "New slider added successfully!";
        }
    }
?>

<main class="d-flex jutify-content-end" style="margin-left:20%;width:100%;margin-right:2%;margin-top:100px">
    <div class="container">
        <div class="row justify-content-center">
            <?php
                if(!empty($message)){
            ?>
                <div class="alert alert-success"><?php echo $message?></div>
            <?php
                }
            ?>

                <div class="card shadow-lg border-0 rounded-lg ">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Add New Slider</h3></div>
                    <div class="card-body">
                        <form method="post" action="index.php?page=sliders_add" enctype="multipart/form-data">
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" name="title"/>
                                <label for="inputEmail">Title</label>
                            </div>
                            <div class="mb-3">
                                <label>Image</label>
                                <input type="file" name="image"/>
                            </div>
                            <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</main>