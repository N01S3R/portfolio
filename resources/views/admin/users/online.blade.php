@if (Cache::has('user-is-online-' . $model->id))
    <span class="badge bg-success">Online</span>
@else
    <span class="badge bg-danger">Offline</span>
@endif