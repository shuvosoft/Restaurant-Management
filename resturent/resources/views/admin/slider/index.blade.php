@extends('layouts.app')

@section('title','slider')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('slider.create') }}" class="btn btn-primary">Add New Slider</a>

                    @include('layouts.partial.msg')


                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">All Sliders</h4>
                            <p class="category">Here is a subtitle for this table</p>
                        </div>
                        <div class="card-content table-responsive">
                            <table id="table" class="table"  cellspacing="0" width="100%">
                                <thead class="text-primary">
                                <th>Id</th>
                                <th>Title</th>
                                <th>Sub Title</th>
                                <th>Image</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Actions</th>
                                </thead>
                                <tbody>

                                @foreach($sliders as $key=>$slider)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $slider->title }}</td>
                                        <td>{{ $slider->sub_title }}</td>
                                        <td>{{ $slider->image }}</td>
                                        <td>{{ $slider->created_at }}</td>
                                        <td>{{ $slider->updated_at	 }}</td>

                                        <td>

                                            <a href="{{ route('slider.edit',$slider->id) }}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>

                                            <form id="delete-form-{{ $slider->id }}" action="{{ route('slider.destroy',$slider->id) }}" style="display: none;" method="POST">
                                                {{ csrf_field() }}

                                                {{ method_field('DELETE') }}

                                            </form>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $slider->id }}').submit();
                                                    }else {
                                                    event.preventDefault();
                                                    }"><i class="material-icons">delete</i>
                                            </button>


                                        </td>

                                    </tr>

                                    @endforeach





                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        } );
    </script>
@endpush