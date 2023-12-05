<?php
  if(!isset($_SESSION['logged'])){
    header("Location:/admin/login");
  }
  if (isset($_SESSION['error_message'])) {
    $error_message = $_SESSION['error_message'];
    unset($_SESSION['error_message']);
  }
  if (isset($_SESSION['accept_message'])) {
    $accept_message = $_SESSION['accept_message'];
    unset($_SESSION['accept_message']);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../../assets/styles/admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
    <nav>
        <div>
            <a href="/admin/<?php echo $_SESSION['name']?>/<?php echo $_SESSION['id']?>" id="admin"><h3>Admin</h3></a>
            <span id="menu" class="material-symbols-outlined">
            menu
            </span>
        </div>
        <div class="d-flex gap-3">
            <a  href=""><?php echo $_SESSION['name'] ?></a>
            <a  href="/admin/logout">Logout</a>
        </div>
    </nav>
    <main>
        <section id="lateral_menu">
            <div id="metade">
                <a href="/admin/<?php echo $_SESSION['name']?>/<?php echo $_SESSION['id']?>" class="options">
                    <span class="material-symbols-outlined">
                    dashboard
                    </span>
                    <h6>Admin Profile</h6>
                </a>
                <a class="options" href="/admin/createNews">
                    <span class="material-symbols-outlined">
                    full_coverage
                    </span>
                    <h6>Add News</h6>
                </a>
                <a href="/admin/infoNews" class="options">
                    <span class="material-symbols-outlined">
                    breaking_news_alt_1
                    </span>
                    <h6>News Info</h6>
                </a>  
                <a href="/admin/register" class="options">
                    <span class="material-symbols-outlined">
                    person_add
                    </span>
                    <h6>Add Admin</h6>
                </a>    
                <a href="/admin/info" class="options">
                    <span class="material-symbols-outlined">
                    group
                    </span>
                    <h6>Admin Info</h6>
                </a>
            </div>
        </section>
        <section>
            <?=$this->section('content')?>
        </section>
    </main>
</body>
</html>
<script src="../../assets/js/menu.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
