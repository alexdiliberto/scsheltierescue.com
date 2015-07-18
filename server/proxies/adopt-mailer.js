var proxyPath = '/adopt-mailer';

module.exports = function(app) {
  // For options, see:
  // https://github.com/nodejitsu/node-http-proxy
  var proxy = require('http-proxy').createProxyServer({});

  proxy.on('error', function(err, req) {
    console.error(err, req.url);
  });

  app.use(proxyPath, function(req, res, next){
    // include root path in proxied request
    req.url = '/adopt-mailer.php';
    console.log('ADOPT MAILER PROXY!!!! ', req.url);
    // http://localhost/scsr-ember/dist/petfinder.php
    proxy.web(req, res, { target: 'http://localhost:3000/scsheltierescue.com/dist' });
  });
};
