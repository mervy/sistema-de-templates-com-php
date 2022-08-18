<?php

namespace App\framework\classes;

use Exception;

class Engine
{
    private ?string $layout;
    private string $content;
    private array $data;

    private function load()
    {
        return !empty($this->content) ? $this->content : '';
    }

    private function extends(string $layout, array $data = [])
    {
        $this->layout = $layout;
        $this->data = $data;
    }

    public function render(string $view, array $data)
    {
        $view = dirname(__FILE__, 2) . "/resources/views/{$view}.php";

        if (!file_exists($view)) {
            throw new Exception("The view {$view} not found");
        }

        ob_start();
        extract($data);
        require $view;
        $content = ob_get_contents();
        ob_end_clean();

        if (!empty($this->layout)) {            
            $this->content = $content;
            //'Casa' o array do controller com o array das pages view
            $data = array_merge($this->data, $data);
            $layout = $this->layout;
            $this->layout = null; //Para não gerar looping infinito
            return $this->render($layout, $this->data);

        }

        return $content;
    }
}
