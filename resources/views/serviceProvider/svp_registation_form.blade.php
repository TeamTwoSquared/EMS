<html>
	<head>
		<style>
		input[type=text], select {
		width: 75%;
		padding: 12px 20px;
		margin: 4px 5;
		border: 1px solid #ccc;
		border-radius: 4px;
		box-sizing: border-box;
		margin-top:10px;
		margin-bottom:30px;
		margin-left:30px;
		margin-right:30px;
		}
		
		input[type=number], select {
		width: 75%;
		padding: 12px 20px;
		margin: 4px 5;
		border: 1px solid #ccc;
		border-radius: 4px;
		box-sizing: border-box;
		margin-top:10px;
		margin-bottom:30px;
		margin-left:30px;
		margin-right:30px;
		}
        input[type=email], select {
		width: 75%;
		padding: 12px 20px;
		margin: 4px 5;
		border: 1px solid #ccc;
		border-radius: 4px;
		box-sizing: border-box;
		margin-top:10px;
		margin-bottom:30px;
		margin-left:30px;
		margin-right:30px;
		}
        input[type=password], select {
		width: 75%;
		padding: 12px 20px;
		margin: 4px 5;
		border: 1px solid #ccc;
		border-radius: 4px;
		box-sizing: border-box;
		margin-top:10px;
		margin-bottom:30px;
		margin-left:30px;
		margin-right:30px;
		}
		
		input[type=date], select {
		width: 75%;
		padding: 12px 20px;
		margin: 4px 5;
		border: 1px solid #ccc;
		border-radius: 4px;
		box-sizing: border-box;
		margin-top:10px;
		margin-bottom:30px;
		margin-left:30px;
		margin-right:30px;
		}
		
		
		div {
		border-radius: 5px;
		background-color: #f2f2f2;
		padding: 10px;
		}
	
		input[type=submit]:hover {
		background-color: #45a049;
		}
		</style>
	</head>
	
	<body>
		<div>
			<form action="insertServiceProvider" method="POST">
				<center><h1>Registation Form</h2></center>
                {{ csrf_field() }}
                
            ID :
            <input type="text" name="id" ><br>
			Name :
			<input type="text" name="name" ><br>
            User Name :
            <input type="text" name="userName" ><br>
            Password :
            <input type="password" name="pWord" ><br>
            Email :
            <input type="email" name="email" ><br>
			Address :
			<input type="text" name="address" ><br>
			<br><br><br>
			
			<center>
				<input type="submit" value="sinup" name="send">
			<center>
		
			</form>
		</div>
	</body>

</html>