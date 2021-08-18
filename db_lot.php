<?php
function get_lot($db, $id): array
{
    $sql_lot = 'SELECT l.$id AS id, l.title AS title, l.price AS price, l.start_price AS start_price, l.img AS img, l.created_at AS created_at,  l.completed_at AS completed_at, c.title AS category_title FROM lots AS l INNER JOIN categories AS c ON l.category_id = c.id ORDER BY l.created_at DESC LIMIT 6';
    $result_lot = $db->query($sql_lot);
    return $result_lot->fetch_array(MYSQLI_ASSOC);
}
