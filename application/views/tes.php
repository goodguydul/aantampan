<!DOCTYPE html>
<html>
<head>
	<title>Tes</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<form action="tes/tesmultiform" enctype="multipart/form-data" method="POST">
				userfile:			<input class="form-control" type="file" name="userfile" required="" accept="application/pdf"><br>
				userfilesupport:	<input class="form-control" type="file" name="userfilesupport" required="" accept="application/pdf"><br>
				userimage:			<input class="form-control" type="file" name="userimage" required="" accept="image/*"><br>
				<button class="btn btn-success"  type="submit">Submit</button>
			</form>
		</div>
	</div>
	
</body>
</html>