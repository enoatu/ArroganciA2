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
                LIMIT 0,150";
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
        }
                    var_dump($sql);
        return $this->modelsManager->createQuery($sql);
    }
}


