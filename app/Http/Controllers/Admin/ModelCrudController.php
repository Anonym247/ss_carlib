<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ModelRequest;
use App\Models\Model;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ModelCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ModelCrudController extends CrudController
{
    use ListOperation;
    use CreateOperation;
    use UpdateOperation;
    use DeleteOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup(): void
    {
        CRUD::setModel(Model::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/model');
        CRUD::setEntityNameStrings('model', 'models');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation(): void
    {
        CRUD::column('id');
        CRUD::column('brand_id');
        CRUD::column('name');

        $this->crud->addColumn([
            'name' => 'brand_id',
            'label' => 'Brand',
            'type' => 'text',
            'entity' => 'brand',
            'attribute' => 'name',
            'model' => 'App\Models\Country',
        ]);
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation(): void
    {
        CRUD::setValidation(ModelRequest::class);

        CRUD::field('brand_id');
        CRUD::field('name');
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation(): void
    {
        $this->setupCreateOperation();
    }
}
