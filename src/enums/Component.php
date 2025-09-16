<?php

namespace highfive\hyperdrive\enums;

use Craft;
use craft\web\twig\TemplateLoaderException;

enum Component
{
    case Atom;
    case Molecule;
    case Organism;

    /**
     * @throws TemplateLoaderException
     */
    public function template(string $name): string
    {
        $template = implode(
            '/',
            array_merge(
                [
                    '_hyperdrive',
                    mb_strtolower($this->name),
                ],
                explode('.', $name)
            )
        ) . '.twig';

        if (Craft::$app->getView()->doesTemplateExist($template)) {
            return $template;
        }

        $template = str_replace('_', '', $template);

        if (!Craft::$app->getView()->doesTemplateExist($template)) {
            throw new TemplateLoaderException($template, "Template for {$this->name} '{$name}' not found");
        }

        return $template;
    }
}
