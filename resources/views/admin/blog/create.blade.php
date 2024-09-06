@extends('layouts.admin')

@section('title')
    News - Create
@endsection

@section('content')
<div class="row">
    <div class="col-xl-12 " >
      <div class="card mb-3 ">
        <div class="row no-gutters">
            <div class="col-md-12">
                <div class="card-body">
                  <h5 class="card-title pt-2">Create News</h5>
                    <form action="{{route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
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
                            <li class="nav-item">
                                <a class="nav-link" id="nav-details-tab" data-toggle="pill" href="#nav-details" role="tab"
                                    aria-controls="nav-details" aria-selected="false">Details</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="pills-tabContent">

                            <div class="tab-pane fade show active" id="nav-tabs-english" role="tabpanel" aria-labelledby="pills-english-tab">

                                <div class="form-group">
                                    <label for="title_en">Title</label>
                                    <input type="text"  class="form-control" name="title_en" id="title_en" placeholder="Enter Title">
                                </div>

                                <div class="form-group">
                                    <label for="description_en">Description</label>
                                    <textarea class="form-control" name="description_en" id="editor" rows="4"></textarea>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="nav-arabic" role="tabpanel" aria-labelledby="nav-arabic-tab">

                                <div class="text-right" dir="rtl">
                                    <div class="form-group">
                                        <label for="title_ar">العنوان</label>
                                        <input type="text"  class="form-control" name="title_ar" id="title_ar" placeholder="العنوان">
                                    </div>

                                    <div class="form-group">
                                        <label for="description_ar">المواصفات</label>
                                        <textarea class="form-control" name="description_ar" id="editor" rows="4"></textarea>
                                    </div>

                                </div>

                            </div>
                            <div class="tab-pane fade" id="nav-images" role="tabpanel" aria-labelledby="nav-images-tab">

                                <div class="from-group">
                                    <label for="image">Image</label>
                                    <input id="image" type="file" class="form-control" name="image">
                                </div>

                            </div>

                            <div class="tab-pane fade" id="nav-details" role="tabpanel" aria-labelledby="nav-details-tab">

                                <div class="from-group">
                                    <label for="">Status</label>
                                    <label class="switch switch-primary switch-pill form-control-label ">
                                        <input type="checkbox" class="switch-input form-check-input" name="status">
                                        <span class="switch-label"></span>
                                        <span class="switch-handle"></span>
                                      </label>
                                </div>

                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary btn-pill">Submit</button>
                            <a href="{{ route('blogs.index') }}" class="btn btn-light btn-pill">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
