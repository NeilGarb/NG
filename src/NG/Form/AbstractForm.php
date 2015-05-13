<?php

namespace NG\Form;

abstract class AbstractForm {
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
     * @return AbstractForm
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
     * @return AbstractForm
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
     * @return AbstractForm
     */
    public function setValues(array $values) {
        $this->values = $values;
        return $this;
    }

    /**
     * @param string $name
     * @param mixed $value
     * @return AbstractForm
     */
    public function setValue($name, $value) {
        $this->values[$name] = $value;
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
     * @return AbstractForm
     */
    public function setErrors(array $errors) {
        $this->errors = $errors;
        return $this;
    }

    /**
     * @param string $name
     * @param string $error
     * @return AbstractForm
     */
    public function setError($name, $error) {
        if (!$error) {
            unset($this->errors[$name]);
        } else {
            $this->errors[$name] = $error;
        }
        return $this;
    }

    /**
     * @return array
     */
    public function getErrors() {
        return $this->errors;
    }

    /**
     * @return AbstractForm
     */
    public function clearErrors() {
        $this->errors = [];
        return $this;
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
     * @return bool
     */
    public function hasErrors() {
        return count($this->errors) > 0;
    }

    /**
     * @return bool
     */
    abstract public function validate();
}
