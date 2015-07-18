import { moduleForComponent, test } from 'ember-qunit';
import hbs from 'htmlbars-inline-precompile';


moduleForComponent('main-intro-header-picture-slider', 'Integration | Component | main intro header picture slider', {
  integration: true
});

test('it renders', function(assert) {
  assert.expect(2);

  // Set any properties with this.set('myProperty', 'value');
  // Handle any actions with this.on('myAction', function(val) { ... });

  this.render(hbs`{{main-intro-header-picture-slider}}`);

  assert.equal(this.$().text(), '');

  // Template block usage:
  this.render(hbs`
    {{#main-intro-header-picture-slider}}
      template block text
    {{/main-intro-header-picture-slider}}
  `);

  assert.equal(this.$().text().trim(), 'template block text');
});
