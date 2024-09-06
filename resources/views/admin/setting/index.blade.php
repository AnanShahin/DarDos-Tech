@extends('layouts.admin')

@section('title')
    Setting
@endsection

@section('content')
<div class="row">
    <div class="col-xl-12 " >
      <div class="card mb-3 ">
        <div class="row no-gutters">
            <div class="col-md-12">
                <div class="card-body">
                  <h5 class="card-title pt-2">Settings</h5>
                    <form action="{{route('settings.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($errors)
                            @foreach ($errors as $error)
                                {{$error->all()}}
                            @endforeach
                        @endif

                        <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-english-tab" data-toggle="pill" href="#nav-tabs-english"
                                    role="tab" aria-controls="nav-tabs" aria-selected="true">English</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="pills-tabContent">

                            <div class="tab-pane fade show active" id="nav-tabs-english" role="tabpanel" aria-labelledby="pills-english-tab">

                                <div class="form-group">
                                    <label for="facebook">Facebook Link</label>
                                    <input type="text"  class="form-control" name="facebook" id="facebook" placeholder="Facebook Link" value="{{ $settings->facebook ?? null}}">
                                </div>

                                <div class="form-group">
                                    <label for="instagram">Instagram Link</label>
                                    <input type="text"  class="form-control" name="instagram" id="instagram" placeholder="Instagram Link" value="{{ $settings->instagram ?? null}}">
                                </div>

                                <div class="form-group">
                                    <label for="twitter">Twitter</label>
                                    <input type="text"  class="form-control" name="twitter" id="twitter" placeholder="Twitter Link" value="{{ $settings->twitter ?? null}}">
                                </div>

                                <div class="form-group">
                                    <label for="linkedin">Linkedin</label>
                                    <input type="text"  class="form-control" name="linkedin" id="linkedin" placeholder="linkedin Link" value="{{ $settings->linkedin ?? null}}">
                                </div>

                                <div class="form-group">
                                    <label for="youtube">Youtube</label>
                                    <input type="text"  class="form-control" name="youtube" id="youtube" placeholder="Youtube Link" value="{{ $settings->youtube ?? null}}">
                                </div>

                                <div class="form-group">
                                    <label for="facebook">Title</label>
                                    <input type="text"  class="form-control" name="title" id="title" placeholder="title" value="{{ $settings->title ?? null}}">
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="description">Footer Description</label>
                                    <textarea class="form-control" name="description" id="editor" rows="4">
                                        {{ $settings->description ?? null}}
                                    </textarea>
                                </div>

                                <div class="form-group">
                                    <label for="logo">Contact Image</label>
                                    <input type="file" name="logo" class="form-control">
                                    @if (!empty($settings->logo))
                                        <div>
                                            <p>Current Image:</p>
                                            <img src="{{ asset($settings->logo) }}" class="img-thumbnail mt-2" alt="" width="150px" height="150px">
                                        </div>
                                        <div class="mt-2">
                                            <input type="checkbox" name="remove_logo" value="1"> Remove
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="key_words">Key Words</label>
                                    <input type="text"  class="form-control" name="key_words" id="key_words" placeholder="Key Words" value="{{ $settings->key_words ?? null}}">
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text"  class="form-control" name="phone" id="phone" placeholder="Phone Number" value="{{ $settings->phone ?? null}}">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text"  class="form-control" name="email" id="email" placeholder="Email" value="{{ $settings->email ?? null}}">
                                </div>

                                <div class="form-group">
                                    <label for="contact_email">Contact Email</label>
                                    <input type="text"  class="form-control" name="contact_email" id="contact_email" placeholder="Contact Email" value="{{ $settings->contact_email ?? null}}">
                                </div>

                                <div class="form-group">
                                    <label for="carrers_email">Fax</label>
                                    <input type="text"  class="form-control" name="carrers_email" id="carrers_email" placeholder="fax" value="{{ $settings->carrers_email ?? null}}">
                                </div>

                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea class="form-control" name="address" id="editor" rows="4">
                                        {{ $settings->address ?? null}}
                                    </textarea>
                                </div>

                                <div class="form-group">
                                    <label for="url">Address URL</label>
                                    <input type="text"  class="form-control" name="url" id="url" placeholder="Address link" value="{{ $settings->url ?? null}}">
                                </div>

                                <div class="form-group">
                                    <label for="working_days">Working Days</label>
                                    <input type="text"  class="form-control" name="working_days" id="working_days" placeholder="Working Days" value="{{ $settings->working_days ?? null}}">
                                </div>

                                <div class="form-group">
                                    <label for="working_time">Working Time</label>
                                    <input type="text"  class="form-control" name="working_time" id="working_time" placeholder="Working Time" value="{{ $settings->working_time ?? null}}">
                                </div>

                            </div>
                        </div>
                        <div class="from-group mt-6">
                            <button type="submit" class="btn btn-primary btn-pill">Submit</button>
                            <button class="btn btn-light btn-pill">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection

