<?php

class KlipShopCartModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        parent::initContent();
        $cart = $this->context->cart;

        $productIds = [];

        if ($cart && $cart->id) {
            $products = $cart->getProducts();
            foreach ($products as $product) {
                $productIds[] = [
                    'id' => $product['id_product'],
                    'name' => $product['name'],
                ];
            }
        }

        echo json_encode($productIds);
        exit;
    }

}
