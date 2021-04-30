<?php
error_reporting(0);
require_once "gabut.php";
$url = 'https://api.viewblock.io/zilliqa/addresses/zil1zzkmdmj9vuefxvwt44wygzg662dhnu9xk4m2j2?network=mainnet&page=1';
//$url2 = '?network=mainnet&page=1';
//$wallet = array("zil1thk0uu8ddht02eu6l2g8cunc7lkmr7l2s79qf9");
$wallet = array("zil1zzkmdmj9vuefxvwt44wygzg662dhnu9xk4m2j2", "zil1tucq4asz5wt4wpvxl68gyv9k7w2tepp350zv9d", 
				"zil132sy6mp6u0s6c086t7xawfnc2uxa3kwdjgj6sg","zil14j2r33zl5y3xvqda6vkup5efsky8srw962p6f3");
				echo "<b>".$name." ".$simbol."</b>";
				echo "\n";
				echo "<b>".round($rateZil,2)." ZIL - $".round($rateUsd,2)."</b>";
				echo "\n";
				echo "Change (24h): <b>".round($change,2)."% </b>";
				echo "\n";
				echo "Market Cap: <b>$".number_format(round($marketCap,2),2,".",",")."</b>";
				echo "\n";
				echo "Volume (24): <b>$".number_format(round($volume,2),2,".",",")."</b>";
				echo "\n";
				echo "Circ. Supply: <b>".number_format(round($cirSupply,2),2,".",",")."</b>";
				echo "\n";
foreach ($wallet as $key) {
				$contract_port = "zil18f5rlhqz9vndw4w8p60d0n7vg3n9sqvta7n6t2";
				$contract_xport = "zil1hpwshtxspjakjh5sn7vn4e7pp4gaqkefup24h2";
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, 'https://api.viewblock.io/zilliqa/addresses/'.$key.'?network=mainnet&page=1');
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

				curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

				$headers = array();
				$headers[] = 'Connection: keep-alive';
				$headers[] = 'Sec-Ch-Ua: \" Not A;Brand\";v=\"99\", \"Chromium\";v=\"90\", \"Microsoft Edge\";v=\"90\"';
				$headers[] = 'Accept: application/json';
				$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
				$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.72 Safari/537.36 Edg/90.0.818.42';
				$headers[] = 'Content-Type: application/json';
				$headers[] = 'Origin: https://viewblock.io';
				$headers[] = 'Sec-Fetch-Site: same-site';
				$headers[] = 'Sec-Fetch-Mode: cors';
				$headers[] = 'Sec-Fetch-Dest: empty';
				$headers[] = 'Referer: https://viewblock.io/';
				$headers[] = 'Accept-Language: en-US,en;q=0.9';
				$headers[] = 'If-None-Match: W/\"3caa-T1tPSazx9V2rFLeTHH44/weZ2ys\"';
				curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

				$result = curl_exec($ch);
				if (curl_errno($ch)) {
				    echo 'Error:' . curl_error($ch);
				}
				curl_close($ch);
				$cok = json_decode($result, TRUE);
				//print_r($cok["tokens"]["$contract_xport"]);
				$fixbalport = $cok["tokens"]["$contract_port"]["balance"] / 10000;
				$fixbalxport = $cok["tokens"]["$contract_xport"]["balance"] / 10000;
				echo "-------------------------";
				echo "\n";
				echo "Wallet : <b>".$key."</b>";
				echo "\n";
				echo "Total PORT : <b>".$fixbalport." - $".number_format(round($fixbalport * $rateUsd,2),2,".",",")."</b>";
				echo "\n";
				echo "Total XPORT : ".$fixbalxport;
				echo "\n";
				echo "-------------------------";
				echo "\n";
}
?>
