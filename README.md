# MediaWiki Extension: K3Overlay v. 1.0.2

Creates a simple overlay for the wiki at each page view for defined user groups and time periods.

__Tested with MediaWiki 1.31, 1.32, 1.34__

## Installation

Download all necessary files, unzip there and place it in the `K3Overlay` folder in the `extensions/` directory of your MediaWiki installation.

In the next step, add the following to your `LocalSettings.php`:

```
wfLoadExtension( 'K3Overlay' );
```

Now you can check via `Special:Version` whether the extension was installed successfully.

## Usage

To display an overlay, fill the template (`MediaWiki:k3overlay-text`) with Wikitext.

If the settings have not been changed, the overlay will not be visible to administrators (`sysop`).

If the overlay should no longer be displayed, simply empty the template.

## Settings

The following setting options are available:

```
// time in seconds until the overlay is displayed again
$wgK3O_cookie_expires = 10800;

// if "true" the overlay is only shown to logged in users
$wgK3O_only_logged_in = false;

// array with user groups to which the overlay should not be displayed
$wgK3O_groups_rest = [ "sysop", "bot" ];
```

## Supported languages

- English
- German (Deutsch)

## License

[MIT](https://choosealicense.com/licenses/mit/)
