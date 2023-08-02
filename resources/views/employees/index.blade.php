@extends('layouts.layout')

@section('page_title')
    @lang('text.employees')
@endsection

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@lang('text.employees')</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">@lang('text.dashboard')</a></li>
                        <li class="breadcrumb-item active">@lang('text.employees')</li>
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
                                <a href="{{ route('employees.create') }}" class="btn btn-success">+ @lang('text.add')</a>
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
                                            @lang('text.company')
                                        </th>
                                        <th>
                                            @lang('employee_firstname')
                                        </th>
                                        <th>
                                            @lang('employee_lastname')
                                        </th>
                                        <th>
                                            @lang('text.email')
                                        </th>
                                        <th>
                                            @lang('text.phone')
                                        </th>
                                        <th>
                                            @lang('text.status')
                                        </th>
                                        <th>
                                            @lang('text.actions')
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($employees as $key => $item)
                                    <tr>
                                        <td>{{ $employees->firstItem()+$key }}</td>
                                        <td>{{ $item->company->name??null }}</td>
                                        <td>{{ $item->first_name }}</td>
                                        <td>{{ $item->last_name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td><span class="badge badge-pill badge-{{ $item->status == 'active' ? 'success' : 'secondary' }}">{{ $item->status }}</span></td>
                                        <td class="project-actions">
                                            <a class="btn btn-primary btn-sm" href="{{ route('employees.show', $item) }}">
                                                <i class="fas fa-eye"></i> @lang('text.view')
                                            </a>
                                            <a class="btn btn-info btn-sm" href="{{ route('employees.edit', $item) }}">
                                                <i class="fas fa-pencil-alt"></i> @lang('text.edit')
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="#delete{{ $item->id }}" data-toggle="modal">
                                                <i class="fas fa-trash"></i> @lang('text.delete')
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

