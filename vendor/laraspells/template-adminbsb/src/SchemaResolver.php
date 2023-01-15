<?php

namespace LaraSpells\Template\AdminBsb;

use LaraSpells\Generator\SchemaResolver as BaseSchemaResolver;

class SchemaResolver extends BaseSchemaResolver
{

    protected $availableInputTypes = [
        'text', 
        'password', 
        'textarea',
        'file',
        'image',
        'number',
        'email',
        'select',
        'select-multiple',
        'checkbox',
        'radio',
        'ckeditor',
        'mask',
        'datepicker',
        'datetimepicker',
        'timepicker',
    ];

    /**
     * Fill route schema
     *
     * @param array &$schema
     */
    protected function fillRouteSchema(array &$schema)
    {
        parent::fillRouteSchema($schema);
        data_fill($schema, 'route.middleware', 'auth');
    }

    protected function resolveFieldInputCkeditor($colName, array $fieldSchema, $tableName, $tableSchema)
    {
        data_fill($fieldSchema, 'display', 'html');
        return $fieldSchema;
    }

}
