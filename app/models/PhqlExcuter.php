<?php
namespace ArroganciA\Model;

class PhqlExcuter extends \Phalcon\Mvc\Model {
    public function sqlExecute($tableName, $user_id) {
        $query = $this->sql($tableName);
        $output = $query->execute(
            [
                'user_id' => $user_id,
            ]
        );
        return $output;
    }

    //  tw.tweet LIKE :worry: AND 
    private function sql($table){
        switch ($table) {
        case "gl_app" :
            $sql = "SELECT tw.tweet,tw.sender_name,tw.account_name,tw.time,tw.tweet_id
                FROM \ArroganciA\Model\Tweet\app_tb2 AS tw
                LEFT OUTER JOIN \ArroganciA\Model\Iine\app_iine
                ON tw.tweet_id =\ArroganciA\Model\Iine\app_iine.tweet_id
                WHERE (user_id<>:user_id: OR user_id IS NULL)
                ORDER BY tw.tweet_id DESC
                LIMIT 0,1000";
            break;
        case "gl_site" :
           $sql = "SELECT tw.tweet,tw.sender_name,tw.account_name,tw.time,tw.tweet_id
                FROM \ArroganciA\Model\Tweet\site_tb2 AS tw
                LEFT OUTER JOIN \ArroganciA\Model\Iine\site_iine
                ON tw.tweet_id =\ArroganciA\Model\Iine\site_iine.tweet_id
                WHERE (user_id<>:user_id: OR user_id IS NULL)
                ORDER BY tw.tweet_id DESC
                LIMIT 0,1000";
            break;
        case "gl_service":
            $sql = "SELECT tw.tweet,tw.sender_name,tw.account_name,tw.time,tw.tweet_id
                FROM \ArroganciA\Model\Tweet\service_tb2 AS tw
                LEFT OUTER JOIN \ArroganciA\Model\Iine\service_iine
                ON tw.tweet_id =\ArroganciA\Model\Iine\service_iine.tweet_id
                WHERE (user_id<>:user_id: OR user_id IS NULL)
                ORDER BY tw.tweet_id DESC
                LIMIT 0,1000";
            break;
        case "gl_system":
           $sql = "SELECT tw.tweet,tw.sender_name,tw.account_name,tw.time,tw.tweet_id
                FROM \ArroganciA\Model\Tweet\system_tb2 AS tw
                LEFT OUTER JOIN \ArroganciA\Model\Iine\system_iine
                ON tw.tweet_id =\ArroganciA\Model\Iine\system_iine.tweet_id
                WHERE (user_id<>:user_id: OR user_id IS NULL)
                ORDER BY tw.tweet_id DESC
                LIMIT 0,1000";
            break;
        case "gl_game":
             $sql = "SELECT tw.tweet,tw.sender_name,tw.account_name,tw.time,tw.tweet_id
                FROM \ArroganciA\Model\Tweet\game_tb2 AS tw
                LEFT OUTER JOIN \ArroganciA\Model\Iine\game_iine
                ON tw.tweet_id =\ArroganciA\Model\Iine\game_iine.tweet_id
                WHERE (user_id<>:user_id: OR user_id IS NULL)
                ORDER BY tw.tweet_id DESC
                LIMIT 0,1000";
            break;
        case "lo_app" :
            $sql="SELECT app_tb2.tweet,app_tb2.sender_name,app_tb2.account_name,app_tb2.time,app_tb2.tweet_id 
                FROM \ArroganciA\Model\Tweet\app_tb2 as app_tb2
                JOIN \ArroganciA\Model\Iine\app_iine ON app_tb2.tweet_id =\ArroganciA\Model\Iine\app_iine.tweet_id
                WHERE user_id=:user_id:
                ORDER BY \ArroganciA\Model\Iine\app_iine.tweet_id DESC";
        break;
        case "lo_site":
            $sql="SELECT site_tb2.tweet,site_tb2.sender_name,site_tb2.account_name,site_tb2.time,site_tb2.tweet_id 
                FROM \ArroganciA\Model\Tweet\site_tb2 as site_tb2
                JOIN \ArroganciA\Model\Iine\site_iine ON site_tb2.tweet_id =\ArroganciA\Model\Iine\site_iine.tweet_id
                WHERE user_id=:user_id:
                ORDER BY \ArroganciA\Model\Iine\site_iine.tweet_id DESC";
        break;
        case "lo_service":
            $sql="SELECT service_tb2.tweet,service_tb2.sender_name,service_tb2.account_name,service_tb2.time,service_tb2.tweet_id 
                FROM \ArroganciA\Model\Tweet\service_tb2 as service_tb2
                JOIN \ArroganciA\Model\Iine\service_iine ON service_tb2.tweet_id =\ArroganciA\Model\Iine\service_iine.tweet_id
                WHERE user_id=:user_id:
                ORDER BY \ArroganciA\Model\Iine\service_iine.tweet_id DESC";
        break;
        case "lo_system":
            $sql="SELECT system_tb2.tweet,system_tb2.sender_name,system_tb2.account_name,system_tb2.time,system_tb2.tweet_id 
                FROM \ArroganciA\Model\Tweet\system_tb2 as system_tb2
                JOIN \ArroganciA\Model\Iine\system_iine ON system_tb2.tweet_id =\ArroganciA\Model\Iine\system_iine.tweet_id
                WHERE user_id=:user_id:
                ORDER BY \ArroganciA\Model\Iine\system_iine.tweet_id DESC";
        break;
        case "lo_game" :
           $sql="SELECT game_tb2.tweet,game_tb2.sender_name,game_tb2.account_name,game_tb2.time,game_tb2.tweet_id 
                FROM \ArroganciA\Model\Tweet\game_tb2 as game_tb2
                JOIN \ArroganciA\Model\Iine\game_iine ON game_tb2.tweet_id =\ArroganciA\Model\Iine\game_iine.tweet_id
                WHERE user_id=:user_id:
                ORDER BY \ArroganciA\Model\Iine\game_iine.tweet_id DESC";
        break;
        }
        return $this->modelsManager->createQuery($sql);
    }
}


