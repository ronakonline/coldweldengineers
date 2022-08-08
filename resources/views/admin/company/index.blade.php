@extends('layouts.app')

@section('content')
    <div class="header bg-gradient-primary pb-5 pt-5 pt-md-8">
    </div>


    <div class="container-fluid mt--7">
        <div class="row mt-5">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Company</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('company.add') }}" class="btn btn-sm btn-primary">Add Company</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Rank</th>
                                    <th scope="col">Is Active</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $product )
                                <tr>
                                    <td>{{$product->title; }}</td>
                                    <td>{{$product->rank}}</td>
                                    <td>{{$product->is_active}}</td>
                                    <td>{{$product->created_at}}</td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="{{route('company.edit',$product->id)}}">Edit</a>
                                                <a class="dropdown-item" href="{{route('company.delete',$product->id)}}">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">

                        </nav>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
