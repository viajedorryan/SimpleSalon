<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap-theme.css') }}" />



	<title>SALON</title>
</head>
<body>
	@include('dashboard.header')
	<div class="container-fluid">
		<div class="row">
  			{{-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2">
  				@include('dashboard.sidenav')
  			</div> --}}
  			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  				@yield('content')
  			</div>
		</div>
	</div>
	

	<script src="{{ asset('/js/jquery.js') }}"></script>
	<script src="{{ asset('/js/bootstrap.min.js') }}" ></script>
	<script src="{{ asset('/js/bootstrap-theme.min.js') }}" ></script>
	<script type="text/javascript">
		$(document).ready(function() {        
		    $(".my-activity").click(function(event) {
		        var total = 0;
		        $(".my-activity:checked").each(function() {
		            total += parseInt($(this).attr("id"));
		        });
		        if (total == 0) {
		            $('#amount').val('');
		        } else {                
		            $('#amount').val(total);
		        }
		    });
		});    
	</script>
</body>
</html>