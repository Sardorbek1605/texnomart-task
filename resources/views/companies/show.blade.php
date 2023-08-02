@extends('layouts.layout')

@section('page_title')
    Show Company
@endsection

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Show Company</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('companies.index') }}">Companies</a></li>
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
                            <h3 class="card-title">Show Company Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" readonly value="{{ $company->name }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" readonly value="{{ $company->email }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="logo">Logotip</label>
                                    <div class="input-group">

                                    </div>
                                    <img src="{{ asset('storage/'.$company->logo) }}" alt="" id="image-content" style="width: 20%; margin-top: 5px">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="url">Website Url</label>
                                    <input type="text" class="form-control" name="url" id="url" placeholder="Enter Website Url" readonly value="{{ $company->url }}">
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="about">About Company</label>
                                    <textarea name="about" id="about" class="form-control" readonly >{{ $company->about }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('scripts')
    <script>
        $('#logo').on('click', function (){
            $('#image-content').hide();
        });
    </script>
@endsection

