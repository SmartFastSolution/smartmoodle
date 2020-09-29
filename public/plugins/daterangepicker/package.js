Package.describe({
  name: 'dangrossman:bootstrap-daterangepicker',
<<<<<<< HEAD
  version: '3.1.0',
=======
  version: '3.0.5',
>>>>>>> 8f5c732cef116f66c323290d19c8e4eb8fd04116
  summary: 'Date range picker component',
  git: 'https://github.com/dangrossman/daterangepicker',
  documentation: 'README.md'
});

Package.onUse(function(api) {
  api.versionsFrom('METEOR@0.9.0.1');

  api.use('momentjs:moment@2.22.1', ["client"]);
  api.use('jquery@3.3.1', ["client"]);

  api.addFiles('daterangepicker.js', ["client"]);
  api.addFiles('daterangepicker.css', ["client"]);
});
