<?php
if (!defined('_PS_VERSION_')) {
    exit;
}

class Testhhtest extends Module
{
    public function __construct()
    {
        $this->name = 'testhh';
        $this->tab = 'administration';
        $this->version = '1.0.0';
        $this->author = 'Your Name';
        $this->need_instance = 0;
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = 'Test name';
        $this->description = 'Test desc';
    }

    public function install()
    {
        return parent::install() 
            && $this->installDatabase()
            && $this->registerAdminTab(); // Rejestracja karty admina
    }

    private function registerAdminTab()
{
    // Utwórz nową kartę w menu administracyjnym
    $tab = new Tab();
    $tab->class_name = 'AdminTesthh'; // Nazwa klasy kontrolera
    $tab->id_parent = (int)Tab::getIdFromClassName('AdminParentModulesSf'); // Umieszczenie w sekcji Moduły
    $tab->module = $this->name;
    $tab->name = [];
    foreach (Language::getLanguages(true) as $lang) {
        $tab->name[$lang['id_lang']] = 'Testhh CRUD';
    }

    return $tab->add();
}

private function unregisterAdminTab()
{
    $id_tab = (int)Tab::getIdFromClassName('AdminTesthh');
    if ($id_tab) {
        $tab = new Tab($id_tab);
        return $tab->delete();
    }

    return true;
}


public function uninstall()
{
    return parent::uninstall() 
        && $this->uninstallDatabase() 
        && $this->unregisterAdminTab();
}


    private function installDatabase()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `" . _DB_PREFIX_ . "testhh` (
            `id_testhh` int(11) NOT NULL AUTO_INCREMENT,
            `name` varchar(255) NOT NULL,
            `description` text,
            PRIMARY KEY (`id_testhh`)
        ) ENGINE=" . _MYSQL_ENGINE_ . " DEFAULT CHARSET=utf8;";

        return Db::getInstance()->execute($sql);
    }

    private function uninstallDatabase()
    {
        $sql = "DROP TABLE IF EXISTS `" . _DB_PREFIX_ . "testhh`";
        return Db::getInstance()->execute($sql);
    }

    public function getContent()
    {
        return $this->renderAdmin();
    }

    private function renderAdmin()
    {
        // Tworzenie linku do kontrolera
        $link = $this->context->link->getAdminLink('AdminTesthh');
        
        // Renderowanie przycisku przekierowującego do kontrolera CRUD
        return '<a href="' . $link . '" class="btn btn-primary">Manage CRUD</a>';
    }
    
}
