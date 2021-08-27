<?php

    /**
     * @param mysqli $db
     *
     *
     */

    function add_lot(mysqli $db, string $path_img)
    {
        $path_img = $path_img . $_FILES['lot-img']['name'];
        $i = 4;
        $query_lot = "INSERT INTO lots (title , user_id, category_id,  start_price , img , description , bet_step, completed_at) VALUES (?, ?,  ?, ? ,? ,? ,? ,?)";
        $stmt = $db->prepare($query_lot);
        $stmt->bind_param("siidssis", $_POST['lot-name'], $i, $_POST['category'], $_POST['lot-rate'], $path_img , $_POST['message'], $_POST['lot-step'], $_POST['lot-date']);
        $stmt_result = $stmt->execute();
        $stmt->close();
        return $stmt_result;
    }
