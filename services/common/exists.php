<?php

class Exists {
    private $function_name;

    public function __construct($function_name) {
        $this->function_name = $function_name;
    }

    public function call($params = []) {
        if ($this->check() !== false) {
            call_user_func_array($this->function_name, $params);
        }
    }

    public function check() {
        $value = true;
        if (function_exists($this->function_name)) {
            $value = true;
        } else {
            $value = false;
        }

        return $value;
    }
}