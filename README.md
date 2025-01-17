## INTRODUCTION

The Plentific Demo module relies on drupal configuration and content entities
for listing 'persons' imported from the Regres API. CRUD can be performed on the
imported 'persons' within the Drupal UI via the Persons content entity listing page
or via the 'Plentific Demo' block view.

The import functionality utilises a custom Importer plugin and a JSON plugin implementation
to leverage the plugin system for maximum extensibility and

Performance is optimised by using the custom entity API in preference to the Node API.
For example, only one table is created for the 'Person' content entity (named 'person')
whereas a custom node type creates a separate table for each field. Also, the extra baggage
of revisions has been removed.

## REQUIREMENTS
- The module has been tested on the latest Drupal 10 version: Drupal 10.4.1
- Setup a Drupal 10 site (latest version) using eg the Drupal 10 DDEV quickstart
- Install drupal/drush using composer
- Create a folder named 'custom' inside '/web/modules/'
- Copy the modules into the 'custom' folder
- Or edit the root composer.json to install the module using the module composer.json
- The module depends on the core block module

## INSTALLATION
- Install as you would normally install a contributed Drupal module.
- See: https://www.drupal.org/node/895232 for further information.
- Or run `ddev drush pm-enable plentific_demo`
- Login to the site as User 1
- The module installation imports a custom block 'Plentific Demo'
- It is visible on every page in the 'Content' region
- It also imports a custom view named 'Plentific Demo'

## CONFIGURATION
- Go to `/admin/structure`
- Click on the 'Person list' link and click the button 'Add person'
- Click the link 'Add a new person type' to create a 'person' content entity bundle
- Fill in the label e.g. 'Basic' and save
- Go to 'admin/structure/importer'
- Click 'Add Importer'
- Put something for name e.g. 'Regres'
- For Url put: 'https://reqres.in/api/users?page=1&per_page=12&total=12'
- Select the 'Json Importer' plugin
- For 'person type' select e.g. 'Basic' (autocomplete will find the Person bundle you created)
- Save

## Further Enhancements
- Create a custom admin permission for the custom entities for more granularity
- At the moment viewing the 'person' entities CRUD operations requires 'access site configuration'
- A custom block was created named 'Plentific API'. It is currently redundant.
- But it could be enhanced and used in preference to the imported custom block inside config/install


