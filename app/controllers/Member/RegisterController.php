<?php
use ArroganciA\Controller\ControllerBase;
use Phalcon\Security\Random;

class RegisterController extends ControllerBase {
    public function initialize(){
        $this->view->setVar("title", "会員登録");
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
            $success       = $Users->save([
                "conditions" => [
                    'user_name'     => 1,
                    'user_email'    => 2,
                    'user_pass'     => 3,
                    'uuid'          => 4,
                    'token'         => 5,
                    'token_expiry'  => 6,
                    'refresh_token' => 7,
                ],
                "bind"  => [
                    1    => $username,
                    2    => $email,
                    3    => $password,
                    4    => $uuid,
                    5    => $token,
                    6    => $token_expiry,
                    7    => $refresh_token,
            ]]);

            if ($success) {
                $Users->id;
                $this->session->remove('user');
                $this->session->set('user', [
                    'id' => $Users->id,
                    'name' => $username,
                ]);
                $this->session->remove('info');
                $this->session->set('info', [
                'info' => 'warn',
                'msg'  => '登録に失敗しました'
            ]);

                $this->setCookie($uuid, $token, $refresh_token);
                $this->view->success = true;
                $Users = Users::findFirst([
                    "conditions" => "uuid = ?1",
                    "bind"       => [1 => $uuid]
                    ]);
                $this->logger->info($Users->user_id . ' ' . $username);
            } else {
                $this->logger->error('会員登録失敗');
            }
            $response            = new Phalcon\Http\Response();
            $response->redirect("index/index", false);
            $response->send();
            exit;
        }catch(Exception $e){
            $Users->id;
            $this->session->set('info', [
                'info' => 'warn',
                'msg'  => '登録に失敗しました'
            ]);
            $response            = new Phalcon\Http\Response();
            $response->redirect("index/index", false);
            $response->send();
            exit;
           // echo $e;
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


    public function registerFailedAction() {
        echo "会員登録に失敗しました。";
        $this->logger->error('会員登録失敗-');
        $this->view->setVar("title", "会員登録");
    }
}

