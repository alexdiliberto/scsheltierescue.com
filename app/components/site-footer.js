import Ember from 'ember';

const {
  Component,
  computed
} = Ember;

export default Component.extend({
  currentYear: computed(function() {
    return new Date().getFullYear();
  })
});
