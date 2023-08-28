<?php $this->layout('master');
use app\database\models\news;
?>
<body>
    <main style="padding-left:20%;padding-right:20%;">
        <?php echo news::exec();?>
    </main>
</body>


       

 
