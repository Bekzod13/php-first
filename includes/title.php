<h1 class="d-flex justify-content-between flex-wrap" >
    <span>
        <?= $header; ?>
    </span>
    <span>
        <?php if($create_item != ''): ?>
            <a href="createBlog.php" class="btn btn-success w-100">CREATE <?= $create_item ?></a>
        <?php endif; ?>
    </span>
</h1>