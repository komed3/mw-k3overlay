# MediaWiki Extension: K3Overlay

Creates a simple overlay for the wiki at each page view for defined user groups and time periods.

__Tested with MediaWiki 1.31, 1.32, 1.34__

## Installation

Download all necessary files, unzip there and place it in the `K3Overlay` folder in the `extensions/` directory of your MediaWiki installation.

In the next step, add the following to your `LocalSettings.php`:

```
wfLoadExtension( 'K3Overlay' );
```

Now you can check via `Special:Version` whether the extension was installed successfully.

## Supported languages

- English
- German (Deutsch)

## License

[MIT](https://choosealicense.com/licenses/mit/)