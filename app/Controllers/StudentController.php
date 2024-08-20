<?php
class StudentController extends Controller {
    public function index() {
        $studentModel = $this->loadModel('Student');
        $students = $studentModel->getAll();
        $view = new View('student/index', ['students' => $students, 'title' => 'Student List']);
        $view->render();
    }


    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $studentModel = $this->loadModel('Student');
            $studentModel->create($_POST);
            header('Location: /rms/student/index');
        } else {
            $facultyDetailsModel = $this->loadModel('FacultyDetails');
            $facultyDetails = $facultyDetailsModel->getAll();
            $this->renderView('student/create', ['facultyDetails' => $facultyDetails]);
        }
    }

    public function edit($id) {
        $studentModel = $this->loadModel('Student');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $studentModel->update($id, $_POST);
            header('Location: /rms/student/index');
        } else {
            $subject = $studentModel->getById($id);
            $facultyDetailsModel = $this->loadModel('FacultyDetails');
            $facultyDetails = $facultyDetailsModel->getAll();
            $this->renderView('student/edit', ['student' => $subject, 'facultyDetails' => $facultyDetails]);
        }
    }

    public function delete($id) {
        $studentModel = $this->loadModel('Student');
        $studentModel->delete($id);
        header('Location: /rms/student/index');
    }
}

?>
