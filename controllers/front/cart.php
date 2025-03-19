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

        $this->context->smarty->assign([
            'products' => $productIds,
        ]);
        $this->setTemplate('module:klipshop/views/templates/data.tpl');
    }

}
