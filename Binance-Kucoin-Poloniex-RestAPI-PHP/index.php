<?php
#BİNANCE İŞLEMLERİ
$query1 = "https://api.binance.com/api/v3/ticker/price";
$binancePrice = file_get_contents($query1);
$json1 = json_decode($binancePrice, true);

$query2 = "https://api.binance.com/api/v3/ticker/24hr"; 
$binance24Hr = file_get_contents($query2);
$json2 = json_decode($binance24Hr, true);

$btcPrice = "";
$ethPrice = "";
$trxPrice = "";

$btcVolume = "";
$ethVolume = "";
$trxVolume = "";

$btcChange = "";
$ethChange = "";
$trxChange = "";

foreach ($json1 as $key1 => $value1) {
	if ($value1["symbol"] == "BTCUSDT") {
		$btcPrice = $value1["price"];
	}elseif ($value1["symbol"] == "ETHUSDT") {
		$ethPrice = $value1["price"];
	}elseif ($value1["symbol"] == "TRXUSDT") {
		$trxPrice = $value1["price"];
	}
}

foreach ($json2 as $key2 => $value2) {
	if ($value2["symbol"] == "BTCUSDT") {
		$btcVolume = $value2["volume"];
		$btcChange = $value2["priceChange"];
	}elseif ($value2["symbol"] == "ETHUSDT") {
		$ethVolume = $value2["volume"];
		$ethChange = $value2["priceChange"];
	}elseif ($value2["symbol"] == "TRXUSDT") {
		$trxVolume = $value2["volume"];
		$trxChange = $value2["priceChange"];
	}
}

$binanceOrderBookQueryBtc = "https://api.binance.com/api/v1/depth?symbol=BTCUSDT&limit=5";
$binanceOrderBookQueryEth = "https://api.binance.com/api/v1/depth?symbol=ETHUSDT&limit=5";
$binanceOrderBookQueryTrx = "https://api.binance.com/api/v1/depth?symbol=TRXUSDT&limit=5"; #Binance Api Emir

$binanceOrderBook1 = file_get_contents($binanceOrderBookQueryBtc);
$binanceOrderBookJson1 = json_decode($binanceOrderBook1, true);

$binanceOrderBook2 = file_get_contents($binanceOrderBookQueryEth);
$binanceOrderBookJson2 = json_decode($binanceOrderBook2, true);

$binanceOrderBook3 = file_get_contents($binanceOrderBookQueryTrx);
$binanceOrderBookJson3 = json_decode($binanceOrderBook3, true);


#KUCOİN İŞLEMLERİ
$kucoinBtcPrice = "https://api.kucoin.com./api/v1/market/allTickers";
$kucoinPrice = file_get_contents($kucoinBtcPrice);
$kucoinPriceJson = json_decode($kucoinPrice, true);

$btcPrice2 = "";
$ethPrice2 = "";
$trxPrice2 = "";

$btcVolume2 = "";
$ethVolume2 = "";
$trxVolume2 = "";

$btcChange2 = "";
$ethChange2 = "";
$trxChange2 = "";

foreach ($kucoinPriceJson["data"]["ticker"] as $key4 => $value4) {
	if ($value4["symbol"] == "BTC-USDT") {
		$btcPrice2 = $value4["last"];
		$btcVolume2 = $value4["vol"];
		$btcChange2 = $value4["changePrice"];
	}elseif ($value4["symbol"] == "ETH-USDT") {
		$ethPrice2 = $value4["last"];
		$ethVolume2 = $value4["vol"];
		$ethChange2 = $value4["changePrice"];
	}elseif ($value4["symbol"] == "TRX-USDT") {
		$trxPrice2 = $value4["last"];
		$trxVolume2 = $value4["vol"];
		$trxChange2 = $value4["changePrice"];
	}
}

$kucoinOrderBookQueryBtc = "https://api.kucoin.com./api/v1/market/orderbook/level2_20?symbol=BTC-USDT"; #Kucoin Api Emir
$kucoinOrderBookQueryEth = "https://api.kucoin.com./api/v1/market/orderbook/level2_20?symbol=ETH-USDT";
$kucoinOrderBookQueryTrx = "https://api.kucoin.com./api/v1/market/orderbook/level2_20?symbol=TRX-USDT";

$kucoinOrderBook1 = file_get_contents($kucoinOrderBookQueryBtc);
$kucoinOrderBookJson1 = json_decode($kucoinOrderBook1, true);

$kucoinOrderBook2 = file_get_contents($kucoinOrderBookQueryEth);
$kucoinOrderBookJson2 = json_decode($kucoinOrderBook2, true);

$kucoinOrderBook3 = file_get_contents($kucoinOrderBookQueryTrx);
$kucoinOrderBookJson3 = json_decode($kucoinOrderBook3, true);


#POLONİEX İŞLEMLERİ
$poloniexBtcPrice = "https://poloniex.com/public?command=returnTicker";
$poloniexPrice = file_get_contents($poloniexBtcPrice);
$poloniexPriceJson = json_decode($poloniexPrice, true);

$btcPrice3 = ""; 
$ethPrice3 = "";
$trxPrice3 = "";

$btcVolume3 = "";
$ethVolume3 = "";
$trxVolume3 = "";

$btcChange3 = "";
$ethChange3 = "";
$trxChange3 = "";

foreach ($poloniexPriceJson as $key5 => $value5) {
	
	if ($value5["id"] == "121") {
		$btcPrice3 = $value5["last"];
		$btcVolume3 = $value5["baseVolume"];
		$btcChange3 = $value5["percentChange"];
	}elseif ($value5["id"] == "149") {
		$ethPrice3 = $value5["last"];
		$ethVolume3 = $value5["baseVolume"];
		$ethChange3 = $value5["percentChange"];
	}elseif ($value5["id"] == "265") {
		$trxPrice3 = $value5["last"];
		$trxVolume3 = $value5["baseVolume"];
		$trxChange3 = $value5["percentChange"];
	}
}

$poloniexOrderBookQueryBtc = "https://poloniex.com/public?command=returnOrderBook&currencyPair=USDT_BTC&depth=5"; #Poloniex Api Emir
$poloniexOrderBookQueryEth = "https://poloniex.com/public?command=returnOrderBook&currencyPair=USDT_ETH&depth=5";
$poloniexOrderBookQueryTrx = "https://poloniex.com/public?command=returnOrderBook&currencyPair=USDT_TRX&depth=5";

$poloniexOrderBook1 = file_get_contents($poloniexOrderBookQueryBtc);
$poloniexOrderBookJson1 = json_decode($poloniexOrderBook1, true);

$poloniexOrderBook2 = file_get_contents($poloniexOrderBookQueryEth);
$poloniexOrderBookJson2 = json_decode($poloniexOrderBook2, true);

$poloniexOrderBook3 = file_get_contents($poloniexOrderBookQueryTrx);
$poloniexOrderBookJson3 = json_decode($poloniexOrderBook3, true);

?>

<!DOCTYPE html>
<html lang="tr">

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<title>Mustafa Mert Kısa</title>
</head>

<body>
	
	<table class="paleBlueRows">
		<caption>Piyasalar</caption>
		<thead>
			<tr>
				<th>Kaynak</th>
				<th>Çiftler</th>
				<th>Fiyat $</th>
				<th>Hacim</th>
				<th>Günlük Değişim</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="column1">Binance</td>
				<td class="column2">BTC/USDT</td>
				<td class="column3">
					<?= "$btcPrice";?>
				</td>
				<td class="column4">
					<?= "$btcVolume";?>
				</td>
				<td class="column5">
					<?= "$btcChange";?>
				</td>
			</tr>
			<tr>
				<td class="column1">Binance</td>
				<td class="column2">ETH/USDT</td>
				<td class="column3">
					<?= "$ethPrice";?>
				</td>
				<td class="column4">
					<?= "$ethVolume";?>
				</td>
				<td class="column5">
					<?= "$ethChange";?>
				</td>
			</tr>
			<tr>
				<td class="column1">Binance</td>
				<td class="column2">TRX/USDT</td>
				<td class="column3">
					<?= "$trxPrice";?>
				</td>
				<td class="column4">
					<?= "$trxVolume";?>
				</td>
				<td class="column5">
					<?= "$trxChange";?>
				</td>
			</tr>

			<tr>
				<td class="column1">Kucoin</td>
				<td class="column2">BTC/USDT</td>
				<td class="column3">
					<?= "$btcPrice2";?>
				</td>
				<td class="column4">
					<?= "$btcVolume2";?>
				</td>
				<td class="column5">
					<?= "$btcChange2";?>
				</td>
			</tr>
			<tr>
				<td class="column1">Kucoin</td>
				<td class="column2">ETH/USDT</td>
				<td class="column3">
					<?= "$ethPrice2";?>
				</td>
				<td class="column4">
					<?= "$ethVolume2";?>
				</td>
				<td class="column5">
					<?= "$ethChange2";?>
				</td>
			</tr>
			<tr>
				<td class="column1">Kucoin</td>
				<td class="column2">TRX/USDT</td>
				<td class="column3">
					<?= "$trxPrice2";?>
				</td>
				<td class="column4">
					<?= "$trxVolume2";?>
				</td>
				<td class="column5">
					<?= "$trxChange2";?>
				</td>
			</tr>
			<tr></tr>
			<tr>
				<td class="column1">Poloniex</td>
				<td class="column2">BTC/USDT</td>
				<td class="column3">
					<?= "$btcPrice3";?>
				</td>
				<td class="column4">
					<?= "$btcVolume3";?>
				</td>
				<td class="column5">%
					<?= "$btcChange3";?>
				</td>
			</tr>

			<tr>
				<td class="column1">Poloniex</td>
				<td class="column2">ETH/USDT</td>
				<td class="column3">
					<?= "$ethPrice3";?>
				</td>
				<td class="column4">
					<?= "$ethVolume3";?>
				</td>
				<td class="column5">%
					<?= "$ethChange3";?>
				</td>
			</tr>
			<tr>
				<td class="column1">Poloniex</td>
				<td class="column2">TRX/USDT</td>
				<td class="column3">
					<?= "$trxPrice3";?>
				</td>
				<td class="column4">
					<?= "$trxVolume3";?>
				</td>
				<td class="column5">%
					<?= "$trxChange3";?>
				</td>
			</tr>

		</tbody>
		</tr>
	</table>

	<br><br><br>

	<table class="paleBlueRows">
		<caption>Binance Emir Geçmişi</caption>
		<thead>
			<tr>
				<th>Çiftler</th>
				<th>Alış Miktarı</th>
				<th>Alış Fiyatı $</th>
				<th>Satış Fiyatı $</th>
				<th>Satış Miktarı</th>
			</tr>
		</thead>
		<tbody>

			<tr>
				<td>BTC/USDT</td>
				<td>
					<?= $binanceOrderBookJson1["bids"][0][1] ?>
				</td>
				<td>
					<?= $binanceOrderBookJson1["bids"][0][0] ?>
				</td>
				<td>
					<?= $binanceOrderBookJson1["asks"][0][0] ?>
				</td>
				<td>
					<?= $binanceOrderBookJson1["asks"][0][1] ?>
				</td>
			</tr>
			<tr>
				<td>BTC/USDT</td>
				<td>
					<?= $binanceOrderBookJson1["bids"][1][1] ?>
				</td>
				<td>
					<?= $binanceOrderBookJson1["bids"][1][0] ?>
				</td>
				<td>
					<?= $binanceOrderBookJson1["asks"][1][0] ?>
				</td>
				<td>
					<?= $binanceOrderBookJson1["asks"][1][1] ?>
				</td>
			</tr>
			<tr>
				<td>BTC/USDT</td>
				<td>
					<?= $binanceOrderBookJson1["bids"][2][1] ?>
				</td>
				<td>
					<?= $binanceOrderBookJson1["bids"][2][0] ?>
				</td>
				<td>
					<?= $binanceOrderBookJson1["asks"][2][0] ?>
				</td>
				<td>
					<?= $binanceOrderBookJson1["asks"][2][1] ?>
				</td>
			</tr>

			<tr>
				<td>ETH/USDT</td>
				<td>
					<?= $binanceOrderBookJson2["bids"][0][1] ?>
				</td>
				<td>
					<?= $binanceOrderBookJson2["bids"][0][0] ?>
				</td>
				<td>
					<?= $binanceOrderBookJson2["asks"][0][0] ?>
				</td>
				<td>
					<?= $binanceOrderBookJson2["asks"][0][1] ?>
				</td>
			</tr>
			<tr>
				<td>ETH/USDT</td>
				<td>
					<?= $binanceOrderBookJson2["bids"][1][1] ?>
				</td>
				<td>
					<?= $binanceOrderBookJson2["bids"][1][0] ?>
				</td>
				<td>
					<?= $binanceOrderBookJson2["asks"][1][0] ?>
				</td>
				<td>
					<?= $binanceOrderBookJson2["asks"][1][1] ?>
				</td>
			</tr>
			<tr>
				<td>ETH/USDT</td>
				<td>
					<?= $binanceOrderBookJson2["bids"][2][1] ?>
				</td>
				<td>
					<?= $binanceOrderBookJson2["bids"][2][0] ?>
				</td>
				<td>
					<?= $binanceOrderBookJson2["asks"][2][0] ?>
				</td>
				<td>
					<?= $binanceOrderBookJson2["asks"][2][1] ?>
				</td>
			</tr>

			<tr>
				<td>TRX/USDT</td>
				<td>
					<?= $binanceOrderBookJson3["bids"][0][1] ?>
				</td>
				<td>
					<?= $binanceOrderBookJson3["bids"][0][0] ?>
				</td>
				<td>
					<?= $binanceOrderBookJson3["asks"][0][0] ?>
				</td>
				<td>
					<?= $binanceOrderBookJson3["asks"][0][1] ?>
				</td>
			</tr>
			<tr>
				<td>TRX/USDT</td>
				<td>
					<?= $binanceOrderBookJson3["bids"][1][1] ?>
				</td>
				<td>
					<?= $binanceOrderBookJson3["bids"][1][0] ?>
				</td>
				<td>
					<?= $binanceOrderBookJson3["asks"][1][0] ?>
				</td>
				<td>
					<?= $binanceOrderBookJson3["asks"][1][1] ?>
				</td>
			</tr>
			<tr>
				<td>TRX/USDT</td>
				<td>
					<?= $binanceOrderBookJson3["bids"][2][1] ?>
				</td>
				<td>
					<?= $binanceOrderBookJson3["bids"][2][0] ?>
				</td>
				<td>
					<?= $binanceOrderBookJson3["asks"][2][0] ?>
				</td>
				<td>
					<?= $binanceOrderBookJson3["asks"][2][1] ?>
				</td>
			</tr>

		</tbody>
		</tr>
	</table>

	<br><br>

	<table class="paleBlueRows">
		<caption>Kucoin Emir Geçmişi</caption>
		<thead>
			<tr>
				<th>Çiftler</th>
				<th>Alış Miktarı</th>
				<th>Alış Fiyatı $</th>
				<th>Satış Fiyatı $</th>
				<th>Satış Miktarı</th>
			</tr>
		</thead>
		<tbody>

			<tr>
				<td>BTC/USDT</td>
				<td>
					<?= $kucoinOrderBookJson1["data"]["bids"][0][1] ?>
				</td>
				<td>
					<?= $kucoinOrderBookJson1["data"]["bids"][0][0] ?>
				</td>
				<td>
					<?= $kucoinOrderBookJson1["data"]["asks"][0][0] ?>
				</td>
				<td>
					<?= $kucoinOrderBookJson1["data"]["asks"][0][1] ?>
				</td>
			</tr>
			<tr>
				<td>BTC/USDT</td>
				<td>
					<?= $kucoinOrderBookJson1["data"]["bids"][1][1] ?>
				</td>
				<td>
					<?= $kucoinOrderBookJson1["data"]["bids"][1][0] ?>
				</td>
				<td>
					<?= $kucoinOrderBookJson1["data"]["asks"][1][0] ?>
				</td>
				<td>
					<?= $kucoinOrderBookJson1["data"]["asks"][1][1] ?>
				</td>
			</tr>
			<tr>
				<td>BTC/USDT</td>
				<td>
					<?= $kucoinOrderBookJson1["data"]["bids"][2][1] ?>
				</td>
				<td>
					<?= $kucoinOrderBookJson1["data"]["bids"][2][0] ?>
				</td>
				<td>
					<?= $kucoinOrderBookJson1["data"]["asks"][2][0] ?>
				</td>
				<td>
					<?= $kucoinOrderBookJson1["data"]["asks"][2][1] ?>
				</td>
			</tr>

			<tr>
				<td>ETH/USDT</td>
				<td>
					<?= $kucoinOrderBookJson2["data"]["bids"][0][1] ?>
				</td>
				<td>
					<?= $kucoinOrderBookJson2["data"]["bids"][0][0] ?>
				</td>
				<td>
					<?= $kucoinOrderBookJson2["data"]["asks"][0][0] ?>
				</td>
				<td>
					<?= $kucoinOrderBookJson2["data"]["asks"][0][1] ?>
				</td>
			</tr>
			<tr>
				<td>ETH/USDT</td>
				<td>
					<?= $kucoinOrderBookJson2["data"]["bids"][1][1] ?>
				</td>
				<td>
					<?= $kucoinOrderBookJson2["data"]["bids"][1][0] ?>
				</td>
				<td>
					<?= $kucoinOrderBookJson2["data"]["asks"][1][0] ?>
				</td>
				<td>
					<?= $kucoinOrderBookJson2["data"]["asks"][1][1] ?>
				</td>
			</tr>
			<tr>
				<td>ETH/USDT</td>
				<td>
					<?= $kucoinOrderBookJson2["data"]["bids"][2][1] ?>
				</td>
				<td>
					<?= $kucoinOrderBookJson2["data"]["bids"][2][0] ?>
				</td>
				<td>
					<?= $kucoinOrderBookJson2["data"]["asks"][2][0] ?>
				</td>
				<td>
					<?= $kucoinOrderBookJson2["data"]["asks"][2][1] ?>
				</td>
			</tr>

			<tr>
				<td>TRX/USDT</td>
				<td>
					<?= $kucoinOrderBookJson3["data"]["bids"][0][1] ?>
				</td>
				<td>
					<?= $kucoinOrderBookJson3["data"]["bids"][0][0] ?>
				</td>
				<td>
					<?= $kucoinOrderBookJson3["data"]["asks"][0][0] ?>
				</td>
				<td>
					<?= $kucoinOrderBookJson3["data"]["asks"][0][1] ?>
				</td>
			</tr>
			<tr>
				<td>TRX/USDT</td>
				<td>
					<?= $kucoinOrderBookJson3["data"]["bids"][1][1] ?>
				</td>
				<td>
					<?= $kucoinOrderBookJson3["data"]["bids"][1][0] ?>
				</td>
				<td>
					<?= $kucoinOrderBookJson3["data"]["asks"][1][0] ?>
				</td>
				<td>
					<?= $kucoinOrderBookJson3["data"]["asks"][1][1] ?>
				</td>
			</tr>
			<tr>
				<td>TRX/USDT</td>
				<td>
					<?= $kucoinOrderBookJson3["data"]["bids"][2][1] ?>
				</td>
				<td>
					<?= $kucoinOrderBookJson3["data"]["bids"][2][0] ?>
				</td>
				<td>
					<?= $kucoinOrderBookJson3["data"]["asks"][2][0] ?>
				</td>
				<td>
					<?= $kucoinOrderBookJson3["data"]["asks"][2][1] ?>
				</td>
			</tr>

		</tbody>
		</tr>
	</table>

	<br><br>

	<table class="paleBlueRows">
		<caption>Poloniex Emir Geçmişi</caption>
		<thead>
			<tr>
				<th>Çiftler</th>
				<th>Alış Miktarı</th>
				<th>Alış Fiyatı $</th>
				<th>Satış Fiyatı $</th>
				<th>Satış Miktarı</th>
			</tr>
		</thead>
		<tbody>

			<tr>
				<td>BTC/USDT</td>
				<td>
					<?= $poloniexOrderBookJson1["bids"][0][1] ?>
				</td>
				<td>
					<?= $poloniexOrderBookJson1["bids"][0][0] ?>
				</td>
				<td>
					<?= $poloniexOrderBookJson1["asks"][0][0] ?>
				</td>
				<td>
					<?= $poloniexOrderBookJson1["asks"][0][1] ?>
				</td>
			</tr>
			<tr>
				<td>BTC/USDT</td>
				<td>
					<?= $poloniexOrderBookJson1["bids"][1][1] ?>
				</td>
				<td>
					<?= $poloniexOrderBookJson1["bids"][1][0] ?>
				</td>
				<td>
					<?= $poloniexOrderBookJson1["asks"][1][0] ?>
				</td>
				<td>
					<?= $poloniexOrderBookJson1["asks"][1][1] ?>
				</td>
			</tr>
			<tr>
				<td>BTC/USDT</td>
				<td>
					<?= $poloniexOrderBookJson1["bids"][2][1] ?>
				</td>
				<td>
					<?= $poloniexOrderBookJson1["bids"][2][0] ?>
				</td>
				<td>
					<?= $poloniexOrderBookJson1["asks"][2][0] ?>
				</td>
				<td>
					<?= $poloniexOrderBookJson1["asks"][2][1] ?>
				</td>
			</tr>

			<tr>
				<td>ETH/USDT</td>
				<td>
					<?= $poloniexOrderBookJson2["bids"][0][1] ?>
				</td>
				<td>
					<?= $poloniexOrderBookJson2["bids"][0][0] ?>
				</td>
				<td>
					<?= $poloniexOrderBookJson2["asks"][0][0] ?>
				</td>
				<td>
					<?= $poloniexOrderBookJson2["asks"][0][1] ?>
				</td>
			</tr>
			<tr>
				<td>ETH/USDT</td>
				<td>
					<?= $poloniexOrderBookJson2["bids"][1][1] ?>
				</td>
				<td>
					<?= $poloniexOrderBookJson2["bids"][1][0] ?>
				</td>
				<td>
					<?= $poloniexOrderBookJson2["asks"][1][0] ?>
				</td>
				<td>
					<?= $poloniexOrderBookJson2["asks"][1][1] ?>
				</td>
			</tr>
			<tr>
				<td>ETH/USDT</td>
				<td>
					<?= $poloniexOrderBookJson2["bids"][2][1] ?>
				</td>
				<td>
					<?= $poloniexOrderBookJson2["bids"][2][0] ?>
				</td>
				<td>
					<?= $poloniexOrderBookJson2["asks"][2][0] ?>
				</td>
				<td>
					<?= $poloniexOrderBookJson2["asks"][2][1] ?>
				</td>
			</tr>

			<tr>
				<td>TRX/USDT</td>
				<td>
					<?= $poloniexOrderBookJson3["bids"][0][1] ?>
				</td>
				<td>
					<?= $poloniexOrderBookJson3["bids"][0][0] ?>
				</td>
				<td>
					<?= $poloniexOrderBookJson3["asks"][0][0] ?>
				</td>
				<td>
					<?= $poloniexOrderBookJson3["asks"][0][1] ?>
				</td>
			</tr>
			<tr>
				<td>TRX/USDT</td>
				<td>
					<?= $poloniexOrderBookJson3["bids"][1][1] ?>
				</td>
				<td>
					<?= $poloniexOrderBookJson3["bids"][1][0] ?>
				</td>
				<td>
					<?= $poloniexOrderBookJson3["asks"][1][0] ?>
				</td>
				<td>
					<?= $poloniexOrderBookJson3["asks"][1][1] ?>
				</td>
			</tr>
			<tr>
				<td>TRX/USDT</td>
				<td>
					<?= $poloniexOrderBookJson3["bids"][2][1] ?>
				</td>
				<td>
					<?= $poloniexOrderBookJson3["bids"][2][0] ?>
				</td>
				<td>
					<?= $poloniexOrderBookJson3["asks"][2][0] ?>
				</td>
				<td>
					<?= $poloniexOrderBookJson3["asks"][2][1] ?>
				</td>
			</tr>

		</tbody>
		</tr>
	</table>

</body>

</html>