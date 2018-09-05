# Laravel Conditional Providers

[![Latest stable release][version-badge]][link-packagist]
[![Software license][license-badge]](LICENSE.md)
[![Build status][travis-badge]][link-travis]
[![Total downloads][downloads-badge]][link-packagist]

[![Read my blog][blog-link-badge]][link-blog]
[![View my other packages and projects][packages-link-badge]][link-packages]
[![Follow @sebastiaanluca on Twitter][twitter-profile-badge]][link-twitter]
[![Share this package on Twitter][twitter-share-badge]][link-twitter-share]

__Load Laravel service providers and facades based on the current environment.__

Specify the service providers and facades to load per environment directly in your configuration file. No more need to add lengthy blocks of conditionals to your `AppServiceProvider`, do it all in the app configuration file like you would with any service provider and facade!

Inspired by [Matt Staufer](https://mattstauffer.co/blog/conditionally-loading-service-providers-in-laravel-5), [Sven Luijten](https://github.com/svenluijten/env-providers), and others.

## Table of contents

- [What does it solve?](#what-does-it-solve)
- [Requirements](#requirements)
- [How to install](#how-to-install)
- [How to use](#how-to-use)
    - [Conditional providers](#conditional-providers)
    - [Conditional aliases](#conditional-aliases)
- [License](#license)
- [Change log](#change-log)
- [Testing](#testing)
- [Contributing](#contributing)
- [Security](#security)
- [Credits](#credits)
- [About](#about)

## What does it solve?

Say you're using a package like [barryvdh/laravel-ide-helper](https://github.com/barryvdh/laravel-ide-helper) in your project. If you've followed its installation instructions and require it only in development environments (like you should), you'd do the following:

```bash
composer require barryvdh/laravel-ide-helper --dev
```

And then add the service provider to your app's config providers array:

```php
'providers' => [

    Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class,

]
```

Now when you run `composer install --no-dev` in your production environment to install all but development packages, this will throw an exception. Laravel will try to load the registered service provider class which it can't find, because the package is not installed.

```
[Symfony\Component\Debug\Exception\FatalThrowableError]
Class 'Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider' not found
```

Of course you can —per the instructions— conditionally load the provider manually in the register method of the `app/Providers/AppServiceProvider.php` file:

```php
public function register()
{
    if ($this->app->environment() !== 'production') {
        $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
    }
}
```

But you'd have to do this for each development package and each environment you don't want it loaded in, which is hardly maintainable and pollutes your application-specific code.

Enter Laravel conditional providers [to easily do all of this](#how-to-use) in your main application config file!

## Requirements

- PHP 7.2 or higher
- Laravel 5.7 or higher

## How to install

```bash
composer require sebastiaanluca/laravel-conditional-providers
```

## How to use

### Conditional providers

Disable Laravel service provider auto-discovery by adding it to your composer.json relevant section.

Once you're set up, simply __add a providers array per environment__ to your `config/app.php` file:

```php
'providers' => [

    // Contains your global providers which will load in any environment

],

'local_providers' => [

    // Contains your 'local' environment providers

    // Mostly used to load debug helpers, optimization tools, et cetera

    Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class,
    Barryvdh\Debugbar\ServiceProvider::class,

],

'production_providers' => [

    // Contains your 'production' environment providers

    // Great for when you only want to get analytics or
    // bug reports in production and disable the provider
    // entirely when developing.

],
```

Each providers key is __optional__ and can be empty —so you could just use the `local_providers` array or none at all.

The example above will do the following in a `local` environment:

- Load every provider from `providers`
- Load every provider from `local_providers`
- Ignore everything in `production_providers`

All done! Now your app service provider is clean and you get a better view on what's loaded and when, with the added benefit of enabling or disabling packages based on environment.

### Conditional aliases

In addition to conditionally loading providers, this workflow is also available for aliases/facades. __Add a facades/aliases array per environment__ to your `config/app.php` file like so:

```php
'aliases' => [

    // Contains your global aliases which will load in any environment

],

'local_aliases' => [

    // Contains your 'local' environment aliases/facades

    'Debugbar' => Barryvdh\Debugbar\Facade::class,

],

'production_aliases' => [

    // Contains your 'production' environment aliases/facades

],
```

That's it! This will load the `Debugbar` facade only in the local environment.

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

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CODE_OF_CONDUCT.md) for details.

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
