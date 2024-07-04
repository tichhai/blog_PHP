<?php
    $blogcategories = new blogcategories($db);
    $stmt_category = $blogcategories->readAll();
    $blogs = new blogs($db);
    if($_GET["id"]){
        $blogs->id = $_GET["id"];
        $blogs->read();
    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $blogs->id_user = $_SESSION["user_id"];
        $blogs->title = $_POST["title"];
        $blogs->content = $_POST["content"];
        $blogs->id_category = $_POST["id_category"];
        $blogs->status = isset($_POST["status"])=="on"?1:0;

        if(!empty($_FILES["image"]["name"])){
            if($blogs->image){
                $upload_file_name = updateImage($_FILES["image"],$blogs->image,"../images/blogs/");
            }
            else{
                $upload_file_name = uploadImage($_FILES["image"],"../images/blogs/");
            }
            $blogs->image = $upload_file_name;
        }
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $blogs->updated_at = date("Y-m-d h:i:s",time());
        if($blogs->update()){
            $message = "Blog updated successfully!";
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
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit Blog</h3></div>
                    <div class="card-body">
                        <form method="post" action="index.php?page=blogs_edit&id=<?php echo $_GET["id"]?>" enctype="multipart/form-data">
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" name="title" value="<?php echo $blogs->title?>"/>
                                <label>Title</label>
                            </div>
                            <?php
                                if($blogs->image){
                            ?>
                                <div class="mb-3">
                                    <img src="<?php echo "../images/blogs/".$blogs->image?>" alt="" style="width:200px;">
                                </div>
                            <?php
                                }
                            ?>
                            <div class="mb-3">
                                <label>Image</label>
                                <input type="file" name="image"/>
                            </div>
                            <div class="mb-3">
                                <input type="checkbox" name="status" <?php echo $blogs->status==1?"checked":""?>/>
                                Status
                            </div>
                            <div class="mb-3">
                                <label>Content</label>
                                <textarea id="content" name="content"><?php echo $blogs->content?></textarea>
                            </div>
                            <div class="mb-3">
                                <label>Category</label>
                                <select name="id_category" class="form-control">
                                    <?php
                                        while($rows = $stmt_category->fetch()){
                                    ?>
                                        <option value="<?php echo $rows["id"]?>" <?php echo $rows["id"]==$blogs->id_category?"selected":""?>><?php echo $rows["title"]?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</main>