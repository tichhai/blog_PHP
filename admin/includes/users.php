<?php
    $users = new users($db);
    if(!empty($_GET["id"])){
        $users->id = $_GET["id"];
        $users->read();
        if($users->image){
            deleteImage($users->image,"../images/users/");
        }
        if($users->delete()){
            $message = "Deleted successfully!";
        }
    }
    $stmt_users = $users->readAll();
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Users</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Users</li>
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
                    <a href="index.php?page=users_add" class="btn btn-primary btn-sm">Add</a>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple" style="text-align: center;">
                        <thead >
                            <tr>
                                <th style="text-align: center;">ID</th>
                                <th style="text-align: center;">Image</th>
                                <th style="text-align: center;">Name</th>
                                <th style="text-align: center;">Username</th>
                                <th style="text-align: center;">Role</th>
                                <th style="text-align: center;">Status</th>
                                <th style="text-align: center;">Created Date</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th style="text-align: center;">ID</th>
                                <th style="text-align: center;">Image</th>
                                <th style="text-align: center;">Name</th>
                                <th style="text-align: center;">Username</th>
                                <th style="text-align: center;">Role</th>
                                <th style="text-align: center;">Status</th>
                                <th style="text-align: center;">Created Date</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                                while($rows = $stmt_users->fetch()){
                            ?>
                            <tr>
                                <td><?php echo $rows["id"]?></td>
                                <td>
                                    <img src="<?php echo "../images/users/".$rows["image"]?>" alt="" style="width:80px;">
                                </td>
                                <td><?php echo $rows["name"]?></td>
                                <td><?php echo $rows["username"]?></td>
                                <td><?php echo userRole($rows["role"])?></td>
                                <td>
                                    <div class=" mb-3">
                                        <input type="checkbox" <?php echo $rows["status"]?"checked":""?>/>
                                    </div>
                                </td>
                                <td><?php echo $rows["created_at"]?></td>
                                <td>
                                    <a href="index.php?page=users_edit&id=<?php echo $rows["id"]?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="index.php?page=users&id=<?php echo $rows["id"]?>" class="btn btn-danger btn-sm">Delete</a>
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