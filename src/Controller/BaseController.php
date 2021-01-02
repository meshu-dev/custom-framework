<?php

namespace CustomFramework\Controller;

class BaseController
{
    public function render($page, $variables = [])
    {
        $filePath = __DIR__ . "/../../views/$page.php";

        if (file_exists($filePath) === true) {
            extract($variables);

            ob_start();
            include_once $filePath;
            $view = ob_get_clean();

            return $view;
        }
        return null;
    }
}
