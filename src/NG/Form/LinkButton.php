<?php

namespace NG\Form;

class LinkButton extends AbstractButton {
    /**
     * @var string
     */
    private $url;

    /**
     * @param string $url
     * @return LinkButton
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
