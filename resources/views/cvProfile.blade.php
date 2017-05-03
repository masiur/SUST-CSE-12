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
							<a href="#"><i class="fa fa-flag fa-2x" data-toggle="tooltip" data-placement="top" title="Get in Touch"></i></a>
							<a href="#"><i class="fa fa-money fa-2x" data-toggle="tooltip" data-placement="top" title="Hire Me"></i></a>
						</div>
						<div class="hr-center"></div>
					</div>
				</div>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
				<div id="content">
					<!-- start:navbar -->
					<!-- <nav class="navbar navbar-default navbar-static-top" role="navigation">
						<div class="navbar-header page-scroll">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="collapse navbar-collapse navbar-ex1-collapse">
							<ul class="nav navbar-nav navbar-left">
								<li class="page-scroll"><a href="#id-profile">// Profile</a></li>
								<li class="page-scroll"><a href="#id-work">// Work</a></li>
								<li class="page-scroll"><a href="#id-resume">// Resume</a></li>
								<li class="page-scroll"><a href="#id-blog">// Blog</a></li>
								<li class="page-scroll"><a href="#id-contact">// Contact</a></li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li class="page-scroll"><a href="#id-work">
									<i class="fa fa-angle-double-down"></i>
								</a></li>
							</ul>
						</div>
					</nav> -->
					<!-- end:navbar -->

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
					          		<h2>Hello, I am <strong>{{ $user->profile->name }}</strong></h2>
					          		<h4>{{ $user->profile->workingPlatform }}</h4>
					          		<div class="hr-left"></div>
					          		
					          		<p>{{ $user->profile->aboutme }}</p>
					          	</div>
					        </li>
					        <li id="personal-info">
					          	<div class="timeline-badge primary"></div>
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
									      <tr>
									        <td>Phone</td>
									        <td><b>{{ $user->profile->phone }}</b></td>
									      </tr>
									      <tr>
									        <td>Date of Birth</td>
									        <td><b>{{ $user->profile->dob }}</b></td>
									      </tr>
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
					          	<div class="timeline-badge warning"></div>
					          	<div class="timeline-panel">
						          	<h1>Skills</h1>
						          	<div class="hr-left"></div>
						          	<div class="skillbar clearfix " data-percent="90%">
										<div class="skillbar-title" style="background: #16a085;"><span>HTML5</span></div>
										<div class="skillbar-bar" style="background: #1abc9c;"></div>
										<div class="skill-bar-percent">90%</div>
									</div> <!-- End Skill Bar -->

									<div class="skillbar clearfix " data-percent="85%">
										<div class="skillbar-title" style="background: #2980b9;"><span>CSS3</span></div>
										<div class="skillbar-bar" style="background: #3498db;"></div>
										<div class="skill-bar-percent">85%</div>
									</div> <!-- End Skill Bar -->

									<div class="skillbar clearfix " data-percent="70%">
										<div class="skillbar-title" style="background: #2c3e50;"><span>jQuery</span></div>
										<div class="skillbar-bar" style="background: #2c3e50;"></div>
										<div class="skill-bar-percent">70%</div>
									</div> <!-- End Skill Bar -->

									<div class="skillbar clearfix " data-percent="50%">
										<div class="skillbar-title" style="background: #c0392b;"><span>PHP</span></div>
										<div class="skillbar-bar" style="background: #e74c3c;"></div>
										<div class="skill-bar-percent">50%</div>
									</div> <!-- End Skill Bar -->

									<div class="skillbar clearfix " data-percent="75%">
										<div class="skillbar-title" style="background: #2c3e50;"><span>Wordpress</span></div>
										<div class="skillbar-bar" style="background: #34495e;"></div>
										<div class="skill-bar-percent">75%</div>
									</div> <!-- End Skill Bar -->

									<div class="skillbar clearfix " data-percent="100%">
										<div class="skillbar-title" style="background: #27ae60;"><span>SEO</span></div>
										<div class="skillbar-bar" style="background: #2ecc71;"></div>
										<div class="skill-bar-percent">100%</div>
									</div> <!-- End Skill Bar -->

									<div class="skillbar clearfix " data-percent="70%">
										<div class="skillbar-title" style="background: #f39c12;"><span>Photoshop</span></div>
										<div class="skillbar-bar" style="background: #f1c40f;"></div>
										<div class="skill-bar-percent">70%</div>
									</div> <!-- End Skill Bar -->
					          	</div>
					        </li>
					        <!-- end:resume -->



					        <!-- start:contact -->
					        <!-- <li id="id-contact">
					        	<div class="timeline-badge default"><i class="fa fa-envelope"></i></div>
					        	<h1 class="timeline-head">CONTACT</h1>
					        </li>
					        <li>
					          	<div class="timeline-badge primary"></div>
					          	<div class="timeline-panel">
					          		<h1>Contact Me</h1>
					          		<div class="hr-left"></div>
					          		<p>Excepteur sint occaecat cupidatat non
					          		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					          		<form>
					          			<div class="row">
					          				<div class="col-md-6">
					          					<div class="form-group">
					          						<input class="form-control input-lg" placeholder="Name..."> 
					          					</div>
					          					<div class="form-group">
					          						<input class="form-control input-lg" placeholder="E-mail...">
					          					</div>
					          					<div class="form-group">
					          						<input class="form-control input-lg" placeholder="Subject...">
					          					</div>
					          				</div>
					          				<div class="col-md-6">
					          					<div class="form-group">
					          						<textarea class="form-control input-lg" rows="7" placeholder="Messages..."></textarea>
					          					</div>
					          				</div>
					          			</div>
					          			<div class="form-group">
					          				<button class="btn btn-lg btn-primary btn-block">SEND</button>
					          			</div>
					          		</form>
					          	</div>
					        </li>
					        <li>
					          	<div class="timeline-badge primary"></div>
					          	<div class="timeline-panel">
					          		<h1>Contact Info</h1>
					          		<div class="hr-left"></div>
					          		<div class="row" id="contact">
					          			<div class="col-md-6">
					          				<address>
											  	<strong>Jonathan, Inc.</strong><br>
											  	795 Folsom Ave, Suite 600<br>
											  	San Francisco, CA 94107<br>
											  	<abbr title="Phone">P:</abbr> (123) 456-7890
											</address>

											<address>
											  	<strong>JONATHAN DOE</strong><br>
											  	<a href="mailto:#">name@company.com</a>
											</address>
					          			</div>
					          			<div class="col-md-6">
					          				<p>Ut enim ad minim veniam,
					          				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					          				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					          				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					          				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					          			</div>
					          		</div>
					          		<div class="row">
					          			<div class="col-md-12">
					          				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63245.97055414073!2d110.37484495!3d-7.803250449999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5787bd5b6bc5%3A0x21723fd4d3684f71!2sYogyakarta!5e0!3m2!1sen!2s!4v1402929155034" width="100%" height="250" frameborder="0" style="border:0"></iframe>
					          			</div>
					          		</div>
					          	</div>
					        </li> -->
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

	<!-- start:javascript -->
	<script src="{{ asset('cvFront/js/jquery-1.11.1.min.js') }}"></script>
	<script src="{{ asset('cvFront/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('cvFront/js/marinka.js') }}"></script>
	<script src="{{ asset('cvFront/js/portfolio.jquery.js') }}"></script>
	<script src="{{ asset('cvFront/js/jquery.easing.min.js') }}"></script>
	<script src="{{ asset('cvFront/js/scrolling-nav.js') }}"></script>
	<script src="{{ asset('cvFront/js/jquery.scrollUp.js') }}"></script>
	<!-- end:javascript -->

</body>

<!-- Mirrored from bootemplates.com/themes/marinka/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 May 2017 20:09:43 GMT -->
</html>