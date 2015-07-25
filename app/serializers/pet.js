import DS from 'ember-data';

const {
  RESTSerializer
} = DS;

let pets;

/**
  Normalize a petfinder response (Array/Object) property into an Array

    [{foo:1}, {bar:2}] => [{foo:1},{bar:2}]
    {foo:1}            => [{foo:1}]
    undefined          => []
*/
let normalizeToArray = function(prop) {
  if (prop && $.isPlainObject(prop)) { prop = [prop]; }
  return prop || [];
};

let sanitizePetDesc = function(desc) {
  if (desc.match('^<div>') && desc.match('</div>$')) {
    desc = desc.replace(/^<div>/, '<p>').replace(/<\/div>$/, '</p>');
  } else if (!desc.match('^<') && !desc.match('>$')) {
    desc = `<p>${desc}</p>`;
  }
  return desc;
};

let formatOptionListItem = function(option, sex) {
  let listchild = {};

  switch (option) {
    case 'altered':
      if (sex === 'M') {
        listchild.text = 'Neutered: ';
      } else if (sex === 'F') {
        listchild.text = 'Spayed: ';
      } else {
        listchild.text = 'Spayed/Neutered: ';
      }
      listchild.icon = true;
      break;
    case 'hasShots':
      listchild.text = 'Shots Current: ';
      listchild.icon = true;
      break;
    case 'housebroken':
    case 'housetrained':
      listchild.text = 'Housebroken: ';
      listchild.icon = true;
      break;
    case 'noKids':
      listchild.text = 'No Kids';
      break;
    case 'noCats':
      listchild.text = 'No Cats';
      break;
    case 'noDogs':
      listchild.text = 'No Dogs';
      break;
    default:
      listchild = {};
  }

  return listchild;
};

export default RESTSerializer.extend({
  normalizePayload(payload) {
    delete payload['@encoding'];
    delete payload['@version'];
    delete payload.petfinder['@xmlns:xsi'];
    delete payload.petfinder['@xsi:noNamespaceSchemaLocation'];
    delete payload.petfinder['header'];

    payload.petfinder.lastOffset = parseInt(payload.petfinder.lastOffset['$t'], 10);

    pets = payload.petfinder.pets = normalizeToArray(payload.petfinder.pets.pet);
    pets.forEach(function(pet) {
      pet.id = parseInt(pet.id['$t'], 10);
      pet.name = pet.name['$t'];
      pet.description = sanitizePetDesc(pet.description['$t'].trim());
      pet.sex = pet.sex['$t'];
      pet.options = normalizeToArray(pet.options.option)
                    .map((opt) => {
                      const option = opt['$t'];
                      const { text, icon } = formatOptionListItem(option, pet.sex);
                      const formattedOption = {
                        text,
                        icon
                      };
                      return formattedOption;
                    })
                    .filter((opt) => opt.text);
      pet.lastUpdate = new Date(pet.lastUpdate['$t']);
      pet.mix = pet.mix['$t'];
      pet.size = pet.size['$t'];
      pet.status = pet.status['$t'];

      if (pet.media.photos && pet.media.photos.photo.length) {
        //const photo;
        let isFirstPhoto = false;

        pet.photos = pet.media.photos.photo.map(function(photo) {
          if (photo['@size'] === 'x') {
            photo = {
              first: !isFirstPhoto,
              id: parseInt(photo['@id'], 10),
              url: photo['$t'],
              size: photo['@size'],
              alt: `${this.name} photo #${parseInt(photo['@id'], 10)}`
            };
            isFirstPhoto = true;
            return photo;
          }
        }.bind(pet));

        pet.photos = pet.photos.filter((photo) => photo); //Remove falsy values

        delete pet.media;
      }

      delete pet.age;
      delete pet.animal;
      delete pet.breeds;
      delete pet.shelterId;
      delete pet.shelterPetId;
      delete pet.contact;
    });

    return payload.petfinder;
  }
});
