# [laravel-sitemap](http://roumen.me/projects/laravel-sitemap) bundle

Simple sitemap generator for Laravel.


## Installation

Install using the Artian CLI:

	php artisan bundle:install sitemap

then edit **application/bundles.php** to autoload messages:

```php
<?php

return array(

'sitemap' => array(
	'auto' => true
),

```

## Example


```php

Route::get('sitemap', function(){

    $sitemap = new Sitemap();

    $sitemap->add(URL::to(),'2012-08-25T20:10:00+02:00','1.0','daily');
    $sitemap->add(URL::to('page'),'2012-08-26T12:30:00+02:00','0.9','monthly');

    $posts = DB::table('posts')->order_by('created', 'desc')->get();
    foreach ($posts as $post)
    {
        $sitemap->add(URL::to('post/'.$post->slug),date('Y-m-d\TH:i:sP',strtotime($post->modified)),'0.8','weekly');
    }

    return $sitemap->render();
    
});

```
