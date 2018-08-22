# Google Tag Manager

Enable the Google Tag Manager configuration in the WordPress back end.

If a valid Container ID is provided, the tracking code will automatically be added to all pages. If the ID is invalid, a notice is triggered in the WordPress back end.

The following options are provided under the **"Global Options"** menu:

- Container ID: This must be either a valid Container ID, or the string "debug" (to enable debug mode which will log to the console only and overwrite all other settings)
- Skip specific user roles
- Skip specific IP addresses. These must be comma separated.
