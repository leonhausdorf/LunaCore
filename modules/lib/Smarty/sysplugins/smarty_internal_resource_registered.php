<?php
/**
 * Smarty Internal Plugin Resource Registered
 *
 * @package    Smarty
 * @subpackage TemplateResources
 * @author     Uwe Tews
 * @author     Rodney Rehm
 */

/**
 * Smarty Internal Plugin Resource Registered
 * Implements the registered resource for Smarty templates
 *
 * @package    Smarty
 * @subpackage TemplateResources
 * @deprecated
 */
class Smarty_Internal_Resource_Registered extends Smarty_Resource
{
    /**
     * populate Source Object with meta data from Resource
     *
     * @param Smarty_Template_Source   $source    source object
     * @param Smarty_Internal_Template $_template templates object
     *
     * @return void
     */
    public function populate(Smarty_Template_Source $source, Smarty_Internal_Template $_template = null)
    {
        $source->filepath = $source->type . ':' . $source->name;
        $source->uid = sha1($source->filepath . $source->smarty->_joined_template_dir);
        $source->timestamp = $this->getTemplateTimestamp($source);
        $source->exists = !!$source->timestamp;
    }

    /**
     * populate Source Object with timestamp and exists from Resource
     *
     * @param Smarty_Template_Source $source source object
     *
     * @return void
     */
    public function populateTimestamp(Smarty_Template_Source $source)
    {
        $source->timestamp = $this->getTemplateTimestamp($source);
        $source->exists = !!$source->timestamp;
    }

    /**
     * Get timestamp (epoch) the templates source was modified
     *
     * @param Smarty_Template_Source $source source object
     *
     * @return integer|boolean        timestamp (epoch) the templates was modified, false if resources has no timestamp
     */
    public function getTemplateTimestamp(Smarty_Template_Source $source)
    {
        // return timestamp
        $time_stamp = false;
        call_user_func_array(
            $source->smarty->registered_resources[ $source->type ][ 0 ][ 1 ],
            array($source->name, &$time_stamp, $source->smarty)
        );
        return is_numeric($time_stamp) ? (int)$time_stamp : $time_stamp;
    }

    /**
     * Load templates's source by invoking the registered callback into current templates object
     *
     * @param Smarty_Template_Source $source source object
     *
     * @return string                 templates source
     * @throws SmartyException        if source cannot be loaded
     */
    public function getContent(Smarty_Template_Source $source)
    {
        // return templates string
        $content = null;
        $t = call_user_func_array(
            $source->smarty->registered_resources[ $source->type ][ 0 ][ 0 ],
            array($source->name, &$content, $source->smarty)
        );
        if (is_bool($t) && !$t) {
            throw new SmartyException("Unable to read templates {$source->type} '{$source->name}'");
        }
        return $content;
    }

    /**
     * Determine basename for compiled filename
     *
     * @param Smarty_Template_Source $source source object
     *
     * @return string                 resource's basename
     */
    public function getBasename(Smarty_Template_Source $source)
    {
        return basename($source->name);
    }
}
