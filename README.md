Laravel Simple VAT
========================

Laravel Simple VAT is a small library to check format of European VAT number.

It's mainly a curated version of the [Laravel VAT](https://packalyst.com/packages/package/dannyvankooten/laravel-vat) package,
removing the SOAP call for existence.

## Installation

Simply require the project using [Composer](https://getcomposer.org):

```bash
$ composer require hantless/simple-vat
```

Once Simple VAT is installed, you need to register the service provider. Open up `config/app.php` and add the following to
the `providers` key.

* `Hantless\SimpleVat\SimplevatServiceProvider::class`

Or if you're using Laravel 5.5+, it should auto discover the package.

## Usage

Use the validation rule "vat_format" in your formRequest:

```php

/**
 * Get the validation rules that apply to the request.
 *
 * @return array
*/
public function rules()
{
    return [
        'vatnumberfield' => 'vat_format',
    ];
}

```

or in your validator:

```php

 public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'vatnumberfield' => 'vat_format',
    ]);

    if ($validator->fails()) {
        // redirect ... display error
    }
    
    // store entity...
}

```

Add the error message in your translation files (resources/lang/{lang}/validation.php)

```php

'vat_format' => 'The :attribute do not seem to be a valid VAT number',

```

## License

Laravel Simple VAT is licensed under [The MIT License(MIT)](LICENSE).