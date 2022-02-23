PROGRAM lab24(INPUT, OUTPUT);
USES HttpRequest;
VAR Name: STRING;
BEGIN {lab24}
  WRITELN('Content-Type: text/plain');
  WRITELN;
  WRITELN('First name: ', GetQueryStringParameter('first_name'));
  WRITELN('Second name: ', GetQueryStringParameter('second_name'));
  WRITELN('Age: ', GetQueryStringParameter('age'))
END. {lab24}
