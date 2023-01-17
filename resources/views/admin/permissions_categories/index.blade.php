@extends('admin.master')
@section('content')
    <div class="page-heading">
        <h3>Permission Meanagment</h3>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addPermissionModal"><i
                                class="bi-plus-circle me-2"></i>Add New Permission</button>
                    </div>
                    {{ $dataTable->table() }}
                </div>
            </div>
        </section>
    </div>
    {{-- add new employee modal start --}}
    <div class="modal fade" id="addPermissionModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Permission</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="add_permission_form" enctype="multipart/form-data">
                    <div class="modal-body p-4 bg-light">
                        <div class="my-2">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="edit_permission_name" name="name"
                                placeholder="Enter Name" value="" maxlength="50">
                        </div>
                        <div class="my-2">
                            <label for="guard">Guard</label>
                            <input type="text" class="form-control" id="edit_permission_guard" name="guard"
                                placeholder="Enter Guard" value="" maxlength="50">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="add_permission_btn" class="btn btn-primary">Add Permission</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- add new employee modal end --}}

    {{-- edit employee modal start --}}
    <div class="modal fade" id="editPermissionModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="permission_category" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">
                    <div class="modal-body p-4 bg-light">
                        <div class="my-2">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="edit_name" name="name"
                                placeholder="Enter Login" value="" maxlength="50">
                        </div>
                        <div class="my-2">
                            <label for="guard">E-mail</label>
                            <input type="text" class="form-control" id="edit_guard" name="guard"
                                placeholder="Enter e-mail" value="" maxlength="50">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="edit_permission_btn" class="btn btn-success">Update Employee</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Show Employee</h5>
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
        $(document).ready(function() {
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
            $("#add_permission_form").submit(function(e) {
                e.preventDefault();
                let createData = new FormData(this);
                $("#add_permission_btn").text('Adding...');
                $.ajax({
                    url: "{{ route('admin.permissionsCategory.store') }}",
                    method: 'POST',
                    data: createData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        console.log('test');
                        Lobibox.notify(
                            'success', {
                                msg: 'dfsfssfsfs',
                                position: "top right",
                                sound: "../../assets/sound/user"
                            }
                        );
                        setTimeout(function() {
                            $('#admin-permission-table').DataTable().ajax.reload();
                            return false;
                        }, 500);
                        $("#add_permission_btn").text('Add Permission');
                        $("#add_permission_form")[0].reset();
                        $("#addPermissionModal").modal('hide');
                    }
                });
            });

            // edit user ajax request
            $(document).on("click", "#edit", function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: "{{ route('admin.permissionsCategory.edit') }}",
                    method: 'GET',
                    data: {
                        id: id,
                    },
                    success: function(response) {
                        console.log(response);
                        $('#id').val(response.data.id);
                        $('#edit_name').val(response.data.name);
                        $('#edit_guard').val(response.data.guard);
                    }
                });
            });
            // show user ajax request
            $(document).on("click", "#show_permission", function(e) {
                e.preventDefault();
                let id = $(this).data('id');
                $.ajax({
                    url: "{{ route('admin.permissionsCategory.show') }}",
                    method: 'GET',
                    data: {
                        id: id,
                    },
                    success: function(response) {
                        $('#id').val(response.data.id);
                        $('#show_first_name').val(response.data.first_name);
                        $('#show_last_name').val(response.data.last_name);
                    }
                });
            });

            // update employee ajax request
            $("#edit_permission_category_form").submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                $("#edit_user_btn").text('Updating...');
                $.ajax({
                    url: "{{ route('admin.permissionsCategory.update') }}",
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
                                    $('#admin-permission-table')
                                        .DataTable().ajax
                                        .reload();
                                    return false;
                                }, 500);

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
