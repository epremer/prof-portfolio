<?php
require('constant.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact Me | Lizz Premer</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description"
		content="Lizz Premer | UX Designer and Software Engineer">
	<meta name="author" content="Elizabeth Premer & templatemo">
	<meta name="keywords"
		content="Lizz Premer, Elizabeth Premer, UX Design, UX Designer, User Experience, User Interface">


    <!-- 

    -->
    
	<!-- Google Fonts -->
	<link href="http://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700itali" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Raleway:400,900,800,700,500,200,100,600" rel="stylesheet">

	<!-- Icons -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="../bootstrap/bootstrap.css">
	<link rel="stylesheet" href="../css/misc.css">
	<link rel="stylesheet" href="/css/blue-scheme.css">
	
	<!-- JavaScripts -->
	<script src="../js/jquery-1.10.2.min.js"></script>
	<script src="../js/jquery-migrate-1.2.1.min.js"></script>

	<link rel="shortcut icon" href="../images/logos/PE_logo.JPG" type="image/x-icon" />


	<script src="component/jquery/jquery-3.2.1.min.js"></script>
	<script>
	$(document).ready(function (e){
		$("#frmContact").on('submit',(function(e){
			e.preventDefault();
			$("#mail-status").hide();
			$('#send-message').hide();
			$('#loader-icon').show();
			$.ajax({
				url: "contact.php",
				type: "POST",
				dataType:'json',
				data: {
				"name":$('input[name="name"]').val(),
				"email":$('input[name="email"]').val(),
				"phone":$('input[name="phone"]').val(),
				"content":$('textarea[name="content"]').val(),
				"g-recaptcha-response":$('textarea[id="g-recaptcha-response"]').val()},				
				success: function(response){
				$("#mail-status").show();
				$('#loader-icon').hide();
				if(response.type == "error") {
					$('#send-message').show();
					$("#mail-status").attr("class","error");				
				} else if(response.type == "message"){
					$('#send-message').hide();
					$("#mail-status").attr("class","success");							
				}
				$("#mail-status").html(response.text);	
				},
				error: function(){} 
			});
		}));
	});
	</script>

	<!-- Pre-existing Contact styles -->
	<style>
	.label {margin: 2px 0;}
	.field {margin: 0 0 20px 0;}	
		.content {width: 960px;margin: 0 auto;}
		h1, h2 {font-family:"Georgia", Times, serif;font-weight: normal;}
		div#central {margin: 40px 0px 100px 0px;}
		@media all and (min-width: 768px) and (max-width: 979px) {.content {width: 750px;}}
		@media all and (max-width: 767px) {
			body {margin: 0 auto;word-wrap:break-word}
			.content {width:auto;}
			div#central {	margin: 40px 20px 100px 20px;}
		}
		body {font-family: 'Helvetica',Arial,sans-serif;background:#ffffff;margin: 0 auto;-webkit-font-smoothing: antialiased;  font-size: initial;line-height: 1.7em;}	
		input, textarea {width:100%;padding: 15px;font-size:1em;border: 1px solid #A1A1A1;	}
		button {
			padding: 12px 60px;
			background: #5BC6FF;
			border: none;
			color: rgb(40, 40, 40);
			font-size:1em;
			font-family: "Georgia", Times, serif;
			cursor: pointer;	
		}
		#message {  padding: 0px 40px 0px 0px; }
		#mail-status {
			padding: 12px 20px;
			width: 100%;
			display:none; 
			font-size: 1em;
			font-family: "Georgia", Times, serif;
			color: rgb(40, 40, 40);
		}
	  .error{background-color: #F7902D;  margin-bottom: 40px;}
	  .success{background-color: #48e0a4; }
		.g-recaptcha {margin: 0 0 25px 0;}	  
	</style>
	<script src='https://www.google.com/recaptcha/api.js'></script>	


	<!-- 
	Medigo Template
	http://www.templatemo.com/preview/templatemo_460_medigo
    -->

	<!-- Google Fonts -->
	<link href="http://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700itali" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Raleway:400,900,800,700,500,200,100,600" rel="stylesheet">

	<!-- Icons -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
		integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

	<!-- Stylesheets - MedigoBlue -->
	<link rel="stylesheet" href="../assets/bootstrap/bootstrap.css">
	<link rel="stylesheet" href="../assets/css/misc.css">
	<link rel="stylesheet" href="../assets/css/blue-scheme.css">

	<!-- JavaScripts MedigoBlue -->
	<script src="../assets/js/jquery-1.10.2.min.js"></script>
	<script src="../assets/js/jquery-migrate-1.2.1.min.js"></script>

	<link rel="shortcut icon" href="../assets/images/logos/PE_logo.JPG" type="image/x-icon" />




	<section class="under-construction">Please be advised that this website is currently under construction and may have a few bugs that will be fixed soon. Thank you!</section>


	<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="content">
						<div class="">
							<h1>Interested in Hiring Me?</h1>
							<p>Get more infromation about my services, or ask a question.</p>
						</div>
						<div class="contact-wrapper">
							<h2>Contact Me</h2>
							<div id="message">
								<form id="frmContact" action="" method="POST" novalidate="novalidate">
									<div class="label">Name:</div>
									<div class="field">
										<input type="text" id="name" name="name" placeholder="enter your name here" title="Please enter your name" class="required" aria-required="true" required>
									</div>
									<div class="label">Email:</div>
									<div class="field">			
										<input type="text" id="email" name="email" placeholder="enter your email address here" title="Please enter your email address" class="required email" aria-required="true" required>
									</div>

									<div class="label">Comments/Questions:</div>
									<div class="field">			
										<textarea id="comment-content" name="content" placeholder="enter your comments here"></textarea>			
									</div>


									<div class="g-recaptcha" data-sitekey="<?php echo SITE_KEY; ?>"></div>			
									<div id="mail-status"></div>			
									<button type="Submit" id="send-message" style="clear:both;">Send Message</button>
								</form>
								<div id="loader-icon" style="display:none;"><img src="img/loader.gif" /></div>
								</div>		
							</div><!-- content -->
						</div><!-- central -->	
                                
                              
                            </form>
                          </div> <!-- /.widget-inner -->
                        </div> <!-- /.contact-form -->
                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->
			</div> <!-- /.col-md-8 -->
	</div> <!-- /.container -->	



		
	<!-- SITE FOOTER -->
	<footer class="site-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<nav class="footer-nav clearfix">
						<ul class="footer-menu">
							
						</ul> <!-- /.footer-menu -->
					</nav> <!-- /.footer-nav -->
				</div> <!-- /.col-md-12 -->
			</div> <!-- /.row -->
			<div class="row">
				<div class="col-md-12">
					<p class="copyright-text">Copyright &copy; 2019 Lizz Premer
						| Development: Lizz Premer</p>
				</div> <!-- /.col-md-12 -->
			</div> <!-- /.row -->
		</div> <!-- /.container -->
	</footer> <!-- /.site-footer -->


	<!-- END - SITE FOOTER -->

	<!-- Scripts -->
	<script src="../assets/js/min/plugins.min.js"></script>
	<script src="../assets/js/min/medigo-custom.min.js"></script>
	<script>
        function initialize() {
          var mapOptions = {
            zoom: 14,
            center: new google.maps.LatLng(13.758468, 100.567481)
          };

          var map = new google.maps.Map(document.getElementById('map-canvas'),
              mapOptions);
        }

        function loadScript() {
          var script = document.createElement('script');
          script.type = 'text/javascript';
          script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&' +
              'callback=initialize';
          document.body.appendChild(script);
        }

        window.onload = loadScript;
    </script>


</body>
</html>