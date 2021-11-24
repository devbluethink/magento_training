<?php 

namespace Bluethink\Hello\Model\ResourceModel\Image;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use VENDOR\ImageUploader\Model\Image;
use VENDOR\ImageUploader\Model\ResourceModel\Image as ResourceModelImage;

class Collection extends AbstractCollection {
  protected function _construct()
  {
    $this->_init(Image::class, ResourceModelImage::class);
  }
}