<?php

/*
 * This is a simple example of the main features.
 * For full list see documentation.
 */

// Create admin model from User class with title and url alias
Admin::model('\App\User')->title('Anciens Élèves')->as('users')->denyEditingAndDeleting(function ($instance)
{
	// deny editing and deleting rows when this is true
	return ($instance->isAdmin());
})->columns(function ()
{
    // Describing columns for table view
    Column::string('name', 'Nom');
    Column::string('prenom', 'Prénom');
    Column::string('email', 'Email');
})->form(function ()
{
    // Describing elements in create and editing forms
    FormItem::text('name', 'Name');
    FormItem::text('prenom', 'Prénom');
    FormItem::text('email', 'Email');
});
