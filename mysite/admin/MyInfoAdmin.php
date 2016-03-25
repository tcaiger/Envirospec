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

    public function getEditForm($id = null, $fields = null)
    {
        $form = parent::getEditForm($id, $fields);

        $gridFieldName = $this->sanitiseClassName($this->modelClass);
        $gridField = $form->Fields()->fieldByName($gridFieldName)->getConfig();

        $gridField->removeComponentsByType('GridFieldPrintButton');
        $gridField->removeComponentsByType('GridFieldExportButton');

        if ($this->modelClass == 'Companies') {
            $gridField->removeComponentsByType('GridFieldSortableHeader');

        }

        return $form;
    }
}