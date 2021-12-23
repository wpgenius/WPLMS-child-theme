<?php
get_header(vibe_get_header());
?>
<section id="content">
	<?php do_action('wplms_after_header'); ?>
    <div class="<?php echo vibe_get_container(); ?> error-page-wrapper">
            <h1 class="text-center">Ooops...</h1>		
			<h4 class="text-center"> We were unable to find the page you are looking for.</h4>
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8 text-center">
					<div class="search_wrapper">
						<form method="GET" action="https://ch-lms.tyche.work">
					        <input type="hidden" name="post_type" value="course">                 
					        <input type="text" name="s" placeholder="Search courses.." value="">
						</form>
					</div>
					<?php the_widget('vibe_course_categories'); ?>
					<div class="course-button">
						<?php 
						$bp_pages = get_option('bp-pages');
						$courses_page_id = $bp_pages['course'];
						?>
						<a href="<?php echo  get_permalink( $courses_page_id ); ?>" class="button" role="button">Browse All Courses</a>
					</div>   
				</div>	
				<div class="col-md-2"></div>
			</div>		
    </div>
</section>
<?php
get_footer(vibe_get_footer());
?>