<?php
# MantisBT - A PHP based bugtracking system

# MantisBT is free software: you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation, either version 2 of the License, or
# (at your option) any later version.
#
# MantisBT is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with MantisBT.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Timeline event class for status change of issues.
 * @copyright Copyright 2014 MantisBT Team - mantisbt-dev@lists.sourceforge.net
 * @link http://www.mantisbt.org
 * @package MantisBT
 */

/**
 * Timeline event class for status change of issues.
 *
 * @package MantisBT
 * @subpackage classes
 */
class IssueCustomTimelineEvent extends TimelineEvent {
    private $issue_id;
    private $field_name;
    private $new_status;

    /**
     * @param integer $p_timestamp  Timestamp representing the time the event occurred.
     * @param integer $p_user_id    An user identifier.
     * @param integer $p_issue_id   A issue identifier.
     * @param string $p_field_name  Custom field name.
     * @param integer $p_new_status New status value of issue.
     */

    public function __construct( $p_timestamp, $p_user_id, $p_issue_id, $p_field_name, $p_new_status ) {
        parent::__construct( $p_timestamp, $p_user_id );

        $this->issue_id = $p_issue_id;
        $this->field_name = $p_field_name;
        $this->new_status = $p_new_status;
    }

    /**
     * Returns html string to display
     * @return string
     */
    public function html() {
        $t_string = sprintf(
            lang_get( 'timeline_issue_edited' ),
            prepare_user_name( $this->user_id ),
            $this->field_name,
            string_get_bug_view_link( $this->issue_id )
        );

        $t_html = $this->html_start( 'fa-edit' );
        $t_html .= '<div class="action">' . $t_string . '</div>';
        $t_html .= $this->html_end();

        return $t_html;
    }
}
