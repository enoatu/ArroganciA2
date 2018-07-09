<?php
use ArroganciA\Controller\ControllerBase;
use Phalcon\Security\Random;

class RegisterController extends ControllerBase {
    public function initialize(){
        $this->view->title = "会員登録";
        $this->assets->addCss('css/index.css');
    }

    public function indexAction() {
    }

    public function registerAction() {
        if(!$this->request->isPost()) {
            echo "exit";
            exit;
        }
        try{
            $Users         = new Users();
            $username      = $this->request->getPost("username");
            $email         = $this->request->getPost("email");
            $password      = $this->request->getPost("password");
            $random        = new Random();
            $uuid          = $random->uuid();// db082997-2572-4e2c-a046-5eefe97b1235
            $token         = $random->hex(36); // 05475e8af4a34f8f743ab48761
            $refresh_token = $random->hex(36); // 05475e8af4a34f8f743ab48761
            $token_expiry  = time() + (1 * 24 * 60 * 60);
            $success       = $Users->save(
                [
                    'user_name'            => $username,
                    'user_email'           => $email,
                    'user_pass'            => $password,
                    'uuid'                 => $uuid,
                    'token'                => $token,
                    'token_expiry'         => $token_expiry,
                    'refresh_token'        => $refresh_token,
                ]
            );
            if ($success) {
                $this->setCookie($uuid, $token, $refresh_token);
                $this->view->success = true;
                $response            = new Phalcon\Http\Response();
                $response->redirect("index/index", false);
                $response->send();
                exit;
            } else {
                $this->logger->error('会員登録失敗');
            }
        }catch(Exception $e){
            echo $e;
        }
            $this->view->disable();
    }

    private function setCookie($uuid, $token, $refresh_token){
        $this->cookies->set(
            'ArroganciA_u',
            $uuid,
            time() + (365 * 24 * 60 * 60)
        );
        $this->cookies->set(
            'ArroganciA_t',
            $token,
            time() + (365 * 24 * 60 * 60)

        );
        $this->cookies->set(
            'ArroganciA_r_t',
            $refresh_token,
            time() + (365 * 24 * 60 * 60)
        );
    }

        public function show404Action() {
            echo "<a href='https://www.youtube.com/watch?v=EvBDa4TX3Bo'>NOT FOUND</a>";
    }
}

