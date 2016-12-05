<?php

abstract class Controller {

    protected $_title = 'Address Book';

    function redirect($url, $statusCode = 303) {
        header('Location: ' . $url, true, $statusCode);
        exit();
    }

    function refresh() {
        header("Refresh:0");
        exit();
    }

    function render($view, $view_data = []) {
        $view_data['title'] = $this->_title;

        global $data;
        $data = $view_data;

        include VIEW_PATH . "/includes/header.php";
        include VIEW_PATH . "/{$view}.php";
        include VIEW_PATH . "/includes/footer.php";
    }
}
