<?php
namespace Training\Breadcrumbs\Plugin;
class BreadcrumbsPlugin
{
    public function beforeAddCrumb(\Magento\Theme\Block\Html\Breadcrumbs $subject, $crumbName, $crumbInfo)
    {
          if (is_array($crumbInfo)) {
                if (isset($crumbInfo['label'])) {
                    $crumbInfo['label'] .= ' !';
                }
            }
        return [$crumbName, $crumbInfo];
    }
}