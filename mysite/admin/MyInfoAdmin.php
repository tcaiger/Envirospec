<?php

class MyInfoAdmin extends ModelAdmin
{
    private static $menu_title = 'My Info';

    private static $url_segment = 'my-info';

    private static $managed_models = array(
        'Companies'
    );

    private static $menu_icon = 'mysite/icons/man-file.gif';

    public function getList()
    {
        $list = parent::getList();

        if ($this->modelClass == 'Companies') {
            $list = $list->filter(array(
                'ID' => Member::currentUser()->CompaniesID
            ));

            return $list;
        }
    }

    public function index($request)
    {

        $companyPage = 'admin/my-info/Companies/EditForm/field/Companies/item/' . Member::currentUser()->CompaniesID . '/edit';
        $this->redirect($companyPage);

    }


}