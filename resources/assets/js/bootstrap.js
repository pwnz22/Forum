window.$ = window.jQuery = require('jquery');

require('bootstrap-sass');

window.Vue = require('vue');

window.axios = require('axios');

window.axios.defaults.headers.common = {
  'X-CSRF-TOKEN': window.App.csrfToken,
  'X-Requested-With': 'XMLHttpRequest'
};

window.events = new Vue();

Vue.prototype.authorize = function (handler) {
  var user = window.App.user;
  return user ? handler(user) : false;
};

window.flash = function (message) {
  window.events.$emit('flash', message)
};
