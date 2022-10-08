## Installation webpack encore

1.  `composer require symfony/webpack-encore-bundle`

2.  `yarn install`

3.  `yarn run dev`

## Mise en place de cocur pour les slugs

1. `composer require cocur/slugify`

2. Implamentation de Cocur

   `use Cocur\Slugify\Slugify;`

3. Creation d'un prepersit pour slugger le title avant la persitance

   `public function prePersist(){ `

   `this->slug = (new Slugify())->slugify($this->title); } `

## Implementation de UniqueEnty

1. Ajouter l'attribut ==> `#[UniqueEntity()]`
2. choisir ==> les parametres ex ==>`#[UniqueEntity('slug', message: 'Ce slug existe déjà.')]`
3. ne pas oublier d l'implementer => `use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;`
