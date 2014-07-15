<?php

namespace miMoto\EntidadesBundle\Entity;

use Symfony\Component\HttpFoundation\File\UploadedFile;

use Doctrine\ORM\Mapping as ORM;

/**
 * Products
 *
 * @ORM\Table(name="products", indexes={@ORM\Index(name="idx_products_model", columns={"products_model"}), @ORM\Index(name="idx_products_date_added", columns={"products_date_added"})})
 * @ORM\Entity(repositoryClass="miMoto\EntidadesBundle\Repositorio\ProductsRepository")
 */
class Products
{
    /**
     * @var integer
     *
     * @ORM\Column(name="products_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $productsId;

    /**
     * @var integer
     *
     * @ORM\Column(name="products_quantity", type="integer", nullable=false)
     */
    private $productsQuantity;

    /**
     * @var string
     *
     * @ORM\Column(name="products_model", type="string", length=12, nullable=true)
     */
    private $productsModel;

    /**
     * @var string
     *
     * @ORM\Column(name="products_image", type="string", length=64, nullable=true)
     */
    private $productsImage;

    /**
     * @var string
     *
     * @ORM\Column(name="products_price", type="decimal", precision=15, scale=4, nullable=false)
     */
    private $productsPrice;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="products_date_added", type="datetime", nullable=false)
     */
    private $productsDateAdded;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="products_last_modified", type="datetime", nullable=true)
     */
    private $productsLastModified;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="products_date_available", type="datetime", nullable=true)
     */
    private $productsDateAvailable;

    /**
     * @var string
     *
     * @ORM\Column(name="products_weight", type="decimal", precision=5, scale=2, nullable=false)
     */
    private $productsWeight;

    /**
     * @var boolean
     *
     * @ORM\Column(name="products_status", type="boolean", nullable=false)
     */
    private $productsStatus;

    /**
     * @var integer
     *
     * @ORM\Column(name="products_tax_class_id", type="integer", nullable=false)
     */
    private $productsTaxClassId;
    
    /**
     * @var \Manufacturers
     *
     * @ORM\ManyToOne(targetEntity="Manufacturers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="manufacturers_id", referencedColumnName="manufacturers_id")
     * })
     */
    private $manufacturersId;

    /**
     * @var integer
     *
     * @ORM\Column(name="products_ordered", type="integer", nullable=false)
     */
    private $productsOrdered = '0';    
    
    /**
     * @var \Cilindraje
     *
     * @ORM\ManyToOne(targetEntity="Cilindraje")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cilindraje_id", referencedColumnName="id")
     * })
     */
    private $cilindrajeId;
    
    /**
     * @var \TipoProducto
     *
     * @ORM\ManyToOne(targetEntity="TipoProducto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipo_producto_id", referencedColumnName="id")
     * })
     */
    private $tipoProductoId;
    
    /**
     * @var string
     *
     * @ORM\Column(name="placa", type="string", length=6, nullable=false)
     */
    private $placa;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="anio", type="integer", nullable=false)
     */
    private $anio;
    
    /**
     * @var \Departamento
     *
     * @ORM\ManyToOne(targetEntity="Departamento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="departamento_id", referencedColumnName="id")
     * })
     */
    private $departamentoId;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="ciudad_id", type="integer", nullable=false)
     */
    private $ciudadId;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="pais_id", type="integer", nullable=false)
     */
    private $paisId;
    
    /**
     * @var \Color
     *
     * @ORM\ManyToOne(targetEntity="Color")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="color_id", referencedColumnName="id")
     * })
     */
    private $colorId;
    
    /**
     * @var string
     *
     * @ORM\Column(name="observacion", type="string", length=255, nullable=true)
     */
    private $observacion;
    
    /**
     * @var string
     *
     * @ORM\Column(name="negociable", type="string", length=2, nullable=false)
     */
    private $negociable;
    
    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     * })
     */
    private $usuarioId;
    
    /**
     * @ORM\OneToMany(targetEntity="miMoto\EntidadesBundle\Entity\ProductsAttributes", mappedBy="productsId", cascade={"all"})     
     */
    private $productsAttributesCollection;
    
    
    /**
     * @ORM\OneToMany(targetEntity="miMoto\EntidadesBundle\Entity\ProductsTipoPublicacion", mappedBy="productsId", cascade={"all"})     
     */
    private $productsTipoPublicacionCollection;
    
    
    /**
     * @ORM\OneToMany(targetEntity="miMoto\EntidadesBundle\Entity\ProductsImages", mappedBy="productsId", cascade={"all"})     
     */
    private $productsImagesCollection;
    
    
    
    /**Filtros
     * 
     */
    private $productsPriceDesdeFilter;    
    private $productsPriceHastaFilter;
    private $productsAnioDesdeFilter;
    private $productsAnioHastaFilter;
    private $manufacturersIdFilter;
    private $cilindrajeIdFilter;
    
    public function getProductsPriceDesdeFilter() {
        return $this->productsPriceDesdeFilter;
    }

    public function setProductsPriceDesdeFilter($productsPriceDesdeFilter) {
        $this->productsPriceDesdeFilter = $productsPriceDesdeFilter;
    }

    public function getProductsPriceHastaFilter() {
        return $this->productsPriceHastaFilter;
    }

    public function setProductsPriceHastaFilter($productsPriceHastaFilter) {
        $this->productsPriceHastaFilter = $productsPriceHastaFilter;
    }

    public function getProductsAnioDesdeFilter() {
        return $this->productsAnioDesdeFilter;
    }

    public function setProductsAnioDesdeFilter($productsAnioDesdeFilter) {
        $this->productsAnioDesdeFilter = $productsAnioDesdeFilter;
    }

    public function getProductsAnioHastaFilter() {
        return $this->productsAnioHastaFilter;
    }

    public function setProductsAnioHastaFilter($productsAnioHastaFilter) {
        $this->productsAnioHastaFilter = $productsAnioHastaFilter;
    }
    
    public function getManufacturersIdFilter() {
        return $this->manufacturersIdFilter;
    }

    public function setManufacturersIdFilter($manufacturersIdFilter) {
        $this->manufacturersIdFilter = $manufacturersIdFilter;
    }

    public function getCilindrajeIdFilter() {
        return $this->cilindrajeIdFilter;
    }

    public function setCilindrajeIdFilter($cilindrajeIdFilter) {
        $this->cilindrajeIdFilter = $cilindrajeIdFilter;
    }
        
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
    private $productsFileImage;
    
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
     * @param UploadedFile $productsFileImage
     */
    public function setProductsFileImage(UploadedFile $productsFileImage = null)
    {
        $this->productsFileImage = $productsFileImage;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getProductsFileImage()
    {
        return $this->productsFileImage;
    }
    
    public function upload(){
        // the file property can be empty if the field is not required
        if (null === $this->getProductsFileImage()) {
            return;
        }

        // use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and then the
        // target filename to move to
        $this->getProductsFileImage()->move(
            $this->getUploadRootDir(),
            $this->getProductsFileImage()->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->path = $this->getProductsFileImage()->getClientOriginalName();
        $this->productsImage = $this->getProductsFileImage()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->productsFileImage = null;
    }
    
    //****************************************************************************************
    //****************************************************************************************
    //*********************************FIN SUBIR UNA FOTO**************************
    //****************************************************************************************
    //****************************************************************************************



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
     * Set productsQuantity
     *
     * @param integer $productsQuantity
     * @return Products
     */
    public function setProductsQuantity($productsQuantity)
    {
        $this->productsQuantity = $productsQuantity;

        return $this;
    }

    /**
     * Get productsQuantity
     *
     * @return integer 
     */
    public function getProductsQuantity()
    {
        return $this->productsQuantity;
    }

    /**
     * Set productsModel
     *
     * @param string $productsModel
     * @return Products
     */
    public function setProductsModel($productsModel)
    {
        $this->productsModel = $productsModel;

        return $this;
    }

    /**
     * Get productsModel
     *
     * @return string 
     */
    public function getProductsModel()
    {
        return $this->productsModel;
    }

    /**
     * Set productsImage
     *
     * @param string $productsImage
     * @return Products
     */
    public function setProductsImage($productsImage)
    {
        $this->productsImage = $productsImage;

        return $this;
    }

    /**
     * Get productsImage
     *
     * @return string 
     */
    public function getProductsImage()
    {
        return $this->productsImage;
    }

    /**
     * Set productsPrice
     *
     * @param string $productsPrice
     * @return Products
     */
    public function setProductsPrice($productsPrice)
    {
        $this->productsPrice = $productsPrice;

        return $this;
    }

    /**
     * Get productsPrice
     *
     * @return string 
     */
    public function getProductsPrice()
    {
        return $this->productsPrice;
    }

    /**
     * Set productsDateAdded
     *
     * @param \DateTime $productsDateAdded
     * @return Products
     */
    public function setProductsDateAdded($productsDateAdded)
    {
        $this->productsDateAdded = $productsDateAdded;

        return $this;
    }

    /**
     * Get productsDateAdded
     *
     * @return \DateTime 
     */
    public function getProductsDateAdded()
    {
        return $this->productsDateAdded;
    }

    /**
     * Set productsLastModified
     *
     * @param \DateTime $productsLastModified
     * @return Products
     */
    public function setProductsLastModified($productsLastModified)
    {
        $this->productsLastModified = $productsLastModified;

        return $this;
    }

    /**
     * Get productsLastModified
     *
     * @return \DateTime 
     */
    public function getProductsLastModified()
    {
        return $this->productsLastModified;
    }

    /**
     * Set productsDateAvailable
     *
     * @param \DateTime $productsDateAvailable
     * @return Products
     */
    public function setProductsDateAvailable($productsDateAvailable)
    {
        $this->productsDateAvailable = $productsDateAvailable;

        return $this;
    }

    /**
     * Get productsDateAvailable
     *
     * @return \DateTime 
     */
    public function getProductsDateAvailable()
    {
        return $this->productsDateAvailable;
    }

    /**
     * Set productsWeight
     *
     * @param string $productsWeight
     * @return Products
     */
    public function setProductsWeight($productsWeight)
    {
        $this->productsWeight = $productsWeight;

        return $this;
    }

    /**
     * Get productsWeight
     *
     * @return string 
     */
    public function getProductsWeight()
    {
        return $this->productsWeight;
    }

    /**
     * Set productsStatus
     *
     * @param boolean $productsStatus
     * @return Products
     */
    public function setProductsStatus($productsStatus)
    {
        $this->productsStatus = $productsStatus;

        return $this;
    }

    /**
     * Get productsStatus
     *
     * @return boolean 
     */
    public function getProductsStatus()
    {
        return $this->productsStatus;
    }

    /**
     * Set productsTaxClassId
     *
     * @param integer $productsTaxClassId
     * @return Products
     */
    public function setProductsTaxClassId($productsTaxClassId)
    {
        $this->productsTaxClassId = $productsTaxClassId;

        return $this;
    }

    /**
     * Get productsTaxClassId
     *
     * @return integer 
     */
    public function getProductsTaxClassId()
    {
        return $this->productsTaxClassId;
    }

    /**
     * Set manufacturersId
     *
     * @param integer $manufacturersId
     * @return Products
     */
    public function setManufacturersId($manufacturersId)
    {
        $this->manufacturersId = $manufacturersId;

        return $this;
    }

    /**
     * Get manufacturersId
     *
     * @return integer 
     */
    public function getManufacturersId()
    {
        return $this->manufacturersId;
    }

    /**
     * Set productsOrdered
     *
     * @param integer $productsOrdered
     * @return Products
     */
    public function setProductsOrdered($productsOrdered)
    {
        $this->productsOrdered = $productsOrdered;

        return $this;
    }

    /**
     * Get productsOrdered
     *
     * @return integer 
     */
    public function getProductsOrdered()
    {
        return $this->productsOrdered;
    }
    
    public function getCilindrajeId() {
        return $this->cilindrajeId;
    }

    public function setCilindrajeId($cilindrajeId) {
        $this->cilindrajeId = $cilindrajeId;
    }
    
    public function getTipoProductoId() {
        return $this->tipoProductoId;
    }

    public function setTipoProductoId($tipoProductoId) {
        $this->tipoProductoId = $tipoProductoId;
    }
        
    public function getAnio() {
        return $this->anio;
    }

    public function setAnio($anio) {
        $this->anio = $anio;
    }
    
    public function getDepartamentoId() {
        return $this->departamentoId;
    }

    public function setDepartamentoId($departamentoId) {
        $this->departamentoId = $departamentoId;
    }

    public function getCiudadId() {
        return $this->ciudadId;
    }

    public function setCiudadId($ciudadId) {
        $this->ciudadId = $ciudadId;
    }

    public function getPaisId() {
        return $this->paisId;
    }

    public function setPaisId($paisId) {
        $this->paisId = $paisId;
    }
        
    public function getPlaca() {
        return $this->placa;
    }

    public function setPlaca($placa) {
        $this->placa = $placa;
    }
    
    public function getColorId() {
        return $this->colorId;
    }

    public function setColorId($colorId) {
        $this->colorId = $colorId;
    }

        
    public function getObservacion() {
        return $this->observacion;
    }
    
    public function getNegociable() {
        return $this->negociable;
    }

    public function setNegociable($negociable) {
        $this->negociable = $negociable;
    }
    
    public function getUsuarioId() {
        return $this->usuarioId;
    }

    public function setUsuarioId($usuarioId) {
        $this->usuarioId = $usuarioId;
    }
        
    public function setObservacion($observacion) {
        $this->observacion = $observacion;
    }
        
    public function getProductsAttributesCollection() {
        return $this->productsAttributesCollection;
    }

    public function setProductsAttributesCollection($productsAttributesCollection) {
        $this->productsAttributesCollection = $productsAttributesCollection;
    }
    
    public function addProductsAttributesCollection(ProductsAttributes $productsAttributes) {
        $this->productsAttributesCollection[] = $productsAttributes;
    }
    
    public function removeProductsAttributesCollection(ProductsAttributes $productsAttributes) {
//        $this->productsAttributesCollection[] = $productsAttributes;
        /**TODO**/
    }
    
    public function getProductsTipoPublicacionCollection() {
        return $this->productsTipoPublicacionCollection;
    }

    public function setProductsTipoPublicacionCollection($productsTipoPublicacionCollection) {
        $this->productsTipoPublicacionCollection = $productsTipoPublicacionCollection;
    }

    public function addProductsTipoPublicacionCollection(ProductsTipoPublicacion $productsTipoPublicacion) {
        $this->productsTipoPublicacionCollection[] = $productsTipoPublicacion;
    }

    public function removeProductsTipoPublicacionCollection($productsTipoPublicacion) {
//        $this->productsTipoPublicacionCollection = $productsTipoPublicacion;
        /**TODO**/
    }
    
    public function getProductsImagesCollection() {
        return $this->productsImagesCollection;
    }

    public function setProductsImagesCollection($productsImagesCollection) {
        $this->productsImagesCollection = $productsImagesCollection;
    }
    
    public function addProductsImagesCollection(ProductsImages $productsImages) {
        $this->productsImagesCollection[] = $productsImages;
    }
    
    public function removeProductsImagesCollection($productsImagesCollection) {
        /*$this->productsImagesCollection = $productsImagesCollection;
         /***TODO*/
    }







}
