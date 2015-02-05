<?php

/*
 * This file is part of the webmozart/console package.
 *
 * (c) Bernhard Schussek <bschussek@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Webmozart\Console\Api\Command;

use Webmozart\Console\Assert\Assert;

/**
 * The configuration of an option command.
 *
 * @since  1.0
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
class OptionCommandConfig extends SubCommandConfig
{
    /**
     * @var string
     */
    private $shortName;

    public function __construct($name = null, $shortName = null, CommandConfig $parentConfig = null)
    {
        parent::__construct($name, $parentConfig);

        $this->setShortName($shortName);
    }

    public function getShortName()
    {
        return $this->shortName;
    }

    public function setShortName($shortName)
    {
        if (null !== $shortName) {
            Assert::string($shortName, 'The short command name must be a string or null. Got: %s');
            Assert::notEmpty($shortName, 'The short command name must not be empty.');
            Assert::regex($shortName, '~^[a-zA-Z]$~', 'The short command name must contain a single letter. Got: %s');
        }

        $this->shortName = $shortName;
    }
}
