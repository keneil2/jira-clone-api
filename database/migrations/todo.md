Database Requirements
1. Standups
standups:

id: Primary key.
workspace_id: Foreign key to workspaces.
project_id: Foreign key to projects (optional).
title: Standup name (e.g., "Daily Scrum").
schedule: Cron-style schedule for recurring standups.
start_time, end_time: Timestamps for the standup.
recording_url: URL for audio or video recordings (if applicable).
created_by: Foreign key to users (standup organizer).
created_at, updated_at.
standup_participants:

id: Primary key.
standup_id: Foreign key to standups.
user_id: Foreign key to users.
2. Meeting Transcripts
meeting_transcripts:
id: Primary key.
standup_id: Foreign key to standups.
transcript: Text or JSON storing the transcription of the meeting.
ai_analysis: JSON storing AI-detected tasks, blockers, etc.
created_at, updated_at.
3. AI-Generated Tasks
ai_generated_tasks:
id: Primary key.
standup_id: Foreign key to standups.
task_id: Foreign key to tasks (for linking AI-generated tasks).
description: AI-generated task description.
assigned_to: Foreign key to users (if AI assigns it).
priority: Task priority (e.g., High, Medium, Low).
status: Status of the task (e.g., Pending, In Progress).
created_at, updated_at.
