PROGRAM lab23(INPUT, OUTPUT);
USES HttpRequest;
VAR Name: STRING;
BEGIN {lab23}
  WRITELN('Content-Type: text/plain');
  WRITELN;
  Name := GetQueryStringParameter('name');
  IF Name = '' THEN Name := 'Anonymus';
  WRITELN('Hello ', Name, '!')
END. {lab23}
