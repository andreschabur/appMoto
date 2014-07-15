<?php

namespace miMoto\EntidadesBundle\Entity;

use Symfony\Component\HttpFoundation\File\UploadedFile;

use Doctrine\ORM\Mapping as ORM;


/**
 * ProductsImages
 *
 * @ORM\Table(name="products_images", indexes={@ORM\Index(name="products_images_prodid", columns={"products_id"})})
 * @ORM\Entity
 */
class ProductsImages
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ var integer
     *
     * @ ORM\Column(name="products_id", type="integer", nullable=false)
     */
    
    /**
     * @var \Products
     *
     * @ORM\ManyToOne(targetEntity="Products")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="products_id", referencedColumnName="products_id")
     * })
     */
    private $productsId;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=64, nullable=true)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="htmlcontent", type="text", nullable=true)
     */
    private $htmlcontent;

    /**
     * @var integer
     *
     * @ORM\Column(name="sort_order", type="integer", nullable=false)
     */
    private $sortOrder;
    
     //**********************************************************************************************
    //**********************************************************************************************
    //**************************INICIO SUBIR UNA FOTO***********************************************
    //**********************************************************************************************
    //**********************************************************************************************
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $path;
    
    /**
     * @ Assert\File(maxSize="6000000")
     */
    private $fileImage;
    
    private $nombreImagen;
    
    public function getPath() {
        return $this->path;
    }

    public function setPath($path) {
        $this->path = $path;
    }

        

    public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path
            ? null
            : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/documents';
    }        

    /**
     * Sets file.
     *
     * @param UploadedFile $fileImage
     */
    public function setFileImage(UploadedFile $productsFileImage = null)
    {
        $this->fileImage = $productsFileImage;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getfileImage()
    {
        return $this->fileImage;
    }
    
    public function upload(){
        // the file property can be empty if the field is not required
        if (null === $this->getfileImage()) {
            return;
        }

        // use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and then the
        // target filename to move to
        $this->getfileImage()->move(
            $this->getUploadRootDir(),
            $this->getfileImage()->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->path = $this->getfileImage()->getClientOriginalName();
        $this->image = $this->getfileImage()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->fileImage = null;
    }
    
    public function getNombreImagen() {
        return $this->getPath();        
    }    

        
    //****************************************************************************************
    //****************************************************************************************
    //*********************************FIN SUBIR UNA FOTO**************************
    //****************************************************************************************
    //****************************************************************************************



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set productsId
     *
     * @param integer $productsId
     * @return ProductsImages
     */
    public function setProductsId($productsId)
    {
        $this->productsId = $productsId;

        return $this;
    }

    /**
     * Get productsId
     *
     * @return integer 
     */
    public function getProductsId()
    {
        return $this->productsId;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return ProductsImages
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set htmlcontent
     *
     * @param string $htmlcontent
     * @return ProductsImages
     */
    public function setHtmlcontent($htmlcontent)
    {
        $this->htmlcontent = $htmlcontent;

        return $this;
    }

    /**
     * Get htmlcontent
     *
     * @return string 
     */
    public function getHtmlcontent()
    {
        return $this->htmlcontent;
    }

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     * @return ProductsImages
     */
    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * Get sortOrder
     *
     * @return integer 
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }
}
