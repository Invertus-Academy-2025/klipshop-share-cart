<?php

class KlipshopCartModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        parent::initContent();
        $token = Tools::getValue('token');
        $original_cart_id = Db::getInstance()->getValue(
        'SELECT cart_id FROM '._DB_PREFIX_.'sharecart_links WHERE token= "'.pSQL($token).'"'
        );

        if (!$original_cart_id) {
            Tools::redirect($this->context->link->getPageLink('index', null, null, ['cart_error' => 1]));
        }

        $original_cart = new Cart((int) $original_cart_id);
        $new_cart = new Cart();
        $new_cart->id_currency = (int)$this->context->currency->id;
        $new_cart->id_lang = (int)$this->context->language->id;
        $new_cart->add();

        foreach ($original_cart->getProducts() as $product) {
            $new_cart->updateQty(
                (int)$product['cart_quantity'],
                (int)$product['id_product'],
                (int)$product['id_product_attribute']
            );
        }

        $this->context->cart = $new_cart;
        $this->context->cookie->id_cart = (int)$new_cart->id;
        Tools::redirect('index.php?controller=cart&action=show');
    }
}