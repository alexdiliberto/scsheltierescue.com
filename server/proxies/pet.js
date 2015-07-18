var proxyPath = '/pet';

module.exports = function(app) {
  // For options, see:
  // https://github.com/nodejitsu/node-http-proxy
  var proxy = require('http-proxy').createProxyServer({});

  proxy.on('error', function(err, req) {
    console.error(err, req.url);
  });

  app.use(proxyPath, function(req, res, next){
    console.log('PET PROXY!!!!!', req.url)
    // include root path in proxied request
    // req.url = proxyPath + '/' + req.url;
    // http://localhost/scsr-ember/dist/petfinder.php
    proxy.web(req, res, { target: 'http://localhost:3000/scsheltierescue.com/dist' });
  });
};
