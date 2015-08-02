import Ember from 'ember';

export function hyphenConcat(params/*, hash*/) {
  return params.join('-');
}

export default Ember.Helper.helper(hyphenConcat);
