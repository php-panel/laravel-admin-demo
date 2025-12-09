<?php

namespace App\Admin\Actions\UserStory;

use Ladmin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;

class MoveDown extends RowAction
{
    public $name = '下移';

    public function handle(Model $model)
    {
        $model->down();

        return $this->response()->success('移动完成.')->refresh();
    }
}
