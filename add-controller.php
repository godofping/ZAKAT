<?php 
include_once('connection.php');

if (isset($_POST['from']) and $_POST['from'] == 'register-amileen') {


	
	$qry = mysqli_query($connection, "select * from account_table where username = '" . $_POST['username'] . "'");

	if (mysqli_num_rows($qry) <= 0) {
		mysqli_query($connection, "insert into account_table (username,password,accountlevel) values ('" . $_POST['username'] . "', '" . md5($_POST['password']) . "', '2')");

		$qry = mysqli_query($connection, "select * from account_table where username = '" . $_POST['username'] . "'");
		$res = mysqli_fetch_assoc($qry);
		mysqli_query($connection, "insert into amileen_table (firstname, middlename, lastname, birthdate, gender, accountid) values ('" . $_POST['firstname'] . "', '" . $_POST['middlename'] . "', '" . $_POST['lastname'] . "', '" . $_POST['birthdate'] . "', '" . $_POST['gender'] . "', '" . $res['accountid'] . "')");
		header("Location: register-amileen.php?status=success");
	}
	else
	{
		if ($_POST['password'] != $_POST['confirmpassword']) {
			header("Location: register-amileen.php?status=failed-1&firstname=php" . $_POST['firstname'] . "&middlename=" . $_POST['middlename'] ."&lastname=" . $_POST['lastname'] . "&birthdate=" . $_POST['birthdate'] . "&gender=" . $_POST['gender'] . "");
		}
		else
		{
			header("Location: register-amileen.php?status=failed-2&firstname=php" . $_POST['firstname'] . "&middlename=" . $_POST['middlename'] ."&lastname=" . $_POST['lastname'] . "&birthdate=" . $_POST['birthdate'] . "&gender=" . $_POST['gender'] . "");
		}

		
	}
}


if (isset($_POST['from']) and $_POST['from'] == 'register-barangay') {
	
	mysqli_query($connection, "insert into barangay_table (barangayname) values ('" . $_POST['barangayname'] . "')");
	header("Location: register-barangay.php?status=success");

}


if (isset($_POST['from']) and $_POST['from'] == 'register-purok') {
	
	mysqli_query($connection, "insert into purok_table (purokname, barangayid) values ('" . $_POST['purokname'] . "', '" . $_POST['barangayid'] . "')");
	header("Location: register-purok.php?status=success");

}


if (isset($_POST['from']) and $_POST['from'] == 'manage-household-add') {
	
	mysqli_query($connection, "insert into household_table (familyname, purokid) values ('" . $_POST['familyname'] . "', '" . $_POST['purokid'] . "')");
	header("Location: manage-household.php?status=added");

}

if (isset($_POST['from']) and $_POST['from'] == 'register-family-members-add') {

	$qry = mysqli_query($connection, "select * from account_table where username = '" . $_POST['username'] . "'");

	if (mysqli_num_rows($qry) <= 0) {
	
	mysqli_query($connection, "insert into account_table (username,password,accountlevel) values ('" . $_POST['username'] . "', '" . md5($_POST['password']) . "', '3')");

	$qry = mysqli_query($connection, "select * from account_table where username = '" . $_POST['username'] . "'");
	$res = mysqli_fetch_assoc($qry);

	mysqli_query($connection, "insert into familyprofile_table (firstname, lastname, gender, birthdate, profession, nameofcompany, salaryincome, householdid,accountid) values ('" . $_POST['firstname'] . "', '" . $_POST['lastname'] . "', '" . $_POST['gender'] . "', '" . $_POST['birthdate'] . "', '" . $_POST['profession'] . "', '" . $_POST['nameofcompany'] . "', '" . $_POST['salaryincome'] . "', '" . $_POST['householdid'] . "', '" . $res['accountid'] . "')");

	echo "insert into familyprofile_table (firstname, lastname, gender, birthdate, profession, nameofcompany, salaryincome, householdid,accountid) values ('" . $_POST['firstname'] . "', '" . $_POST['lastname'] . "', '" . $_POST['gender'] . "', '" . $_POST['birthdate'] . "', '" . $_POST['profession'] . "', '" . $_POST['nameofcompany'] . "', '" . $_POST['salaryincome'] . "', '" . $_POST['householdid'] . "', '" . $res['accountid'] . "')";


	  	header("Location: register-family-members.php?status=added&householdid=" . $_POST['householdid'] . "");
	}
	else
	{
		header("Location: register-family-members.php?status=username-taken&householdid=" . $_POST['householdid'] . "");
	}
	
		

}

// if (isset($_POST['from']) and $_POST['from'] == 'add-income-table-add') {
// 	mysqli_query($connection, "insert into income_table (money, gold, silver, properties, business, preciousstones, rices, corns, householdid, totalzakatdeduction) values ('" . $_POST['money'] . "', '" . $_POST['gold'] . "', '" . $_POST['silver'] . "', '" . $_POST['properties'] . "', '" . $_POST['business'] . "', '" . $_POST['preciousstones'] . "', '" . $_POST['rices'] . "', '" . $_POST['corns'] . "', '" . $_POST['householdid'] . "', '" . $_POST['totalzakatdeduction'] . "')");

// 	header("Location: register-zakat-calculation.php?status=success");
// }


if (isset($_POST['from']) and $_POST['from'] == 'add-income-table-add') {

	$qry = mysqli_query($connection, "select * from income_table where householdid = '" . $_POST['householdid'] . "'");

	if (mysqli_num_rows($qry) > 0) {

		mysqli_query($connection, "update income_table set money = '" . $_POST['money'] . "', gold = '" . $_POST['gold'] . "', silver = '" . $_POST['silver'] . "', properties = '" . $_POST['properties'] . "', business = '" . $_POST['business'] . "', preciousstones = '" . $_POST['preciousstones'] . "', rices = '" . $_POST['corns'] . "' where householdid = '" . $_POST['householdid'] . "'");
	}
	else
	{
		mysqli_query($connection, "insert into income_table (money, gold, silver, properties, business, preciousstones, rices, corns, householdid, totalzakatdeduction) values ('" . $_POST['money'] . "', '" . $_POST['gold'] . "', '" . $_POST['silver'] . "', '" . $_POST['properties'] . "', '" . $_POST['business'] . "', '" . $_POST['preciousstones'] . "', '" . $_POST['rices'] . "', '" . $_POST['corns'] . "', '" . $_POST['householdid'] . "', '" . $_POST['totalzakatdeduction'] . "')");
	}


	

	 header("Location: register-zakat-calculation.php?status=success");
}




if (isset($_POST['from']) and $_POST['from'] == 'manage-submission-of-remittances') {
	mysqli_query($connection, "insert into collection_table (amount,type,familyprofileid,datepaid,amileenid) values ('" . $_POST['amount'] . "', '" . $_POST['type'] . "', '" . $_POST['familyprofileid'] . "', '" . $_POST['datepaid'] . "', '"  . $_SESSION['amileenid'] . "')");

	header("Location: manage-submission-of-remittances.php?status=success");
}


 ?>