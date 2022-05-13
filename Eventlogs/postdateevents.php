<?php

	session_start();

  ?>
			<?php  
				
				$commands = escapeshellcmd('/var/www/html/projects/Event-logs/virtualenvs/Cl/EventLogs/req.py');
				$outputs = shell_exec($commands);
				#echo "<pre>"; print_r($outputs); echo "</pre>";
				#phpinfo();
				#die();
				
				header("Location: control.php");
				#echo "<pre>"; print_r($arrayn); echo "</pre>";
				#die();
			?>
		