# Trainjunkies - Darwin Webservice

[![Build Status](https://travis-ci.com/trainjunkies-packages/darwin-webservice.svg?token=qpN7iTqP24DsNCTUJaiY&branch=master)](https://travis-ci.com/trainjunkies-packages/darwin-webservice)

PHP package to consume National Rail OpenLDBSV Web Service

## Installation

### via Composer

Install [Composer](https://getcomposer.org/doc/00-intro.md)  and require the package with the below command.

```bash
composer require trainjunkies-packages/darwin-webservice
```

## Getting Started

Signup to the OpenLDBSV Webservice [here](http://openldbsv.nationalrail.co.uk/self-signup/register) for an authorisation token. 

See the `scripts` directory for example code.

## Development

To use the [Docker](https://www.docker.com/get-started) environment, copy and complete the `.env.dist` to `.env` and start the Docker compose environment. 

```bash
docker-compose up -d
docker-compose run --rm app sh
```

The `composer.json` file has been configured to execute the test suite.

```
composer ci
```

## Authors

- **Ben McManus** - [bennoislost](https://github.com/bennoislost)

See also the list of [contributors](https://github.com/trainjunkies-packages/darwin-webservice/contributors) who participated in this project


## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

- [https://groups.google.com/forum/#!forum/openraildata-talk](https://groups.google.com/forum/#!forum/openraildata-talk)
- [https://wiki.openraildata.com/](https://wiki.openraildata.com/)
