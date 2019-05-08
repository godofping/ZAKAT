<?php 
include_once('connection.php');

if (isset($_POST['from']) and $_POST['from'] == 'manage-amileen-edit') {

	mysqli_query($connection, "update amileen_table set firstname = '" . $_POST['firstname'] . "', middlename = '" . $_POST['middlename'] . "',lastname = '" . $_POST['lastname'] . "', gender = '" . $_POST['gender'] . "', birthdate = '" . $_POST['birthdate'] . "' where amileenid = '" . $_POST['amileenid'] . "' ");

	header("Location: manage-amileen.php?status=updated");

}

if (isset($_POST['from']) and $_POST['from'] == 'manage-barangay-edit') {

	mysqli_query($connection, "update barangay_table set barangayname = '" . $_POST['barangayname'] . "' where barangayid = '" . $_POST['barangayid'] . "' ");

	header("Location: manage-barangay.php?status=updated");

}


if (isset($_POST['from']) and $_POST['from'] == 'manage-purok-edit') {

	mysqli_query($connection, "update purok_table set purokname = '" . $_POST['purokname'] . "', barangayid = '" . $_POST['barangayid'] . "' where purokid = '" . $_POST['purokid'] . "' ");

	header("Location: manage-purok.php?status=updated");

}


if (isset($_POST['from']) and $_POST['from'] == 'manage-household-edit') {

	mysqli_query($connection, "update household_table set familyname = '" . $_POST['familyname'] . "', purokid = '" . $_POST['purokid'] . "' where householdid = '" . $_POST['householdid'] . "' ");

	header("Location: manage-household.php?status=updated");
}


if (isset($_POST['from']) and $_POST['from'] == 'register-family-members-edit') {

	mysqli_query($connection, "update familyprofile_table set firstname = '" . $_POST['firstname'] . "', lastname = '" . $_POST['lastname'] . "', gender = '" . $_POST['gender'] . "',birthdate =  '" . $_POST['birthdate'] . "',profession = '" . $_POST['profession'] . "', nameofcompany = '" . $_POST['nameofcompany'] . "', salaryincome = '" . $_POST['salaryincome'] . "' where familyprofileid = '" . $_POST['familyprofileid'] . "' ");
	
	header("Location: register-family-members.php?status=updated&householdid=" . $_POST['householdid'] . "");
}



if (isset($_POST['from']) and $_POST['from'] == 'profile-admin-update') {
	mysqli_query($connection, "update amileen_table set firstname = '" . $_POST['firstname'] . "', middlename = '" . $_POST['middlename'] . "',lastname = '" . $_POST['lastname'] . "', gender = '" . $_POST['gender'] . "',birthdate =  '" . $_POST['birthdate'] . "'");
	
	header("Location: profile.php?status=updated");
}

if (isset($_POST['from']) and $_POST['from'] == 'profile-admin-password') {
	mysqli_query($connection, "update account_table set password = '" . md5($_POST['password']) . "' where accountid = '" . $_SESSION['accountid'] . "'");
	
	header("Location: profile.php?status=password-updated");
}


?>