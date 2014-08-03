<?php

	function do_job() {

		$command = "tasklist";
		
		$app_name = "chrome.exe";
		
		$ary_javaw = array();
		
		$process = popen($command, 'r');
		// 	$process = popen('dir', 'r');
		// 	$process = proc_open('dir');
		
		print_r($process);
		
		//REF http://stackoverflow.com/questions/15988369/how-get-the-output-from-process-opend-by-popen-in-php answered Apr 13 '13 at 13:38
		$read = fread($process, 2096);
		
		while($read != false) {
			// 	while($read !== false) {
		
			//REF http://stackoverflow.com/questions/4366730/how-to-check-if-a-string-contains-specific-words answered Dec 6 '10 at 13:15
			if(strpos($read, $app_name) !== false) {
// 			if(strpos($read, "javaw") !== false) {
					
				$proc = new Process();
				
				echo "\$read = $read";
				echo "\n";
				
				$name = $read;
				
				$proc->set_Name($name);
// 				$proc->set_Name($read);
				
				$read = fread($process, 2096);
				
				$res = is_number($read);
				
				if ($res == true) {
					
					echo __LINE__."\n";
					echo "is number\n";
					
					$proc->set_Pid((int)trim($read));
					
				} else {
					
					echo __LINE__."\n";
					echo "is not number\n";
					
					$read = fread($process, 2096);
					
					$res = is_number($read);
					
					if ($res == true) {

						echo __LINE__."\n";
						echo "is not number\n";
						
						$proc->set_Pid((int)trim($read));
						
					} else {
						
					}
				}
// 				// trim
// 				$temp = trim($read);
				
// 				// any digit?
// 				if(strlen($temp) > 0) {
					
// 					// numeric?
// 					if(is_numeric($temp)) {
						
// 						$pid = (int)$temp;

// 						$proc->set_Pid($pid);
						
// 					}
					
// 				}
				
// // 				fread($process, 2096);
// // 				$read = fread($process, 2096);	// pid
// 				$pid = fread($process, 2096);	// pid
// // 				$class = get_class($pid);
	
// 				$pid = trim($pid);
// 				echo "\$pid(trimmed) = $pid";
// 				echo "\n";
				
// 				echo ($pid == true) ? "true" : "false";
				
// // 				echo "\$pid = $pid";
// // 				echo "\$read = $read";
// 				echo "\n";
				
// 				$proc->set_Pid($pid);
// // 				$proc->set_Pid($read);
				
// 				$read = fread($process, 2096);
// 				$res = is_numeric($read);
				
// 				echo ($res == true) ? "true" : "false";
// 				echo "\n";
				
// 				echo "\$read = $read";
// 				echo "\n";
				
// // 				$pid = $read;
				
// // 				$proc->set_Pid($pid);
// // 				$proc->set_Pid($read);
				
				array_push($ary_javaw, $proc);
				
// 				array_push($ary_javaw, $read);
					
// 				$read = fread($process, 2096);
// 				array_push($ary_javaw, $read);
					
// 				$read = fread($process, 2096);
// 				array_push($ary_javaw, $read);
					
			}
		
			// 		echo $read;
			// 		echo "\n";
		
			$read = fread($process, 2096);
		
		}//while($read != false)
		
		print_r($ary_javaw);
		
	}//function do_job()

	
	/**************************
	 * @return true => is numeric
	 * 			false => 1. not numeric
	 * 					2. string length => 0 or less 
	 **************************/
	function is_number($string) {

		$temp = trim($string);
		
		// any digit?
		if(strlen($temp) > 0) {

			return (is_numeric($temp)) ? true : false;
			// numeric?
// 			if(is_numeric($temp)) {

// 				$pid = (int)$temp;

// 				$proc->set_Pid($pid);

// 			}

		}
		
		return false;
		
	}//function is_number($string)

	do_job();
	
	class Process {
		
		private $name;
		private $pid;
		
		public function get_Name() {
			
			return $this->name;
			
		}
		
		public function set_Name($name) {
			
			$this->name = $name;
			
		}
		
		public function get_Pid() {
			
			return $this->pid;
			
		}
		
		public function set_Pid($pid) {
			
			$this->pid = $pid;
			
		}
	}
	
// 	echo $read;
	

// echo "hi";
// echo "\n";