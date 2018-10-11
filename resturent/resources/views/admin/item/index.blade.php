@extends('layouts.app')

@section('title','all item')

@push('css')
@endpush

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('item.create') }}" class="btn btn-primary">Add New Item</a>
                    @include('layouts.partial.msg')
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">All Items</h4>
                            <p class="category">Here is a subtitle for this table</p>
                        </div>
                        <div class="card-content table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Category Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>

                                    @foreach($items as $key => $item)

                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>{{$item->name}}</td>
                                            <td><img class="img-responsive img-thumbnail" src="{{ asset('uploads/item/'.$item->image) }}" style="height: 100px; width: 100px" alt=""></td>
                                            <td>{{$item->category->name}}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>{{ $item->updated_at }}</td>
                                            <td>
                                                <a href="{{ route('item.edit',$item->id) }}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>
                                                <form id="delete-form-{{ $item->id }}" action="{{ route('item.destroy',$item->id) }}" style="display: none;" method="POST">


                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}

                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{ $item->id }}').submit();
                                                        }else {
                                                        event.preventDefault();
                                                        }"><i class="material-icons">delete</i></button>
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

@endpush