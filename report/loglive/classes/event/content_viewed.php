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
 * Event for when some content in loglive report is viewed.
 *
 * @package    report_loglive
 * @copyright  2013 Ankit Agarwal
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
namespace report_loglive\event;

/**
 * Event triggered, when some content in loglive report is viewed.
 *
 * @property-read array $other {
 *      Extra information about event.
 *
 *      @type string content viewed content identifier.
 *      @type string url (optional) url of report page.
 * }
 *
 * @package    report_loglive
 * @copyright  2013 Ankit Agarwal
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class content_viewed extends \core\event\content_viewed {

    /**
     * Returns relevant URL.
     *
     * @return \moodle_url
     */
    public function get_url() {
        if (!empty($this->other['url'])) {
            return new \moodle_url($this->other['url']);
        }
        return new \moodle_url('report/loglive/index.php', array('id' => $this->courseid));
    }
}
