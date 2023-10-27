<?php

class Validations
{
    private $value;
    private $input;
    private $errors = [];

    public function input($name)
    {
        $this->input = $name;
        $this->value = $_REQUEST[$name];
        return $this;
    }
    public function sanitizeInput()
    {
        return htmlentities(htmlspecialchars(stripslashes(trim($this->value))));
    }
    public function required()
    {
        if ($this->value == '' || empty($this->value) || strlen($this->value) == 0) {
            $this->errors[] = "this input : $this->input must be required";
        }
        return $this;
    }
    public function min($min)
    {
        if (strlen($this->value) <= $min) {
            $this->errors[] = "this input : $this->input must be min $min";
        }
        return $this;
    }
    public function max($max)
    {
        if (strlen($this->value) > $max) {
            $this->errors[] = "this input : $this->input must be max $max";
        }
        return $this;
    }
    public function email()
    {
        if (!filter_var($this->value, FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "this input : $this->input must be email";
        }
        return $this;
    }
    public function showErorrs()
    {
        print_r($this->errors);
    }
}