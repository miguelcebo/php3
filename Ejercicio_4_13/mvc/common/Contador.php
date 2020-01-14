<?php
/**
 * Copyright (C) Daw2 2018
 *   This program is free software: you can redistribute it and/or modify
 *
 *   it under the terms of the GNU General Public License as published by
 *
 *   the Free Software Foundation, either version 3 of the License, or
 *
 *   (at your option) any later version.
 *
 *   This program is distributed in the hope that it will be useful,
 *
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *
 *   GNU General Public License for more details.
 *
 *   You should have received a copy of the GNU General Public License
 *
 *   along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

/**
 * Created by PhpStorm.
 * User: Daw2
 * Date: 28/11/2018
 * Time: 10:51
 */
class Contador extends singleton
{
    private $_veces;

    public function getVeces()
    {
        return $this->_veces;
    }

    public function contar()
    {    // Creamos o actualizamos la variable 'contador' de la sesión
        if (isset($_SESSION['contador']))
            $_SESSION['contador']++; else
            $_SESSION['contador'] = 0;    // Asignamos a _veces el valor de la variable 'contador' de la sesión
        $this->_veces = Session::get('contador');
    }
}