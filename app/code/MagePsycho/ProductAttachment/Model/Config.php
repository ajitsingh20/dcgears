<?php

namespace MagePsycho\ProductAttachment\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

/**
 * @category   MagePsycho
 * @package    MagePsycho_ProductAttachment
 * @author     Raj KB <magepsycho@gmail.com>
 * @website    https://www.magepsycho.com
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Config implements ConfigInterface
{
    const XML_PATH_ENABLED = 'magepsycho_productattachment/general/enabled';
    const XML_PATH_DEBUG = 'magepsycho_productattachment/general/debug';

    const XML_PATH_ATTACHMENT_TAB_LABEL = 'magepsycho_productattachment/attachment/tab_label';
    const XML_PATH_ATTACHMENT_DOWNLOAD_LABEL = 'magepsycho_productattachment/attachment/download_label';
    const XML_PATH_ATTACHMENT_ALLOWED_EXTENSIONS = 'magepsycho_productattachment/attachment/allowed_extensions';

    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @inheritDoc
     */
    public function getConfigFlag($xmlPath, $storeId = null)
    {
        return $this->scopeConfig->isSetFlag(
            $xmlPath,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    /**
     * @inheritDoc
     */
    public function getConfigValue($xmlPath, $storeId = null)
    {
        return $this->scopeConfig->getValue(
            $xmlPath,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    public function isEnabled($storeId = null)
    {
        return $this->getConfigFlag(self::XML_PATH_ENABLED, $storeId);
    }

    public function isDebugEnabled($storeId = null)
    {
        return $this->getConfigFlag(self::XML_PATH_DEBUG, $storeId);
    }

    public function getAttachmentTabLabel($storeId = null)
    {
        return $this->getConfigValue(self::XML_PATH_ATTACHMENT_TAB_LABEL, $storeId);
    }

    public function getAttachmentDownloadLabel($storeId = null)
    {
        return $this->getConfigValue(self::XML_PATH_ATTACHMENT_DOWNLOAD_LABEL, $storeId);
    }

    public function getAttachmentAllowedExtensions($storeId = null)
    {
        $value = $this->getConfigValue(self::XML_PATH_ATTACHMENT_ALLOWED_EXTENSIONS, $storeId);
        return explode(',', $value);
    }
}
