<?php

class NewsMetaTags extends \Frontend
{
    public function generateMedaTags($objPage, $objLayout, $objPageRegular)
    {

        if (!$this->Input->get('items')) {
            return; //no news
        }

        //Datenbank
        $objDBResults = \Database::getInstance()->prepare(
            "SELECT meta_title, meta_description,singleSRC from tl_news WHERE alias=? AND published=1"
        )
            ->limit(1)
            ->execute($this->Input->get('items'));


        if ($objDBResults->numRows < 1) {
            return; //not found !!
        }

        global $objPage;

        if ($objDBResults->meta_title != '') {
            $objPage->pageTitle = $objDBResults->meta_title;
        }

        if ($objDBResults->meta_description != '') {
            $objPage->description = $objDBResults->meta_description;
        }

        //Twitter Card hinzufügen
        $GLOBALS['TL_HEAD'][] = '<meta name="twitter:card" content="summary_large_image">';
        $GLOBALS['TL_HEAD'][] = '<meta name="twitter:site" content="@fenepedia">';
        $GLOBALS['TL_HEAD'][] = '<meta name="twitter:title" content="' . $objPage->pageTitle . '">';
        $GLOBALS['TL_HEAD'][] = '<meta name="twitter:description" content="' . $objPage->description . '"> ';

        // Add facebook meta data
        //debug with https://developers.facebook.com/tools/debug

        if ($objDBResults->singleSRC != '') {
            $objFile = \FilesModel::findByPk($objDBResults->singleSRC);

            $ogimage = $this->Environment->base . \Controller::getImage($this->urlEncode($objFile->path), 1200, 630, 'center_bottom');
        }


        $GLOBALS['TL_HEAD'][] = '<meta property="og:title" content="' . $objPage->pageTitle . '" />';
        $GLOBALS['TL_HEAD'][] = '<meta property="og:description" content="' . $objPage->description . '" />';
        $GLOBALS['TL_HEAD'][] = '<meta property="og:url" content="' . $this->Environment->base . $this->Environment->request . '" />';
        $GLOBALS['TL_HEAD'][] = '<meta property="og:type" content="article"/>';
        $GLOBALS['TL_HEAD'][] = '<meta property="og:image" content="' . $ogimage . '" />';

    }
}

?>