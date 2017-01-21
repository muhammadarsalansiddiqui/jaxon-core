<?php

/**
 * Container.php - Trait for Utils classes
 *
 * Make functions of the utils classes available to Jaxon classes.
 *
 * @package jaxon-core
 * @author Thierry Feuzeu <thierry.feuzeu@gmail.com>
 * @copyright 2016 Thierry Feuzeu <thierry.feuzeu@gmail.com>
 * @license https://opensource.org/licenses/BSD-2-Clause BSD 2-Clause License
 * @link https://github.com/jaxon-php/jaxon-core
 */

namespace Jaxon\Utils\Traits;

use Jaxon\Utils\Container as JaxonContainer;
use Jaxon\Utils\Interfaces\EventListener;

trait Container
{
    /**
     * Get the plugin manager
     *
     * @return object        The plugin manager
     */
    public function getPluginManager()
    {
        return JaxonContainer::getInstance()->getPluginManager();
    }

    /**
     * Get the request manager
     *
     * @return object        The request manager
     */
    public function getRequestManager()
    {
        return JaxonContainer::getInstance()->getRequestManager();
    }

    /**
     * Get the response manager
     *
     * @return object        The response manager
     */
    public function getResponseManager()
    {
        return JaxonContainer::getInstance()->getResponseManager();
    }

    /**
     * Set the value of a config option
     *
     * @param string        $sName                The option name
     * @param mixed            $sValue                The option value
     *
     * @return void
     */
    public function setOption($sName, $sValue)
    {
        return JaxonContainer::getInstance()->getConfig()->setOption($sName, $sValue);
    }
    
    /**
     * Set the values of an array of config options
     *
     * @param array         $aOptions           The config options
     * @param string        $sKeys              The keys of the options in the array
     *
     * @return void
     */
    public function setOptions($aOptions, $sKeys = '')
    {
        return JaxonContainer::getInstance()->getConfig()->setOptions($aOptions, $sKeys);
    }

    /**
     * Get the value of a config option
     *
     * @param string        $sName                The option name
     *
     * @return mixed        The option value, or null if the option is unknown
     */
    public function getOption($sName)
    {
        return JaxonContainer::getInstance()->getConfig()->getOption($sName);
    }

    /**
     * Check the presence of a config option
     *
     * @param string        $sName            The option name
     *
     * @return bool        True if the option exists, and false if not
     */
    public function hasOption($sName)
    {
        return JaxonContainer::getInstance()->getConfig()->hasOption($sName);
    }

    /**
     * Get the names of the options matching a given prefix
     *
     * @param string        $sPrefix        The prefix to match
     *
     * @return array        The options matching the prefix
     */
    public function getOptionNames($sPrefix)
    {
        return JaxonContainer::getInstance()->getConfig()->getOptionNames($sPrefix);
    }

    /**
     * Set a cache directory for the template engine
     *
     * @param string        $sCacheDir            The cache directory
     *
     * @return void
     */
    public function setCacheDir($sCacheDir)
    {
        return JaxonContainer::getInstance()->getTemplate()->setCacheDir($sCacheDir);
    }

    /**
     * Render a template
     *
     * @param string        $sTemplate            The name of template to be rendered
     * @param string        $aVars                The template vars
     *
     * @return string        The template content
     */
    public function render($sTemplate, array $aVars = array())
    {
        return JaxonContainer::getInstance()->getTemplate()->render($sTemplate, $aVars);
    }

    /**
     * Get a translated string
     *
     * @param string        $sText                The key of the translated string
     * @param string        $aPlaceHolders        The placeholders of the translated string
     * @param string        $sLanguage            The language of the translated string
     *
     * @return string        The translated string
     */
    public function trans($sText, array $aPlaceHolders = array(), $sLanguage = null)
    {
        return JaxonContainer::getInstance()->getTranslator()->trans($sText, $aPlaceHolders, $sLanguage);
    }

    /**
     * Minify javascript code
     *
     * @param string        $sJsFile            The javascript file to be minified
     * @param string        $sMinFile            The minified javascript file
     *
     * @return boolean        True if the file was minified
     */
    public function minify($sJsFile, $sMinFile)
    {
        return JaxonContainer::getInstance()->getMinifier()->minify($sJsFile, $sMinFile);
    }

    /**
     * Validate a function name
     *
     * @param string        $sName            The function name
     *
     * @return bool            True if the function name is valid, and false if not
     */
    public function validateFunction($sName)
    {
        return JaxonContainer::getInstance()->getValidator()->validateFunction($sName);
    }

    /**
     * Validate an event name
     *
     * @param string        $sName            The event name
     *
     * @return bool            True if the event name is valid, and false if not
     */
    public function validateEvent($sName)
    {
        return JaxonContainer::getInstance()->getValidator()->validateEvent($sName);
    }

    /**
     * Validate a class name
     *
     * @param string        $sName            The class name
     *
     * @return bool            True if the class name is valid, and false if not
     */
    public function validateClass($sName)
    {
        return JaxonContainer::getInstance()->getValidator()->validateClass($sName);
    }

    /**
     * Validate a method name
     *
     * @param string        $sName            The function name
     *
     * @return bool            True if the method name is valid, and false if not
     */
    public function validateMethod($sName)
    {
        return JaxonContainer::getInstance()->getValidator()->validateMethod($sName);
    }

    /**
     * Register an event listener.
     *
     * @return void
     */
    public function addEventListener(EventListener $xEventListener)
    {
        JaxonContainer::getInstance()->getEventDispatcher()->addSubscriber($xEventListener);
    }
}
