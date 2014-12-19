# Phprest Request Filter Service

[![Author](http://img.shields.io/badge/author-@adammbalogh-blue.svg?style=flat-square)](https://twitter.com/adammbalogh)
[![Software License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](LICENSE)

# Description

Request Filter Service which is able to filter your incoming request by:
* query
* sort
* limit
* offset

## Components

There are 3 main component in filtering:
* Obtainer
* Parser
* Processor

### Obtainer

Is the way as you get the filtering key and its data from the request.

E.g.: [QueryInHeader Obtainer](src/Implementation/Query/Obtainer/QueryInHeader.php)

### Parser

Is the way how you analyze the obtained filter.

E.g.: [CommaMinus Parser](src/Implementation/Sort/Parser/CommaMinus.php)

### Processor

Which is processing your parsed filter.

E.g.: [Orm Processor](src/Processor/Orm.php)

# Installation

Install it through composer.

```json
{
    "require": {
        "phprest/phprest-service-request-filter": "@stable"
    }
}
```

**tip:** you should browse the [`phprest/phprest-service-request-filter`](https://packagist.org/packages/phprest/phprest-service-request-filter)
page to choose a stable version to use, avoid the `@stable` meta constraint.

# Usage

## Configuration

For the configuration you should check the [Config](src/Config.php) class.

## Registration

```php
<?php
use Phprest\Service\RequestFilter;
# ...
/** @var \Phprest\Application $app */

$app->registerService(new RequestFilter\Service(), new RequestFilter\Config());
# ...
```

## Reaching from a Controller

To reach your Service from a Controller you should use the Service's [Getter](src/Getter.php) Trait.

```php
<?php namespace App\Module\Controller;

use Phprest\Service;

class Index extends \Phprest\Util\Controller
{
    use Service\RequestFilter\Getter;

    public function get(Request $request)
    {
        $this->serviceRequestFilter()->processQuery(...);
    }
}
```

## Utils

Most of the Services in Phprest provides some utility mechanism (helper functions).

For the utilities you should check the [Util](src/Util.php) class.

## Example

With the Orm Processor.

```php
<?php namespace App\Module\Controller;

use Phprest\Service;
use Doctrine\Common\Collections\Criteria;

class Index extends \Phprest\Util\Controller
{
    use Service\RequestFilter\Getter;
    use Service\RequestFilter\Util;

    public function getAll(Request $request)
    {
        $processor = new Service\RequestFilter\Processor\Orm(Criteria::create());
        
        try {
            $this->serviceRequestFilter()->processQuery($request, $processor);
            $this->serviceRequestFilter()->processSort($request, $processor);
        } catch (\Exception $e) {
            throw new Exception\BadRequest(0, [$e->getMessage()]);
        }
    }
}
```
