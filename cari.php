<?php
function cariData($connection, $table, $kolom, $keyword, $limit = null, $offset = null)
{
    $keyword = mysqli_real_escape_string($connection, $keyword);

    $query = "SELECT * FROM $table WHERE ";
    $conditions = [];
    foreach ($kolom as $k) {
        $conditions[] = "$k LIKE '%$keyword%'";
    }
    $query .= implode(" OR ", $conditions);

    if ($limit !== null && $offset !== null) {
        $query .= " LIMIT $offset, $limit";
    }

    $result = mysqli_query($connection, $query);
    return $result;
}
