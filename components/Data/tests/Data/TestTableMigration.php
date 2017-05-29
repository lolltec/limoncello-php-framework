<?php namespace Limoncello\Tests\Data\Data;

/**
 * Copyright 2015-2017 info@neomerx.com
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

use Limoncello\Contracts\Data\MigrationInterface;
use Limoncello\Data\Migrations\MigrationTrait;

/**
 * @package Limoncello\Tests\Data
 */
class TestTableMigration implements MigrationInterface
{
    use MigrationTrait;

    /**
     * @var string
     */
    private $modelClass;

    /**
     * @var array
     */
    private $columns;

    /**
     * @param string $modelClass
     * @param array  $columns
     */
    public function __construct(string $modelClass, array $columns)
    {
        $this->modelClass = $modelClass;
        $this->columns    = $columns;
    }

    /**
     * @inheritdoc
     */
    public function migrate()
    {
        $this->createTable($this->modelClass, $this->columns);
    }

    /**
     * @inheritdoc
     */
    public function rollback()
    {
        $this->dropTableIfExists($this->modelClass);
    }
}