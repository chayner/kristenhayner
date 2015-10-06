<?php
/*
Plugin Name: mod_rewrite fix for boilerplate
Plugin URI: https://github.com/Royalfish/wordpress-boilerplate
Description: The wordpress boilerplate puts wordpress in a separate directory. In order to make this work, it needs an updated .htaccess file. Wordpress automatically recreates the htaccess whenever it thinks it is out of date. This plugin fixes the default Wordpress rewrite to work in the boilerplate environment.
Version: 1.0
Author: Jasper van Wanrooy (Royalfish)
Author URI: http://www.royalfish.nl
*/
add_filter('mod_rewrite_rules', 'mod_rewrite_fix_wordpress_dir');
function mod_rewrite_fix_wordpress_dir($rules) {
    // create the right match for the homepage
    $rules = preg_replace('/^(RewriteRule\s)(\^index.*-)(.*)$/m', '$1^$ /index.php$3', $rules);
    // make all rewriterules go to the right index in the wordpress directory
    $rules = preg_replace('/^(RewriteRule .+)(index\.php.*)$/m', '$1wordpress/$2', $rules);
    return $rules;
}
