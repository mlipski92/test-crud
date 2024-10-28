<?php


class AdminTesthhController extends ModuleAdminController
{
    public function __construct()
    {
        
        $this->table = 'testhh';
        $this->className = 'Testhhtest';
        $this->bootstrap = true;
        $this->lang = false;
        $this->identifier = 'id_testhh';

        $this->fields_list = [
            'id_testhh' => ['title' => 'ID', 'align' => 'center', 'class' => 'fixed-width-xs'],
            'name' => ['title' => 'Name', 'type' => 'text'],
            'description' => ['title' => 'Description', 'type' => 'text'],
        ];

        parent::__construct();
    }

    public function renderForm()
    {
        
        $this->fields_form = [
            'legend' => [
                'title' => 'Test Entry',
                'icon' => 'icon-cogs',
            ],
            'input' => [
                [
                    'type' => 'text',
                    'label' => 'Name',
                    'name' => 'name',
                    'required' => true,
                ],
                [
                    'type' => 'textarea',
                    'label' => "Description",
                    'name' => 'description',
                ],
            ],
            'submit' => [
                'title' => "Save",
            ],
        ];

        return parent::renderForm();
    }
}
