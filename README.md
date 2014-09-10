# API Template

### Starting the Project
1. Create a new repository for this project
1. Create a cookbooks repository for this project (see the [cookbook-template README](https://github.com/synapsestudios/cookbook-template) for more details).
1. Clone this repository `git clone git@github.com:synapsestudios/api-template.git <project-name>`.
1. Run the initialization script `chmod +x initialize.sh; ./initialize.sh;` from the project directory. It will ask for:
    - Repository SSH clone URL
    - Cookbooks repository SSH clone URL
    - QA APP_ENV environment variable
    - QA Host host domain
    - Development static IP block (last number of IP Address)
1. Update README:
    - Get a new Build Status widget from Shippable
    - Remove this section
1. Commit all files and push to master

### Initializing the Development Environment
1. Run `composer install` once to install dependencies.
1. Run `git submodule update --init --recursive`
1. Run `vagrant up` to provision the VM (see the [Vagrant Docs](http://docs.vagrantup.com/v2/) for more details).

### Viewing the Project
1. Get the project static IP address from the Vagrantfile.
1. Create aliases for 'project.vm' and 'lively.project.vm' at that static IP in your computer's hosts file.
1. Access the application at http://project.vm.
1. Access Lively API Documentation at http://lively.project.vm.
1. (Adjust `project.vm` to a domain name fitting to your application.)

### Other Stuff
1. As you build out the API, document it in `config.application.json`. See the [Lively README](https://github.com/synapsestudios/lively) for more details.
1. Personalize the templates in `templates/Email/` according to the needs of your project.
1. Set up Shippable alerts to Slack:
    - Change `shippable.yml` to include your slack org name, slack channel to report to.
    - [Generate a secure value for the slack token](http://blog.shippable.com/devops-chat-a-simple-way-to-use-slack-notifications-with-shippable).
    - Uncomment the `env` and `after_failure` sections in `shippable.yml`.

### Running Tests
1. To run PHPCS, run `vendor/bin/phpcs --standard=PSR2 src/*` in the root directory.
1. To run unit tests, run `vendor/bin/phpunit` in the root directory.
1. To initalize the repo in test mode
    - Run `./initialize.sh -t`. This will create a repo with no remote.
    - Run `git submodule add git@github.com:synapsestudios/cookbook-template.git cookbooks`.
    - Navigate into the cookbooks directory.
    - Initalize the cookbooks in test mode with `chmod +x initialize.sh; ./initialize.sh -t`.
