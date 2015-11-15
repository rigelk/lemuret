<?php

return [
	'404'      => 'Page introuvable ! Vous me perturbez…',
	'auth'     => [
		'title'          => 'Authorisation',
		'username'       => 'Nom d’utilisateur',
		'password'       => 'Mot de passe',
		'login'          => 'Se connecter',
		'logout'         => 'Déconnexion',
		'wrong-username' => 'Mauvais nom d’utilisateur',
		'wrong-password' => 'ou mot de passe'
	],
	'ckeditor' => [
		'upload'        => [
			'success' => 'File was uploaded: \\n- Size: :size kb \\n- width/height: :width x :height',
			'error'   => [
				'common'              => 'Unable to upload the file.',
				'wrong_extension'     => 'File ":file" has wrong extension.',
				'filesize_limit'      => 'Maximum allowed file size is :size kb.',
				'imagesize_max_limit' => 'Width x Height = :width x :height \\n The maximum Width x Height must be: :maxwidth x :maxheight',
				'imagesize_min_limit' => 'Width x Height = :width x :height \\n The minimum Width x Height must be: :minwidth x :minheight',
			]
		],
		'image_browser' => [
			'title'    => 'Insert image from server',
			'subtitle' => 'Choose image to insert',
		],
	],
	'table'    => [
		'new-entry'      => 'Nouvelle entrée',
		'edit'           => 'Éditer',
		'delete'         => 'Supprimer',
		'delete-confirm' => 'Are you sure want to delete this entry?',
		'delete-error'   => 'Error while deleting this entry. You must delete all linked entries first.',
		'moveUp'         => 'Move Up',
		'moveDown'       => 'Move Down',
		'filter'         => 'Montrer des entrées similaires',
		'filter-goto'    => 'Montrer',
		'save'           => 'Enregistrer',
		'cancel'         => 'Annuler',
		'download'       => 'Télécharger',
		'all'            => 'Tout',
		'processing'     => '<i class="fa fa-5x fa-circle-o-notch fa-spin"></i>',
		'loadingRecords' => 'Chargement en cours...',
		'lengthMenu'     => 'Show _MENU_ entries',
		'zeroRecords'    => 'No matching records found.',
		'info'           => 'Showing _START_ to _END_ of _TOTAL_ entries',
		'infoEmpty'      => 'Showing 0 to 0 of 0 entries',
		'infoFiltered'   => '(filtered from _MAX_ total entries)',
		'infoThousands'  => ',',
		'infoPostFix'    => '',
		'search'         => 'Rechercher : ',
		'emptyTable'     => 'No data available in table',
		'paginate'       => [
			'first'    => 'Premier',
			'previous' => '&larr;',
			'next'     => '&rarr;',
			'last'     => 'Dernier'
		]
	],
	'select'   => [
		'nothing'  => 'Rien de sélectionné',
		'selected' => 'sélectionné'
	]
];
