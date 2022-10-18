<?php

namespace App\view;

class View
{

    protected $parts;
    protected $template;

    public function __construct($template, $parts = array())
    {
        $this->setTemplate($template);
        $this->setParts($parts);
    }

    public function setParts(array $parts)
    {
        $this->parts = $parts;
    }

    public function setTemplate($template)
    {
        $this->template = $template;
    }

    public function setPart($key, $content)
    {
        $this->parts[$key] = $content;
    }

    public function getPart($key)
    {
        if (isset($this->parts[$key])) {
            return $this->parts[$key];
        } else {
            return null;
        }
    }

    public function setMenu()
    {
        $menu[] = array(
            "link" => "/",
            "text" => "Home",
        );
        $menu[] = array(
            "link" => "/?controller=example",
            "text" => "Example",
        );

        $this->setPart('menu', $menu);
    }

    public function render()
    {
        $this->setMenu();
        $title = $this->getPart('title');
        $content = $this->getPart('content');
        $menu = $this->getPart('menu');

        ob_start();
        include 'src/view/templates/header.php';
        include($this->template);
        include 'src/view/templates/footer.php';
        $data = ob_get_contents();
        ob_end_clean();

        return $data;
    }
}
?>