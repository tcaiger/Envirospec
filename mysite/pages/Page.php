<?php

class Page extends SiteTree
{


}


class Page_Controller extends ContentController
{


    public function init()
    {
        parent::init();

        ////////////////////////////////////////////////////////////
        // CSS Includes
        ////////////////////////////////////////////////////////////
        Requirements::css("{$this->ThemeDir()}/css/main.min.css");
        Requirements::css("{$this->ThemeDir()}/font-awesome/css/font-awesome.min.css");
        Requirements::css("{$this->ThemeDir()}/css/animate.css");
        Requirements::css("{$this->ThemeDir()}/css/magnific-popup.css");
        Requirements::css("https://fonts.googleapis.com/css?family=Raleway:400,500,900");
        Requirements::css("{$this->ThemeDir()}/css/jquery.flipster.min.css");


        ////////////////////////////////////////////////////////////
        // JS Includes
        ////////////////////////////////////////////////////////////
        Requirements::combine_files(
            'main.js',
            array(

                "{$this->ThemeDir()}/js/third-party/jquery.min.js",
                "{$this->ThemeDir()}/js/third-party/jquery.flipster.min.js",
                "{$this->ThemeDir()}/js/YTBVideo.js",
                "{$this->ThemeDir()}/bootstrap/js/bootstrap.min.js",
                "{$this->ThemeDir()}/js/third-party/jquery.easing.min.js",
                "{$this->ThemeDir()}/js/third-party/wow.min.js",
                "{$this->ThemeDir()}/js/third-party/imagesloaded.min.js",
                "{$this->ThemeDir()}/js/third-party/jquery.magnific-popup.min.js",
                "http://maps.google.com/maps/api/js",
                "{$this->ThemeDir()}/js/custom.js",

            )
        );
    }


    // ========================================
    // Nav Search Form
    // ========================================
    public function NavSearch()
    {

        $form = BootstrapForm::create(
            $this,
            __Function__,
            Fieldlist::create(
                TextField::create('Keyword', '')
                    ->setSize("mini")
                    ->setAttribute('placeholder', 'Search products...')
            ),
            Fieldlist::create(
                FormAction::create('Go', 'Go')
                    ->setStyle('btn-lg btn-theme-bg')
            )
        );
        $form->setFormMethod('GET')
            ->setFormAction('product-search/search-results')
            ->disableSecurityToken()
            ->loadDataFrom($this->request->getVars());

        return $form;
    }


    public function GetProdCats()
    {
        return ProductCategory::get();
    }

    public function GetNews()
    {
        return SidebarPage::get()
            ->limit(4)
            ->filter(array(
                'ParentID' => 107
            ));
    }

}
