import Ember from 'ember';

const {
  Component,
  computed
} = Ember;

export default Component.extend({
  tagName: 'li',
  classNameBindings: ['active'],
  active: computed('childViews.@each.active', function() {
    return this.get('childViews').anyBy('active');
  })
});
