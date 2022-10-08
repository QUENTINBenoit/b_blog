## Installation webpack encore

1.  `composer require symfony/webpack-encore-bundle`

2.  `yarn install`

3.  `yarn run dev`

## Mise en place de cocur pour les slug

1. `composer require cocur/slugify`

2. Implamentation de Cocur

   `use Cocur\Slugify\Slugify;`

3. Creation d'un prepersit pour slugger le title avant la persitance

   `public function prePersist(){ `

   `this->slug = (new Slugify())->slugify($this->title); } `
