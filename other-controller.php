<?php 
include_once('connection.php');

if (isset($_POST['from']) and $_POST['from'] == 'index') {
	
	$qry = mysqli_query($connection,"select * from account_table where username = '" . $_POST['username'] . "' and password = '" . md5($_POST['password']) . "' and accountlevel = 1");
	if (mysqli_num_rows($qry)) {
		$res = mysqli_fetch_assoc($qry);
		$_SESSION['accountid'] = $res['accountid'];
		$_SESSION['accountlevel'] = 1;
		header("Location: admin-dashboard.php");
	}
	else
	{
		$qry = mysqli_query($connection,"select * from account_view where username = '" . $_POST['username'] . "' and password = '" . md5($_POST['password']) . "' and accountlevel = 2");
		if (mysqli_num_rows($qry)) {
			$res = mysqli_fetch_assoc($qry);
			$_SESSION['accountid'] = $res['accountid'];
			$_SESSION['amileenid'] = $res['amileenid'];
			$_SESSION['accountlevel'] = 2;
			header("Location: amileen-dashboard.php");
		}
			else
			{
				$qry = mysqli_query($connection,"select * from familyprofile_view where username = '" . $_POST['username'] . "' and password = '" . md5($_POST['password']) . "' and accountlevel = 3");
				if (mysqli_num_rows($qry)) {
					$res = mysqli_fetch_assoc($qry);
					$_SESSION['accountid'] = $res['accountid'];
					$_SESSION['accountlevel'] = 3;
					header("Location: payer-dashboard.php");
				}
					else
					{
						header("Location: index.php?status=login-failed");
					}
			}
	}


}

 ?>