[![Latest Version on Packagist](https://img.shields.io/packagist/v/7Lab/laravel-or-abourt.svg?style=flat-square)](https://packagist.org/packages/7Lab/laravel-or-abourt)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/7Lab/laravel-or-abourt.svg?style=flat-square)](https://packagist.org/packages/7Lab/laravel-or-abourt)

# Or abort
This Laravel package exposes a trait for your Eloquent models. After adding the trait you can use `findOrAbort` and `FirstOrAbort` just like `findOrFail` and `firstOrFail`. Instead of throwing an exception, the Laravel abort function is called.

## Installation
You can install the package via Composer:
```bash
composer require 7Lab/laravel-or-abort
```

Just add the trait to your Eloquent (base)model: 
```php
...
use SevenLab\OrAbort\OrAbort;

class Post extends Model
{
    use OrAbort;

...
```

## Usage
After adding the trait, just use the two new functions:
```php

$post = Post::findOrAbort(1);

$mostPopularPost = Post::orderBy('views', 'asc')->firstOrAbort();

```