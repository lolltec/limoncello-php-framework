<?php namespace App\Data\Seeds;

use App\Data\Models\Post as Model;
use App\Data\Models\User;
use Faker\Generator;
use Limoncello\Contracts\Data\SeedInterface;
use Limoncello\Data\Seeds\SeedTrait;
use Psr\Container\ContainerInterface;

/**
 * @package App
 */
class PostsSeed implements SeedInterface
{
    use SeedTrait;

    const NUMBER_OF_RECORDS = 100;

    /**
     * @inheritdoc
     */
    public function run(): void
    {
        $users  = $this->readTableData(User::TABLE_NAME);

        $this->seedModelsData(self::NUMBER_OF_RECORDS, Model::class, function (ContainerInterface $container) use ($users) {
            /** @var Generator $faker */
            $faker  = $container->get(Generator::class);

            return [
                Model::FIELD_ID_USER    => $faker->randomElement($users)[User::FIELD_ID],
                Model::FIELD_TITLE      => $faker->text(50),
                Model::FIELD_TEXT       => $faker->text(),
                Model::FIELD_CREATED_AT => $this->now(),
            ];
        });
    }
}
