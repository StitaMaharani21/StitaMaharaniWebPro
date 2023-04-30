@extends('project.master')
@section('project')
    <!-- Main content -->
    <section id="content" class="content">
        <div class="container-fluid">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">Create New Project</div>
                            <div class="card-body">
                                <form action="{{ url('project/create') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Project Title</label>
                                        <input type="text" class="form-control" name="title"
                                            value="{{ old('title') }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Project Description</label>
                                        <input type="text" class="form-control" name="description"
                                            value="{{ old('description') }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Image Project</label>
                                        <input type="file" class="form-control-file" name="image_url" accept="image/*">
                                    </div>


                                    <button type="submit" class="btn btn-primary" style="margin-top: 10px">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
