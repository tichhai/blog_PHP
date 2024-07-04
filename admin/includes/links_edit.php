<?php
    $links = new links($db);
    if($_GET["id"]){
        $links->id = $_GET["id"];
        $links->read();
    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $links->title = $_POST["title"];
        $links->url = $_POST["url"];
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $links->updated_at = date("Y-m-d h:i:s",time());
        if($links->update()){
            $message = "Link updated successfully!";
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
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit Link</h3></div>
                    <div class="card-body">
                        <form method="post" action="index.php?page=links_edit&id=<?php echo $_GET["id"]?>">
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" name="title" value="<?php echo $links->title?>"/>
                                <label >Title</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" name="url" value="<?php echo $links->url?>"/>
                                <label >URL</label>
                            </div>
                            <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</main>