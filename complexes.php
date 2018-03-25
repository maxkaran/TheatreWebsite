<html>
<head>
	<title>Theater Complex</title>
	<link rel="stylesheet" type="text/css">
</head>
<body>
	<?php
		echo $_GET['name'];
	?>
	<div class="container">
		<?php
		getComplexes();
		?>
	</div>
</body>
</html>