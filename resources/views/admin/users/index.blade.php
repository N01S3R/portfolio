@extends('admin.master')
@section('content')
    <div class="page-heading">
        <h3>Users Meanagment</h3>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-body">
                    @if (auth()->user()->hasPermissionTo('role-create'))
                        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addUserModal"><i
                                    class="bi-plus-circle me-2"></i>Add New User</button>
                        </div>
                    @else
                        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#" disabled><i
                                    class="bi-plus-circle me-2"></i>Add New User</button>
                        </div>
                    @endif
                    {{ $dataTable->table() }}
                </div>
            </div>
        </section>
    </div>
    {{-- add new user modal start --}}
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="add_user_form" enctype="multipart/form-data">
                    <div class="modal-body p-4 bg-light">
                        <div class="row">
                            <div class="col-lg">
                                <label for="fname">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    placeholder="Enter First Name" value="" maxlength="50">
                            </div>
                            <div class="col-lg">
                                <label for="lname">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                    placeholder="Enter Lat Name" value="" maxlength="50">
                            </div>
                        </div>
                        <div class="my-2">
                            <label for="login">Login</label>
                            <input type="text" class="form-control" id="user_name" name="user_name"
                                placeholder="Enter Login" value="" maxlength="50">
                        </div>
                        <div class="my-2">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter e-mail" value="" maxlength="50">
                        </div>
                        <div class="my-2">
                            <label for="rank">Rank</label>
                            <select class="form-select" id="user_rank" name="user_rank">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="my-2">
                            <img id="preview-avatar" src={{ url('avatars/default.png') }} alt="preview image"
                                style="max-height: 100px;" class="rounded-circle">
                            <label for="avatar">Select Avatar</label>
                            <input type="file" id="avatar" name="avatar" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="add_user_btn" class="btn btn-primary">Add User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- add new user modal end --}}

    {{-- edit user modal start --}}
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="edit_user_form" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">
                    <div class="modal-body p-4 bg-light">
                        <div class="row">
                            <div class="col-lg">
                                <label for="fname">First Name</label>
                                <input type="text" class="form-control" id="edit_first_name" name="first_name"
                                    placeholder="Enter First Name" value="" maxlength="50">
                            </div>
                            <div class="col-lg">
                                <label for="lname">Last Name</label>
                                <input type="text" class="form-control" id="edit_last_name" name="last_name"
                                    placeholder="Enter Lat Name" value="" maxlength="50">
                            </div>
                        </div>
                        <div class="my-2">
                            <label for="login">Login</label>
                            <input type="text" class="form-control" id="edit_user_name" name="user_name"
                                placeholder="Enter Login" value="" maxlength="50">
                        </div>
                        <div class="my-2">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" id="edit_email" name="email"
                                placeholder="Enter e-mail" value="" maxlength="50">
                        </div>
                        <div class="my-2">
                            <label for="rank">Rank</label>
                            <select class="form-select" id="edit_user_rank" name="user_rank">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="my-2">
                            <img id="edit_preview-avatar" src={{ url('avatars/default.png') }} alt="preview image"
                                style="max-height: 100px;" class="rounded-circle">
                            <label for="avatar">Select Avatar</label>
                            <input type="file" id="edit_avatar" name="edit_avatar" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="edit_user_btn" class="btn btn-success">Update User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- edit user modal end --}}
    {{-- show user modal start --}}
    <div class="modal fade" id="showUserModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Show User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="show_user_form" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">
                    <div class="modal-body p-4 bg-light">
                        <div class="row">
                            <div class="col-lg">
                                <label for="fname">First Name</label>
                                <input type="text" class="form-control" id="show_first_name" name="first_name"
                                    placeholder="Enter First Name" value="" readonly>
                            </div>
                            <div class="col-lg">
                                <label for="lname">Last Name</label>
                                <input type="text" class="form-control" id="show_last_name" name="last_name"
                                    placeholder="Enter Lat Name" value="" readonly>
                            </div>
                        </div>
                        <div class="my-2">
                            <label for="login">Login</label>
                            <input type="text" class="form-control" id="show_user_name" name="user_name"
                                placeholder="Enter Login" value="" readonly>
                        </div>
                        <div class="my-2">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" id="show_email" name="email"
                                placeholder="Enter e-mail" value="" readonly>
                        </div>
                        <div class="my-2">
                            <label for="rank">Rank</label>
                            <input type="rank" class="form-control" id="show_user_rank" name="email"
                                placeholder="Enter Rank" value="" readonly>
                        </div>
                        <div class="my-2">
                            <img id="show_preview-avatar" src={{ url('avatars/default.png') }} alt="preview image"
                                style="max-height: 100px;" class="rounded-circle">
                            <label for="avatar">Avatar</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- show user modal end --}}
@endsection
@push('js')
    <script type="text/javascript">
        $(document).ready(function($) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#avatar').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-avatar').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);

            });
            $("#add_user_form").submit(function(e) {
                e.preventDefault();
                let createData = new FormData(this);
                $("#add_user_btn").text('Adding...');
                $.ajax({
                    url: "{{ route('admin.users.store') }}",
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
                                sound: "../../assets/sound/user"
                            }
                        );
                        setTimeout(function() {
                            $('#admin-users-table').DataTable().ajax.reload();
                            return false;
                        }, 500);
                        $("#add_user_btn").text('Add Employee');
                        $("#add_user_form")[0].reset();
                        $("#addUserModal").modal('hide');
                    },
                    error: function(response) {
                        $("#addUserModal").modal('hide');
                        $("#add_user_btn").text('Add User');
                        $("#add_user_form")[0].reset();
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
            $(document).on("click", "#edit", function(e) {
                e.preventDefault();
                let id = $(this).data('id');
                $.ajax({
                    url: "{{ route('admin.users.edit') }}",
                    method: 'GET',
                    data: {
                        id: id,
                    },
                    success: function(response) {
                        $('#id').val(response.data.id);
                        $('#edit_first_name').val(response.data.first_name);
                        $('#edit_last_name').val(response.data.last_name);
                        $('#edit_user_name').val(response.data.user_name);
                        $("#edit_user_rank option[value='" + response.data.roles[0].name + "']").attr("selected", "selected");
                        $('#edit_email').val(response.data.email);
                        $("#edit_user_rank option:selected").text(response.userRole);
                        $("#edit_preview-avatar").attr("src", "{{ url('/avatars/') }}/" +
                            response
                            .data.avatar);
                    },
                    error: function(response) {
                        $("#editUserModal").modal('hide');
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
            // show user ajax request
            $(document).on("click", "#show", function(e) {
                e.preventDefault();
                let id = $(this).data('id');
                $.ajax({
                    url: "{{ route('admin.users.show') }}",
                    method: 'GET',
                    data: {
                        id: id,
                    },
                    success: function(response) {
                        $('#id').val(response.data.id);
                        $('#show_first_name').val(response.data.first_name);
                        $('#show_last_name').val(response.data.last_name);
                        $('#show_user_name').val(response.data.user_name);
                        $('#show_rank').val(response.data.rank);
                        $('#show_email').val(response.data.email);
                        $('#show_user_rank').val(response.userRole);
                        $('#show_avatar').attr("src", response.data.avatar);
                        $("#show_preview-avatar").attr("src", "{{ url('/avatars/') }}/" +
                            response
                            .data.avatar);
                    },
                    error: function(response) {
                        $("#showUserModal").modal('hide');
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

            // update employee ajax request
            $("#edit_user_form").submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                $("#edit_user_btn").text('Updating...');
                $.ajax({
                    url: "{{ route('admin.users.update') }}",
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
                                sound: "../../assets/sound/user"
                            }
                        );
                        setTimeout(function() {
                            $('#admin-users-table').DataTable().ajax.reload();
                            return false;
                        }, 500);
                        $("#edit_user_btn").text('Update Employee');
                        $("#edit_user_form")[0].reset();
                        $("#editUserModal").modal('hide');
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
                                console.log(response.status);
                                if (response.status === true) {
                                    Lobibox.notify(
                                        'success', {
                                            msg: 'User was deleted',
                                            position: "top right",
                                            sound: "../../assets/sound/user"
                                        }
                                    );
                                }
                                setTimeout(function() {
                                    $(this).parents("tr").remove();
                                    $('#admin-users-table')
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
            $('#add_user_form input[name=email]').keyup(function() {
                var email = $('#email').val();
                // ajax
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.users.checkEmail') }}",
                    data: {
                        email: email
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == "emailTrue") {
                            $('#email').removeClass('is-invalid');
                            $('#email').addClass('is-valid');
                        } else {
                            $('#email').removeClass('is-valid');
                            $('#email').addClass('is-invalid');
                        }
                    }
                });
            });
            $('#add_user_form input[name=user_name]').keyup(function() {
                var user_name = $('#user_name').val();
                // ajax
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.users.checkUserName') }}",
                    data: {
                        user_name: user_name
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == "userNameTrue") {
                            $('#user_name').removeClass('is-invalid');
                            $('#user_name').addClass('is-valid');
                        } else {
                            $('#user_name').removeClass('is-valid');
                            $('#user_name').addClass('is-invalid');

                        }
                    }
                });
            });
            $('#avatar').change(function() {

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#preview-avatar').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);

            });
            $('#edit_avatar').change(function() {

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#edit_preview-avatar').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);

            });
        });
    </script>
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
