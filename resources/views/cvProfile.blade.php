<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ $user->profile->name }} - SUST CSE Batch 2012</title>
	<meta name="description" content="{{ $user->profile->aboutme }}">
    <meta name="author" content="Webian of CSE'12">
	<link rel="stylesheet" type="text/css" href="{{ asset('cvFront/css/style.css') }}">
	<link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Developer -->
    <!-- Masiur Rahman Siddiki
    masiur AT sustcse12 DOT xyz
    CSE'12, SUST. -->
</head>
<body id="page-top">

	<!-- start:main -->
	<div class="container" id="main">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
				<div id="sidebar">
					<div class="sosmed">
						<div class="text-center">
							<a href="{{ $user->profile->fb_link }}" target="_blank"><i class="fa fa-facebook fa-2x" data-toggle="tooltip" data-placement="top" title="Facebook"></i></a>
							<a href="{{ $user->profile->github_link }}" target="_blank"><i class="fa fa-github fa-2x" data-toggle="tooltip" data-placement="top" title="Github"></i></a>
							<a href="{{ $user->profile->linkedin_link }}" target="_blank"><i class="fa fa-linkedin fa-2x" data-toggle="tooltip" data-placement="top" title="Google Plus"></i></a>
						</div>
					</div>
					<div class="user">
						<div class="text-center">
							<img src="{{ asset($user->profile->img_url) }}" class="img-circle" width="190px">
						</div>
						<div class="user-head">
							<h1>{{ $user->profile->name }}</h1>
							<div class="hr-center"></div>
							<h5> CSE 2012, SUST</h5>
						</div>
					</div>
					<div class="link-me">
						<div class="text-center">
							<a href="{{ $user->profile->cv }}" target="_blank"><i class="fa fa-download fa-2x" data-toggle="tooltip" data-placement="top" title="Download My CV"></i></a>
							<a href="mailto:{{ $user->email }}"><i class="fa fa-envelope fa-2x" data-toggle="tooltip" data-placement="top" title="Get in Touch"></i></a>
							
						</div>
						<div class="hr-center"></div>
					</div>
				</div>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
				<div id="content">
			
					<!-- start:main content -->
					<div class="main-content">
						<ul class="timeline">
							<!-- start:profile -->
							<li id="id-profile">
								<div class="timeline-badge default"><i class="fa fa-user"></i></div>
								<h1 class="timeline-head">PROFILE</h1>
							</li>
					        <li id="profile">
					          	<div class="timeline-badge primary"></div>
					          	<div class="timeline-panel">
					          		<h2>Hello, I am <strong style="font-family: 'Oxygen', sans-serif;font-size: 30px;">{{ $user->profile->name }}</strong></h2>
					          		<h3>{{ $user->profile->workingPlatform }}</h3>
					          		<div class="hr-left"></div>
					          		
					          		<p>{{ $user->profile->aboutme }}</p>
					          	</div>
					        </li>
					        <li id="personal-info">
					          	<div class="timeline-badge warning"></div>
					          	<div class="timeline-panel">
					          		<h1>Personal Info</h1>
					          		<div class="hr-left"></div>

					          		<table class="table table-striped">
									    <tbody>
									      <tr>
									        <td>Full Name</td>
									        <td><b>{{ $user->profile->name }}</b></td>
									      </tr>
									      <tr>
									        <td>Email</td>
									        <td><b>{{ $user->email }}</b></td>
									      </tr>
									      @if($user->profile->phone)
									      <tr>
									        <td>Phone</td>
									        <td><b>{{ $user->profile->phone }}</b></td>
									      </tr>
									      @endif

									      @if($user->profile->dob)
									      <tr>
									        <td>Date of Birth</td>
									        <td><b>{{ $user->profile->dob }}</b></td>
									      </tr>
									      @endif
									      <tr>
									        <td>Address</td>
									        <td><b>{{ $user->profile->address }}</b></td>
									      </tr>
									      @if($user->profile->website)
									      <tr>
									        <td>Website</td>
									        <td><b>{{ $user->profile->website }}</b></td>
									      </tr>
									      @endif

									    </tbody>
									 </table>
					          			
					          	</div>
					        </li>
					        <!-- end:profile -->

					     
					      
					        
					        <li>
					          	<div class="timeline-badge primary"></div>
					          	<div class="timeline-panel">
						          	<h1>Skills</h1>
						          	<div class="hr-left"></div>
						          	<!-- <div class="skillbar clearfix " data-percent="90%">
										<div class="skillbar-title" style="background: #16a085;"><span>HTML5</span></div>
										<div class="skillbar-bar" style="background: #1abc9c;"></div>
										<div class="skill-bar-percent">90%</div>
									</div>  -->
									@foreach($user->skills as $skill)
									{{-- below two function are used to take random value from that array  --}}
									<button disabled class="btn btn-{{ array_rand(array_flip(['danger', 'primary', 'success'])) }}">{{ $skill->skills }}</button>
									@endforeach

									
					          	</div>
					        </li>
					        <!-- end:skill -->

					        @if($user->profile->interests)
					        <li>
					          	<div class="timeline-badge warning"></div>
					          	<div class="timeline-panel">
					          		<h1>Interest</h1>
					          		<div class="hr-left"></div>
					          		@foreach(explode(',', $user->profile->interests) as $interest)
									{{-- below two function are used to take random value from that array  --}}
									<button disabled class="btn btn-{{ array_rand(array_flip(['danger', 'primary', 'success'])) }}">{{ $interest }}</button>
									@endforeach
					          	</div>
					        </li>
					        @endif 
					        <!-- end:interest -->


					        
					        <li>
					          	
					          	<div class="">
					          		
					          		<a href="{{ $user->profile->cv }}" target="_blank" class="btn btn-primary btn-lg"><i class="fa fa-download"></i> Download My CV</a>
					          	</div>
					        </li>
					        <!-- end:contact -->
					    </ul>
					</div>
					<!-- end:main content -->
				</div>
			</div>
		</div>
	</div>
	<!-- end:main -->

	<!-- start:footer -->
	<footer>
		<div class="container">
			<div class="text-center">
				<p>Copyright&copy;2016-{{ Date("Y") }} Twelve Batch. All rights reserved.</p>
				<p>Dept. of Computer Science & Engineering, SUST, Sylhet</p>
			</div>
		</div>
	</footer>

	<!-- end:footer -->


</body>

<!-- Mirrored from bootemplates.com/themes/marinka/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 May 2017 20:09:43 GMT -->
</html>