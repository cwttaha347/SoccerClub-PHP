<?php
ob_start();
session_start();
include('includes/config.php');
if (!isset($_SESSION['admin'])) {

    echo '<script>window.location.href="../login.php"</script>';
}
if (isset($_GET['logout'])) {
    session_destroy();
    echo '<script>window.location.href="../login.php"</script>';
}






?>

<?php include('includes/header.php') ?>


<!-- template -->






<?php
if (isset($_GET['dashboard'])) {
    include('dashboard.php');
}
if (isset($_GET['contact_response'])) {
    include('contact_response.php');
}
if (isset($_GET['profile'])) {
    include('profile.php');
}
if (isset($_GET['website_settings'])) {
    include('settings.php');
}
if (isset($_GET['settings'])) {
    include('settings.php');
}
if (isset($_GET['add_merch'])) {
    include('insert_merch.php');
}
if (isset($_GET['customers'])) {
    include('view_costumers.php');
}
if (isset($_GET['orders'])) {
    include('view_orders.php');
}
if (isset($_GET['view_merch'])) {
    include('view_merch.php');
}
if (isset($_GET['soccer_info'])) {
    include('soccer_info.php');
}
if (isset($_GET['assign_matches'])) {
    include('assign_match.php');
}
if (isset($_GET['match'])) {
    include('match.php');
}
if (isset($_GET['blog'])) {
    include('blog.php');
}
if (isset($_GET['live_scores'])) {
    include('live_score.php');
}
if (isset($_GET['proceed'])) {
    include('proceed.php');
}

if (isset($_GET['categories'])) {
    include('categories.php');
}
?>




<?php include('includes/footer.php') ?>