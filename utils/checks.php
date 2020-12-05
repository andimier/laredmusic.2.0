<?php
    function checkRequiredFields($post, $required_fields) {
        $errors = array();

        foreach($required_fields as $fieldname) {
            if (!isset($post[$fieldname]) || (empty($post[$fieldname]) && is_numeric($post[$fieldname]))){
                $errors[] = $fieldname;
            }
        }

        return $errors;
    }
?>