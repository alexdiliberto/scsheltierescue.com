import Ember from 'ember';

export default Ember.Route.extend({
  activate() {
    Ember.run.scheduleOnce('afterRender', this, function() {
      $('.demo-button-collapse').sideNav();
    });
  }
});
