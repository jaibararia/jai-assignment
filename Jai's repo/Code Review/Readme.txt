
  Code Reviews

  1. Mongo DB should have password
  2. Disable the login popup because data is stored in cache.
  3. There should be ajax call instead of http.post and the server site would be more secure if it has https.
  4. In HTTP.Post the password is shown, it should be secure.
  5. Login details should be append.
  6. ConsumerKey: Meteor.settings.public.twitter.k, secret , all these things should be kept in .env or process.env files so web parsing will stop.
  7. In server/main.js and server/twitter.js this syntax should be written like this Meteor.startup( function() => { });  not like this "Meteor.startup(() => { });""
  8. And in lib folder file counts should be replace with count
  9. Not a vulnerability just a suggestion we can also use css and little bit html in it to change the front end.
