<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

class KlipShop extends Module
{
    public function __construct()
    {
        $this->name = 'klipshop';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Dainius, Vilius, Linas';
        $this->need_instance = 0;
        $this->bootstrap = true;

        parent::__construct();


        $this->description = $this->trans('Sharing cart module created by Dainius, Vilius and Linas', [], 'Modules.KlipShop.Admin');
    }

    public function install()
    {
        return parent::install()
        && $this->registerHook('displayExpressCheckout');
    }

    public function uninstall()
    {
        return parent::uninstall()
        && $this->unregisterHook('displayExpressCheckout');
    }

    public function hookDisplayExpressCheckout($params)
    {
        $cart = $this->context->cart;
        $cartId = (int)$cart->id;
        $shareLink = $this->context->link->getModuleLink('klipshop', 'cart',
        ['id_cart' => $cartId]);
        $this->context->smarty->assign('share_link', $shareLink);

        return $this->display(__FILE__, 'views/templates/cart.tpl');
    }
}