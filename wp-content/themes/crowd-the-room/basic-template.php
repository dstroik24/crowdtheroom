<?php
/**
 * Template Name: basic-template
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Crowd_the_Room
 */

get_header();
?>
<head>
<link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <style>
    html, body {
        margin:0;
        padding:0;
    }
    h1 { 
        font-family: Lato; 
        font-size: 23px; 
        font-style: normal; 
        font-variant: normal; 
        font-weight: 700; 
        line-height: 23px; 
    } 
    h3 { 
        font-family: Lato; 
        font-size: 17px; 
        font-style: normal; 
        font-variant: normal; 
        font-weight: 700; 
        line-height: 23px; 
    }
    body { 
        background-color: #779FFF;
        color: white;
        font-family: Lato; 
        font-size: 14px; 
        font-style: normal; 
        font-variant: normal; 
        font-weight: 400; 
        line-height: 23px; 
    }  
    p { 
        font-family: Lato; 
        font-size: 14px; 
        font-style: normal; 
        font-variant: normal; 
        font-weight: 400; 
        line-height: 23px; 
    } 
    blockquote { 
        font-family: Lato; 
        font-size: 17px; 
        font-style: normal; 
        font-variant: normal; 
        font-weight: 400; 
        line-height: 23px; 
    } 
    
    pre { 
        font-family: Lato; 
        font-size: 11px; 
        font-style: normal; 
        font-variant: normal; 
        font-weight: 400; 
        line-height: 23px; 
    }
    .centerSubmit{
        text-align: center;
    }
    .intro{
        text-align: center;
        color: #ffffff;
        width: 70%;
        margin: 0 auto;
    }
    hr{
        border-color: #ffffff;
        background-color: #ffffff: 
    }
    .header{
        width: 100%;
        padding-top: 20px;
        padding-bottom: 10px;
        background: #ffffff;
        color: #779FFF;
        font-size: 30px;
        overflow: auto;
    }
    .header [id="left_head"]{
        text-align: left;
        padding-left: 15px;
        float: left;
        display: inline-block;
        position: relative;
    }
    .header [id="right_head"]{
        text-align: right;
        padding-right: 15px;
        display: inline-block;
        float: right;
        position: relative;
     }
     .header [id="left_head"]:hover{
        color:blue;
        cursor: pointer;
    }
    .clickable:hover{
        cursor: pointer;
        text-decoration: underline;
    }
    </style>
    <body>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
    </body>
<?php
get_sidebar();
get_footer();
