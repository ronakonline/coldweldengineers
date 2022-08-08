@extends('layouts.app')

@section('content')
    <div class="header bg-gradient-primary pb-5 pt-5 pt-md-8">
    </div>


    <div class="container-fluid mt--7">
        <div class="row mt-5">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Edit Expertie') }}</h3>
                        </div>
                    </div>
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <form method="post" action="{{ route('experties.update',$experties->id) }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            @method('post')

                            <h6 class="heading-small text-muted mb-4">{{ __('experties information') }}</h6>

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Title') }}</label>
                                    <input type="text" name="title" id="input-name"
                                        class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Title') }}" required autofocus
                                        value={{$experties->title}}
                                        >

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('desc') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Description') }}</label>
                                    <textarea
                                    id="editor"
                                    name="desc"
                                    class="form-control form-control-alternative{{ $errors->has('desc') ? ' is-invalid' : '' }}"
                                    >{{$experties->desc}}</textarea>

                                    @if ($errors->has('desc'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('desc') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('rank') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Rank') }}</label>
                                    <input type="number" name="rank" id="input-name"
                                        class="form-control form-control-alternative{{ $errors->has('rank') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Rank') }}" value={{$experties->rank}} required autofocus>

                                    @if ($errors->has('rank'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('rank') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('is_active') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Active') }}</label>
                                    <input type="checkbox" name="is_active"
                                        class="{{ $errors->has('is_active') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Active') }}" @checked($experties->is_active) autofocus>

                                    @if ($errors->has('is_active'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('is_active') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('images') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-image">{{ __('Images') }}</label>
                                    <input type="file" name="images[]" id="product-images" multiple
                                        class="form-control form-control-alternative{{ $errors->has('images') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Images') }}"  autofocus>

                                    @if ($errors->has('images'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('images') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group row preview">
                                    <div class="col-sm-12">
                                        <label class="col-form-label">Experties Images</label>
                                        <div class="row">
                                            @foreach ($experties->images as $image)
                                                <div class="col-sm-3">
                                                    <img src="{{ asset('images/' . $image->img) }}"
                                                        class="img-fluid" alt="" height="200px" width="200px"
                                                        data-img-name="{{ $image->img }}">
                                                    <a href="" class="btn btn-danger rounded mt-2 delete-img">Delete
                                                        {{ $loop->index + 1 }}</a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <input type="text" name="delete_images" id="delete_images" class="delete-images" hidden>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Update') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
