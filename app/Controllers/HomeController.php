<?php
class HomeController extends Controller {
    public function index() {
        $this->renderView('landing-page', ['title' => 'Landing Page']);
    }

    public function login() {
        $this->renderView('login', ['title' => 'Login Page']);
    }
}
?>
