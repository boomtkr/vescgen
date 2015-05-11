<html>
<head>
	<title>
	</title>
</head>	
<script>
	$(document).ready(function () {
		$('#addButton').click(function(){
			alert('4');
		    $('.container').append('<input type="text" name="someName[]" value="someNumber" />');
		);
	});
</script>
<body>
	<div class="container">
	</div>
	<button id="addbutton">add</button>
</body>
</html>