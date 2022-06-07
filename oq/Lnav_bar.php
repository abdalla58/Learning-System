<nav class = "navbar navbar-header navbar-light bg-primary">
			<div class = "container-fluid">
				<div class = "navbar-header">
					<p class = "navbar-text pull-right text-white"><h3> ADD lessons </h3></p>
					<ul>
            			<li><a class="active" href="../home.php">home</a></li>
            			<li><a href="../about.php">about</a></li>
            			<li><a href="../contactUs.php">contact</a></li>
        			</ul>
				</div>
				<div class = "nav navbar-nav navbar-right">
				</div>
			</div>
			
		</nav>


		</div>
		<script>
			$(document).ready(function(){
				var loc = window.location.href;
				loc.split('{/}')
				$('#sidebar a').each(function(){
				// console.log(loc.substr(loc.lastIndexOf("/") + 1),$(this).attr('href'))
					if($(this).attr('href') == loc.substr(loc.lastIndexOf("/") + 1)){
						$(this).addClass('active')
					}
				})
			})
			
		</script>