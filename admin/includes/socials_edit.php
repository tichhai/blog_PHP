<?php
    $socials = new socials($db);
    if($_GET["id"]){
        $socials->id = $_GET["id"];
        $socials->read();
    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $socials->title = $_POST["title"];
        $socials->icon = $_POST["icon"];
        $socials->url = $_POST["url"];
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $socials->updated_at = date("Y-m-d h:i:s",time());
        if($socials->update()){
            $message = "Social updated successfully!";
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
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit Social</h3></div>
                    <div class="card-body">
                        <form method="post" action="index.php?page=socials_edit&id=<?php echo $_GET["id"]?>">
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" name="title" value="<?php echo $socials->title?>"/>
                                <label >Title</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" name="icon" value="<?php echo htmlspecialchars($socials->icon)?>"/>
                                <label >Icon</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" name="url" value="<?php echo $socials->url?>"/>
                                <label >URL</label>
                            </div>
                            <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</main>