# Slim API Starter

A modern API-first starter kit for Slim Framework 4.

**Slim API Starter** is an opinionated Slim Framework starter project designed for building clean, maintainable REST APIs with database support, migrations, validation, dependency injection, logging, and Pest testing ready out of the box.

## Features

- Slim Framework 4
- API-first project structure
- Modular layered architecture
- PHP-DI dependency injection container
- Environment configuration using `.env`
- PostgreSQL and MySQL database support
- Eloquent ORM via `illuminate/database`
- Phinx database migrations
- Request validation using `illuminate/validation`
- UUID support
- Monolog logging
- Pest testing by default
- PHPStan static analysis
- PHP CS Fixer code formatting
- Example health check endpoint

## Architectural Style

This starter uses a **Modular Layered Architecture**.

The goal is to provide a clean structure without making the application too complex for small and medium-sized APIs.

Each module may contain its own actions, services, routes, and related classes. Shared application concerns such as middleware, validation, responses, exceptions, and database configuration are placed in shared folders.

Recommended responsibility flow:

```text
Route → Action/Controller → Service → Repository/Model → Database
```

### Why Modular Layered Architecture?

Slim is a lightweight microframework. It gives developers flexibility, but without a good structure, applications can quickly become hard to maintain.

This starter provides a practical structure where:

- routes define API endpoints
- actions/controllers handle HTTP requests and responses
- services contain business logic
- repositories or models handle database access
- validators handle request validation
- middleware handles cross-cutting HTTP concerns
- configuration stays outside business logic
- tests are organized by behavior and unit scope

## Recommended Use Cases

This starter is ideal for:

- REST API projects
- small to medium-sized backend services
- learning Slim Framework
- API prototypes
- backend applications that need database support
- developers who want more structure than the default Slim skeleton

## Package Type

This package is intended to be installed as a project:

```bash
composer create-project sonsonyyy/slim-api-starter my-api
```

It is not intended to be installed as a reusable library with `composer require`.

## License

This project is open-sourced software licensed under the MIT license.