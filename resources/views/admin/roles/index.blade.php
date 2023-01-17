@extends('admin.master')
@section('content')
    <div class="page-heading">
        <h3>Role Meanagment</h3>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-body">
                    @if (auth()->user()->hasPermissionTo('role-create'))
                        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                            <button class="btn btn-success" id="add" data-bs-toggle="modal"
                                data-bs-target="#addRoleModal"><i class="bi-plus-circle me-2"></i>Add New Role</button>
                        </div>
                    @else
                        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                            <button class="btn btn-success" id="add" data-bs-toggle="modal" data-bs-target="#"
                                disabled><i class="bi-plus-circle me-2"></i>Add New Role</button>
                        </div>
                    @endif
                    {{ $dataTable->table() }}
                </div>
            </div>
        </section>
    </div>
    {{-- add new role modal start --}}
    <div class="modal fade" id="addRoleModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="add_role_form" enctype="multipart/form-data">
                    <div class="modal-body p-4 bg-light">
                        <div class="row">
                            <div class="col-lg">
                                <label for="fname">Role Name</label>
                                <input type="text" class="form-control" id="add_name" name="add_name"
                                    placeholder="Enter Name" value="" maxlength="50">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <label for="fname">Role Color</label>
                                <input type="text" class="form-control colorpicker" id="add_color" name="add_color"
                                    placeholder="Enter Color" value="" maxlength="50">
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-lg">
                                <label for="fuser">User Meanagment</label>
                                <div class="form-check">
                                    @foreach ($permission as $value)
                                        <label>{{ Form::checkbox('permission[]', $value->id, false, ['class' => 'form-check-input']) }}
                                            {{ $value->name }}</label>

                                        <br />
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-lg">
                                <label for="fuser">User Meanagment</label>
                                <div class="form-check">
                                    @foreach ($permission as $value)
                                        <label>{{ Form::checkbox('permission[]', $value->id, false, ['class' => 'form-check-input']) }}
                                            {{ $value->name }}</label>

                                        <br />
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-lg">
                                <label for="fuser">User Meanagment</label>
                                <div class="form-check">
                                    @foreach ($permission as $value)
                                        <label>{{ Form::checkbox('permission[]', $value->id, false, ['class' => 'form-check-input']) }}
                                            {{ $value->name }}</label>

                                        <br />
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="add_role_btn" class="btn btn-primary">Add Role</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- add new role modal end --}}
    {{-- edit role modal start --}}
    <div class="modal fade" id="editRoleModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4 bg-light">
                    <form action="#" method="POST" id="edit_role_form" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <div class="row">
                            <div class="col-lg">
                                <label for="fname">Edit Name</label>
                                <input type="text" class="form-control" id="edit_name" name="edit_name"
                                    placeholder="Enter First Name" value="" maxlength="50">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <label for="fname">Edit Color</label>
                                <input type="text" class="form-control colorpicker" id="edit_color" name="edit_color"
                                    placeholder="Enter Color" value="" maxlength="50">
                            </div>
                        </div>
                        <div class="row mt-1 ml-1">
                            <div class="col-lg">
                                <label for="fuser">User Meanagment</label>
                                <div class="form-check edit">
                                    @foreach ($permission as $value)
                                        <label>{{ Form::checkbox('permission[]', $value->id, false, ['class' => 'form-check-input checkbox']) }}
                                            {{ $value->name }}</label>
                                        <br />
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-lg">
                                <label for="fuser">User Meanagment</label>
                                <div class="form-check">
                                    @foreach ($permission as $value)
                                        <label>{{ Form::checkbox('permission[]', $value->id, false, ['class' => 'form-check-input']) }}
                                            {{ $value->name }}</label>

                                        <br />
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-lg">
                                <label for="fuser">User Meanagment</label>
                                <div class="form-check">
                                    @foreach ($permission as $value)
                                        <label>{{ Form::checkbox('permission[]', $value->id, false, ['class' => 'form-check-input']) }}
                                            {{ $value->name }}</label>

                                        <br />
                                    @endforeach
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="edit_role_btn" class="btn btn-success">Update Role</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- edit role modal end --}}
    {{-- show role modal start --}}
    <div class="modal fade" id="showRoleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Show Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4 bg-light" id="modal-show">
                    <form action="#" method="POST" id="show_role_form" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg">
                                <label for="fname">Role Name</label>
                                <input type="text" class="form-control" id="show_name" name="show_name"
                                    placeholder="Enter First Name" value="" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <label for="fcolor">Role Color</label>
                                <input type="text" class="form-control" id="show_color" name="show_color"
                                    placeholder="Enter First Name" value="" readonly>
                            </div>
                        </div>
                        <div class="row mt-1 ml-1">
                            <div class="col-lg">
                                <label for="fuser">User Meanagment</label>
                                <div class="form-check show">
                                    @foreach ($permission as $value)
                                        <label>{{ Form::checkbox('permission[]', $value->id, false, ['class' => 'form-check-input checkbox disabled']) }}
                                            {{ $value->name }}</label>
                                        <br />
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    {{-- show role modal end --}}
@endsection
@push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/css/bootstrap-colorpicker.min.css"
        rel="stylesheet">
@endpush
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/js/bootstrap-colorpicker.min.js">
    </script>
    <script>
        $('.colorpicker').colorpicker();
    </script>
    <script type="text/javascript">
        $(document).ready(function($) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#add_role_form").submit(function(e) {
                e.preventDefault();
                let createData = new FormData(this);
                $("#add_role_btn").text('Adding...');
                $.ajax({
                    url: "{{ route('admin.roles.store') }}",
                    method: 'POST',
                    data: createData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        Lobibox.notify(
                            'success', {
                                msg: 'dfsfssfsfs',
                                position: "top right",
                                sound: "../../assets/sound/success"
                            }
                        );
                        setTimeout(function() {
                            $('#admin-role-table').DataTable().ajax.reload();
                            return false;
                        }, 500);
                        $("#add_role_btn").text('Add Role');
                        $("#add_role_form")[0].reset();
                        $("#addRoleModal").modal('hide');
                    },
                    error: function(response) {
                        $("#addRoleModal").modal('hide');
                        $("#add_role_btn").text('Add Role');
                        $("#add_role_form")[0].reset();
                        Lobibox.notify(
                            'error', {
                                msg: response.responseJSON.message,
                                position: "top right",
                                sound: "../../assets/sound/danger"
                            }
                        );
                    }
                });
            });
            // edit user ajax request
            $(document).on("click", "#edit_role", function(e) {
                e.preventDefault();
                let id = $(this).data('id');
                $.ajax({
                    url: "{{ route('admin.roles.edit') }}",
                    method: 'GET',
                    data: {
                        id: id,
                    },
                    success: function(response) {
                        $('#id').val(response.data.id);
                        $('#edit_name').val(response.data.name);
                        $('#edit_color').val(response.data.colors);
                        $('.checkbox').prop('checked', false);
                        $.each(response.rolePermissions, function(index, val) {
                            $(".edit").find("input[type=checkbox][value='" + val + "']")
                                .prop("checked", true);
                        });
                    },
                    error: function(response) {
                        $("#editRoleModal").modal('hide');
                        Lobibox.notify(
                            'error', {
                                msg: response.responseJSON.message,
                                position: "top right",
                                sound: "../../assets/sound/danger",
                                icon: 'bi bi-x-circle'
                            }
                        );
                    }
                });
            });
            $(document).on("click", "#show_role", function(e) {
                e.preventDefault();
                let id = $(this).data('id');
                $.ajax({
                    url: "{{ route('admin.roles.show') }}",
                    method: 'GET',
                    data: {
                        id: id,
                    },
                    success: function(response) {
                        console.log(response);
                        $('#id').val(response.data.id);
                        $('#show_name').val(response.data.name);
                        $('#show_color').val(response.data.colors);
                        $('.checkbox').prop('checked', false);
                        $.each(response.rolePermissions, function(index, val) {
                            $(".show").find("input[type=checkbox][value='" + val + "']")
                                .prop("checked", true);
                        });
                        $(".disabled").prop("disabled", true);
                    },
                    error: function(response) {
                        $("#showRoleModal").modal('hide');
                        Lobibox.notify(
                            'error', {
                                msg: response.responseJSON.message,
                                position: "top right",
                                sound: "../../assets/sound/danger",
                                icon: 'bi bi-x-circle'
                            }
                        );
                    }
                });
            });
            $("#edit_role_form").submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                $("#edit_role_btn").text('Updating...');
                $.ajax({
                    url: "{{ route('admin.roles.update') }}",
                    method: 'post',
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        Lobibox.notify(
                            'success', {
                                msg: 'dfsfssfsfs',
                                position: "top right",
                                sound: "../../assets/sound/success"
                            }
                        );
                        setTimeout(function() {
                            $('#admin-role-table').DataTable().ajax.reload();
                            return false;
                        }, 500);
                        if (response.hasPermission) {
                            $('#add').attr('data-bs-target', '#addRoleModal');
                            $('#add').prop('disabled', false);
                        } else {
                            $('#add').attr('data-bs-target', '#');
                            $('#add').prop('disabled', true);
                        }
                        $("#edit_role_btn").text('Update Employee');
                        $("#edit_role_form")[0].reset();
                        $("#editRoleModal").modal('hide');
                    },
                    error: function(response) {
                        $("#editRoleModal").modal('hide');
                        Lobibox.notify(
                            'error', {
                                msg: response.responseJSON.message,
                                position: "top right",
                                sound: "../../assets/sound/danger",
                                icon: 'bi bi-x-circle'
                            }
                        );
                    }
                });
            });
            $(document).on("click", "#delete", function(e) {
                e.preventDefault();
                let link = $(this).attr("href");
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: link,
                            type: 'DELETE',
                            data: {
                                _method: "DELETE"
                            },
                            success: function(response) {
                                if (response.status === true) {
                                    Lobibox.notify(
                                        'success', {
                                            msg: 'User was deleted',
                                            position: "top right",
                                            sound: "../../assets/sound/success"
                                        }
                                    );
                                }
                                setTimeout(function() {
                                    $(this).parents("tr").remove();
                                    $('#admin-role-table')
                                        .DataTable().ajax
                                        .reload();
                                    return false;
                                }, 500);

                            },
                            error: function(response) {
                                Lobibox.notify(
                                    'error', {
                                        msg: response.responseJSON.message,
                                        position: "top right",
                                        sound: "../../assets/sound/danger",
                                        icon: 'bi bi-x-circle'
                                    }
                                );
                            }
                        })
                    }
                })
            });
        });
    </script>
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
