<?php
class ExaminationController extends Controller {
    public function index() {
        $examination = $this->loadModel('Examination');
        $examinations = $examination->getAll();
        $view = new View('examination/index', ['examinations' => $examinations, 'title' => 'Examination List']);
        $view->render();
    }

    public function show($id) {
        $examinationModel = $this->loadModel('Examination');
        $examination = $examinationModel->getById($id);
        $facultyDetailsModel = $this->loadModel('FacultyDetails');
        $facultyDetails = $facultyDetailsModel->getAll();
        $assignedFacultyDetails = $examinationModel->getFacultyDetailsByExaminationId($id);
        $this->renderView('examination/show', [
            'examination' => $examination,
            'assignedFacultyDetails' => $assignedFacultyDetails,
            'facultyDetails' => $facultyDetails
        ]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $examination = $this->loadModel('Examination');
            $examination->create($_POST);
            header('Location: /rms/examination/index');
        } else {
            $this->renderView('examination/create');
        }
    }

    public function edit($id) {
        $examination = $this->loadModel('Examination');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $examination->update($id, $_POST);
            header('Location: /rms/examination/index');
        } else {
            $examination = $examination->getById($id);
            $this->renderView('examination/edit', ['examination' => $examination]);
        }
    }

    public function delete($id) {
        $examination = $this->loadModel('Examination');
        $examination->delete($id);
        header('Location: /rms/examination/index');
    }

    public function addFacultyDetails($examinationId) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $examinationModel = $this->loadModel('Examination');
            $resultModel = $this->loadModel('Result');

            $facultyDetailId = $_POST['detailId'];
            $examinationModel->addFacultyDetailToExamination($facultyDetailId, $examinationId);
            $data = [
                'examinationId' => $examinationId,
                'facultyDetailId' => $facultyDetailId,
            ];
            $result = $resultModel->createWithSubjects($data);
            if ($result['status'] === 'success') {
                header("Location: /rms/examination/show/$examinationId");
            }
            else{
                echo "Error: " . $result['message'];
            }
        }
    }

    public function removeFacultyDetails($examinationId, $facultyDetailId) {
        $examinationModel = $this->loadModel('Examination');
        $examinationModel->removeFacultyDetailFromExamination($facultyDetailId, $examinationId);
        header("Location: /rms/examination/show/$examinationId");
    }

    public function viewResults($examinationId, $facultyId) {
        $resultModel = $this->loadModel('Result');
        $results = $resultModel->getAllByExaminationId($examinationId);

        $examinationModel = $this->loadModel('Examination');
        $facultyDetailsModel = $this->loadModel('FacultyDetails');
        $studentModel = $this->loadModel('Student');
        $marksModel = $this->loadModel('Marks');

        $subjectDetails = $facultyDetailsModel->getSubjectsByFacultyDetailId($facultyId);

        $data = [];
        foreach ($results as $result){
            $marks = $resultModel->getMarksByResultId($result['id']);
            $resultWithMarks = $resultModel->getById($result['id']);
            $student = $studentModel->getById($result['studentId']);
            $sub = [];
            foreach ($subjectDetails as $subject){
                $subjectId = $subject['id'];
                $subjectMark = null; // Initialize a variable to store the found mark

                // Loop through the marks to find the one with the matching subjectId
                foreach ($marks as $mark) {
                    $m = $marksModel->getById($mark['marksId']);
                    if ($m['subjectId'] == $subjectId) {
                        $subjectMark = $m; // Assign the matching mark
                        break; // Exit the loop as we've found the correct mark
                    }
                }
                if($subjectMark) {
                    $subjectMark = array_merge($subjectMark, [
                        'subjectName' => $subject['name'],
                        'subjectTheory' => $subject['theory'],
                        'subjectPractical' => $subject['practical'],
                        'subjectPassMarks' => $subject['passMarks'],
                        'subjectFullMarks' => $subject['fullMarks'],
                    ]);
                    $sub[] = $subjectMark;
                }
            }
            $resultDetail = [
                "studentDetail" => $student,
                "grade" => $result['grade'],
                "percentage" => $result['percentage'],
                "rank" => $result['rank'],
                "marks" => $sub
            ];
            $data[] = $resultDetail;
        }

        $examination = $examinationModel->getById($examinationId);
        $facultyDetails = $facultyDetailsModel->getById($facultyId);
        $this->renderView('results/show', [
            'examination' => $examination,
            'facultyDetails' => $facultyDetails,
            'subjectDetails' => $subjectDetails,
            'data' => $data
        ]);
    }

    public function addResults($examinationId, $facultyId) {
        $resultModel = $this->loadModel('Result');
        $results = $resultModel->getAllByExaminationId($examinationId);

        $examinationModel = $this->loadModel('Examination');
        $facultyDetailsModel = $this->loadModel('FacultyDetails');
        $studentModel = $this->loadModel('Student');
        $marksModel = $this->loadModel('Marks');

        $subjectDetails = $facultyDetailsModel->getSubjectsByFacultyDetailId($facultyId);

        $data = [];
        foreach ($results as $result){
            $marks = $resultModel->getMarksByResultId($result['id']);
            $resultWithMarks = $resultModel->getById($result['id']);
            $student = $studentModel->getById($result['studentId']);
            $sub = [];
            foreach ($subjectDetails as $subject){
                $subjectId = $subject['id'];
                $subjectMark = null; // Initialize a variable to store the found mark

                // Loop through the marks to find the one with the matching subjectId
                foreach ($marks as $mark) {
                    $m = $marksModel->getById($mark['marksId']);
                    if ($m['subjectId'] == $subjectId) {
                        $subjectMark = $m; // Assign the matching mark
                        break; // Exit the loop as we've found the correct mark
                    }
                }
                if($subjectMark) {
                    $subjectMark = array_merge($subjectMark, [
                        'subjectName' => $subject['name'],
                        'subjectTheory' => $subject['theory'],
                        'subjectPractical' => $subject['practical'],
                        'subjectPassMarks' => $subject['passMarks'],
                        'subjectFullMarks' => $subject['fullMarks'],
                    ]);
                    $sub[] = $subjectMark;
                }
            }
            $resultDetail = [
                "studentDetail" => $student,
                "resultId" => $result['id'],
                "grade" => $result['grade'],
                "percentage" => $result['percentage'],
                "rank" => $result['rank'],
                "marks" => $sub
            ];
            $data[] = $resultDetail;
        }


        $examination = $examinationModel->getById($examinationId);
        $facultyDetails = $facultyDetailsModel->getById($facultyId);
        $this->renderView('results/add', [
            'examination' => $examination,
            'facultyDetails' => $facultyDetails,
            'subjectDetails' => $subjectDetails,
            'data' => $data
        ]);
    }

}
?>
