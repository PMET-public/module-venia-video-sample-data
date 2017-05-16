<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace MagentoEse\VeniaVideoSampleData\Setup;

use Magento\Framework\Setup;

class Installer implements Setup\SampleData\InstallerInterface
{
    /**
     * App State
     *
     * @var \Magento\Framework\App\State
     */
    protected $state;

    /**
     * @var \MagentoEse\VeniaCatalogSampleData\Model\Video
     */
    protected $video;


    /**
     * @param \Magento\Framework\App\State $state
     * @param \MagentoEse\VeniaCatalogSampleData\Model\Video $video
     */


    public function __construct(
        \Magento\Framework\App\State $state,
        \MagentoEse\VeniaCatalogSampleData\Model\Video $video
    ) {
        $this->video = $video;
        try{
            $state->setAreaCode('adminhtml');
        }
        catch(\Magento\Framework\Exception\LocalizedException $e){
            // left empty
        }

    }

    /**
     * {@inheritdoc}
     */
    public function install()
    {
        //add video
        $this->video->install(['MagentoEse_VeniaVideoSampleData::fixtures/veniaVideo.csv']);
    }
}