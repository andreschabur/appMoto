<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrdersProductsDownload
 *
 * @ORM\Table(name="orders_products_download", indexes={@ORM\Index(name="idx_orders_products_download_orders_id", columns={"orders_id"})})
 * @ORM\Entity
 */
class OrdersProductsDownload
{
    /**
     * @var integer
     *
     * @ORM\Column(name="orders_products_download_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ordersProductsDownloadId;

    /**
     * @var integer
     *
     * @ORM\Column(name="orders_id", type="integer", nullable=false)
     */
    private $ordersId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="orders_products_id", type="integer", nullable=false)
     */
    private $ordersProductsId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="orders_products_filename", type="string", length=255, nullable=false)
     */
    private $ordersProductsFilename = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="download_maxdays", type="integer", nullable=false)
     */
    private $downloadMaxdays = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="download_count", type="integer", nullable=false)
     */
    private $downloadCount = '0';



    /**
     * Get ordersProductsDownloadId
     *
     * @return integer 
     */
    public function getOrdersProductsDownloadId()
    {
        return $this->ordersProductsDownloadId;
    }

    /**
     * Set ordersId
     *
     * @param integer $ordersId
     * @return OrdersProductsDownload
     */
    public function setOrdersId($ordersId)
    {
        $this->ordersId = $ordersId;

        return $this;
    }

    /**
     * Get ordersId
     *
     * @return integer 
     */
    public function getOrdersId()
    {
        return $this->ordersId;
    }

    /**
     * Set ordersProductsId
     *
     * @param integer $ordersProductsId
     * @return OrdersProductsDownload
     */
    public function setOrdersProductsId($ordersProductsId)
    {
        $this->ordersProductsId = $ordersProductsId;

        return $this;
    }

    /**
     * Get ordersProductsId
     *
     * @return integer 
     */
    public function getOrdersProductsId()
    {
        return $this->ordersProductsId;
    }

    /**
     * Set ordersProductsFilename
     *
     * @param string $ordersProductsFilename
     * @return OrdersProductsDownload
     */
    public function setOrdersProductsFilename($ordersProductsFilename)
    {
        $this->ordersProductsFilename = $ordersProductsFilename;

        return $this;
    }

    /**
     * Get ordersProductsFilename
     *
     * @return string 
     */
    public function getOrdersProductsFilename()
    {
        return $this->ordersProductsFilename;
    }

    /**
     * Set downloadMaxdays
     *
     * @param integer $downloadMaxdays
     * @return OrdersProductsDownload
     */
    public function setDownloadMaxdays($downloadMaxdays)
    {
        $this->downloadMaxdays = $downloadMaxdays;

        return $this;
    }

    /**
     * Get downloadMaxdays
     *
     * @return integer 
     */
    public function getDownloadMaxdays()
    {
        return $this->downloadMaxdays;
    }

    /**
     * Set downloadCount
     *
     * @param integer $downloadCount
     * @return OrdersProductsDownload
     */
    public function setDownloadCount($downloadCount)
    {
        $this->downloadCount = $downloadCount;

        return $this;
    }

    /**
     * Get downloadCount
     *
     * @return integer 
     */
    public function getDownloadCount()
    {
        return $this->downloadCount;
    }
}
