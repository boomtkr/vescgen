<html>
<head>
	<title>
	</title>
</head>	


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js">
</script>
<script>

function myFunction() {
	$('#myTable > tbody:last').append('<tr><td><input type="text" name="user[]" id="user" placeholder="ชื่องาน" /></td></tr>');
	// $('.container').append('<input type="text" name="someName[]" value="2" />');
}
</script>
<body>
	<?php
		$girls = array('1','2');
		$tmpgirls = array();
		for($i=0;$i<3;$i++){
			$tmpgirls[$i]=array();
			$tmpgirls[$i]=$girls;
		}

		array_splice($tmpgirls[0], 0, 1);

		// unset($tmpgirls[0][0]);
		array_values($tmpgirls[0]);
	?>
	<pre>{{dd($tmpgirls)}}</pre>
</body>
</html>