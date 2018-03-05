/* GJ Ajax v1.0.0
 * Copyright 2015 Gunn/Jerkens
 * Updated 05/01/15
 * Authors: Patrick Shampine https://github.com/shampine
 * See the lp-boilerplate README for how to use in a project.
 */

function gjAjax(el, options) {
  this.el      = $(el);
  this.options = options;
  this.output  = { status: 'success', message: "All fields complete.", element: null };
}

gjAjax.prototype.run = function() {
  this.listen();
};

gjAjax.prototype.listen = function() {
  var self = this;

  this.el.on('submit', function(e) {
    e.preventDefault();

    var url   = window.location.protocol + '//' + window.location.host + self.options.path,
        data  = $(this).serialize();

    self.checkFields();

    if(self.output.status !== 'error') {
      $('button[type="submit"]').toggle();
      self.el.find('#error').empty();
      self.el.find('#error').append('<p class="message"><i class="fa fa-spin fa-spinner"></i> Sending...</p>');


      $.post(url, { post : data },
      function(response) {
        self.successMessage(response);
        if(self.options.conversion === true && typeof dataLayer !== 'undefined') {
          dataLayer.push({'event': 'formSubmitted'});
        }
      });
    } else {
      self.errorOutput();
    }
  });
};

gjAjax.prototype.checkFields = function() {
  var self = this;

  this.clearErrors();

  this.el.find(':input').each(function() {

    var el, attr, type, value, field_name;

    el    = $(this);
    attr  = el.attr('required');
    type  = el.attr('type');
    value = el.val();

    if(typeof attr !== typeof undefined && attr !== false) {

      field_name = el.prev('label').text() || el.closest('label').text().trim() || el.attr('name');
      field_name = field_name.replace('*', '').toLowerCase();

      if(value === "" || value === null) {
        self.setOutput('error','<i class="fa fa-close"></i> Field ' + field_name + ' is required.', el);
        return false;
      }

      if('checkbox' === type && !el.is(':checked')) {
        self.setOutput('error', field_name + ' is required.', el);
        return false;
      }

      if('radio' === type && !el.is(':checked') && !el.closest('div.form-group').find(':input').is(':checked')) {
        self.setOutput('error', '<i class="fa fa-close"></i> Field ' + field_name + ' is required.', el);
        return false;
      }

      if('email' === type && false === self.looseEmailValidate(value)) {
        self.setOutput('error', '<i class="fa fa-close"></i> Your email is not valid.', el);
        return false;
      }

    } else {
      self.setOutput('success', "All fields complete.", null);
    }

  });
};

gjAjax.prototype.setOutput = function(status, message, el) {
  this.output.status  = status;
  this.output.message = message;
  this.output.element = el;
};

gjAjax.prototype.looseEmailValidate = function(email) {
  var re = /\S+@\S+\.\S+/;
  return re.test(email);
};

gjAjax.prototype.clearErrors = function() {
  $('.has-error').removeClass('has-error');
  this.el.find('#error').empty();
};

gjAjax.prototype.errorOutput = function() {
  this.el.find('#error').append(this.output.message);

  if(this.output.element !== null) {
    this.output.element.closest('div.form-group').addClass('has-error');
  }
};

gjAjax.prototype.successMessage = function(data) {
  var response = JSON.parse(data);

  if (response.status === 'success') {
    this.el.trigger('reset');
    this.el.find('#error').empty();
    this.el.find('#error').append('<p class="message"><i class="fa fa-check"></i>' + this.options.success + '</p>');
  } else {
    this.el.find('#error').empty();
    this.el.find('#error').append('<i class="fa fa-close"></i>  ' + response.message);
    $('button[type="submit"]').toggle();
  }
};

export default gjAjax;
