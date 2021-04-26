import json
from session import Session

session = Session(json.loads('{"_":{"code":"","module":"true;"},"Test":{"code":"console.log(1)","module":"console.log(Math.random())","dependencies":[]}}'))

print('\x1b[1mPython\x1b[0m')
session.add('Test')
print(session.flush())
session.add('Test')
print(session.flush())
