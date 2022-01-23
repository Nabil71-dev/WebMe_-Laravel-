<head>
    @extends('style_bootstrap.style_links')
    <link href="/mycss/forgotpass.css" rel="stylesheet">
</head>
<body>
<div class="global-container">
	<div class="card login-form">
	<div class="card-body">
		<h3 class="card-title text-center">Send us your mail and Package name we will send your pass to your mail</h3>
		<div class="card-text">
			<form  action="{{route('forgotpass_add')}}" method="post">
				@csrf
				<div class="form-group">
					<input name="fmail" placeholder="Enter your authorized address" type="email" class="form-control form-control-sm"aria-describedby="emailHelp">
				</div>
				<div class="form-group">
					<input name="fpackname" placeholder="Enter your subscribed Package name"  type="text" class="form-control form-control-sm">
				</div>
				<button type="submit" class="btn btn-success btn-block">Submit</button>
			</form>
		</div>
	</div>
</div>
</div>
</body>