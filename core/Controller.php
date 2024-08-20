<?php
class Controller {
    public function loadModel($model) {
        require_once 'app/Models/' . $model . '.php';
        return new $model();
    }

    public function renderView($view, $data = []) {
        extract($data);
        require_once 'app/Views/' . $view . '.php';
    }
}
?>
