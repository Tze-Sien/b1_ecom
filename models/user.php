<?php

    class User{
        public $firstname;
        public $lastname;
        public $username;
        public $email;
        public $password;

        public function __construct($post) {
            $this->firstname = htmlspecialchars($post['firstname']);
            $this->lastname = htmlspecialchars($post['lastname']);
            $this->username = htmlspecialchars($post['username']);
            $this->email = htmlspecialchars($post['email']);
            $this->password = sha1(htmlspecialchars($post['password']));
        }
    }