<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$this->e($title)?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../../assets/Styles/style.css">
</head>
<body>
    <header> 
        <?php
        if (!isset($_SESSION['logged'])) {
            $this->insert('templates/header');
        } else {
            $this->insert('templates/headerUser');
        }
        ?>
    </header>
        
    <div id="section">
        <?=$this->section('content')?>
    </div>

    <footer>
        <?=$this->insert('templates/footer') ?>
    </footer>
</body>
</html>
