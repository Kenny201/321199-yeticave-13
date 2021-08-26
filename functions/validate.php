<?php

    /**
     * Функция возврата значения input
     * @param string $name
     *
     * @return mixed|string
     */

    function getPostVal($name)
    {
        return $_POST[$name] ?? "";
    }

    /**
     * @param $name
     *
     * @return string|void
     */
    function validateEmail($name)
    {
        if (!filter_input(INPUT_POST, $name, FILTER_VALIDATE_EMAIL)) {
            return "Введите корректный email";
        }
    }

    function validateCategory($name)
    {
        if (!$_POST[$name]) {
            return "Выберите категорию";
        }
    }

    function validateFilled($name)
    {
        if (!$_POST[$name]) {
            return "Это поле должно быть заполнено";
        }
    }
    function validateDate($date)
    {
            $date = $_POST[$date];

            if ($date) {
                $date_time_obj = DateTime::createFromFormat('Y-m-d', $date);
                $date_valide = new DateTime('+1 days');

                if ($date_time_obj->format('Y-m-d') !== $date) {
                    return "Укажите дату в формате 'ГГГГ-MM-ДД'";
                }
                if ($date_time_obj->format('Y-m-d') < $date_valide->format('Y-m-d')) {
                    return "Дата должна быть больше текущей даты, хотя бы на один день'";
                }
            }else{
                return "Укажите дату";
            }

    }
    function validatePrice($name)
    {
        if ($_POST[$name]<0) {
            return "Цена должна быть больше ноля";
        }
    }
    function isCorrectLength($name, $min, $max)
    {
        $len = strlen($_POST[$name]);
        if ($len < $min || $len > $max) {
            return "Значение должно быть от $min до $max символов";
        }
    }

    function isCorrectFile()
    {
        if ($_FILES['lot-img']['name'] ?? '') {
            $mime_type = mime_content_type($_FILES['lot-img']['tmp_name']);
            if ($mime_type !== 'image/png' && $mime_type !== 'image/jpeg') {
                return "Добавьте картинку jpeg, png, jpg";
            } elseif ($_FILES['lot-img']['size'] > 1000000) {
                return "Максимальный размер файла: 1МБ";
            }
        }else{
            return "Добавьте картинку";
        }

    }



