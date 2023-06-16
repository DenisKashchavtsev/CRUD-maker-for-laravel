# CRUDMaker-for-laravel

## Installation

Run the installation using composer
  ```
  composer require dkart/crud-maker
  ```
open your config/app.php and add this line in providers section
  ```
  DKart\CrudMaker\CrudMakerServiceProvider::class,
  ```

run the artisan command
  ```
  php artisan vendor:publish --provider="DKart\CrudMaker\CrudMakerServiceProvider"
  ```
you get this files
  ```
app
└──  Filters
    ├── BaseFilters.php
    └── Filterable.php
  ```

## Usage

Crude fields are based on a table in the database.

For example, the fields for the ```Product``` entity will be generated based on the ```products``` table in the database


  ```
  php artisan make:crud
  ```

After that, you need to enter the name of the entity and select a template

## Templates
### Api
while creating a crud you will get this structure

if you want to use Swagger/OpenApi you should also install this package https://github.com/DarkaOnLine/L5-Swagger and fill in ```@OA\Info``` in your Controller.php
  ```
app
├── Http
│   ├── Controllers
│   │   └── EntityController.php
│   ├── Requests
│   │   └── Entity
│   │       └── EntityRequest.php
│   └── Resources
│       └── Entity
│           ├── EntityCollection.php
│           └── EntityResource.php
├── Models
│   ├── Entity.php
├── Repositories
│   └── EntityRepository.php
└── Services
    └── EntityService.php
database
└── factories
    └── EntityFactory.php
tests
└── Feature
    └── EntityTest.php
  ```

### Default
while creating a crud you will get this structure
  ```
app
├── Http
│   ├── Controllers
│   │   └── EntityController.php
│   └── Requests
│       └── Entity
│           └── EntityRequest.php
├── Models
│   └── Entity.php
├── Repositories
│   └── EntityRepository.php
└── Services
    └── EntityService.php
database
└── factories
    └── EntityFactory.php
resources
└── views
    └── entity
        ├── form.blade.php
        ├── list.blade.php
        └── show.blade.php
tests
└── Feature
    └── EntityTest.php

  ```

## Links

- [DKart](http://www.dkart.pro/)  
