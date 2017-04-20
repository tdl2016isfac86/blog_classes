<?php
/* ---------------- */
/* admin/logout.php */
/* ---------------- */

require_once('../classes/author.php');
$logout = new Author($_SESSION['id']);
$logout->Disconnect();
?>