---
layout: default
name: index
---

# ConNeg Bundle


A Symfony2 Bundle providing content negotiation services you your application, built for PHP >= 5.3 and Symfony >= 2.3.


## Introduction

This bundle enables you to perform negotiation on requests via simple configuration.

Features:

* Allows definition of services to perform negotiation on User-Agent fields & application preferences.
* Retrieve the best match or a list of all processed types.
* Negotiation on the  [Accept](http://www.w3.org/Protocols/rfc2616/rfc2616-sec14.html#sec14.1), [Accept-Charset](http://www.w3.org/Protocols/rfc2616/rfc2616-sec14.html#sec14.2), [Accept-Encoding](http://www.w3.org/Protocols/rfc2616/rfc2616-sec14.html#sec14.3) and [Accept-Language](http://www.w3.org/Protocols/rfc2616/rfc2616-sec14.html#sec14.4) HTTP fields.

This library offers a bridge between Symfony and the [ptlis/ConNeg](https://github.com/ptlis/conneg/) content negotiation library.


## Documentation

* [Installation](installation.html)
* [Usage](usage.html)
* [Licence](license.html)
