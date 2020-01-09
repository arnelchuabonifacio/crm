<?php

namespace App\Table;

class StatusTable extends Table
{
    protected $primaryKey = 'title';

    protected $columns = [
        'title' => 'Title',
        'slug' => 'Slug',
    ];

    public function generateQuickActionLinks($item)
    {
        return [
            'edit' => [
                'title' => '<i class="fa fa-edit" aria-hidden="true" style="font-size: 20px;padding: 10px 0;"></i>',
                'link' => route('statuses.edit',$item->id)
            ],
            'delete' => [
                'title' => 'Delete',
                'link' => route('statuses.destroy',$item->id)
            ]
        ];
    }
}
