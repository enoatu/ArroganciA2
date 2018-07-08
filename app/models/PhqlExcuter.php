<?php
namespace ArroganciA\Model;

class PhqlExcuter extends \Phalcon\Mvc\Model {
    public function sqlExecute($tableName) {
        $query = $this->sql($tableName);
        $output = $query->execute(
            [
                'user_id' => "11",
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
                AND CHAR_LENGTH( tw.tweet ) >=10
                ORDER BY tw.tweet_id DESC
                LIMIT 0,1000";
            break;
        case "gl_site" :
            $sql = "SELECT tw.tweet,tw.sender_name,tw.account_name,tw.time,tw.tweet_id
                FROM site_tb2 AS tw
                LEFT OUTER JOIN site_iineT ON tw.tweet_id =site_iineT.tweet_id
                WHERE  (user_id<>:user_id: OR user_id IS NULL)
                AND CHAR_LENGTH( tw.tweet ) >=10
                ORDER BY tw.tweet_id DESC
                LIMIT 0,150";
            break;
        case "gl_service":
            $sql = "SELECT tw.tweet,tw.sender_name,tw.account_name,tw.time,tw.tweet_id
                FROM service_tb2 AS tw
                LEFT OUTER JOIN service_iineT ON tw.tweet_id =service_iineT.tweet_id
                WHERE (user_id<>:user_id: OR user_id IS NULL)
                AND CHAR_LENGTH( tw.tweet ) >=10
                ORDER BY tw.tweet_id DESC
                LIMIT 0,150";
            break;
        case "gl_system":
            $sql = "SELECT tw.tweet,tw.sender_name,tw.account_name,tw.time,tw.tweet_id
                FROM system_tb2 AS tw
                LEFT OUTER JOIN system_iineT ON tw.tweet_id =system_iineT.tweet_id
                WHERE (user_id<>:user_id: OR user_id IS NULL)
                AND CHAR_LENGTH( tw.tweet ) >=10
                ORDER BY tw.tweet_id DESC
                LIMIT 0,150";
            break;
        case "gl_game":
            $sql = "SELECT tw.tweet,tw.sender_name,tw.account_name,tw.time,tw.tweet_id
                FROM game_tb2 AS tw
                LEFT OUTER JOIN game_iineT ON tw.tweet_id =game_iineT.tweet_id
                WHERE (user_id<>:user_id: OR user_id IS NULL)
                AND CHAR_LENGTH( tw.tweet ) >=10
                ORDER BY tw.tweet_id DESC
                LIMIT 0,150";
            break;

        case "lo_app" :
            $sql="SELECT app_tb2.tweet,app_tb2.sender_name,app_tb2.account_name,app_tb2.time,app_tb2.tweet_id 
                FROM \ArroganciA\Model\Tweet\app_tb2 as app_tb2
                LEFT OUTER JOIN \ArroganciA\Model\Iine\app_iine ON app_tb2.tweet_id =\ArroganciA\Model\Iine\app_iine.tweet_id
                WHERE user_id=:user_id:
                ORDER BY \ArroganciA\Model\Iine\app_iine.tweet_id DESC";
        break;
        case "lo_site":
            $sql="SELECT site_tb2.tweet,site_tb2.sender_name,site_tb2.account_name,site_tb2.time,site_tb2.tweet_id 
                FROM site_tb2
                LEFT OUTER JOIN site_iine ON site_tb2.tweet_id =site_iine.tweet_id
                WHERE user_id=:user_id:
                ORDER BY site_iine.tweet_id DESC";
        break;
        case "lo_service":
            $sql="SELECT service_tb2.tweet,service_tb2.sender_name,service_tb2.account_name,service_tb2.time,service_tb2.tweet_id 
                FROM service_tb2
                LEFT OUTER JOIN service_iine ON service_tb2.tweet_id =service_iine.tweet_id
                WHERE user_id=:user_id:
                ORDER BY service_iine.tweet_id DESC";
        break;
        case "lo_system":
            $sql="SELECT system_tb2.tweet,system_tb2.sender_name,system_tb2.account_name,system_tb2.time,system_tb2.tweet_id 
                FROM system_tb2
                LEFT OUTER JOIN system_iine ON system_tb2.tweet_id =system_iine.tweet_id
                WHERE user_id=:user_id:
                ORDER BY system_iine.tweet_id DESC";
            break;
        case "lo_game" :
            $sql="SELECT game_tb2.tweet,game_tb2.sender_name,game_tb2.account_name,game_tb2.time,game_tb2.tweet_id 
                FROM game_tb2
                LEFT OUTER JOIN game_iine ON game_tb2.tweet_id =game_iine.tweet_id
                WHERE user_id=:user_id:
                ORDER BY game_iine.tweet_id DESC";
            break; 
        }
        return $this->modelsManager->createQuery($sql);
    }
}


