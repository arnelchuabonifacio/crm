<?php

use Illuminate\Support\Facades\Auth;
use App\Status;



Auth::routes();
Route::get('/', function () {
    if (Auth::guest()) {
        return view('welcome');
    } else {
        $projectGroupCounts = Status::getProjectsCountByStatus();
        return redirect()->route('dashboard');
    }
});

// Route::get('/', function () {
//     if (Auth::guest()) {
//         return view('welcome');
//     } else {
//         $projectGroupCounts = Status::getProjectsCountByStatus();
//         return view('dashboard.index', compact('projectGroupCounts'));
//     }
// });
Route::middleware(['auth'])->group(function () {
    // Route::get('/', function () {
    //     return redirect()->route('dashboard');

    //     // if (Auth::guest()) {
    //         // return view('welcome');
    //     // } else {
    //     //     $projectGroupCounts = Status::getProjectsCountByStatus();
    //         // return view('dashboard.index', compact('projectGroupCounts'));
    //     // }
    // });
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::patch('/api/projects/{project}/updateStatus', 'ProjectController@updateStatus')
    ->middleware('can:projects.updateStatus,project')
    ->name('projectsUpdateStatus');

    Route::patch('/api/projects/{project}/tasks/{task}/updateStatus', 'TaskController@updateStatus')
    ->middleware('can:tasks.updateStatus,project,task')
    ->name('tasksUpdateStatus');

    Route::resource('projects', 'ProjectController')
            ->middleware('policy:projects,index,project');
    Route::resource('projects.tasks', 'TaskController')
            ->middleware('policy:tasks,,project,task');
    Route::resource('projects.credentials', 'CredentialController')
            ->middleware('policy:credentials,,project,credential');
    Route::resource('tasks.comments', 'CommentController', ['except'=>['create','show']])->middleware('policy:comments,create|show,task,comment');

    Route::resource('statuses', 'StatusController', ['except'=>'show'])->middleware('role:admin');
    Route::resource('users', 'UsersController', ['except'=>'show'])->middleware('role:admin');
});
