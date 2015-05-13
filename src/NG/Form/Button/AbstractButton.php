<?php

namespace NG\Form\Button;

abstract class AbstractButton {
    /**
     * @var string
     */
    private $label;

    /**
     * @param string $label
     */
    public function __construct($label) {
        $this->label = $label;
    }

    /**
     * @return string
     */
    public function getLabel() {
        return $this->label;
    }
}
