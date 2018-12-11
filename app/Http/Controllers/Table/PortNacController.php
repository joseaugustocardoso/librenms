<?php
/**
 * PortNacController.php
 *
 * -Description-
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
 * @copyright  2018 Tony Murray
 * @author     Tony Murray <murraytony@gmail.com>
 */

namespace App\Http\Controllers\Table;

use App\Models\PortsNac;

class PortNacController extends TableController
{
    public function rules()
    {
        return [
            'device_id' => 'required|int',
        ];
    }

    public function searchFields($request)
    {
        return ['PortAuthSessionUserName', 'PortAuthSessionIPAddress', 'PortAuthSessionMacAddress'];
    }

    /**
     * Defines the base query for this resource
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder
     */
    public function baseQuery($request)
    {
        return PortsNac::where('device_id', $request->device_id)->hasAccess($request->user())->with('port');
    }

    public function formatItem($nac)
    {
        $item = $nac->toArray();
        $item['port_id'] = \LibreNMS\Util\Url::portLink($nac->port, $nac->port->getShortLabel());

        return $item;
    }
}
