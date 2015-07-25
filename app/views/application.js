import Ember from 'ember';

const {
  View,
  on
} = Ember;

export default View.extend({
  setupFoundation: on('didInsertElement', function() {
    this.$().foundation();
  })
});
