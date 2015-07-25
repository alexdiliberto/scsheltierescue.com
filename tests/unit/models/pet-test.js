import { moduleForModel, test } from 'ember-qunit';

moduleForModel('pet', 'Unit | Model | pet', {
  // Specify the other units that are required for this test.
  needs: []
});

test('it exists', function(assert) {
  const model = this.subject();
  // const store = this.store();
  assert.ok(!!model);
});
