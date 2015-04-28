Landing Page Boilerplate
===
A starting point for small landing pages and websites that do not require a database.  

## usage

1. `npm install` to install the grunt dependencies
2. Modify the config.php file to match environment needs
3. grunt -v to start grunt tasks

## ajax

To use the ajax script just call the function on your element and pass it options.

```
$('#register').gjAjax({
  path: "/path/to/ajax-php/script",
  success: "Success message"
});
```

| Option        | Value         | Notes                                          |
| ------------- |:--------------|:-----------------------------------------------|
| Path          | String        | Relative path                                  |
| Success       | String        | Success message after form submits succesfully |

## features

- BrowserSync (Live Reload) of SASS changes
- Multi environment config file
- Uses grunt tasks to manage the build process
- Integrated Bootstrap with individual SASS and JS files for easy customization

## license

MIT