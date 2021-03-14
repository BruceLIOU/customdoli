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
 * \file    class/actions_customdoli.class.php
 * \ingroup customdoli
 * \brief   This file is an example hook overload class file
 *          Put some comments here
 */

/**
 * Class Actionscustomdoli
 */
class Actionscustomdoli
{
	/**
	 * @var array Hook results. Propagated to $hookmanager->resArray for later reuse
	 */
	public $results = array();

	/**
	 * @var string String displayed by executeHook() immediately after return
	 */
	public $resprints;

	/**
	 * @var array Errors
	 */
	public $errors = array();

	/**
	 * Constructor
	 */
	public function __construct()
	{
	}

	/**
	 * Overloading the doActions function : replacing the parent's function with the one below
	 *
	 * @param   array()         $parameters     Hook metadatas (context, etc...)
	 * @param   CommonObject    &$object        The object to process (an invoice if you are in invoice module, a propale in propale's module, etc...)
	 * @param   string          &$action        Current action (if set). Generally create or edit or null
	 * @param   HookManager     $hookmanager    Hook manager propagated to allow calling another hook
	 * @return  int                             < 0 on error, 0 on success, 1 to replace standard code
	 */
	function printCommonFooter($parameters, &$object, &$action, $hookmanager)
	{
		$error = 0; // Error counter
		/*$myvalue = 'test'; // A result value

		print_r($parameters);
		echo "action: " . $action;
		print_r($object);
		*/
		if($parameters['currentcontext'] == "orderlist")
		print '<script type="text/javascript">
			$(document).ready(function(){
				$("#matable").find(".rouge").closest("tr").addClass("noprepa");
				$("#matable").find(".vert").closest("tr").addClass("prepa");
				$("#hide").click(function(){
			    $(".vert").closest("tr").hide();
			    });
			    $("#show").click(function(){
			        $("tr.prepa").show();
			    });
				var nb_pair;
				var nb_impair;
				var total_nb;
				var cde;
				nb_pair=$(".pair").length;
				nb_impair=$(".impair").length;
				total_nb=nb_pair+nb_impair;
				if (total_nb > 1)
				{
					cde = "commandes clients";
				}
				else
				{
					cde = "commande client";
				}
				$( "#total" ).text( " " + total_nb + " " + cde);
				$( ".titre" ).text( " " + total_nb + " " + cde);
			});
			</script>';
		//}
		
		//print $printFieldPreListTitle;

	    //$this->resprints = $printFieldPreListTitle;
		
	}
}