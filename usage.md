---
layout: default
name: usage
---

# Usage

Negotiation is performed via services, with each service defining the parameters for a negotiation that your application wishes to perform.

## Creating the Negotiation Service

In this example our application contains an API that can emit either JSON or XML, but has a preference for JSON. We can encode this information as a string conforming to the format specified in [RFC-2616 Section 14.1](http://www.w3.org/Protocols/rfc2616/rfc2616-sec14.html#sec14.1).

### Encoding Application Preferences

Types are encoded comma-separated and consist of the mime-type alongside a quality factor that indicates our application's relative preference for that type. Higher quality factors are more favoured, but note that the absence of an explicit quality factor is equivalent to setting it to one.

This means that ```application/json``` has a higher preference than ```application/xml;q=0.8``` as the quality factor for the former is implicitly 1.

The resultant application preference string for negotiation in our API is ```application/json,application/xml;q=0.8``` (preferences may be provided in any order).


### Service Definition

The result of negotiation is provided to our application via factory services we define. In this case we want only the preferred type with the application preferences described above.

To achieve this the yaml configuration for this service looks like:

```yaml
# Resources/config/services.yml
services:
    # ...

    mime_best_api:
        class: ptlis\ConNeg\Type\Mime\MimeTypeInterface
        factory_service: ptlis_con_neg.factory
        factory_method: mimeBest                        # The type of negotiation to perform
        arguments:
          - application/json,application/xml;q=0.8      # Your application preferences
```


## Using the Service


### Via Symfony Controller

If we want to use this from a controller inheriting from Symfony's base controller, then we may use the service locator:

```php
// Your/Bundle/Controller/MyController.php
namespace Your/Bundle/Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MyController extends Controller
{
    public function indexAction()
    {
        $mimeBest = $this->get('mime_best_api');

        // Emit appropriate response
    }
}
```


### Via Controller as a Service

If, instead, we are using controllers loaded as services we can simply add it as an argument in our controller's service definition:

```yaml
# Resources/config/services.yml
services:
    controller.mime_best:
        class: ptlis\TestBundle\Controller\MimeBest
        arguments:
          - @mime_best_api
```

The type is injected into the constructor of our controller, where we can store it for use when processing the request.

```php
# Your/Bundle/Controller/MimeBest
namespace Your/Bundle/Controller;

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
