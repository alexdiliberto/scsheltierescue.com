const options = { duration: 400 };

export default function() {
  this.transition(
    this.childOf('.container'),
    this.use('crossFade', options)
  );
  this.transition(
    this.fromRoute('help-and-advice'),
    this.toRoute(function(routeName) { return /^articles/.test(routeName); }),
    this.use('toLeft'),
    this.reverse('toRight')
  );
}
