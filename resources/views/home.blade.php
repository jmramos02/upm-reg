@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {!! session()->get('success')!!}
            </div>
        @endif
        <div class="row justify-content-left">
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">Your Information</div>
                            <div class="card-body">
                                <div class="img-holder">
                                    <form action="/avatar" method="POST" class="avatar-form" enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="avatar" class="avatar-uploader" accept="image/x-png,image/gif,image/jpeg">
                                        @if (Auth::user()->avatar)
                                            <img src="{{ Auth::user()->avatar }}" class="avatar rounded-circle">
                                        @else
                                            <img src="/default.png" class="avatar rounded-circle">
                                        @endif
                                    </form>
                                    <small><em>Click on your avatar to update</em></small>
                                </div>
                                <div class="form-group row mt-2">
                                    <div class="col-md-5">
                                        First Name:
                                    </div>
                                    <div class="col-md-6">
                                        <b>{{ Auth::user()->first_name }}</b>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-5">
                                        Last Name:
                                    </div>
                                    <div class="col-md-6">
                                        <b>{{ Auth::user()->last_name }}</b>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-5">
                                        Email Address:
                                    </div>
                                    <div class="col-md-6">
                                        <b>{{ Auth::user()->email }}</b>
                                    </div>
                                </div>
                                <fieldset class="requirement-status mt-2">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <legend><h4>Requirements Status</h4></legend>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            Photo
                                        </div>
                                        <div class="col-md-6">
                                            @php
                                                if (Auth::user()->avatar == '') {
                                                    echo '<span style="color:red">Not yet submitted</span>';
                                                } else {
                                                    echo '<span style="color:green">Submited</span>';
                                                }
                                            @endphp
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            Medical Certificate
                                        </div>
                                        <div class="col-md-6">
                                            @php
                                                switch (Auth::user()->med_cert_status) {
                                                case "approved":
                                                    echo '<span style="color:green">Approved</span>';
                                                    break;
                                                case "pending":
                                                    echo '<span style="color:blue">Pending</span>';
                                                    break;
                                                case "rejected":
                                                    echo '<span style="color:red">Rejected</span>';
                                                    break;
                                                default:
                                                    echo '<span style="color:red">Not Yet Submited</span>';
                                                    break;
                                                }
                                            @endphp
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            Additional Information
                                        </div>
                                        <div class="col-md-6">
                                            @php
                                                if (Auth::user()->ice_name) {
                                                    echo '<span style="color:green">Submitted</span>';
                                                } else {
                                                    echo '<span style="color:red">Not yet submitted</span>';
                                                }
                                            @endphp
                                        </div>
                                    </div>
                                </fieldset>
                                @if (Auth::user()->ice_name && Auth::user()->med_cert_status == "approved" && Auth::user() && Auth::user()->avatar != '')
                                    <p class="mt-5 alert alert-success">
                                        Congratulations! You've accomplished all the online requirements to
                                        be considered a UPM batch 2019 applicant! Don't forget to settle your
                                        application fee to complete your application.
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <div class="card">
                            <div class="card-header">Announcement</div>
                            <div class="card-body">
                                <ul>
                                    <h6>Welcome! You're on your way to becoming a member of the UP Mountaineers.</h6>

                                    <p>Follow these steps to complete your registration:</p>
                                    <ul>
                                        <li>Upload your profile photo. Make sure that your face can be easily recognized.</li>
                                        <li>Download and accomplish the medical clearance form. Take a photo of it and upload.</li>
                                        <li>Submit all other additional information.</li>
                                        <li>Check the status of all online requirements.</li>
                                        <li> Once completed, settle the app fee:</li>
                                    </ul>
                                    <p class="mt-2">
                                    Php 500 - for <b>students</b> <br>
                                    Php 1800 - for <b>non-students</b>
                                    </p>

                                    <h6>Pay via</h6>
                                    <h6>UPM BPI</h6>
                                    <h6>Account name: UP Mountaineers Inc.</h6>
                                    <h6>Account number: 4483039145</h6>
                                    <p>
                                        (Send deposit slip / proof of payment to fincom@upmountaineers.org.
                                        Or through any EB member.
                                    </p>

                                    <h6><b>Attend the rest of the app activities and don't be late!</b></h6>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <div class="card">
                            <div class="card-header">Downloadable Documents</div>
                            <div class="card-body">
                                <ul>
                                    <li><a href="/medical-clearance-form.docx" download>Medical Clearance Form</a></li>
                                    <li><a href="/pithaya.pdf" download>Pithaya</a></li>
                                    <li><a href="/schedule.jpg">2019 Schedule</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 mt-2">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">Medical Certificate</div>
                            <div class="card-body">
                                @if ($errors->any())
                                    <ul class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                <h5>Medcert Status: {{Auth::user()->med_cert_status ? ucwords(Auth::user()->med_cert_status) : "Not yet submitted" }} </h5>

                                <div class="text-center">
                                    @if (Auth::user()->med_cert_upload_date)
                                        <p>Date Uploaded: {{ Auth::user()->med_cert_upload_date }}</p>
                                    @endif
                                </div>

                                @if (Auth::user()->med_cert_status != 'approved')
                                    <form method="POST" action="{{ route('upload') }}" enctype=multipart/form-data class="update-form">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                @if (Auth::user()->med_cert_status != '')
                                                    <img src="/user/medcert/{{Auth::user()->id}}" class="med-cert"/>
                                                    <a class="block" href="/user/medcert/{{Auth::user()->id}}" target="_blank">View full photo</a>
                                                @endif
                                                <div class="form-group">
                                                    <label for="med_cert">Page 1</label>
                                                    <input type="file" class="form-control-file" name="med_cert" accept="image/x-png,image/gif,image/jpeg">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                @if (Auth::user()->med_cert_status != '')
                                                    <img src="/user/medcert/two/{{Auth::user()->id}}" class="med-cert"/>
                                                    <a class="block" href="/user/medcert/two/{{Auth::user()->id}}" target="_blank">View full photo</a>
                                                @endif
                                                <div class="form-group">
                                                    <label for="med_cert_page_2">Page 2</label>
                                                    <input class=""type="file" class="form-control-file" name="med_cert_page_2" accept="image/x-png,image/gif,image/jpeg">
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Upload / Update') }}
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">Additional Information </div>
                            <div class="card-body ice-form">
                                <form method="POST" action="/user">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="ice_name" class="col-md-4 col-form-label text-md-left">{{ __('In case of emergency') }}</label>
                                        <div class="col-md-6">
                                            <input id="ice_name" type="text" class="form-control" name="ice_name" required placeholder="ex.) Juan Dela Cruz" value="{{ Auth::user()->ice_name }}">
                                            <small><em>Who to contact in case of emergency </em></small>
                                            @error('ice_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="ice_contact_number" class="col-md-4 col-form-label text-md-left">{{ __('Contact number') }}</label>

                                        <div class="col-md-6">
                                            <input id="ice_contact_number" type="text" class="form-control" name="ice_contact_number" required placeholder="ex.) +63905694201" value="{{ Auth::user()->ice_contact_number }}">
                                            <small><em>Your ICE's contact number </em></small>
                                            @error('ice_contact_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="full_address" class="col-md-4 col-form-label text-md-left">{{ __('Full Address') }}</label>
                                        <div class="col-md-6">
                                            <textarea name="full_address" class="form-control">{{ Auth::user()->full_address }}</textarea>
                                            <small><em>Your full address </em></small>
                                            @error('full_address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="join_reason" class="col-md-4 col-form-label text-md-left">{{ __('Why do you want to join UPM?') }}</label>

                                        <div class="col-md-6">
                                            <textarea name="join_reason" class="form-control">{{ Auth::user()->join_reason }}</textarea>
                                            <small><em>Baket nga ba? </em></small>
                                            @error('full_address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                     <input type="hidden" name="_method" value="put" />
                                    <button class="btn btn-success">Submit / Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
