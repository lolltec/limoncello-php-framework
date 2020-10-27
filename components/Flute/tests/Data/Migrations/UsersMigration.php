<?php declare (strict_types = 1);

namespace Limoncello\Tests\Flute\Data\Migrations;

/**
 * Copyright 2015-2019 info@neomerx.com
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

use Doctrine\DBAL\DBALException;
use Limoncello\Tests\Flute\Data\Models\User as Model;

/**
 * @package Limoncello\Tests\Flute
 */
class UsersMigration extends Migration
{
    /** @inheritdoc */
    const MODEL_CLASS = Model::class;

    /**
     * @inheritdoc
     *
     * @throws DBALException
     */
    public function migrate()
    {
        $this->createTable(Model::TABLE_NAME, [
            $this->primaryInt(Model::FIELD_ID),
            $this->relationship(Model::REL_ROLE),
            $this->string(Model::FIELD_ALIAS),
            $this->string(Model::FIELD_TITLE),
            $this->string(Model::FIELD_FIRST_NAME),
            $this->string(Model::FIELD_LAST_NAME),
            $this->string(Model::FIELD_LANGUAGE),
            $this->string(Model::FIELD_EMAIL),
            $this->string(Model::FIELD_PASSWORD_HASH),
            $this->string(Model::FIELD_API_TOKEN),
            $this->bool(Model::FIELD_IS_ACTIVE),
            $this->datetime(Model::FIELD_CREATED_AT),
            $this->nullableDatetime(Model::FIELD_UPDATED_AT),
            $this->nullableDatetime(Model::FIELD_DELETED_AT),

            $this->unique([Model::FIELD_EMAIL]),
        ]);
    }
}
