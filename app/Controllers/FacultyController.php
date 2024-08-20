<?php
class FacultyController extends Controller {
    public function index() {
        $facultyModel = $this->loadModel('Faculty');
        $faculties = $facultyModel->getAll();
        $view = new View('faculty/index', ['faculties' => $faculties, 'title' => 'Faculty List']);
        $view->render();
    }

    public function show($id) {
        $facultyModel = $this->loadModel('Faculty');
        $grade = $facultyModel->getById($id);
        $this->renderView('faculty/show', ['faculty' => $grade]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $facultyModel = $this->loadModel('Faculty');
            $facultyModel->create($_POST);
            header('Location: /rms/faculty/index');
        } else {
            $this->renderView('faculty/create');
        }
    }

    public function edit($id) {
        $facultyModel = $this->loadModel('Faculty');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $facultyModel->update($id, $_POST);
            header('Location: /rms/faculty/index');
        } else {
            $grade = $facultyModel->getById($id);
            $this->renderView('faculty/edit', ['faculty' => $grade]);
        }
    }

    public function delete($id) {
        $facultyModel = $this->loadModel('Faculty');
        $facultyModel->delete($id);
        header('Location: /rms/faculty/index');
    }
}
?>
