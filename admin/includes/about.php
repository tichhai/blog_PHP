<?php
    $about = new about($db);
    $about->id = 1;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $about->content = $_POST["content"];
        $about->footer = $_POST["footer"];
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $about->created_at = date("Y-m-d h:i:s",time());
        $about->updated_at = date("Y-m-d h:i:s",time());
        if($about->readAll()->rowCount()>0){
            $about->id = 1;
            $about->update();
        }else{
            $about->create();
        }
        $message = "About page updated successfully!";
    }
    $about->read();
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
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit About</h3></div>
                    <div class="card-body">
                        <form method="post" action="index.php?page=about">
                            <div class="mb-3">
                                <label>Content</label>
                                <textarea id="content" name="content"><?php echo @$about->content?></textarea>
                            </div>
                            <div class="mb-3">
                                <label>Footer</label>
                                <textarea id="footer" name="footer"><?php echo @$about->footer?></textarea>
                            </div>
                            <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</main>