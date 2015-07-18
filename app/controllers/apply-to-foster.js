import Ember from 'ember';

const {
  Controller
} = Ember;

export default Controller.extend({
  isSubmitted: false,
  isError: false,
  respStatus: undefined,
  respMessage: undefined,
  respErrorDesc: undefined
});
