<?php

$GLOBALS['TL_DCA']['tl_news']['palettes']['default'] = str_replace('{date_legend}', '{seo_legend},meta_title,meta_description,;{date_legend}', $GLOBALS['TL_DCA']['tl_news']['palettes']['default']);


/**
 * Fields
 */
 
$GLOBALS['TL_DCA']['tl_news']['fields']['meta_title'] = array
(
            'label'     => &$GLOBALS['TL_LANG']['tl_news']['meta_title'],
            'exclude'   => true,
			'search'    => true,
            'inputType' => 'text',
            'eval'      => array('tl_class'	=>	'w50'),
            'sql'       => "varchar(255) NOT NULL default ''"
);

 $GLOBALS['TL_DCA']['tl_news']['fields']['meta_description'] = array
(
    	'label'                   => &$GLOBALS['TL_LANG']['tl_news']['meta_description'],
    	'inputType'               => 'textarea',
    	'eval'                    => array('tl_class'=>'clr'),
    	'sql'                     => "text NULL"
);