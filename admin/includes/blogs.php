<?php
    $blogcategories = new blogcategories($db);
    $blogs = new blogs($db);
    if(!empty($_GET["id"])){
        $blogs->id = $_GET["id"];
        $blogs->read();
        if($blogs->image){
            deleteImage($blogs->image,"../images/blogs/");
        }
        if($blogs->delete()){
            $message = "Deleted successfully!";
        }
    }
    if($_SESSION["user_role"]==0){
        $blogs->id_user = $_SESSION["user_id"];
        $stmt_categories = $blogs->readUserID();
    }else{
        $stmt_categories = $blogs->readAll();
    }
    
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Blogs</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Blogs</li>
            </ol>
            <?php
                if(!empty($message)){
            ?>
                <div class="alert alert-success"><?php echo $message?></div>
            <?php
                }
            ?>
            <div class="card mb-4">
                <div class="card-header ">
                    <a href="index.php?page=blogs_add" class="btn btn-primary btn-sm">Add</a>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple" style="text-align: center;">
                        <thead >
                            <tr>
                                <th style="text-align: center;">ID</th>
                                <th style="text-align: center;">Image</th>
                                <th style="text-align: center;">Blog Category</th>
                                <th style="text-align: center;">Title</th>
                                <th style="text-align: center;">Status</th>
                                <th style="text-align: center;">Created Date</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th style="text-align: center;">ID</th>
                                <th style="text-align: center;">Image</th>
                                <th style="text-align: center;">Blog Category</th>
                                <th style="text-align: center;">Title</th>
                                <th style="text-align: center;">Status</th>
                                <th style="text-align: center;">Created Date</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                                while($rows = $stmt_categories->fetch()){
                            ?>
                            <tr>
                                <td><?php echo $rows["id"]?></td>
                                <td><img src="<?php echo "../images/blogs/".$rows["image"]?>" alt="" style="width:80px"></td>
                                <td>
                                    <?php
                                        $blogcategories->id = $rows["id_category"];
                                        $blogcategories->read();
                                        echo $blogcategories->title;
                                    ?>
                                </td>
                                <td><?php echo strlen($rows["title"])>12?substr($rows["title"],0,12)." ...":$rows["title"]?></td>
                                <td>
                                    <div class=" mb-3">
                                        <input type="checkbox" <?php echo $rows["status"]?"checked":""?>/>
                                    </div>
                                </td>
                                <td><?php echo $rows["created_at"]?></td>
                                <td>
                                    <a href="index.php?page=blogs_edit&id=<?php echo $rows["id"]?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="index.php?page=blogs&id=<?php echo $rows["id"]?>" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Your Website 2022</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
</div>