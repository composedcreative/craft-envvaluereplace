<?php

namespace Craft;

use Twig_Extension;
use Twig_Filter_Method;

/**
 * Environment Value Replacement Twig Extension
 *
 * @author    Compose[d] Creative. <c3po@composedcreative.com>
 * @copyright Copyright (c) 2016, Compose[d] Creative Corp.
 * @license   GNU GPLv3
 * @package   EnvValueReplace
 * @since     %NEXT_VERSION%
 */
class EnvValueReplaceTwigExtension extends Twig_Extension
{
    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'envValueReplace';
    }

    public function getFilters()
    {
        return array(
            'envValueReplace' => new Twig_Filter_Method($this, 'envValueReplace'),
        );
    }

    /**
     * Replaces part of the value based on rules defined in app config
     *
     * @param scalar $value the value
     * @param bool $chain [optional; default=false] whether to chain the replacements
     * @return mixed the replaced scalar value or the passed in non-scalar value
     */
    public function envValueReplace($value, $chain = false)
    {
        if (!is_scalar($value)) {
            // Only concerned with scalar values at this point
            return $value;
        }
        $replacements = craft()->config->get('envValueReplacements');
        if (is_array($replacements) && count($replacements) > 0) {
            foreach ($replacements as $search => $replace) {
                if (false !== stripos($value, $search)) {
                    if (true === $chain) {
                        $value = str_ireplace($search, $replace, $value);
                    } else {
                        return str_ireplace($search, $replace, $value);
                    }
                }
            }
        }
        return $value;
    }
}
