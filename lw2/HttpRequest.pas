UNIT HttpRequest;
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
  PosStart, PosEnd: INTEGER;

BEGIN {GetQueryStringParameter}
  Query := GetEnv('QUERY_STRING');
  QueryLength := LENGTH(Query);
  KeyLength := LENGTH(key);
  GetQueryStringParameter := '';

  PosStart := Pos(Key, Query);
  IF(PosStart < 1) OR (KeyLength < 1)
  THEN EXIT;

  PosStart := PosStart + KeyLength + 1;
  PosEnd := PosStart;
  WHILE (PosEnd <= QueryLength) AND
        (Query[PosEnd] <> '&')
  DO PosEnd := PosEnd + 1;
  PosEnd := PosEnd - PosStart;

  GetQueryStringParameter := Copy(Query, PosStart, PosEnd);
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
