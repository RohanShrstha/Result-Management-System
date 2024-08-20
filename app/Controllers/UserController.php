<?php
class UserController extends Controller {
    public function index() {
        $userModel = $this->loadModel('User');
        $users = $userModel->getAllUsers();
        $view = new View('users/index', ['users' => $users, 'title' => 'User List']);
        $view->render();
    }

    public function show($id) {
        $userModel = $this->loadModel('User');
        $user = $userModel->getUserById($id);
        $this->renderView('users/show', ['user' => $user]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userModel = $this->loadModel('User');
            $userModel->createUser($_POST);
            header('Location: /rms/user/index');
        } else {
            $this->renderView('users/create');
        }
    }

    public function edit($id) {
        $userModel = $this->loadModel('User');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userModel->updateUser($id, $_POST);
            header('Location: /rms/user/index');
        } else {
            $user = $userModel->getUserById($id);
            $this->renderView('users/edit', ['user' => $user]);
        }
    }

    public function delete($id) {
        $userModel = $this->loadModel('User');
        $userModel->deleteUser($id);
        header('Location: /rms/user/index');
    }

    // Login function to verify and log in the user
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userModel = $this->loadModel('User');
            $user = $userModel->verifyUser($_POST['name'], $_POST['password']);
            if ($user) {
                session_start();
                $_SESSION['user'] = $user;
                header('Location: /rms/user/index');
            } else {
                // Redirect back to the login page with an error message
                $this->renderView('users/login', ['error' => 'Invalid username or password']);
            }
        } else {
//            $this->renderView('users/login');
            $this->renderView('users/login', ['error' => 'Not post']);

        }
    }

    // Logout function to destroy the session
    public function logout() {
        session_start();
        session_destroy();
        header('Location: /rms/user/login');
    }
}
?>
