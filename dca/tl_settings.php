<?php
/**
* Extend default palette
*/
$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] .= ';{custom_meta_tags},twitter_id';

/**
* Add fields
*/
$GLOBALS['TL_DCA']['tl_settings']['fields']['twitter_id'] = [
    'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['twitter_id'],
    'exclude'                 => true,
    'inputType'               => 'text',
    'eval'                    => array('mandatory'=>false, 'tl_class'=>'w50'),
];