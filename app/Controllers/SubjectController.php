<?php
class SubjectController extends Controller {
    public function index() {
        $subjectModel = $this->loadModel('Subject');
        $subjects = $subjectModel->getAll();
        $view = new View('subject/index', ['subjects' => $subjects, 'title' => 'Subject List']);
        $view->render();
    }


    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $subjectModel = $this->loadModel('Subject');
            $subjectModel->create($_POST);
            header('Location: /rms/subject/index');
        } else {
            $this->renderView('subject/create');
        }
    }

    public function edit($id) {
        $subjectModel = $this->loadModel('Subject');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $subjectModel->update($id, $_POST);
            header('Location: /rms/subject/index');
        } else {
            $subject = $subjectModel->getById($id);
            $this->renderView('subject/edit', ['subject' => $subject]);
        }
    }

    public function delete($id) {
        $subjectModel = $this->loadModel('Subject');
        $subjectModel->delete($id);
        header('Location: /rms/subject/index');
    }
}

?>
