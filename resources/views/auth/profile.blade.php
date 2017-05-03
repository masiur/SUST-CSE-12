@extends('layouts.default')
@section('content')


        <!-- Page Content Start -->
<!-- ================== -->

<div class="wraper container-fluid">
    <div class="row">
        <div class="col-sm-12">

            <div class="bg-picture" style="background-image:url('/img/slide2.jpg')">
                <span class="bg-picture-overlay"></span><!-- overlay -->
                <!-- meta -->
                <div class="box-layout meta bottom">

                    <div class="col-sm-6 clearfix">
                        <span class="img-wrapper pull-left m-r-15"> {!! Html::image(Auth::user()->profile->img_url, 'alt', array('alt'=> '', 'class' => 'img-circle','width'=> '100', 'height'=>'100')) !!}</span>
                        <div class="media-body">
                            <h3 class="text-white mb-2 m-t-10 ellipsis">{!! $user->username !!}</h3>

                        </div>
                    </div>

                </div>
                <!--/ meta -->
            </div>
        </div>
    </div>

    <div class="row m-t-30">
        <div class="col-sm-12">
            <div class="panel panel-default p-0">
                <div class="panel-body p-0">
                    <ul class="nav nav-tabs profile-tabs">
                        <li class="active"><a data-toggle="tab" href="#aboutme">About Me</a></li>
                        <li class=""><a data-toggle="tab" href="#edit-profile">Settings</a></li>
                        <li class=""><a data-toggle="tab" href="#photo-upload">Photos</a></li>
                        <li class=""><a data-toggle="tab" href="#cv-upload">CV Upload</a></li>
                    </ul>


                    <div class="tab-content m-0">
                        <div id="aboutme" class="tab-pane active">
                            <div class="profile-desk">

                                @include('includes.alert')

                                <h3>About Me/Bio:</h3>
                                <span class="designation">{!!$user->profile->aboutme!!} </span>

                                <h3>I like to be called ...</h3>
                                <h4 class="designation">{!!$user->profile->workingPlatform!!} </h4>


                                {{--contact information--}}
                                <table class="table table-condensed">
                                    <thead>
                                    <tr>
                                        <th colspan="3"><h3>Information</h3></th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    <tr>
                                        <td><b>Complete Name:</b></td>
                                        <td>{!!$user->profile->name!!}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Email</b></td>
                                        <td>{!!$user->email!!}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Gender</b>
                                        </td><td class="ng-binding">{!!$user->profile->gender!!}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Address</b></td>
                                        <td>{!!$user->profile->address!!}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Date of Birth</b></td>
                                        <td>{!!$user->profile->dob!!}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Phone</b></td>
                                        <td>{!!$user->profile->phone!!}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Website</b></td>
                                        <td>{!!$user->profile->website!!}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Github</b></td>
                                        <td>{!!$user->profile->github_link!!}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Facebook</b></td>
                                        <td>{!!$user->profile->fb_link !!}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Linked In</b></td>
                                        <td>{!!$user->profile->linkedin_link!!}</td>
                                    </tr>

                                

                                    {{--<tr>--}}
                                        {{--<td><b>Interests</b></td>--}}
                                        {{--<td>{!!$user->profile->interests!!}</td>--}}
                                       
                                    {{--</tr>--}}

                                    </tbody>
                                </table>
                                  <h5>Interests:</h5>
                                {!! Form::text('ghu', Auth::user()->profile->interests, array('class' => 'form-control','id'=>'tags', 'placeholder' => 'your interests...')) !!}

                            </div> <!-- end profile-desk -->
                        </div> <!-- about-me -->





                        {{--photo Upload--}}

                        <div id="photo-upload" class="tab-pane">
                            <div class="user-profile-content">

                                <div class="photo-upload">
                                    {!! Form::open(array('route' => 'photo.store', 'method' => 'put', 'files' => true)) !!}
                                    <fieldset>
                                        <label>Upload Profile Picture:</label>
                                        <br/>
                                        <img class="preview" id="preview" alt=" " src="{!!asset(Auth::user()->profile->img_url)!!}">
                                        <br/>
                                        <br/>
                                        <input type="file" name="image" id="imgInp" onchange="loadFile(event);" required>
                                    </fieldset>

                                    <fieldset>
                                        {!! Form::submit('Update Profile Picture', array('class' => 'btn btn-primary')) !!}
                                    </fieldset>

                                    {!! Form::close() !!}
                                </div>

                            </div>
                        </div>

                        {{--CV Upload--}}

                        <div id="cv-upload" class="tab-pane">
                            <div class="user-profile-content">

                                <div class="photo-upload">
                                    {!! Form::open(array('route' => 'cv.store', 'method' => 'put', 'files' => true)) !!}
                                    <fieldset>

                                    <a class="btn btn-primary" target="_blank" href="{!!asset(Auth::user()->profile->cv)!!}">Preview CV</a><br><br>
                                        <label>Upload CV:</label>
                                        <br/>
                                        
                            
                                       
                                        <input type="file" name="cvfile"  onchange="loadFile(event);" required>
                                    </fieldset>

                                    <fieldset>
                                        {!! Form::submit('Update CV', array('class' => 'btn btn-success')) !!}
                                    </fieldset>

                                    {!! Form::close() !!}
                                </div>

                            </div>
                        </div>






                        <!-- settings -->

                        <div id="edit-profile" class="tab-pane">
                            <div class="user-profile-content">


                                {!! Form::model($profile, array('route' => 'profile.update', 'method' => 'put'))  !!}

                                <div class="form-group ">
                                    {!! Form::label('name', 'Full Name* :', array('class' => 'col-md-4 control-label')) !!}<br>
                                    {!! Form::text('name',null, array('class' => 'form-control', 'placeholder' => 'John Doe ')) !!}
                                </div>


                                <div class="form-group">
                                    {!! Form::label('gender', 'Gender :', array('class' => 'col-md-4 control-label')) !!}<br>
                                    {!!Form::select('gender', \App\Model\Profile::$genders, \Auth::user()->profile->gender ,array('class' => 'select2 '))!!}
                                </div><br>


                                <div class="form-group ">
                                    {!! Form::label('dob', 'Date Of Birth :', array('class' => 'col-md-4 control-label')) !!}<br/>
                                    {!! Form::text('dob',null, array('class' => 'form-control','id'=>'datepicker', 'placeholder' => 'YYYY-mm-dd')) !!}

                                </div>


                                <div class="form-group ">
                                    {!! Form::label('phone', 'Phone Number : (Int. Format)', array('class' => 'col-md-4 control-label')) !!}
                                    {!! Form::text('phone', \Auth::user()->profile->phone, array('class' => 'form-control', 'placeholder' => '+8801712345678')) !!}
                                </div>

                                <div class="form-group ">
                                    {!! Form::label('address', 'Address*:', array('class' => 'col-md-4 control-label')) !!}
                                    {!! Form::text('address', \Auth::user()->profile->address, array('class' => 'form-control', 'placeholder' => 'Elahi-8B, Khuliapara, Akhaliya, Sylhet, Bangladesh')) !!}
                                </div>

                                <div class="form-group ">
                                    {!! Form::label('website', 'Website (if any) :', array('class' => 'col-md-4 control-label')) !!}
                                    {!! Form::text('website', \Auth::user()->profile->website, array('class' => 'form-control', 'placeholder' => 'http://domainName.tld')) !!}
                                </div>

                                <div class="form-group ">
                                    {!! Form::label('github_link', 'Github Account* :', array('class' => 'col-md-4 control-label')) !!}
                                    {!! Form::text('github_link', \Auth::user()->profile->github_link, array('class' => 'form-control', 'placeholder' => 'https://github.com/username')) !!}
                                </div>

                                <div class="form-group ">
                                    {!! Form::label('fb_link', 'Facebook Account*:', array('class' => 'col-md-4 control-label')) !!}
                                    {!! Form::text('fb_link', \Auth::user()->profile->fb_link, array('class' => 'form-control', 'placeholder' => 'https://facebook.com/username')) !!}
                                </div>

                                <div class="form-group ">
                                    {!! Form::label('linkedin_link', 'Linkedin Account* :', array('class' => 'col-md-4 control-label')) !!}
                                    {!! Form::text('linkedin_link', \Auth::user()->profile->linkedin_link, array('class' => 'form-control', 'placeholder' => 'https://linkedin.com/in/username')) !!}
                                </div>

                                <div class="form-group ">
                                    {!! Form::label('workingPlatform', 'What do yo like to be addressed?* :', array('class' => 'col-md-4 control-label')) !!}
                                    {!! Form::text('workingPlatform', \Auth::user()->profile->workingPlatform, array('class' => 'form-control', 'placeholder' => 'Full Stack Web Developer/Andoid Developer/Programmer')) !!}
                                </div>

                                

                                <div class="form-group ">
                                    {!! Form::label('interests', 'Interests :', array('class' => 'col-md-4 control-label')) !!}
                                    {!! Form::text('interests', null, array('class' => 'form-control','id'=>'tags', 'placeholder' => 'Travelling, Observing shitty status of juniors')) !!}
                                </div>

                                <div class="form-group ">
                                    {!! Form::label('aboutme', 'About me:', array('class' => 'col-md-4 control-label')) !!}
                                    {!! Form::textarea('aboutme', null, array('class' => 'form-control', 'placeholder' => 'I am techie. I have had enough bambo from my department. Please, now give me a job and save me.')) !!}
                                </div>




                                <div class="form-group text-right">
                                    {!! Form::submit('Update', array('class' => 'btn btn-lg btn-success btn-block btn-purple ', 'type'=>'submit')) !!}
                                </div>

                            </div>
                        </div>





                        {{--<!-- profile -->--}}
                        {{--<div id="projects" class="tab-pane">--}}
                            {{--<div class="row m-t-10">--}}
                                {{--<div class="col-md-12">--}}
                                    {{--<div class="portlet">--}}
                                        {{--<div id="portlet2" class="panel-collapse collapse in">--}}
                                            {{--<div class="portlet-body">--}}
                                                {{--<div class="table-responsive">--}}
                                                    {{--<table class="table table-striped table-bordered" id="datatable">--}}
                                                        {{--<thead>--}}
                                                        {{--<tr>--}}
                                                            {{--<th>id</th>--}}
                                                            {{--<th>Title</th>--}}
                                                            {{--<th>Tag</th>--}}
                                                            {{--<th>Image</th>--}}
                                                            {{--<th>Meta Data/ Url</th>--}}
                                                            {{--<th>Created at</th>--}}
                                                            {{--<th>Details</th>--}}
                                                            {{--<th>Edit</th>--}}
                                                            {{--<th>Delete</th>--}}
                                                        {{--</tr>--}}
                                                        {{--</thead>--}}
                                                        {{--<tbody>--}}
                                                        {{--@foreach ($blog as $blogs)--}}
                                                            {{--<tr>--}}
                                                                {{--<td>{!! $blogs->id !!}</td>--}}
                                                                {{--<td>{!! $blogs->title !!}</td>--}}
                                                                {{--<td>{!! $blogs->tag !!}</td>--}}
                                                                {{--<td> <img class="" src="{!! $blogs->img_thumbnail !!}" alt=""></td>--}}
                                                                {{--<td>{!! $blogs->meta_data !!}</td>--}}
                                                                {{--<td>{!! $blogs->created_at->format('Y-m-d') !!}</td>--}}
                                                                {{--<td> <a><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal_{!!$blogs->id!!}" >Details</button></a></td>--}}
                                                                {{--<td><a class="btn btn-warning btn-xs btn-archive Editbtn" href="{!!route('blog.edit',$blogs->id)!!}"  style="margin-right: 3px;">Edit</a></td>--}}
                                                                {{--<td><a href="#" class="btn btn-danger btn-xs btn-archive deleteBtn" data-toggle="modal" data-target="#deleteConfirm" deleteId="{!! $blogs->id!!}">Delete</a></td>--}}
                                                            {{--</tr>--}}

                                                            {{--<!-- Modal -->--}}
                                                            {{--<div id="myModal_{!!$blogs->id!!}" class="modal fade" role="dialog">--}}
                                                                {{--<div class="modal-dialog">--}}
                                                                    {{--<!-- Modal content-->--}}
                                                                    {{--<div class="modal-content" >--}}
                                                                        {{--<center>--}}
                                                                            {{--<div class="modal-header">--}}
                                                                                {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                                                                                {{--<h4 class="modal-title"><img class="img-circle" src="{!! $blogs->img_thumbnail !!}" alt="" align="left">{!! $blogs->title!!}</h4>--}}
                                                                            {{--</div>--}}
                                                                            {{--<div class="modal-body" >--}}
                                                                                {{--<p><b>Id: </b>{!! $blogs->id!!}</p>--}}
                                                                                {{--<p><b>Meta/Url: </b>{!! $blogs->meta_data!!}</p>--}}
                                                                                {{--<p><b>Tag: </b>{!! $blogs->tag!!}</p>--}}
                                                                                {{--<p><b>Details: </b>{!! $blogs->details!!}</p>--}}
                                                                            {{--</div>--}}
                                                                        {{--</center>--}}
                                                                        {{--<div class="modal-footer">--}}
                                                                            {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                                                                        {{--</div>--}}
                                                                    {{--</div>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                            {{--<!--modal -->--}}

                                                        {{--@endforeach--}}
                                                        {{--</tbody>--}}
                                                    {{--</table>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<!-- End profile -->--}}

                    </div>

                </div>
            </div>
        </div>
    </div>






</div>




@stop


@section('style')

    {{--male or female choose--}}
    {!! Html::style('assets/select2/select2.css') !!}

    {{--interests select--}}
    {!! Html::style('assets/tagsinput/jquery.tagsinput.css') !!}

    {{--photo upload custom--}}
    {!! Html::style('css/photo_upload_custom.css') !!}

    {!! Html::style('assets/timepicker/bootstrap-datepicker.min.css') !!}

@stop

@section('script')
    {{--date picker--}}
    {!! Html::script('assets/timepicker/bootstrap-datepicker.js') !!}
    {{--select or choser/ male|female--}}
    {!! Html::script('assets/select2/select2.min.js') !!}
    {{--interests input--}}
    {!! Html::script('assets/tagsinput/jquery.tagsinput.min.js') !!}

    {{--custom photo upload--}}
    {!! Html::script('js/photo_upload_custom.js') !!}



    <script type="text/javascript">

        jQuery(document).ready(function() {

            // Tags Input
            jQuery('#tags').tagsInput({
                width:'100%'
            });

            // Date Picker
            jQuery('#datepicker').datepicker({ dateFormat: 'yyyy-mm-dd' });

            // Select2
            jQuery(".select2").select2({
                width: '100%'
            });
        });

    </script>

@stop
