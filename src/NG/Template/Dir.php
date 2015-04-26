<?php

namespace NG\View;

class Dir {
    /**
     * @var string
     */
    private $dir;

    /**
     * @param string $dir
     * @throws Exception
     */
    public function __construct($dir) {
        if (!is_dir($dir)) {
            throw new Exception(sprintf('"%s" doesn\'t exist.', $dir));
        }
        $this->dir = rtrim($dir, '/');
    }

    /**
     * @param string $file
     * @param array $data
     * @return string
     * @throws Exception
     */
    public function render($file, array $data = []) {
        $file = ltrim($file, '/');
        if (!file_exists($this->dir . '/' . $file)) {
            throw new Exception(sprintf('"%s" doesn\'t exist.', $file));
        }
        extract($data);
        ob_start();
        include $this->dir . '/' . $file;
        return ob_get_clean();
    }

    /**
     * @param string $string
     * @return string
     */
    public function h($string) {
        return htmlspecialchars($string, ENT_QUOTES, 'utf-8');
    }
}
