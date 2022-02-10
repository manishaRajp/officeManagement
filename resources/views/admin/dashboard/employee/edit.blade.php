@extends('admin.dashboard.layouts.master')
@section('content')
    <style>
        .texterror {
            color: red;
        }

    </style>
    <div class="row">
        <div class="col-sm-12">
            <div class="float-right page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Drixo</a></li>
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active">Patients</li>
                </ol>
            </div>
            <h5 class="page-title">Edit Patients</h5>
        </div>
    </div>
    <!-- end row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Patients</h4>
                    <p></p>
                    {{ Form::model($employee, ['id' => 'edit_employee', 'enctype' => 'multipart/form-data', 'novalidate' => true]) }}
                    @csrf
                    {{ Form::hidden('id', null, ['rows' => '3', 'class' => 'form-control']) }}
                    <div class="row">
                        <div class="col-md">
                            {{ Form::label('First Name') }}
                            {{ Form::text('first_name', null, ['placeholder' => 'Enter first name','class' => 'form-control','id' => 'first_name']) }}
                            @error('first_name')
                                <span class="text-danger" id="first_nameError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                        <div class="col-md">
                            {{ Form::label('Last Name') }}
                            {{ Form::text('last_name', null, ['placeholder' => 'Enter last name','class' => 'form-control','id' => 'last_name']) }}
                            @error('last_name')
                                <span class="text-danger" id="last_nameError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            {{ Form::label('Email') }}
                            {{ Form::text('email', null, ['placeholder' => 'Enter email', 'class' => 'form-control', 'id' => 'email']) }}
                            @error('email')
                                <span class="text-danger" id="emailError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                        <div class="col-md">
                            {{ Form::label('Mobile') }}
                            {{ Form::number('contact', null, ['placeholder' => 'Enter Mobile','class' => 'form-control','id' => 'contact','onkeydown' => 'javascript: return event.keyCode == 69 ? false : true']) }}
                            @error('contact')
                                <span class="text-danger" id="contactError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            {{ Form::label('Address') }}
                            {{ Form::textarea('address', null, ['placeholder' => 'Enter Address','class' => 'form-control','rows' => 2,'id' => 'address']) }}
                            @error('address')
                                <span class="text-danger" id="addressError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                        <div class="col-md">
                            {{ Form::label('Gender', 'Gender') }}
                            {{ Form::select('gender', ['Male' => 'Male', 'Female' => 'Female'], null, ['class' => 'form-control','placeholder' => 'Select a Gender...','id' => 'gender']) }}
                            @error('gender')
                                <span class="text-danger" id="genderError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                        <div class="col-md">
                            {{ Form::label('Profile Image') }}
                            {{ Form::file('image', ['class' => 'form-control', 'id' => 'image']) }}
                            @error('image')
                                <span class="text-danger" id="imageError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md">
                            {{ Form::label('Department') }}
                            {{ Form::select('deparment_id', $dept, null, ['class' => 'form-control','placeholder' => 'Select a deparment_id ...','id' => 'deparment_id']) }}
                            @error('deparment_id')
                                <span class="text-danger" id="deparment_idError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                        <div class="col-md">
                            {{ Form::label('system') }}
                            {{ Form::select('system_id', $system, null, ['class' => 'form-control','placeholder' => 'Select a system ...','id' => 'system_id']) }}
                            @error('system_id')
                                <span class="text-danger" id="system_idError">{{ $message }}</span>
                            @enderror
                            </br>

                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            {{ Form::submit('submit', ['name' => 'submit', 'id' => 'submit', 'class' => 'btn btn-primary']) }}
                            <a href="{{ route('admin.employee.index') }}" class="btn btn-danger">
                                Cancel</a>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
@push('scripts')
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="{{ asset('admin/assets/js/sweetalert.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#edit_employee").validate({
                rules: {

                    first_name: {
                        required: true,
                        maxlength: 225,
                    },
                    last_name: {
                        required: true,
                        maxlength: 225,
                    },
                    email: {
                        required: true,
                        email: true,
                        maxlength: 50
                    },
                    contact: {
                        required: true,
                        number: true,
                        minlength: 10,
                        maxlength: 11
                    },
                    address: {
                        required: true,
                    },
                    gender: {
                        required: true,
                    },
                    deparment_id: {
                        required: true,
                    },
                    system_id: {
                        required: true,
                    },

                },

                highlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-invalid").removeClass("is-valid");
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-valid").removeClass("is-invalid");
                },
                submitHandler: function(form, event) {
                    event.preventDefault();
                    console.log('form');
                    console.log(form);
                    $(document).find('.text-danger').remove();
                    var formdata = new FormData(form);
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "post",
                        data: formdata,
                        url: "{{ route('admin.update_employee') }}",
                        dataType: 'JSON',
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            window.location = "/admin/employee";
                        },
                        error: function(error) {
                            $.each(error.responseJSON.errors, function(key, value) {
                                console.log(key);
                                $('#' + key).after('<span class="text-danger">' +
                                    value +
                                    '</span>')
                            });
                        }
                    });
                }
            });
        });
    </script>

@endpush
