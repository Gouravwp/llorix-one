<!-- =========================
 SECTION: TEAM   
============================== -->
<?php
	global $wp_customize;
	$team_background = get_theme_mod('paralax_one_team_background', llorix_one_get_file('/images/background-images/parallax-img/team-img.jpg'));
	$llorix_one_our_team_title = get_theme_mod('parallax_one_our_team_title','Our Team');
	$llorix_one_our_team_subtitle = get_theme_mod('parallax_one_our_team_subtitle','Lorem ipsum dolor sit amet, consectetur adipiscing elit.');
	$llorix_one_team_content = get_theme_mod('parallax_one_team_content',
		json_encode(
			array(
					array('image_url' => llorix_one_get_file('/images/team/1.jpg'),'title' => esc_html__('Albert Jacobs','parallax-one'),'subtitle' => esc_html__('Founder & CEO','parallax-one')),
					array('image_url' => llorix_one_get_file('/images/team/2.jpg'),'title' => esc_html__('Tonya Garcia','parallax-one'),'subtitle' => esc_html__('Account Manager','parallax-one')),
					array('image_url' => llorix_one_get_file('/images/team/3.jpg'),'title' => esc_html__('Linda Guthrie','parallax-one'),'subtitle' => esc_html__('Business Development','parallax-one')),
					array('image_url' => llorix_one_get_file('/images/team/4.jpg'),'title' => esc_html__('Tonya Jacobs','parallax-one'),'subtitle' => esc_html__('Q&A specialist','parallax-one'))
			)
		)
	);

	if(!empty($llorix_one_our_team_title) || !empty($llorix_one_our_team_subtitle) || !empty($llorix_one_team_content)){
		
		if(!empty($team_background)){
			echo '<section class="team team-wrap call-to-action" id="team" style="background-image:url('.$team_background.');" role="region" aria-label="' . esc_html__('Team','parallax-one') . '">';
		} else {
			echo '<section class="team team-wrap call-to-action" id="team" role="region" aria-label="' . esc_html__('Team','parallax-one') . '">';
		}
	
	?>

			<div class="section-overlay-layer">
				<div class="container">

					<!-- SECTION HEADER -->
					<?php 
						if( !empty($llorix_one_our_team_title) || !empty($llorix_one_our_team_subtitle)){ ?>
							<div class="section-header">
							<?php
								if( !empty($llorix_one_our_team_title) ){
									echo '<h2 class="dark-text">'.esc_attr($llorix_one_our_team_title).'</h2><div class="colored-line"></div>';
								} elseif ( isset( $wp_customize )   ) {
									echo '<h2 class="dark-text paralax_one_only_customizer"></h2><div class="colored-line paralax_one_only_customizer"></div>';
								}

							?>

							<?php
								if( !empty($llorix_one_our_team_subtitle) ){
									echo '<div class="sub-heading">'.esc_attr($llorix_one_our_team_subtitle).'</div>';
								} elseif ( isset( $wp_customize )   ) {
									echo '<div class="sub-heading paralax_one_only_customizer"></div>';
								}
							?>
							</div>
					<?php 
						}
			

						if(!empty($llorix_one_team_content)){
							echo '<div class="row team-member-wrap">';
							$llorix_one_team_decoded = json_decode($llorix_one_team_content);
							foreach($llorix_one_team_decoded as $llorix_one_team_member){
								if( !empty($llorix_one_team_member->image_url) ||  !empty($llorix_one_team_member->title) || !empty($llorix_one_team_member->subtitle)){?>
									<div class="col-md-3 team-member-box">
										<div class="team-member border-bottom-hover">
											<div class="member-pic">
												<?php
													if( !empty($llorix_one_team_member->image_url)){
														if( !empty($llorix_one_team_member->title) ){
															echo '<img src="'.esc_url($llorix_one_team_member->image_url).'" alt="'.esc_attr($llorix_one_team_member->title).'">';
														} else {
															echo '<img src="'.esc_url($llorix_one_team_member->image_url).'" alt="'.esc_html__('Avatar','parallax-one').'">';
														}
													} else {
														$default_url = llorix_one_get_file('/images/team/default.png');
														echo '<img src="'.$default_url.'" alt="'.esc_html__('Avatar','parallax-one').'">';
													}
												?>
											</div><!-- .member-pic -->

											<?php if(!empty($llorix_one_team_member->title) || !empty($llorix_one_team_member->subtitle)){?>
											<div class="member-details">
												<div class="member-details-inner">
													<?php 
													if( !empty($llorix_one_team_member->title) ){
														if(function_exists('icl_translate')){
															echo '<h5 class="colored-text">'.icl_translate('Team',$llorix_one_team_member->id.'_team_title',esc_attr($llorix_one_team_member->title)).'</h5>';
														} else {
															echo '<h5 class="colored-text">'.esc_attr($llorix_one_team_member->title).'</h5>';
														}
													}
													?>
												</div><!-- .member-details-inner -->
											</div><!-- .member-details -->
											<?php } ?>
										</div><!-- .team-member -->

										<?php
											if( !empty($llorix_one_team_member->subtitle) ){ ?>
												<div class="small-text">
													<?php
														if(function_exists('icl_translate')){
															echo icl_translate('Team',$llorix_one_team_member->id.'_team_subtitle',esc_attr($llorix_one_team_member->subtitle));
														} else {
															echo esc_attr($llorix_one_team_member->subtitle);
														}
													?>	
												</div>
										<?php } ?>
										
									</div><!-- .team-member -->         
									<!-- MEMBER -->
						<?php
								}
							}
							echo '</div>';
						}?>
				</div>
			</div><!-- container  -->
		</section><!-- #section9 -->
		
<?php
	}
?>