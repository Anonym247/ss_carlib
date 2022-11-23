<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CarRequest;
use App\Models\Car;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CarCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class CarCrudController extends CrudController
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
        CRUD::setModel(Car::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/car');
        CRUD::setEntityNameStrings('car', 'cars');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation(): void
    {
        CRUD::column('model_id');

        CRUD::addColumn([
            'name' => 'photo',
            'label' => 'Photo',
            'type' => 'image',
            'disk' => 'public'
        ]);

        CRUD::column('year');
        CRUD::column('state_number');
        CRUD::column('color')->type('color');
        CRUD::column('transmission')->type('enum');
        CRUD::column('rental_price_per_day');
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation(): void
    {
        CRUD::setValidation(CarRequest::class);

        CRUD::field('model_id');

        CRUD::addField([
            'name' => 'photo',
            'label' => 'Photo',
            'type' => 'upload',
            'upload' => true,
            'disk' => 'public'
        ]);

        CRUD::field('year');
        CRUD::field('state_number');
        CRUD::field('color')->type('color');
        CRUD::field('transmission')->type('enum');
        CRUD::field('rental_price_per_day');
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
