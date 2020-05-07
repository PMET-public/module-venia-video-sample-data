<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace MagentoEse\VeniaVideoSampleData\Setup;

use Magento\Framework\Setup;
use Magento\Indexer\Model\Processor as Indexer;

class Installer implements Setup\SampleData\InstallerInterface
{
    /**
     * App State
     *
     * @var \Magento\Framework\App\State
     */
    protected $state;

   /** @var \MagentoEse\VeniaVideoSampleData\Model\Video  */
    protected $video;


    /** @var Indexer  */
    protected $indexer;


    /**
     * Installer constructor.
     * @param \Magento\Framework\App\State $state
     * @param \MagentoEse\VeniaVideoSampleData\Model\Video $video
     * @param Indexer $index
     */
    public function __construct(
        \Magento\Framework\App\State $state,
        \MagentoEse\VeniaVideoSampleData\Model\Video $video,
        Indexer $index
    ) {
        $this->video = $video;
        $this->indexer = $index;
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
        //$this->indexer->reindexAll();
        //add video
        $this->video->install(['MagentoEse_VeniaVideoSampleData::fixtures/veniaVideo.csv']);
    }
}
