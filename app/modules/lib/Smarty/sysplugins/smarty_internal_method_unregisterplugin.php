<?php

/**
 * Smarty Method UnregisterPlugin
 *
 * Smarty::unregisterPlugin() method
 *
 * @package    Smarty
 * @subpackage PluginsInternal
 * @author     Uwe Tews
 */
class Smarty_Internal_Method_UnregisterPlugin
{
    /**
     * Valid for Smarty and templates object
     *
     * @var int
     */
    public $objMap = 3;

    /**
     * Registers plugin to be used in templates
     *
     * @param \Smarty_Internal_TemplateBase|Smarty_Internal_Template|\Smarty $obj
     * @param string $type plugin type
     * @param string                                                          $name name of templates tag
     *
     * @return \Smarty|Smarty_Internal_Template
     *@api  Smarty::unregisterPlugin()
     * @link http://www.smarty.net/docs/en/api.unregister.plugin.tpl
     *
     */
    public function unregisterPlugin(Smarty_Internal_TemplateBase $obj, $type, $name)
    {
        $smarty = $obj->_getSmartyObj();
        if (isset($smarty->registered_plugins[ $type ][ $name ])) {
            unset($smarty->registered_plugins[ $type ][ $name ]);
        }
        return $obj;
    }
}
