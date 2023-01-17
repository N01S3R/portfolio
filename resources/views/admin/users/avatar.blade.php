@if ($model->avatar)
    <img src="{{ URL::to('/avatars') . '/' . $model->avatar }}" style="max-height: 100px;" class="rounded-circle">
@else
    <img src="{{ URL::to('/avatars') . '/' . $model->avatar }}" style="max-height: 100px;" class="rounded-circle">
@endif
