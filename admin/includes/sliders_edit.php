<?php
    $sliders = new sliders($db);
    if($_GET["id"]){
        $sliders->id = $_GET["id"];
        $sliders->read();
    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $sliders->title = $_POST["title"];
        if(!empty($_FILES["image"]["name"])){
            if($sliders->image){
                $sliders->image = updateImage($_FILES["image"],$sliders->image,"../images/sliders/");
            }
            else{
                $sliders->image = uploadImage($_FILES["image"],"../images/sliders/");
            }
        }
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $sliders->updated_at = date("Y-m-d h:i:s",time());
        if($sliders->update()){
            $message = "Slider updated successfully!";
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
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit Slider</h3></div>
                    <div class="card-body">
                        <form method="post" action="index.php?page=sliders_edit&id=<?php echo $_GET["id"]?>" enctype="multipart/form-data">
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" name="title" value="<?php echo $sliders->title?>"/>
                                <label for="inputEmail">Title</label>
                            </div>
                            <?php 
                                if($sliders->image){
                            ?>
                                <div class="mb-3">
                                    <img src="<?php echo "../images/sliders/".$sliders->image?>" alt="" style="width:250px;">
                                </div>
                            <?php 
                                }
                            ?>
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