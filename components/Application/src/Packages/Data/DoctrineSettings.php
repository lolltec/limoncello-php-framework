<?php declare(strict_types=1);

namespace Limoncello\Application\Packages\Data;

/**
 * Copyright 2015-2020 info@neomerx.com
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

use Limoncello\Contracts\Settings\Packages\DoctrineSettingsInterface;
use function assert;
use function file_exists;

/**
 * @package Limoncello\Application
 */
class DoctrineSettings implements DoctrineSettingsInterface
{
    /**
     * @inheritdoc
     */
    final public function get(array $appConfig): array
    {
        $defaults = $this->getSettings();

        $pathToDbFile = $defaults[static::KEY_PATH] ?? null;
        assert(
            ($pathToDbFile === null || file_exists($pathToDbFile) === true),
            "Invalid database file `$pathToDbFile`."
        );

        return $defaults;
    }

    /**
     * @return array
     */
    protected function getSettings(): array
    {
        return [];
    }
}
