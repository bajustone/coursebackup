<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * This script lists all the instances of quiz in a particular course
 *
 * @package    coursebackup
 * @author     BAHATI Justin
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
header("Access-Control-Allow-Origin: *");
require_once(__DIR__ . "../../../config.php");

$courses = get_courses();
print_r(json_encode($courses));