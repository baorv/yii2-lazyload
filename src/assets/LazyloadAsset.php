<?php

namespace baorv\lazyload\assets;

use yii\web\AssetBundle;

/**
 * Class LazyloadAsset contains all assets of lazyload widget
 *
 * @package baorv\lazyload\assets
 * @version 0.0.1
 */
class LazyloadAsset extends AssetBundle
{

    /**
     * Initialize widget
     */
    public function init()
    {
        parent::init();
        $this->sourcePath = __DIR__ . '/../../assets';
        $this->js = YII_DEBUG ? ['js/lazyload.js'] : ['js/lazyload.min.js'];
    }
}