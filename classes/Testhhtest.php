<?php

namespace PrestaShop\Module\Testhh\Classes;



use ObjectModel;

class Testhhtest extends ObjectModel
{
    public $id;
    public $name;
    public $description;

    public static $definition = [
        'table' => 'testhh',
        'primary' => 'id_testhh',
        'fields' => [
            'name' => ['type' => self::TYPE_STRING, 'validate' => 'isString', 'required' => true, 'size' => 255],
            'description' => ['type' => self::TYPE_HTML, 'validate' => 'isCleanHtml'],
        ],
    ];
}
