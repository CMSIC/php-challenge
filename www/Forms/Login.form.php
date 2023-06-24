<?php
namespace App\Forms;

use App\Core\Validator;

class Login extends Validator
{
    public $method = "POST";
    protected array $config = [];

    public function getConfig(): array
    {
        $this->config = [
            "config"=>[
                "method"=>$this->method,
                "action"=>"",
                "id"=>"login-form",
                "class"=>"form",
                "submit"=>"Login",
                "reset"=>"Reset"
            ],
            "inputs"=>[
                "email"=>[
                    "id"=>"login-form-email",
                    "class"=>"form-input",
                    "placeholder"=>"Your email",
                    "type"=>"email",
                    "error"=>"Your email is incorrect",
                    "required"=>true
                ],
                "pwd"=>[
                    "id"=>"login-form-pwd",
                    "class"=>"form-input",
                    "placeholder"=>"Your password",
                    "type"=>"password",
                    "error"=>"Your password is required",
                    "required"=>true
                ],
            ]
        ];
        return $this->config;
    }

    public function getFields(): array
    {
        return [
            'email' => $_POST['email'] ?? null,
            'pwd' => $_POST['pwd'] ?? null,
        ];
    }
}
