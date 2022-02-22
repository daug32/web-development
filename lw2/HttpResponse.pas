UNIT HttpResponse;
INTERFACE

{Returns a key's value from the request's QUERY_STRING}
FUNCTION GetQueryStringParameter(Key: STRING) : STRING;
{Runs unit tests for the function}
PROCEDURE Test_GetQueryStringParameter;

IMPLEMENTATION
USES DOS, StringManager;

FUNCTION GetQueryStringParameter(Key: STRING) : STRING;
VAR
  Query: STRING;
  QueryLength, KeyLength: INTEGER;
  Position: INTEGER;

BEGIN {GetQueryStringParameter}
  Query := GetEnv('QUERY_STRING');
  QueryLength := LENGTH(Query);
  KeyLength := LENGTH(key);
  Position := Find(Key, Query);

  GetQueryStringParameter := '';
  IF(Position > QueryLength) OR
    (KeyLength < 1)
  THEN Exit;

  Position := Position + KeyLength + 1;
  WHILE
    (Position <= QueryLength) AND
    (Query[Position] <> '&')
  DO
    BEGIN
      GetQueryStringParameter := GetQueryStringParameter + Query[Position];
      Position := Position + 1
    END
END; {GetQueryStringParameter}

PROCEDURE Test_GetQueryStringParameter;
BEGIN {Test_GetQueryStringParameter}
  WRITELN('name: ', GetQueryStringParameter('name'), ';');
  WRITELN('secondname: ', GetQueryStringParameter('secondname'), ';');
  WRITELN('unexistingke: ', GetQueryStringParameter('unexistingkey'), ';');
  WRITELN(' : ', GetQueryStringParameter(' '), ';');
  WRITELN(': ', GetQueryStringParameter(''), ';')
END; {Test_GetQueryStringParameter}

BEGIN {HttpResponse}
END. {HttpResponse}
