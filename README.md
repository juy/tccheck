## T.C. Kimlik numarası doğrulama ve sorgulama
[![License][license-img]][license-url] [![Total Downloads] [downloads-img]][downloads-url]

> "Algoritmik kontrol" ve "API üzerinden veri doğruluk kontrolü" olarak iki kısımdan oluşan "T.C. Kimlik numarası doğrulama ve sorgulama" sınıfı.

### Projeyi destekleyin
Bu ve diğer projelerimize destek vermek isterseniz, [PayPal][paypal-donate-url] üzerinden bağışta bulunabilirsiniz.

[![PayPal ile destek][paypal-donate-img]][paypal-donate-url]

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

[license-img]: https://img.shields.io/packagist/l/juy/tccheck.svg?style=flat-square
[license-url]: https://packagist.org/packages/juy/tccheck
[downloads-img]: https://img.shields.io/packagist/dt/juy/tccheck.svg?style=flat-square
[downloads-url]: https://packagist.org/packages/juy/tccheck

[paypal-donate-img]: https://img.shields.io/badge/PayPal-donate-brightgreen.svg?style=flat-square
[paypal-donate-url]: http://bit.ly/donateAngelside

[mit-url]: http://opensource.org/licenses/MIT
