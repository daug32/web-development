PROGRAM WebBasics(INPUT, OUTPUT);
USES DOS;
BEGIN
	WRITELN('Content-Type: text/plain');
        WRITELN;
        WRITELN('Request method: ', GetEnv('REQUEST_METHOD'));
	WRITELN('Query string: ', GetEnv('QUERY_STRING'));
        WRITELN('Content length: ', GetEnv('CONTENT_LENGTH'));
        WRITELN('HTTP user agent: ', GetEnv('HTTP_USER_AGENT'));
        WRITELN('HTTP host: ', GetEnv('HTTP_HOST'))
END.
