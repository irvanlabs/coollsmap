<!DOCTYPE html>
<html>
<head>
	<title></title>
<!-- 	taruh lokasi jduery ning kene mbah -->
<script type="text/javascript" src=""></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.refreshCaptcha').on('click', function(){
			$.get('<?php echo base_url().'captcha/refresh'; ?>', function(data){
				$('#captImg').html(data)
			});
		});
	});
</script>
</head>
<body>

</body>
</html>