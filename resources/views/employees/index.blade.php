@extends('layouts.layout')

@section('page_title')
    Employees
@endsection

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Employees</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item active">Employees</li>
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
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <a href="{{ route('employees.create') }}" class="btn btn-success">+ Add</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped table-hover p-0">
                                <thead>
                                    <tr>
                                        <th style="width: 2%">
                                            #
                                        </th>
                                        <th>
                                            Company
                                        </th>
                                        <th>
                                            Employee Firstname
                                        </th>
                                        <th>
                                            Employee Lastname
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            Phone
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($employees as $key => $item)
                                    <tr>
                                        <td>{{ $employees->firstItem()+$key }}</td>
                                        <td>{{ $item->company->name }}</td>
                                        <td>{{ $item->first_name }}</td>
                                        <td>{{ $item->last_name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td><span class="badge badge-pill badge-{{ $item->status == 'active' ? 'success' : 'secondary' }}">{{ $item->status }}</span></td>
                                        <td class="project-actions">
                                            <a class="btn btn-primary btn-sm" href="{{ route('employees.show', $item) }}">
                                                <i class="fas fa-eye"></i> View
                                            </a>
                                            <a class="btn btn-info btn-sm" href="{{ route('employees.edit', $item) }}">
                                                <i class="fas fa-pencil-alt"></i> Edit
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="#delete{{ $item->id }}" data-toggle="modal">
                                                <i class="fas fa-trash"></i> Delete
                                            </a>
                                            <div class="modal fade" id="delete{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <form action="{{ route('employees.destroy', $item->id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Delete Employee</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are sure this deletion?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <div class="float-right">
                                {{ $employees->appends(request()->query())->links("pagination::bootstrap-4") }}
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

