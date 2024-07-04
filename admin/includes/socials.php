<?php
    $socials = new socials($db);
    if(!empty($_GET["id"])){
        $socials->id = $_GET["id"];
        if($socials->delete()){
            $message = "Deleted successfully!";
        }
    }
    $stmt_socials = $socials->readAll();
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Socials</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Socials</li>
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
                    <a href="index.php?page=socials_add" class="btn btn-primary btn-sm">Add</a>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple" style="text-align: center;">
                        <thead >
                            <tr>
                                <th style="text-align: center;">ID</th>
                                <th style="text-align: center;">Title</th>
                                <th style="text-align: center;">Icon</th>
                                <th style="text-align: center;">URL</th>
                                <th style="text-align: center;">Created Date</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th style="text-align: center;">ID</th>
                                <th style="text-align: center;">Title</th>
                                <th style="text-align: center;">Icon</th>
                                <th style="text-align: center;">URL</th>
                                <th style="text-align: center;">Created Date</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                                while($rows = $stmt_socials->fetch()){
                            ?>
                            <tr>
                                <td><?php echo $rows["id"]?></td>
                                <td><?php echo $rows["title"]?></td>
                                <td>
                                    <?php echo $rows["icon"]?>
                                </td>
                                <td>
                                    <?php echo $rows["url"]?>
                                </td>
                                <td><?php echo $rows["created_at"]?></td>
                                <td>
                                    <a href="index.php?page=socials_edit&id=<?php echo $rows["id"]?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="index.php?page=socials&id=<?php echo $rows["id"]?>" class="btn btn-danger btn-sm">Delete</a>
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