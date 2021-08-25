<?php
    $errors = [];

    function getPostVal($name) {
        return $_POST[$name] ?? "";
    }
    function validateEmail($name) {
        if (!filter_input(INPUT_POST, $name, FILTER_VALIDATE_EMAIL)) {
            return "Введите корректный email";
        }
    }

    function validateFilled($name) {
        if (empty($_POST[$name])) {
            return "Это поле должно быть заполнено";
        }
    }
    function isCorrectLength($name, $min, $max) {
        $len = strlen($_POST[$name]);

        if ($len < $min or $len > $max) {
            return "Значение должно быть от $min до $max символов";
        }
    }
    $rules = [
        'lot-title' => function() {
            return validateFilled('lot-title');
        },
        'title' => function() {
            return validateLength('title', 10, 200);
        },
        'description' => function() {
            return validateLength('description', 10, 3000);
        }
    ];
