@foreach ($model->roles as $item)
    <span class="badge rounded-pill bg-primary">{{ $item->name }}</span>
@endforeach
