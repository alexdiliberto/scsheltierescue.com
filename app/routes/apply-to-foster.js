import Ember from 'ember';
import { raw as ajax } from 'ic-ajax';

const {
  Route
} = Ember;

export default Route.extend({
  actions: {
    fosteringApplicationMail() {
      const { controller } = this;
      const fosterMailerRequest = ajax({
        url:      '/foster-mailer/foster-mailer.php',
        type:     'POST',
        dataType: 'json',
        data:     Ember.$('#applyToFosterForm').serialize()
      });

      fosterMailerRequest.then(function(result) {
        const { response } = result;

        controller.setProperties({
          isSubmitted: true,
          isError: response.status === 'error',
          respStatus: response.status,
          respMessage: response.message,
          respErrorDesc: response.errorDesc
        });

        Ember.$.Velocity(document.documentElement, 'scroll', { duration: 400 , offset: 0 });
      }).catch(function() {
        const errorMsg = 'There was an error submitting your application. Please contact a server administrator.';

        controller.setProperties({
          isSubmitted: true,
          isError: true,
          respStatus: 'error',
          respMessage: errorMsg
        });

        Ember.$.Velocity(document.documentElement, 'scroll', { duration: 400 , offset: 0 });
      });
    }
  }
});
