<?php get_header() ?>
    <div class="container mb-3">
        <section id="not-found"  style="position: relative; background: #F8F8F8; height: 100vh;" class="d-flex align-items-center" >
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="not-found-content text-center">
                            <h2>Opps! Page not found.</h2>
                            <img src="<?php echo get_template_directory_uri() . "/assets/images/404.jpg"; ?>" alt="404 not found">
                            <h4 class="pt-3">We can't find the page you're looing for.</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php get_footer() ?>