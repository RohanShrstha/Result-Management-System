<?php
class GradeController extends Controller {
    public function index() {
        $gradeModel = $this->loadModel('Grade');
        $grades = $gradeModel->getAll();
        $view = new View('grade/index', ['grades' => $grades, 'title' => 'Grade List']);
        $view->render();
    }

    public function show($id) {
        $gradeModel = $this->loadModel('Grade');
        $grade = $gradeModel->getById($id);
        $this->renderView('grade/show', ['grade' => $grade]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $gradeModel = $this->loadModel('Grade');
            $gradeModel->create($_POST);
            header('Location: /rms/grade/index');
        } else {
            $this->renderView('grade/create');
        }
    }

    public function edit($id) {
        $gradeModel = $this->loadModel('Grade');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $gradeModel->update($id, $_POST);
            header('Location: /rms/grade/index');
        } else {
            $grade = $gradeModel->getById($id);
            $this->renderView('grade/edit', ['grade' => $grade]);
        }
    }

    public function delete($id) {
        $gradeModel = $this->loadModel('Grade');
        $gradeModel->delete($id);
        header('Location: /rms/grade/index');
    }
}

?>
