<?php
/* <one line to give the program's name and a brief idea of what it does.>
 * Copyright (C) 2015 BRUMAN <contact@bruman.fr>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * 	\file		admin/about.php
 * 	\ingroup	customdoli
 * 	\brief		This file is an example about page
 * 				Put some comments here
 */
// Dolibarr environment
$res = @include("../../main.inc.php"); // From htdocs directory
if (! $res) {
    $res = @include("../../../main.inc.php"); // From "custom" directory
}

// Libraries
require_once DOL_DOCUMENT_ROOT . "/core/lib/admin.lib.php";
require_once '../lib/customdoli.lib.php';

// Translations
$langs->load("customdoli@customdoli");

// Access control
if (! $user->admin) {
    accessforbidden();
}

/*
 * View
 */
$page_name = "customdoliAbout";
llxHeader('', $langs->trans($page_name));

// Subheader
$linkback = '<a href="' . DOL_URL_ROOT . '/admin/modules.php">'
    . $langs->trans("BackToModuleList") . '</a>';
print_fiche_titre($langs->trans($page_name), $linkback);

// Configuration header
$head = customdoliAdminPrepareHead();
dol_fiche_head(
    $head,
    'about',
    $langs->trans("Module100000Name"),
    0,
    'customdoli@customdoli'
);

// About page goes here
print '<div style="float: left;"><img src="../img/Dolibarr_Preferred_Partner_logo.png" /></div>';
print '<div>'.$langs->trans('BRUMANAbout').'</div>';

dol_fiche_end();

print '<br><center>';
print '<a href="http://www.bruman.fr" target="_blank"><img src="../img/BRUMAN_logo.jpg" /></a>';
print '</center>';

llxFooter();

$db->close();