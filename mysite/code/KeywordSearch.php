<?php

class KeywordSearch extends Page{


}

class KeywordSearch_Controller extends Page_Controller{


	// ========================================
	// Manufacturer Dropdown Form
	// ========================================
	public function ManufacturerSearchForm(){

		$form = BootstrapForm::create(
			$this,
			__Function__,
			Fieldlist::create(
				DropDownField::create(
					'Manufacturer', 
					'Use the drop‐down box to select the manufacturer or supplier of your choice.', 
					Companies::get()->sort('Name', 'ASC')->map('ID', 'Name'))
						->setEmptyString('Select-One')
					->setAttribute('placeholder','Search Here...')
			),
			Fieldlist::create(
				FormAction::create('Go','Go')
					->addExtraClass('btn-lg btn-theme-bg')
			)
		);
		$form->setFormMethod('GET')
        	->setFormAction('product-search/search-results')
        	->disableSecurityToken()
        	->loadDataFrom($this->request->getVars());

		return $form;
	}


	// ========================================
	// Product Search Form
	// ========================================
	public function KeywordSearchForm(){

		$form = BootstrapForm::create(
			$this,
			__Function__,
			Fieldlist::create(
				TextField::create('Keyword', 'Type in a keyword to quickly access the type of product you are looking for.')
					->setAttribute('placeholder','Search Here...')
			),
			Fieldlist::create(
				FormAction::create('Go','Go')
					->addExtraClass('btn-lg btn-theme-bg')
			)
		);
		$form->setFormMethod('GET')
        	->setFormAction('product-search/search-results')
        	->disableSecurityToken()
        	->loadDataFrom($this->request->getVars());

		return $form;
	}

}