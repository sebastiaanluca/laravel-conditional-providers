# Changelog

All Notable changes to `sebastiaanluca/laravel-conditional-providers` will be documented in this file.

Updates should follow the [Keep a CHANGELOG](http://keepachangelog.com/) principles.

## Unreleased

## 2.0.1 (2018-09-04)

### Added

- Code analyses

### Changed

- Renamed `phpunit.xml`

### Fixed

- Don't test against Laravel 5.6
- Fix laravel/framework version requirement
- Optimized code using static code analyses

## 2.0.0 (2018-09-04)

### Added

- Run tests against Laravel 5.7

### Changed

- Formatted tests

### Removed

- Removed support for PHP 7.1 and lower
- Removed support for Laravel 5.6 and lower

## 1.1.0 (2017-07-19)

- Added conditional loading of aliases (facades)
- Refactored and fixed tests

## 1.0.0 (2017-07-13)

### Added

- Added the conditional environment service provider
- Set up test environment and added tests
- Written readme and guidelines
- Added Laravel 5.5 auto-discovery

### Changed

- Renamed service provider to `\SebastiaanLuca\ConditionalProviders\ConditionalProvidersServiceProvider`
