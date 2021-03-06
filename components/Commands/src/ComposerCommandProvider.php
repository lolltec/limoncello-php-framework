<?php declare(strict_types=1);

namespace Limoncello\Commands;

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

use Composer\Command\BaseCommand;
use Composer\Plugin\Capability\CommandProvider;
use function assert;

/**
 * @package Limoncello\Commands
 */
class ComposerCommandProvider implements CommandProvider
{
    /**
     * @var BaseCommand[]
     */
    private static $commands = [];

    /**
     * @inheritdoc
     */
    public function getCommands()
    {
        return static::$commands;
    }

    /**
     * @param BaseCommand[] $commands
     *
     * @return void
     *
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    public static function setCommands(array $commands): void
    {
        assert(static::areCommands($commands) === true);

        static::$commands = $commands;
    }

    /**
     * @param array $commands
     *
     * @return bool
     */
    private static function areCommands(array $commands): bool
    {
        $areCommands = true;

        foreach ($commands as $command) {
            $areCommands = $areCommands && ($command instanceof BaseCommand);
        }

        return $areCommands;
    }
}
