<?php
/**
 * AuthenticationException.php
 *
 * Throw this when authentication fails.  Sets the default message to 'Invalid credentials' so we don't leak any info.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package    LibreNMS
 * @link       http://librenms.org
 * @copyright  2017 Tony Murray
 * @author     Tony Murray <murraytony@gmail.com>
 */

namespace LibreNMS\Exceptions;

class AuthenticationException extends \Exception
{
    // Redefine the exception so message defaults to a generic 'Invalid credentials'
    public function __construct($message = 'Invalid credentials', $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
