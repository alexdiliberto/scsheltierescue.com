import Ember from 'ember';

const {
  Route
} = Ember;

let currentOffset = 0;

// let normalizeToArray = function(prop) {
//   if (prop && $.isPlainObject(prop)) { prop = [prop]; }
//   return prop || [];
// };

// function petfinderDone(data) {
//   currentOffset = parseInt(data.petfinder.lastOffset.$t, 10);

//   const pets = normalizeToArray(data.petfinder.pets.pet);
//   const context = { pets: [] };
//   //const maxOffset = 25; //equals 'count' value from petfinder.php

//   pets.forEach(function(pet) {
//     context.pets.push(formatPet(pet));
//   });

//   return context.pets;

//   //spinnerStop();
//   //if(isFirstGetPetsAPICall || (pets && pets.length)) {
//   //  $("#pets").append(Handlebars.templates['pet'](context));
//   //}

//    // Check if we pulled the maximum amount of pets
//   //if(pets && (pets.length == null || pets.length === maxOffset)) {
//   //  $("#btnMore").removeClass("invisible");
//   //}
// }


function petfinderSuccess(data) {
  console.log('*** SUCCESS ***');
  //this.controller.set('isError', false);
  return data;
}

function petfinderFail() {
  console.log('*** ERROR ***');
  //this.controller.set('isError', true);
  //spinnerStop();
  //$("#pets").html(Handlebars.templates['pet-error-alert']);
}

function petfinderAlways(data) {
  //Ember.run.scheduleOnce('afterRender', this, reinitializeFoundation);
  return data;
}

// function reinitializeFoundation() {
//   return Ember.$(document).foundation('clearing', 'reflow');
// }

export default Route.extend({
  beforeModel() {
    currentOffset = 0;
  },

  model() {
    return this.store.query('pet', { offset: currentOffset })
                     .then(petfinderSuccess)
                     .catch(petfinderFail)
                     .then(petfinderAlways);
  }

  // model: function() {
  //   return ajax(url, { offset: currentOffset })
  //     .then(formatOptionListItem)
  //     .catch(petfinderFail)
  //     .then(petfinderAlways);
  // }

  // actions: {
  //   error(error, transition) {
  //     debugger;
  //     // handle the error
  //     console.log(error.message);
  //   }
  // }
});
