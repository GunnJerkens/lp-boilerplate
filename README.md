Landing Page Boilerplate
===
A starting point for small landing pages and websites that do not require a database.  

## usage

1. `npm install` to install the webpack dependencies
2. `npm run watch` to start webpack watch

## ajax

To use the ajax script just call the function on your element and pass it options.

### Instantiate
```
import gjAjax from './libs/ajax';

const register = document.querySelector('form#register');

if (register) {
  const ajax = new gjAjax(register, {
    path:       "/submit.php",
    success:    "Success message",
    conversion: true
  });
  ajax.run();
}
```

| Option        | Value         | Notes                                              |
| ------------- |:--------------|:---------------------------------------------------|
| Path          | String        | Relative path                                      |
| Success       | String        | Success message after form submits successfully    |
| Conversion    | Bool          | See markup section for category/action/label in GA |

### Markup

Markup needs to be formatted in Bootstrap 4 style. The class `.has-error` is appended to the closest parent `.form-group` and the field name in the error message is primarily pulled from the preceding label, the closest label (in case of checkbox), or finally the fields `name` attribute.

```
<div class="form-group">
  <label for="field" class="sr-only">Field</label>
  <input type="text" name="field" id="field" class="form-control" placeholder="Field" required>
</div>
```

If you want to set up a trigger in Google Tag Manager to detect a form submission, a custom GTM event called "formSubmitted" is fired on every ajax success.

### Response

The form looks for an object on success or failure formatted as an object. If a status is not a string of success it is assumed error, and the message is displayed allowing the user to correct and resubmit the form.

```
{
  status: "success",
  message: "This was a successful submission."
}
```

** See `public/submit.php` for example submission boilerplate code **

## features

- BrowserSync (Live Reload) of SASS changes
- Multi environment config file
- Uses grunt tasks to manage the build process
- Integrated Bootstrap with individual SASS and JS files for easy customization

## license

MIT
