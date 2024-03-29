<?php

/**
 * Smarty Method ClearAssign
 *
 * Smarty::clearAssign() method
 *
 * @package    Smarty
 * @subpackage PluginsInternal
 * @author     Uwe Tews
 */
class Smarty_Internal_Method_ClearAssign
{
    /**
     * Valid for all objects
     *
     * @var int
     */
    public $objMap = 7;

    /**
     * clear the given assigned templates variable(s).
     *
     * @param \Smarty_Internal_Data|\Smarty_Internal_Template|Smarty $data
     * @param string|array                                            $tpl_var the templates variable(s) to clear
     *
     * @return \Smarty_Internal_Data|\Smarty_Internal_Template|Smarty
     *@link http://www.smarty.net/docs/en/api.clear.assign.tpl
     *
     * @api  Smarty::clearAssign()
     */
    public function clearAssign(Smarty_Internal_Data $data, $tpl_var)
    {
        if (is_array($tpl_var)) {
            foreach ($tpl_var as $curr_var) {
                unset($data->tpl_vars[ $curr_var ]);
            }
        } else {
            unset($data->tpl_vars[ $tpl_var ]);
        }
        return $data;
    }
}
