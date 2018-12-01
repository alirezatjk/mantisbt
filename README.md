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