<?php
namespace View;

use Model\HomeModel;

class HomeView {
    private $model;
    private $route;
    
    public function __construct($route, HomeModel $model) {
        $this->route = $route;
        $this->model = $model;
    }
    
    public function output() {
        return '<form method="get">
                <input type="hidden" name="route" value="guestbook" />
                <input type="hidden" name="action" value="save" />
                <label for="user_name">Name</label>
                <input type="text" name="user_name" id="user_name">

                <label for="content">Message</label>
                <textarea name="content" id="content"></textarea>

                <input type="submit" value="Post" name="post" id="post">
            </form>';
    }   
}