<?php

    function xssAdg(string $e): string
    {
        return htmlspecialchars($e);
    }

    /**
     * @param $file
     */
    function uploadFile($file)
    {
        $file_name = $_FILES[$file]['name'];
        $file_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/';
        move_uploaded_file($_FILES[$file]['tmp_name'], $file_path . $file_name);
        var_dump($_FILES[$file]);
    }
