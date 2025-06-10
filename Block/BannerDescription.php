<?php

namespace Navin\BugBotDemo\Block;
use Mageplaza\BannerSlider\Block\Adminhtml\Banner\Edit\Tab\Render\Image as BannerImage;


class BannerDescription
{
    /**
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry;

    /**
     * @var \Mageplaza\BannerSlider\Helper\Image
     */
    protected $imageHelper;

    /**
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Mageplaza\BannerSlider\Helper\Image
     */
    public function __construct(
        \Magento\Framework\Registry $coreRegistry,
        \Mageplaza\BannerSlider\Helper\Image $imageHelper
    ) {
        $this->_coreRegistry     = $coreRegistry;
        $this->imageHelper = $imageHelper;
    }

    public function aroundGetFormHtml(\Mageplaza\BannerSlider\Block\Adminhtml\Banner\Edit\Tab\Banner $subject, \Closure $proceed)
    {
        $banner = $this->_coreRegistry->registry('mpbannerslider_banner');
        $form = $subject->getForm();
        if (is_object($form)) {

            $fieldset = $form->getElement('base_fieldset');
            $fieldset->addField('description', 'text', [
                'name'     => 'description',
                'label'    => __('Description'),
                'title'    => __('Description'),
                'required' => false,
            ]);

            $fieldset->addField('mobile_image', BannerImage::class, [
                'name' => 'mobile_image',
                'label' => __('Mobile Upload Image'),
                'title' => __('Mobile Upload Image'),
                'path' => $this->imageHelper->getBaseMediaPath(\Mageplaza\BannerSlider\Helper\Image::TEMPLATE_MEDIA_TYPE_BANNER),
                'required' => false
            ]);

            if($banner->getData()){
                $form->addValues($banner->getData());
            }
            $subject->setForm($form);
        }
        return $proceed();
    }
}
