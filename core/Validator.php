<?php

namespace Core;

class Validator
{
    public function validate($formData, array $check)
    {
        $errors = [];
        foreach ($check as $key => $rule) {
            if ($rule === 'required' && (!isset($formData[$key]) || $formData[$key] === "")) {
                $errors[$key] = "$key is required";
            }
        }
        return $errors; // Return the errors array
    }
}

?>