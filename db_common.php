<?php

    function get_db($hostname, $username, $password, $database)
    {
        $db = new mysqli( $hostname, $username, $password, $database );
        $db -> set_charset( 'utf8' );
        if ( $db -> connect_errno ) {
            exit( 'Ошибка не удалось подключиться к базе данных. Повторите попытку' );
        } else {
            return $db;
        }
    }

    $dbase = get_db( 'localhost', 'root', '', 'yeticave' );
