# T.C. Kimlik numarası doğrulama ve sorgulama #
Bilgiler üzerinde herhangi bir kontrol (validation) yapılmaz, doğrulma sorgulamadan önce yapılmalıdır.

## Özellikler ##

- T.C. Kimlik numarası algoritmik doğrulama
- API üzerinden T.C. Kimlik numarası veri doğruluk kontrolü

## Kullanım ##

### Algoritmik doğrulama ###

	$check = TcCheck::verify($bilgi['tckimlikno']);
	var_dump($check);

### Veri doğruluk kontrolü ###
	
	$data = array(
		'tcno'			=> 'xxxxxxxxxxx',	// T.C. kimlik Numarası (11 haneli ve rakamlardan oluşmaladır)
		'isim'			=> 'XXXXX', 		// Doğrulanacak kişinin adı, tümü büyük harf (iki isme sahip kişilerin iki ismide yazılmalı)
		'soyisim'		=> 'XXXXX', 		// Doğrulanacak kişinin soyadı, tümü büyük harf
		'dogumyili'		=> '19xx', 			// Doğum yılı (4 haneli ve rakamlardan oluşmalıdır)
	);
	$check = TcCheck::check($data);
	var_dump($check);