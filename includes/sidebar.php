<?php 
    require('./database.php');

    $statament = $pdo->prepare('SELECT * FROM sidebar');
    $statament->execute();

    $side_items = $statament->fetchAll();

?>

<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark"  style="width: 200px; height: calc(100vh - 57px);">
    <ul class="nav nav-pills flex-column mb-auto">
      
    <?php foreach($side_items as $item): ?>
      <li class="nav-item">
        <a href="/<?= strtolower($item['title']); ?>" class="nav-link text-uppercase text-white" aria-current="page">
          <?= $item['title']; ?>
        </a>
      </li>
    <?php endforeach; ?>

    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <strong>others</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
        <li><a class="dropdown-item" href="../settings.php">Settings</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Sign out</a></li>
      </ul>
    </div>
  </div>