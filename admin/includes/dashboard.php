<?php
    $blogs = new blogs($db);
    $users = new users($db);
    $comments = new comments($db);
    $subscribers = new subscribers($db);
    $settings = new settings($db);
    $settings->id = 1;
    $settings->read();
?>

<div id="layoutSidenav_content">
<main>
    <div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">Blogs (<?php echo $blogs->readAll()->rowCount()?>)</div>
            <div
            class="card-footer d-flex align-items-center justify-content-between"
            >
            <a class="small text-white stretched-link" href="#"
                >View Details</a
            >
            <div class="small text-white">
                <i class="fas fa-angle-right"></i>
            </div>
            </div>
        </div>
        </div>
        <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4">
            <div class="card-body">Users (<?php echo $users->readAll()->rowCount()?>)</div>
            <div
            class="card-footer d-flex align-items-center justify-content-between"
            >
            <a class="small text-white stretched-link" href="#"
                >View Details</a
            >
            <div class="small text-white">
                <i class="fas fa-angle-right"></i>
            </div>
            </div>
        </div>
        </div>
        <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">Subscribers (<?php echo $subscribers->readAll()->rowCount()?>)</div>
            <div
            class="card-footer d-flex align-items-center justify-content-between"
            >
            <a class="small text-white stretched-link" href="#"
                >View Details</a
            >
            <div class="small text-white">
                <i class="fas fa-angle-right"></i>
            </div>
            </div>
        </div>
        </div>
        <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
            <div class="card-body">Comments (<?php echo $comments->readAll()->rowCount()?>)</div>
            <div
            class="card-footer d-flex align-items-center justify-content-between"
            >
            <a class="small text-white stretched-link" href="#"
                >View Details</a
            >
            <div class="small text-white">
                <i class="fas fa-angle-right"></i>
            </div>
            </div>
        </div>
        </div>
    </div>
</main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
        <div
            class="d-flex align-items-center justify-content-between small"
        >
            <div class="text-muted"><?php echo $settings->site_footer?></div>
        </div>
        </div>
    </footer>
</div>