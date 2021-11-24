<?php 

namespace Bluethink\Hello\Controller\Adminhtml\Manage;

class Upload extends \Magento\Backend\App\Action {

  /**
   *
   * @var \Magento\Framework\View\Result\PageFactory
   */
  protected $resultPageFactory;

  public function __construct(
    \Magento\Backend\App\Action\Context $context,
    \Magento\Framework\View\Result\PageFactory $resultPageFactory
  )
  {
    parent::__construct($context);
    $this->resultPageFactory = $resultPageFactory;
  }

  public function execute()
  {
    /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
    $resultPage = $this->resultPageFactory->create();
    $resultPage->setActiveMenu('Bluethink_Hello::manage');
    $resultPage->getConfig()->getTitle()->prepend(__('Manage Blog'));
    return $resultPage;
  }
}