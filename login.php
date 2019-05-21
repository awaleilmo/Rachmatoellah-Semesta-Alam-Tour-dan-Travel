
<form action="loginproses.php" method="post">
<table class="table panel-content" align="center" style="width:80%">
	<tbody>
		<tr>
			<td colspan="2">
				<h2>Login Admin</h2>
			</td>
		</tr>
		<tr>
			<td>
				<label>Username</label>
			</td>
			<td>
				<input type="text" name="username" class="form-control" placeholder="Username">
			</td>
		</tr>
		<tr>
			<td>
				<label>Password</label>
			</td>
			<td>
				<input type="password" name="password" class="form-control" placeholder="Password">
			</td>
		</tr>
		<tr>
			<td colspan="2" align="right">
				<input type="submit" name="login" class="btn btn-primary" value="Login">
			</td>
		</tr>
	</tbody>
</table>
<?php show_alert();?>
</form>