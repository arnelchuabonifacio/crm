<update-status :project-id="{{ $model->id }}" end-point="{{ $endPoint }}" :statuses="{{ $statuses->toJson() }}" :selected-status="{{ $model->status->toJson() }}"></update-status>