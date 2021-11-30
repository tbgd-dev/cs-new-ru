<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>
<?php do_action( 'storefront_before_footer' ); ?>
<?php if ( is_page('old-home-page') ) { ?>
    	</div><!-- #content -->
    <?php } else { ?>
	</div><!-- #content -->
    <?php } ?>

    <?php if ( is_singular('cands_journal') && is_singular('post') ) { ?>
    <div class="related-journal">
    <h2>Latest from C&S...</h2>
    <div class="related-journal-holder">
<?php
$currentID = get_the_ID();
$my_query = new WP_Query( array('cat' => '1', 'showposts' => '4', 'post__not_in' => array($currentID)));
while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
<div class="related-journal-item">
    <div class="related-journal-item-pad">
  <div class="related-journal-item-bg">
  <?php echo get_the_post_thumbnail(); ?>
  </div>
<small><?php the_date('F Y')?></small>
<h3><?php the_title() ?></h3>
<p><a href="<?php the_permalink(); ?>">More</a></p>
</div>
</div>
<?php endwhile; ?>
</div>
</div>
<?php } else { ?>
    <?php } ?>

<?php if ( is_page('join-cs') ) { ?>
 <?php } else { ?>
<section id="footersignup" style="background-color:#eee; display:none;">
	<div class="col-full textcenter contentpadding_med">
<h2 style="font-size:220%;">Become a Friend of Czech & Speake</h2>
		<p>
			<a class="button" href="https://czechandspeakefragrance.com/join-cs/">Sign up here</a>
		</p>
</div>
</section>
    <?php } ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="col-full textcenter">
		<div class="klaviyo-form-MWtnQk"></div>
	<a href="https://www.czechandspeake.com/" class="" rel="" target=""><img width="50" height="50" src="https://www.czechandspeake.com/global/icon-white.png" class="image wp-image-14310  attachment-50x50 size-50x50" alt="" style="max-width: 100%; height: auto; margin-top:30px; margin-left:auto; margin-right:auto;"></a>
	</div>
		<div class="col-full">

			<?php
			/**
			 * Functions hooked in to storefront_footer action
			 *
			 * @hooked storefront_footer_widgets - 10
			 * @hooked storefront_credit         - 20
			 */
			do_action( 'storefront_footer' ); ?>

		</div><!-- .col-full -->
		<div class="full textcenter contentpadding_exsm" style="background-color:#eee; margin-top:35px; overflow:hidden; display:none;">
		<div class="col-full">
			<div class="row contentpadding_exsm" style="position:relative;">

      <a href="https://czechandspeakefragrance.com/reviews/"><div id="y-badges" class="yotpo yotpo-badge badge-init">&nbsp;</div></a>

			<div class="five columns textleft" style="display:none;">
			<img src="https://www.czechandspeake.com/global/payment-methods.svg" alt="payment methods" id="payment-methods" class="payment-methods" />
			</div>

			<div class="twelve columns textright" style="background-color:black;">
			<h5 style="color:white; text-align:center;"><?php the_field('footer_delivery_text', 'options'); ?></h5>
			</div>

			</div>
			</div>
		</div>
	</footer><!-- #colophon -->

	<?php do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->

<a href="<?php echo get_bloginfo('url') ?>/loyalty-club/" class="loyalty-club-cta" style="display:none;">Rewards Club</a>

<?php wp_footer(); ?>

<?php if( get_field('let_it_snow', 'options') ): ?>
<?php if( is_front_page() ): ?>	
<canvas class="snow" style="position:fixed; z-index:1000; top:0; left:0; width:100%; height:100%; pointer-events:none;"></canvas>
<script>
var canvas = document.querySelector('.snow'),
    ctx = canvas.getContext('2d'),
    windowW = window.innerWidth,
    windowH = window.innerHeight,
    numFlakes = 80,
    flakes = [];

function Flake(x, y) {
  var maxWeight = 2,
      maxSpeed = 1;
  
  this.x = x;
  this.y = y;
  this.r = randomBetween(0, 1);
  this.a = randomBetween(0, Math.PI);
  this.aStep = 0.01;

  
  this.weight = randomBetween(2, maxWeight);
  this.alpha = (this.weight / maxWeight);
  this.speed = (this.weight / maxWeight) * maxSpeed;
  
  this.update = function() {
    this.x += Math.cos(this.a) * this.r;
    this.a += this.aStep;
    
    this.y += this.speed;
  }
  
}

function init() {
  var i = numFlakes,
      flake,
      x,
      y;
  
  while (i--) {
    x = randomBetween(0, windowW, true);
    y = randomBetween(0, windowH, true);
    
    
    flake = new Flake(x, y);
    flakes.push(flake);
  }
  
  scaleCanvas();
  loop();  
}

function scaleCanvas() {
  canvas.width = windowW;
  canvas.height = windowH;
}

function loop() {
  var i = flakes.length,
      z,
      dist,
      flakeA,
      flakeB;
  
  // clear canvas
  ctx.save();
  ctx.setTransform(1, 0, 0, 1, 0, 0);
  ctx.clearRect(0, 0, windowW, windowH);
  ctx.restore();
  
  // loop of hell
  while (i--) {
    
    flakeA = flakes[i];
    flakeA.update();
    

    /*for (z = 0; z < flakes.length; z++) {
      flakeB = flakes[z];
      if (flakeA !== flakeB && distanceBetween(flakeA, flakeB) < 150) {          
        ctx.beginPath();
        ctx.moveTo(flakeA.x, flakeA.y);
        ctx.lineTo(flakeB.x, flakeB.y);
        ctx.strokeStyle = '#444444';
        ctx.stroke();
        ctx.closePath();
      }
    }*/

    
    ctx.beginPath();
    ctx.arc(flakeA.x, flakeA.y, flakeA.weight, 0, 2 * Math.PI, false);
    ctx.fillStyle = 'rgba(255, 255, 255, ' + flakeA.alpha + ')';
    ctx.fill();
    
    if (flakeA.y >= windowH) {
      flakeA.y = -flakeA.weight;
    }  
  }
  
  requestAnimationFrame(loop);
}

function randomBetween(min, max, round) {
  var num = Math.random() * (max - min + 1) + min;

  if (round) {
    return Math.floor(num);
  } else {
    return num;
  }
}

function distanceBetween(vector1, vector2) {
  var dx = vector2.x - vector1.x,
      dy = vector2.y - vector1.y;

  return Math.sqrt(dx*dx + dy*dy);
}

init();
            </script>
<?php endif; ?>
<?php endif; ?>

<script async type="text/javascript" src="<?php the_field('klaviyo_link', 'options'); ?>"></script>

</body>
</html>
