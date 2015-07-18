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

//   var pets = normalizeToArray(data.petfinder.pets.pet);
//   var context = { pets: [] };
//   //var maxOffset = 25; //equals 'count' value from petfinder.php

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

function petfinderFail() {
  console.log('*** ERROR ***');
  //this.controller.set('isError', true);
  //spinnerStop();
  //$("#pets").html(Handlebars.templates['pet-error-alert']);
}

function petfinderAlways(data) {
  Ember.run.scheduleOnce('afterRender', this, reinitializeFoundation);
  return data;
}

function reinitializeFoundation() {
  return Ember.$(document).foundation('clearing', 'reflow');
}

// function formatPet(pet) {
//   var petContext = { options: [] },
//       name = pet.name.$t,
//       sex = pet.sex.$t,
//       desc = pet.description.$t.trim(),
//       options = normalizeToArray(pet.options.option),
//       isFirst = true,
//       optListItem;

//   options.forEach(function(option) {
//     optListItem = formatOptionListItem(option, sex);
//     if(optListItem) {
//       petContext.options.push(optListItem);
//     }
//   });

//   petContext.photos = [];
//   if(pet.media.photos && pet.media.photos.photo.length) {
//     var photos = pet.media.photos.photo;

//     photos.forEach(function(photo) {
//       if(photo['@size'] === "x") {
//         petContext.photos.push({
//           first: isFirst,
//           src: photo.$t,
//           alt: name + photo['@id']
//         });
//         isFirst = false;
//       }
//     });
//   }

//   petContext.name = name;
//   petContext.sex = sex;
//   petContext.desc = sanitizePetDesc(desc);

//   return petContext;
// }

export default Route.extend({
  beforeModel() {
    currentOffset = 0;
  },

  model() {
    return this.store.find('pet', { offset: currentOffset })
                     .catch(petfinderFail)
                     .then(petfinderAlways);
  }
  // model: function() {
  //   return ajax(url, { offset: currentOffset })
  //     .then(formatOptionListItem)
  //     .catch(petfinderFail)
  //     .then(petfinderAlways);
  // }
});
