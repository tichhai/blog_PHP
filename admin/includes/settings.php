<?php
    $settings = new settings($db);
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($settings->readAll()->rowCount()>0){
            $settings->id = 1;
            $settings->read();
            if(!empty($_FILES["site_logo"]["name"])){
                $settings->site_logo = updateImage($_FILES["site_logo"],$settings->site_logo,"../images/");
            }
            if(!empty($_FILES["site_favicon"]["name"])){
                $settings->site_favicon = updateImage($_FILES["site_favicon"],$settings->site_favicon,"../images/");
            }
            $settings->site_name = $_POST["site_name"];
            $settings->site_timezone = $_POST["site_timezone"];
            $settings->site_map = $_POST["site_map"];
            $settings->site_footer = $_POST["site_footer"];
            $settings->contact_email = $_POST["contact_email"];
            $settings->contact_phone = $_POST["contact_phone"];
            $settings->contact_address = $_POST["contact_address"];

            if($_POST["site_timezone"]){
                date_default_timezone_set($_POST["site_timezone"]);
            }
            $settings->created_at = date("Y-m-d h:i:s",time());
            $settings->updated_at = date("Y-m-d h:i:s",time());
            $settings->update();
        }else{
            if(!empty($_FILES["site_logo"]["name"])){
                $settings->site_logo = uploadImage($_FILES["site_logo"],"../images/");
            }
            if(!empty($_FILES["site_favicon"]["name"])){
                $settings->site_favicon = uploadImage($_FILES["site_favicon"],"../images/");
            }
            $settings->site_name = $_POST["site_name"];
            $settings->site_timezone = $_POST["site_timezone"];
            $settings->site_map = $_POST["site_map"];
            $settings->site_footer = $_POST["site_footer"];
            $settings->contact_email = $_POST["contact_email"];
            $settings->contact_phone = $_POST["contact_phone"];
            $settings->contact_address = $_POST["contact_address"];

            if($_POST["site_timezone"]){
                date_default_timezone_set($_POST["site_timezone"]);
            }
            $settings->created_at = date("Y-m-d h:i:s",time());
            $settings->updated_at = date("Y-m-d h:i:s",time());
            $settings->create();
        }
        $message = "Settings page updated successfully!";
    }
    $settings->id = 1;
    $settings->read();
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
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit Settings</h3></div>
                    <div class="card-body">
                        <form method="post" action="index.php?page=settings" enctype="multipart/form-data">
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" name="site_name" value="<?php echo $settings->site_name?>"/>
                                <label >Site Name</label>
                            </div>
                            <?php
                                if($settings->site_logo){
                            ?>
                                <div class="mb-3">
                                    <img src="<?php echo "../images/".$settings->site_logo?>" alt="" style="width:150px">
                                </div>
                            <?php
                                }
                            ?>
                            <div class="mb-3">
                                <label>Site Logo</label>
                                <input type="file" name="site_logo"/>
                            </div>
                            <?php
                                if($settings->site_favicon){
                            ?>
                                <div class="mb-3">
                                    <img src="<?php echo "../images/".$settings->site_favicon?>" alt="" style="width:150px">
                                </div>
                            <?php
                                }
                            ?>
                            <div class="mb-3">
                                <label>Site Favicon</label>
                                <input type="file" name="site_favicon"/>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" name="site_map" value="<?php echo htmlspecialchars($settings->site_map)?>"/>
                                <label >Site Map</label>
                            </div>
                            <div class="mb-3">
                                <label >Site Timezone</label>
                                <select name="site_timezone" id="">
                                    <option value="Asia/Ho_Chi_Minh">Select Timezone</option>
                                    <?php
                                        foreach(setTimezone() as $key=>$value){
                                    ?>
                                        <option value="<?php echo $key?>" <?php echo $key==$settings->site_timezone?"selected":""?>><?php echo $value?></option>
                                    <?php
                                        }
                                    ?>
                                    ?>
                                </select>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" name="site_footer" value="<?php echo $settings->site_footer?>"/>
                                <label >Site Footer</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" name="contact_email" value="<?php echo $settings->contact_email?>"/>
                                <label >Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" name="contact_phone" value="<?php echo $settings->contact_phone?>"/>
                                <label >Phone</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" name="contact_address" value="<?php echo $settings->contact_address?>"/>
                                <label >Address</label>
                            </div>
                            <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</main>