const Session = require('../cjs');

const session = new Session(
  JSON.parse('{"_":{"code":"","module":"true;"},"Test":{"code":"console.log(1)","module":"console.log(Math.random())","dependencies":[]}}')
);

session.add('Test');
console.log(session.flush());
session.add('Test');
console.log(session.flush());
