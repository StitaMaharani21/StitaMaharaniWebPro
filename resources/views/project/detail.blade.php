@extends('project.master')
@section('project')
    <!-- Main content -->
    <section id="content" class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Create Detail Project : {{ $project->title }}</div>
                        <div class="card-body">
                            <form action="{{ url('detail/create') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="project_id" value="{{ $project->id }}">
                                <div class="form-group">
                                    <label>Image Project</label>
                                    <input type="file" class="form-control-file" name="image_gallery" accept="image/*">
                                </div>
                                <button type="submit" class="btn btn-primary" style="margin-top: 10px">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Data Detail Project : {{ $project->title }}
                        </div>
                        <div class="card-body">
                            <table style="width: 100%; margin-top: 10px">
                                <tr>
                                    <th>No</th>
                                    <th>Project Title</th>
                                    <th>Image Project</th>
                                </tr>
                                @foreach ($detail as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->project->title }}</td>
                                        <td><img src="{{ asset($item->image_gallery) }}" style="width: 200px; height: 100px"></td>
                                        <td>
                                            <button class="btn btn-danger btn-sm"
                                                onclick="event.preventDefault(); document.getElementById('delete-project-{{ $item->id }}').submit()">Delete</button>
    
                                            <form id="delete-project-{{ $item->id }}"
                                                action="{{ route('project.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
    
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
