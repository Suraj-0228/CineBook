<?php
require 'includes/dbconnection.php';

// ===== Pagination Settings =====
$limit = 8; // theaters per page
$page  = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) {
    $page = 1;
}
$offset = ($page - 1) * $limit;

// ===== Total Theaters Count =====
$count_query  = "SELECT COUNT(*) AS total FROM theaters";
$count_result = mysqli_query($con, $count_query);
$total_records = 0;

if ($count_result && mysqli_num_rows($count_result) > 0) {
    $count_row = mysqli_fetch_assoc($count_result);
    $total_records = (int)$count_row['total'];
}

// how many pages
$total_pages = $total_records > 0 ? ceil($total_records / $limit) : 1;

// ===== Fetch Paginated Theaters =====
$sql_query = "
    SELECT *
    FROM theaters
    ORDER BY theater_id DESC
    LIMIT $limit OFFSET $offset
";
$result = mysqli_query($con, $sql_query);

if (!$result) {
    die("Query Error: " . mysqli_error($con));
}
