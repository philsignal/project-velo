# Project Velo Documentation

This repository as been set up as a testing environment for freelance developers.

The following documentation goes through the steps to set up the environment & outlines the test(s) that are required for perspective freelancers to undertake.

Each of the tasks should not take longer than 60 minutes to complete & no additional plugins should be used to complete the task(s) listed below.

## Set up

This repository is designed to used with Docker, so please ensure that Docker and / or Docker Desktop is installed.

Clone the repository to get a local version and create a new branch to work from. Use the naming convention of `firstname-lastname` for the branch name.

After the containers and volumes have been created, navigate to the local environment and complete the wordpress installation.

Once the installation is complete and the user has been created, change the theme to the 'Project-Velo' theme and active the necessary plugins.

## Uploading your work

Once you have completed the task(s) below, please commit your work to your branch and push to the remote repository.

Once you have pushed your work, please create a pull request to the master branch and assign the pull request.

If you have made changes to the database, please export the database and zip any related files nd add them to the repo.

## Task: Carousel Build

### Requirements

- Use Advance Custom Fields (ACF) to create the fields needed for the carousel and it's items.

- Create a custom template file to host the carousel, rather than adding it to a pre-existing single.php, archive.php or page.php template.

- Use the carousel found under 'News & Insights' on this domain as the inspiration for the carousel build https://www.nuvonicuv.com/

- The carousel items should include the follow elements:

  - A feature image
  - A link to a url of your choice (the destination of the url is not important)
  - A section for copy that can include markup, similar to that found in the example above.

- The carousel should have the follow functionality:

  - The carousel should transition one item at a time when triggered
  - The carousel should return to the beginning or end when reaching the extremes of its item count.
  - The carousel should have touch / swipe functionality on mobile / touch devices.
