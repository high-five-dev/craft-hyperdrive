<?php

namespace highfive\hyperdrive\twig;

use Craft;
use craft\helpers\Html;
use highfive\hyperdrive\enums\Component;
use highfive\hyperdrive\Hyperdrive;
use Throwable;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class Extension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return array_map(
            fn (Component $component) => new TwigFunction(
                mb_strtolower($component->name),
                fn (string $name, array $variables = []) => $this->render($component, $name, $variables),
                [
                    'is_safe' => ['html']
                ]
            ),
            Component::cases()
        );
    }

    public function render(Component $component, string $name, array $variables): string
    {
        try {
            return Craft::$app->getView()->renderTemplate($component->template($name), $variables);
        } catch (Throwable $e) {
            Hyperdrive::warning("Render error: {$e->getMessage()}");

            $content = $variables['content'] ?? null;

            unset($variables['content']);

            return Html::tag($name, $content, $variables);
        }
    }
}
