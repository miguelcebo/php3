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
 * Date: 26/11/2018
 * Time: 13:32
 */
class Encuesta extends singleton
{
    private $_tiempoTranscurrido = "";

    public function getTiempoTranscurrido()
    {
        return $this->_tiempoTranscurrido;
    }

    public function calcTiempoTranscurrido()
    {
        if (isset($_COOKIE["primeraVisita"])) {
            $inicio = "@" . $_COOKIE["primeraVisita"];
            $fin = "@" . time();
            $tiempoTranscurrido = $this->_tiempo($inicio, $fin);
            $this->_tiempoTranscurrido = "<b>Visitaste esta página por primera vez hace $tiempoTranscurrido</b>";
        }
    }

    private function _tiempo($fechaInicio, $fechaFin)
    {
        $fecha1 = new DateTime($fechaInicio);
        $fecha2 = new DateTime($fechaFin);     //el método diff() devuelve la diferencia entre dos objetos DateTime
        $fecha = $fecha1->diff($fecha2);
        $tiempo = "";               //años
        if ($fecha->y > 0) {
            $tiempo .= $fecha->y;
            if ($fecha->y == 1) $tiempo .= " año "; else
                $tiempo .= " años ";
        }               //meses
        if ($fecha->m > 0) {
            $tiempo .= $fecha->m;
            if ($fecha->m == 1)
                $tiempo .= " mes ";
            else             $tiempo .= " meses ";
        }               //dias
        if ($fecha->d > 0) {
            $tiempo .= $fecha->d;
            if ($fecha->d == 1)
                $tiempo .= " día ";
            else
                $tiempo .= " días ";
        }               //horas
        if ($fecha->h > 0) {
            $tiempo .= $fecha->h;
            if ($fecha->h == 1)
                $tiempo .= " hora "; else
                $tiempo .= " horas ";
        }               //minutos
        if ($fecha->i > 0) {
            $tiempo .= $fecha->i;
            if ($fecha->i == 1) $tiempo .= " minuto "; else             $tiempo .= " minutos ";
        }
        if ($fecha->s > 0) {
            $tiempo .= $fecha->s;
            if ($fecha->s == 1) $tiempo .= " segundo"; else             $tiempo .= " segundos";
        }
        return $tiempo;
    }
}