# Dockerized MantisBT

This is a dockerized version of MantisBT with some extended features.

Timeline now shows more detailed history events such as changes on custom fields and status changes.

## Changed Files.
`/core/timeline_api.php`:

added new classes.

`/core/classes/IssueCustomTimelineEvent.php`:

new class for custom timeline events

`/core/classes/IssueStatusChangeTimelineEvent.php`:

modified to get status change events.

`/bug_view_inc.php`:

added epoch datetime attribute to updated issue

## Settings

signup_use_captcha -> integer -> 0

phpMailer_method -> integer > 2

smtp_connection_mode -> string > ssl

smtp_host -> string -> smtp.gmail.com:465

smtp_password -> string -> your password

smtp_port -> integer -> 465

smtp_username -> string -> your username

normal_date_format -> string -> Y-m-d H:i:s

## Custom Fields

Pivotal Project > List > All pivotal projects separated by |

Pivotal URL > String > EMPTY

Pivotal Description > Textarea > EMPTY

Pivotal Comment -> Textarea > EMPTY

Pivotal Labels -> String -> mantis

## Database

mantis_bug_history_table -> old_value and new_value should change to text