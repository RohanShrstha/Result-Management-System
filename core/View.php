<?php
class View {
    protected $viewFile;
    protected $data = [];
    protected $layoutFile = 'layout';

    public function __construct($viewFile, $data = [], $layoutFile = 'layout') {
        $this->viewFile = $viewFile;
        $this->data = $data;
        $this->layoutFile = $layoutFile; // Set layout file if specified
    }

    public function render() {
        if (file_exists('app/Views/' . $this->viewFile . '.php')) {
            // Extract the data array into variables
            extract($this->data);

            // Start output buffering to capture the view content
            ob_start();
            require 'app/Views/' . $this->viewFile . '.php';
            $content = ob_get_clean();

            // Extract layout-related data (e.g., title) and render the layout
            $data = array_merge($this->data, ['content' => $content]);

            // Render the layout with the view content
            require 'app/Views/' . $this->layoutFile . '.php';
        } else {
            echo "View file not found: " . $this->viewFile;
        }
    }
}
?>
