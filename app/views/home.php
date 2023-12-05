<?php
use app\database\models\querys\DefaultSelect;
$this->layout('master', ['title'=>$title]);
if (isset($_SESSION['error_message'])) {
    $error_message = $_SESSION['error_message'];
    unset($_SESSION['error_message']);
  }
?>
  <main>
    <div class="container mt-5">
        <?php if (isset($error_message)) : ?>
                    <p style="color: red; text-align: center;"><?php echo $error_message?></p>
            <?php endif; ?> 
            <?php
                DefaultSelect::Pages();
            ?>

        <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php foreach (DefaultSelect::mainNews() as $arr) {
                echo('
                        <div class="container mt-5"  style="width: 100%;">
                            <div class="card mb-8">
                                <div class="row g-0">
                                    <div class="col-md-3">
                                        <a style="text-decoration: none;" href="news/'.htmlspecialchars($arr['id']).'"> 
                                            <img src="'.htmlspecialchars($arr['image']).'" style="width: 100%;max-height:15rem;min-height:15rem;" alt="Image" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body" style="height:100%;">
                                        <a style="text-decoration: none;" href="news/'.htmlspecialchars($arr['id']).'"> 
                                            <h2 class="card-title" style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical; ">'.htmlspecialchars($arr['title']).'</h2>
                                        </a>
                                            <p class="card-text" style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical; ">'.htmlspecialchars($arr['paragraphs1']).'</p>
                                        </div>
                                    </div>
                                </div>
                                    <div class="d-flex justify-content-between card-footer">
                                            <small class="text-muted" style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical; ">'.htmlspecialchars($arr['date']).'</small>
                                            <small class="text-muted" style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical; ">'.htmlspecialchars($arr['name'])." ".htmlspecialchars($arr['name2']).'</small>
                                    </div>
                            </div>
                        </div>
                    ');}

                foreach (DefaultSelect::allNews() as $arr){
                echo('
                            <div class="col" >
                                <div class="card" >
                                    <a href="news/'.htmlspecialchars($arr['id']).'" style="text-decoration: none;">
                                    <img class="card-img-top"  style="max-height:15rem; min-height:15rem;"  src="'.htmlspecialchars($arr['image']).'" alt="Card image cap">
                                        <div class="card-body" style="max-height:9rem; min-height:9rem;">
                                            <h5 class="card-title" style="word-wrap: break-word;overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical; ">'.htmlspecialchars($arr['title']).'</h5>
                                            <p class="card-text" style="word-wrap: break-word;color:grey;overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical; ">'.htmlspecialchars($arr['paragraphs1']).'</p>
                                        </div>
                                    </a>      
                                        <div class="d-flex justify-content-between card-footer">
                                            <small class="text-muted" style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical; ">'.htmlspecialchars($arr['date']).'</small>
                                            <small class="text-muted" style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical; ">'.htmlspecialchars($arr['name'])." ".htmlspecialchars($arr['name2']).'</small>
                                        </div>
                                </div>
                            </div>   
                        ');}?></div> 
          
                <div>
                    <?php
                    if(!isset($_GET['page-nr'])){
                        $page = 1;
                    }else{
                        $page = $_GET['page-nr'];
                    }?>
                    <p style="text-align:center;">Showing <?php echo $page ?> of  <?php echo DefaultSelect::fullPage()?> </p>
                </div>

                <div class="pagination" style="display:flex;align-items:center;justify-content:center;">
                    <a  style="display:flex;align-items:center;text-decoration:none;" href="?page-nr=1">
                        <span class="material-symbols-outlined">
                            first_page
                        </span>
                    </a>
                    <?php
                        if(isset($_GET['page-nr']) && $_GET['page-nr'] > 1){
                    ?>   
                        <a style="display:flex;align-items:center;text-decoration:none;" href="?page-nr=<?php echo $_GET['page-nr'] - 1?>">
                            <span class="material-symbols-outlined">
                            chevron_left
                            </span>
                        </a>
                    <?php 
                    }else{
                        ?>
                            <a style="display:flex;align-items:center;text-decoration:none;">
                                <span class="material-symbols-outlined">
                                chevron_left
                                </span>
                            </a>
                        <?php
                    } ?>   
                    <div class="page-numbers" style="display:flex;text-decoration:none;">
                        <?php
                        $currentPage = isset($_GET['page-nr']) ? intval($_GET['page-nr']) : 1;
                        $totalPages = DefaultSelect::fullPage(); 
                        $start = max(1, $currentPage - 3);
                        $end = min($totalPages, $currentPage + 3);

                        for ($counter = $start; $counter <= $end; $counter++) {
                            ?>
                                <a href="?page-nr=<?php echo $counter ?>" style="text-decoration:none;border-style:solid;border-width:1px;">
                                    <div style="width:1.5rem;height:1.5rem;display:flex;align-items:center;justify-content:center;">
                                        <?php echo $counter ?>
                                    </div>
                                </a>
                            <?php
                        }
                        ?>
                    </div>

                    <?php 
                        if(!isset($_GET['page-nr'])){
                            ?>
                                <a style="display:flex;align-items:center;text-decoration:none;" href="?page-nr=2">
                                     <span class="material-symbols-outlined">
                                        chevron_right
                                    </span>
                                </a>
                            <?php
                        }else{
                            if($_GET['page-nr'] >= DefaultSelect::fullPage()){
                                ?>
                                    <a style="display:flex;align-items:center;text-decoration:none;">
                                        <span class="material-symbols-outlined">
                                            chevron_right
                                        </span>
                                    </a>
                                <?php
                            }
                        else{
                            ?>
                                <a  style="display:flex;align-items:center;text-decoration:none;"href="?page-nr=<?php echo $_GET['page-nr'] + 1 ?>">
                                    <span class="material-symbols-outlined">
                                        chevron_right
                                    </span>
                                </a>
                            <?php
                        }}
                     ?>
                    <a  style="display:flex;align-items:center;text-decoration:none;" href="?page-nr=<?php echo DefaultSelect::fullPage()?>">
                        <span class="material-symbols-outlined">
                        last_page
                        </span>
                    </a>
                </div>  
</main>      


