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

The primary use case for this module is:

- Use case #1
- Use case #2
- Use case #3

## REQUIREMENTS

DESCRIBE_MODULE_DEPENDENCIES_HERE

## INSTALLATION

Install as you would normally install a contributed Drupal module.
See: https://www.drupal.org/node/895232 for further information.

## CONFIGURATION
- Configuration step #1
- Configuration step #2
- Configuration step #3


