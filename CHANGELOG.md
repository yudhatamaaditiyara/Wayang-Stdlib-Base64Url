# 1.1.1 - 2021-01-28

- refactor: append padding after replaced base64Url string
- docs: update `CHANGELOG.md`
- docs: rename alt text `packagist` and `ci` badge
- docs: remove `license` badge

# 1.1.0 - 2021-01-26

- feat: add class `Wayang\Stdlib\Base64Url\Factory`
- feat: add class method `convertBase64ToBase64Url` to `Wayang\Stdlib\Base64Url\Base64Url`
- feat: add class method `convertBase64UrlToBase64` to `Wayang\Stdlib\Base64Url\Base64Url`
- feat: add class method `appendPaddingToBase64Url` to `Wayang\Stdlib\Base64Url\Base64Url`
- feat: add interface method `convertBase64ToBase64Url` to `Wayang\Stdlib\Base64Url\Base64UrlInterface`
- feat: add interface method `convertBase64UrlToBase64` to `Wayang\Stdlib\Base64Url\Base64UrlInterface`
- feat: add interface method `appendPaddingToBase64Url` to `Wayang\Stdlib\Base64Url\Base64UrlInterface`
- feat: add class `Wayang\Stdlib\Base64Url\Exception\Base64UrlException`
- feat: add interface `Wayang\Stdlib\Base64Url\Exception\ExceptionInterface`
- refactor: change throw exception `RuntimeException` to `Wayang\Stdlib\Base64Url\Exception\Base64UrlException`
- fix: append padding to base64Url string
- build: upgrade php `>=7.2.5`

# 1.0.0 - 2019-07-12

- Initial release