<?php
get_header();
wp_head(); 
?>

<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <h2>Loan Calculator</h2>
    </div>
  </div>
</section><!-- End Breadcrumbs -->

     <?php echo do_shortcode('[loan_calculator]'); ?>

</main><!-- End #main -->

<?php get_footer(); ?>