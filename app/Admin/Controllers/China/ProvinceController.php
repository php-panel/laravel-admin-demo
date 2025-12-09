<?php

namespace App\Admin\Controllers\China;

use App\Models\ChinaArea;
use App\Http\Controllers\Controller;
use Ladmin\Controllers\AdminController;
use Ladmin\Controllers\HasResourceActions;
use Ladmin\Form;
use Ladmin\Grid;
use Ladmin\Layout\Content;

class ProvinceController extends AdminController
{
    protected $title = 'Province';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ChinaArea());

        $grid->model()->province();

        $grid->name()->editable();

        $grid->children('City')->pluck('name')->label();

        $grid->filter(function ($filter) {
            $filter->like('name');
        });

        $grid->disableActions()
            ->disableCreateButton();

        return $grid;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new ChinaArea());

        $form->display('id');
        $form->text('name');

        return $form;
    }
}
