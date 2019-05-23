<?php

abstract class abstractModel {
    protected $fields = array();
    public function __construct(array $data = array()) {
        foreach($this->fields as $key) {
            if (isset($data[$key])) {
                $this->{$key} = $data[$key];
            }
        }
    }
}

?>