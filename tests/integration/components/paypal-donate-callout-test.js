import { moduleForComponent, test } from 'ember-qunit';
import hbs from 'htmlbars-inline-precompile';


moduleForComponent('paypal-donate-callout', 'Integration | Component | paypal donate callout', {
  integration: true
});

test('it renders', function(assert) {
  assert.expect(2);

  // Set any properties with this.set('myProperty', 'value');
  // Handle any actions with this.on('myAction', function(val) { ... });

  this.render(hbs`{{paypal-donate-callout}}`);

  assert.equal(this.$().text(), '');

  // Template block usage:
  this.render(hbs`
    {{#paypal-donate-callout}}
      template block text
    {{/paypal-donate-callout}}
  `);

  assert.equal(this.$().text().trim(), 'template block text');
});
