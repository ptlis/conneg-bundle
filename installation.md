---
layout: default
name: installation
---

# Installation

Installation is a simple two-step process

## Add Dependency

Either from the console:

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


## Add to AppKernel

Edit app/AppKernel and add the ConNeg bundle:

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
