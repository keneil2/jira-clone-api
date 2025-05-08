 --> create a function to get the users of a workspace and the users of a project and create an endpoint for these two functions

 --> why is it returning an empty object ?
 --> work on project template seeder please and also  

 todo : need to go through the code base and add some try catch please do this feature self one day that is
 fix folders as well they look dumb
 add a central response class and start working on From Request class as well as throttling for each request read laralvel docs;

// scope for this week is to work on permissions and Roles in workspace / give users the ability to create roles and give a role specific permissions.
  ---> this weeks tasks apirl 14 - 21 2025
  - create ui to add  permissions and custom roles
  - automatically add roles to a user who create the workspace they should be workspace admin
  - when a user is automatically added to a project give them the project admin role if they are an workspace admin else automatically give them dev role.
  - build ui for roles and adding user to a project and creating a team in the workspace(this is a good idea atleast thats what I think lol)
  - Build UI to assign users to roles
  - UI to add users to projects#done
  - UI to create teams and assign users

 // scope for next week is to allow users/ admin to create users/ add users


 -- look at project userController and ProjectControlle the getUser function might be duplicated

--> we need to add a function to the project / TaskAPi to create Task and getTaskTypes then ensure that we can actually create task sucessfully # 30th of April 2025


# look into task Status and ensure task is showing up in the right column based and status basically make it like kanban board in any card update
