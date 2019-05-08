<?php 
include_once('connection.php');

if (isset($_POST['from']) and $_POST['from'] == 'manage-amileen-delete') {

	mysqli_query($connection, "delete from amileen_table where amileenid = '" . $_POST['amileenid'] . "' ");

	header("Location: manage-amileen.php?status=deleted");

}


if (isset($_POST['from']) and $_POST['from'] == 'manage-barangay-delete') {

	mysqli_query($connection, "delete from barangay_table where barangayid = '" . $_POST['barangayid'] . "' ");

	header("Location: manage-barangay.php?status=deleted");

}


if (isset($_POST['from']) and $_POST['from'] == 'manage-purok-delete') {

	mysqli_query($connection, "delete from purok_table where purokid = '" . $_POST['purokid'] . "' ");

	header("Location: manage-purok.php?status=deleted");

}


if (isset($_POST['from']) and $_POST['from'] == 'manage-household-delete') {

	mysqli_query($connection, "delete from household_table where householdid = '" . $_POST['householdid'] . "' ");

	header("Location: manage-household.php?status=deleted");

}




if (isset($_POST['from']) and $_POST['from'] == 'register-family-members-delete') {

	mysqli_query($connection, "delete from familyprofile_table where familyprofileid = '" . $_POST['familyprofileid'] . "' ");

	header("Location: register-family-members.php?status=deleted&householdid=" . $_POST['householdid'] . "");

}


?>