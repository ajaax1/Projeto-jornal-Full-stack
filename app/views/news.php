<?php $this->layout('master');
use app\database\models\news;
?>
<body>
    <main style="padding-left:20%;padding-right:20%;">
        <?php  
        foreach (news::exec() as $arr) {
                echo ('
                    <div class="d-flex justify-content-between">
                        <div><small>'.htmlspecialchars($arr['name'])." ".htmlspecialchars($arr['name2']).'</small></div>
                        <div><small>'.htmlspecialchars($arr['date']).'</small></div>
                    </div> 
                    <div><h1 style="word-wrap: break-word;">'.htmlspecialchars($arr['title']).'</h1></div>
                    <img style="width:100%;height:30rem;margin-bottom:1rem;" src="'.htmlspecialchars($arr['image']).'">
                    <div style="color:#202224"><h5 style="word-wrap: break-word;">'.htmlspecialchars($arr['paragraphs1']).'<h5></div>
                    <div style="color:#202224"><h5 style="word-wrap: break-word;">'.htmlspecialchars($arr['paragraphs2']).'<h5></div>
                    <div style="color:#202224"><h5 style="word-wrap: break-word;">'.htmlspecialchars($arr['paragraphs3']).'<h5></div>
                    <div style="color:#202224"><h5 style="word-wrap: break-word;">'.htmlspecialchars($arr['paragraphs4']).'<h5></div>
                    <div style="color:#202224"><h5 style="word-wrap: break-word;">'.htmlspecialchars($arr['paragraphs5']).'<h5></div>
                    <div style="color:#202224"><h5 style="word-wrap: break-word;">'.htmlspecialchars($arr['paragraphs6']).'<h5></div>       
                ');
                }
            ?>
    </main>
</body>


       

 
