<?php
/**
 * Title: Header Retail
 * Slug: Online-Grocery-Theme/header-retail
 * Categories: Headers
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"blockGap":"0px"}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"var:preset|spacing|10","bottom":"var:preset|spacing|10"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--30)"><!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:site-logo {"width":85} /-->

<!-- wp:heading {"level":3,"style":{"color":{"text":"#198754"},"elements":{"link":{"color":{"text":"#198754"}}}},"fontFamily":"system-sans-serif"} -->
<h3 class="wp-block-heading has-text-color has-link-color has-system-sans-serif-font-family" style="color:#198754"><strong>Kaddora TecH</strong></h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Search Products","width":100,"widthUnit":"%","buttonText":"Search","buttonPosition":"button-inside","buttonUseIcon":true,"style":{"border":{"radius":"25px"},"layout":{"selfStretch":"fixed","flexSize":"40%"},"color":{"background":"#20965f"}},"fontSize":"medium"} /-->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:woocommerce/mini-cart {"miniCartIcon":"bag-alt","hasHiddenPrice":false,"productCountColor":{"color":"#20965f"},"productCountVisibility":"always","style":{"typography":{"fontWeight":"700","fontStyle":"normal"}}} /-->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"style":{"color":{"background":"#198754"}}} -->
<div class="wp-block-button">
<a class="wp-block-button__link  has-background wp-element-button" style="background-color:#198754" href="/login">Login</a>
</div>
<a href="<?php echo home_url('/login'); ?>" class="auth-link login-link">Login</a>

<div class="wp-block-button">
<a class="wp-block-button__link  has-background wp-element-button" style="background-color:#198754" href="/register">Register</a>
</div>

<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"0.4rem","top":"0.4rem"},"blockGap":"1rem"},"shadow":"var:preset|shadow|natural","color":{"background":"#bbf8e2"},"typography":{"fontSize":"1.3rem"}},"borderColor":"base","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group has-border-color has-base-border-color has-background" style="background-color:#bbf8e2;padding-top:0.4rem;padding-bottom:0.4rem;font-size:1.3rem;box-shadow:var(--wp--preset--shadow--natural)"><!-- wp:navigation {"style":{"spacing":{"blockGap":"2rem"}},"layout":{"type":"flex","justifyContent":"space-between"}} -->
<!-- wp:navigation-link {"label":"Home","url":"/"} /-->

<!-- wp:navigation-link {"label":"About","url":"/about"} /-->
 
<!-- wp:navigation-link {"label":"Contact","url":"/Contact"} /-->

<!-- wp:navigation-link {"label":"Products","url":"/shop"} /-->

<!-- wp:navigation-link {"label":"My Cart","url":"/cart"} /-->

<!-- wp:navigation-link {"label":"Checkout","url":"/checkout"} /-->

<!-- wp:navigation-link {"label":"My Account","url":"/my-account"} /-->

<!-- wp:navigation-link {"label":"Blogs","url":"/blog"} /-->

<!-- wp:navigation-link {"label":"Login","url":"/login"} /-->
 
<!-- /wp:navigation --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->