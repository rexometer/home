<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php

    global $session, $user, $path, $mysqli;
    
	//get API-Key for MyELectric
    $apikey = "";
    if ($session['write']) $apikey = "readkey=".$user->get_apikey_read($session['userid']);

 //Dashboard-ID herausfinden
	require "Modules/dashboard/dashboard_model.php";
    $dashboard = new Dashboard($mysqli);
  //Gibt das Array des Hauptdashboards zurueck. Mit $dash["id"] kann die ID ausgegeben werden.
	$dash = $dashboard->get_main($session['userid']);
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>RExometer - Startseite</title>
<style type="text/css">
body {
	background-color: #fff;
}
</style>
</head>

<body>

<p><center><img src="<?php echo $path; ?>Modules/home/images/logo.svg" width="266" height="80" /></center></p>
<table width="100%" border="0" cellspacing="5" cellpadding="5">
  <tr>
    <td align="center" valign="middle"><p>
    </p></td>
    <td align="center" valign="middle"><br /></td>
  </tr>
  <tr>
    <td align="center" valign="top"><p><a href="<?php echo $path; ?>graph"><img src="<?php echo $path; ?>Modules/home/images/graph.png" width="276" height="214" /><br />
    <?php echo _('Visualization'); ?></a></p>
    <p>&nbsp;</p></td>
    <td align="center" valign="top"><p><a href="<?php echo $path; ?>app/view?name=myelectric&<?php echo $apikey; ?>"><img src="<?php echo $path; ?>Modules/home/images/electric.png" alt="" width="276" height="214" /><br />
    <?php echo _('Electricity consumption and costs'); ?></a></p>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td align="center" valign="top"><a href="<?php echo $path; ?>dashboard/view?id=<?php echo $dash["id"]; ?>"><img src="<?php echo $path; ?>Modules/home/images/dashboard.png" alt="" width="276" height="214" /><br />
    <?php echo _('User Dashboard'); ?></a></td>
    <td align="center" valign="top"><a href="<?php echo $path; ?>settings"><img src="<?php echo $path; ?>Modules/home/images/einstellungen.png" alt="" width="276" height="214" /><br />
    <?php echo _('Settings'); ?></a></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
