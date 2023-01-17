<div class="d-flex order-actions">
    <a href="javascript:void(0)" class="btn btn-info show" id="show_role" data-id="{{ $model->id }}" data-bs-toggle="modal" data-bs-target="#showRoleModal"><i class="bi bi-eye" aria-hidden="true"></i>
    </a>
    <a href="javascript:void(0)" class="btn btn-primary" id="edit_role" data-id="{{ $model->id }}" data-bs-toggle="modal" data-bs-target="#editRoleModal"><i class="bi bi-pencil-square"></i>
    </a>
    <a href="{{ route('admin.roles.destroy', $model) }}" class="btn btn-danger" id="delete"
        data-table="admin-users-table"><i class="bi bi-trash-fill" aria-hidden="true"></i>
    </a>
</div>
