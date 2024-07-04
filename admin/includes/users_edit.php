<?php
    $users = new users($db);
    if($_GET["id"]){
        $users->id = $_GET["id"];
        $users->read();
    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $users->name = $_POST["name"];
        $users->username = $_POST["username"];
        $users->password = sha1($_POST["password"]);
        $users->phone = $_POST["phone"];
        $users->email = $_POST["email"];
        $users->role = $_POST["role"];
        $users->email_verified = "verified";
        $users->status = isset($_POST["status"])=="on"?1:0;
        if(!empty($_FILES["image"]["name"])){
            if($users->image){
                $upload_file_name = updateImage($_FILES["image"],$users->image,"../images/users/");
            }
            else{
                $upload_file_name = uploadImage($_FILES["image"],"../images/users/");
            }
            $users->image = $upload_file_name;
        }
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $users->created_at = date("Y-m-d h:i:s",time());
        $users->updated_at = date("Y-m-d h:i:s",time());
        if($users->update()){
            $message = "User updated successfully!";
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
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit User</h3></div>
                    <div class="card-body">
                        <form method="post" action="index.php?page=users_edit&id=<?php echo $_GET["id"]?>" enctype="multipart/form-data">
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" name="name" value="<?php echo $users->name?>"/>
                                <label >Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" name="username" value="<?php echo $users->username?>"/>
                                <label >Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" type="password" name="password" value="<?php echo $users->password?>"/>
                                <label >Password</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" name="phone" value="<?php echo $users->phone?>"/>
                                <label >Phone</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" name="email" value="<?php echo $users->email?>"/>
                                <label >Email</label>
                            </div>
                            <div class="mb-3">
                                <label >Role</label>
                                <select name="role" class="form-control">
                                    <option value="0" <?php echo $users->role==0?"selected":""?>>User</option>
                                    <option value="1" <?php echo $users->role==1?"selected":""?>>Mod</option>
                                    <option value="2" <?php echo $users->role==2?"selected":""?>>Admin</option>
                                </select>
                            </div>
                            <?php
                                if($users->image){
                            ?>
                                <div class="mb-3">
                                    <img src="<?php echo "../images/users/".$users->image?>" alt="" style="width:100px;">
                                </div>
                            <?php
                                }
                            ?>
                            <div class="mb-3">
                                <label >Image</label>
                                <input type="file" name="image"/>
                            </div>
                            <div class="mb-3">
                                <input type="checkbox" name="status" <?php echo $users->status==1?"checked":""?>/>
                                Status
                            </div>
                            <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</main>