<?php

namespace baorv\lazyload\widgets;

use baorv\lazyload\assets\LazyloadAsset;
use yii\base\InvalidConfigException;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Json;

/**
 * Class Lazyload renders widget lazyload for component in HTML
 *
 * @package baorv\lazyload\widgets
 * @version 0.0.1
 */
class Lazyload extends Widget
{

    /**
     * Source of image tag
     *
     * @var string $src
     */
    public $src;

    /**
     * Options for image tag
     *
     * @var array $options
     */
    public $options = [];

    /**
     * Options of lazyload widget. More detail: https://www.andreaverlicchi.eu/lazyload/
     *
     * @var array $clientOptions
     */
    public $clientOptions = [];

    /**
     * Custom image class name
     *
     * @var string
     */
    public $imageClass = '';

    /**
     * @inheritdoc
     * @throws InvalidConfigException
     */
    public function init()
    {
        parent::init();
        if (empty($this->src)) {
            throw new InvalidConfigException("You must set the 'src' property");
        }
        $this->options['data-src'] = $this->src;
        if (isset($this->options['class']) && !empty($this->options['class'])) {
            $this->options['class'] .= " $this->imageClass";
        } else {
            $this->options['class'] = $this->imageClass;
        }
        if (isset($this->options['src'])) {
            unset($this->options['src']);
        }
        $this->registerAssets();
        parent::init();
    }

    /**
     * Registers the client script required for the plugin
     */
    public function registerAssets()
    {
        $clientOptions = Json::encode($this->clientOptions);
        LazyloadAsset::register($this->view);
        $this->view->registerJs("(function() {
            new LazyLoad($clientOptions);
        }());");
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        return Html::tag('img', '', $this->options);
    }
}