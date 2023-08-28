<?php
use app\database\models\select\DefaultSelect;
$this->layout('master', ['title'=>$title]);
if (isset($_SESSION['error_message'])) {
    $error_message = $_SESSION['error_message'];
    unset($_SESSION['error_message']);
  }
?>
<body>
  <main>
  <div class="container mt-5">
       <?php if (isset($error_message)) : ?>
                  <p style="color: red; text-align: center;"><?php echo $error_message?></p>
        <?php endif; ?>
      <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php DefaultSelect::getHtml() ?>
      </div>  
  </div> 
  </main>      
</body>

