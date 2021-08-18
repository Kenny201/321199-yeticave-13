<?php


    function get_all_lots($db): array
    {
        $sql_lots = 'SELECT l.title AS title, l.price AS price, l.start_price AS start_price, l.img AS img, l.created_at AS created_at,  l.completed_at AS completed_at, c.title AS catagory_title FROM lots AS l INNER JOIN categories AS c ON l.category_id = c.id ORDER BY l.created_at DESC LIMIT 6';
        $result_lots = $db -> query( $sql_lots );
        return $lots = $result_lots -> fetch_all( MYSQLI_ASSOC );
    }

    $lots = get_all_lots( $dbase );
