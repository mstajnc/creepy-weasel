<?php

namespace View;

use Model\GuestbookModel;

class GuestbookView {
    private $model;
    private $route;
    
    public function __construct($route, GuestbookModel $model) {
        $this->route = $route;
        $this->model = $model;
    }
    
    public function output() {
        $posts = '<ul id="posts">';

        foreach ($this->model->getPosts() as $post) {
            $posts .= "<li>{$post['username']}: {$post['content']}</li>";
        }

        $posts .= "</ul>";

        return $posts;
    }
}
 