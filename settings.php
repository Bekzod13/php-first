<?php 
    require("./includes/header.php");
    require("./includes/navbar.php");
    require('./database.php');

    $statament = $pdo->prepare('SELECT * FROM sidebar');
    $statament->execute();

    $side_items = $statament->fetchAll();

    if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['title'] != ''){
        $title = $_POST['title'];
        $statament = $pdo->prepare("INSERT INTO sidebar (title) VALUES (:title)");
        $statament->execute([
            'title'=> $title
        ]);

        $_SESSION['message'] = 'created successfully!';
        header("Location: settings.php");
        exit();
    };

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['delete'])){
        $id = $_POST['id'];
        $statament = $pdo->prepare("DELETE FROM sidebar WHERE id = ?");
        $statament->execute([$id]);

    
        $_SESSION['message'] = 'deleted successfully!';
        header("Location: settings.php");
        exit();
    };
    

 ?>

<div class="d-flex" style="width: 100%;">
    <?php require('./includes/sidebar.php') ?>

    <main class="p-2 main-me">
        <?php $header = 'SETTINGS'; $create_item = ''; require('./includes/title.php');?>
        <div class="container container-me gap-1">

        <?php if(isset($_SESSION['message'])): ?>
            <div class="alert alert-info" role="alert">
                <?= $_SESSION['message']; ?>
                <?php unset($_SESSION['message']); ?>
            </div>
        <?php endif;?>
            <div class="d-flex card">
                <div class="card-header">Create item</div>
                <div class="card-body">
                    <form method="POST" action="" class="from-control d-flex">
                        <input type="text" class="form-control" placeholder="Type new side item" name="title">
                        <button type="submit" class="mx-2 px-4 btn btn-success">save</button>
                    </form>
                </div>
            </div>

            <div class="card mt-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Crated time</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">

                        <?php foreach($side_items as $item): ?>

                            <tr>
                                <th><?= $item['id'];?></th>
                                <td><?= $item['title'];?></td>
                                <td><?= $item['created_at'];?></td>
                                <td>
                                    <div class="d-flex">
                                        <button class="btn btn-primary mx-2">edit</button>
                                        <form action="" method="POST" onsubmit="return confirm('confirm delete')">
                                            <input type="hidden" name="delete">
                                            <input type="hidden" name="id" value="<?= $item['id']; ?>">
                                            <button type="submit" class="btn btn-danger">delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>

        </div>
    </main>
</div>

<?php require("./includes/footer.php") ?>