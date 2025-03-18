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


        $this->description = $this->trans('Sharing cart module created by Dainius, Vilius and Linas', [], 'Modules.KlipShop.Admin');
    }

    public function install()
    {
        return parent::install();
    }

    public function uninstall()
    {
        return parent::uninstall();
    }
}