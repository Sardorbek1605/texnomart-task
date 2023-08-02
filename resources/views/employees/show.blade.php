@extends('layouts.layout')

@section('page_title')
    Show Employee
@endsection

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Show Employee</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('companies.index') }}">Employees</a></li>
                        <li class="breadcrumb-item active">Show</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Show Employee Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="company_id">Company</label>
                                    <select name="company_id" id="company_id" class="form-control" readonly="">
                                        <option value="{{$employee->company_id}}" selected>{{ $employee->company->name }}</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control" name="first_name" readonly id="first_name" placeholder="Enter First Name" value="{{ $employee->first_name }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control" name="last_name" readonly id="last_name" placeholder="Enter Last Name" value="{{ $employee->last_name }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" readonly placeholder="Enter Email" value="{{ $employee->email }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" name="phone" id="phone" readonly placeholder="Enter Phone: (90) 123 45 56" value="{{ $employee->phone }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="bio">Bio</label>
                                    <textarea name="bio" id="bio" class="form-control" readonly>{{ $employee->bio }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <input type="checkbox" class="form-control" name="status" disabled id="status" {{ $employee->status == 'active' ? 'checked' : '' }}>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

