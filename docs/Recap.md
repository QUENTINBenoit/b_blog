## Installation webpack encore

1.  `composer require symfony/webpack-encore-bundle`

2.  `yarn install`

3.  `yarn run dev`

## Mise en place de cocur pour les slugs

1. `composer require cocur/slugify`

2. Implamentation de Cocur

   `use Cocur\Slugify\Slugify;`

3. Creation d'un prepersit pour slugger le title avant la persitance

   `public function prePersist(){`

   `this->slug = (new Slugify())->slugify($this->title); }`

4. Ne pas oublier de tagger la fonction avec l'attribut suivant

   ` #[ORM\PrePersist]`

## Implementation de UniqueEnty

1. Ajouter l'attribut ==> `#[UniqueEntity()]`
2. choisir ==> les parametres ex ==>`#[UniqueEntity('slug', message: 'Ce slug existe déjà.')]`
3. ne pas oublier d l'implementer => `use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;`

## Gestion de images

1. Installation du bundle vich/uploader-bundle:

   `composer require vich/uploader-bundle`

2. Attention vérifier si bundle vicheUploader est ajouté a tous les bundle congig

   1. aller dans congif bundles.php et ajouter - `Vich\UploaderBundle\VichUploaderBundle::class => ['all' => true],`

3. Ajoutez la configuration minimale qui permet au paquet de fonctionner :

   - creation d'un fichier .yaml dans le dossier packages " vich_uploader.yaml"
   - ajouter le code suivant

     ` vich_uploader:`

     --- `db_driver: orm`

4. ajouter metada pour que les attributs fonctionne

   - `metadata:`
   - --`type: attribute`

5. ajouter le mapping

`mappings:`
--`post_thumbnail:`
---`uri_prefix: /images/posts`
---`upload_destination: "%kernel.project_dir%/public/`
---`images/posts"`
---`namer: Vich\UploaderBundle\Naming\SmartUniqueNamer`

## Mise en place de fixtures

1. Installation du bundle Symfony
   `composer require --dev orm-fixtures`

2. installation de facker
   `composer require --dev fakerphp/faker`

3. Mise en place des fixture dans le dossier src/DatatFixtures

   1. coder les fixtures selon vorte projet
   2. lacer les fixtures avec la commande:

      ` php bin/console doctrine:fixture:load`

      ou

      `php bin/console d:f:l`
