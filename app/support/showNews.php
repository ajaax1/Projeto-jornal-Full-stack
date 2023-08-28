<?php
namespace app\support;
use app\support\SelectMainNews;
use app\support\SelectWhereId;
use PDOException;

class showNews
{
        public static function exec()
        {
            echo SelectMainNews::getHtml();
            $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
            echo SelectWhereId::get($page,9);


            
        }
          
    
}

