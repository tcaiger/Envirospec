<?php

class DeclarationsAdmin extends ModelAdmin {

    private static $menu_title = 'Declarations';

    private static $url_segment = 'declarations';

    private static $managed_models = array (
        'Declaration'
    );

    private static $menu_icon = 'mysite/icons/man-file.gif';

    public function getEditForm($id = null, $fields = null) {
        $form = parent::getEditForm($id, $fields);

        // $gridFieldName is generated from the ModelClass, eg if the Class 'Product'
        // is managed by this ModelAdmin, the GridField for it will also be named 'Product'

        $gridFieldName = $this->sanitiseClassName($this->modelClass);
        $gridField = $form->Fields()->fieldByName($gridFieldName);

        // modify the list view.
        $gridField->getConfig()->removeComponentsByType('GridFieldAddNewButton','GridFieldPrintButton');

        return $form;
    }
}