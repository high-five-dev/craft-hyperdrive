# 🚀 craft-hyperdrive

**Light-speed Craft CMS development**

`craft-hyperdrive` is a component library for [Craft CMS](https://craftcms.com/) that applies **atomic design principles** and leverages **Tailwind CSS** for styling. It’s built to help developers ship scalable, consistent, and maintainable front-end interfaces at warp speed.

---

## ✨ Features
- 🧩 **Atomic Design Structure** — Atoms, molecules, organisms and templates clean, reusable UI.
- 🎨 **Tailwind CSS Ready** — Utility-first styling out of the box, fully customizable.
- ⚡ **Light-speed Craft CMS Development** — Drop in pre-built components and accelerate your workflow.
- 🔌 **Twig Extension Included** — Render atoms, molecules, organisms, or particles with simple helpers.
- 🛠 **Overridable Components** — Project-level overrides let you customize or extend components without forking.
- 🧪 **Safe Fallbacks** — Missing components log a warning instead of breaking your templates.

---

## 🔧 Requirements
- Craft CMS `^5.0`
- Tailwind CSS `^3.0`
- PHP `^8.4`

---

## 📦 Installation

```bash
composer require high-five/craft-hyperdrive
php craft plugin/install hyperdrive
```

Add component paths to your Tailwind config:

```js
// tailwind.config.js
module.exports = {
  content: [
    './templates/**/*.twig',
    './vendor/high-five/craft-hyperdrive/src/templates/**/*.twig',
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
```

---

## 🚀 Getting Started

Use Components with Twig Helpers

### Atoms
```twig
{{ atom('button', { label: 'Submit', url: '/submit', style: 'primary' }) }}
```

### Molecules
```twig
{{ molecule('card', {
  title: 'Card Title',
  body: 'Card body text goes here.',
  image: entry.image.one()
}) }}
```

### Organisms
```twig
{{ organism('hero', {
  heading: entry.title,
  subheading: entry.teaser,
  cta: [{ label: 'Learn More', url: entry.url }]
}) }}
```

---

## 📂 Overriding & Custom Components

To override or define new components, create a `hyperdrive/` folder in your project’s templates:

```
templates/
└── hyperdrive/
    ├── atoms/
    │   └── button.twig            # overrides vendor button
    ├── molecules/
    │   └── card.twig              # overrides vendor card
    └── organisms/
        └── newsletter-signup.twig # custom project-only component
```