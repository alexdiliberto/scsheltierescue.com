import Ember from 'ember';
import config from './config/environment';

const Router = Ember.Router.extend({
  location: config.locationType
});

Router.map(function() {
  this.route('adoption-requirements');
  this.route('apply-to-adopt');
  this.route('apply-to-foster');
  this.route('available-dogs', function() {});
  this.route('help-and-advice');
  this.route('events');
  this.route('surrender');

  this.route('articles.housetraining-tips', { path: '/articles/housetraining-tips' });
  this.route('articles.bringing-new-sheltie-home', { path: '/articles/bringing-new-sheltie-home' });
  this.route('articles.communicating', { path: '/articles/communicating' });
  this.route('articles.my-sheltie-barks', { path: '/articles/my-sheltie-barks' });
  this.route('articles.grooming', { path: '/articles/grooming' });
  this.route('articles.fostering', { path: '/articles/fostering' });

  this.route('not-found', { path: '/*path' });
});

export default Router;
