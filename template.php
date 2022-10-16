<?php 
    require("./includes/header.php");
    require("./includes/navbar.php");
 ?>

<div class="d-flex" style="width: 100%;">
    <?php require('./includes/sidebar.php') ?>

    <main class="p-2 main-me">
    <?php $header = 'Dashboard'; $create_item = 'BLOG'; require('./includes/title.php');?>
    
        <div class="container container-me d-flex flex-wrap gap-1">

            <div class="card flex-1" style="max-width: 300px;">
                <h5 class="card-header">Featured</h5>
                <div class="card-body">
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>

        </div>
        
    </main>
</div>

<?php require("./includes/footer.php") ?>