<?php
function show_model_error($model){
        $errors = $model->getError();
        $errorMsg = '<ul>';
        if (is_array($errors)) {
            foreach ($errors as $error) {//错误结果有多条
                $errorMsg .= "<li>$error</li>";
            }
        } else {//错误结果仅一条
            $errorMsg .= "<li>$errors</li>";
        }
        $errorMsg .= "</ul>";
        return $errorMsg;
    }
