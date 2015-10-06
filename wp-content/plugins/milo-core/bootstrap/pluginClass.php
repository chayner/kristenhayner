<?php

class ffPluginMiloCore extends ffPluginAbstract {
	/**
	 *
	 * @var ffPluginMiloCoreContainer
	 */
	protected $_container = null;

	protected function _registerAssets() {

	}

	protected function _run() {
        $shortcodeManager = $this->_getContainer()->getFrameworkContainer()->getShortcodesNamespaceFactory()->getShortcodeManager();
        $shortcodeManager->addShortcodeClassName('ffShortcodeDropcap');
        $shortcodeManager->addShortcodeClassName('ffShortcodeHeaderUnderlined');
        $shortcodeManager->addShortcodeClassName('ffShortcodeMark');

        require dirname( dirname( __FILE__ ) ).'/components/vc_shortcodes/vc_milo_shortcodes.php';

        add_action('after_setup_theme', array( $this, 'registerCustomPostTypes' ) );
	}

    public function registerCustomPostTypes() {
            $portfolioSlug = 'ff-portfolio';
            $portfolioTagSlug = 'ff-portfolio-tag';
            $portfolioCategorySlug = 'ff-portfolio-category';

            if( class_exists('ffThemeOptions') ) {

                $portfolioSlug = ffThemeOptions::getQuery('portfolio portfolio_slug' );
                $portfolioTagSlug = ffThemeOptions::getQuery('portfolio portfolio_tag_slug' );
                $portfolioCategorySlug = ffThemeOptions::getQuery('portfolio portfolio_category_slug' );

            }

            $fwc = $this->_getContainer()->getFrameworkContainer();

             // Portfolio - Custom Post Type
            $ptPortfolio = $fwc->getPostTypeRegistratorManager()
            ->addPostTypeRegistrator('portfolio', 'Portfolio');

            $ptPortfolio->getSupports()
            ->set('editor', false)
            ->set('excerpt', false);

            // var_dump(ffThemeOptions::getQuery('portfolio portfolio_slug' ));exit;
            $ptPortfolio->getArgs()->set('rewrite', array( 'slug' => $portfolioSlug ));

            // Portfolio Tag - Custom Taxonomy
            $taxPortfolioTag = $fwc->getCustomTaxonomyManager()
            ->addCustomTaxonomy('ff-portfolio-tag', 'Portfolio Tag');
            $taxPortfolioTag->connectToPostType( 'portfolio' );

            $taxPortfolioTag->getArgs()->set('rewrite', array( 'slug' => $portfolioTagSlug ));

            // Portfolio Category - Custom Taxonomy
            $taxPortfolioCategory = $fwc->getCustomTaxonomyManager()
            ->addCustomTaxonomy('ff-portfolio-category', 'Portfolio Category');
            $taxPortfolioCategory->setCategoryBehaviour();
            $taxPortfolioCategory->connectToPostType('portfolio');

            $taxPortfolioCategory->getArgs()->set('rewrite', array( 'slug' => $portfolioCategorySlug));


    }

	protected function _registerActions() {

	}

	protected function _setDependencies() {

	}


	/**
	 * @return ffPluginMiloCoreContainer
	 */
	protected function _getContainer() {
		return $this->_container;
	}
}