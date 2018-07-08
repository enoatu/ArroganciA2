<?php
use Phalcon\Mvc\Controller;
use ArroganciA\Model\Users;
class ControllerBase extends Controller
{
    public function output($code, $content=array()) {
       //Header
        $this->response->setContentType('application/json')
                       ->setStatusCode($code, null)
                       ->sendHeaders();
        //Body
        $this->response->setJsonContent($content)
                       ->send();   
    }

    public function authenticate() {
        if ($this->cookies->has('ArroganciA_u')) {
            // Get the cookie
            $uuid = $this->cookies->get('ArroganciA_u')->getValue();
            $token = $this->cookies->get('ArroganciA_t')->getValue();
            // Get the cookie's value
        } 
        $users = Users::findFirst(
            [
                "uuid  = :uuid:",
                'bind'=> [
                    'uuid'  => $uuid,
                ]
            ]
        );
        if ($token == $users->token) {
            //トークンが等しいか
            if (date("Y/m/d") > $users->token_expiry){
                //期限切れかチェック
                $this->updateExpire($users);
            }
        }    
    }

    public function updateExpire($users) {
        $users->token = $random->hex(36); // 05475e8af4a34f8f743ab48761 
        $users->token_expiry = time() + (1 * 24 * 60 * 60);
        $users->save();
    }

}
