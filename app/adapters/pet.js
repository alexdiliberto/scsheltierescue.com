import ApplicationAdapter from './application';

export default ApplicationAdapter.extend({
  namespace: 'pet',
  pathForType() {
    return 'petfinder.php';
  }
});
