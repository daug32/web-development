UNIT StringManager;
INTERFACE

{Returns position of the beggining Target in Container
 Or returns MaxInt}
FUNCTION Find(Target, Container: STRING) : INTEGER;
PROCEDURE Test_Find;

{Returns substring [Start..End] or empty string}
FUNCTION Substring(StartPos, EndPos: INTEGER; Container: STRING) : STRING;
PROCEDURE Test_Substring;

IMPLEMENTATION

FUNCTION Find(Target, Container: STRING) : INTEGER;
VAR
   TargetLength, ContainerLength: INTEGER;
   i, j: INTEGER;
   IsFound: BOOLEAN;
BEGIN {Find}
  ContainerLength := LENGTH(Container);
  TargetLength := LENGTH(Target);
  IsFound := FALSE;

  FOR i:=1 TO ContainerLength
  DO
    BEGIN
      IsFound := TRUE;
      FOR j:=1 TO TargetLength
      DO
        BEGIN
          IsFound :=
            (i + j - 1 <= ContainerLength) AND
            IsFound;
          IF NOT IsFound THEN BREAK;
          IsFound :=
            (Target[j] = Container[i + j - 1]) AND
            IsFound;
        END;
      IF IsFound THEN BREAK;
    END;
  IF IsFound THEN Find := i
  ELSE Find := MaxInt;
END; {Find}

PROCEDURE Test_Find;
VAR Str: STRING;
BEGIN {Test_Find}
  Str := '123456789';
  WRITELN(Find('1', Str));
  WRITELN(Find('123', Str));
  WRITELN(Find('32', Str));
  WRITELN(Find('0', Str));
  WRITELN(Find('', Str));
  WRITELN(Find('1234567890', Str));

  Str := '';
  WRITELN(Find('1', Str));
END;

FUNCTION Substring(StartPos, EndPos: INTEGER; Container: STRING) : STRING;
VAR
  ContainerLength: INTEGER;
  i:INTEGER;
BEGIN
  ContainerLength := LENGTH(Container);
  Substring := '';

  IF(StartPos < 1) OR
    (EndPos > ContainerLength)
  THEN EXIT;

  FOR i:=StartPos TO EndPos
  DO Substring := Substring + Container[i];
END;

PROCEDURE Test_Substring;
VAR
  Str, S: STRING;
BEGIN
  Str := '1234567890';
  WRITELN(Str);
  WRITELN('1..5: ', Substring(1, 5, Str), ';');
  WRITELN('0..5: ', Substring(0, 5, Str), ';');
  WRITELN('1..100: ', Substring(1, 100, Str), ';');
  WRITELN('1..1: ', Substring(1, 1, Str), ';');
  WRITELN('0..0: ', Substring(0, 0, Str), ';');
  WRITELN('100..2: ', Substring(100, 2, Str), ';');

  Str := '';
  WRITELN(Str);
  WRITELN('1..5: ', Substring(1, 5, Str), ';');
END;

BEGIN
END.
