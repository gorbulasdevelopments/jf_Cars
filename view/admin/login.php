<style type="text/css">

	#loginForm {
		padding: 20px;
		width: 350px;
	}
	
	#loginForm tr {
		padding: 10px;
		display: block;
	}
	
	#loginForm label {
		width: 150px;
		display: block;
		float: left;
		height: 40px;
		line-height: 40px;
		font-weight: bold;
		letter-spacing: 3px;
	}
	
	#loginForm input {
		width: 150px;
		display: block;
		float: left;
		padding: 10px;
	}
	
	#loginForm input[type=submit] {
		width: 150px;
		display: block;
		float: left;
		padding: 10px;
		margin-left: 50%;
	}


</style>

<!-- Content Start -->
<div id="content_container">

    <div id="content">

        <h1>Login</h1>
        <br />
        <form id="loginForm" action="login/run" method="post">
			<table>
				<tr><td><label>Login</label></td><td><input type="text" name="login" /></td></tr>
				<tr><td><label>Password</label></td><td><input type="password" name="password" /></td></tr>
				<tr><td colspan=2><input type="submit" value="Login"/></td></tr>
			</table>
        </form>

    <div style="clear: both"></div>
    </div>
</div>
<!-- Content End -->