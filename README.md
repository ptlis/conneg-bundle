# ConNeg Bundle


A Symfony2 Bundle providing content negotiation services you your application, built for PHP >= 5.3 using the [ptlis/ConNeg](https://github.com/ptlis/conneg) packages.

[![Build Status](https://travis-ci.org/ptlis/conneg-bundle.png?branch=master)](https://travis-ci.org/ptlis/conneg-bundle) [![Code Coverage](https://scrutinizer-ci.com/g/ptlis/conneg-bundle/badges/coverage.png?s=38ad9458830dccd8bce51a4078c2faa259f8fcaf)](https://scrutinizer-ci.com/g/ptlis/conneg-bundle/) [![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/ptlis/conneg-bundle/badges/quality-score.png?s=4c8c1c746a83a5e7377f06df3c5072691976671e)](https://scrutinizer-ci.com/g/ptlis/conneg-bundle/) [![Latest Stable Version](https://poser.pugx.org/ptlis/conneg-bundle/v/stable.png)](https://packagist.org/packages/ptlis/conneg-bundle)


## Installation

### Add Dependency

From the console:

```shell
    $ composer require ptlis/conneg-bundle:@dev
```

Or by Editing composer.json:

```json
    "require": {
        ...
        "ptlis/conneg-bundle": "@dev",
        ...
    },
```

Followed by a composer update:

```shell
    $ composer update
```


### Add Bundle to AppKernel

```php
    # app/AppKernel.php
    public function registerBundles()
    {
        $bundles = array(
            // ...
            new ptlis\ConNegBundle\ptlisConNegBundle(),
        );
    }
```


## Usage

### Negotiation as a Service

Firstly we must create the negotiation service, this example is for an api that prefers to emit json but may emit xml.

The yaml configuration for this service looks like:

```yaml
    # Resources/config/services.yml
    services:
        // ...

        mime_best_api:
            class: ptlis\ConNeg\Type\Mime\MimeTypeInterface
            factory_service: ptlis_con_neg.factory
            factory_method: mimeBest
            arguments:
              - application/json;q=1,application/xml;q=0.8
```


#### Via Symfony Controller

To retrieve the best match from a controller inheriting from Symfony's base controller use the service locator:

```php
    # Controllers/MyController
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;

    class MyController extends Controller
    {
        public function indexAction()
        {
            $mimeBest = $this->get('mime_best_api);

            // Emit appropriate response
        }
    }
```


#### Via Service Controller

To retrieve the best match from a controller loaded as a service add the service as an argument to your controller:

```yaml
    # Resources/config/services.yml
    services:
        controller.mime_best:
            class: ptlis\TestBundle\Controller\MimeBest
            arguments:
              - @mime_best_api
```

And store for use when processing the request.

```php
    # Controllers/MimeBest
    use ptlis\ConNeg\TypePair\TypePairInterface;

    class MimeBest
    {
        private $mimeBest;

        public function __construct(TypePairInterface $mimeBest)
        {
            $this->mimeBest = $mimeBest;
        }

        public function index()
        {
            $this->mimeBest->getType(); // The preferred mime-type

            // Emit appropriate response
        }
    }
```
