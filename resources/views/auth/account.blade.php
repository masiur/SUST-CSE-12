@extends('layouts.default')
@section('content')
    <div class="wraper container-fluid">

        @include('includes.alert')
        
        <!-- Masiur Rahman Siddiki -->
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                    <h4>{{ $title }}</h4>
                            </div>
                            <!-- <div class="col-md-6">                            
                                <a class="pull-right" href="{!! route('notice.index')!!}"><button class="btn btn-success">All Notices So Far</button></a>
                            </div> -->
                         </div>
                    </div>

                    <div class="panel-body">
                            
                                <div class=" form"> 

                                    {!! Form::model($user, array('route' => ['post.edit.account'], 'method' => 'POST', 'class' => 'form-horizontal')) !!}


                                    <div class="form-group">
                                        {!! Form::label('email', "Email *", array('class' => 'control-label col-lg-2')) !!}
                                        <div class="col-lg-10">
                                            {!! Form::text('email', null, array('class' => 'form-control', 'required' => 'required')) !!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('username', "Username*", array('class' => 'control-label col-lg-2')) !!}
                                        <div class="col-lg-10">
                                            {!! Form::text('username', null, array('class' => 'form-control', 'required' => 'required')) !!}
                                        </div>
                                    </div>
    

                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                        {!! Form::submit('Update Account Settings', array('class' => 'btn btn-success')) !!}
                                        </div>
                                    </div>

                                    {!! Form::close() !!}
                                </div>
                             
                    </div>
                </div>

            </div>

        </div>

@stop
