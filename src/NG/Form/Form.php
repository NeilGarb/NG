<?php

namespace NG\Form;

class Form {
    /**
     * @var string
     */
    private $action;

    /**
     * @var string
     */
    private $method;

    /**
     * @var array
     */
    private $fields = [];

    /**
     * @var
     */
    private $buttons = [];

    /**
     * @var array
     */
    private $values = [];

    /**
     * @var array
     */
    private $errors = [];

    /**
     * @param string $action
     * @param string $method
     */
    public function __construct($action, $method = 'post') {
        $this->action = $action;
        $this->method = strtolower($method);
    }

    /**
     * @return string
     */
    public function getAction() {
        return $this->action;
    }

    /**
     * @return string
     */
    public function getMethod() {
        return $this->method;
    }

    /**
     * @param AbstractField $field
     * @return Form
     * @throws Exception
     */
    public function addField(AbstractField $field) {
        $name = $field->getName();
        if (array_key_exists($name, $this->fields)) {
            throw new Exception(sprintf(
                'This form already has a field the name "%s".',
                $name
            ));
        }
        $this->fields[$name] = $field;
        return $this;
    }

    /**
     * @return array
     */
    public function getFields() {
        return $this->fields;
    }

    /**
     * @param AbstractButton $button
     * @return Form
     */
    public function addButton(AbstractButton $button) {
        $this->buttons[] = $button;
        return $this;
    }

    /**
     * @return array
     */
    public function getButtons() {
        return $this->buttons;
    }

    /**
     * @param array $values
     * @return Form
     */
    public function setValues(array $values) {
        $this->values = $values;
        return $this;
    }

    /**
     * @return array
     */
    public function getValues() {
        return $this->values;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function getValue($name) {
        return array_key_exists($name, $this->values) ?
            $this->values[$name] : null;
    }

    /**
     * @param array $errors
     * @return Form
     */
    public function setErrors(array $errors) {
        $this->errors = $errors;
        return $this;
    }

    /**
     * @return array
     */
    public function getErrors() {
        return $this->errors;
    }

    /**
     * @param string $name
     * @return string
     */
    public function getError($name) {
        return array_key_exists($name, $this->errors) ?
            $this->errors[$name] : '';
    }

    /**
     * @param string $name
     * @param string $error
     * @return Form
     */
    public function setError($name, $error) {
        if (!$error) {
            unset($this->errors[$name]);
        } else {
            $this->errors[$name] = $error;
        }
        return $this;
    }
}
