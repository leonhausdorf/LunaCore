<?php

/**
 * Smarty Method UnregisterResource
 *
 * Smarty::unregisterResource() method
 *
 * @package    Smarty
 * @subpackage PluginsInternal
 * @author     Uwe Tews
 */
class Smarty_Internal_Method_UnregisterResource
{
    /**
     * Valid for Smarty and templates object
     *
     * @var int
     */
    public $objMap = 3;

    /**
     * Registers a resource to fetch a templates
     *
     * @param \Smarty_Internal_TemplateBase|Smarty_Internal_Template|\Smarty $obj
     * @param string                                                          $type name of resource type
     *
     * @return \Smarty|Smarty_Internal_Template
     *@link http://www.smarty.net/docs/en/api.unregister.resource.tpl
     *
     * @api  Smarty::unregisterResource()
     */
    public function unregisterResource(Smarty_Internal_TemplateBase $obj, $type)
    {
        $smarty = $obj->_getSmartyObj();
        if (isset($smarty->registered_resources[ $type ])) {
            unset($smarty->registered_resources[ $type ]);
        }
        return $obj;
    }
}
