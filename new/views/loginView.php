<body>
<div class="col-md-6 col-md-offset-3 vertical-off-4">
	<div class="panel panel-default login-form">
	  	<div class="panel-body">
	  		<form id="loginForm" action="#">
                <input type="hidden" name="action" value="login">
		    	<fieldset>
		    		<legend>
		    			Login
		    		</legend>

		    		<div id="message"></div>

					<div class="form-group">
				    	<label for="username">Username</label>
				    	<input type="text" class="form-control" id="username" name="username" placeholder="Username" autofocus>
				  	</div>
				  	<div class="form-group">
				    	<label for="password">Password</label>
				    	<input type="password" class="form-control" id="password" name="password" placeholder="Password">
				  	</div>					  						 
				  	
				  	<button id="btnLogin" name="action" class="col-md-12 btn btn-primary login-button;" value="login">Submit</button>					
		    	</fieldset>
		    </form>

            <script>


				$("#loginForm").submit(function(event) {
					event.preventDefault();
					
					$.post("/api.php", $("#loginForm").serialize(), function(result) {
						result = JSON.parse(result);
						if(result.error) {
							$("#message").html(result.error_msg);
						}
						else
							window.location.reload();		
                    });
				});
            </script>
	  	</div>
	</div>
</div>



</body>
</html>