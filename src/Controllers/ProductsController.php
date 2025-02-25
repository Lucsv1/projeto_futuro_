<?php
namespace Admin\Project\Controllers;

use Admin\Project\Models\Products;

class ProductsController
{

    private $nameProduct;
    private $priceProduct;
    private $priceCost;
    private $descriptionProduct;
    private $quantityStorage;
    private $statusProduct;

    public function getNameProduct()
    {
        return $this->nameProduct;
    }

    public function getPriceProduct()
    {
        return $this->priceProduct;
    }

    public function setNameProduct($nameProduct)
    {
        $this->nameProduct = $nameProduct;

        return $this;
    }

    public function setPriceProduct($price)
    {
        $this->priceProduct = $price;

        return $this;
    }

    /**
     * Get the value of descriptionProduct
     */
    public function getDescriptionProduct()
    {
        return $this->descriptionProduct;
    }

    /**
     * Set the value of descriptionProduct
     */
    public function setDescriptionProduct($descriptionProduct): self
    {
        $this->descriptionProduct = $descriptionProduct;

        return $this;
    }

    /**
     * Get the value of quantityStorage
     */
    public function getQuantityStorage()
    {
        return $this->quantityStorage;
    }

    /**
     * Set the value of quantityStorage
     */
    public function setQuantityStorage($quantityStorage): self
    {
        $this->quantityStorage = $quantityStorage;

        return $this;
    }

     /**
     * Get the value of statusProduct
     */
    public function getStatusProduct()
    {
        return $this->statusProduct;
    }

    /**
     * Set the value of statusProduct
     */
    public function setStatusProduct($statusProduct): self
    {
        $this->statusProduct = $statusProduct;

        return $this;
    }

    /**
     * Get the value of priceCost
     */ 
    public function getPriceCost()
    {
        return $this->priceCost;
    }

    /**
     * Set the value of priceCost
     *
     * @return  self
     */ 
    public function setPriceCost($priceCost)
    {
        $this->priceCost = $priceCost;

        return $this;
    }


    public function createProduct()
    {

        $data_product = [
            "nameProduct" => $this->getNameProduct(),
            "descriptionProduct" => $this->getDescriptionProduct(),
            "quantityStorage" => $this->getQuantityStorage(),
            "priceProduct" => $this->getPriceProduct(),
            "priceCost" => $this->getPriceCost()
        ];

        $productManager = new Products();

        $productManager->saveDatasProducts($data_product);

    }

    public function listProducts()
    {
        $productsConfig = new Products();

        $datas = $productsConfig->getDatasProducts();

        if (empty($datas)) {
            return false;
        }

        return $datas;

    }

    public function getProductsById($id)
    {

        $productsConfig = new Products();

        $datas = $productsConfig->getDatasProductsById($id);

        if (empty($datas)) {
            return false;
        }

        return $datas;

    }
    

    public function editProducts($id)
    {
        $data_product = [
            "nameProduct" => $this->getNameProduct(),
            "descriptionProduct" => $this->getDescriptionProduct(),
            "quantityStorage" => $this->getQuantityStorage(),
            "priceProduct" => $this->getPriceProduct(),
            "priceCost" => $this->getPriceCost(),
            "statusProduct" => $this->getStatusProduct()
        ];

        $productsConfig = new Products();

        $productsConfig->editDatasProducts($id, $data_product);
    }

    public function deleteProducts($id){

        $productsConfig = new Products();

        $productsConfig->delDatasProducts($id); 

    }

    public function productsSold($id, $solded){

        $productsConfig = new Products();

        $datas = $this->getProductsById($id);

        $sold = $datas[0]->Quantidade_Estoque - $solded;

        $productsConfig->datasProductsSold($id, $sold);

    }



   

    
}