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

	<table id="myTable">
	  <tbody>
	    <tr><td>A</td></tr>
	    <tr><td>B</td></tr>
		<tr>
			<td><input type="text" name="user[]" id="user" placeholder="ชื่องาน" /></td>
			<td><input type="text" name="job[]" id="job" placeholder="จำนวนคน" /></td>
			<td><input type="text" name="female[]" id="female" placeholder="จำนวนสตรี" /></td>
		</tr>
	  </tbody>
	</table>

	<button onclick="myFunction()">Try it</button>
</body>
</html>