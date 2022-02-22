PROGRAM lab22(INPUT, OUTPUT);
USES HttpResponse;
VAR Lanterns: STRING;
BEGIN
  WRITELN('Content-Type: text/plain');
  WRITELN;
  Lanterns := GetQueryStringParameter('lanterns');
  IF Lanterns = '1'
  THEN WRITELN('The British are coming by land.')
  ELSE IF Lanterns = '2'
    THEN WRITELN('The British are coming by sea.')
END. {lab22}
