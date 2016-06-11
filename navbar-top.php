<div class="navbar-topContacts">
	<div class="container">
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="navbar-top" id="TopMenu">
			<ul class="nav-progress nav-progress-top navbar-nav navbar-right">
				<li><a href="tel:<?php the_field('telefono','option')?>"><span class="glyphicon glyphicon-earphone"></span><?php the_field('telefono_formatted','option')?></a></li>
				<li><a href="mailto:<?php the_field('email','option')?>"><span class="glyphicon glyphicon-envelope"></span> <?php the_field('email','option')?></a></li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</div>

