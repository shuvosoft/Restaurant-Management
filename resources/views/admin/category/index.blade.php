@extends('layouts.app')

@section('title','category')

@push('css')
@endpush

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <a href="{{ route('category.create') }}" class="btn btn-primary">Add New Category</a>
                    @include('layouts.partial.msg')

                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">All Category </h4>
                            <p class="category">Here is a subtitle for this table</p>
                        </div>
                        <div class="card-content table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                <th>Id</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Actions</th>
                                </thead>
                                <tbody>
                                    @foreach($categoris as $key =>$category)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>{{$category->name}}</td>
                                            <td>{{$category->slug}}</td>
                                            <td>{{ $category->created_at }}</td>
                                            <td>{{ $category->updated_at }}</td>
                                            <td>
                                                <a href="{{ route('category.edit',$category->id) }}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>

                                                <form id="delete-form-{{ $category->id }}" action="{{ route('category.destroy',$category->id) }}" style="display: none;" method="POST">
                                                    {{ csrf_field() }}

                                                    {{ method_field('DELETE') }}

                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{ $category->id }}').submit();
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

@endsection

@push('scripts')

@endpush