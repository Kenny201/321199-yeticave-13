<?php
    require_once('bootstrap.php');
    $is_auth = rand(0, 1);
    $user_name = 'Виталий';
    $dbase = get_db(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    $categories = get_all_categories($dbase);
    $add_lot= include_template('add-lot.php', compact('categories'));
    $layout_content = include_template(
        'layout.php',
        [
            'content' => $add_lot,
            'title' => 'Добавление лота',
            'is_auth' => $is_auth,
            'user_name' => $user_name,
            'categories' => $categories
        ]
    );

    print($layout_content);
