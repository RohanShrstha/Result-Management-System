<?php
class ResultController extends Controller {
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

    public function updateResult() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            print_r($_POST);
            $request = $_POST;
            $resultModel = $this->loadModel('Result');
            $resultId = $request['resultId'];
            $data = [
                'marks' => $request['marks'],
            ];
            $resultModel->update($resultId,$data);
            header("Location: /rms/examination/addResults/{$request['examinationId']}/{$request['facultyDetailId']}");
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
