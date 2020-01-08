## T.C. Kimlik numarası doğrulama ve sorgulama

> "Algoritmik kontrol" ve "API üzerinden veri doğruluk kontrolü" olarak iki kısımdan oluşan "T.C. Kimlik numarası doğrulama ve sorgulama" sınıfı.

----------

### Özellikler

- PSR-0
- T.C. Kimlik numarası algoritmik kontrol
- API üzerinden T.C. Kimlik numarası veri doğruluk kontrolü

### Kullanım

#### Algoritmik doğrulama

```php
$check = TcCheck::verify($bilgi['tckimlikno']);
var_dump($check);
```

#### Veri doğruluk kontrolü

```php	
$data = array(
	'tcno'			=> 'xxxxxxxxxxx',	// T.C. kimlik Numarası (11 haneli ve rakamlardan oluşmaladır)
	'isim'			=> 'XXXXX', 		// Doğrulanacak kişinin adı, tümü büyük harf (iki isme sahip kişilerin iki ismide yazılmalı)
	'soyisim'		=> 'XXXXX', 		// Doğrulanacak kişinin soyadı, tümü büyük harf
	'dogumyili'		=> '19xx', 			// Doğum yılı (4 haneli ve rakamlardan oluşmalıdır)
);
$check = TcCheck::check($data);
var_dump($check);
```

### Lisans

Açık kaynaklı olan bu proje [MIT lisansı][mit-url] ile lisanslanmıştır.
