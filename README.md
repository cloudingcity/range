# Range

![](https://img.shields.io/packagist/php-v/clouding/range.svg?style=flat-square)
![](https://img.shields.io/packagist/v/clouding/range.svg?style=flat-square)
[![](https://img.shields.io/travis/com/cloudingcity/kata.svg?style=flat-square)](https://travis-ci.com/cloudingcity/range)
[![](https://img.shields.io/codecov/c/github/cloudingcity/kata.svg?style=flat-square)](https://codecov.io/gh/cloudingcity/range)

A simple library for **Range** object.

## Installation

```
composer require clouding/range
```
## Usage

Create a Range object with start and end:
```php
use Clouding\Range\Range;

$range = new Range(1, 10);
```

Get start and end:
```php
echo $range->start; // 1

echo $range->end;   // 10
```

Determine range contains integer or not:
```php
var_dump($range->contains(5));       // bool(true)

var_dump($range->isNotContains(15)); // bool(true)
```

Determine two range object is equals or not:
```php
$rangeFoo = new Range(1, 10);

var_dump($range->equals($rangeFoo));      // bool(true)

var_dump($range->isNotEquals($rangeFoo)); // bool(false)
```
