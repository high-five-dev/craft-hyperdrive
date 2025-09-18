<?php

namespace highfive\hyperdrive;

use Craft;
use craft\base\Plugin;
use highfive\base\traits\LoggingTrait;
use highfive\base\traits\TemplateRootsTrait;
use highfive\base\traits\TranslationTrait;
use highfive\hyperdrive\twig\Extension;

class Hyperdrive extends Plugin
{
    use TranslationTrait;
    use LoggingTrait;
    use TemplateRootsTrait;

    public function init(): void
    {
        parent::init();

        $this->registerLogTarget();

        if (Craft::$app->getRequest()->getIsSiteRequest()) {
            Craft::$app->getView()->registerTwigExtension(new Extension());
        }

        Craft::$app->onInit(function () {
            $this->registerTemplateRoots('components');
        });
    }
}
