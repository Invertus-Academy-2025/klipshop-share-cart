<?php

class KlipShopCartModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        parent::initContent();

        $id_cart = Tools::getValue('id_cart');
        if ($id_cart) {
            $cart = new Cart((int)$id_cart);

            if (Validate::isLoadedObject($cart)) {
                $this->context->cookie->__set('id_cart', $cart->id);
                Tools::redirect('index.php?controller=cart&action=show');
            } else {
                $this->errors[] = $this->module->l('Invalid cart ID.');
            }
        }
    }

}
