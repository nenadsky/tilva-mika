<?php
/**
 * The front-page template file
 *
 * This is the front page template file that represents landing page, and also
 * static page of nenadsky.com blog
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tilva_Mika
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section id="intro" class="section-container">
			<div class="intro-container">
				<?php 
					$tilvamika_description = get_bloginfo( 'description', 'display' );
					if ( $tilvamika_description || is_customize_preview() ) :
						?>
						<p id="text-desc" class="text-description"><?php echo $tilvamika_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
						<div class="site-desc-text"> 
							<div id="description" class="site-description"></div>
							<div id="cursor"></div>
						</div>
						
				<?php endif; ?>

				<a id="learn-more" class="btn btn-more" href="#posts">
					&DownArrow; Learn more
				</a>

			</div>
		</section>

		<?php 
            // Pull latest 3 posts from selected category * 2
			$the_query_cat1 = apply_filters('most_recent', '', 'markup');
			$the_query_cat2 = apply_filters('most_recent', '', 'blogroll');
        ?>

		<section id="posts" class="section-container">
			<div class="recent--posts--container">
				
			 <?php 
				if ( $the_query_cat1->have_posts() ) : ?>
				<div class="section-title">
					<a  href=" <?php echo get_permalink( 703 ); ?> "><h2 class="header-title"><ion-icon name="folder"></ion-icon> &#47;</h2></a>
				</div>
				<!-- Loop for displaying posts from first selected category -->
				<div class="posts-row" id="first--category">
				<?php while ( $the_query_cat1->have_posts() ) : $the_query_cat1->the_post(); 
						get_template_part('template-parts/recent-posts', get_post_type() );
					?>
				<?php endwhile; ?>
				</div>
				<?php else : ?>
					<?php 
						get_template_part('template-parts/recent-posts', 'none' ); 
					?>
				<?php endif; ?>

				<?php 
				if ( $the_query_cat2->have_posts() ) : ?>
				<div class="section-title">
					<a href=" <?php echo get_permalink( 703 ); ?> ">&#64; &#47; <?php get_the_category_by_ID(6) ?></a>
				</div>
				<div class="posts-row" id="second--category">
				<?php while ( $the_query_cat2->have_posts() ) : $the_query_cat2->the_post(); ?>
				<?php
						get_template_part('template-parts/recent-posts', get_post_type() );
					?>
				<?php endwhile; ?>
				</div>
				<?php else : ?>
					<?php 
						get_template_part('template-parts/recent-posts', 'none' ); 
					?>
				<?php endif; ?>
			</div>
		</section>

		<section id="portfolio" class="section-container">
			<div class="section-title">
				<a href="#"> <h2 class="title-header" ><ion-icon name="code"></ion-icon> <span><?php esc_html_e('Portfolio', 'tilvamika'); ?></span></h2></a>
				<p><?php esc_html_e('Текући и завршени пројекти :)', 'tilvamika'); ?></p>
			</div>
			<div class="portfolio--container">
				<div class="project project--1">
					<div class="project-container">
						<div class="project-text">
							<a href="http://wall-ye.com/"><h3><?php esc_html_e('WallYe', 'tilvamika'); ?></h3></a>
							<p><?php esc_html_e('WallYe веб продавница потпуно аутоматизованих пољопривредних робота. ', 'tilvamika'); ?></p>
							<p><?php esc_html_e('Бекенд: Фласк (Flask) - кодирао: Трле )', 'tilvamika'); ?></p>
							<p><?php esc_html_e('Фронтенд: ХТМЛ5 ( HTML5 ), ЦСС ( CSS ), ЈаваСкрипт, ЏејКуери ( jQuery ) - кодирао лично ;)', 'tilvamika'); ?></p>
						</div>
						<?php $img = apply_filters('display_default_featured_img', 1714, 'fullsize'); ?>
						<a href="http://wall-ye.com/"><img class="portfolio-image" src="<?php echo $img[0]; ?>" alt="WallYe Web Shop"></a>
					</div>
				</div>
				<div class="project project--2">
					<div class="project-container">
						<div class="project-text">
							<a href="http://alkamaks.mk/"><h3><?php esc_html_e('AlkaMaks', 'tilvamika'); ?></h3></a>
							<p><?php esc_html_e('Алка Макс месара ', 'tilvamika'); ?></p>
							<p><?php esc_html_e('Покреће: Вордпресс', 'tilvamika'); ?></p>
							<p><?php esc_html_e('Дизајн: ХТМЛ5 ( HTML5 ), ЦСС ( CSS ), ЈаваСкрипт', 'tilvamika'); ?></p>
						</div>
						<?php $img = apply_filters('display_default_featured_img', 1713, 'fullsize'); ?>
						<a href="http://alkamaks.mk/"><img class="portfolio-image" src="<?php echo $img[0]; ?>" alt="WallYe Web Shop"></a>
					</div>
				</div>

				<button class="slider__btn slider__btn--left"><ion-icon name="arrow-dropleft"></ion-icon></button>
        		<button class="slider__btn slider__btn--right"><ion-icon name="arrow-dropright"></ion-icon></button>
        		<div class="dots"></div>
			</div>
		</section>

		<section id="bio" class=section-container">
			<div class="bio-container">
				<div class="section-title">
					<a href="#"> <h2 class="title-header"><ion-icon name="document"></ion-icon> <span><?php esc_html_e('Вештине', 'tilvamika'); ?></span></h2></a>
					<p><?php esc_html_e('Издвојене вештине :)', 'tilvamika'); ?></p>
				</div>
				<div class="bio-tabs">

					<div class="bio__tab-container">
						<button
							class="btn__tab bio__tab bio__tab--1 bio__tab--active"
							data-tab="1"
						>
							<span><ion-icon name="logo-tux"></ion-icon></span>GNU/Linux
						</button>
						<button class="btn__tab bio__tab bio__tab--2" data-tab="2">
							<span><ion-icon name="logo-wordpress"></span></ion-icon>PHP
						</button>
						<button class="btn__tab bio__tab bio__tab--3" data-tab="3">
							<span><ion-icon name="logo-javascript"></span></ion-icon>JavaScript
						</button>
					</div>

					<div
					class="bio__content bio__content--1 bio__content--active"
					>
					<div class="bio__icon bio__icon--1">
						<ion-icon name="logo-tux"></ion-icon>
					</div>
					<h5 class="bio__header">
						ГНУ / Линукс оперативни систем - слобода нема цену
					</h5>
					<p>
						Ушао сам у свет ГНУ/Линукса и слободног софтвера у опште 2008. године и од тад се нисам освртао. Љубав која испуњава, али понекад кида живце :) За све ове године користио сам многе дистрибуције, али Арч Линукс ме је привукао и задржао. Дистро који је намењен онима који желе да истражују. Наравно ни ГНУ/Линукс није савршен, он је само мање лош од осталих у понуди - зато је моја препорука свима! :)
					</p>
					</div>

					<div class="bio__content bio__content--2">
					<div class="bio__icon bio__icon--2">
						<ion-icon name="logo-wordpress">
					</div>
					<h5 class="bio__header">
						ПеХаПе и Вордрпес
					</h5>
					<p>
						ПеХаПе (енг. PHP) као серверски скрипт језик и Вордпрес заснован на првом и широко распрострањен на Вебу је нешто чему тежим да усавршим. Сведок томе је и мој повратак на Веб након 10ак година лутања. ПеХаПе јако дуго познајем, имао сам пар мањих пројеката, али време је за нову страницу у тој причи и озбиљнији рад са моје стране.
					</p>
					</div>
					<div class="bio__content bio__content--3">
					<div class="bio__icon bio__icon--3">
						<ion-icon name="logo-javascript">

					</div>
					<h5 class="bio__header">
						ЈаваСкрипт - главни покретач Веб-а
					</h5>
					<p>
						Бекенд или фронтенд, зашто не оба?! Морам да признам, дуго сам бежао од фронтенда, али у последњих пола године (у тренутку када пишем ово) схватио сам и много урадио на учењу и примени ЈаваСкрипта. Сати прегледаних туторијала и рада полако почињу да дају резултате, а тек се загревам. Синтаксу језика сам у почетку гледао са неверицом, али је сада ЈаваСкрипт нешто што морам и желим да знам! :)
					</p>
				</div>
			</div>
		</section>

		<section id="social" class="section-container">
			<div class="social-container">
				<a class="twitter" href="#"><ion-icon name="logo-twitter"></ion-icon></a>
				<a class="linkedin" href="#"><ion-icon name="logo-linkedin"></ion-icon></a>
				<a class="mail" href="#"><ion-icon name="mail"></ion-icon></a>
				<a class="github" href="#"><ion-icon name="logo-github"></ion-icon></a>
			</div>
		</section>

	</main><!-- #main -->

<?php
/*get_sidebar();*/
get_footer();
