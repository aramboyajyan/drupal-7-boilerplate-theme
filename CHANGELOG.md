# Project changelog

### October 22, 2012

Initial release.

### October 27, 2012

New features and cleanup:

- Glyphicons styles
- Maintenance page cleanup and preprocess hook
- Moved the system templates to the <code>templates/system</code> folder
- Added body classes based on user roles
- Added main preprocess hook (<code>template_preprocess()</code>)

### November 3, 2012

- Added [Selectivizr](http://selectivizr.com)
- Created new folder for JS overrides (<code>javascript/overrides</code>)
- Couple of other minor wording updates

### November 7, 2012

Support for CCK fields for toggling the page elements (title, tabs, breadcrumbs etc.)

### November 8, 2012

Created folder for `process` functions and included short readme files in folders

### November 9, 2012

- Moving the contents of current `functions` folder to `hooks`; this should contain all other hook implementations.
- `functions` should now contain only custom, theme-specific functions
- Added `url-[path]-current` to the list of automatically generated body classes

### November 14, 2012

Automatically loading term if we are on term page (breadcrumb theme implementation).

### November 21, 2012

Adding support for excluding certain tabs (local tasks). Useful in case you have many modules installed and the large number of tabs is breaking the theme layout.

### November 25, 2012

Renaming `hoverIntent` script to include the version number and `.min` notation.

### November 30, 2012

Adding `templates/block` subfolder and including a content-wrapper div around the block content and title.  
Adding `template_preprocess_region` function implementation.  
Removing `global $user` from all preprocess functions as it is already included in `$vars['user']`.

### December 17, 2012

Adding support for custom tracking scripts to theme options page.

### December 21, 2012

- Adding populated region classes to body classes
- Adding check for form only pages (login, register, forgot password, contact etc.)
- Using placeholders instead of titles on form only pages

### January 11, 2013

Adding [jQuery placeholder](https://github.com/mathiasbynens/jquery-placeholder/tree/1.8.7) plugin to support `placeholder` attribute in older browsers.

<hr>

By: [topsitemakers.com](http://www.topsitemakers.com).
