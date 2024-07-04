<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" href="index.php">
                    <div class="sb-nav-link-icon" ><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link " href="index.php?page=blogs" >
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Blogs
                </a>
                <?php 
                    if($_SESSION["user_role"]>=1){
                ?>
                    <a class="nav-link " href="index.php?page=blogcategories" >
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Blog Categories
                    </a>
                    <a class="nav-link " href="index.php?page=subscribers" >
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Subscribers
                    </a>
                    <a class="nav-link " href="index.php?page=comments" >
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Comments
                    </a>
                    <a class="nav-link " href="index.php?page=users" >
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Users
                    </a>
                <?php
                    }
                ?>
                <?php 
                    if($_SESSION["user_role"]==2){
                ?>
                    <a class="nav-link " href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Manage Website
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link " href="index.php?page=sliders" >
                                Sliders
                            </a>
                            <a class="nav-link " href="index.php?page=socials" >
                                Socials
                            </a>
                            <a class="nav-link " href="index.php?page=links" >
                                Links
                            </a>
                            <a class="nav-link " href="index.php?page=about" >
                                About
                            </a>
                            <a class="nav-link " href="index.php?page=contact" >
                                Contact
                            </a>
                            <a class="nav-link " href="index.php?page=terms" >
                                Terms
                            </a>
                            <a class="nav-link " href="index.php?page=settings" >
                                Settings
                            </a>
                            <a class="nav-link " href="index.php?page=mailsettings" >
                                Setting Mail
                            </a>
                        </nav>
                    </div>
                <?php
                    }
                ?>
        </div>
    </nav>
</div>