<?php
use Phalcon\Mvc\Model;

class Users extends Model
{
    public $user_id;
    public $user_name;
    public $user_email;
    public $user_pass;
    public $uuid;
    public $token;
    public $refresh_token;
    public $disp;
}
