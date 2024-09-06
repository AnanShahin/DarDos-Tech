@extends('layouts.admin')

@section('title')
    About Us
@endsection

@section('content')
<div class="row">
    <div class="col-xl-12">
      <div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-md-12">
                <div class="card-body">
                    <h5 class="card-title pt-2">About Us</h5>
                    <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($errors)
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach
                        @endif

                        <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-english-tab" data-toggle="pill" href="#nav-tabs-english"
                                    role="tab" aria-controls="nav-tabs" aria-selected="true">English</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="nav-arabic-tab" data-toggle="pill" href="#nav-arabic" role="tab"
                                    aria-controls="nav-arabic" aria-selected="false">Arabic</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="nav-images-tab" data-toggle="pill" href="#nav-images" role="tab"
                                    aria-controls="nav-images" aria-selected="false">Images</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="pills-tabContent">

                            <div class="tab-pane fade show active" id="nav-tabs-english" role="tabpanel" aria-labelledby="pills-english-tab">

                                <div class="form-group">
                                    <label for="title_en">Title</label>
                                    <input type="text" class="form-control" name="title_en" id="title_en" placeholder="Title" value="{{ $about->title_en ?? '' }}">
                                </div>

                                <div class="form-group">
                                    <label for="description_en">Description</label>
                                    <textarea class="form-control" name="description_en" id="editor" rows="4">{{ $about->description_en ?? '' }}</textarea>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="nav-arabic" role="tabpanel" aria-labelledby="nav-arabic-tab">
                                <div class="text-right" dir="rtl">

                                    <div class="form-group">
                                        <label for="title_ar">العنوان</label>
                                        <input type="text" class="form-control" name="title_ar" id="title_ar" placeholder="العنوان" value="{{ $about->title_ar ?? '' }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="description_ar">الوصف </label>
                                        <textarea class="form-control" name="description_ar" id="editor" rows="4">{{ $about->description_ar ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="nav-images" role="tabpanel" aria-labelledby="nav-images-tab">
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" class="form-control">
                                    @if (!empty($about->image))
                                        <div>
                                            <p>Current Image:</p>
                                            <img src="{{ asset($about->image) }}" class="img-thumbnail mt-2" alt="" width="150px" height="150px">
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group mt-6">
                                <button type="submit" class="btn btn-primary btn-pill">Submit</button>
                                <button class="btn btn-light btn-pill">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
