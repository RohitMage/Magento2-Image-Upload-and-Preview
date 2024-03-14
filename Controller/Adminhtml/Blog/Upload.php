<?php

namespace Web30india\Uiform\Controller\Adminhtml\Blog;

use Magento\Framework\Controller\ResultFactory;

class Upload extends \Magento\Backend\App\Action
{
    protected $imageUploader;

	public function __construct(
		\Magento\Backend\App\Action\Context $context,
		\Web30india\Uiform\Model\ImageUploader $imageUploader
	) {
		parent::__construct($context);
		$this->imageUploader = $imageUploader;
	}

    /**
     * @return mixed
     */
	public function _isAllowed() {
		return $this->_authorization->isAllowed('Web30india_Uiform::upload');
	}

    /**
     * @return mixed
     */
    public function execute() {
		try {
			$result = $this->imageUploader->saveFileToTmpDir('image');
			$result['cookie'] = [
				'name' => $this->_getSession()->getName(),
				'value' => $this->_getSession()->getSessionId(),
				'lifetime' => $this->_getSession()->getCookieLifetime(),
				'path' => $this->_getSession()->getCookiePath(),
				'domain' => $this->_getSession()->getCookieDomain(),
			];
		} catch (\Exception $e) {
			$result = ['error' => $e->getMessage(), 'errorcode' => $e->getCode()];
		}
		return $this->resultFactory->create(ResultFactory::TYPE_JSON)->setData($result);
	}
}