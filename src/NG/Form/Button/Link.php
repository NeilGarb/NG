<?php

namespace NG\Form\Button;

class Link extends AbstractButton {
    /**
     * @var string
     */
    private $url;

    /**
     * @param string $url
     * @return Link
     */
    public function setUrl($url) {
        $this->url = strval($url);
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl() {
        return $this->url;
    }
}
