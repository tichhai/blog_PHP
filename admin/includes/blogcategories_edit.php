<?php
    $blogcategories = new blogcategories($db);

    if($_GET["id"]){
        $blogcategories->id = $_GET["id"];
        $blogcategories->read();
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $blogcategories->title = $_POST["title"];
        $blogcategories->status = isset($_POST["status"])=="on"?1:0;
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $blogcategories->updated_at = date("Y-m-d h:i:s",time());
        if($blogcategories->update()){
            $message = "Blog category updated successfully!";
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
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit Blog Category</h3></div>
                    <div class="card-body">
                        <form method="post" action="index.php?page=blogcategories_edit&id=<?php echo $_GET["id"]?>">
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" name="title" value="<?php echo $blogcategories->title?>"/>
                                <label for="inputEmail">Title</label>
                            </div>
                            <div class="mb-3">
                                <input type="checkbox" name="status" <?php echo $blogcategories->status==1?"checked":""?>/>
                                Status
                            </div>
                            <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</main>