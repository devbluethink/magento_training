<?php 

namespace Bluethink\Hello\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Image extends AbstractDb {
  protected function _construct () {
    return $this->_init('bluethink_images', 'image_id');
  }
}