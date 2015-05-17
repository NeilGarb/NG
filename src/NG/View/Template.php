<?php

namespace NG\View;

class Template {
    /**
     * @var array
     */
    static private $vars = [];

    private $file;

    public function __construct($file) {
        if (!file_exists($file)) {
            throw new Exception(sprintf('Template %s doesn\'t exist.', $file));
        }
        $this->file = $file;
    }

    public function render(array $data = []) {
        extract(self::$vars);
        extract($data);
        ob_start();
        include $this->file;
        $html = trim(ob_get_clean());
        return $html;
    }

    private function import($file, array $data = []) {
        $file = dirname($this->file) . '/' . $file;
        $template = new self($file);
        return $template->render($data);
    }

    /**
     * @param string $str
     * @return string
     */
    private function e($str) {
        return htmlspecialchars($str, ENT_QUOTES, 'utf-8');
    }

    /**
     * @param string $var
     * @param mixed $value
     */
    static public function set($var, $value) {
        self::$vars[$var] = $value;
    }
}
