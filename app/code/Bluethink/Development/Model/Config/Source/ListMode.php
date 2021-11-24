<?php 
namespace Bluethink\Development\Model\Config\Source;

class ListMode implements \Magento\Framework\Data\OptionSourceInterface
{
 public function toOptionArray()
 {
  return [
    ['value' => '100000', 'label' => __('100000')],
    ['value' => '200000', 'label' => __('200000')],
    ['value' => '300000', 'label' => __('300000')],
    ['value' => '400000', 'label' => __('400000')]
  ];
 }
}