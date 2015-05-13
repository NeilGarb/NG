<?php

namespace NG\Form\Field;

trait Placeholder {
    /**
     * @var string
     */
    private $placeholder;

    /**
     * @param string $placeholder
     * @return AbstractField
     */
    public function setPlaceholder($placeholder) {
        $this->placeholder = strval($placeholder);
        return $this;
    }

    /**
     * @return string
     */
    public function getPlaceholder() {
        return $this->placeholder;
    }
}
