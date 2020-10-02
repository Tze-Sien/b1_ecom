<?php

    class ItemModel{
        public $name ;
        public $price;
        public $description;
        public $category_id;

        public function __construct($post) {
            $this->name         =  $post['product_name'];
            $this->price        =  $post['price'];
            $this->description  =  $post['description'];
            $this->category_id  =  $post['category_id'];
        }
    }