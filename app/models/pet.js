import DS from 'ember-data';

const {
  Model
} = DS;

export default Model.extend({
  currentOffset: 0,
  isError: false,

  lastOffset: DS.attr(),

  description: DS.attr('string'),
  lastUpdate: DS.attr('date'),
  mix: DS.attr('string'),
  name: DS.attr('string'),
  options: DS.attr(),
  photos: DS.attr(),
  sex: DS.attr('string'),
  size: DS.attr('string'),
  status: DS.attr('string')
});
