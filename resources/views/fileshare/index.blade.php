<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{ $title }} - SUST CSE 2012 Batch</title>
        <meta name="description" content="Online File Share">
        <meta name="author" content="Masiur">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- {!! Html::style('//fonts.googleapis.com/css580c.css?family=Montserrat|Roboto') !!} --}}

        <!-- Masiur Rahman Siddiki 
        mrsiddiki AT gmail DOT com
        CSE'12, SUST. -->

        {!! Html::style('css/bootstrap.min.css') !!}
        {!! Html::style('assets/css/font-awesome.min.css') !!}
        {!! Html::style('assets/css/animate.css') !!}
    </head>
<body style="background-color: lavender">

    <div class="container">
        <h1>File Share Online </h1>
        <h4>Link expires in 15 days. Max size upto 100MB</h4>
        <div>
        @if($success = Session::get('success'))
            <div class="alert alert-success alert-dismissable fade in">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {!! $success !!}
                
            </div>
        @endif
            <div class="form"> 
                {!! Form::open(array('route' => 'file.share.store', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true)) !!}
                 
                <div class="form-group">
                    {!! Form::label('file_name', "File Name", array('class' => 'control-label col-md-2')) !!}
                    <div class="col-md-4">
                        {!! Form::text('file_name', null, array('class' => 'form-control', 'placeholder' => 'Name the file')) !!}
                    </div>
                </div>
                
                <div class="form-group">
                    {!! Form::label('thisfile', "Upload a File", array('class' => 'control-label col-md-2')) !!}
                    <div class="col-md-4">
                        {!! Form::file('thisfile', array('class' => 'form-control', 'multiple' => 'false', 'required' => true)) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-4">
                         {!! Form::submit('Upload File', array('class' => 'btn btn-primary')) !!}
                    </div>
                </div>
               {!! Form::close() !!}
            </div>
            
        </div>
    </div>

</body>
</html>
