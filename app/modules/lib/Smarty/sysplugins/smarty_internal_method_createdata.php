<?php

/**
 * Smarty Method CreateData
 *
 * Smarty::createData() method
 *
 * @package    Smarty
 * @subpackage PluginsInternal
 * @author     Uwe Tews
 */
class Smarty_Internal_Method_CreateData
{
    /**
     * Valid for Smarty and templates object
     *
     * @var int
     */
    public $objMap = 3;

    /**
     * creates a data object
     *
     * @param \Smarty_Internal_TemplateBase|\Smarty_Internal_Template|\Smarty      $obj
     * @param \Smarty_Internal_Template|\Smarty_Internal_Data|Smarty_Data|\Smarty $parent next higher level of Smarty
     *                                                                                     variables
     * @param string                                                               $name   optional data block name
     *
     * @return Smarty_Data data object
     *@api  Smarty::createData()
     * @link http://www.smarty.net/docs/en/api.create.data.tpl
     *
     */
    public function createData(Smarty_Internal_TemplateBase $obj, Smarty_Internal_Data $parent = null, $name = null)
    {
        /* @var Smarty $smarty */
        $smarty = $obj->_getSmartyObj();
        $dataObj = new Smarty_Data($parent, $smarty, $name);
        if ($smarty->debugging) {
            Smarty_Internal_Debug::register_data($dataObj);
        }
        return $dataObj;
    }
}
