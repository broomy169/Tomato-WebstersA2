<?php
if (!isset($_SESSION)){
    session_start();
}
?>
<?php
if($_SESSION['user_accessLevel'] == "full") {
    include("users_inc_adminAccessManage.php");
} else if($_SESSION['user_accessLevel'] == "paid") {
    include("users_inc_paidAccessManage.php");
} else if($_SESSION['user_accessLevel'] == "free") {
    include("users_inc_freeAccessManage.php");
}
?>
