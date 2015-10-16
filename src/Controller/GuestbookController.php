<?php

namespace Controller;

use Model\GuestbookModel;

class GuestbookController {
    private $model;
    
    public function __construct(GuestbookModel $model) {
        $this->model = $model;
    }

    public function save() {
        $this->model->save($_GET['user_name'], $_GET['content']);
    }
}