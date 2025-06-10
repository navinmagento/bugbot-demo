<?php

class BugBot
{
    protected $_productRepository;
    public function __construct(
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository
    ) {
        $this->_productRepository = $productRepository;
    }
    public function getProduct($productId){
        $product = $this->_productRepository->getById($productId);
        return $product;
    }

    public function getProductBySku($sku){
        $product = $this->_productRepository->getById($sku);
        return $product;
    }
}