<?php
	
	class Redirects {
		
		public function doRedirect ($url) {
			
			// TODO - Realizar redirects nas páginas
			echo '	<script type="text/javascript">';
			echo '		window.location = "'.$url.'"';
			echo '	</script>';
			
			// Redirecionando com PHP
			header("Location: ".$url);
			
		} // doRedirect
		
	} // Redirects 
	
?>