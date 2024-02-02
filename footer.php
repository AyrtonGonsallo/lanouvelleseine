<?php
/**
 * The template for displaying the footer widget areas.
 * @package Rosa
 * @since   Rosa 1.0
 **/

global $is_gmap, $footer_needs_big_waves;

if ( $is_gmap === true ) {
	//we definitely need the Google Maps API
	wp_enqueue_script( 'google-maps-api' );
}

if ( ! is_404() ):
	$footer_sidebar_style    = 'sidebar--footer__' . wpgrade::option( 'footer_sidebar_style' );
	$footer_bottom_bar_style = 'copyright-area__' . wpgrade::option( 'footer_bottombar_style' );
	?>

	<footer class="site-footer <?php echo $footer_needs_big_waves === true ? 'border-waves' : '' ?>">
		<aside class="sidebar  sidebar--footer <?php echo $footer_sidebar_style ?>">
			<div class="container">
				<?php get_template_part( 'sidebar-footer' ); ?>
			</div>
		</aside>
		









<!-- .sidebar.sidebar- -footer -->
		<div class="copyright-area <?php echo $footer_bottom_bar_style ?>" style="padding: 40px 0 48px 0;">
            <svg class="blurp--bottom" width="192" height="61" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 160.7 61.5" enable-background="new 0 0 160.7 61.5" xml:space="preserve"><path fill="#FFFFFF" d="M80.3,61.5c0,0,22.1-2.7,43.1-5.4s41-5.4,36.6-5.4c-21.7,0-34.1-12.7-44.9-25.4S95.3,0,80.3,0c-15,0-24.1,12.7-34.9,25.4S22.3,50.8,0.6,50.8c-4.3,0-6.5,0,3.5,1.3S36.2,56.1,80.3,61.5z"/></svg>
            <div class="btn--top">
                <a href="#" class="btn--top_text">
                    <span class="btn__arrow btn__arrow--top"></span>
                    <span class="btn__arrow btn__arrow--bottom"></span>
                </a>
            </div>
			<div class="container">
				<div class="footer-container">
					<div class="pixcode  pixcode--grid  grid  thick-gutter  ">
						<div class="grid__item three-twelfths palm-one-whole">
							<p class="p-content-footer">
								<a class="site-logo  site-logo--image  site-logo--image-2x" href="https://lanouvelleseine.com" title="La nouvelle Seine" rel="home">
									<img src="https://lanouvelleseine.com/wp-content/uploads/2015/06/logo-white.png" data-logo2x="https://lanouvelleseine.com/wp-content/uploads/2015/06/logo-retina-white.png" rel="logo" alt="La nouvelle Seine" class="logo-footer">
								</a>
							</p>
						</div>
						<div class="grid__item three-twelfths palm-one-whole">
							<p class="p-content-footer">
								RER B : ST MICHEL<br/>
								M10 : Maubert Mutualité<br/>
								M4 : Cité<br/>
								M1 & M11 : Hôtel de Ville<br/>
								BATOBUS: N-Dame de Paris
							</p>
						</div>
						<div class="grid__item three-twelfths palm-one-whole">
							<p class="p-content-footer">
								VELIB<br/>
								Station N°5107 – rue de Pontoise<br/>
								Station N°5009 – rue de Fouarre<br/>
								BUS: 47- Lagrange<br/>
							</p>
						</div>
						<div class="grid__item three-twelfths palm-one-whole">
							<p class="p-content-footer">
								Péniche sur Berges,face au 3 quai de Montebello
								75005 Paris<br/>
								Tel: 01.43.54.08.08<br/>
							</p>
						</div>
					</div>
					<?php wpgrade_footer_nav( '<nav class="navigation  navigation--footer">', '</nav>' ); ?>

				</div>
			</div>
		</div>
		<!-- .copyright-area -->














	</footer><!-- .site--footer -->

<?php endif; ?>

<div class="covers"></div>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>