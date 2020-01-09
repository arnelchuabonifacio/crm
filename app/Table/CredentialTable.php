<?php

namespace App\Table;

use Illuminate\Support\Facades\Auth;

class CredentialTable extends Table
{
    protected $primaryKey = 'title';

    protected $project;

    public function __construct($data, $project)
    {
        $this->project = $project;
        parent::__construct($data);
    }

    protected $columns = [
        'title' => 'Title',
        'url' => 'Domain',
        'username' => 'User Name',
        'password' => 'Password',
    ];

    public function getColumnValue($column, $item)
    {
        $data = '';

        switch ($column) {
            case 'title':
                $data =  $item->title;
            break;
            case 'url':
                $data =  '<a target="_blank" href="'. $item->url .'">'.$item->url.'</a>';
                break;
            
            default:
                $data = $this->defaultColumnValue($column, $item);
                break;
        }

        return $data;
    }

    public function generateQuickActionLinks($credential)
    {
        $links = [];
        $user = Auth::user();
        if ($user->can('credentials.view', [$this->project, $credential])) {
            $links['view'] = [
                'title' => '<i class="fa fa-eye" aria-hidden="true" style="color: #22c65b;font-size: 20px;padding: 10px 0;"></i>',
                'link' => route('projects.credentials.show', ['project'=>$this->project->id,'credential'=>$credential->id])
            ];
        }
        if ($user->can('credentials.update', [$this->project, $credential])) {
            $links['edit'] = [
                'title' => '<i class="fa fa-edit" aria-hidden="true" style="font-size: 20px;padding: 10px 0;"></i>',
                'link' => route('projects.credentials.edit', ['project'=>$this->project->id,'credential'=>$credential->id])
            ];
        }
        if ($user->can('credentials.delete', [$this->project, $credential])) {
            $links['delete'] = [
                'title' => 'Delete',
                'link' => route('projects.credentials.destroy', ['project'=>$this->project->id,'credential'=>$credential->id])
            ];
        }
        return $links;
    }
}
