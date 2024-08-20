<?php

class FacultyDetailsController extends Controller {

    // List all faculty details
    public function index() {
        $facultyDetailsModel = $this->loadModel('FacultyDetails');
        $facultyDetails = $facultyDetailsModel->getAll();
        $view = new View('facultyDetails/index', ['facultyDetails' => $facultyDetails, 'title' => 'Faculty Details List']);
        $view->render();
    }

    // Create a new faculty detail
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $facultyDetailsModel = $this->loadModel('FacultyDetails');
            $facultyDetailId = $facultyDetailsModel->create($_POST);

            // Add subjects if provided
            if (!empty($_POST['subjectIds'])) {
                $facultyDetailsModel->addSubjectsToFacultyDetail($facultyDetailId, $_POST['subjectIds']);
            }

            header('Location: /rms/facultyDetails/index');
        } else {
            $subjectsModel = $this->loadModel('Subject');
            $subjects = $subjectsModel->getAll();
            $this->renderView('facultyDetails/create', ['subjects' => $subjects]);
        }
    }

    // Edit an existing faculty detail
    public function edit($id) {
        $facultyDetailsModel = $this->loadModel('FacultyDetails');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $facultyDetailsModel->update($id, $_POST);

            // Update subjects if provided
            if (!empty($_POST['subjectIds'])) {
                // Remove existing subjects and add the new ones
                $facultyDetailsModel->removeSubjectFromFacultyDetail($id, $_POST['subjectIds']);
                $facultyDetailsModel->addSubjectsToFacultyDetail($id, $_POST['subjectIds']);
            }

            header('Location: /rms/facultyDetails/index');
        } else {
            $facultyDetails = $facultyDetailsModel->getById($id);
            $subjectsModel = $this->loadModel('Subject');
            $subjects = $subjectsModel->getAll();
            $assignedSubjects = $facultyDetailsModel->getSubjectsByFacultyDetailId($id);
            $this->renderView('facultyDetails/edit', ['facultyDetails' => $facultyDetails, 'subjects' => $subjects, 'assignedSubjects' => $assignedSubjects]);
        }
    }

    public function show($id){
        $facultyDetailsModel = $this->loadModel('FacultyDetails');
        $facultyDetails = $facultyDetailsModel->getById($id);
        $subjectsModel = $this->loadModel('Subject');
        $subjects = $subjectsModel->getAll();
        $assignedSubjects = $facultyDetailsModel->getSubjectsByFacultyDetailId($id);
        $this->renderView('facultyDetails/show', [
            'facultyDetails' => $facultyDetails,
            'subjects' => $subjects,
            'assignedSubjects' => $assignedSubjects
        ]);
    }

    // Delete a faculty detail
    public function delete($id) {
        $facultyDetailsModel = $this->loadModel('FacultyDetails');
        $facultyDetailsModel->delete($id);
        header('Location: /rms/facultyDetails/index');
    }

    // Manage subjects for a specific faculty detail
    public function manageSubjects($id) {
        $facultyDetailsModel = $this->loadModel('FacultyDetails');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Remove existing subjects and add the new ones
            $facultyDetailsModel->removeSubjectFromFacultyDetail($id, $_POST['subjectIds']);
            $facultyDetailsModel->addSubjectsToFacultyDetail($id, $_POST['subjectIds']);
            header('Location: /rms/facultyDetails/index');
        } else {
            $facultyDetail = $facultyDetailsModel->getById($id);
            $subjectsModel = $this->loadModel('Subject');
            $subjects = $subjectsModel->getAll();
            $assignedSubjects = $facultyDetailsModel->getSubjectsByFacultyDetailId($id);
            $this->renderView('facultyDetails/manageSubjects', ['facultyDetail' => $facultyDetail, 'subjects' => $subjects, 'assignedSubjects' => $assignedSubjects]);
        }
    }

    // Add a subject to faculty detail
    public function addSubject($facultyDetailId) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $facultyDetailsModel = $this->loadModel('FacultyDetails');
            $subjectId = $_POST['subjectId'];
            $facultyDetailsModel->addSubjectToFacultyDetail($facultyDetailId, $subjectId);
            header("Location: /rms/facultyDetails/show/$facultyDetailId");
        }
    }

    // Remove a subject from faculty detail
    public function removeSubject($facultyDetailId, $subjectId) {
        $facultyDetailsModel = $this->loadModel('FacultyDetails');
        $facultyDetailsModel->removeSubjectFromFacultyDetail($facultyDetailId, $subjectId);
        header("Location: /rms/facultyDetails/show/$facultyDetailId");
    }
}
?>
