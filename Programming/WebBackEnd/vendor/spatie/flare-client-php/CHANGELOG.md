# Changelog

All notable changes to `flare-client-php` will be documented in this file

## 1.4.0 - 2023-06-28

- Add support for stack trace arguments

## 1.3.6 - 2023-04-12

- recognise AI generated solutions

## 1.3.5 - 2023-01-23

### What's Changed

- Update composer.json by @driesvints in https://github.com/spatie/flare-client-php/pull/3
- Prepare for Laravel 10 by @freekmurze in https://github.com/spatie/flare-client-php/pull/13

### New Contributors

- @driesvints made their first contribution in https://github.com/spatie/flare-client-php/pull/3

**Full Changelog**: https://github.com/spatie/flare-client-php/compare/1.3.2...1.3.5

## 1.3.4 - 2023-01-23

- prep for Laravel 10

## 1.3.3 - 2023-01-23

- prepare for Laravel 10

**Full Changelog**: https://github.com/spatie/flare-client-php/compare/1.3.2...1.3.3

## 1.3.2 - 2022-12-26

- reset glows

**Full Changelog**: https://github.com/spatie/flare-client-php/compare/1.3.1...1.3.2

## 1.3.1 - 2022-11-16

### What's Changed

- Bug: Correct report sending logic by @Jellyfrog in https://github.com/spatie/flare-client-php/pull/11

**Full Changelog**: https://github.com/spatie/flare-client-php/compare/1.3.0...1.3.1

## 1.3.0 - 2022-08-08

### What's Changed

- Allow `reportErrorLevels` to be 0 by @Jellyfrog in https://github.com/spatie/flare-client-php/pull/9
- Add support for filtering reports before sending to Flare by @Jellyfrog in https://github.com/spatie/flare-client-php/pull/10

### New Contributors

- @Jellyfrog made their first contribution in https://github.com/spatie/flare-client-php/pull/9

**Full Changelog**: https://github.com/spatie/flare-client-php/compare/1.2.0...1.3.0

## 1.2.0 - 2022-05-16

- Add `php_version` as default `env` context

**Full Changelog**: https://github.com/spatie/flare-client-php/compare/1.1.1...1.2.0

## 1.1.1 - 2022-05-11

## What's Changed

- Flat map request headers for PSR request context (47302e83d1b212ebc682bd18d7c27b8027db6c4e)
- Update .gitattributes by @angeljqv in https://github.com/spatie/flare-client-php/pull/6

## New Contributors

- @angeljqv made their first contribution in https://github.com/spatie/flare-client-php/pull/6

**Full Changelog**: https://github.com/spatie/flare-client-php/compare/1.1.0...1.1.1

## 1.1.0 - 2022-03-11

- Allow passing an initialised `Report` instance to `report()` to Flare

**Full Changelog**: https://github.com/spatie/flare-client-php/compare/1.0.5...1.1.0

## 1.0.5 - 2022-03-01

- Fix exception when `stage` is `null`

**Full Changelog**: https://github.com/spatie/flare-client-php/compare/1.0.4...1.0.5

## 1.0.4 - 2022-02-28

## What's Changed

- catch throwable instead of exception for getSession failure by @ZeoKnight in https://github.com/spatie/flare-client-php/pull/5

## New Contributors

- @ZeoKnight made their first contribution in https://github.com/spatie/flare-client-php/pull/5

**Full Changelog**: https://github.com/spatie/flare-client-php/compare/1.0.3...1.0.4

## 1.0.3 - 2022-02-25

## What's Changed

- Remove `arguments` from stacktrace frames (unused in UI and causing issues, see https://github.com/spatie/ignition/issues/48)
- Update .gitattributes by @PaolaRuby in https://github.com/spatie/flare-client-php/pull/4

## New Contributors

- @PaolaRuby made their first contribution in https://github.com/spatie/flare-client-php/pull/4

**Full Changelog**: https://github.com/spatie/flare-client-php/compare/1.0.2...1.0.3

## 1.0.2 - 2022-02-16

- avoid crash git info middleware

## 1.0.1 - 2022-02-04

- Add censor request headers middleware

## 1.0.0 - 2022-01-18

- initial release
