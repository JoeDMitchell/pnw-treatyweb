<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Orbis Treaty Web</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/normalize.min.css">
        <link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/vis.css">
        <link rel="stylesheet" href="<?php bloginfo('template_url');?>/style.css">

        <script src="<?php bloginfo('template_url');?>/js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="<?php bloginfo('template_url');?>/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="<?php bloginfo('template_url');?>/js/vendor/vis.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div id="web"></div>

        <script type="text/javascript">
            // create an array with nodes
            var DIR = '<?php bloginfo('template_url');?>/img/';
            var MDAP = '#bf27e0';
            var MDOAP = '#c10007';
            var MDP = '#ced518';
            var ODOAP = '#0d2572';
            var ODP = '#00aeef';
            var Pro = '#65c765';

            <?php
                $args = array(
                  'post_type' => 'alliance',
                  'posts_per_page' => 200,
                );
                $alliances = new WP_Query( $args );
                if( $alliances->have_posts() ) {  ?> 

                    var nodes = new vis.DataSet([ 

                    <?php while( $alliances->have_posts() ) {
                    $alliances->the_post();
                    ?>
                      
                        {id: <?php the_ID(); ?>, title: '<?php the_title(); ?>', image: '<?php the_field('flag'); ?>', value:<?php the_field('score'); ?>,  shape: 'image'},

                    <?php  }
                  ?> ]); <?php
                }
                else {
                  echo 'Oh ohm no alliances!';
                }
                wp_reset_postdata();
              ?>


            // create an array with edges


             <?php
                $args = array(
                  'post_type' => 'treaty',
                  'posts_per_page' => 500,
                );
                $treaties = new WP_Query( $args );
                if( $treaties->have_posts() ) {  ?> 

                    var edges = new vis.DataSet([

                    <?php while( $treaties->have_posts() ) {
                    $treaties->the_post();
                    ?>
                      
                        {from: <?php the_field('from'); ?>, to: <?php the_field('to'); ?>, width:2, color:<?php the_field('type'); ?>, title:'<?php the_field('type'); ?>', length:100<?php if (get_field('type') == 'Pro'){?>, arrows:'to'<?php } ?>},

                    <?php  }
                  ?> ]); <?php
                }
                else {
                  echo 'Oh ohm no treaties!';
                }
                wp_reset_postdata();
              ?>




            // create a network
            var container = document.getElementById('web');

            // provide the data in the vis format
            var data = {
                nodes: nodes,
                edges: edges
            };
            var options = {
                autoResize: true,
                height: '100%',
                width: '100%',
                interaction:{hover:true},
                physics:{solver: 'forceAtlas2Based'},
            };

            // initialize your network!
            var network = new vis.Network(container, data, options);
            network.on("hoverNode", function (params) {
                console.log('hoverNode Event:', params);
            });
        </script>


        <script src="<?php bloginfo('template_url');?>/js/main.js"></script>
    </body>
</html>
