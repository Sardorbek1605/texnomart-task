@extends('layouts.layout')

@section('page_title')
    Companies
@endsection

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Companies</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item active">Companies</li>
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
                                <a href="{{ route('companies.create') }}" class="btn btn-success">+ Add</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped table-hover p-0">
                                <thead>
                                    <tr>
                                        <th style="width: 2%">
                                            #
                                        </th>
                                        <th style="width: 20%">
                                            Company Name
                                        </th>
                                        <th style="width: 20%">
                                            Company Email
                                        </th>
                                        <th style="width: 20%">
                                            Website Url
                                        </th>
                                        <th style="width: 8%">
                                            Logo
                                        </th>
                                        <th style="width: 20%">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($companies as $key => $item)
                                    <tr>
                                        <td>{{ $companies->firstItem()+$key }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->url }}</td>
                                        <td>
                                            <img alt="Avatar" class="table-avatar" style="width: 30px; height: 30px; border-radius: 50%" src="{{ asset('storage/'.$item->logo) }}">
                                        </td>
                                        <td class="project-actions">
{{--                                            <a class="btn btn-primary btn-sm" href="{{ route('companies.show', $item) }}">--}}
{{--                                                <i class="fas fa-eye"></i> View--}}
{{--                                            </a>--}}
                                            <a class="btn btn-info btn-sm" href="{{ route('companies.edit', $item) }}">
                                                <i class="fas fa-pencil-alt"></i> Edit
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="">
                                                <i class="fas fa-trash"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <div class="float-right">
                                {{ $companies->appends(request()->query())->links("pagination::bootstrap-4") }}
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

