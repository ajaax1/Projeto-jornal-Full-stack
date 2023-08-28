<?php

namespace app\database\models\select;

use app\database\Connection;
use PDO;
use PDOException;

class DefaultSelect extends Connection
{
    private static $mainNews;

    private static function queryNews()
    {
        $pdo = Connection::connect();
        $query_data = "SELECT news.id,title,paragraphs1,DATE_FORMAT(news.date, '%d/%m/%Y') AS date,name,image FROM news,user ORDER BY date DESC";
        $stmt_user = $pdo->prepare($query_data);
        $stmt_user->execute();
        return self::$mainNews = $stmt_user->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getHtml()
    {
        if (self::$mainNews === null) {
            self::queryNews();
        }
        $firstItem = true;
            foreach (self::$mainNews as $arr) {
            if($firstItem) {
                echo('
                    <div class="container mt-5"  style="width: 100%;">
                        <div class="card mb-8">
                            <div class="row g-0">
                                <div class="col-md-3">
                                    <a style="text-decoration: none;" href="news/'.$arr['id'].'"> 
                                        <img src="'.htmlspecialchars($arr['image']).'" style="width: 100%;max-height:15rem;min-height:15rem;" alt="Image" class="img-fluid">
                                    </a>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                    <a style="text-decoration: none;" href="news/'.$arr['id'].'"> 
                                        <h2 class="card-title" style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical; ">'.htmlspecialchars($arr['title']).'</h2>
                                    </a>
                                        <p class="card-text" style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical; ">'.htmlspecialchars($arr['paragraphs1']).'</p>
                                        <div class="d-flex justify-content-between">
                                            <small class="text-muted">'.htmlspecialchars($arr['date']).'</small>
                                            <small class="text-muted">'.htmlspecialchars($arr['name']).'</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   ');
                   $firstItem = false;
                }
                else{
                    echo('
                        <div class="col" >
                            <div class="card" >
                                <a href="news/'.htmlspecialchars($arr['id']).'" style="text-decoration: none;">
                                <img class="card-img-top"  style="max-height:15rem; min-height:15rem;"  src="'.$arr['image'].'" alt="Card image cap">
                                    <div class="card-body" style="max-height:9rem; min-height:9rem;">
                                        <h5 class="card-title" style="word-wrap: break-word;overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical; ">'.htmlspecialchars($arr['title']).'</h5>
                                        <p class="card-text" style="word-wrap: break-word;color:grey;overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical; ">'.htmlspecialchars($arr['paragraphs1']).'</p>
                                    </div>
                                </a>      
                                    <div class="d-flex justify-content-between card-footer">
                                        <small class="text-muted">'.htmlspecialchars($arr['date']).'</small>
                                        <small class="text-muted">'.htmlspecialchars($arr['name']).'</small>
                                    </div>
                            </div>
                        </div>   
                    ');
                }
            }
        }
}
