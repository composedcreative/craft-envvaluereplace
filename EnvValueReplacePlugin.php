<?php

namespace Craft;

use Craft\BasePlugin;
use Craft\EnvValueReplaceExtension;

/**
 * Environment Value Replacement Plugin for Craft CMS
 *
 * @author    Compose[d] Creative. <c3po@composedcreative.com>
 * @copyright Copyright (c) 2016, Compose[d] Creative Corp.
 * @license   GNU GPLv3
 * @package   EnvValueReplace
 * @since     %NEXT_VERSION%
 */
class EnvValueReplacePlugin extends BasePlugin
{
    public function getName()
    {
         return Craft::t('Env Value Replace');
    }

    public function getDescription()
    {
        return 'Replaces values based on environment settings';
    }

    public function getVersion()
    {
        return '0.1.0';
    }

    public function getDeveloper()
    {
        return 'Compose[d] Creative';
    }

    public function getDeveloperUrl()
    {
        return 'http://www.composedcreative.com';
    }

    public function getReleaseFeedUrl()
    {
        return 'https://raw.githubusercontent.com/composedcreative/craft-envvaluereplace/master/releases.json';
    }

    public function addTwigExtension()
    {
        Craft::import('plugins.envvaluereplace.twigextensions.EnvValueReplaceTwigExtension');
        return new EnvValueReplaceTwigExtension();
    }
}
