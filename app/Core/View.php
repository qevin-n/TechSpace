<?php

namespace App\Core;

class View
{
    /**
     * Render a view inside a layout.
     *
     * @param string $view
     * @param array $data
     * @param string|null $layout
     */
    public static function render(
        string $view,
        array $data = [],
        ?string $layout = null
    ): void {

        extract($data);

        $viewPath = __DIR__ . '/../Views/' . $view . '.php';

        if (!file_exists($viewPath)) {

            die("View '{$view}' not found.");

        }

        // Capture page output
        ob_start();

        require $viewPath;

        $content = ob_get_clean();

        // No layout? Print page directly.
        if ($layout === null) {

            echo $content;

            return;

        }

        $layoutPath = __DIR__ . '/../Views/layouts/' . $layout . '.php';

        if (!file_exists($layoutPath)) {

            die("Layout '{$layout}' not found.");

        }

        require $layoutPath;
    }
}