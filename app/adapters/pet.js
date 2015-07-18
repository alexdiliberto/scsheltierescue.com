import ApplicationAdapter from './application';

export default ApplicationAdapter.extend({
  namespace: 'pet',
  pathForType: function() {
    return 'petfinder.php';
  }
});
