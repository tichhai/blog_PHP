<?php
    $blogcategories = new blogcategories($db);
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $blogcategories->title = $_POST["title"];
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $blogcategories->created_at = date("Y-m-d h:i:s",time());
        $blogcategories->updated_at = date("Y-m-d h:i:s",time());
        if($blogcategories->create()){
            $message = "New blog category added successfully!";
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
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Add New Blog Category</h3></div>
                    <div class="card-body">
                        <form method="post" action="index.php?page=blogcategories_add">
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" name="title"/>
                                <label for="inputEmail">Title</label>
                            </div>
                            <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</main>