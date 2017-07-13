# Laravel Conditional Providers

[![Latest stable release][version-badge]][link-packagist]
[![Software license][license-badge]](LICENSE.md)
[![Build status][travis-badge]][link-travis]
[![Total downloads][downloads-badge]][link-packagist]

[![Read my blog][blog-link-badge]][link-blog]
[![View my other packages and projects][packages-link-badge]][link-packages]
[![Follow @sebastiaanluca on Twitter][twitter-profile-badge]][link-twitter]
[![Share this package on Twitter][twitter-share-badge]][link-twitter-share]

__Load Laravel service providers based on the current environment.__

Specify the service providers to load per environment directly in your configuration file. No more need to add lengthy blocks of conditionals to your `AppServiceProvider`, do it all in the app configuration file like you would with any service provider!

Inspired by [Matt Staufer](https://mattstauffer.co/blog/conditionally-loading-service-providers-in-laravel-5) and others. 

## Table of contents

TODO

## Requirements

- PHP 7 or higher
- Laravel 5.4 or higher

## How to install

### Laravel 5.5

From Laravel 5.5 and onwards, this package supports auto-discovery. Just add the package to your project using composer and you're good to go!

```bash
composer require sebastiaanluca/laravel-conditional-providers
```

### Laravel 5.4

Install the package through Composer by using the following command:

```bash
composer require sebastiaanluca/laravel-conditional-providers
```

Add the service provider to the `providers` array in your `config/app.php` file:

```php
'providers' => [

    SebastiaanLuca\ConditionalProviders\Providers\ConditionalProvidersServiceProvider::class,

]
```

## How to use

TODO

## License

This package operates under the MIT License (MIT). Please see [LICENSE](LICENSE.md) for more information.

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
composer install
composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email [hello@sebastiaanluca.com][link-author-email] instead of using the issue tracker.

## Credits

- [Sebastiaan Luca][link-github-profile]
- [All Contributors][link-contributors]

## About

My name is Sebastiaan and I'm a freelance Laravel developer specializing in building custom Laravel applications. Check out my [portfolio][link-portfolio] for more information, [my blog][link-blog] for the latest tips and tricks, and my other [packages][link-packages] to kick-start your next project.

Have a project that could use some guidance? Send me an e-mail at [hello@sebastiaanluca.com][link-author-email]!

[version-badge]: https://poser.pugx.org/sebastiaanluca/laravel-conditional-providers/version
[license-badge]: https://img.shields.io/badge/license-MIT-brightgreen.svg
[travis-badge]: https://img.shields.io/travis/sebastiaanluca/laravel-conditional-providers/master.svg
[downloads-badge]: https://img.shields.io/packagist/dt/sebastiaanluca/laravel-conditional-providers.svg

[blog-link-badge]: https://img.shields.io/badge/link-blog-lightgrey.svg
[packages-link-badge]: https://img.shields.io/badge/link-other_packages-lightgrey.svg
[twitter-profile-badge]: https://img.shields.io/twitter/follow/sebastiaanluca.svg?style=social
[twitter-share-badge]: https://img.shields.io/twitter/url/http/shields.io.svg?style=social

[link-packagist]: https://packagist.org/packages/sebastiaanluca/laravel-conditional-providers
[link-travis]: https://travis-ci.org/sebastiaanluca/laravel-conditional-providers
[link-contributors]: ../../contributors

[link-portfolio]: https://www.sebastiaanluca.com
[link-blog]: https://blog.sebastiaanluca.com
[link-packages]: https://packagist.org/packages/sebastiaanluca
[link-twitter]: https://twitter.com/sebastiaanluca
[link-twitter-share]: https://twitter.com/intent/tweet?text=Load%20Laravel%20service%20providers%20based%20on%20the%20current%20environment.%20https%3A%2F%2Fgithub.com%2Fsebastiaanluca%2Flaravel-helpers%20via%20%40sebastiaanluca
[link-github-profile]: https://github.com/sebastiaanluca
[link-author-email]: mailto:hello@sebastiaanluca.com
