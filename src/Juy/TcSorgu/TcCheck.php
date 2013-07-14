<?php namespace Juy\TcCheck;

/**
 * T.C. Kimlik numarası doğrulama ve sorgulama
 *		Bilgiler üzerinde herhangi bir kontrol (validation) yapılmaz,
 *		doğrulma sorgulamadan önce yapılmalıdır.
 */
class TcCheck {

// FIXME: sorgulama yapmadan önce doğrulama yapılmalıdır

	/**
	 * API üzerinden T.C. Kimlik numarası sorgulama
	 *
	 * 		// Kullanım

	 		$data = array(
				'tcno'			=> 'xxxxxxxxxxx',	// T.C. kimlik Numarası (11 haneli ve rakamlardan oluşmaladır)
	 			'isim'			=> 'XXXXX', 		// Doğrulanacak kişinin adı, tümü büyük harf (iki isme sahip kişilerin iki ismide yazılmalı)
	 			'soyisim'		=> 'XXXXX', 		// Doğrulanacak kişinin soyadı, tümü büyük harf
	 			'dogumyili'		=> '19xx', 			// Doğum yılı (4 haneli ve rakamlardan oluşmalıdır)
	 		);
	 		$check = TcCheck::check($data);
	 		var_dump($check);
	 *
	 * @param array $data
	 * @return bool
	 */
	public static function check($data)
	{
		$post_data = '<?xml version="1.0" encoding="utf-8"?>
		<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
			<soap:Body>
				<TCKimlikNoDogrula xmlns="http://tckimlik.nvi.gov.tr/WS">
					<TCKimlikNo>'.$data['tcno'].'</TCKimlikNo>
					<Ad>'.$data['isim'].'</Ad>
					<Soyad>'.$data['soyisim'].'</Soyad>
					<DogumYili>'.$data['dogumyili'].'</DogumYili>
				</TCKimlikNoDogrula>
			</soap:Body>
		</soap:Envelope>';

		$ch = curl_init();

		// CURL options
		$options = array(
			CURLOPT_URL				=> 'https://tckimlik.nvi.gov.tr/Service/KPSPublic.asmx',
			CURLOPT_POST			=> TRUE,
			CURLOPT_POSTFIELDS		=> $post_data,
			CURLOPT_RETURNTRANSFER	=> TRUE,
			CURLOPT_SSL_VERIFYPEER	=> FALSE,
			CURLOPT_HEADER			=> FALSE,
			CURLOPT_HTTPHEADER		=> array(
					'POST /Service/KPSPublic.asmx HTTP/1.1',
					'Host: tckimlik.nvi.gov.tr',
					'Content-Type: text/xml; charset=utf-8',
					'SOAPAction: "http://tckimlik.nvi.gov.tr/WS/TCKimlikNoDogrula"',
					'Content-Length: '.strlen($post_data)
			),
		);
		curl_setopt_array($ch, $options);

		$response = curl_exec($ch);
		curl_close($ch);

		return (strip_tags($response) === 'true') ? TRUE : FALSE;
	}

	/**
	 * T.C. Kimlik numarası doğrulama algoritması
	 *
	 *		// Kullanım
			$check = TcCheck::verify($bilgi['tckimlikno']);
			var_dump($check);
	 *
	 * @param int $tcno
	 * @return bool
	 */
	public static function verify($tcno)
	{
		// 11 hane olmalı
		if (strlen($tcno) != 11) 
		{
			return FALSE;
		}

		// 
		if (!preg_match('/(?<!\S)\d++(?!\S)/', $tcno))
		{
			return FALSE;
		}

		$digit = preg_split('//', $tcno, -1, PREG_SPLIT_NO_EMPTY);

		if ($digit[0] == 0)
		{
			return FALSE;
		}

		$odd = $digit[0] + $digit[2] + $digit[4] + $digit[6] + $digit[8];
		$even = $digit[1] + $digit[3] + $digit[5] + $digit[7];
		$digit10 = ($odd * 7 - $even) % 10;
		$total = ($odd + $even + $digit[9]) % 10;

		if ($digit10 != $digit[9] OR $total != $digit[10])
		{
			return FALSE;
		}

		return TRUE;
	}

}
