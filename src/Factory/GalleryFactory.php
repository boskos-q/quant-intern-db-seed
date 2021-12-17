<?php

namespace App\Factory;

use App\Entity\Gallery;
use App\Repository\GalleryRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Gallery>
 *
 * @method static Gallery|Proxy createOne(array $attributes = [])
 * @method static Gallery[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Gallery|Proxy find(object|array|mixed $criteria)
 * @method static Gallery|Proxy findOrCreate(array $attributes)
 * @method static Gallery|Proxy first(string $sortedField = 'id')
 * @method static Gallery|Proxy last(string $sortedField = 'id')
 * @method static Gallery|Proxy random(array $attributes = [])
 * @method static Gallery|Proxy randomOrCreate(array $attributes = [])
 * @method static Gallery[]|Proxy[] all()
 * @method static Gallery[]|Proxy[] findBy(array $attributes)
 * @method static Gallery[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Gallery[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static GalleryRepository|RepositoryProxy repository()
 * @method Gallery|Proxy create(array|callable $attributes = [])
 */
final class GalleryFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

        // TODO inject services if required (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services)
    }

    protected function getDefaults(): array
    {

        $name = implode(' ', self::faker()->words(rand(1,4)));
        return [
            // TODO add your default values here (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories)
            'name' => $name,
            'description' => self::faker()->text(150),
            'nsfw' => (bool) rand(0, 1),
            'hidden' => (bool) rand(0, 1),
            'slug' => str_replace(' ', '-', $name),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Gallery $gallery): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Gallery::class;
    }
}
