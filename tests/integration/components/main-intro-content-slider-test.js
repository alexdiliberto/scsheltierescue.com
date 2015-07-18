import { moduleForComponent, test } from 'ember-qunit';
import hbs from 'htmlbars-inline-precompile';


moduleForComponent('main-intro-content-slider', 'Integration | Component | main intro content slider', {
  integration: true
});

test('it renders', function(assert) {
  assert.expect(2);

  // Set any properties with this.set('myProperty', 'value');
  // Handle any actions with this.on('myAction', function(val) { ... });

  this.render(hbs`{{main-intro-content-slider}}`);

  assert.equal(this.$().text(), '');

  // Template block usage:
  this.render(hbs`
    {{#main-intro-content-slider}}
      template block text
    {{/main-intro-content-slider}}
  `);

  assert.equal(this.$().text().trim(), 'template block text');
});
