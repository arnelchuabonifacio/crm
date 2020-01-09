<?php

namespace App\Table;

class UserTable extends Table
{
    protected $primaryKey = 'name';

    protected $columns = [
        'name' => 'User Name',
        'email' => 'Email',
    ];

    public function getColumnValue($column, $user)
    {
        $data = '';

        switch ($column) {
            case 'email':
                $data = '<a href="mailto:'.$user->email.'">'.$user->email.'</a>';
                break;
            
            default:
                $data = $this->defaultColumnValue($column, $user);
                break;
        }

        return $data;
    }

    public function generateQuickActionLinks($user)
    {
        return [
            'edit' => [
                'title' => ' <i class="fa fa-edit" aria-hidden="true" style="font-size: 20px;padding: 10px 0;"></i>',
                'link' => route('users.edit', $user->id)
            ],
            'delete' => [
                'title' => 'Delete',
                'link' => route('users.destroy', $user->id)
            ]
        ];
    }
}
