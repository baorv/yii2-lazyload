# Yii2 Lazyload widget

This package provides lazyload widget for Yii2 Framework

## Install

Run composer to install

```bash
composer require "baorv/lazyload":"*" 
```

Or define package in require section of composer.json

```yaml
...
require: {
    ...
    "baorv/lazyload":"*"
    ...
},
...
```

## Usage

You can use this widget in any view

```php
use baorv\lazyload\widgets\Lazyload;

Lazyload::widget([
    'src' => 'your-image.png',
    'options' => [],
    'clientOptions' => [],
    'imageClass' => 'your-class'
])
```