<?php
    $contact = new contact($db);
    $contact->id = 1;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $contact->content = $_POST["content"];
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $contact->created_at = date("Y-m-d h:i:s",time());
        $contact->updated_at = date("Y-m-d h:i:s",time());
        if($contact->readAll()->rowCount()>0){
            $contact->id = 1;
            $contact->update();
        }else{
            $contact->create();
        }
        $message = "Contact page updated successfully!";
    }
    $contact->read();
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
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit Contact</h3></div>
                    <div class="card-body">
                        <form method="post" action="index.php?page=contact">
                            <div class="mb-3">
                                <label>Content</label>
                                <textarea id="content" name="content"><?php echo @$contact->content?></textarea>
                            </div>
                            <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</main>