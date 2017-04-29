# Language Switch

![Voyager Screenshot](https://raw.githubusercontent.com/the-control-group/voyager/gh-pages/images/screenshot.png)

Website & Documentation: https://github.com/marciojc/language-switch

<hr>

Laravel Admin & BREAD System (Browse, Read, Edit, Add, & Delete), made for Laravel 5.3.

After creating your new Laravel application you can include the LanguageSwitch package with the following command:

```bash
composer require marciojc/language-switch
```

Add the LanguageSwitch service provider to the `config/app.php` file in the `providers` array:

```php
'providers' => [
    // Laravel Framework Service Providers...
    //...

    // Package Service Providers
    marciojc\LanguageSwitch\LanguageSwitchServiceProvider::class,
    // ...

    // Application Service Providers
    // ...
],
```

Now, you can use LanguageSwitch, like this

<div class="language">
  @if (App::getLocale() == 'pt')
    <a class="lang-link" href="{{getTranslationUrl('en')}}">{{ trans('common.en') }}</a>
  @else
    <a class="lang-link" href="{{getTranslationUrl('pt')}}">{{ trans('common.pt') }}</a>
  @endif
</div>

When your route use some id or slug, you must say what model to use

Route::get(trans('routes.news') . '/{slug}' , [
  'as'           => 'newsdetails',
  'uses'         => 'NewsController@details',
  'model'        => 'App\News'
]);

