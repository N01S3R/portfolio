<div class="d-flex order-actions">
    <a href="javascript:void(0)" class="btn btn-info show" id="show" data-id="{{ $model->id }}" data-bs-toggle="modal" data-bs-target="#showUserModal"><i class="bi bi-eye" aria-hidden="true"></i>
    </a>
    <a href="javascript:void(0)" class="btn btn-primary" id="edit" data-id="{{ $model->id }}" data-bs-toggle="modal" data-bs-target="#editUserModal"><i class="bi bi-pencil-square"></i>
    </a>
    <a href="{{ route('admin.users.destroy', $model) }}" class="btn btn-danger" id="delete"
        data-table="admin-users-table"><i class="bi bi-trash-fill" aria-hidden="true"></i>
    </a>
</div>
