<?php
    $mailsettings = new mailsettings($db);
    $mailsettings->id = 1;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $mailsettings->email = $_POST["email"];
        $mailsettings->mail_server = $_POST["mail_server"];
        $mailsettings->mail_username = $_POST["mail_username"];
        $mailsettings->mail_password = $_POST["mail_password"];
        $mailsettings->mail_port = $_POST["mail_port"];
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $mailsettings->created_at = date("Y-m-d h:i:s",time());
        $mailsettings->updated_at = date("Y-m-d h:i:s",time());
        if($mailsettings->readAll()->rowCount()>0){
            $mailsettings->id = 1;
            $mailsettings->update();
        }else{
            $mailsettings->create();
        }
        $message = "Mail settings page updated successfully!";
    }
    $mailsettings->read();
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
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit Mail Settings</h3></div>
                    <div class="card-body">
                        <form method="post" action="index.php?page=mailsettings">
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" name="email" value="<?php echo $mailsettings->email?>"/>
                                <label >Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" name="mail_server" value="<?php echo $mailsettings->mail_server?>"/>
                                <label >Mail Server</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" name="mail_username" value="<?php echo $mailsettings->mail_username?>"/>
                                <label >Mail Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" type="password" name="mail_password" value="<?php echo $mailsettings->mail_password?>"/>
                                <label >Mail Password</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" name="mail_port" value="<?php echo $mailsettings->mail_port?>"/>
                                <label >Mail Port</label>
                            </div>
                            
                            <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</main>