<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8;">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=no">

	<title>
		Navigation System
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->fetch('meta');
	?>
	<link rel="stylesheet" href="css/custom-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="css/themes/default/jquery.mobile-1.3.2.min.css">
	<?php echo $this->fetch('css');?>
	<script type="text/javascript" src="http://openlayers.org/api/OpenLayers.js"></script>
	<script src="js/jquery-1.10.2.min.js"></script>
	<script src="js/jquery-ui-1.10.3.custom.min.js"></script>
	<script src="js/jquery-ui-touch-punch.min.js"></script>
	<script src="js/jquery.mobile-1.3.2.min.js"></script>
	<script src="js/jquery.xdomainajax.js" type="text/javascript"></script>
	<?php echo $this->fetch('script');?>
</head>
<body onload="init(),init2()">
	<?php echo $this->fetch('content'); ?>
</body>
</html>
