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

    function validateEmpty($name)
    {
        if (!$_POST[$name]) {
            return "Это поле должно быть заполнено";
        }
    }

    function validateStep($name)
    {
        if ((!is_numeric($_POST[$name]) && !empty($_POST[$name]))) {
            return "Введите число";
        }
        if (floatval($_POST[$name]) <= 0 && $_POST[$name] !== '') {
            return "Ставка должна быть больше ноля";
        }
        return validateEmpty($name);
    }

    function validatePrice($name)
    {
        $floatval = floatval(str_replace(',', '.', $_POST[$name]));
        if ((!is_numeric($floatval) && !empty($floatval))) {
            return "Введите число";
        }
        if (floatval($floatval) <= 0 && $_POST[$name] !== '') {
            return "Цена должна быть больше ноля";
        }

        return validateEmpty($name);
    }

    function validateDate($date)
    {

        if ($_POST[$date]) {

            $date_time_obj = DateTime::createFromFormat('Y-m-d', $date);
            $date_valide = new DateTime('+1 days');
            $date_time_format = $date_time_obj->format('Y-m-d');
            $date_valide_format = $date_valide->format('Y-m-d');

            if ( $date_time_format !== $date) {
                return "Укажите дату в формате 'ГГГГ-MM-ДД'";
            }
            if ($date_time_format->format('Y-m-d') <  $date_valide_format ) {
                return "Дата должна быть больше текущей даты, хотя бы на один день'";
            }
        }
        return validateEmpty($date);

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
        if (!empty($_FILES['lot-img']['name'])) {
            $mime_type = mime_content_type($_FILES['lot-img']['tmp_name']);
            if ($mime_type !== 'image/png' && $mime_type !== 'image/jpeg') {
                return "Добавьте картинку jpeg, png, jpg";
            } elseif ($_FILES['lot-img']['size'] > 1000000) {
                return "Максимальный размер файла: 1МБ";
            }
        } else {
            return "Добавьте картинку";
        }

    }



