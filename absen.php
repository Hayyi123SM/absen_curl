<?php 
	function getWeb($url){
		$ch = curl_init();
		$option = [
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_ENCODING => "",
			CURLOPT_COOKIEJAR => 'cookie-name.txt',
			CURLOPT_COOKIESESSION => true,
			CURLOPT_HTTPHEADER => array(
				"Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
				"Accept-Encoding: gzip, deflate, br",
				"Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7",
				"Cache-Control: max-age=0",
				"Connection: keep-alive",
				"Host: elearning.akakom.ac.id",
				"Referer: https://elearning.akakom.ac.id/",
				"User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85 Safari/537.36",
			),
		];
		curl_setopt_array($ch, $option);
		$result = curl_exec($ch);
		$form = explode("input", $result);
		$token = explode('"', $form[2]);
		curl_close($ch);
		return $token[5];
	}

	function login($url, $user, $pw, $opsi){
		$ch = curl_init();
		$token = getWeb($url);
		$option = [
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_POST => true,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_ENCODING => "",
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POST => 1,
			CURLOPT_POSTFIELDS => "anchor=&logintoken=".$token."&username=".$user."&password=".$pw."&rememberusername=1",
			CURLOPT_COOKIEJAR => 'cookie-name.txt',
			CURLOPT_COOKIEFILE => 'cookie-name.txt',
			CURLOPT_HTTPHEADER => array(
				"Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/",
				"Accept-Encoding: gzip, deflate, br",
				"Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7",
				"Connection: keep-alive",
				"Origin:  https://elearning.akakom.ac.id",
				"Content-Type: application/x-www-form-urlencoded",
				"Referer: https://elearning.akakom.ac.id/login/index.php",
				"User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85 Safari/537.36",
			),
		];
		curl_setopt_array($ch, $option);
		$result = curl_exec($ch);
		curl_close($ch);
		$error = strpos($result, '<div class="loginerrors mt-3">');
		if(!$error){
			return praAbsen($opsi);
		}else{
			header("location:index.php?error=true");
		}
	}

	function praAbsen($url){
		$ch = curl_init();
		$options = [
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_ENCODING => "",
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_COOKIEFILE => 'cookie-name.txt',
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_HTTPHEADER => array(
				"Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/",
				"signed-exchange;v=b3;q=0.9",
				"Accept-Encoding: gzip, deflate, br",
				"Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7",
				"Cache-Control: max-age=0",
				"Connection: keep-alive",
				"Host: elearning.akakom.ac.id",
				"Referer: https://elearning.akakom.ac.id/login/index.php",
				"User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85 Safari/537.36",
			),
		];
		curl_setopt_array($ch, $options);
		$result = curl_exec($ch);
		curl_close($ch);
		$cell2 = explode('<td class="statuscol cell c2 lastcol" style="text-align:center;width:*;" colspan="3">', $result);
		if ($cell2[1]) {
			$link = explode('<a href="', $cell2[1]);
			$endpoint = explode('">', $link[1]);
			return var_dump($endpoint);
			// return absen($endpoint[0]);
		}else{
			header("location:index.php?absen=false");
		}
	}

	function absen($url){
			$ch = curl_init();
			$options = [
				CURLOPT_URL => $url,
				CURLOPT_RETURNTRANSFER => 1,
				CURLOPT_CUSTOMREQUEST => "GET",
				CURLOPT_COOKIEFILE => 'cookie-name.txt',
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_ENCODING => "",
				CURLOPT_HTTPHEADER => array(
					"Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/",
					"signed-exchange;v=b3;q=0.9",
					"Accept-Encoding: gzip, deflate, br",
					"Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7",
					"Cache-Control: max-age=0",
					"Connection: keep-alive",
					"Host: elearning.akakom.ac.id",
					"Referer: https://elearning.akakom.ac.id/login/index.php",
					"User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85 Safari/537.36",
				),
			];
			curl_setopt_array($ch, $options);
			$result = curl_exec($ch);
			curl_close($ch);
			header("location:index.php?absen=success");
		
	}

	if(isset($_POST['Submit'])){
		$user = htmlspecialchars($_POST['user']);
		$pw = htmlspecialchars($_POST['password']);
		$opsi = htmlspecialchars($_POST['matkul']);

		if(!empty($user) && !empty($pw) && !empty($opsi)){
			echo login("https://elearning.akakom.ac.id/login/index.php", $user, $pw, $opsi);
		}else{
			header("location:index.php?empty=true");
		}
	}








 ?>