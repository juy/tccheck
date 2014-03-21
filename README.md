## T.C. Kimlik numarası doğrulama ve sorgulama
[![Latest Stable Version][version-img]][version-url] [![Latest Unstable Version][unstable-img]][unstable-url] [![Total Downloads] [downloads-img]][downloads-url] [![License][license-img]][license-url]

"Algoritmik kontrol" ve "API üzerinden veri doğruluk kontrolü" olarak iki kısımdan oluşan "T.C. Kimlik numarası doğrulama ve sorgulama" sınıfı.

## Projeyi destekleyin
Bu ve diğer projelerimize destek vermek isterseniz, [PayPal][paypal-donate-url] veya [Gittip][gittip-donate-url] üzerinden bağışta bulunabilirsiniz.

[![PayPal ile destek][paypal-donate-img]][paypal-donate-url] [![Gittip ile destek][gittip-donate-img]][gittip-donate-url]

----------
## Özellikler

- PSR-0
- T.C. Kimlik numarası algoritmik kontrol
- API üzerinden T.C. Kimlik numarası veri doğruluk kontrolü

## Kullanım

### Algoritmik doğrulama
```php
$check = TcCheck::verify($bilgi['tckimlikno']);
var_dump($check);
```

### Veri doğruluk kontrolü
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

## Lisans
Açık kaynaklı olan bu proje [MIT lisansı][mit-url] ile lisanslanmıştır.

[version-img]: https://poser.pugx.org/juy/tccheck/v/stable.png
[version-url]: https://packagist.org/packages/juy/tccheck
[unstable-img]: https://poser.pugx.org/juy/tccheck/v/unstable.png
[unstable-url]: https://packagist.org/packages/juy/tccheck
[downloads-img]: https://poser.pugx.org/juy/tccheck/downloads.png
[downloads-url]: https://packagist.org/packages/juy/tccheck
[license-img]: https://poser.pugx.org/juy/tccheck/license.png
[license-url]: https://packagist.org/packages/juy/tccheck

[paypal-donate-img]: http://img.shields.io/badge/PayPal-donate-brightgreen.svg
[paypal-donate-url]: http://j.mp/1hON5YR
[gittip-donate-img]: http://img.shields.io/badge/Gittip-donate-brightgreen.svg
[gittip-donate-url]: https://www.gittip.com/angelside

[mit-url]: http://opensource.org/licenses/MIT