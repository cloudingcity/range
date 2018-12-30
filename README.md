# Range

![](https://img.shields.io/badge/language-php-blue.svg?style=flat-square)
[![](https://img.shields.io/travis/com/cloudingcity/kata.svg?style=flat-square)](https://travis-ci.com/cloudingcity/range)
[![](https://img.shields.io/codecov/c/github/cloudingcity/kata.svg?style=flat-square)](https://codecov.io/gh/cloudingcity/range)

A simple library for **Range** object.

## Usage

Create a Range object with start and end:
```php
use Clouding\Range\Range;

$range = new Range(1, 10);
```

Get start and end:
```php
echo $range->start(); // 1

echo $range->end(); // 10
```

Determine range contains integer or not:
```php
var_dump($range->contains(5)); // true

var_dump($range->isNotContains(15)); // true
```
