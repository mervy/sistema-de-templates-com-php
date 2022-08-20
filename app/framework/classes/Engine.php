<?php

namespace App\framework\classes;

use Exception;
use ReflectionClass;

class Engine
{
    private ?string $layout;
    private string $content;
    private array $data;
    private array $dependencies;
    private array $section;
    private string $actualSection;

    private function load()
    {
        return !empty($this->content) ? $this->content : '';
    }

    private function extends(string $layout, array $data = [])
    {
        $this->layout = $layout;
        $this->data = $data;
    }

    private function section(string $name)
    {
        echo $this->section[$name] ?? null;
    }

    private function start(string $name)
    {
        ob_start();
        $this->actualSection = $name;
    }

    private function stop()
    {
        $this->section[$this->actualSection] = ob_get_contents();
        ob_end_clean();
    }

    public function dependencies(array $dependencies)
    {
        foreach ($dependencies as $dependency) {
            $className =  strtolower((new ReflectionClass($dependency))->getShortName());
            $this->dependencies[$className] = $dependency;
        }
    }

    public function __call(string $name, array $params)
    {
        if (!method_exists($this->dependencies['macros'], $name)) {
            throw new Exception("Macro {$name} does not exist");
        }

        if (empty($params)) {
            throw new Exception("Method {$name} needs at least one parameter");
        }

        if (count($params) > 1) {
            // Usar assim: 
            // public function resume(array $data){
            // [$var1, $var2, $var3] = $data;
            // }
            return $this->dependencies['macros']->$name($params);
        } else {
            return $this->dependencies['macros']->$name($params[0]);
        }
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
