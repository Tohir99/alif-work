<?php
	function main($file_name, $operator) {
		$file = fopen($file_name, 'r');
		$f1 = fopen("result.txt", "w");
		$f2 = fopen("negative_result.txt", "w");
		if($file) {
			while (!feof($file)) {
				$data_from_file = fgets($file);
				$result = 0;
				$data = explode(' ', $data_from_file);
				$result = process($result, $data, $operator);
				if ($result < 0) {
					fwrite($f2, $result . "\n");
				} else {
					fwrite($f1, $result . "\n");
				}
			}
		}
	}

	function process($result, $data, $operator) {
		switch($operator) {
			case '*':
				$result = $data[0] * $data[1];
				break;
			case '/':
				$result = $data[0] / $data[1];
				break;
			case '+':
				$result = $data[0] + $data[1];
				break;
			case '-':
				$result = $data[0] - $data[1];
				break;
			default:
				$result = 0;
				break;
		}
		return $result;
	}

	main($argv[1], $argv[2]);
	// echo($argv[1]);
	// echo($argv[2]);


?>