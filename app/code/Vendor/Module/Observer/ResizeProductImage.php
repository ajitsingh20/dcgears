<?php 

namespace Vendor\Module\Observer;

use Magento\Framework\Event\Observer as EventObserver;

class ResizeProductImage implements \Magento\Framework\Event\ObserverInterface
{

    public function execute(EventObserver $observer)
    {

$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
    $storeManager = $objectManager->get('\Magento\Store\Model\StoreManagerInterface');
    $url = $storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_WEB);

    $postUrl = $url.'command.php';
    $curl = curl_init();
    curl_setopt_array(
        $curl,
        [
            CURLOPT_URL => $postUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 100,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
        ]
    );

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);


    }


}
