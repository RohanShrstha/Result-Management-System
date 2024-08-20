<?php
class StreamsController extends Controller {
    public function index() {
        $streamsModel = $this->loadModel('Streams');
        $streams = $streamsModel->getAll();
        $view = new View('streams/index', ['streams' => $streams, 'title' => 'Streams List']);
        $view->render();
    }


    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $streamsModel = $this->loadModel('Streams');
            $streamsModel->create($_POST);
            header('Location: /rms/streams/index');
        } else {
            $this->renderView('streams/create');
        }
    }

    public function edit($id) {
        $streamsModel = $this->loadModel('Streams');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $streamsModel->update($id, $_POST);
            header('Location: /rms/streams/index');
        } else {
            $streams = $streamsModel->getById($id);
            $this->renderView('streams/edit', ['streams' => $streams]);
        }
    }

    public function delete($id) {
        $streamsModel = $this->loadModel('Streams');
        $streamsModel->delete($id);
        header('Location: /rms/streams/index');
    }
}
?>
