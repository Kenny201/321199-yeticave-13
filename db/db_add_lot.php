<?php

    /**
     * @param mysqli $db
     *
     *
     */


    function add_lot(mysqli $db)
    {
        $i = 4;

        $query_lot = "INSERT INTO lots (title , user_id, category_id,  start_price , img , description , bet_step, completed_at) VALUES (?, ?, ?, ? ,? ,? ,? ,? )";
        $stmt = $db->prepare($query_lot);
        $stmt->bind_param("siidssis", $_POST['lot-name'], $i, $i, $_POST['lot-rate'], $_FILES['lot-img']['name'], $_POST['message'], $_POST['lot-step'], $_POST['lot-date']);
        $stmt->execute();
        $stmt->close();
        $db->close();
    }
