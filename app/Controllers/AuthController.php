<?php
class AuthController extends Controller {

    public function login() {
        $this->renderView('login', ['title' => 'Login Page']);
    }
}
?>
