<?php

namespace Backpack\CRUD\Tests\Unit\CrudPanel;

use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\Tests\BaseTest;
use Backpack\CRUD\Tests\Unit\Models\TestModel;

abstract class BaseCrudPanelTest extends BaseTest
{
    /**
     * @var CrudPanel
     */
    protected $crudPanel;

    protected $model;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->app->singleton('crud', function ($app) {
            return new CrudPanel($app);
        });
        $this->crudPanel = app('crud');
        $this->crudPanel->setModel(TestModel::class);
        $this->model = $this->crudPanel->getModel();
    }
}
